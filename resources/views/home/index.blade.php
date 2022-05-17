@extends('master')

@section('page-title', 'Our Favorite Flowers - Main')

@section('add-scripts')
    <script defer src="{{ asset('js/slider.min.js') }}"></script>
    <script defer src="{{ asset('/js/add-to-cart.min.js') }}"></script>
    <script defer src="{{ asset('/js/custom-form-valid.js') }}"></script>
@endsection


@section('main-content')
    <section class="first-look">
        <div class="container">
            <div class="catalog-ref">
                <h1 class="main-logo">our favorite flowers</h1>
                <p>Создаём для тех, кто ценит свежесть и&nbsp;изящество цветов</p>
                <a href="{{ url('/catalog') }}" class="catalog-button">смотреть каталог</a>
            </div>
        </div>
    </section>

    <section class="catalog-section">
        <div class="container">
            <h2>каталог</h2>
            <div class="catalogs-links">
                <div class="catalog-item desc">
                    <p>
                        У&nbsp;нас самый большой выбор цветов, букетов, открыток и&nbsp;подарков.
                        Мы&nbsp;всегда поможем вам подобрать букет для вашего события, наш менеджер вас проконсультирует 
                        и&nbsp;поможет определиться с&nbsp;выбором
                    </p>
                    <span>
                        Ознакомьтесь с&nbsp;нашими разделами каталога
                    </span>
                </div>
                <div class="catalog-item dried">
                    <h3>готовые букеты из&nbsp;сухоцветов</h3>
                    <ul>
                        <li>Букеты</li>
                        <li>Для интерьера</li>
                        <li>Композиции</li>
                    </ul>
                    <a href="{{ url('/catalog') }}">смотреть каталог</a>
                </div>
                <div class="catalog-item flwrs">
                    <h3>цветы</h3>
                    <ul>
                        <li>Сборные букеты</li>
                        <li>Монобукеты</li>
                        <li>Композиции из цветов</li>
                        <li>Розы</li>
                        <li>Свадебные</li>
                    </ul>
                    <a href="{{ url('/catalog') }}">смотреть каталог</a>
                </div>
                <div class="catalog-item add">
                    <h3>дополнительно</h3>
                    <ul>
                        <li>Шары</li>
                        <li>Игрушки</li>
                        <li>Открытки</li>
                        <li>Упаковки</li>
                    </ul>
                    <a href="{{ url('/catalog') }}">смотреть каталог</a>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-section">
        <div class="container">
            <h2>популярные букеты</h2>
            <p>Самые любимые композиции наших клиентов</p>
            <div class="slider-wrapper">
                <img src="{{ asset('img/main/popular-section/slider/left.png') }}" alt="left" class="slider-left slider-desc disable">
                <div class="slider-content">
                    <div class="slider-track">

                        @foreach ($favoriteProducts as $product)
                            <div class="slider-item">
                                <a href="{{ url('/product') }}/{{ $product->translate_name }}">
                                    <img src="{{ asset('/') }}/{{ $product->img }}" alt="{{ $product->translate_name }}" class="slider-img">
                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ $product->price }} &#8381</p>
                                </a>
                                <div class="add-to-cart-btn add-to-cart" data-id="{{ $product->id }}">в корзину</div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <img src="{{ asset('img/main/popular-section/slider/right.png') }}" alt="right" class="slider-right slider-desc">
            </div>
            <a href="{{ url('/catalog') }}">смотреть весь каталог</a>
        </div>
    </section>

    <section class="how-to-buy-section">
        <div class="container">
            <div class="how-to-buy">
                <h2>как сделать заказ</h2>
                <div class="steps">
                    <div class="step">
                        <h3>1 шаг</h3>
                        <p>Выберите какие цветы или подарки вы&nbsp;хотите купить</p>
                    </div>
                    <div class="step">
                        <h3>2 шаг</h3>
                        <p>
                            Оформите заказ, и&nbsp;мы&nbsp;отправим вам подтверждение на&nbsp;электронную почту, 
                            а&nbsp;так&nbsp;же менеджер свяжется с&nbsp;вами по&nbsp;телефону или в&nbsp;WhatsApp
                        </p>
                    </div>
                    <div class="step">
                        <h3>3 шаг</h3>
                        <p>
                            Наши флористы бережно подойдут к&nbsp;созданию букета цветов в&nbsp;
                            самом начале дня или накануне
                        </p>
                    </div>
                    <div class="step">
                        <h3>4 шаг</h3>
                        <p>
                            Один из&nbsp;наших курьеров или партнёров доставит ваш заказ по&nbsp;указанному адресу. 
                            Мы&nbsp;отправим вам сообщение в&nbsp;Whats App как только заказ будет доставлен
                        </p>
                    </div>
                    <div class="step">
                        <h3>5 шаг</h3>
                        <p>
                            Наслаждайтесь цветами , если вы&nbsp;заказали их&nbsp;для дома или любовью, 
                            которой поделились, если вы&nbsp;заказали для друга
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="custom-form-section">
        <div class="container" id="form-container">
            <h2 class="special">особенный</h2>
            <h2 class="occasion">повод?</h2>
            <div class="custom-form">
                <p>
                    Мы&nbsp;готовы прийти на&nbsp;помощь и&nbsp;собрать уникальный букет, на&nbsp;любой вкус, 
                    бюджет и&nbsp;для любого события по&nbsp;вашему индивидуальному заказу.
                </p>
                <p>Заполните форму обратной связи и наш специалист свяжется с вами в течение 15 минут.</p>
                <form action="#" id="custom-from">
                    <input type="text" placeholder="ваше имя*" class="_custom-input" name="name">
                    <input type="text" placeholder="ваш телефон*" class="_custom-input" name="phone">
                    <textarea placeholder="пожелания к заказу*" class="_custom-input" name="custom-order"></textarea>
                    <button class="custom-form-btn" type="submit">отправить</button>
                    <input type="hidden" name="token" value="{{ csrf_token() }}">
                </form>
                <p class="confidentiality">
                    Нажимая на кнопку «Отправить», я даю свое согласие на обработку персональных данных, 
                    в соответствии с <a href="{{ url('/confidential') }}">Политикой конфиденциальности</a> 
                </p>
                <p class="required">
                    *поля обязательные для заполнения
                </p>
            </div>
        </div>
        <div class="popup">
            <div class="popup-wrapper">
                <p class="popup-txt"></p>
                <div class="custom-form-btn popup-btn">закрыть</div>
            </div>
        </div>
        <div class="loader-custom-form loader-hide">
            <div class="lds-dual-ring"></div>
        </div>
    </section>

@endsection