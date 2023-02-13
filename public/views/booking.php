<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('patient');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/public/css/form.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script src="/public/js/nav.js" defer></script>
    <title>RESERVATIONS</title>
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
                    <span class="text_header">RESERVATIONS</span>
                </div>
            </header>
            <section class="column_content">
                <div class="section_header">
                    <a href="reservations" class="general_button">Reservations</a>
                    <a href="#" class="general_button">Book a visit</a>
                </div>
                <div class="reservations_container">
                    <form method="POST" action="/book">
                        <div style="color: red;padding-bottom: 0.5rem;"><?php echo $generalMessage; ?></div>
                        <div class="form-group">
                            <label for="doctor">Preferred Doctor:</label><br>
                            <select id="doctor" name="doctor" class="form-control" required>
                                <?php foreach ($doctors as $doctor): ?>
                                    <option value="<?= $doctor->getSurname() ?>">Dr. <?= $doctor->getSurname() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Preferred Date:</label><br>
                            <span style="color: red;"><?php echo $dateMessage; ?></span>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Preferred Time:</label><br>
                            <span style="color: red;"><?php echo $timeMessage; ?></span>
                            <input type="time" id="time" name="time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Discount code:</label><br>
                            <input type="text" id="discount_code" name="discount_code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Additional comments:</label><br>
                            <textarea name="comments" class="form-control area"></textarea>
                        </div>
                        <br>
                        <input type="submit" value="Book Appointment" class="general_button btn">
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>