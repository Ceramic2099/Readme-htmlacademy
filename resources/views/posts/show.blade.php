@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.app')

@section('title', 'Публикация: ' . $post->title)

@section('header')
    @include('partials.header-other')
@endsection

@section('content')
    <main class="page__main page__main--publication">
        <div class="container">
            <h1 class="page__title page__title--publication">{{ $post->title }}</h1>
            <section class="post-details">
                <h2 class="visually-hidden">Публикация</h2>
                <div class="post-details__wrapper post-photo">
                    <div class="post-details__main-block post post--details">
                        <!-- Изображение поста (если это фото) -->
                        @if ($post->image)
                            <div class="post-details__image-wrapper post-photo__image-wrapper">
                                <img src="{{ Storage::url($post->image) }}" alt="Фото от пользователя" width="760"
                                     height="507">
                            </div>
                        @endif

                        <!-- Видео поста (если это видео) -->
                        @if ($post->video_link)
                            <div class="post-details__video-wrapper">
                                <iframe
                                    width="760"
                                    height="507"
                                    src="{{ $post->video_link }}"
                                    title="Video player"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        @endif

                        <!-- Текст поста (если это текст или цитата) -->
                        @if ($post->body || $post->author)
                            <div class="post-details__text-wrapper">
                                @if ($post->body)
                                    <p class="post-details__text">{{ $post->body }}</p>
                                @endif

                                @if ($post->author)
                                    <blockquote class="post-details__quote">
                                        <p>{{ $post->body }}</p>
                                        <cite>{{ $post->author }}</cite>
                                    </blockquote>
                                @endif
                            </div>
                        @endif

                        <!-- Ссылка (если это ссылка) -->
                        @if ($post->link)
                            <div class="post-details__link-wrapper">
                                <a href="{{ $post->link }}" target="_blank" rel="noopener noreferrer">
                                    {{ $post->link }}
                                </a>
                            </div>
                        @endif

                        <!-- Индикаторы лайков, комментариев и репостов -->
                        <div class="post__indicators">
                            <div class="post__buttons">
                                <a
                                    class="post__indicator post__indicator--likes button"
                                    href="#"
                                    title="Лайк"
                                >
                                    <svg class="post__indicator-icon" width="20" height="17">
                                        <use xlink:href="#icon-heart"></use>
                                    </svg>
                                    <svg
                                        class="post__indicator-icon post__indicator-icon--like-active"
                                        width="20" height="17"
                                    >
                                        <use xlink:href="#icon-heart-active"></use>
                                    </svg>
                                    <span>{{ $post->likes_count }}</span>
                                    <span class="visually-hidden">количество лайков</span>
                                </a>

                                <a
                                    class="post__indicator post__indicator--comments button"
                                    href="#"
                                    title="Комментарии"
                                >
                                    <svg class="post__indicator-icon" width="19" height="17">
                                        <use xlink:href="#icon-comment"></use>
                                    </svg>
                                    <span>{{ $post->comments_count }}</span>
                                    <span class="visually-hidden">количество комментариев</span>
                                </a>

                                <a
                                    class="post__indicator post__indicator--repost button"
                                    href="#"
                                    title="Репост"
                                >
                                    <svg class="post__indicator-icon" width="19" height="17">
                                        <use xlink:href="#icon-repost"></use>
                                    </svg>
                                    <span>{{ $post->reposts_count }}</span>
                                    <span class="visually-hidden">количество репостов</span>
                                </a>
                            </div>

                            <span class="post__view">{{ $post->views }} просмотров</span>
                        </div>

                        <!-- Комментарии -->
                        {{--                        <div class="comments">--}}
                        {{--                            <form class="comments__form form" action="{{ route('comments.store', $post->id) }}"--}}
                        {{--                                  method="post">--}}
                        {{--                                @csrf--}}
                        {{--                                <div class="comments__my-avatar">--}}
                        {{--                                    <img class="comments__picture"--}}
                        {{--                                         src="{{ Auth::user()->avatar ?? asset('img/default-avatar.jpg') }}"--}}
                        {{--                                         alt="Аватар пользователя">--}}
                        {{--                                </div>--}}
                        {{--                                <div class="form__input-section @error('comment') form__input-section--error @enderror">--}}
                        {{--                                                                <textarea--}}
                        {{--                                                                    class="comments__textarea form__textarea form__input @error('comment') form__input--error @enderror"--}}
                        {{--                                                                    placeholder="Ваш комментарий"--}}
                        {{--                                                                    name="comment"--}}
                        {{--                                                                ></textarea>--}}
                        {{--                                    <button class="form__error-button button" type="button">!</button>--}}
                        {{--                                    <div class="form__error-text">--}}
                        {{--                                        <h3 class="form__error-title">Ошибка валидации</h3>--}}
                        {{--                                        <p class="form__error-desc">@error('comment') {{ $message }} @enderror</p>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <button class="comments__submit button button--green" type="submit">Отправить</button>--}}
                        {{--                            </form>--}}

                        <!-- Список комментариев -->
                        <div class="comments__list-wrapper">
                            <ul class="comments__list">
                                @foreach ($post->comments as $comment)
                                    <li class="comments__item user">
                                        <div class="comments__avatar">
                                            <a class="user__avatar-link" href="#">
                                                <img class="comments__picture"
                                                     src="{{ $comment->user->avatar ?? asset('img/userpic.jpg') }}"
                                                     alt="Аватар пользователя">
                                            </a>
                                        </div>
                                        <div class="comments__info">
                                            <div class="comments__name-wrapper">
                                                <a class="comments__user-name" href="#">
                                                    <span>{{ $comment->user->name }}</span>
                                                </a>
                                                <time class="comments__time"
                                                      datetime="{{ $comment->created_at->format('Y-m-d') }}">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </time>
                                            </div>
                                            <p class="comments__text">
                                                {{ $comment->text }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Показать все комментарии -->
                            @if ($post->comments_count > 2)
                                <a class="comments__more-link" href="{{ route('comments.showAll', $post->id) }}">
                                    <span>Показать все комментарии</span>
                                    <sup class="comments__amount">{{ $post->comments_count }}</sup>
                                </a>
                            @endif
                        </div>
                    </div>


                    <!-- Информация о пользователе -->
                    <div class="post-details__user user">
                        <div class="post-details__user-info user__info">
                            <div class="post-details__avatar user__avatar">
                                <a class="post-details__avatar-link user__avatar-link"
                                   href="{{ route('profile', $post->user->id) }}">
                                    <img
                                        class="post-details__picture user__picture"
                                        src="{{ Storage::url($post->user->avatar) ?? asset('img/userpic.jpg') }}"
                                        alt="Аватар пользователя"
                                    >
                                </a>
                            </div>
                            <div class="post-details__name-wrapper user__name-wrapper">
                                <a class="post-details__name user__name" href="{{ route('profile', $post->user->id) }}">
                                    <span>{{ $post->user->name }}</span>
                                </a>
                                <time class="post-details__time user__time"
                                      datetime="{{ $post->created_at->format('Y-m-d') }}">
                                    {{ $post->created_at->diffForHumans() }}
                                </time>
                            </div>
                        </div>

                        <!-- Рейтинг пользователя -->
                        <div class="post-details__rating user__rating">
                            <p class="post-details__rating-item user__rating-item user__rating-item--subscribers">
                                <span
                                    class="post-details__rating-amount user__rating-amount">{{ $post->user->subscribers_count }}</span>
                                <span class="post-details__rating-text user__rating-text">подписчиков</span>
                            </p>
                            <p class="post-details__rating-item user__rating-item user__rating-item--publications">
                                <span
                                    class="post-details__rating-amount user__rating-amount">{{ $post->user->posts_count }}</span>
                                <span class="post-details__rating-text user__rating-text">публикаций</span>
                            </p>
                        </div>

                        <!-- Кнопки взаимодействия с пользователем -->
                        <div class="post-details__user-buttons user__buttons">
                            @auth
                                @if (Auth::id() !== $post->user->id)
                                    <button
                                        class="user__button user__button--subscription button button--main"
                                        type="button"
                                    >
                                        Подписаться
                                    </button>
                                @endif
                                <a
                                    class="user__button user__button--writing button button--green"
                                    href="{{ route('messages.create', $post->user->id) }}"
                                >
                                    Сообщение
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
