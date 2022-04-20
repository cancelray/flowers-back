@extends('master')

@section('page-title', 'Our Favorite Flowers - Main')

@section('add-scripts')
<script defer src="{{ asset('/js/delivery-show.min.js') }}"></script>
@endsection

@section('main-content')

    <section class="checkout">
        <div class="container">
            <h6>Главная&nbsp;/ оформление заказа</h6>
            <h2 class="registration">оформление</h2>
            <h2 class="order">заказа</h2>
            <div class="checkout-wrapper">
                <div class="checkout-form">
                    <h3>Оформление заказа</h3>
                    <form action="">
                        <label for="name">Ваше имя*</label>
                        <input type="text" name="name" placeholder="Введите ваше имя">
                        <label for="phone">Ваш телефон*</label>
                        <input type="tel" name="phone" placeholder="+7 (888) 777-77-77">
                        <label for="email">Ваш e-mail*</label>
                        <input type="email" name="email" placeholder="Введите вашу почту">
                        <label for="receiver-phone">Телефон получателя (необязательно)</label>
                        <input type="tel" name="receiver-phone" placeholder="Введите вашу почту">
                        <label for="email">Имя получателя (необязательно)</label>
                        <input type="email" name="text" placeholder="Введите имя получателя">
                        <label for="email">Комментарий к заказу</label>
                        <input type="email" name="text" placeholder="Примечания к вашеу заказу,  особые пожелания отделу доставки">
                        
                        <h3 class="form-head-delivery">Доставка</h3>
                        <input type="radio" id="self-carrier" name="delivery-choose" value="self-carrier" class="cusom-ratio-input">
                        <label for="self-carrier" class="custom-radio">Самовывоз</label>
                        <input type="radio" id="courier-delivery" name="delivery-choose" value="courier-delivery" class="cusom-ratio-input">
                        <label for="courier-delivery" class="custom-radio">Доставка курьером</label>
                        <div class="courier-delivery-checkout display-none">
                            <label for="name">Город*</label>
                            <input type="text" name="city" placeholder="Город">
                            <label for="name">Улица*</label>
                            <input type="text" name="street" placeholder="Улица">	
                            <div class="small-inputs">
                                <div class="small-item">
                                    <label for="name">Корп/стр</label>
                                    <input type="text" name="building" placeholder="Корп/стр">	
                                </div>
                                <div class="small-item">
                                    <label for="name">Корп/стр</label>
                                    <input type="text" name="building" placeholder="Корп/стр">	
                                </div>
                                <div class="small-item">
                                    <label for="name">Дом</label>
                                    <input type="text" name="house" placeholder="Дом">
                                </div>
                                <div class="small-item">
                                    <label for="name">Кв/офис</label>
                                    <input type="text" name="room" placeholder="Кв/офис">
                                </div>
                                <div class="small-item">
                                    <label for="name">Время доставки</label>
                                    <input type="text" name="room" placeholder="">
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
                        <p class="delivery-price">Доставка = 0 &#8381</p>
                        <p class="total-price">Общая сумма заказа 334.00 &#8381</p>
                        <button class="custom-form-btn">К оплате</button>
                        <span class="confidentiality-terms">
                            Нажимая  на кнопку «К Оплате», я даю свое согласие на обработку персональных данных, в соответствии с 
                            <a href="" class="terms-link">Политикой конфиденциальности</a>, а так же ознакомлен с условиями оплаты и доставки
                        </span>
                    </form>
                </div>
                <div class="order-information mobile-display-none">
                    <h3>ваш заказ</h3>
                    <div class="order-contents">

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection