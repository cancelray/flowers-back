"use strict";

const addToCart = document.querySelectorAll(".add-to-cart");

addToCart.forEach( elem => {
    elem.addEventListener("click", click => {
        const productId=click.target.dataset.id;
        console.log(123);
        let request = new XMLHttpRequest;
        const url = "/cart/add/"+productId;
        
        request.addEventListener("readystatechange", ()=> {4===request.readyState&&200===request.status&&getCart()});

        request.open("GET", url);
        request.send();
    });
});