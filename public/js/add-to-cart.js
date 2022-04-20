const addToCart = document.querySelectorAll(".add-to-cart");

addToCart.forEach( elem => {
    elem.addEventListener("click", click => {
        const productId=click.target.dataset.id;
        
        let request = new XMLHttpRequest;
        url = "/flowers-laravel/public/cart/add/"+productId;
        
        request.addEventListener("readystatechange", ()=> {4===request.readyState&&200===request.status&&getCart()});

        request.open("GET", url);
        request.send()
    });
});