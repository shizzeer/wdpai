<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/contact.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <!-- <link rel="stylesheet" type="text/css" href="/public/css/contact.css"> -->
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>CONTACT</title>
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