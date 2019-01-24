<?php
session_start();
if (isset($_POST['nick'])) {
    //Udana walidacja? Załóżmy, że tak
    $wszystko_OK = true;
    $nick = $_POST['nick'];

    //sprawdzenie długości nicku
    if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Login musi posiadać od 3 do 20 znaków";
    }
    if (ctype_alnum($nick) == false) {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "Login może składać się tylko z liter i cyfr";
    }

    //sprawdzenie poprawności hasła
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];
    if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Hasło musi posiadać od 8 do 20 znaków";
    }
    if ($haslo1 != $haslo2) {
        $wszystko_OK = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne";
    }
    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

    //sprawdzenie poprawności email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres email";
    }

    //czy zaakceptowano regulamin
    if (!isset($_POST['regulamin'])) {
        $wszystko_OK = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu";
    }

    //Czy kliknięto CAPTCHA?
    $sekret = "6LcRhYwUAAAAAP2rRJKsQBCO4O8fNTNv99txK1W7";
    $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $sekret . '&response=' . $_POST['g-recaptcha-response']);
    $odpowiedz = json_decode($sprawdz);
    if ($odpowiedz->success == false) {
        $wszystko_OK = false;
        $_SESSION['e_captcha'] = "Zaakceptuj CAPTCHA";
    }


    if ($wszystko_OK == true) {
        //Wszystkie testy zaliczone, dodajemy gracza
        echo "Udana walidacja";
        exit();
    }
}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Rejestracja konta</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <style>
        .error {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        todo: ostylować
    </style>

</head>

<body>
<form method="post">
    Login: <br/><input type="text" name="nick"/><br/>
    <?php
    if (isset($_SESSION['e_nick'])) {
        echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
        unset($_SESSION['e_nick']);
    }
    ?>
    Hasło: <br/><input type="password" name="haslo1"/><br/>
    <?php
    if (isset($_SESSION['e_haslo'])) {
        echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
        unset($_SESSION['e_haslo']);
    }
    ?>
    Powtórz hasło: <br/><input type="password" name="haslo2"/><br/>
    Imię: <br/><input type="text" name="imie"/><br/>
    Nazwisko: <br/><input type="text" name="nazwisko"/><br/>
    E-mail: <br/><input type="email" name="email"/><br/>
    <?php
    if (isset($_SESSION['e_email'])) {
        echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
        unset($_SESSION['e_email']);
    }
    ?>
    Miasto: <br/><input type="text" name="miasto"/><br/>
    Adres: <br/><input type="text" name="adres"/><br/>

    <label>
        <input type="checkbox" name="regulamin">Akceptuję regulamin
    </label>
    <?php
    if (isset($_SESSION['e_regulamin'])) {
        echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
        unset($_SESSION['e_regulamin']);
    }
    ?>

    <div class="g-recaptcha" data-sitekey="6LcRhYwUAAAAAO8kw2GQkyKzmVr8cGVM4cPIjQvV"></div>
    <?php
    if (isset($_SESSION['e_captcha'])) {
        echo '<div class="error">' . $_SESSION['e_captcha'] . '</div>';
        unset($_SESSION['e_captcha']);
    }
    ?>
    <br/>
    <input type="submit" value="Zarejestruj się">

</form>


</body>
</html>