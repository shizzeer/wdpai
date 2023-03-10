<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('doctor');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/appointments.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script src="/public/js/nav.js" defer></script>
    <title>APPOINTMENTS</title>
</head>
<body>
    <div class="base_container">
        <nav class="primary-navigation" data-visible="false">
            <span class="small_logo">Genesis Clinic</span>
            <ul>
                <li>
                    <i class="fa-solid fa-book"></i>
                    <a href="#" class="button">appointments</a>
                </li>
                <li>
                    <i class="fa-light fa-percent"></i>
                    <a href="patients" class="button">patients</a>
                </li>
                <li>
                    <i class="fa-solid fa-message"></i>
                    <a href="contact" class="button">contact</a>
                </li>
                <li>
                    <i class="fa-solid fa-circle-info"></i>
                    <a href="prescriptions" class="button">prescriptions</a>
                </li>
                <li id="settings">
                    <i class="fa-solid fa-gear"></i>
                    <a href="settings" class="button">settings</a>
                </li>
                <li>
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="logout" class="button">logout</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="content_header">
                    <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
                    </button>
                    <span class="text_header">APPOINTMENTS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="filter">
                    <form class="filter_form">
                        <label for="start-date">Start date:</label>
                        <input type="date" id="start-date">
                        <label for="end-date">End date:</label>
                        <input type="date" id="end-date">
                        <button type="submit">Find</button>
                        <button>Today</button>
                    </form>
                </div>
                <div class="appointments">
                    <?php foreach ($appointments as $appointment): ?>
                        <div class="appointment">
                            <div class="card">
                                <div class="card_entry">
                                    <b>Patient name: </b>
                                    <?= $appointment->getPatientName() ?>
                                </div>
                                <div class="card_entry">
                                    <b>Patient ID: </b>
                                    <?= $appointment->getPatientId() ?>
                                </div>
                                <div class="card_entry">
                                    <b>Appointment ID: </b>
                                    <?= $appointment->getId() ?>
                                </div>
                                <div class="card_entry">
                                    <b>Date and time: </b>
                                    <?= $appointment->getDate().' '.$appointment->getTime() ?>
                                </div>
                                <div class="card_entry">
                                    <b>Comments</b><br>
                                    <?= $appointment->getComments() ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>
</body>