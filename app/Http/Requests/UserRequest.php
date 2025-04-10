<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'login' => 'required|string|min:3|max:255|unique:users,name',
            'password' => 'required|string|min:6|confirmed',
            'userpic-file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Кастомные сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Поле "Электронная почта" обязательно для заполнения.',
            'email.email' => 'Некорректный формат электронной почты.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'login.required' => 'Поле "Логин" обязательно для заполнения.',
            'login.min' => 'Логин должен содержать минимум 3 символа.',
            'login.unique' => 'Этот логин уже используется.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.',
            'userpic-file.image' => 'Файл должен быть изображением.',
            'userpic-file.max' => 'Размер файла не должен превышать 2 MB.',
            'userpic-file.mimes' => 'Допустимый формат изображений:jpeg,png,jpg,gif.',
        ];
    }
}
