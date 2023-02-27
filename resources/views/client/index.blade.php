@extends('client.templates.default')

@section('content')

    <div data-scroll-section class="main">

        <div class="content">

            <h1>Дизайн. Разработка. Продвижение.</h1>

            <div class="main-photo">
                <canvas data-scroll data-scroll-id="abstraction" class="abstraction" id="abstraction-mob"></canvas>
                <div class="welcome">Welcome</div>
            </div>

            <div class="contact-us">
                <button class="contact-us__btn">Обсудить</button>
                <a href="http://webstudio.local/project" class="contact-us__link">Смотреть проекты</a>
            </div>

            <div class="about-area">
                <div class="what-we-do">Создаем сайты для среднего и корпоративного бизнеса, уделяя пристальное внимание
                    потребностям пользователей, привлекательному дизайну и безупречному пользовательскому интерфейсу
                </div>

                <div class="additional-photo">
                    <img src="/images/we.png"/>
                </div>

                <div class="our-promise">
                    Дизайн и технологии — лишь инструменты для решения бизнес-задач. Результат нашей работы —
                    это продукт, сделанный вовремя и в рамках ожиданий заказчика.
                </div>
            </div>

            <div class="what-we-are">Мысля нестандартно, мы выводим цифровой опыт нашей команды на новый уровень.
                Мы не стоим на месте, постоянно находимся в развитии, ищем новые идеи в быстро меняющейся среде.
            </div>

            <div class="our-projects">Наши проекты</div>

            <div class="our-works">

                <div class="total ">
                    <div class="control">
                        <div class="pages">2/{{ count($projects) }}</div>
                        <div class="arrows">
                            <div class="btn btn-click magnetic left" data-strength="20" data-strength-text="5">
                                <div class="btn-text">
                                    <img class="btn-text-inner change arrow left" src="/images/arrow-left.svg"/>
                                    <div class="btn-fill"></div>
                                </div>
                            </div>
                            <div class="btn btn-click magnetic right" data-strength="20" data-strength-text="5">
                                <div class="btn-text">
                                    <img class="btn-text-inner change arrow right" src="/images/arrow-left.svg"/>
                                    <div class="btn-fill"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list owl-carousel">

                    @foreach($projects as $i)

                        <a target="_blank" href="#" class="work">
                            <img src="/images/example-1.png" alt="LACOSTE WEBSITE DESIGN">
                            <div class="year">202{{ $i }}</div>
                            <div class="name">LACOSTE WEBSITE DESIGN</div>
                        </a>

                    @endforeach

                </div>

            </div>

            <div class="steps-container">

                <div class="steps">
                    <div class="step">
                        <div class="title">РАЗРАБОТКА</div>
                        <div class="desc">Ваш сайт – это лицо вашего бизнеса. Вместе наши разработчики и дизайнеры создают эффективную,
                            интерактивную и отзывчивую платформу, которая понравится вашей целевой аудитории.
                        </div>
                        <img src="/images/example-3.png" alt="example"/>
                    </div>
                    <div class="step">
                        <div class="title">UI/UX ДИЗАЙН</div>
                        <div class="desc">Мы создадим индивидуальный UI/UX дизайн под проект любой сложности. Ваш сайт
                            станет
                            «живым» и динамичным.
                        </div>
                        <img src="/images/example-3.png" alt="example"/>
                    </div>
                    <div class="step">
                        <div class="title">ПРОДВИЖЕНИЕ</div>
                        <div class="desc">Наша SEO оптимизация увеличит целевой трафик на ваш сайт, достигая рейтинга
                            страницы №1 в поисковых системах по ценным ключевым словам.
                        </div>
                        <img src="/images/example-3.png" alt="example"/>
                    </div>
                    <div class="step">
                        <div class="title">ПОДДЕРЖКА</div>
                        <div class="desc">Выбирая нас, вам не нужно беспокоиться о технических аспектах вашего
                            веб-сайта,
                            поскольку мы делаем все, что связано с вашим сайтом, от вашего имени
                        </div>
                        <img src="/images/example-3.png" alt="example"/>
                    </div>
                </div>

            </div>

            <div class="some-text">
                Разделяя общую страсть к визуальной идентичности и цифровым технологиям, мы стремимся предоставлять как
                актуальные, так и креативные решения для достижения целей наших клиентов.
            </div>

        </div>

    </div>

@endsection
