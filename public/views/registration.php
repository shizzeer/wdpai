<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/registration.css">
    <script src="https://kit.fontawesome.com/ec121d0778.js" crossorigin="anonymous"></script>
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
                <input type="text" name="full_name" placeholder="full name">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <input class="date_of_birth" type="text" name="date_of_birth" placeholder="date of birth (DD/MM/YYYY)">
                <input type="text" name="address" placeholder="address">
                <input type="text" name="identity_number" placeholder="identity number">
                <input type="number" name="phone_number" placeholder="phone number"><br>
                <button class="sign_up_button">
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