<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
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
<a href="edycja.php">Edycja konta</a><br/><br/>
<a href="usun.php">Usuwanie konta</a><br/><br/>

<?php
echo "<p>Witaj " . $_SESSION['user'] . '! [<a href="logout.php">Wyloguj się!</a>]</p>';
echo "<p><b>Imię</b>: " . $_SESSION['imie'] . "<br />";
echo "<p><b>Nazwisko</b>: " . $_SESSION['nazwisko'] . "<br />";
echo "<p><b>Email</b>: " . $_SESSION['email'] . "<br />";
echo "<p><b>Miasto</b>: " . $_SESSION['miasto'] . "<br />";
echo "<p><b>Adres</b>: " . $_SESSION['adres'];
?>
</body>
</html>