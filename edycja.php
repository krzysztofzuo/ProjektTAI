<?php
session_start();
unset($_SESSION['blad']);
if (isset($_POST['email'])) {

    $ud_imie = $_POST['imie'];
    $ud_nazwisko = $_POST['nazwisko'];
    $ud_email = $_POST['email'];
    $ud_miasto = $_POST['miasto'];
    $ud_adres = $_POST['adres'];
    $haslo = $_POST['haslo1'];

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
        if (password_verify($haslo, $wiersz['pass'])) {
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


<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Projekt TAI</title>
</head>

<body>
<form method="post">
    Imię: <br/><input type="text" value="<?php
    echo $_SESSION['imie'];
    ?>" name="imie"/><br/>
    Nazwisko: <br/><input type="text" value="<?php
    echo $_SESSION['nazwisko'];
    ?>" name="nazwisko"/><br/>
    E-mail: <br/><input type="email" value="<?php
    echo $_SESSION['email'];
    ?>" name="email"/><br/>
    Miasto: <br/><input type="text" value="<?php
    echo $_SESSION['miasto'];
    ?>" name="miasto"/><br/>
    Adres: <br/><input type="text" value="<?php
    echo $_SESSION['adres'];
    ?>" name="adres"/><br/>
    Hasło: <br/><input type="password" name="haslo1"/><br/>

    <input type="submit" value="Edytuj">
</form>
<?php
if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>
</body>
</html>