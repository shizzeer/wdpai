<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('doctor');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/write_prescription.css">
    <link rel="stylesheet" type="text/css" href="/public/css/form.css">
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
                    <a href="prescriptions" class="general_button">Prescriptions</a>
                    <a href="#" class="general_button">Write a prescription</a>
                </div>
                <div class="internal_container">
                    <form method="POST" action="write_prescription">
                        <div class="form-group">
                            <div class="error">
                                <?php
                                if(isset($messages)) {
                                    foreach ($messages as $message) {
                                        echo $message;
                                    }
                                }
                                ?>
                            </div><br>
                        </div>
                        <div class="form-group">
                            <label for="patient_id_number">Identity number:</label><br>
                            <input placeholder="Patient's identity number" type="text" id="patient_id_number" name="patient_id_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="medicals">Medicals:</label><br>
                            <textarea placeholder="One medical in line" id="medicals" name="medicals" class="form-control area"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prescription_date">Prescription date:</label><br>
                            <input type="date" id="prescription_date" name="prescription_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="treatment_date">Treatment date:</label><br>
                            <input type="date" id="treatment_date" name="treatment_date" class="form-control" required>
                        </div>
                        <br>
                        <button type="submit" class="general_button btn">Save</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>