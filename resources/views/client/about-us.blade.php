@extends('client.templates.default')

@section('content')

    <div data-scroll-section class="about-us">

        <div class="little-text">О нас</div>

        <h1>Lummeny - агентство дизайна и разработки.</h1>

        <div data-scroll data-scroll-id="our-photo" class="our-photo">
            <img src="images/we.jpg" alt=""/>
        </div>

        <div class="some-text">Проекты агентств и фрилансеров наполнили российский рынок шаблонными проектами, в которых
            нет идеи, души предпринимателя и его продукта.
        </div>

        <div class="some-text left">Это позволяет нам предлагать уникальные решения, которые могут быть адаптированы к
            любым вашим запросам, и поддерживать наше сотрудничество в долгосрочной перспективе.
        </div>

        <div id="sti" class="people">

            <div data-scroll data-scroll-sticky data-scroll-target="#sti" class="desc">
                <div class="desc__its-me_text">Это мы</div>
                <div class="desc__amount-us">(3)</div>
            </div>

            <div data-scroll data-scroll-speed="1" class="andrew">
                <img src="images/andrew.jpg" />
                <div class="name">Андрей Малышев</div>
                <div class="role">team - lead</div>
            </div>

            <div data-scroll data-scroll-speed="1" class="ilya">
                <img src="images/vlad.jpg" />
                <div class="name">Илья Чекмырев</div>
                <div class="role">project meneger</div>
            </div>

            <div data-scroll data-scroll-speed="1" class="vlad">
                <img src="images/ilya.jpg" />
                <div class="name">Владислав сухов</div>
                <div class="role">ui/ux designer</div>
            </div>

        </div>

        <div class="fullscreen center">
            <div class="philosophy">Философия</div>
            <div class="people-to-people">От людей и для людей</div>
        </div>

    </div>

@endsection
