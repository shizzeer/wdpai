<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('', true);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/contact.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script src="/public/js/nav.js" defer></script>
    <title>CONTACT</title>
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
                    <div class="nav-toggle">
                        <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
                        </button>
                    </div>
                    <span class="text_header">CONTACT</span>
                </div>
            </header>
            <section class="column_content">
                <div class="section_header">
                    <a href="contact" class="general_button">Messages</a>
                </div>
                <div class="contact_container">
                    <form>
                        <input type="text" id="name" placeholder="To"><br><br>
                        <input type="text" id="name" placeholder="Subject"><br><br>
                        <textarea id="message"></textarea>
                        <button type="submit" class="general_button">Send</button>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>