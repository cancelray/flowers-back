"use strict";

const openBlock = (click) => {
    let target = click.target;
    if (target.classList.contains('faq-question') && target.nextElementSibling.classList.contains('display-none')) {
        target.nextElementSibling.classList.remove('display-none');
    } else if ((target.classList.contains('faq-question') && !target.nextElementSibling.classList.contains('display-none')) || 
                target.classList.contains('faq-answer')) {
        target.nextElementSibling.classList.add('display-none');
    }
}

const items = document.querySelectorAll('.faq-item');

items.forEach(elem => {
    elem.addEventListener('click', openBlock);
});