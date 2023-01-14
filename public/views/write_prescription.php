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
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>PRESCRIPTIONS</title>
</head>

<body>
    <div class="base_container">
        <!-- <button class="mobile-nav-toggle" 
        aria-controls="primary-navigation" 
        aria-expanded="false">
        </button> -->
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
                    <a href="#" class="button">prescriptions</a>
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
                    <span class="text_header">PRESCRIPTIONS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="section_header">
                    <a href="prescriptions" class="general_button">Prescriptions</a>
                    <a href="#" class="general_button">Write a prescription</a>
                </div>
                <div class="internal_container">
                    <form>
                        <div class="form-group">
                            <label for="patient_id_number">Identity number:</label><br>
                            <input type="text" id="patient_id_number" name="patient_id_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="medications">Medications:</label><br>
                            <textarea name="comments" id="medications" name="medications" class="form-control area"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prescription_date">Prescription date:</label><br>
                            <input type="date" id="prescription_date" name="prescription_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="treatment_date">Treatment date:</label><br>
                            <input type="date" id="treatment_date" name="treatment_date" class="form-control">
                        </div>
                        <br>
                        <input type="submit" value="Save" class="general_button btn">
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>