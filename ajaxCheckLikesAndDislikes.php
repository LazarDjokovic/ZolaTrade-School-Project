<?php
	$idProduct=$_GET['idProduct'];
	if($idProduct!=""){
		$queryCheckLikes="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND likeOrDislike=1";
		$queryCheckDislikes="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND likeOrDislike=0";
		
		include("connection.php");
		$resultCheckLikes=mysql_query($queryCheckLikes,$connection);
		$resultCheckDislikes=mysql_query($queryCheckDislikes,$connection);
		mysql_close($connection);
		
		$numRowsLikes=mysql_num_rows($resultCheckLikes);
		$numRowsDislikes=mysql_num_rows($resultCheckDislikes);
		
		
	}
	else{
		header("Location:index.php");
	}
?>