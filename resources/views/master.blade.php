<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/flower-bouquet.png') }}"/>
        <title>@yield('page-title')</title>
        <meta name="description" content="ourflowers">
        <link href="{{ asset('style/css/index.min.css') }}" rel="stylesheet" type="text/css">
        <script defer src="{{ asset('js/cart.min.js') }}"></script>
		<script defer src="{{ asset('js/cart-show.min.js') }}"></script>
        <script defer src="{{ asset('js/burger.min.js') }}"></script>
        @yield('add-scripts')
    </head>

<body>
	<div class="page-wrapper">
		<header class="header">
			<div class="container desc-header">
				<div class="logo-header"><a href="{{ url('/') }}"><img src="{{ asset('img/header/logo.png') }}" alt="logo">Our Flowers</a></div>
				<nav class="navigation">
					<a href="{{ url('/catalog') }}">Каталог</a>
					<a href="{{ url('/payment-and-delivery') }}">Доставка и оплата</a>
					<a href="{{ url('/about') }}">О нас</a>
					<a href="{{ url('/faq') }}">FAQ</a>
				</nav>
				<div class="socials-header">
					<a href="https://vk.com/_our_flowers"><img src="{{ asset('img/header/socials/vk.png') }}" alt="vk" target="_blank"></a>
					<a href="https://wa.me/8xxxxxxxxxx"><img src="{{ asset('img/header/socials/whatsapp.png') }}" alt="whatsapp" target="_blank"></a>
					<a href="https://telegram.me/_our_flowers"><img src="{{ asset('img/header/socials/telegram.png') }}" alt="tg" target="_blank"></a>
				</div>
				<div class="cart-icon"><img src="{{ asset ('img/header/cart.png') }}" alt="cart"><p class="in-cart-count"></p></div>
			</div>
			<div class="container mobile-header">
				<div class="mobile-menu">
					<div class="menu-item"></div>
					<div class="menu-item"></div>
					<div class="menu-item"></div>
				</div>
				<div class="logo-header"><a href="{{ url('/') }}"><img src="{{ asset('img/header/logo.png') }}" alt="logo">Our Flowers</a></div>
				<div class="cart-icon"><img src="{{ asset ('img/header/cart.png') }}" alt="cart"><p class="in-cart-count"></p></div>
				<div class="mobile-menu-burger hide">
					<div class="burger-wrapper">
						<div class="burger-links">
							<nav class="navigation">
								<a href="{{ url('/') }}">Главная</a>
								<a href="{{ url('/catalog') }}">Каталог</a>
								<a href="{{ url('/payment-and-delivery') }}">Доставка и оплата</a>
								<a href="{{ url('/about') }}">О нас</a>
								<a href="{{ url('/faq') }}">FAQ</a>
							</nav>
						</div>
						<div class="burger-contacts">
							<div class="burger-email">
								<a href="mailto:zakaz@myflowers.ru">zakaz@myflowers.ru</a>
								<span>Доставка 24/7 по договоренности с оператором</span>
							</div>
							<div class="burger-address">
								<p>г. Тула, пр. Ленина д. 111, оф. 11  </p>
								<span class="add-info">10:00 до 21:00</span>
								<span class="add-info">без выходных</span>
							</div>
							<div class="burger-phone">
								<a href="tel:+79202777555">+7(920)277-75-55</a>
								<span class="add-info">прием звонков круглосуточно</span>
							</div>
							<div class="burger-socials">
								<a href="https://vk.com/_our_flowers"><img src="{{ asset('img/header/socials/vk.png') }}" alt="vk" target="_blank"></a>
								<a href="https://wa.me/8xxxxxxxxxx"><img src="{{ asset('img/header/socials/whatsapp.png') }}" alt="whatsapp" target="_blank"></a>
								<a href="https://telegram.me/_our_flowers"><img src="{{ asset('img/header/socials/telegram.png') }}" alt="tg" target="_blank"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cart-wrapper cart-hide">
				<div class="cart-container">
					<div class="cart-head">
						<h3 class="cart-header">ваша корзина</h3>
						<div class="close-cart"><img src="{{ asset('img/header/cart/close.png') }}" alt="close"></div>
					</div>
					<div class="cart-contents"></div>
					<div class="cart-checkout">
						<p class="full-price"></p>
						<p>Чтобы узнать стоимость доставки, перейдите к оформлению заказа.</p>
						<a class="add-to-cart-btn cart-checkout-btn" href="{{ url('/checkout') }}">оформить заказ</a>
					</div>
				</div>
			</div>
		</header>

		<main class="landing-page">
            @yield('main-content')
		</main>

		<footer class="footer">
			<div class="container">
				<div class="logo-footer">
					<a href="{{ url('/') }}" class="logo-footer-link"><img src="{{ asset('img/footer/logo.png') }}" alt="logo">Our Flowers</a>
					<div class="requisites">
						<h5>Реквизиты</h5>
						<p>
							ООО "НашиЦветы" 300000, Россия, г. Тула, пр. Ленина д. 111, оф. 11  
							ИНН 123456789, р/с 5500930067 ПАО «Сбербанк», БИК 8604
						</p>
					</div>
				</div>
				<div class="menu-footer">
                    <a href="{{ url('/catalog') }}">Каталог</a>
					<a href="{{ url('/payment-and-delivery') }}">Доставка и оплата</a>
					<a href="{{ url('/about') }}">О нас</a>
					<a href="{{ url('/faq') }}">FAQ</a>
					<a href="{{ url('/contacts') }}">Контакты</a>
				</div>
				<div class="info-footer">
					<div class="email-footer">
						<a href="mailto:zakaz@myflowers.ru">zakaz@myflowers.ru</a>
						<span class="add-info">Доставка 24/7 по договоренности с оператором</span>
					</div>
					<div class="address-frooter">
						<p>г. Тула, пр. Ленина д. 111, оф. 11  </p>
						<span class="add-info">10:00 до 21:00</span>
						<span class="add-info">без выходных</span>
					</div>
					<div class="phone-footer">
						<a href="tel:+79202777555">+7(920)277-75-55</a>
						<span class="add-info">прием звонков круглосуточно</span>
					</div>
					<div class="socials-footer">
						<a href="https://vk.com/_our_flowers"><img src="{{ asset('img/footer/socials/vk.png') }}" alt="vk" target="_blank"></a>
						<a href="https://wa.me/8xxxxxxxxxx"><img src="{{ asset('img/footer/socials/whatsapp.png') }}" alt="whatsapp" target="_blank"></a>
						<a href="https://telegram.me/_our_flowers"><img src="{{ asset('img/footer/socials/telegram.png') }}" alt="tg" target="_blank"></a>
					</div>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>