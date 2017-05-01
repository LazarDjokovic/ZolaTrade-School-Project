<?php
	$idUser=$_REQUEST['idUsers'];
	$idProduct=$_REQUEST['idProductAdd'];
	$title=$_REQUEST['titleAdd'];
	$price=$_REQUEST['priceAdd'];
	$date=$_REQUEST['dateAdd'];
	
	$queryInsertOrder="INSERT INTO orders (idUser,idProduct,game,price,date) VALUES('".$idUser."','".$idProduct."','".$title."','".$price."','".$date."')";
	include("connection.php");
	mysql_query($queryInsertOrder,$connection);
	mysql_close($connection);
?>