<?php
session_start();
require 'Routing.php';
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('opinions', 'DefaultController');
Routing::get('contact', 'DefaultController');
Routing::get('new_message', 'DefaultController');
Routing::get('discounts', 'DefaultController');

Routing::get('settings', 'SettingsController');
Routing::get('offers', 'DefaultController');

Routing::get('patients', 'DefaultController');
Routing::get('prescriptions', 'PrescriptionController');

Routing::get('logout', 'SecurityController');
Routing::get('not_authorized', 'DefaultController');

Routing::get('appointments', 'AppointmentsController');
Routing::get('reservations', 'AppointmentsController');
Routing::get('book', 'AppointmentsController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'RegisterController');
Routing::post('remove_appointment', 'AppointmentsController');
Routing::post('write_prescription', 'PrescriptionController');

if ($path == '') {
    Routing::run('index');
} else {
    Routing::run($path);
}
