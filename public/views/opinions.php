<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('', true);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/opinions.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script src="/public/js/nav.js" defer></script>
    <title>OPINIONS</title>
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
                    <span class="text_header">OPINIONS</span>
                </div>
            </header>
            <section class="offers">
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/staff/doctor1.svg" alt="Evan Jordan">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                Evan Jordan
                            </span><br>
                            <span class="footnote">
                                Specialization
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
                            VIEW OPINIONS
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/staff/doctor2.svg" alt="Kristen Poole">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                Kristen Poole
                            </span><br>
                            <span class="footnote">
                                Specialization
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
                            VIEW OPINIONS
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/staff/doctor3.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                Troy Welch
                            </span><br>
                            <span class="footnote">
                                Specialization
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
                            VIEW OPINIONS
                        </button>
                    </div>
                </div>
                <div class="offer">
                    <div class="offer_img_container">
                        <img class="offer_img" src="/public/img/staff/doctor1.svg" alt="First offer">
                    </div>
                    <div class="offer_content">
                        <div class="offer_content_header">
                            <span class="offer_name">
                                Joseph Knight
                            </span><br>
                            <span class="footnote">
                                Specialization
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
                            VIEW OPINIONS
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>