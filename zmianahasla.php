<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}
unset($_SESSION['dlugosc']);
unset($_SESSION['inne']);
unset($_SESSION['blad']);
if (isset($_POST['haslo1'])) {
//Przypisanie loginu z sesji do zmiennej
    $user = $_SESSION['user'];
    $haslo = $_POST['haslo'];
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];
    $wszystko_OK = true;

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno != 0) {
    } else {

        //sprawdzenie poprawności hasła

        $rezultat = $polaczenie->query(sprintf("SELECT pass FROM uzytkownicy WHERE user = '$user'"));
        $wiersz = $rezultat->fetch_assoc();
        if (password_verify($haslo, $wiersz['pass'])) {

            //sprawdzenie poprawności hasła
            $haslo1 = $_POST['haslo1'];
            $haslo2 = $_POST['haslo2'];
            if ((strlen($haslo1) < 8) || (strlen($haslo1) > 20)) {
                $wszystko_OK = false;
                $_SESSION['dlugosc'] = "Niepoprawna długość hasła";
            }
            if ($haslo1 != $haslo2) {
                $wszystko_OK = false;
                $_SESSION['inne'] = "Hasła są różne";
            }
            $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
            if ($wszystko_OK == true) {
                $polaczenie->query("UPDATE `uzytkownicy` SET pass = '$haslo_hash' WHERE `uzytkownicy`.`user`='$user'");
                header('Location: dane.php');
                exit();
            }
        } else {
            $_SESSION['blad'] = "Niepoprawne stare hasło";
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
    Stare Hasło: <br/><input type="password" name="haslo"/><br/><br/><br/>
    Nowe Hasło: <br/><input type="password" name="haslo1"/><br/>
    Powtórz hasło: <br/><input type="password" name="haslo2"/><br/>
    <input type="submit" value="Zmień">
</form>
<?php
if (isset($_SESSION['dlugosc'])) echo $_SESSION['dlugosc'];
if (isset($_SESSION['inne'])) echo $_SESSION['inne'];
if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>
</body>
</html>