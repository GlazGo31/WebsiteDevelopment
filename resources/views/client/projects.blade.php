@extends('client.templates.default')

@section('content')

    <div class="projects" data-scroll-section>

        <div class="service">Услуги</div>

        <h1  data-scroll data-scroll-sticky="true" data-scroll-target=".projects">Проекты</h1>

        <div class="know-us" data-scroll data-scroll-id="project" data-scroll-sticky="true" data-scroll-target=".projects">ознакомьтесь <br>с нашими проектами</div>

        <div class="list" data-scroll>

            <div class="list_right" data-scroll  data-scroll-target=".projects" data-scroll-speed="1">

                <div class="item">
                    <div class="item__photo" >
                        <img src="images/example-1.png"/>
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>
                <div class="item">
                    <div class="item__photo">
                        <img src="images/example-1.png" />
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>
                <div class="item">
                    <div class="item__photo">
                        <img src="images/example-1.png" />
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>

            </div>

            <div class="list_left" data-scroll data-scroll-target=".projects" data-scroll-speed="2">

                <div class="item">
                    <div class="item__photo">
                        <img src="images/example-1.png" />
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>

                <div class="item">
                    <div class="item__photo">
                        <img src="images/example-1.png" />
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>

                <div class="item">
                    <div class="item__photo">
                        <img src="images/example-1.png" />
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>

                <div class="item">
                    <div class="item__photo">
                        <img src="images/example-1.png" />
                    </div>
                    <h2 class="item_title_name">Lacoste</h2>
                    <h3 class="item_subtitle_name">Our designer’s main objective.</h3>
                    <button class="item_btn">Смотреть проект</button>
                </div>

            </div>

        </div>

    </div>

@endsection
