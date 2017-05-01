<?php
	$idUser=$_GET['idUser'];
	$idProduct=$_GET['idProduct'];
	$comment=$_GET['comment'];
	$username=$_GET['username'];
	$profilePicture=$_GET['profilePicture'];
	
	if($comment!=""){
		$queryInsertComment="INSERT INTO comments (idProduct, idUser, profilePicture, username, comment) VALUES ('".$idProduct."','".$idUser."','".$profilePicture."','".$username."','".$comment."');";
		include('connection.php');
		$resultInsertComment=mysql_query($queryInsertComment,$connection);
		mysql_close($connection);
	}
	else{
		echo("<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Warning!</strong> You must type something in comment filed.
			  </div>");
	}
?>