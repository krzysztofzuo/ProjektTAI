<?php
    session_start();

    if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']=true)){
    header('Location: dane.php');
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"   />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>

<body>
    Strona internetowa TAI<br /><br />

    <form action="zaloguj.php" method="post">
        Login <br /><input type="text" name="login"/><br />
        Hasło <br /><input type="password" name="haslo"><br /><be />
        <input type="submit" value="Zaloguj się"<be />

    </form>

    <?php
        if(isset($_SESSION['blad']))
        echo $_SESSION['blad'];
    ?>
</body>
</html>