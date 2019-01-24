<?php
session_start();

if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] = true)) {
    header('Location: dane.php');
    exit();
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
Strona internetowa TAI<br/><br/>

<a href="rejestracja.php">Rejestracja konta</a><br/><br/>

<form action="zaloguj.php" method="post">
    Login <br/><input type="text" name="login"/><br/>
    Hasło <br/><input type="password" name="haslo"><br/><br/>
    <input type="submit" value="Zaloguj się"<br/>

</form>

<?php
if (isset($_SESSION['blad']))
    echo $_SESSION['blad'];
?>
</body>
</html>