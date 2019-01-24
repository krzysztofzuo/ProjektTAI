<?php
session_start();
session_unset();        //zwalnia wszystkie zarejestrowane zmienne w sesji
header('Location: index.php');
?>