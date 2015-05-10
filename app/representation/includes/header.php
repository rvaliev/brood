<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Log in</title>
    <meta name="description" content="" />

    <link rel="shortcut icon" href="favicon.png" />
    <link rel="stylesheet" href="../../../public/css/style.css" /> <!--пользовательские стили-->

</head>
<body>
<!-------------------------------------------------------------------CONTENT--------------------------------------------------------->





<header class="clearFix">
    <div class="headerContainer">
        <div class="logo">
            Broodjeszaak
        </div>

    </div>

    <!-- Lightbox forms -->

    <a class="show-register register" href="#">Registreer</a>
    <div class="lightbox-panel-register">
        <h3>Registreer</h3>
        <form id="register_form" method="post" action="#">
            <input type="text" class="register_name" name="register_name" placeholder="Voornaam">
            <input type="text" class="register_name" name="register_surname" placeholder="Familienaam">
            <input type="text" class="register_email" name="register_email" placeholder="E-mail">
            <input type="password" class="register_password" name="register_password" placeholder="Wachtwoord">
            <input type="password" class="register_password_rt" name="register_password_rt" placeholder="Herhaal wachtwoord">
            <input class="sbmt-btn" name="register_btn" type="submit" value="Registreer">
        </form>
        <div class="close-register">
            <a class="close-panel-register" href="#">Sluit venster</a>
        </div>
    </div>

    <a class="show-login login" href="#">Log in</a>
    <div class="lightbox-panel-login">
        <h3>Log in</h3>
        <form id="login_form" action="#" method="post">
            <input class="login_login" type="text" name="login_login" placeholder="Login">
            <input class="login_pass" name="login_pass" type="password" placeholder="Wachtwoord">
            <input class="sbmt-btn" name="login_btn" type="submit" value="Log in">
        </form>
        <div class="close-login">
            <a class="show-register register_from_login" href="#">Registreer</a>
            <a class="forgot_pass show-recover recover" href="#">Wachtwoord vergeten?</a>
            <a class="close-panel-login" href="#">Sluit venster</a>
        </div>
    </div>


    <div class="lightbox-panel-recover">
        <h3>Wachtwoord herstelling</h3>
        <form id="recover_form" action="post">
            <input type="text" class="recover_email" name="recover_email" placeholder="E-mail">
            <input class="sbmt-btn" type="submit" value="Herstel wachtwoord">
        </form>
        <div class="close-recover">
            <a class="close-panel-recover" href="#">Sluit venster</a>
        </div>
    </div>

    <!-- Lightbox forms END -->


</header>