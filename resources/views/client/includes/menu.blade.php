<div class="menu">

    <div class="background"></div>

    <div class="header">
        <div class="logotype">
            <a href="/">
                <img src="/images/logo.svg" alt="">
            </a>
        </div>
        <button class="btn btn-click close magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <div class="btn-fill"></div>
                <div class="btn-text-inner">Закрыть</div>
            </div>
        </button>
    </div>

    <div class="buttons">
        <button class="btn btn-click close magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <a class="btn-text-inner" href="{{ route('projects') }}">Проекты</a>
            </div>
        </button>

        <button class="btn btn-click close magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <a class="btn-text-inner" href="{{ route('services') }}">Услуги</a>
            </div>
        </button>

        <button class="btn btn-click close magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <a class="btn-text-inner" href="{{ route('about-us') }}">О нас</a>
            </div>
        </button>

        <button class="btn btn-click close magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <a class="btn-text-inner" href="{{ route('contacts') }}">Контакты</a>
            </div>
        </button>
    </div>

    <div class="social-networks">
        <a target="_blank" href="#" class="magnetic" data-strength="20" data-strength-text="5">Behance</a>
        <a target="_blank" href="#" class="magnetic" data-strength="20" data-strength-text="5">dprofile</a>
        <a target="_blank" href="#" class="magnetic" data-strength="20" data-strength-text="5">instagram</a>
        <a href="tg://resolve?domain={{ config('contacts.telegram') }}" class="magnetic" data-strength="20" data-strength-text="5">telegram</a>
    </div>

    <div class="menu__footer">
        <div class="rules">
            <a href="tel:{{ config('contacts.phone') }}" class="phone magnetic" data-strength="20" data-strength-text="5">{{ config('contacts.phone') }}</a>
            <a href="mailto:{{ config('contacts.email') }}" class="email magnetic" data-strength="20" data-strength-text="5">{{ config('contacts.email') }}</a>
        </div>
        <div class="contacts">
            <a href="#">RU</a>
        </div>
    </div>

</div>
