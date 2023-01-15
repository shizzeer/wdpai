<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('login');
    }

    public function about() {
        $this->render('about');
    }

    public function opinions() {
        $this->render('opinions');
    }

    public function register() {
        $this->render('registration');
    }

    public function appointments() {
        $this->render('appointments');
    }

    public function contact() {
        $this->render('contact');
    }

    public function new_message() {
        $this->render('new_message');
    }

    public function patients() {
        $this->render('patients');
    }

    public function discounts() {
        $this->render('discounts');
    }

    public function book() {
        $this->render('booking');
    }

    public function reservations() {
        $this->render('reservations');
    }

    public function settings() {
        $this->render('settings');
    }

    public function offers() {
        $this->render('offers');
    }

    public function prescriptions() {
        $this->render('prescriptions');
    }

    public function write_prescription() {
        $this->render('write_prescription');
    }

    public function not_authorized() {
        $this->render('not_authorized');
    }
}

?>