<?php
	include("connection.php");
	
	$query1="SELECT * FROM votingpoll WHERE choice=1";
	$result1=mysql_query($query1,$connection);
	$count1=mysql_num_rows($result1);
	if($count1==1){
		$num1="$count1 Vote";
	}
	else if($count1>1){
		$num1="$count1 Votes";
	}
	else{
		$num1="0 Votes";
	}
	
	
	
	
	$query2="SELECT * FROM votingpoll WHERE choice=2";
	$result2=mysql_query($query2,$connection);
	$count2=mysql_num_rows($result2);
	if($count2==1){
		$num2="$count2 Vote";
	}
	else if($count2>1){
		$num2="$count2 Votes";
	}
	else{
		$num2="0 Votes";
	}
	
	
	
	
	$query3="SELECT * FROM votingpoll WHERE choice=3";
	$result3=mysql_query($query3,$connection);
	$count3=mysql_num_rows($result3);
	if($count3==1){
		$num3="$count3 Vote";
	}
	else if($count3>1){
		$num3="$count3 Votes";
	}
	else{
		$num3="0 Votes";
	}
	
	
	
	
	
	$query4="SELECT * FROM votingpoll WHERE choice=4";
	$result4=mysql_query($query4,$connection);
	$count4=mysql_num_rows($result4);
	if($count4==1){
		$num4="$count4 Vote";
	}
	else if($count4>1){
		$num4="$count4 Votes";
	}
	else{
		$num4="0 Votes";
	}
	
	
	
	
	
	
	$query5="SELECT * FROM votingpoll WHERE choice=5";
	$result5=mysql_query($query5,$connection);
	$count5=mysql_num_rows($result5);
	if($count5==1){
		$num5="$count5 Vote";
	}
	else if($count5>1){
		$num5="$count5 Votes";
	}
	else{
		$num5="0 Votes";
	}
	
	
	
	
	
	$totalNums="$num1, $num2, $num3, $num4, $num5";
	echo($totalNums);
	mysql_close($connection);

?>