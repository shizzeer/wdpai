<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('doctor');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/prescriptions.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script src="/public/js/nav.js" defer></script>
    <title>PRESCRIPTIONS</title>
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
                    <span class="text_header">PRESCRIPTIONS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="section_header">
                    <a href="#" class="general_button">Prescriptions</a>
                    <a href="write_prescription" class="general_button">Write a prescription</a>
                </div>
                <div class="filter">
                    <form class="filter_form">
                        <label for="start-date">Name and surname:</label>
                        <input type="text" id="name_and_surname">
                        <label for="last_visit">Prescription date:</label>
                        <input type="date" id="last_visit">
                        <button type="submit">Find</button>
                    </form>
                </div>
                <div class="prescriptions">
                    <?php foreach ($prescriptions as $prescription): ?>
                        <div class="prescription">
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <div class="row_container">
                                            <div class="left_corner">
                                                Patient
                                            </div><br>
                                            <div class="prescription_data">
                                                <b>Name: </b>
                                                <?= $prescription->getPatientName() ?>
                                                <?= $prescription->getPatientSurname() ?><br><br>
                                                <b>Identity number: </b>
                                                <?= $prescription->getPatientIdentityNumber() ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row_container">
                                            <div class="left_corner">
                                                Medications
                                            </div><br><br>
                                            <div class="medications_list">
                                                <div class="medicine"><?= str_replace("\n", "<br>", $prescription->getMedicals()) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row_container">
                                            <div class="left_corner">
                                                Prescription date
                                            </div><br><br>
                                            <div class="prescription_data">
                                                <?= $prescription->getPrescriptionDate() ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="flexible_row">
                                        <div class="row_container">
                                            <div class="left_corner">
                                                Treatment start
                                            </div><br><br>
                                            <div class="prescription_data">
                                                <?= $prescription->getTreatmentDate() ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>
</body>