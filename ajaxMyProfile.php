<?php
	$idUser=$_GET['idUser'];
	
	if($idUser!=""){
		$query="SELECT * FROM users WHERE idUsers='".$idUser."'";
		include("connection.php");
		$result=mysql_query($query,$connection);
		mysql_close($connection);

		while($row=mysql_fetch_array($result)){
			$firstName=$row['firstName'];
			$lastName=$row['lastName'];
			$profilePicture=$row['profilePicture'];
			
			echo("
                <img src='images/profile/".$profilePicture."' alt='".$firstName." ".$lastName."' class='img-rounded img-responsive profilePictureMyProfile'/>
			");
		}
	}
	else{
		header("Location:index.php");
	}
?>