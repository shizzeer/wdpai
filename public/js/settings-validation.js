const name_setting_form = document.getElementById('name_setting_form');
const name_input = name_setting_form.querySelector('input[name="name"]');
const name_button = name_setting_form.querySelector('button[name="save_name"]');

const email_setting_form = document.getElementById('email_setting_form');
const email_input = email_setting_form.querySelector('input[name="email"]');
const email_button = email_setting_form.querySelector('button[name="save_email"]');

const password_setting_form = document.getElementById('password_setting_form');
const password_input = password_setting_form.querySelector('input[name="password"]');
const password_button = password_setting_form.querySelector('button[name="save_password"]');

const date_setting_form = document.getElementById('date_setting_form');
const date_input = date_setting_form.querySelector('input[name="date"]');
const date_button = date_setting_form.querySelector('button[name="save_birth_date"]');

const phone_setting_form = document.getElementById('phone_setting_form');
const phone_input = phone_setting_form.querySelector('input[name="phone_number"]');
const phone_button = phone_setting_form.querySelector('button[name="save_phone_number"]');

const identity_number_setting_form = document.getElementById('identity_number_setting_form');
const identity_number_input = identity_number_setting_form.querySelector('input[name="identity_number"]');
const identity_number_button = identity_number_setting_form.querySelector('button[name="save_identity_number"]');

function checkNameAndSurname(nameAndSurname) {
    return /^[a-zA-Z]+ [a-zA-Z]+$/.test(nameAndSurname);
}

function checkEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function checkPassword(password) {
    return /\w{8,}/.test(password);
}

function checkDateOfBirth(dateOfBirth) {
    return /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/.test(dateOfBirth);
}

function checkPhoneNumber(phoneNumber) {
    return /^\d{9}$/.test(phoneNumber);
}

function checkIdentityNumber(identityNumber) {
    return /^\d{11}$/.test(identityNumber);
}

name_input.addEventListener("input", () => {
    if (checkNameAndSurname(name_input.value)) {
        name_input.style.color = '#504D4D';
        name_button.style.color = '#1E78D6';
        name_button.disabled = false;
    } else {
        name_button.style.color = 'gray';
        name_input.style.color = "red";
        name_button.disabled = true;
    }
})

email_input.addEventListener("input", () => {
    if (checkEmail(email_input.value)) {
        email_input.style.color = '#504D4D';
        email_button.style.color = '#1E78D6';
        email_button.disabled = false;
    } else {
        email_button.style.color = 'gray';
        email_input.style.color = "red";
        email_button.disabled = true;
    }
})

password_input.addEventListener("input", () => {
    if (checkPassword(password_input.value)) {
        password_input.style.color = '#504D4D';
        password_button.style.color = '#1E78D6';
        password_button.disabled = false;
    } else {
        password_button.style.color = 'gray';
        password_input.style.color = "red";
        password_button.disabled = true;
    }
})

date_input.addEventListener("input", () => {
    if (checkDateOfBirth(date_input.value)) {
        date_input.style.color = '#504D4D';
        date_button.style.color = '#1E78D6';
        date_button.disabled = false;
    } else {
        date_button.style.color = 'gray';
        date_input.style.color = "red";
        date_button.disabled = true;
    }
})

phone_input.addEventListener("input", () => {
    if (checkPhoneNumber(phone_input.value)) {
        phone_input.style.color = '#504D4D';
        phone_button.style.color = '#1E78D6';
        phone_button.disabled = false;
    } else {
        phone_button.style.color = 'gray';
        phone_input.style.color = "red";
        phone_button.disabled = true;
    }
})

identity_number_input.addEventListener("input", () => {
    if (checkIdentityNumber(identity_number_input.value)) {
        identity_number_input.style.color = '#504D4D';
        identity_number_button.style.color = '#1E78D6';
        identity_number_button.disabled = false;
    } else {
        identity_number_button.style.color = 'gray';
        identity_number_input.style.color = "red";
        identity_number_button.disabled = true;
    }
})

