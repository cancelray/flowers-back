"use strict";

const checkoutSubmit = async function(event) {
    event.preventDefault();
    const notFilledInputs = 1000;

    let values = checkoutValid(notFilledInputs);

    if (typeof(values) === 'number') {
        if (values === notFilledInputs) {
            const notFillError = 'Заполнтие все обязательные поля';
            showCheckoutPopup(notFillError);
        } else {
            const validError = 'Проверьте правильность заполнения полей';
            showCheckoutPopup(validError);
        }
    }
}

const checkoutValid = (notFilledInputs) => {
    let value = {};
    let errors = 0;
    let isError = false;

    const requiredInputs = document.querySelectorAll('._required-input');
    const requiredInputsDelivery = document.querySelectorAll('._required-input-delivery');
    const mainCheckout = document.querySelectorAll('._main-checkout');
    const deliveryCheckout = document.querySelectorAll('._delivery-checkout');
    const radioLabels  = document.querySelectorAll('.custom-radio');
    const deliveryCheck = document.querySelector('input[name="delivery-choose"]:checked');
    const paymentCheck = document.querySelector('input[name="payment-form"]:checked');

    if (deliveryCheck && paymentCheck) {  
        radioLabels.forEach(e => {
            e.classList.remove('text-error');
        });

        for (let i = 0; i < requiredInputs.length; i++) {
            errorRemove(requiredInputs[i]);
            if (!requiredInputs[i].value) {
                for (let j = 0; j < requiredInputs.length; j++) {
                    if (!requiredInputs[j].value) {
                        requiredInputs[j].classList.add('error');
                    }
                }
                isError = true;
            }
        }
    } else {
        radioLabels.forEach(e => {
            e.classList.add('text-error');
        });
        isError = true;
    }

    if (isError) {
        return errors = notFilledInputs;
    }

    if (paymentCheck && deliveryCheck.value === 'courier-delivery') {
        for (let i = 0; i < requiredInputsDelivery.length; i++) {
            errorRemove(requiredInputsDelivery[i]);
            if (!requiredInputsDelivery[i].value) {
                for (let j = 0; j < requiredInputsDelivery.length; j++) {
                    if (!requiredInputsDelivery[j].value) {
                        requiredInputsDelivery[j].classList.add('error');
                    }
                }
                return errors = notFilledInputs;
            }
        }
    }

    for (let i = 0; i < mainCheckout.length; i++) {
        const input = mainCheckout[i];
        errorRemove(input);

        if (input.attributes.name.value === 'name' || (input.attributes.name.value === 'receiver-name' && input.value !== '')) {
            if (input.value.length < 3 || !nameValid(input)) {
                errorAdd(input);
                errors++;
            } else {
                input.attributes.name.value === 'name' ? value.name = input.value : value.receiverName = input.value;
            }
        } else if (input.attributes.name.value === 'phone' || (input.attributes.name.value === 'receiver-phone' && input.value !== '')) {
            if (!phoneValid(input)) {
                errorAdd(input);
                errors++;
            } else {
                input.attributes.name.value === 'phone' ? value.phone = input.value : value.receiverPhone = input.value;
            }
        } else if (input.attributes.name.value === 'email') {
            if (!emailValid(input)) {
                errorAdd(input);
                errors++;
            } else {
                value.email = input.value;
            }
        } else if (input.attributes.name.value === 'comment' && input.value !== '' ) {
            value.comment = input.value;
        }
    }

    deliveryCheck.value === 'self-carrier' ? value.selfCarrier = true : value.courierDelivery = true;
    value.payment = paymentCheck.value;

    if (deliveryCheck.value === 'courier-delivery') {
        deliveryCheckout.forEach(input => {
            switch (input.attributes.name.value) {
                case 'city': value.deliveryCity = input.value;
                    break;
                case 'street': value.deliveryStreet = input.value;
                    break;
                case 'building': value.deliveryBuilding = input.value;
                    break;
                case 'room': value.deliveryRoom = input.value;
                    break;
                case 'time': value.deliveryTime = input.value;
                    break;
                
            }
        });
    }

    if (errors > 0) {
        return errors;
    } else {
        return value;
    }
}

const errorAdd = (input) => {
    input.classList.add('error');
}

const errorRemove = (input) => {
    input.classList.remove('error');
}

const nameValid = (input) => {
    return /^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/.test(input.value);
}

const phoneValid = (input) => {
    return /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/.test(input.value);
}

const emailValid = (input) => {
    return /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/.test(input.value);
}

const showCheckoutPopup = (text) => {
    checkoutPopup.classList.add('show-checkout-popup');
    const checkoutPopupText = document.querySelector('.checkout-popup-txt');
    checkoutPopupText.innerText = text;
    checkoutContainer.classList.add('low-opacity');
}

const closeCheckoutPopup = () => {
    checkoutPopup.classList.remove('show-checkout-popup');
    checkoutContainer.classList.remove('low-opacity');
}

const checkoutForm = document.getElementById('checkout-form');
checkoutForm.addEventListener('submit', checkoutSubmit);

const checkoutPopup = document.querySelector('.checkout-popup');
const checkoutPopupWrapper = document.querySelector('.checkout-popup-wrapper');
const checkoutPopupBtn = document.querySelector('.checkout-popup-btn');

const checkoutContainer = document.getElementById('checkout-container');

checkoutPopupBtn.addEventListener('click', closeCheckoutPopup);

window.onclick = (click) => {
    if (click.target !== checkoutPopupWrapper && checkoutPopup.classList.contains('show-checkout-popup')) {
        closeCheckoutPopup();
    }
}