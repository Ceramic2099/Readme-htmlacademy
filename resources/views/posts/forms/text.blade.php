<section class="adding-post__text tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления текста</h2>
    <form class="adding-post__form form" action="{{ route('posts.store', ['content_type' => 'text']) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="form__text-inputs-wrapper">
            <div class="form__text-inputs">
                <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="text-heading">Заголовок <span
                            class="form__input-required">*</span></label>
                    <div class="form__input-section @error('title') form__input-section--error @enderror">
                        <input class="adding-post__input form__input @error('title') form__input--error @enderror"
                               id="text-heading" type="text" name="title" placeholder="Введите заголовок">
                        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                        </button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка</h3>
                            <p class="form__error-desc">@error('title') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="adding-post__textarea-wrapper form__textarea-wrapper">
                    <label class="adding-post__label form__label" for="post-text">Текст поста <span
                            class="form__input-required">*</span></label>
                    <div class="form__input-section @error('body') form__input-section--error @enderror">
                        <textarea
                            class="adding-post__textarea form__textarea form__input @error('body') form__input--error @enderror"
                            id="post-text" name="body" placeholder="Введите текст публикации"></textarea>
                        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                        </button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка</h3>
                            <p class="form__error-desc">@error('body') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="post-tags">Теги</label>
                    <div class="form__input-section  @error('tags') form__input-section--error @enderror">
                        <input class="adding-post__input form__input @error('tags') form__input--error @enderror"
                               id="post-tags" type="text" name="tags" placeholder="Введите теги">
                        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                        </button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка</h3>
                            <p class="form__error-desc">@error('tags') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
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
        <div class="adding-post__buttons">
            <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
            <a class="adding-post__close" href="#">Закрыть</a>
        </div>
    </form>
</section>
