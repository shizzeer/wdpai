<?php
session_start();
require 'Routing.php';
$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('about', 'DefaultController');
Routing::get('opinions', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('contact', 'DefaultController');
Routing::get('new_message', 'DefaultController');
Routing::get('discounts', 'DefaultController');
Routing::get('book', 'DefaultController');
Routing::get('reservations', 'DefaultController');
Routing::get('settings', 'DefaultController');
Routing::get('offers', 'DefaultController');

Routing::get('appointments', 'DefaultController');
Routing::get('patients', 'DefaultController');
Routing::get('prescriptions', 'DefaultController');
Routing::get('write_prescription', 'DefaultController');

Routing::get('logout', 'SecurityController');
Routing::get('not_authorized', 'DefaultController');
Routing::post('login', 'SecurityController');

if ($path == '') {
    Routing::run('index');
} else {
    Routing::run($path);
}
