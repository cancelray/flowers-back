@extends('master')

@section('page-title', 'Our Favorite Flowers - Catalog')

@section('add-scripts', 'js/faq.min.js')

@section('main-content')

    <section class="catalog">
        <div class="container">
            <h6>Главная&nbsp;/ каталог</h6>
            <h2 class="catalog-h">каталог</h2>
            <h2 class="bouquets-h">букетов</h2>
            <p>В&nbsp;нашем магазине самый большой выбор букетов:</p>
            <div class="catalog-sections">
                <div class="section-item">
                    <a href="">Популярное</a>
                </div>
                <div class="section-item">
                    <a href="">Сухоцветы</a>
                </div>
                <div class="section-item">
                    <a href="">Букеты роз</a>
                </div>
                <div class="section-item">
                    <a href="">Композиции из цветов</a>
                </div>
                <div class="section-item">
                    <a href="">Упаковка подарков</a>
                </div>
                <div class="section-item">
                    <a href="">Шары</a>
                </div>
                <div class="section-item">
                    <a href="">Открытки</a>
                </div>
                <div class="section-item">
                    <a href="">Конверты</a>
                </div>
            </div>
            <div class="mobile-filter">
                <h3 class="mobile-filter-header">фильтр товаров</h3>
                <form action="" class="filter-form display-none">
                    <div class="filter-item">
                        <h5>по цвету</h5>
                        <div class="form-item">
                            <input type="checkbox" id="white" name="white">
                            <label for="white">белый</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="yellow" name="yellow">
                            <label for="yellow">желтый</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="green" name="green">
                            <label for="green">зеленый</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="red" name="red">
                            <label for="red">красный</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="orange" name="orange">
                            <label for="orange">оранжевый</label>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h5>по формату</h5>
                        <div class="form-item">
                            <input type="checkbox" id="bouquet" name="bouquet">
                            <label for="bouquet">букет</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="vase" name="vase">
                            <label for="vase">в вазе</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="envelope" name="envelope">
                            <label for="envelope">в конверте</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="basket" name="basket">
                            <label for="basket">в корзине</label>
                        </div>
                        <div class="form-item">
                            <input type="checkbox" id="box" name="box">
                            <label for="box">в ящике</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="catalog-wrapper">
                <div class="filter-wrapper">
                    <form action="" class="filter-form">
                        <div class="filter-item">
                            <h5>по цвету</h5>
                            <div class="form-item">
                                <input type="checkbox" id="white-desc" name="white-desc">
                                <label for="white-desc">белый</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="yellow-desc" name="yellow-desc">
                                <label for="yellow-desc">желтый</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="green-desc" name="green-desc">
                                <label for="green-desc">зеленый</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="red-desc" name="red-desc">
                                <label for="red-desc">красный</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="orange-desc" name="orange-desc">
                                <label for="orange-desc">оранжевый</label>
                            </div>
                        </div>
                        <div class="filter-item">
                            <h5>по формату</h5>
                            <div class="form-item">
                                <input type="checkbox" id="bouquet-desc" name="bouquet-desc">
                                <label for="bouquet-desc">букет</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="vase-desc" name="vase-desc">
                                <label for="vase-desc">в вазе</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="envelope-desc" name="envelope-desc">
                                <label for="envelope-desc">в конверте</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="basket-desc" name="basket-desc">
                                <label for="basket-desc">в корзине</label>
                            </div>
                            <div class="form-item">
                                <input type="checkbox" id="box-desc" name="box-desc">
                                <label for="box-desc">в ящике</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="products-wrapper">
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/1.png" alt="1">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/2.png" alt="2">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/3.png" alt="3">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/4.png" alt="4">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/5.png" alt="5">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/6.png" alt="6">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/7.png" alt="7">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/8.png" alt="8">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                    <div class="catalog-item">
                        <a href="">
                            <img src="img/catalog/8.png" alt="8">
                            <h4>name</h4>
                            <h4 class="price">111.00 &#8381</h4>
                        </a>
                        <div class="add-to-cart-btn">в корзину</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection