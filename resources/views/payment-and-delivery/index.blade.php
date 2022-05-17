@extends('master')

@section('page-title', 'Our Favorite Flowers - Payment and delivery')

@section('add-scripts', '')

@section('main-content')

    <section class="payment-and-delivery">
        <div class="container">
            <h6><a href="{{ url('/') }}">Главная</a>&nbsp;/ доставка и&nbsp;оплката</h6>
            <h2 class="delivery-header">доставка</h2>
            <h2 class="payment-header">и оплата</h2>
            <div class="payment">
                <h4>cпособы оплаты:</h4>
                <div class="payment-wrapper">
                    <div class="payment-item">
                        <img src="img/payment-and-delivery/payment-marker.png" alt="marker">
                        <p>
                            БАНКОВСКОЙ КАРТОЙ ПРИ ОФОРМЛЕНИИ ЗАКАЗА ЧЕРЕЗ САЙТ или по&nbsp;ссылке
                        </p>
                    </div>
                    <div class="payment-item">
                        <img src="img/payment-and-delivery/payment-marker.png" alt="marker">
                        <p>
                            НАЛИЧНЫМИ, БАНКОВСКОЙ КАРТОЙ ПРИ САМОВЫВОЗЕ или с&nbsp;расчетного счета орагнизации
                        </p>
                    </div>
                    <div class="payment-item">
                        <img src="img/payment-and-delivery/payment-marker.png" alt="marker">
                        <p>
                            НАЛИЧНЫМИ ПРИ ДОСТАВКЕ КУРЬЕРОМ
                        </p>
                    </div>
                    <div class="payment-item">
                        <img src="img/payment-and-delivery/payment-marker.png" alt="marker">
                        <p>
                            КРИПТОВАЛЮТОЙ
                        </p>
                    </div>
                </div>
            </div>
            <div class="delivery">
                <div class="delivery-price">
                    <h4>стоимость доставки:</h4>
                    <ul>
                        <li><strong>Бесплатно</strong> – при заказе на сумму <span class="green">от 2500 рублей</span</li>
                        <li><strong>300 рублей</strong> – при заказе на сумму <span class="green">менее 2500 рублей</span</li>
                        <li>Так&nbsp;же вы&nbsp;можете забрать ваш заказ самостоятельно по&nbsp;адресу: г. Тула, пр. Ленина д. 111, оф. 11</li>

                    </ul>
                </div>
                <div class="delivery-terms">
                    <h4>условия доставки:</h4>
                    <ul>
                        <li>доставка осуществляется по городу Тула <span class="green">в любой день</span></li>
                        <li>возможность, сроки и&nbsp;стоимость доставки за&nbsp;пределы Тулы, доставки в&nbsp;ночное время, праздники <span class="green">оговариваются с менеджером</span></li>
                    </ul>
                </div>
            </div>
            <div class="delivery-additional">
                    <h4>Дополнительно:</h4>
                    <p>
                        Доставка иному лицу возможна только в&nbsp;случае оплаты заказа заказчиком. Доставка осуществляется не&nbsp;ранее чем через 
                        2&nbsp;часа после оплаты заказа, но&nbsp;может быть ранее, если букет есть в&nbsp;наличии либо по&nbsp;договорённости с&nbsp;менеджером.
                    </p>
                    <p>
                        Время ожидания курьера составляет 15&nbsp;минут.
                    </p>
                    <p>
                        В&nbsp;случае если на&nbsp;момент доставки цветов получателя нет либо нет возможности по&nbsp;иным причинам произвести доставку (указан неточный адрес, 
                        закрытая входная дверь, контрольно-пропускная система и&nbsp;др.), мы&nbsp;оставляем за&nbsp;собой право по&nbsp;собственному выбору:
                    </p>
                    <ul>
                        <li>оставить цветы тому, кто открыл дверь;</li>
                        <li>с&nbsp;заказчиком согласовать повторную доставку, которая дополнительно оплачивается;</li>
                        <li>отказаться от&nbsp;передачи цветов без возврата денежных средств.</li>
                    </ul>
                    <span>
                        Если вы либо иной получатель не получили заказ, вам необходимо сообщить об этом менеджеру по телефону <span class="green">+7(920)277-75-55</span>
                    </span>
                    <h4>Возврат денег:</h4>
                    <p>
                        При отказе заказчика от&nbsp;заказа в&nbsp;течение двух часов, если заказ ещё не&nbsp;начал готовиться, средства возвращаются в&nbsp;полном объёме. 
                        Если&nbsp;же флорист начал подготовку, то&nbsp;заказчик имеет право на&nbsp;возврат&nbsp;50% стоимости, либо, если ещё не&nbsp;был оплачен, 
                        то&nbsp;обязан оплатить&nbsp;50%.
                    </p>
                    <p>
                        Цветы надлежащего качества возврату и&nbsp;обмену не&nbsp;подлежат, а&nbsp;если имеются какие-либо недостатки в&nbsp;цветах&nbsp;&mdash; возврат производится лишь 
                        если эти недостатки не&nbsp;являются природными и&nbsp;естественными изъянами растения. Возврат денежных средств производится незамедлительно на&nbsp;тот счёт, 
                        с&nbsp;которого произошла оплата, их&nbsp;же поступление на&nbsp;счёт зависит от&nbsp;платёжной системы.
                    </p>
            </div>
        </div>
    </section>
    
@endsection