@extends('master')

@section('page-title', 'Our Favorite Flowers - Payment Error')

@section('add-scripts', '')

@section('main-content')

    <section class="payment-error">
        <div class="container">
            <h2 class="error">ошибка</h2>
            <h2 class="payment">платежа</h2>
            <div class="payment-error-wrapper">
                <p>Произошла ошибка</p>
                <p>Попробуйте оплатить еще раз!</p>
                <div class="buttons-wrapper">
                    <a href="/" class="custom-form-btn">повторить</a>
                    <a href="{{ url('/') }}" class="back">вернуться на главную</a>
                </div>
            </div>
        </div>
    </section>

@endsection