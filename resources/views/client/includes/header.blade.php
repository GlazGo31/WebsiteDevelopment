<div class="header">

    <div class="logo">
        <a href="/">
            <img src="/images/logo.svg" alt=""/>
        </a>
    </div>

    <div class="buttons">
        <select class="language">
            <option>RU</option>
            <option>EN</option>
        </select>

        <button onclick="window.location.href = '{{ route('contacts') }}'" class="btn btn-click lets-talk magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <div class="btn-fill"></div>
                <div class="btn-text-inner change">
                    Обсудить
                </div>
            </div>
        </button>
        <button class="btn btn-menu magnetic" data-strength="20" data-strength-text="5">
            <div class="btn-text">
                <div class="btn-text-inner">Меню</div>
            </div>
        </button>
    </div>

</div>
