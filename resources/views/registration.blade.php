@extends('layouts.app')

@section('title', 'Регистрация')

@section('header')
    @include('partials.header-other')
@endsection

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">

    <main class="page__main page__main--registration">
        <div class="container">
            <h1 class="page__title page__title--registration">Регистрация</h1>
        </div>
        <section class="registration container">
            <h2 class="visually-hidden">Форма регистрации</h2>
            <form class="registration__form form" action="{{ route('auth.register') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form__text-inputs-wrapper">
                    <div class="form__text-inputs">
                        <div class="registration__input-wrapper form__input-wrapper">
                            <label class="registration__label form__label" for="registration-email">Электронная почта
                                <span class="form__input-required">*</span></label>
                            <div class="form__input-section @error('email') form__input-section--error @enderror">
                                <input
                                    class="registration__input form__input @error('email') form__input--error @enderror"
                                    id="registration-email" type="email" name="email" placeholder="Укажите эл.почту"
                                    value="{{ old('email') }}">
                                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                                </button>
                                <div class="form__error-text">
                                    <h3 class="form__error-title">Ошибка</h3>
                                    <p class="form__error-desc">@error('email') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="registration__input-wrapper form__input-wrapper">
                            <label class="registration__label form__label" for="registration-login">Логин <span
                                    class="form__input-required">*</span></label>
                            <div class="form__input-section @error('login') form__input-section--error @enderror">
                                <input
                                    class="registration__input form__input @error('login') form__input--error @enderror"
                                    id="registration-login" type="text" name="login" placeholder="Укажите логин"
                                    value="{{ old('login') }}">
                                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                                </button>
                                <div class="form__error-text">
                                    <h3 class="form__error-title">Ошибка</h3>
                                    <p class="form__error-desc">@error('login') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="registration__input-wrapper form__input-wrapper">
                            <label class="registration__label form__label" for="registration-password">Пароль <span
                                    class="form__input-required">*</span></label>
                            <div class="form__input-section @error('password') form__input-section--error @enderror">
                                <input
                                    class="registration__input form__input @error('password') form__input--error @enderror"
                                    id="registration-password" type="password" name="password"
                                    placeholder="Придумайте пароль">
                                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                                </button>
                                <div class="form__error-text">
                                    <h3 class="form__error-title">Ошибка</h3>
                                    <p class="form__error-desc">@error('password') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                        <div class="registration__input-wrapper form__input-wrapper">
                            <label class="registration__label form__label" for="password_confirmation">Повтор пароля
                                <span class="form__input-required">*</span></label>
                            <div
                                class="form__input-section @error('password_confirmation') form__input-section--error @enderror">
                                <input
                                    class="registration__input form__input @error('password_confirmation') form__input--error @enderror"
                                    id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="Повторите пароль">
                                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                                </button>
                                <div class="form__error-text">
                                    <h3 class="form__error-title">Ошибка</h3>
                                    <p class="form__error-desc">@error('password_confirmation') {{ $message }} @enderror</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($errors->all())
                        <div class="form__invalid-block">
                            <b class="form__invalid-slogan">Пожалуйста, исправьте следующие ошибки:</b>
                            <ul class="form__invalid-list">
                                @foreach ($errors->all() as $error)
                                    <li class="form__invalid-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="registration__input-file-container form__input-container form__input-container--file">
                    <div class="registration__input-file-wrapper form__input-file-wrapper">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Выбрать фото</label>
                            <input class="form-control" id="userpic-file" type="file" name="userpic-file">
                        </div>
                    </div>
                    <div class="registration__file form__file dropzone-previews">
                    </div>
                </div>
                <button class="registration__submit button button--main" type="submit">Отправить</button>
            </form>
        </section>
    </main>
@endsection
