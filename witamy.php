<?php
session_start();

if (!isset($_SESSION['udanarejestracja'])) {
    header('Location: index.php');
    exit();
} else {
    unset($_SESSION['udanarejestracja']);
}
//Usuwanie zmiennych pamiętających wartości wpisanych do formularza
if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
if (isset($_SESSION['fr_imie'])) unset($_SESSION['fr_imie']);
if (isset($_SESSION['fr_nazwisko'])) unset($_SESSION['fr_nazwisko']);
if (isset($_SESSION['fr_miasto'])) unset($_SESSION['fr_miasto']);
if (isset($_SESSION['fr_adres'])) unset($_SESSION['fr_adres']);

//Usuwanie błędów rejestracji
if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
if (isset($_SESSION['e_imie'])) unset($_SESSION['e_imie']);
if (isset($_SESSION['e_nazwisko'])) unset($_SESSION['e_nazwisko']);
if (isset($_SESSION['e_miasto'])) unset($_SESSION['e_miasto']);
if (isset($_SESSION['e_adres'])) unset($_SESSION['e_adres']);
if (isset($_SESSION['e_captcha'])) unset($_SESSION['e_captcha']);
if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);


?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Projekt TAI</title>
</head>

<body>
Dziękujemy za rejestracje. Możesz już się zalogować na swoje konto

<a href="index.php">Zaloguj się na swoje konto</a>
<br/><br/>

</body>
</html>