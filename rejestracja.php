<?php
session_start();
if(isset($_SESSION['zalogowany'])){
    header('Location: logout.php');
    exit();
}

if (isset($_POST['nick'])) {
    //sprawdzenie poprawności walidacji
    $wszystko_OK = true;
    $nick = $_POST['nick'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $miasto = $_POST['miasto'];
    $adres = $_POST['adres'];

    //sprawdzenie długości loginu
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

    //sprawdzenie poprawności imienia
    $imie = $_POST['imie'];
     if((strlen($imie) < 2) || (strlen($imie) > 30)){
         $wszystko_OK = false;
         $_SESSION['e_imie'] = "Imie musi posiadać od 2 do 30 znaków";
     }
    if (ctype_alpha($imie) == false) {
        $wszystko_OK = false;
        $_SESSION['e_imie'] = "Niepoprawne imie";
    }

     //sprawdzenie poprawności nazwiska
     $nazwisko = $_POST['nazwisko'];
     if((strlen($imie) < 2) || (strlen($imie) > 30)) {
         $wszystko_OK = false;
         $_SESSION['e_nazwisko'] = "Nazwisko musi posiadać od 2 do 30 znaków";
     }
    if (ctype_alpha($nazwisko) == false) {
        $wszystko_OK = false;
        $_SESSION['e_nazwisko'] = "Niepoprawne nazwisko";
    }

    //sprawdzenie poprawności email
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres email";
    }

    //sprawdzenie poprawności miasta
    $miasto = $_POST['miasto'];
    if((strlen($imie) < 2) || (strlen($imie) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_miasto'] = "Miasto musi posiadać od 2 do 30 znaków";
    }
    if (ctype_alpha($miasto) == false) {
        $wszystko_OK = false;
        $_SESSION['e_miasto'] = "Niepoprawne miasto";
    }

    //sprawdzenie poprawności adresu
    $adres = $_POST['adres'];
    if((strlen($imie) < 2) || (strlen($imie) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_miasto'] = "Adres musi posiadać od 2 do 30 znaków";
    }
    if (ctype_alnum($adres) == false) {
        $wszystko_OK = false;
        $_SESSION['e_adres'] = "Niepoprawny adres";
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

    //zapamiętaj wprowadzone dane
    $_SESSION['fr_nick'] = $nick;
    $_SESSION['fr_email'] = $email;
    $_SESSION['fr_haslo1'] = $haslo1;
    $_SESSION['fr_haslo2'] = $haslo2;
    $_SESSION['fr_imie'] = $imie;
    $_SESSION['fr_naziwsko'] = $nazwisko;
    $_SESSION['fr_miasto'] = $miasto;
    $_SESSION['fr_adres'] = $adres;
    if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno != 0) {
            throw new Exception(mysqli_connect_error());
        } else {
            //Czy email już istnieje?
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
            if (!$rezultat) throw new Exception($polaczenie->error);
            $ile_takich_maili = $rezultat->num_rows;
            if ($ile_takich_maili > 0) {
                $wszystko_OK = false;
                $_SESSION['e_email'] = "Istenieje już konto przypisane do tego adresu email";
            }

            //Czy nick jest zarezerwowany?
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
            if (!$rezultat) throw new Exception($polaczenie->error);
            $ile_takich_nickow = $rezultat->num_rows;
            if ($ile_takich_nickow > 0) {
                $wszystko_OK = false;
                $_SESSION['e_nick'] = "Istnieje już konto o podanym loginie. Wybierz inny";
            }

            //Czy wszystkie testy przeszly
            if ($wszystko_OK == true) {
                //Wszystkie testy zaliczone, dodajemy gracza
                if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick','$haslo_hash','$imie','$nazwisko','$email','$miasto','$adres')")) {
                    $_SESSION['udanarejestracja'] = true;
                    header('Location: witamy.php');
                } else {
                    throw new Exception($polaczenie->error);
                }
                exit();
            }
            $polaczenie->close();
        }
    } catch (Exception $e) {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności</span>';
        echo '<br />Informacja developerska' . $e;
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
    Login: <br/><input type="text" value="<?php
    if (isset($_SESSION['fr_nick'])) {
        echo $_SESSION['fr_nick'];
        unset($_SESSION['fr_nick']);
    }
    ?>" name="nick"/><br/>
    <?php
    if (isset($_SESSION['e_nick'])) {
        echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
        unset($_SESSION['e_nick']);
    }
    ?>
    Hasło: <br/><input type="password" value="<?php
    if (isset($_SESSION['fr_haslo1'])) {
        echo $_SESSION['fr_haslo1'];
        unset($_SESSION['fr_haslo1']);
    }
    ?>" name="haslo1"/><br/>
    <?php
    if (isset($_SESSION['e_haslo'])) {
        echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
        unset($_SESSION['e_haslo']);
    }
    ?>
    Powtórz hasło: <br/><input type="password" value="<?php
    if (isset($_SESSION['fr_haslo2'])) {
        echo $_SESSION['fr_haslo2'];
        unset($_SESSION['fr_haslo2']);
    }
    ?>" name="haslo2"/><br/>
    Imię: <br/><input type="text" value="<?php
    if (isset($_SESSION['fr_imie'])) {
        echo $_SESSION['fr_imie'];
        unset($_SESSION['fr_imie']);
    }
    ?>" name="imie"/><br/>
    <?php
    if (isset($_SESSION['e_imie'])) {
        echo '<div class="error">' . $_SESSION['e_imie'] . '</div>';
        unset($_SESSION['e_imie']);
    }
    ?>
    Nazwisko: <br/><input type="text" value="<?php
    if (isset($_SESSION['fr_naziwsko'])) {
        echo $_SESSION['fr_naziwsko'];
        unset($_SESSION['fr_naziwsko']);
    }
    ?>" name="nazwisko"/><br/>
    <?php
    if (isset($_SESSION['e_nazwisko'])) {
        echo '<div class="error">' . $_SESSION['e_nazwisko'] . '</div>';
        unset($_SESSION['e_nazwisko']);
    }
    ?>
    E-mail: <br/><input type="email" value="<?php
    if (isset($_SESSION['fr_email'])) {
        echo $_SESSION['fr_email'];
        unset($_SESSION['fr_email']);
    }
    ?>" name="email"/><br/>
    <?php
    if (isset($_SESSION['e_email'])) {
        echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
        unset($_SESSION['e_email']);
    }
    ?>
    Miasto: <br/><input type="text" value="<?php
    if (isset($_SESSION['fr_miasto'])) {
        echo $_SESSION['fr_miasto'];
        unset($_SESSION['fr_miasto']);
    }
    ?>" name="miasto"/><br/>
    <?php
    if (isset($_SESSION['e_miasto'])) {
        echo '<div class="error">' . $_SESSION['e_miasto'] . '</div>';
        unset($_SESSION['e_miasto']);
    }
    ?>
    Adres: <br/><input type="text" value="<?php
    if (isset($_SESSION['fr_adres'])) {
        echo $_SESSION['fr_adres'];
        unset($_SESSION['fr_adres']);
    }
    ?>" name="adres"/><br/>
    <?php
    if (isset($_SESSION['e_adres'])) {
        echo '<div class="error">' . $_SESSION['e_adres'] . '</div>';
        unset($_SESSION['e_adres']);
    }
    ?>

    <label>
        <input type="checkbox" name="regulamin"<?php
        if (isset($_SESSION['fr_regulamin'])) {
            echo "checked";
            unset($_SESSION['fr_regulamin']);
        }
        ?>>Akceptuję regulamin
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