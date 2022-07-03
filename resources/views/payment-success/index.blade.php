@extends('master')

@section('page-title', 'Our Favorite Flowers - Payment Success')

@section('add-scripts', '')

@section('main-content')

    <section class="payment-success">
        <div class="container">
            <h2 class="payment">Оплата прошла</h2>
            <h2 class="success">успешно!</h2>
            <div class="payment-success-wrapper">
                <p>Спасибо за заказ!</p>
                <p>Вы получите уведомление о статусе вашего заказа</p>
                <a href="{{ url('/') }}">на главную</a>
            </div>
        </div>
    </section>

@endsection