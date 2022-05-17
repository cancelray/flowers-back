@extends('master')

@section('page-title', 'Our Favorite Flowers - Contacts')

@section('add-scripts', '')

@section('main-content')

    <section class="contacts">
        <div class="container">
            <h6><a href="{{ url('/') }}">Главная</a>&nbsp;/ контакты</h6>
            <h2>контакты</h2>
            <div class="contact-wrapper">
                <div class="contact-item">
                    <h3>время работы</h3>
                    <p>с&nbsp;10:00 до&nbsp;21:00 без выходных</p>
                </div>
                <div class="contact-item">
                    <h3>адрес</h3>
                    <p>г. Тула, пр. Ленина д. 111, оф. 11</p>
                </div>
                <div class="contact-item">
                    <h3>телефон</h3>
                    <p>+7(920)277-75-55</p>
                </div>
                <div class="contact-item">
                    <h3>email</h3>
                    <p>zakaz@myflowers.ru</p>
                </div>
            </div>
            <div class="map">
                <h3>мы на карте</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2335.9013570395523!2d37.58536971636609!3d54.16411102084231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41343ffb3d028a23%3A0x9aded1963130c566!2z0L_RgC4g0JvQtdC90LjQvdCwLCAxMTEsINCi0YPQu9CwLCDQotGD0LvRjNGB0LrQsNGPINC-0LHQuy4sIDMwMDAyNg!5e0!3m2!1sru!2sru!4v1648980148709!5m2!1sru!2sru" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

@endsection