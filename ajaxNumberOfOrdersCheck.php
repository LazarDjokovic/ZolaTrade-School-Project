<?php
	$idUsersValue=$_GET['idUsersValue'];
	$queryOrdersCheck="SELECT * FROM orders WHERE idUser='".$idUsersValue."'";
	include('connection.php');
	$resultOrdersCheck=mysql_query($queryOrdersCheck,$connection);
	mysql_close($connection);
	$numRowsOrdersCheck=mysql_num_rows($resultOrdersCheck);
	
	if($numRowsOrdersCheck==0){
		echo("0");
	}
	else{
		echo $numRowsOrdersCheck;
	}
?>