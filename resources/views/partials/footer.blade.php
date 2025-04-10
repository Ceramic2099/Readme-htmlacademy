<footer class="footer footer--main">
    <div class="footer__wrapper">
        <div class="footer__container container">
            <div class="footer__site-info">
                <div class="footer__site-nav">
                    <ul class="footer__info-pages">
                        <li class="footer__info-page">
                            <a class="footer__page-link" href="https://htmlacademy.ru/">О проекте</a>
                        </li>
                        <li class="footer__info-page">
                            <a class="footer__page-link" href="https://htmlacademy.ru/">Реклама</a>
                        </li>
                        <li class="footer__info-page">
                            <a class="footer__page-link" href="https://htmlacademy.ru/">О разработчиках</a>
                        </li>
                        <li class="footer__info-page">
                            <a class="footer__page-link" href="https://htmlacademy.ru/">Работа в Readme</a>
                        </li>
                        <li class="footer__info-page">
                            <a class="footer__page-link" href="https://htmlacademy.ru/">Соглашение пользователя</a>
                        </li>
                        <li class="footer__info-page">
                            <a class="footer__page-link" href="https://htmlacademy.ru/">Политика конфиденциальности</a>
                        </li>
                    </ul>
                </div>
                <p class="footer__license">
                    При использовании любых материалов с сайта обязательно указание Readme в качестве источника. Все
                    авторские и исключительные права в рамках проекта защищены в соответствии с положениями 4 части
                    Гражданского Кодекса Российской Федерации.
                </p>
            </div>
            <div class="footer__my-info">
                @auth
                    <ul class="footer__my-pages">
                        <li class="footer__my-page footer__my-page--feed">
                            <a class="footer__page-link" href="{{url('feed')}}">Моя лента</a>
                        </li>
                        <li class="footer__my-page footer__my-page--popular">
                            <a class="footer__page-link" href="{{url('popular')}}">Популярный контент</a>
                        </li>
                        <li class="footer__my-page footer__my-page--messages">
                            <a class="footer__page-link" href={{url('messages')}}>Личные сообщения</a>
                        </li>
                    </ul>
                @endauth
                <div class="footer__copyright">
                    <a class="footer__copyright-link" href="https://htmlacademy.ru">
                        <span>Разработано HTML Academy</span>
                        <svg class="footer__copyright-logo" width="27" height="34">
                            <use xlink:href="#icon-htmlacademy"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
