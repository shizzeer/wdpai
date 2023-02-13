<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('patient');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/reservations.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script src="/public/js/nav.js" defer></script>
    <script src="/public/js/remove-appointment.js" defer></script>
    <title>RESERVATIONS</title>
</head>

<body>
    <div class="base_container">
        <nav class="primary-navigation" data-visible="false">
            <span class="small_logo">Genesis Clinic</span>
            <?php include "menu.php"; ?>
        </nav>
        <main>
            <header>
                <div class="content_header">
                    <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
                    </button>
                    <span class="text_header">RESERVATIONS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="section_header">
                    <a href="#" class="general_button">Reservations</a>
                    <a href="book" class="general_button">Book a visit</a>
                </div>
                <div class="reservations_container">
                    <?php foreach ($appointments as $appointment): ?>
                    <div class="reservation">
                        <div class="card" id="appointment_card" appointment_id="<?= $appointment->getId() ?>">
                            <span id="close_icon" class="card_close">
                                &times;
                            </span>
                            <div class="card_entry">
                                <b>Doctor: </b>
                                <?= $appointment->getDoctorName() ?>
                            </div>
                            <div class="card_entry">
                                <b>Date: </b>
                                <?= $appointment->getDate() ?>
                            </div>
                            <div class="card_entry">
                                <b>Time: </b>
                                <?= $appointment->getTime() ?>
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