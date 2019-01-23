<?php

	session_start();
	
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$sql = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$haslo'";
                
                if($rezultat = @$polaczenie->query($sql)){
                    $ilu_uzytkowniow = $rezultat->num_rows;
                    if($ilu_uzytkowniow>0){
                        $wiersz = $rezultat->fetch_assoc();
                        $login = $wiersz['login'];
                        $rezultat->free_result();
                        
                        echo $login;
                    } else {
                        
                    }
				
                }	
		
		
		$polaczenie->close();
	}
	
?>