<div data-scroll-section class="footer">
    <div class="footer__arrow">
        <img src="/images/ph_arrow-down-right-thin.png" alt="" class="arrow">
    </div>
    <div class="contacts">
        <div class="contacts_social__network">
            <a href="#" class="behance">BEHANCE</a>
            <a href="#" class="dprofile">DPROFILE</a>
            <a href="#" class="instagramm">INSTAGRAMM</a>
            <a href="tg://resolve?domain={{ config('contacts.telegram') }}" class="telegram">{{ '@' . config('contacts.telegram') }}</a>
        </div>
        <div class="contacts_about__us">
            <a href="tel:{{ config('contacts.phone') }}" class="phone">{{ config('contacts.phone') }}</a>
            <a href="mailto:{{ config('contacts.email') }}" class="email">{{ config('contacts.email') }}</a>
            <a href="{{ config('contacts.maps_url') }}" class="address">Россия, г. Белгород ул. Лермонтова, 19А</a>
        </div>
    </div>
    <div class="copyright">{{ now()->year }} {{ config('app.name') }}. All rights reserved</div>
</div>
