"use strict";

const openFilter = (click) => {
    let target = click.target;
    if (target.classList.contains('mobile-filter-header') && filters.classList.contains('display-none')) {
        filters.classList.remove('display-none');
        filterHeader.classList.add('active');
    } else if (target.classList.contains('mobile-filter-header') && !filters.classList.contains('display-none')) {
        filters.classList.add('display-none');
        filterHeader.classList.remove('active');
    }
}

const filterHeader = document.querySelector('.mobile-filter-header');
const filters = document.querySelector('.filter-form');

filterHeader.addEventListener('click', openFilter);
