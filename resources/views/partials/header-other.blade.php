@php use Illuminate\Support\Facades\Storage;use Illuminate\Support\Facades\URL; @endphp
<header class="header">
    <div class="header__wrapper container">
        <div class="header__logo-wrapper">
            <a class="header__logo-link" href="{{ url('/') }}">
                <img class="header__logo" src="{{ asset('img/logo.svg') }}" alt="Логотип Readme" width="128"
                     height="24">
            </a>
            <p class="header__topic">micro blogging</p>
        </div>
        <form class="header__search-form form" action="#" method="get">
            <div class="header__search">
                <label class="visually-hidden">Поиск</label>
                <input class="header__search-input form__input" type="search">
                <button class="header__search-button button" type="submit">
                    <svg class="header__search-icon" width="18" height="18">
                        <use xlink:href="#icon-search"></use>
                    </svg>
                    <span class="visually-hidden">Начать поиск</span>
                </button>
            </div>
        </form>
        <div class="header__nav-wrapper">
            <nav class="header__nav">
                @auth()
                    <ul class="header__my-nav">
                        <li class="header__my-page header__my-page--popular">
                            <a class="header__page-link" href={{url('popular')}} title="Популярный контент">
                            <span class="visually-hidden">Популярный контент</span>
                            </a>
                        </li>
                        <li class="header__my-page header__my-page--feed">
                            <a class="header__page-link header__page-link--active" href={{url('feed')}} title="Моя лента">
                            <span class="visually-hidden">Моя лента</span>
                            </a>
                        </li>
                        <li class="header__my-page header__my-page--messages">
                            <a class="header__page-link" href={{url('messages')}} title="Личные сообщения">
                            <span class="visually-hidden">Личные сообщения</span>
                            </a>
                        </li>
                    </ul>
                @endauth
                @auth()
                    <ul class="header__user-nav">
                        <li class="header__profile">
                            <a class="header__profile-link" href={{url('profile')}}>
                                <div class="header__avatar-wrapper">
                                    <img class="header__profile-avatar"
                                         @if(Auth::user()->avatar)
                                             src="{{Storage::url(Auth::user()->avatar)}}"
                                         @else
                                             src="{{asset('img/userpic.jpg')}}"
                                         @endif
                                         alt="Аватар профиля">
                                </div>
                                <div class="header__profile-name">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="header__link-arrow" width="10" height="6">
                                        <use xlink:href="#icon-arrow-right-ad"></use>
                                    </svg>
                                </div>
                            </a>
                            <div class="header__tooltip-wrapper">
                                <div class="header__profile-tooltip">
                                    <ul class="header__profile-nav">
                                        <li class="header__profile-nav-item">
                                            <a class="header__profile-nav-link" href={{url('profile')}}>
                          <span class="header__profile-nav-text">
                            Мой профиль
                          </span>
                                            </a>
                                        </li>
                                        <li class="header__profile-nav-item">
                                            <a class="header__profile-nav-link" href={{url('messages')}}>
                          <span class="header__profile-nav-text">
                            Сообщения
                            <i class="header__profile-indicator">{{Auth::user()->messages->count()}}</i>
                          </span>
                                            </a>
                                        </li>
                                        {{--                                        <li class="header__profile-nav-item">--}}
                                        {{--                                            <a class="header__profile-nav-link" href="#">--}}
                                        {{--                          <span class="header__profile-nav-text">--}}
                                        {{--                            Настройки--}}
                                        {{--                          </span>--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                        <li class="header__profile-nav-item">
                                            <a class="header__profile-nav-link" href={{route('auth.logout')}}>
                          <span class="header__profile-nav-text">
                            Выход
                          </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @if(str_contains(URL::current(), url('/posts/create')))
                            <li>
                                <a class="header__post-button header__post-button--active button button--transparent"
                                   href={{route('home')}}>Закрыть</a>
                            </li>
                        @else
                            <li>
                                <a class="header__post-button button button--transparent"
                                   href="{{route('posts.create', ['type' => 'photo'])}}">Пост</a>
                            </li>
                        @endif
                    </ul>

                @else
                    <ul class="header__user-nav">
                        @if(URL::current() !== url('login'))
                            <li class="header__authorization">
                                <a class="header__user-button header__authorization-button button"
                                   href="{{ url('login') }}">Вход</a>
                            </li>
                        @endif

                        @if(URL::current() !== url('registration'))
                            <li>
                                <a class="header__user-button header__register-button button"
                                   href="{{ url('registration') }}">Регистрация</a>
                            </li>
                        @endif
                        @endauth
                    </ul>
            </nav>
        </div>
    </div>
</header>
