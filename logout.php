<?php
	session_start();

    if(isset($_SESSION['username']))
    {
        unset($_SESSION['idUsers']);
        unset($_SESSION['username']);
        session_destroy();
		header('Location:index.php');
	}
	else{
		header('Location:index.php');
	}
?>