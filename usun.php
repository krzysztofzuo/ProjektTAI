<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}
unset($_SESSION['blad']);
if (isset($_POST['haslo'])) {
//Przypisanie loginu z sesji do zmiennej
    $user = $_SESSION['user'];
    $haslo = $_POST['haslo'];

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno != 0) {
    } else {
        //sprawdzenie poprawności hasła
        $rezultat = $polaczenie->query(sprintf("SELECT pass FROM uzytkownicy WHERE user = '$user'"));
        $wiersz = $rezultat->fetch_assoc();
        if (password_verify($haslo, $wiersz['pass'])) {
            $polaczenie->query("DELETE FROM `uzytkownicy` WHERE `uzytkownicy`.`user`='$user'");
            header('Location: logout.php');
            exit();
        } else {
            $_SESSION['blad'] = "Niepoprawne hasło";
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
<a href="dane.php">Wróć</a><br/><br/>

<form method="post">
    Hasło: <br/><input type="password" name="haslo"/><br/>
    <input type="submit" value="Usuń konto">
</form>
<?php
if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>
</body>
</html>