<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use App\Models\Post;
use Illuminate\View\View;

class FeedController extends Controller
{
    /**
     * Показать ленту постов.
     *
     * @return View
     */
    public function index(): View
    {

        $posts = Post::with(['user', 'likes', 'comments'])
            ->orderByDesc('created_at')
            ->paginate(10);


        return view('feed.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Фильтровать ленту по типу контента.
     *
     * @param string $type
     * @return View
     */
    public function filterByType($type)
    {

        $allowedTypes = ['photo', 'video', 'text', 'quote', 'link'];

        if (!in_array($type, $allowedTypes)) {
            abort(404);
        }

        $posts = Post::with(['user', 'likes', 'comments'])
            ->where('content_type_id', ContentType::getContentTypeId($type))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('feed.index', [
            'posts' => $posts,
        ]);
    }
}
