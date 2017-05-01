<?php
	$idProduct=$_GET['idProduct'];
	$ipAddress=$_GET['ipAddress'];
	$likeOrDislike=$_GET['likeOrDislike'];
	
	if($likeOrDislike!=""){//if user came from url address without clicking anything
		$queryCheckIp="SELECT * FROM likesanddislikes WHERE ipAddress='".$ipAddress."' AND idProduct='".$idProduct."'";
		include("connection.php");
		$resultCheckIp=mysql_query($queryCheckIp,$connection);
		$numRowsOrdersCheck=mysql_num_rows($resultCheckIp);
		
		if($numRowsOrdersCheck==0){
			$query="INSERT INTO likesanddislikes (idProduct, ipAddress, likeOrDislike) VALUES('".$idProduct."','".$ipAddress."','".$likeOrDislike."');";
			mysql_query($query,$connection);
			
			$queryNumberOfLikes="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND likeOrDislike=1";
			$queryNumbeOfDislikes="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND likeOrDislike=0";
			$resultNumberOfLikes=mysql_query($queryNumberOfLikes,$connection);
			$resultNumberOfDislikes=mysql_query($queryNumbeOfDislikes,$connection);
			$numRowsLikesCheck=mysql_num_rows($resultNumberOfLikes);
			$numRowsDislikesCheck=mysql_num_rows($resultNumberOfDislikes);
			
			$likesAndDislikes="$numRowsLikesCheck, $numRowsDislikesCheck";
			echo("$likesAndDislikes");
		}
		else{
			echo("<h5><b>You have already voted for this product!</h5>");
		}
		
		
	}
	else{
		header("Location:index.php");
	}
	mysql_close($connection);
?>