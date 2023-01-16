<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/registration.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>REGISTER</title>
</head>
<body>
    <div class="container">
        <div class="logo_container">
            <div class="logo_container_internal">
                <span id="logo">Genesis Clinic</span>
                <div class="logo_mobile">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span id="mobile_content">SIGN UP</span>
                </div>
            </div>
        </div>
        <div class="form_container">
            <div class="form_header">
                <span class="form_header_txt">Create your account</span>
            </div>
            <form class="registration">
                <input type="text" name="name" placeholder="name" required>
                <input type="text" name="surname" placeholder="surname" required>
                <input type="email" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="password" required>
                <input class="date_of_birth" type="text" name="date_of_birth" placeholder="date of birth (DD/MM/YYYY)" required>
<!--                <input type="text" name="address" placeholder="address">-->
                <input type="text" name="identity_number" placeholder="identity number" required>
                <input type="tel" name="phone_number" placeholder="phone number" required><br>
                <button class="sign_up_button" style="cursor:pointer">
                    <span id="sign_up_text">Sign Up</span>
                </button>
            </form>
            <div class="sign_up_footer">
                <span class="sign_up_footer_txt">Already have an account? <a href="login">Log in</a></span>
            </div>
        </div>
    </div>
</body>
</html>