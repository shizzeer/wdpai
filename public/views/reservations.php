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
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>RESERVATIONS</title>
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
                    <span class="text_header">RESERVATIONS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="section_header">
                    <a href="#" class="general_button">Reservations</a>
                    <a href="book" class="general_button">Book a visit</a>
                </div>
                <div class="reservations_container">
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                    <div class="reservation">
                        <table>
                            <tr>
                                <td>Doctor's Name</td>
                                <td>Date and time</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>Price</td>
                            </tr>
                            <tr>
                                <td colspan="2">Additional comments</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>