@extends('client.templates.default')

@section('content')

    <div data-scroll-section class="services">

        <h1>Услуги</h1>

        <div class="what-we-do">Превращаем идеи в цифровые результаты.</div>

        <div class="some-text">Для нас цифровой продукт должен быть простым, интуитивно понятным и многоуровневым от
            ядра.
            Глубокая эстетика дизайна дополняет надежную концепцию, выдержавшую испытание временем. Он должен прилипать,
            преобразовывать и вдохновлять.
        </div>

        <div id="sti" data-scroll class="list" >
            <div data-scroll data-scroll-sticky data-scroll-target="#sti" data-scroll-offset='0%,40%' class="images left">
                <img style="z-index: 4" class="image development first" src="images/example-1.png" alt=""/>
                <img style="z-index: 3" class="image design" src="images/example-2.png" alt=""/>
                <img style="z-index: 2" class="image seo" src="images/example-3.png" alt=""/>
                <img style="z-index: 1" class="image support" src="images/example.png" alt=""/>
            </div>

            <div data-scroll data-scroll-id="services" class="texts">
                <div data-scroll data-scroll-id="development" class="text">
                    <div class="development__images">
                        <img src="https://placehold.co/360x360" alt="">
                    </div>
                    <div class="text__service">Услуги</div>
                    <div class="text__title">Разработка</div>
                    <div class="text__desc">Ваш сайт – это лицо вашего бизнеса. Вместе наши разработчики и дизайнеры создают
                        эффективную, интерактивную и отзывчивую платформу, которая понравится вашей целевой аудитории.
                    </div>
                    <a class="watch-all" href="#">Смотреть проекты</a>
                </div>
                <div data-scroll data-scroll-id="design" class="text">
                    <div class="development__images">
                        <img src="https://placehold.co/360x360" alt="">
                    </div>
                    <div class="text__service">Услуги</div>
                    <div class="text__title">UI/UX дизайн</div>
                    <div class="text__desc">Мы создадим индивидуальный UI/UX дизайн под проект любой сложности. Ваш сайт
                        станет
                        «живым» и динамичным.
                    </div>
                    <a class="watch-all" href="#">Смотреть проекты</a>
                </div>
                <div data-scroll data-scroll-id="seo" class="text">
                    <div class="development__images">
                        <img src="https://placehold.co/360x360" alt="">
                    </div>
                    <div class="text__service">Услуги</div>
                    <div class="text__title">Продвижение</div>
                    <div class="text__desc">Наша SEO оптимизация увеличит целевой трафик на ваш сайт, достигая рейтинга
                        страницы
                        №1 в поисковых системах по ценным ключевым словам.
                    </div>
                    <a class="watch-all" href="#">Смотреть проекты</a>
                </div>
                <div data-scroll data-scroll-id="support" class="text">
                    <div class="development__images">
                        <img src="https://placehold.co/360x360" alt="">
                    </div>
                    <div class="text__service">Услуги</div>
                    <div class="text__title">Поддержка</div>
                    <div class="text__desc">Выбирая нас, вам не нужно беспокоиться о технических аспектах вашего веб-сайта,
                        поскольку мы делаем все, что связано с вашим сайтом, от вашего имени
                    </div>
                    <a class="watch-all" href="#">Смотреть проекты</a>
                </div>
            </div>
            <div data-scroll data-scroll-sticky data-scroll-target="#sti" data-scroll-offset="0%,40%" class="images right">
                <img style="z-index: 4" class="image development first" src="images/example-1.png" alt=""/>
                <img style="z-index: 3" class="image design" src="images/example-2.png" alt="" />
                <img style="z-index: 2" class="image seo" src="images/example-3.png" alt="" />
                <img style="z-index: 1" class="image support" src="images/example.png" alt=""/>
            </div>
        </div>

        <div class="steps-title">Этапы нашего<br>сотрудничества</div>

        <div class="steps">
            <div class="step">
                <div class="title">Бриф</div>
                <div class="desc"><a href="{{ route('contacts') }}">Отправить нам</a> краткое описание продукта
                    вместе с вашими контактами и требованиями
                    для оценки проекта и начала работы.
                </div>
            </div>

            <div class="step">
                <div class="title">Оставаться на связи</div>
                <div class="desc">Просмотрите предварительные результаты и оставьте свой отзыв, чтобы мы могли
                    продолжить или внести исправления.
                </div>
            </div>

            <div class="step">
                <div class="title">Утвердить</div>
                <div class="desc">Утвердите черновую версию услуг, которые вам нравятся и которые вы хотите, чтобы мы
                    предоставили.
                </div>
            </div>

            <div class="step">
                <div class="title">Получить результат</div>
                <div class="desc">Получите идеальное качество ваших услуг вовремя и оставьте нам отзыв, если хотите.
                </div>
            </div>
        </div>

    </div>

@endsection
