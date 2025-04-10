@extends('layouts.app')

@section('title', 'Добавление публикации')

@section('header')
    @include('partials.header-other')
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-DQvkBjpPgn7RC31MCQoOeC9TI2kdqa4+BSgNMNj8v77fdC77Kj5zpWFTJaaAoMbC" crossorigin="anonymous">
    <main class="page__main page__main--adding-post">
        <div class="page__main-section">
            <div class="container">
                <h1 class="page__title page__title--adding-post">Добавить публикацию</h1>
            </div>
            <div class="adding-post container">
                <div class="adding-post__tabs-wrapper tabs">
                    <div class="adding-post__tabs filters">
                        <ul class="adding-post__tabs-list filters__list tabs__list">
                            <li class="adding-post__tabs-item filters__item">
                                <a class="adding-post__tabs-link filters__button filters__button--photo @if ($type === 'photo') filters__button--active @endif"
                                   href={{ route('posts.create', ['type' => 'photo']) }}>
                                    <svg class="filters__icon" width="22" height="18">
                                        <use xlink:href="#icon-filter-photo"></use>
                                    </svg>
                                    <span>Фото</span>
                                </a>
                            </li>
                            <li class="adding-post__tabs-item filters__item">
                                <a class="adding-post__tabs-link filters__button filters__button--video @if ($type === 'video') filters__button--active @endif"
                                   href={{ route('posts.create', ['type' => 'video']) }}>
                                    <svg class="filters__icon" width="24" height="16">
                                        <use xlink:href="#icon-filter-video"></use>
                                    </svg>
                                    <span>Видео</span>
                                </a>
                            </li>
                            <li class="adding-post__tabs-item filters__item">
                                <a class="adding-post__tabs-link filters__button filters__button--text @if ($type === 'text') filters__button--active @endif"
                                   href={{ route('posts.create', ['type' => 'text']) }}>
                                    <svg class="filters__icon" width="20" height="21">
                                        <use xlink:href="#icon-filter-text"></use>
                                    </svg>
                                    <span>Текст</span>
                                </a>
                            </li>
                            <li class="adding-post__tabs-item filters__item">
                                <a class="adding-post__tabs-link filters__button filters__button--quote @if ($type === 'quote') filters__button--active @endif"
                                   href="{{ route('posts.create', ['type' => 'quote']) }}">
                                    <svg class="filters__icon" width="21" height="20">
                                        <use xlink:href="#icon-filter-quote"></use>
                                    </svg>
                                    <span>Цитата</span>
                                </a>
                            </li>
                            <li class="adding-post__tabs-item filters__item">
                                <a class="adding-post__tabs-link filters__button filters__button--link @if ($type === 'link') filters__button--active @endif"
                                   href="{{ route('posts.create', ['type' => 'link']) }}">
                                    <svg class="filters__icon" width="21" height="18">
                                        <use xlink:href="#icon-filter-link"></use>
                                    </svg>
                                    <span>Ссылка</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="adding-post__tab-content">
                        @if ($type === 'photo')
                            @include('posts.forms.photo', ['id' => 'photo'])
                        @elseif ($type === 'video')
                            @include('posts.forms.video', ['id' => 'video'])
                        @elseif ($type === 'text')
                            @include('posts.forms.text', ['id' => 'text'])
                        @elseif ($type === 'quote')
                            @include('posts.forms.quote', ['id' => 'quote'])
                        @elseif ($type === 'link')
                            @include('posts.forms.link', ['id' => 'link'])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
