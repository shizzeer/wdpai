const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const nameInput = form.querySelector('input[name="name"]');
const surnameInput = form.querySelector('input[name="surname"]');
const passwordInput = form.querySelector('input[name="password"]');
const dateOfBirthInput = form.querySelector('input[name="date_of_birth"]');
const identityNumberInput = form.querySelector('input[name="identity_number"]');
const phoneNumberInput = form.querySelector('input[name="phone_number"]');

function checkEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function checkNameOrSurname(name) {
    return /^[A-Za-z\s]+$/.test(name);
}

function checkPassword(password) {
    return /\w{8,}/.test(password);
}

function checkDateOfBirth(dateOfBirth) {
    return /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/.test(dateOfBirth);
}

function checkIdentityNumber(identityNumber) {
    return /^\d{11}$/.test(identityNumber);
}

function checkPhoneNumber(phoneNumber) {
    return /^\d{9}$/.test(phoneNumber);
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no_valid') : element.classList.remove('no_valid');
}

function validateEmail(el, fu) {
    setTimeout(function () {
            markValidation(emailInput, checkEmail(emailInput.value));
        }, 1000);
}

function validateName() {
    setTimeout(function () {
        markValidation(nameInput, checkNameOrSurname(nameInput.value));
    }, 1000);
}

function validateSurname() {
    setTimeout(function () {
        markValidation(surnameInput, checkNameOrSurname(surnameInput.value));
    }, 1000);
}

function validatePassword() {
    setTimeout(function () {
        markValidation(passwordInput, checkPassword(passwordInput.value));
    }, 1000);
}

function validateDateOfBirth() {
    setTimeout(function () {
        markValidation(dateOfBirthInput, checkDateOfBirth(dateOfBirthInput.value));
    }, 1000);
}

function validateIdentityNumber() {
    setTimeout(function () {
        markValidation(identityNumberInput, checkIdentityNumber(identityNumberInput.value));
    }, 1000);
}

function validatePhoneNumber() {
    setTimeout(function () {
        markValidation(phoneNumberInput, checkPhoneNumber(phoneNumberInput.value));
    }, 1000);
}

function isFormValid() {
    if (checkEmail(emailInput.value) && checkNameOrSurname(nameInput.value)
        && checkNameOrSurname(surnameInput.value) && checkPassword(passwordInput.value)
        && checkDateOfBirth(dateOfBirthInput.value) && checkIdentityNumber(identityNumberInput.value)
        && checkPhoneNumber(phoneNumberInput.value)) {
        return true;
    }
    return false;
}

emailInput.addEventListener('keyup', validateEmail);
nameInput.addEventListener('keyup', validateName);
surnameInput.addEventListener('keyup', validateSurname);
passwordInput.addEventListener('keyup', validatePassword);
dateOfBirthInput.addEventListener('keyup', validateDateOfBirth);
identityNumberInput.addEventListener('keyup', validateIdentityNumber);
phoneNumberInput.addEventListener('keyup', validatePhoneNumber);