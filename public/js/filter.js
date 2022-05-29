"use strict";

async function getProducts() {
    const path =  document.location.pathname + '/get/products';
    let productsFromDb = await fetch(path);
    let dbProductsJson = await productsFromDb.json();

    const productsArr = [];

    dbProductsJson.forEach(elem => {
        productsArr.push(elem);
    })

    return productsArr;
}

getProducts().then(productsArr => {
    const allFilters = document.querySelectorAll('input[data-filter]');
    const productsWrapper = document.querySelector('.products');
    const pagination = document.querySelector('.pagination');

    const colorsArr = [];
    const formatsArr = [];
    let productsByColor = [];
    let productsByFormat = [];
    
    allFilters.forEach(filter => {
        filter.onchange = () => {
            if (filter.checked) {
                productsWrapper.innerHTML = '';
                pagination.style.display = 'none';

                if (filter.classList.contains('color-filter')) {
                    colorsArr.push(filter.dataset.id);
                    colorsArr.reverse();
                    productsByColor = [];

                    for (let i = 0; i < colorsArr.length; i++) {
                        productsArr.forEach(product => {
                            if (product['color_id'] == colorsArr[i]) {
                                productsByColor.push(product);
                            }
                        })
                    }
                } else if (filter.classList.contains('format-filter')) {
                    formatsArr.push(filter.dataset.id);
                    formatsArr.reverse();
                    productsByFormat = [];

                    for (let i = 0; i < formatsArr.length; i++) {
                        productsArr.forEach(product => {
                            if (product['format_id'] == formatsArr[i]) {
                                productsByFormat.push(product);
                            }
                        });
                    }
                } 
            } else {
                productsWrapper.innerHTML = '';

                if (filter.classList.contains('color-filter')) {
                    let colorIndex = colorsArr.indexOf(filter.dataset.id);
                    colorsArr.splice(colorIndex, 1);
                    productsByColor = [];

                    for (let i = 0; i < colorsArr.length; i++) {
                        productsArr.forEach(product => {
                            if (product['color_id'] == colorsArr[i]) {
                                productsByColor.push(product);
                            }
                        });
                    }
                } else if (filter.classList.contains('format-filter')) {
                    let formatIndex = formatsArr.indexOf(filter.dataset.id);
                    formatsArr.splice(formatIndex, 1);
                    productsByFormat = [];

                    for (let i = 0; i < formatsArr.length; i++) {
                        productsArr.forEach(product => {
                            if (product['format_id'] == formatsArr[i]) {
                                productsByFormat.push(product);
                            }
                        });
                    }
                } 
            }

            if (productsByFormat.length != 0 && productsByColor.length != 0) {
                if (productsByFormat.length >= productsByColor.length) {
                    for (let i = 0; i < productsByFormat.length; i++) {
                        for (let j = 0; j < productsByColor.length; j++) {
                            if (productsByFormat[i]['id'] === productsByColor[j]['id']) {
                                productCreate(productsByFormat[i], productsWrapper);
                            }
                        }
                    }
                } else {
                    for (let i = 0; i < productsByColor.length; i++) {
                        for (let j = 0; j < productsByFormat.length; j++) {
                            if (productsByColor[i]['id'] === productsByFormat[j]['id']) {
                                productCreate(productsByColor[i], productsWrapper);
                            }
                        }
                    }
                }
            }

            if (productsByFormat.length === 0) {
                productsByColor.forEach(product => {
                    productCreate(product, productsWrapper);
                });
            } 

            if (productsByColor.length === 0) {
                productsByFormat.forEach(product => {
                    productCreate(product, productsWrapper);
                });
            }
            
            if (colorsArr.length === 0 && formatsArr.length === 0) {
                window.location.href = window.location.href;
            } else if (!productsWrapper.childNodes.length) {
                const noProductsFound = document.createElement('h4');
                noProductsFound.innerText = 'Поиск не дал результатов. Попробуйте изменить фильтры';

                productsWrapper.appendChild(noProductsFound);
            }
        }
    });
});


const productCreate = (product, productsWrapper) => {
    const catalogItem = document.createElement('div');
    catalogItem.classList.add('catalog-item');
    
    const productLink = document.createElement('a');
    
    productLink.href = '/product/' + product['translate_name'];

    const productImg = document.createElement('img');
    productImg.src = '/img/catalog/' + product['img'];
    productImg.alt = product['translate_name'];
    productLink.appendChild(productImg);

    const productName = document.createElement('h4');
    productName.innerText = product['name'];
    productLink.appendChild(productName);

    const productPrice = document.createElement('h4');
    productPrice.classList.add('price');
    productPrice.innerText = product['price'] + ' \u20bd';
    productLink.appendChild(productPrice);

    catalogItem.appendChild(productLink);

    const addToCartBtn = document.createElement('div');
    addToCartBtn.classList.add('add-to-cart-btn');
    addToCartBtn.classList.add('add-to-cart');
    addToCartBtn.dataset.id = product['id'];
    addToCartBtn.innerText = 'в корзину';
    catalogItem.appendChild(addToCartBtn);

    productsWrapper.appendChild(catalogItem);

    addToCartBtn.addEventListener("click", click => {
        const productId=click.target.dataset.id;
        console.log(123);
        let request = new XMLHttpRequest;
        const url = "/cart/add/"+productId;
        
        request.addEventListener("readystatechange", ()=> {4===request.readyState&&200===request.status&&getCart()});

        request.open("GET", url);
        request.send();
    });
}
