<?php
    require_once __DIR__.'/../../src/controllers/SessionController.php';
//    session_unset();
//    session_destroy();
    session_start();
    $sessionController = new SessionController();
    if (isset($_SESSION['sessionId'])) {
        if (!$sessionController->didSessionExpired($_SESSION['sessionId'])) {
            if ($_SESSION['userRole'] === 'patient')
                header("Location: {$sessionController->getUrl()}/offers");
            else if ($_SESSION['userRole'] === 'doctor')
                header("Location: {$sessionController->getUrl()}/appointments");
        }
    }
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <span id="large_logo">Genesis Clinic</span>
        </div>
        <div class="login-container">
            <form action="login" method="POST">
                <div>
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    } ?>
                </div>
                <input class="login_input" name="email" type="text" placeholder="email">
                <input class="login_input" name="password" type="password" placeholder="password">
                <button class="login_button" type="submit"><span class="buttons_text">Login</span></button>
            </form>
        </div>
    </div>
</body>