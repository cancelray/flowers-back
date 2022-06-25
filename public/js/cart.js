"use strict";

const deleteFromCart = (click) => {
    const productId = click.target.dataset.id;

    let request = new XMLHttpRequest;
    let url = "/cart/remove/" + productId;
  
    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            getCart();
        }
    });

    request.open("GET", url);
    request.send();
}

const decrementInCart = (click) => {
    const productId = click.target.dataset.id;

    let request = new XMLHttpRequest;
    let url = "/cart/decrement/" + productId;
  
    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            getCart();
        }
    });

    request.open("GET", url);
    request.send();
}

const incrementInCart = (click) => {
    const productId = click.target.dataset.id;

    let request = new XMLHttpRequest;
    let url = "/cart/increment/" + productId;
  
    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            getCart();
        }
    });

    request.open("GET", url);
    request.send();
}

const emptyCartBtn = (click) => {
    click.preventDefault();
}

async function getCart() {
    const cartCheckout = document.querySelector('.cart-checkout-btn');
    const isCheckout = document.querySelector('.order-contents') ? true : false;
    const orderContents = isCheckout ?  document.querySelector('.order-contents') : '';


    if (isCheckout) {
        while (orderContents.firstChild) {
            orderContents.firstChild.remove();
        }
    }

    cartCheckout.removeEventListener('click', emptyCartBtn);
    cartCheckout.classList.remove('disabled-btn');

    let products = await fetch('/cart/show/');
    let productsJson = await products.json();

    const inCartCount = document.querySelector('.in-cart-count');
    inCartCount.innerText = '(' + productsJson[productsJson.length - 1]['totalCount'] + ')';

    const cartContents = document.querySelector('.cart-contents');
    while (cartContents.firstChild) {
        cartContents.firstChild.remove();
    }

    productsJson.forEach(element => {
        if (element['totalPrice'] === 0) {
            const cartHeader = document.querySelector('.cart-header');

            cartHeader.innerText = 'ваша корзина пуста';
            cartCheckout.addEventListener('click', emptyCartBtn);
            cartCheckout.classList.add('disabled-btn');

            const catalogLink = document.createElement('p');
            catalogLink.innerHTML = `Сейчас ваша корзина пуста, но мы уверены, что в нашем <a style="color:#43ffd2" href="/catalog">каталоге</a> вы что нибудь найдете!`;
            cartContents.appendChild(catalogLink);
        }
    });

    for (let i = 0; i < productsJson.length - 2; i++) {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        const cartItemImg = document.createElement('img');
        cartItemImg.src = '/public/' + productsJson[i]['img'];
        cartItemImg.alt = productsJson[i]['translate_name'];
        cartItem.appendChild(cartItemImg);

        const cartInfo = document.createElement('div');
        cartInfo.classList.add('cart-info');
        cartItem.appendChild(cartInfo);

        const namePrice = document.createElement('div');
        namePrice.classList.add('name-price');
        cartInfo.appendChild(namePrice);

        const productName = document.createElement('p');
        productName.classList.add('in-cart-name');
        productName.innerText = productsJson[i]['name'];

        const productPrice = document.createElement('p');
        productPrice.classList.add('in-cart-price');
        productPrice.innerText = productsJson[i]['price'] + ' \u20bd';

        namePrice.appendChild(productName);
        namePrice.appendChild(productPrice);

        const amountDelete = document.createElement('div');
        amountDelete.classList.add('amount-delete');
        cartInfo.appendChild(amountDelete); 

        const cartAmount = document.createElement('div');
        cartAmount.classList.add('in-cart-amount');
        const decrement = document.createElement('div');
        decrement.classList.add('decrement');
        decrement.setAttribute('data-id', productsJson[i]['id']);
        decrement.addEventListener('click', decrementInCart);
        decrement.innerText = '-';

        const count = document.createElement('div');
        count.classList.add('count');
        count.innerText = productsJson[i]['count'];

        const increment = document.createElement('div');
        increment.classList.add('increment');
        increment.setAttribute('data-id', productsJson[i]['id']);
        increment.addEventListener('click', incrementInCart);
        increment.innerText = '+';

        cartAmount.appendChild(decrement); 
        cartAmount.appendChild(count); 
        cartAmount.appendChild(increment); 

        const cartDelete = document.createElement('p');
        cartDelete.classList.add('delete-from-cart');
        cartDelete.innerText = 'удалить';
        cartDelete.setAttribute('data-id', productsJson[i]['id']);
        cartDelete.addEventListener('click', deleteFromCart);

        amountDelete.appendChild(cartAmount); 
        amountDelete.appendChild(cartDelete); 

        cartContents.appendChild(cartItem);

        if (isCheckout) {
            const orderItem = document.createElement('div');
            orderItem.classList.add('order-item');
    
            const orderItemImg = document.createElement('img');
            orderItemImg.src = '/public/' + productsJson[i]['img'];
            orderItemImg.alt = productsJson[i]['translate_name'];
            orderItem.appendChild(orderItemImg);
    
            const orderInfo = document.createElement('div');
            orderInfo.classList.add('order-info');
            orderItem.appendChild(orderInfo);
    
            const orderNamePrice = document.createElement('div');
            orderNamePrice.classList.add('name-price');
            orderInfo.appendChild(orderNamePrice);
    
            const orderProductName = document.createElement('p');
            orderProductName.classList.add('in-order-name');
            orderProductName.innerText = productsJson[i]['name'];
    
            const orderProductPrice = document.createElement('p');
            orderProductPrice.classList.add('in-order-price');
            orderProductPrice.innerText = productsJson[i]['price'] + ' \u20bd';
    
            orderNamePrice.appendChild(orderProductName);
            orderNamePrice.appendChild(orderProductPrice);
    
            const orderAmountDelete = document.createElement('div');
            orderAmountDelete.classList.add('amount-delete');
            orderInfo.appendChild(orderAmountDelete); 
    
            const orderAmount = document.createElement('div');
            orderAmount.classList.add('in-order-amount');
            const orederDecrement = document.createElement('div');
            orederDecrement.classList.add('decrement');
            orederDecrement.setAttribute('data-id', productsJson[i]['id']);
            orederDecrement.addEventListener('click', decrementInCart);
            orederDecrement.innerText = '-';
    
            const orderCount = document.createElement('div');
            orderCount.classList.add('count');
            orderCount.innerText = productsJson[i]['count'];
    
            const orderIncrement = document.createElement('div');
            orderIncrement.classList.add('increment');
            orderIncrement.setAttribute('data-id', productsJson[i]['id']);
            orderIncrement.addEventListener('click', incrementInCart);
            orderIncrement.innerText = '+';
    
            orderAmount.appendChild(orederDecrement); 
            orderAmount.appendChild(orderCount); 
            orderAmount.appendChild(orderIncrement); 
    
            const orderCartDelete = document.createElement('p');
            orderCartDelete.classList.add('delete-from-order');
            orderCartDelete.innerText = 'удалить';
            orderCartDelete.setAttribute('data-id', productsJson[i]['id']);
            orderCartDelete.addEventListener('click', deleteFromCart);
    
            orderAmountDelete.appendChild(orderAmount); 
            orderAmountDelete.appendChild(orderCartDelete); 
    
            orderContents.appendChild(orderItem);
        }
    }

    const cartPrice = document.querySelector('.full-price');
    cartPrice.innerText = 'Предварительный итог: ' + productsJson[productsJson.length - 2]['totalPrice'] + ' \u20bd';

    if (isCheckout) {
        const totalPrice = document.querySelector('.total-price');
        const deliveryPrice = document.querySelector('.delivery-price');

        const freeDeliveryThreshold = 2500;
        const delivery = 300;
        let checkoutPrice = productsJson[productsJson.length - 2]['totalPrice']

        if (productsJson[productsJson.length - 2]['totalPrice'] < freeDeliveryThreshold) {
            checkoutPrice += delivery;
            totalPrice.innerText = `Общая сумма заказа ${checkoutPrice} ₽`;
            deliveryPrice.innerText = `Доставка = ${delivery} ₽`;
        } else {
            totalPrice.innerText = `Общая сумма заказа ${checkoutPrice} ₽`;
            deliveryPrice.innerText = `Доставка = ${0} ₽`;
        }

        const orderPrice = document.createElement('h3');
        orderPrice.innerText = 'Предварительный итог: ' + productsJson[productsJson.length - 2]['totalPrice'] + ' \u20bd';
        orderContents.appendChild(orderPrice);
        

    }
}

getCart();