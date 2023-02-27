<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="preload" href="/fonts/KronaOne-Regular.woff2" as="font" type="font/woff2" crossorigin/>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}"/>

    <meta
        name="description"
        content="Нужен веб-сайт, созданный для вашего бизнеса? SkyCode - компания по веб-разработке в России, обладающая опытом в создании безопасных и надежных сервисов для малого и среднего бизнеса, стартапов и масштабируемых компаний">

    <meta property="og:title" content="Разработка сайтов 'под ключ' в {{ $city->seo_name }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:site_name" content="SkyCode - Студия веб дизайна. Разработка сайтов под ключ.">
    <meta
        property="og:description"
        content="Здесь вы можете заказать создание сайта в {{ $city->seo_name }} под ключ с дизайном. Изготовление технических интернет-сайтов любой сложности от веб-студии">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="/images/preview.png"/>

    <meta
        name="keywords"
        content="Создание сайта, Разработка сайта, Продвижение сайта, Дизайн сайта, SEO продвижение, Поддержка сайта, Тестирование сайта, Стретегия разработки, Скай код">

    <meta name="robots" content="index, follow">

    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="icon" type="image/svg" href="/images/favicon.svg">

    <title>Разработка сайтов "под ключ" в {{ $city->seo_name }}</title>
</head>
<body>

<div data-scroll-container>
    @include('client.includes.header')
    @yield('content')
    @include('client.includes.footer')
</div>

@include('client.includes.menu')
@include('client.includes.other')
@include('client.includes.preloader')

<script defer src="{{ mix('/js/app.js') }}"></script>

@include('client.includes.yandex')

</body>
</html>
