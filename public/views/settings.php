<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('', true);
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/settings.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <!-- <link rel="stylesheet" type="text/css" href="/public/css/contact.css"> -->
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>SETTINGS</title>
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
                    <span class="text_header">SETTINGS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="settings_container">
                    <div class="settings_header">
                        Account settings
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Name and surname</div>
                        <!-- <div class="value">Joe Doe</div> -->
                        <div class="value"><input type="text" name="name" value="Joe Doe" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Email</div>
                        <div class="value"><input type="text" name="email" value="jdoe@gmail.com" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Password</div>
                        <div class="value"><input type="password" name="email" value="jdoe@gmail.com" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Date of birth</div>
                        <div class="value"><input type="text" name="date" value="15/12/1998" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Address</div>
                        <div class="value"><input type="text" name="address" value="506 Archwood Avenue, Decker, WY" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Phone number</div>
                        <div class="value"><input type="phone" name="phone_number" value="123-123-123" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                    <div class="setting">
                        <div class="key">Identity number</div>
                        <div class="value"><input type="text" name="identity_number" value="12345678901" class="setting_in"></div>
                        <div class="save_container"><button class="save">Save</button></div>
                    </div>
                    <div class="divider"></div>
                </div>
            </section>
        </main>
    </div>
</body>