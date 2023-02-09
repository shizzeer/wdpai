
const settings_form = document.querySelector('form');

const name_input = settings_form.querySelector('input[name="name"]');
const name_button = settings_form.querySelector('button[name="save_name"]');

const email_input = settings_form.querySelector('input[name="email"]');
const email_button = settings_form.querySelector('button[name="save_email"]');

const password_input = settings_form.querySelector('input[name="password"]');
const password_button = settings_form.querySelector('button[name="save_password"]');

const date_input = settings_form.querySelector('input[name="date"]');
const date_button = settings_form.querySelector('button[name="save_birth_date"]');

const phone_input = settings_form.querySelector('input[name="phone_number"]');
const phone_button = settings_form.querySelector('button[name="save_phone_number"]');

const identity_number_input = settings_form.querySelector('input[name="identity_number"]');
const identity_number_button = settings_form.querySelector('button[name="save_identity_number"]');

name_input.addEventListener("input", () => {
    name_button.disabled = false;
})

email_input.addEventListener("input", () => {
    email_button.disabled = false;
})

password_input.addEventListener("input", () => {
    password_button.disabled = false;
})

date_input.addEventListener("input", () => {
    date_button.disabled = false;
})

phone_input.addEventListener("input", () => {
    phone_button.disabled = false;
})

identity_number_input.addEventListener("input", () => {
    identity_number_button.disabled = false;
})

