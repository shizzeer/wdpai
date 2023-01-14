<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('doctor');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/patients.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <!-- <link rel="stylesheet" type="text/css" href="/public/css/contact.css"> -->
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>PATIENTS</title>
</head>

<body>
    <div class="base_container">
        <nav class="primary-navigation" data-visible="false">
            <span class="small_logo">Genesis Clinic</span>
            <ul>
                <li>
                    <i class="fa-solid fa-book"></i>
                    <a href="appointments" class="button">appointments</a>
                </li>
                <li>
                    <i class="fa-light fa-percent"></i>
                    <a href="#" class="button">patients</a>
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
                    <div class="nav-toggle">
                        <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
                        </button>
                    </div>
                    <span class="text_header">PATIENTS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="patients">
                    <div class="filter">
                        <form class="filter_form">
                            <label for="start-date">Name and surname:</label>
                            <input type="text" id="name_and_surname">
                            <label for="identity_number">Identity number:</label>
                            <input type="text" id="identity_number">
                            <label for="last_visit">Date of birth:</label>
                            <input type="date" id="last_visit">
                            <label for="last_visit">Last visit:</label>
                            <input type="date" id="last_visit">
                            <button type="submit">Find</button>
                        </form>
                    </div>
                    <div class="patients_container">
                        <div class="patient">
                            <div class="patient_id">101</div>
                            <div class="name_and_birth_date">
                                <b>Name and surname: </b>Joe Doe<br>
                                <b>Identity number: </b>12345678901<br>
                                <b>Date of birth: </b>15/12/1998<br>
                                <b>Last visit: </b>10/12/2022<br>
                            </div>
                            <div class="medications"><b>Medications: </b>Locoid, Polcram</div>
                            <div class="prescriptions"><button class="general_button">Prescriptions</button></div>
                        </div>
                        <div class="patient">
                            <div class="patient_id">102</div>
                            <div class="name_and_birth_date">
                                <b>Name and surname: </b>Ryan Morgan<br>
                                <b>Identity number: </b>12345678902<br>
                                <b>Date of birth: </b>15/12/1999<br>
                                <b>Last visit: </b>10/12/2022<br>
                            </div>
                            <div class="medications"><b>Medications: </b>Locoid, Polcram</div>
                            <div class="prescriptions"><button class="general_button">Prescriptions</button></div>
                        </div>
                        <div class="patient">
                            <div class="patient_id">103</div>
                            <div class="name_and_birth_date">
                                <b>Name and surname: </b>Lana Riley<br>
                                <b>Identity number: </b>12345678903<br>
                                <b>Date of birth: </b>15/12/1997<br>
                                <b>Last visit: </b>10/12/2022<br>
                            </div>
                            <div class="medications"><b>Medications: </b>Locoid, Polcram, Zinat, Cirrus, Fanipos, Rupafin</div>
                            <div class="prescriptions"><button class="general_button">Prescriptions</button></div>
                        </div>
                        <div class="patient">
                            <div class="patient_id">104</div>
                            <div class="name_and_birth_date">
                                <b>Name and surname: </b>Aamir Castro<br>
                                <b>Identity number: </b>12345678904<br>
                                <b>Date of birth: </b>15/12/1996<br>
                                <b>Last visit: </b>10/12/2022<br>
                            </div>
                            <div class="medications"><b>Medications: </b>Locoid, Polcram, Zinat, Cirrus, Fanipos, Rupafin,
                            Efferalgan Vitamin C</div>
                            <div class="prescriptions"><button class="general_button">Prescriptions</button></div>
                        </div>
                    </div>
            </section>
        </main>
    </div>
</body>