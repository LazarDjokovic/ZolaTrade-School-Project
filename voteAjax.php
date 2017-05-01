<?php
	if(isset($_GET['radio'])){
		$value=$_GET['radio'];
		if($value=="undefined"){
			echo("Please make a selection");
		}
		else{
			$ipAddress=getenv('REMOTE_ADDR');
			include("connection.php");
			$query="SELECT * FROM votingpoll WHERE ipAddress='".$ipAddress."'";
			$result=mysql_query($query,$connection);
			$count=mysql_num_rows($result);
			
			if($count>0){
				echo("<p style='color:#ff0000;'>You have already voted!</p>");
			}
			else{
				$queryInsert="INSERT INTO votingpoll (choice, ipAddress) VALUES ('".$value."','".$ipAddress."')";
				mysql_query($queryInsert,$connection) or die(mysql_erros());;
				echo("<p style='color:#00b300;'>Thanks! Your vote has been counted</p>");
			}
			mysql_close($connection);
		}
	}
?>