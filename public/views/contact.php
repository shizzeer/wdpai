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
                    <a href="login" class="button">logout</a>
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
                <div class="contact_header">
                    <a href="new_message" class="general_button">New Message</a>
                    <a href="#" class="general_button">Clear Messages</a>
                </div>
                <div class="contact_container">
                    <div class="divider"></div>
                    <div class="msg_container">
                        <div class="subject_and_name">
                            <span class="name">Josh Wayne</span><br>
                            <a href="#" class="subject_href"><span class="subject">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, eum pariatur ab quo cum, iusto amet quam enim impedit non nihil, quisquam illum. Harum, aliquid repellat accusantium doloribus exercitationem doloremque.</span></a>
                        </div>
                        <div class="msg_date">2022-12-17</div>
                    </div>
                    <div class="divider"></div>
                    <div class="msg_container">
                        <div class="subject_and_name">
                            <span class="name">John Wayne</span><br>
                            <a href="#" class="subject_href"><span class="subject">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem similique architecto in laudantium ad consequatur ab perferendis tempora tenetur, at dolores magni eveniet ducimus eaque nihil adipisci possimus libero. Sint.</span></a>
                        </div>
                        <div class="msg_date">2022-12-17</div>
                        <!-- <div class="msg_delete"><img class="delete_msg" src="/public/img/delete.svg"></div> -->
                    </div>
                    <div class="divider"></div>
                </div>
            </section>
        </main>
    </div>
</body>