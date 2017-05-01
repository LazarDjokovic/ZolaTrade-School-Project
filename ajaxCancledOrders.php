<?php
	$idUser=$_GET['idUser'];
	
	if($idUser!=""){
		$idProducts=$_GET['idProducts'];
		$splitParameters = explode(',', $idProducts);
		include("connection.php");
		for($i=0;$i<count($splitParameters);$i++){
			$queryDeleteOrders="DELETE FROM orders WHERE idUser='".$idUser."' AND idProduct='".$splitParameters[$i]."'";
			mysql_query($queryDeleteOrders,$connection);
			
		}
		mysql_close($connection);
		echo("<div class='alert alert-success alert-dismissable fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> You canceled you orders.
			  </div>");
		
	}
	else{
		header("Location:index.php");
	}
?>