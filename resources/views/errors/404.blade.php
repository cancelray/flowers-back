@extends('master')

@section('page-title', 'Our Favorite Flowers - Main')

@section('add-scripts', '')

@section('main-content')

    <section class="error-404">
        <div class="container">
            <div class="back">
                <p>ошибка 404</p>
                <p>упс...такой страницы нет</p>
                <a href="{{ url('/') }}">на главную</a>
            </div>
        </div>
    </section>

@endsection