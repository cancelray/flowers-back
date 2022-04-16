@extends('master')

@section('page-title', 'Our Favorite Flowers - Product')

@section('add-scripts', 'js/slider.min.js')

@section('main-content')

    <section class="product-card">
        <div class="container">
            <h6>Главная&nbsp;/ карточка</h6>
            <div class="card">
                <img src="img/product-card/1.png" alt="product" class="product-img">
                <div class="product-info">
                    <h3>рубиновые искры</h3>
                    <h5 class="price">1234.00 &#8381</h5>
                    <p class="compound"><span>Состав</span>: Гвоздика (Диантус), Леукодендрон, Леукоспермум (Нутан), Лотос, Роза</p>
                    <div class="add-to-cart-wrapper">
                        <div class="add-to-cart-btn">В корзину</div>
                        <div class="amount">
                            <div class="decrement">-</div>
                            <div class="count-in-cart">1</div>
                            <div class="increment">+</div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="center">Дополнительно к заказу:</h4>
            <div class="addition-to-order">
                <div class="addition-to-order-item">
                    <p class="item-header">Удобрения для срезанных цветов</p>
                    <p class="item-text">
                        При указании об&nbsp;этом в&nbsp;пожеланиях к&nbsp;букету, мы&nbsp;приложим пакетик удобрения 
                        для вас
                    </p>
                </div>
                <div class="addition-to-order-item">
                    <p class="item-header">подпишем открытку</p>
                    <p class="item-text">
                        В пожеланиях к букету укажите текст, какой хотите разместить и выберите на 
                        сайте саму открытку
                    </p>
                </div>
                <div class="addition-to-order-item">
                    <p class="item-header">Фото букета перед отправкой</p>
                    <p class="item-text">
                        В&nbsp;примечании к&nbsp;заказу укажите об&nbsp;этом и&nbsp;мы&nbsp;отправим фото готового букета
                        перед доставкой. В&nbsp;праздничные дни в&nbsp;связи с&nbsp;большой загруженностью 
                        такой возможности нет
                    </p>
                </div>
                <div class="addition-to-order-item">
                    <p class="item-header">Букет-сюрприз</p>
                    <p class="item-text">
                        Если хотите, чтобы получатель не&nbsp;знал, что ему вручат а&nbsp;также от&nbsp;кого, то&nbsp;укажите 
                        об&nbsp;этом в&nbsp;примечании к&nbsp;заказу
                    </p>
                </div>
            </div>
            <div class="payment-delivery">
                <div class="payment">
                    <h4>способы оплаты:</h4>
                    <ul>
                        <li>БАНКОВСКОЙ КАРТОЙ ПРИ ОФОРМЛЕНИИ ЗАКАЗА ЧЕРЕЗ САЙТ</li>
                        <li>НАЛИЧНЫМИ ИЛИ БАНКОВСКОЙ КАРТОЙ ПРИ САМОВЫВОЗЕ</li>
                        <li>НАЛИЧНЫМИ ПРИ ДОСТАВКЕ КУРЬЕРОМ</li>
                        <li>КРИПТОВАЛЮТОЙ ОНЛАЙН</li>
                    </ul>
                </div>
                <div class="delivery">
                    <h4>стоимость доставки:</h4>
                    <ul>
                        <li><strong>Бесплатно</strong> – при заказе на сумму <span class="green">от 2500 рублей</span</li>
                        <li><strong>300 рублей</strong> – при заказе на сумму <span class="green">менее 2500 рублей</span</li>
                        <li>Так&nbsp;же вы&nbsp;можете забрать ваш заказ самостоятельно по&nbsp;адресу: г. Тула, пр. Ленина д. 111, оф. 11</li>
                    </ul>
                    <h4>Условия доставки:</h4>
                    <p>
                        Доставка осуществляется по городу Тула в любой день с 09.00 до 22.00. 
                        Доставка в ночное время осуществляется по договоренности с оператором
                    </p>
                </div>
            </div>
            <div class="popular">
                <h5>популярные товары</h5>
                <div class="slider-wrapper">
                    <img src="img/product-card/slider/left.png" alt="left" class="slider-left slider-desc disable">
                    <div class="slider-content">
                        <div class="slider-track">
                            <div class="slider-item">
                                <a href="">
                                    <img src="img/main/popular-section/slider/1.png" alt="1" class="slider-img">
                                    <h4>name 1</h4>
                                    <p>111.00 &#8381</p>
                                </a>
                                <div class="add-to-cart-btn">в корзину</div>
                            </div>
                            <div class="slider-item">
                                <a href="">
                                    <img src="img/main/popular-section/slider/2.png" alt="2" class="slider-img">
                                    <h4>name 2</h4>
                                    <p>90.00 &#8381</p>
                                </a>
                                <div class="add-to-cart-btn">в корзину</div>
                            </div>
                            <div class="slider-item">
                                <a href="">
                                    <img src="img/main/popular-section/slider/3.png" alt="3" class="slider-img">
                                    <h4>name 3</h4>
                                    <p>222.00 &#8381</p>
                                </a>
                                <div class="add-to-cart-btn">в корзину</div>
                            </div>
                            <div class="slider-item">
                                <a href="">
                                    <img src="img/main/popular-section/slider/4.png" alt="4" class="slider-img">
                                    <h4>name 4</h4>
                                    <p>2252.00 &#8381</p>
                                </a>
                                <div class="add-to-cart-btn">в корзину</div>
                            </div>
                            <div class="slider-item">
                                <a href="">
                                    <img src="img/main/popular-section/slider/5.png" alt="5" class="slider-img">
                                    <h4>name 5</h4>
                                    <p>984.00 &#8381</p>
                                </a>
                                <div class="add-to-cart-btn">в корзину</div>
                            </div>
                        </div>
                    </div>
                    <img src="img/product-card/slider/right.png" alt="right" class="slider-right slider-desc">
                </div>
            </div>
        </div>
    </section>

@endsection