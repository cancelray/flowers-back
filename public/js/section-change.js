"use strict";

let path = location.pathname;
const directories = path.split("/");
const lastDirecotry = directories[(directories.length - 1)];

const sectionItems = document.querySelectorAll('.section-item');

sectionItems.forEach(element => {
    if (lastDirecotry === element.dataset.id) {
        element.classList.add('current-item');
    }
});