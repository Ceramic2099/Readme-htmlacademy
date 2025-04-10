<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\ContentType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Отображение детальной информации о посте.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        // Увеличиваем количество просмотров, нужно сделать миграцию с дефолт значением в 0, иначе инкримент не работает с null
        if (!$post->views) {
            $post->views = 0;
            $post->save();
        }

        $post->increment('views');
        $post->save();

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create($type)
    {
        // Допустимые типы постов
        $allowedTypes = ['photo', 'video', 'text', 'quote', 'link'];

        if (!in_array($type, $allowedTypes)) {
            return view('posts.create', ['type' => $allowedTypes[0]]);
        }

        return view('posts.create', ['type' => $type]);
    }

    /**
     * Сохранение нового поста.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        // Валидация данных
        $validatedData = $request->validated();

        // Обработка изображений для типа "photo"
        if ($request->input('content_type') === 'photo') {
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('photos', 'public');
                $validatedData['image'] = $path;
            } elseif ($request->has('image_url')) {
                try {
                    $response = Http::get($request->input('image_url'));
                    if ($response->successful()) {
                        Storage::disk('public')->put('photos/' . str_replace('/', '', $response->transferStats->getRequest()->getUri()->getPath()), $response->body());
                        $validatedData['image'] = 'photos/' . str_replace('/', '', $response->transferStats->getRequest()->getUri()->getPath());
                    } else {
                        return back()->withErrors(['image_url' => 'Не удалось скачать изображение по указанной ссылке.'])->withInput();
                    }
                } catch (\Exception $e) {
                    return back()->withErrors(['image_url' => 'Неверная ссылка на изображение.'])->withInput();
                }
            }
        }


        // Сохранение тегов, заготовка
//        $tags = [];
//        if (isset($validatedData['tags'])) {
//            $tags = explode(' ', $validatedData['tags']);
//            unset($validatedData['tags']);
//        }

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'body' => $validatedData['body'] ?? null,
            'image' => $validatedData['image'] ?? null,
            'video_link' => $validatedData['video_link'] ?? null,
            'link' => $validatedData['link'] ?? null,
            'author' => $validatedData['author'] ?? null,
            "content_type_id" => ContentType::getContentTypeId($request->input('content_type'))
        ]);


        // Привязка тегов к посту, загатовка
//        if (isset($tags)) {
//            foreach ($tags as $tag) {
//                $post->hashtags()->attachOrCreate(['title' => $tag]);
//            }
//        }


        // Отправка уведомлений подписчикам
        $this->notifySubscribers($post);

        return redirect()->route('posts.show', $post)->with('success', 'Пост успешно опубликован.');
    }

    /**
     * Отправка уведомлений подписчикам.
     *
     * @param Post $post
     */
    private function notifySubscribers(Post $post)
    {
        $subscribers = $post->user->subscribers;
        if (isset($subscribers)) {
            foreach ($subscribers as $subscriber) {
                // Логика отправки уведомлений, еще не готово
            }
        }

    }
}
