<section class="adding-post__photo tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления фото</h2>
    <form class="adding-post__form form" action="{{ route('posts.store', ['content_type' => 'photo']) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="form__text-inputs-wrapper">
            <div class="form__text-inputs">
                <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="photo-heading">Заголовок <span
                            class="form__input-required">*</span></label>
                    <div class="form__input-section @error('title') form__input-section--error @enderror">
                        <input class="adding-post__input form__input @error('title') form__input--error @enderror"
                               id="photo-heading" type="text" name="title" placeholder="Введите заголовок"
                               value="{{ old('title') }}">
                        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                        </button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка</h3>
                            <p class="form__error-desc">@error('title') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="adding-post__textarea-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="post-link">Ссылка <span
                            class="form__input-required"></span></label>
                    <div class="form__input-section @error('image_url') form__input-section--error @enderror">
                        <input class="adding-post__input form__input @error('image_url') form__input--error @enderror"
                               id="post-link" type="text" name="image_url" placeholder="Введите ссылку">
                        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                        </button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка</h3>
                            <p class="form__error-desc">@error('image_url') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="adding-post__input-wrapper form__input-wrapper">
                    <label class="adding-post__label form__label" for="photo-tags">Теги</label>
                    <div class="form__input-section @error('tags') form__input-section--error @enderror">
                        <input class="adding-post__input form__input @error('tags') form__input--error @enderror"
                               id="photo-tags" type="text" name="tags" placeholder="Введите теги">
                        <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                        </button>
                        <div class="form__error-text">
                            <h3 class="form__error-title">Ошибка</h3>
                            <p class="form__error-desc">@error('tags') {{ $message }} @enderror</p>
                        </div>
                    </div>
                </div>
                <div class="adding-post__input-file-container form__input-container form__input-container--file">
                    <div class="adding-post__input-file-wrapper form__input-file-wrapper">

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Выбрать фото</label>
                            <input class="form-control" id="userpic-file-photo" type="file" name="image">
                        </div>

                    </div>
                    <div class="adding-post__file adding-post__file--photo form__file dropzone-previews"></div>
                </div>
                <div class="adding-post__buttons">
                    <button class="adding-post__submit button button--main" type="submit">Опубликовать</button>
                    <a class="adding-post__close" href="{{ route('home') }}">Закрыть</a>
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
    </form>
</section>
