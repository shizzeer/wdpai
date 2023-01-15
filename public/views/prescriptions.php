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
                    <div class="prescription">
                        <table>
                            <tr>
                                <td colspan="2">
                                    <div class="row_container">
                                        <div class="left_corner">
                                            Patient
                                        </div><br>
                                        <div class="prescription_data">
                                            Patient's personal data
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
                                            <div class="medicine">First medicine</div>
                                            <div class="medicine">Second medicine</div>
                                            <div class="medicine">Third medicine</div>
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
                                            Date
                                        </div>
                                    </div>
                                </td>
                                <td rowspan="2">
                                    <div class="doctor_data">
                                        Doctor responsible for the prescription and date
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
                                            Date
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>