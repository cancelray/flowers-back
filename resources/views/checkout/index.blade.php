@extends('master')

@section('page-title', 'Our Favorite Flowers - Main')

@section('add-scripts')
    <script defer src="{{ asset('/js/delivery-show.min.js') }}"></script>
    <script defer src="{{ asset('/js/checkout-valid.min.js') }}"></script>
@endsection

@section('main-content')
    <section class="checkout">
        <div class="container" id="checkout-container">
            <h6><a href="{{ url('/') }}">Главная</a>&nbsp;/ оформление заказа</h6>
            <h2 class="registration">оформление</h2>
            <h2 class="order">заказа</h2>
            <div class="checkout-wrapper">
                <div class="checkout-form">
                    <h3>Оформление заказа</h3>
                    <form action="#" id="checkout-form">
                        <label for="name">Ваше имя*</label>
                        <input type="text" name="name" placeholder="Введите ваше имя" class="_required-input _main-checkout">
                        <label for="phone">Ваш телефон*</label>
                        <input type="text" name="phone" placeholder="+7 (888) 777-77-77" class="_required-input _main-checkout">
                        <label for="email">Ваш e-mail*</label>
                        <input type="text" name="email" placeholder="Введите вашу почту" class="_required-input _main-checkout">
                        <label for="receiver-phone">Телефон получателя (необязательно)</label>
                        <input type="text" name="receiver-phone" placeholder="Введите телефон получателя" class="_main-checkout">
                        <label for="receiver-name">Имя получателя (необязательно)</label>
                        <input type="text" name="receiver-name" placeholder="Введите имя получателя" class="_main-checkout">
                        <label for="comment">Комментарий к заказу</label>
                        <input type="text" name="comment" placeholder="Примечания к вашеу заказу,  особые пожелания отделу доставки" class="_main-checkout">
                        <h3 class="form-head-delivery">Доставка</h3>
                        <input type="radio" id="self-carrier" name="delivery-choose" value="self-carrier" class="cusom-ratio-input">
                        <label for="self-carrier" class="custom-radio">Самовывоз</label>
                        <input type="radio" id="courier-delivery" name="delivery-choose" value="courier-delivery" class="cusom-ratio-input">
                        <label for="courier-delivery" class="custom-radio">Доставка курьером</label>
                        <div class="courier-delivery-checkout display-none">
                            <label for="name">Город*</label>
                            <input type="text" name="city" placeholder="Город" class="_required-input-delivery _delivery-checkout">
                            <label for="name">Улица*</label>
                            <input type="text" name="street" placeholder="Улица" class="_required-input-delivery _delivery-checkout">	
                            <div class="small-inputs">
                                <div class="small-item">
                                    <label for="building">Корп/стр</label>
                                    <input type="text" name="building" placeholder="Корп/стр" class="_delivery-checkout">	
                                </div>
                                <div class="small-item">
                                    <label for="house">Дом*</label>
                                    <input type="text" name="house" placeholder="Дом" class="_required-input-delivery _delivery-checkout">
                                </div>
                                <div class="small-item">
                                    <label for="room">Кв/офис</label>
                                    <input type="text" name="room" placeholder="Кв/офис" class="_delivery-checkout">
                                </div>
                                <div class="small-item">
                                    <label for="time">Время доставки</label>
                                    <input type="text" name="time" placeholder="Время доставки" class="_delivery-checkout">
                                </div>
                            </div>
                        </div>
                        <div class="payment-form">
                            <h3>оплата</h3>
                            <input type="radio" id="bank-card" name="payment-form" value="bank-card" class="cusom-ratio-input">									
                            <label for="bank-card" class="custom-radio">Банковская карта</label>
                            <input type="radio" id="cash" name="payment-form" value="cash" class="cusom-ratio-input">
                            <label for="cash" class="custom-radio">Наличными</label>
                            <input type="radio" id="apple-pay" name="payment-form" value="apple-pay" class="cusom-ratio-input">
                            <label for="apple-pay" class="custom-radio">Apple pay</label>
                            <input type="radio" id="google-pay" name="payment-form" value="google-pay" class="cusom-ratio-input">
                            <label for="google-pay" class="custom-radio">Google pay</label>
                            <input type="radio" id="crypto" name="payment-form" value="crypto" class="cusom-ratio-input">
                            <label for="crypto" class="custom-radio">Криптовалюта</label>
                        </div>
                        <p class="delivery-price">Доставка =  &#8381</p>
                        <p class="total-price">Общая сумма заказа  &#8381</p>
                        <button type="submit" class="custom-form-btn">К оплате</button>
                        <span class="confidentiality-terms">
                            Нажимая  на кнопку «К Оплате», я даю свое согласие на обработку персональных данных, в соответствии с 
                            <a href="{{ url('/confidential') }}" class="terms-link">Политикой конфиденциальности</a>, а так же ознакомлен с условиями оплаты и доставки
                        </span>
                        <br>
                        <span class="confidentiality-terms">
                            * поля обязательные для заполнения
                        </span>
                        <input type="hidden" name="checkout-token" value="{{ csrf_token() }}">
                    </form>
                </div>
                <div class="order-information mobile-display-none">
                    <h3>ваш заказ</h3>
                    <div class="order-contents">

                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-popup">
            <div class="checkout-popup-wrapper">
                <p class="checkout-popup-txt"></p>
                <div class="custom-form-btn checkout-popup-btn">закрыть</div>
            </div>
        </div>
        <div class="loader-checkout-form loader-hide">
            <div class="lds-dual-ring"></div>
        </div>
    </section>

@endsection