<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <link rel="stylesheet" type="text/css" href="/public/css/booking.css">
    <link rel="stylesheet" type="text/css" href="/public/css/form.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>RESERVATIONS</title>
</head>

<body>
    <div class="base_container">
        <nav class="primary-navigation" data-visible="false">
            <span class="small_logo">Genesis Clinic</span>
            <ul>
                <li>
                    <i class="fa-solid fa-book"></i>
                    <a href="reservations" class="button">reservations</a>
                </li>
                <li>
                    <i class="fa-light fa-percent"></i>
                    <a href="discounts" class="button">discounts</a>
                </li>
                <li>
                    <i class="fa-sharp fa-solid fa-comment-dots"></i>
                    <a href="opinions" class="button">opinions</a>
                </li>
                <li>
                    <i class="fa-solid fa-message"></i>
                    <a href="contact" class="button">contact</a>
                </li>
                <li>
                    <i class="fa-solid fa-circle-info"></i>
                    <a href="about" class="button">about</a>
                </li>
                <li id="settings">
                    <i class="fa-solid fa-gear"></i>
                    <a href="settings" class="button">settings</a>
                </li>
                <li>
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="login" class="button">logout</a>
                </li>
            </ul>
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
                    <form>
                        <div class="form-group">
                            <label for="doctor">Preferred Doctor:</label><br>
                            <select id="doctor" name="doctor" class="form-control" required>
                                <option value="Dr. Smith">Dr. Smith</option>
                                <option value="Dr. Johnson">Dr. Johnson</option>
                                <option value="Dr. Williams">Dr. Williams</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Preferred Date:</label><br>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Preferred Time:</label><br>
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