<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Регистрация нового пользователя.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function register(UserRequest $request)
    {

        $validatedData = $request->validated();

        // Если валидация успешна, создаём пользователя
        $user = User::create([
            'email' => $validatedData['email'],
            'name' => $validatedData['login'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if ($request->hasFile('userpic-file')) {
            $path = $request->file('userpic-file')->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Авторизация пользователя.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {

        $validatedData = $request->validated();


        if (!Auth::attempt($validatedData)) {
            return back()->withErrors([
                'email' => 'Неверные учетные данные.',
            ])->onlyInput('email');
        }

        Auth::user();

        return redirect()->route('home');
    }

    /**
     * Выход пользователя из системы.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main')->with('success', 'Вы успешно вышли из системы.');
    }
}
