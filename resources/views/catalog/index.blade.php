@extends('master')

@section('page-title', 'Our Favorite Flowers - Catalog')

@section('add-scripts', 'js/catalog.min.js')

@section('main-content')

    <section class="catalog">
        <div class="container">
            <h6>Главная&nbsp;/ каталог {{ $categoryName }}</h6>
            <h2 class="catalog-h">каталог</h2>
            <h2 class="bouquets-h">букетов</h2>
            <p>В&nbsp;нашем магазине самый большой выбор букетов:</p>
            <div class="catalog-sections">

                @foreach ($categories as $category)
                    <div class="section-item">
                        <a href="{{ url('/catalog') }}/{{ $category->translate_name }}">{{ $category->name }}</a>
                    </div>            
                @endforeach

            </div>
            <div class="mobile-filter">
                <h3 class="mobile-filter-header">фильтр товаров</h3>
                <form action="" class="filter-form display-none">
                    <div class="filter-item">
                        <h5>по цвету</h5>

                        @foreach ($colors as $color)
                            <div class="form-item">
                                <input type="checkbox" id="{{ $color->for_checkbox }}" data-id="{{ $color->id }}">
                                <label for="{{ $color->for_checkbox }}">{{ $color->color }}</label>
                            </div>
                        @endforeach

                    </div>
                    <div class="filter-item">
                        <h5>по формату</h5>

                        @foreach ($formats as $format)
                            <div class="form-item">
                                <input type="checkbox" id="{{ $format->for_checkbox }}" data-id="{{ $format->id }}">
                                <label for="{{ $format->for_checkbox }}">{{ $format->format }}</label>
                            </div>
                        @endforeach

                    </div>
                    <button class="add-to-cart-btn">Применить</button>
                </form>
            </div>
            <div class="catalog-wrapper">
                <div class="filter-wrapper">
                    <form action="" class="filter-form">
                        <div class="filter-item">
                            <h5>по цвету</h5>
                            
                            @foreach ($colors as $color)
                                <div class="form-item">
                                    <input type="checkbox" id="{{ $color->for_checkbox }}-desc">
                                    <label for="{{ $color->for_checkbox }}-desc">{{ $color->color }}</label>
                                </div>
                            @endforeach

                        </div>
                        <div class="filter-item">
                            <h5>по формату</h5>

                            @foreach ($formats as $format)
                                <div class="form-item">
                                    <input type="checkbox" id="{{ $format->for_checkbox }}-desc">
                                    <label for="{{ $format->for_checkbox }}-desc">{{ $format->format }}</label>
                                </div>
                            @endforeach

                        </div>
                        <button class="add-to-cart-btn">Применить</button>
                    </form>
                </div>
                <div class="products-wrapper">

                    @foreach ($products as $product)
                        <div class="catalog-item">
                            <a href="{{ url('/product') }}/{{ $product->translate_name }}">
                                <img src="{{ asset('/') }}/{{ $product->img }}" alt="{{ $product->translate_name }}">
                                <h4>{{ $product->name }}</h4>
                                <h4 class="price">{{ $product->price }} &#8381</h4>
                            </a>
                            <div class="add-to-cart-btn" data-id="{{ $product->id }}">в корзину</div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

@endsection