<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('patient');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>DISCOUNTS</title>
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
                    <span class="text_header">DISCOUNTS</span>
                </div>
            </header>
            <section class="offers">
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/offers/offer1.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                OFFER NAME TO GET DISCOUNT TO TO GET DISCOUNT TO
                            </span>
                        </div>
                        <div class="offer_content_internal">
                            <span class="offer_short_desc">
                                Culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis
                                iste natus error sit voluptartem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi ropeior
                                architecto beatae vitae dicta sunt.Culpa qui officia deserunt mollit anim id est
                                laborum. Sed ut perspiciatis unde omnis
                                iste natus error sit voluptartem accusantium doloremque laudantium, totam rem aperiam,
                                eaque ipsa quae ab illo inventore
                                veritatis et quasi ropeior architecto beatae vitae dicta sunt.
                            </span>
                        </div>
                        <button class="read_more">
                            GET DISCOUNT CODE
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/offers/offer2.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                OFFER NAME TO GET DISCOUNT TO
                            </span>
                        </div>
                        <div class="offer_content_internal">
                            <span class="offer_short_desc">
                                Culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis
                                iste natus error sit
                                voluptartem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi
                                ropeior
                                architecto beatae vitae dicta sunt.Culpa qui officia deserunt mollit anim id est
                                laborum. Sed ut perspiciatis
                                unde omnis
                                iste natus error sit voluptartem accusantium doloremque laudantium, totam rem aperiam,
                                eaque ipsa quae ab illo
                                inventore
                                veritatis et quasi ropeior architecto beatae vitae dicta sunt.
                            </span>
                        </div>
                        <button class="read_more">
                            GET DISCOUNT CODE
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/offers/offer3.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                OFFER NAME TO GET DISCOUNT TO
                            </span>
                        </div>
                        <div class="offer_content_internal">
                            <span class="offer_short_desc">
                                Culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis
                                iste natus error sit
                                voluptartem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi
                                ropeior
                                architecto beatae vitae dicta sunt.Culpa qui officia deserunt mollit anim id est
                                laborum. Sed ut perspiciatis
                                unde omnis
                                iste natus error sit voluptartem accusantium doloremque laudantium, totam rem aperiam,
                                eaque ipsa quae ab illo
                                inventore
                                veritatis et quasi ropeior architecto beatae vitae dicta sunt.
                            </span>
                        </div>
                        <button class="read_more">
                            GET DISCOUNT CODE
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/offers/offer1.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                OFFER NAME TO GET DISCOUNT TO
                            </span>
                        </div>
                        <div class="offer_content_internal">
                            <span class="offer_short_desc">
                                Culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis
                                iste natus error sit
                                voluptartem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi
                                ropeior
                                architecto beatae vitae dicta sunt.Culpa qui officia deserunt mollit anim id est
                                laborum. Sed ut perspiciatis
                                unde omnis
                                iste natus error sit voluptartem accusantium doloremque laudantium, totam rem aperiam,
                                eaque ipsa quae ab illo
                                inventore
                                veritatis et quasi ropeior architecto beatae vitae dicta sunt.
                            </span>
                        </div>
                        <button class="read_more">
                            GET DISCOUNT CODE
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/offers/offer2.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                OFFER NAME TO GET DISCOUNT TO
                            </span>
                        </div>
                        <div class="offer_content_internal">
                            <span class="offer_short_desc">
                                Culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis
                                iste natus error sit
                                voluptartem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi
                                ropeior
                                architecto beatae vitae dicta sunt.Culpa qui officia deserunt mollit anim id est
                                laborum. Sed ut perspiciatis
                                unde omnis
                                iste natus error sit voluptartem accusantium doloremque laudantium, totam rem aperiam,
                                eaque ipsa quae ab illo
                                inventore
                                veritatis et quasi ropeior architecto beatae vitae dicta sunt.
                            </span>
                        </div>
                        <button class="read_more">
                            GET DISCOUNT CODE
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>