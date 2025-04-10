@extends('layouts.app')

@section('title', 'Моя лента')

@section('header')
    @include('partials.header-other')
@endsection

@section('content')
    <main class="page__main page__main--feed">
        <div class="container">
            <h1 class="page__title page__title--feed">Моя лента</h1>
        </div>

        <div class="page__main-wrapper container">
            <section class="feed">
                <h2 class="visually-hidden">Лента публикаций</h2>

                <div class="feed__wrapper">
                    @foreach ($posts as $post)
                        @include('feed.types.' . $post->content_type->icon_name, ['post' => $post])
                    @endforeach
                </div>

                <ul class="feed__filters filters">
                    <li class="feed__filters-item filters__item">
                        <a class="filters__button filters__button--active" href="{{ route('home') }}">Все</a>
                    </li>
                    <li class="feed__filters-item filters__item">
                        <a class="filters__button filters__button--photo button"
                           href="{{ route('feed.filter', ['type' => 'photo']) }}">
                            <span class="visually-hidden">Фото</span>
                            <svg class="filters__icon" width="22" height="18" src="{{ asset('img/logo.svg') }}">
                                <img src="{{asset("img/icon-filter-photo.svg")}}" alt="Фото">
                            </svg>
                        </a>
                    </li>
                    <li class="feed__filters-item filters__item">
                        <a class="filters__button filters__button--video button"
                           href="{{ route('feed.filter', ['type' => 'video']) }}">
                            <span class="visually-hidden">Видео</span>
                            <svg class="filters__icon" width="24" height="16">
                                <img src="{{asset("img/icon-filter-video.svg")}}" alt="Видео">
                            </svg>
                        </a>
                    </li>
                    <li class="feed__filters-item filters__item">
                        <a class="filters__button filters__button--text button"
                           href="{{ route('feed.filter', ['type' => 'text']) }}">
                            <span class="visually-hidden">Текст</span>
                            <svg class="filters__icon" width="20" height="21">
                                <img src="{{asset("img/icon-filter-text.svg")}}" alt="Текст">
                            </svg>
                        </a>
                    </li>
                    <li class="feed__filters-item filters__item">
                        <a class="filters__button filters__button--quote button"
                           href="{{ route('feed.filter', ['type' => 'quote']) }}">
                            <span class="visually-hidden">Цитата</span>
                            <svg class="filters__icon" width="21" height="20">
                                <img src="{{asset("img/icon-filter-quote.svg")}}" alt="Цитата">
                            </svg>
                        </a>
                    </li>
                    <li class="feed__filters-item filters__item">
                        <a class="filters__button filters__button--link button"
                           href="{{ route('feed.filter', ['type' => 'link']) }}">
                            <span class="visually-hidden">Ссылка</span>
                            <svg class="filters__icon" width="21" height="18">
                                <img src="{{asset("img/icon-filter-link.svg")}}" alt="Ссылка">
                            </svg>
                        </a>
                    </li>
                </ul>
            </section>

            <aside class="promo">
                <article class="promo__block promo__block--barbershop">
                    <h2 class="visually-hidden">Рекламный блок</h2>
                    <p class="promo__text">
                        Все еще сидишь на окладе в офисе? Открой свой барбершоп по нашей франшизе!
                    </p>
                    <a class="promo__link" href="#">Подробнее</a>
                </article>
                <article class="promo__block promo__block--technomart">
                    <h2 class="visually-hidden">Рекламный блок</h2>
                    <p class="promo__text">
                        Товары будущего уже сегодня в онлайн-сторе Техномарт!
                    </p>
                    <a class="promo__link" href="#">Перейти в магазин</a>
                </article>
                <article class="promo__block">
                    <h2 class="visually-hidden">Рекламный блок</h2>
                    <p class="promo__text">
                        Здесь<br> могла быть<br> ваша реклама
                    </p>
                    <a class="promo__link" href="#">Разместить</a>
                </article>
            </aside>
        </div>
    </main>
@endsection
