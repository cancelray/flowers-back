"use strict";

const customFormSubmit = async function(event) {
    event.preventDefault();

    let values = customValidate(customForm);

    if (typeof(values) === 'number') {
        const validError = 'Проверьте правильность заполнения полей';   
        showPopup(validError);
        return;
    } else {
        showLoader();
        const inputToken = document.querySelector('input[name="token"]');
        let token = inputToken.value;
        
        let response = await fetch('/sendmail', {
            headers: {'X-CSRF-TOKEN': token},
            method: 'POST',
            body: values
        });
        if (response.ok) {
            removeLoader();
            customForm.reset();
            const success = 'Ваша заявка принята';
            showPopup(success);
        } else {
            removeLoader();
            const fail = 'Произошла ошибка сервера. Попробуйте ещё раз'
            showPopup(fail);
        }
    }
}

const customValidate = () => {
    let value = '';
    let errors = 0;

    const formInputs = document.querySelectorAll('._custom-input');

    for (let i = 0; i < formInputs.length; i++) {
        const input = formInputs[i];
        errorRemove(input);

        if (input.attributes.name.value === 'name') {
            if (input.value.length < 3 || !nameValid(input)) {
                errorAdd(input);
                errors++;
            } else {
                value += 'Имя: ' + input.value + ' ';
            }
        } else if (input.attributes.name.value === 'phone') {
            if (!phoneValid(input)) {
                errorAdd(input);
                errors++;
            } else {
                value += 'Телефон: ' + input.value + ' ';
            }
        } else if (input.attributes.name.value === 'custom-order') {
            if (input.value === '') {
                errorAdd(input);
                errors++;
            } else {
                value += 'Заказ: ' + input.value;
            }
        } 
    }

    if (errors > 0) {
        return errors;
    } else {
        return value;
    }
}

const nameValid = (input) => {
    return /^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/.test(input.value);
}

const phoneValid = (input) => {
    return /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/.test(input.value);
}

const errorAdd = (input) => {
    input.classList.add('error');
}

const errorRemove = (input) => {
    input.classList.remove('error');
}

const showLoader = () => {
    loader.classList.remove('loader-hide');
    formContainer.classList.add('low-opacity');
}

const removeLoader = () => {
    loader.classList.add('loader-hide');
    formContainer.classList.remove('low-opacity');
}

const showPopup = (text) => {
    popup.classList.add('show-popup');
    const popupText = document.querySelector('.popup-txt');
    popupText.innerText = text;
    formContainer.classList.add('low-opacity');
}

const closePopup = () => {
    popup.classList.remove('show-popup');
    formContainer.classList.remove('low-opacity');
}

const customForm = document.getElementById('custom-from');
customForm.addEventListener('submit', customFormSubmit);

const formContainer = document.getElementById('form-container');

const loader = document.querySelector('.loader-custom-form');

const popup = document.querySelector('.popup');
const popupWrapper = document.querySelector('.popup-wrapper');
const popupBtn = document.querySelector('.popup-btn');

popupBtn.addEventListener('click', closePopup);

window.onclick = (click) => {
    if (click.target !== popupWrapper && popup.classList.contains('show-popup')) {
        closePopup();
    }
}