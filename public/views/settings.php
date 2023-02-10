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
    <script src="/public/js/settings-validation.js" defer></script>
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
                    <form method="POST" action="settings">
                        <div class="settings_header">
                            Account settings
                        </div>
                        <div class="divider"></div>
                        <div class="setting">
                            <div class="key">Name and surname</div>
                            <!-- <div class="value">Joe Doe</div> -->
                            <div class="value"><input type="text" name="name" value="<?php echo $settings->getAccountSettings()['name'] ?>"
                                                      class="setting_in"></div>
                            <div class="save_container"><button type="submit" name="save_name" class="save" disabled>Save</button></div>
                        </div>
                        <div class="divider"></div>
                        <div class="setting">
                            <div class="key">Email</div>
                            <div class="value"><input type="text" name="email" value="<?php echo $settings->getAccountSettings()['email'] ?>"
                                                      class="setting_in"></div>
                            <div class="save_container"><button type="submit" name="save_email" class="save" disabled>Save</button></div>
                        </div>
                        <div class="divider"></div>
                        <form action="POST" method="settings">
                            <div class="setting">
                                <div class="key">Password</div>
                                <div class="value"><input type="password" name="password" value="password" class="setting_in"></div>
                                <div class="save_container"><button type="submit" name="save_password" class="save" disabled>Save</button></div>
                            </div>
                        </form>
                        <div class="divider"></div>
                        <form action="POST" method="settings">
                            <div class="setting">
                                <div class="key">Date of birth</div>
                                <div class="value"><input type="text" name="date" value="<?php echo $settings->getAccountSettings()['dateOfBirth'] ?>"
                                                          class="setting_in"></div>
                                <div class="save_container"><button type="submit" name="save_birth_date" class="save" disabled>Save</button></div>
                            </div>
                        </form>
                        <div class="divider"></div>
                        <div class="setting">
                            <div class="key">Phone number</div>
                            <div class="value"><input type="phone" name="phone_number" value="<?php echo $settings->getAccountSettings()['phoneNumber'] ?>"
                                                      class="setting_in"></div>
                            <div class="save_container"><button type="submit" name="save_phone_number" class="save" disabled>Save</button></div>
                        </div>
                        <div class="divider"></div>
                        <div class="setting">
                            <div class="key">Identity number</div>
                            <div class="value"><input type="text" name="identity_number" value="<?php echo $settings->getAccountSettings()['identityNumber'] ?>"
                                                      class="setting_in"></div>
                            <div class="save_container"><button type="submit" name="save_identity_number" class="save" disabled>Save</button></div>
                        </div>
                        <div class="divider"></div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>