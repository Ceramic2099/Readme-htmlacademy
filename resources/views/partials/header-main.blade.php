<header class="header page__header">
    <div class="header__wrapper page__header-wrapper container">
        <div class="header__logo-wrapper page__logo-wrapper">
            <a class="header__logo-link header__logo-link--active">
                <img class="header__logo" src="{{ asset('img/logo.svg') }}" alt="Логотип readme" width="172"
                     height="32">
            </a>
            <p class="header__topic page__header-topic">
                micro blogging
            </p>
        </div>
        <div class="header__nav-wrapper">
            <nav class="header__nav">
                <ul class="header__user-nav page__user-nav">
                    <li class="page__user-item">
                <span class="header__register-slogan">
                  Еще нет аккаунта?
                </span>
                        <a class="header__user-button header__register-button button button--transparent"
                           href={{ url('registration') }}>Регистрация</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
