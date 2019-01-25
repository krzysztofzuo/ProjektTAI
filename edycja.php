<?php

unset($_SESSION['blad']);
if (isset($_POST['email'])) {
    $wszystko_OK = true;
    $haslo = $_POST['haslo1'];

    //sprawdzenie poprawności imienia
    $ud_imie = $_POST['imie'];
    if((strlen($ud_imie) < 2) || (strlen($ud_imie) > 30)){
        $wszystko_OK = false;
        $_SESSION['e_imie'] = "Imie musi posiadać od 2 do 30 znaków";
    }
    if (ctype_alpha($ud_imie) == false) {
        $wszystko_OK = false;
        $_SESSION['e_imie'] = "Niepoprawne imie";
    }

    //sprawdzenie poprawności nazwiska
    $ud_nazwisko = $_POST['nazwisko'];
    if((strlen($ud_imie) < 2) || (strlen($ud_imie) > 30)) {
        $wszystko_OK = false;
        $_SESSION['e_nazwisko'] = "Nazwisko musi posiadać od 2 do 30 znaków";
    }
    if (ctype_alpha($ud_nazwisko) == false) {
        $wszystko_OK = false;
        $_SESSION['e_nazwisko'] = "Niepoprawne nazwisko";
    }

    //sprawdzenie poprawności email
    $ud_email = $_POST['email'];
    $emailB = filter_var($ud_email, FILTER_SANITIZE_EMAIL);
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $ud_email)) {
        $wszystko_OK = false;
        $_SESSION['e_email'] = "Podaj poprawny adres email";
    }

    //sprawdzenie poprawności miasta
    $ud_miasto = $_POST['miasto'];
    if((strlen($ud_imie) < 2) || (strlen($ud_imie) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_miasto'] = "Miasto musi posiadać od 2 do 30 znaków";
    }
    if (ctype_alpha($ud_miasto) == false) {
        $wszystko_OK = false;
        $_SESSION['e_miasto'] = "Niepoprawne miasto";
    }

    //sprawdzenie poprawności adresu
    $ud_adres = $_POST['adres'];
    if((strlen($ud_imie) < 2) || (strlen($ud_imie) > 20)) {
        $wszystko_OK = false;
        $_SESSION['e_miasto'] = "Adres musi posiadać od 2 do 30 znaków";
    }
    if (ctype_alnum($ud_adres) == false) {
        $wszystko_OK = false;
        $_SESSION['e_adres'] = "Niepoprawny adres";
    }



//Przypisanie loginu z sesji do zmiennej
    $user = $_SESSION['user'];

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno != 0) {
    } else {

        //sprawdzenie poprawności hasła

        $rezultat = $polaczenie->query(sprintf("SELECT pass FROM uzytkownicy WHERE user = '$user'"));
        $wiersz = $rezultat->fetch_assoc();
        if (password_verify($haslo, $wiersz['pass'])&&$wszystko_OK==true) {
            $polaczenie->query("UPDATE `uzytkownicy` SET imie = '$ud_imie', nazwisko = '$ud_nazwisko', email = '$ud_email', miasto = '$ud_miasto', adres = '$ud_adres' WHERE `uzytkownicy`.`user`='$user'");
            {
                $_SESSION['imie'] = $ud_imie;
                $_SESSION['nazwisko'] = $ud_nazwisko;
                $_SESSION['email'] = $ud_email;
                $_SESSION['miasto'] = $ud_miasto;
                $_SESSION['adres'] = $ud_adres;
                header('Location: dane.php');
            }
            exit();
        } else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowe hasło!</span>';
        }
    }
    $polaczenie->close();
}
?>