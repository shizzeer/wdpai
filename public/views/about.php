<?php
    require_once __DIR__.'/../../src/controllers/SecurityController.php';
    $securityController = new SecurityController();
    $securityController->authorizationHandler('patient');
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/about.css">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/public/css/offers.css">
    <!-- <link rel="stylesheet" type="text/css" href="public/css/contact.css"> -->
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <!-- defer -> zaladuj skrypt dopiero w momencie jak zaladuje sie cala strona -->
    <!-- w ten sposob mamy dostep do elementow html -->
    <script src="/public/nav.js" defer></script>
    <title>ABOUT</title>
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
                    <a href="#" class="button">about</a>
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
                    <span class="text_header">ABOUT US</span>
                </div>
            </header>
            <section class="column_content">
                <div class="about">
                    <div class="header_div">
                        <span class="header">
                            PERSONNEL
                        </span>
                    </div>
                    <div class="personnel_container">
                        <div class="person">
                            <div class="circular_avatar">
                                <img src="/public/img/staff/doctor1.svg" class="avatar">
                            </div>
                            <div class="personal_data">
                                <!-- Place for name and surname + short description of specialization -->
                                <span class="name_and_surname">
                                    Dr. Evan Jordan
                                </span><br>
                                <span class="specialization">
                                    Specialization
                                </span><br><br>
                                <button class="read_more" onclick="window.location.href='opinions'" style="margin-top: 2rem;">
                                    ABOUT ME
                                </button>
                            </div>
                        </div>
                        <div class="person">
                            <div class="circular_avatar">
                                <img src="/public/img/staff/doctor2.svg" class="avatar">
                            </div>
                            <div class="personal_data">
                                <!-- Place for name and surname + short description of specialization -->
                                <span class="name_and_surname">
                                    Dr. Kristen Poole
                                </span><br>
                                <span class="specialization">
                                    Specialization
                                </span><br><br>
                                <button class="read_more" onclick="window.location.href='opinions'" style="margin-top: 2rem;">
                                    ABOUT ME
                                </button>
                            </div>
                        </div>
                        <div class="person">
                            <div class="circular_avatar">
                                <img src="/public/img/staff/doctor3.svg" class="avatar">
                            </div>
                            <div class="personal_data">
                                <!-- Place for name and surname + short description of specialization -->
                                <span class="name_and_surname">
                                    Dr. Troy Welch
                                </span><br>
                                <span class="specialization">
                                    Specialization
                                </span><br><br>
                                <button class="read_more" onclick="window.location.href='opinions'" style="margin-top: 2rem;">
                                    ABOUT ME
                                </button>
                            </div>
                        </div>
                        <div class="person">
                            <div class="circular_avatar">
                                <img src="/public/img/staff/doctor1.svg" class="avatar">
                            </div>
                            <div class="personal_data">
                                <!-- Place for name and surname + short description of specialization -->
                                <span class="name_and_surname">
                                    Dr. Joseph Knight
                                </span><br>
                                <span class="specialization">
                                    Specialization
                                </span><br><br>
                                <button class="read_more" onclick="window.location.href='opinions'" style="margin-top: 2rem;">
                                    ABOUT ME
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_div">
                        <span class="header">
                            CONTACT
                        </span><br><br>
                        <span class="about_content">
                            <b>Address:</b> 4212 Feathers Hooves Drive, NY<br><br>
                            <b>Phone number:</b> 202-555-0167<br><br>
                            <b>Email:</b> gclinic@genesis.com<br><br>
                        </span>
                    </div>
                    <div class="header_div">
                        <span class="header">
                            OUR MISSION
                        </span><br><br>
                        <span class="about_content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In turpis leo, egestas nec scelerisque convallis, cursus id
                            odio. Sed pretium risus nec euismod cursus. Donec a orci nibh. Sed non nisl in ex tempor elementum. Nulla luctus neque
                            et velit finibus, nec tempus nisi hendrerit. Mauris commodo eu eros in scelerisque. Praesent consectetur purus non
                            vehicula porttitor. Curabitur molestie, orci nec suscipit imperdiet, quam nisl fermentum dolor, hendrerit ultrices lorem
                            sem at lacus. Maecenas vel tellus bibendum, porta metus at, efficitur nulla. Curabitur dictum consequat orci sit amet
                            aliquet. Vivamus non nibh molestie, tristique orci nec, aliquet ligula. Donec finibus turpis ac diam imperdiet lacinia.
                            Nulla aliquet elit non tortor convallis dictum. Donec aliquet nibh a nisi porta pellentesque. Proin eu iaculis quam.<br><br>
                            
                            Aenean aliquet dignissim dapibus. Curabitur rutrum tellus vel nibh consectetur imperdiet ut vitae dolor. Pellentesque
                            vitae venenatis mi. Aenean ut mauris vel lorem porttitor congue. Pellentesque habitant morbi tristique senectus et netus
                            et malesuada fames ac turpis egestas. Vivamus eleifend ultricies ligula, vitae facilisis arcu pulvinar vitae. Maecenas
                            in blandit risus, quis convallis nisi. In vel metus at metus euismod congue at a elit. Donec lacus mi, tincidunt vel
                            nisi at, tempus tincidunt felis. Nulla pulvinar risus tortor, eget fermentum justo ullamcorper eu. Cras sed ligula
                            mollis neque euismod mollis. Vivamus suscipit fringilla lobortis. Nunc elementum metus id libero blandit elementum.
                            Phasellus interdum sed ipsum sed feugiat. Mauris vulputate nisi magna, quis dictum enim malesuada nec. Ut suscipit id
                            ligula vitae tempus.<br><br>
                            
                            Sed vitae elit eget magna efficitur fermentum eu sit amet erat. Nulla facilisi. Ut non pharetra lorem, quis ullamcorper
                            velit. Vivamus at metus in mauris rutrum commodo id nec dolor. Fusce porttitor neque ullamcorper sapien feugiat
                            porttitor. Curabitur pharetra tortor ac fringilla suscipit. Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos. Nullam hendrerit sodales vestibulum. Maecenas sit amet mollis eros. Suspendisse
                            tincidunt condimentum ipsum, a convallis ante accumsan eget. Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos. Nulla pharetra lorem a mauris volutpat, sed bibendum est sollicitudin. Sed hendrerit
                            dapibus felis quis maximus. Aenean eleifend ornare sapien lacinia malesuada.
                        </span>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>