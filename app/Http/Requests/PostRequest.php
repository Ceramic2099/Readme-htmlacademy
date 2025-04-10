<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'tags' => 'nullable|regex:/^[a-zA-Zа-яёА-ЯЁ\d_]+( [a-zA-Zа-яёА-ЯЁ\d_]+)*$/u',
        ];

        switch ($this->query('content_type')) {
            case 'photo':
                $rules += [
                    'image' => 'required|image|mimes:png,jpeg,gif|max:2048',
                    'image_url' => 'nullable|url',

                ];

                // Если заполнено поле image_url, игнорируем image
                if (isset($this->request->all()['image_url']) && !isset($this->all()['image'])) {
                    unset($rules['image']);
                    $rules['image_url'] = 'required|url';
                } elseif (isset($this->all()['image'])) {
                    unset($rules['image_url']);
                    $rules['image'] = 'required|image|mimes:png,jpeg,gif|max:2048';
                }

                break;

            case 'video':
                $rules += [
                    'video_link' => 'required|url',
                ];
                break;

            case 'text':
                $rules += [
                    'body' => 'required|string',
                ];
                break;

            case 'quote':
                $rules += [
                    'body' => 'required|string|max:70',
                    'author' => 'required|string',
                ];
                break;

            case 'link':
                $rules += [
                    'link' => 'required|url',
                ];
                break;
        }

        return $rules;
    }

    /**
     * Кастомные сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        $rules = [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'title.string' => 'Некорректный формат заголовка.',
            'tags.regex' => 'Не верный формат тегов',
        ];

        switch ($this->query('content_type')) {
            case 'photo':
                $rules += [
                    'image.image' => 'Файл должен быть изображением.',
                    'image.max' => 'Размер файла не должен превышать 2 MB.',
                    'image.mimes' => 'Допустимый формат изображений:jpeg,png,gif.',
                    'image_url.url' => 'Не корректная ссылка',
                ];
                break;

            case 'video':
                $rules += [
                    'video_link.required' => 'Поле "ссылка" обязательно для заполнения.',
                ];
                break;

            case 'text':
                $rules += [
                    'body.required' => 'Поле "Текст поста" обязательно для заполнения.',
                    'body.string' => 'Некорректный формат "Текст поста".',
                ];
                break;

            case 'quote':
                $rules += [
                    'body.required' => 'Поле "Текст поста" обязательно для заполнения.',
                    'body.string' => 'Некорректный формат заголовка "Текст поста".',
                    'author.required' => 'Поле "Автор" обязательно для заполнения.',
                    'author.string' => 'Некорректный формат поля "Автор".',
                ];
                break;

            case 'link':
                $rules += [
                    'link.required' => 'Поле "Ссылка" обязательно для заполнения.',
                    'link.url' => 'Поле "Ссылка" должно быть ссылкой',
                ];
                break;
        }

        return $rules;
    }
}
