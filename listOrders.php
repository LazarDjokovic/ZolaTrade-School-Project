<?php
	$idUser=$_GET['idUser'];
	$queryListOrders="SELECT * FROM orders WHERE idUser='".$idUser."'";
	include("connection.php");
	$resultListOrders=mysql_query($queryListOrders,$connection);
	mysql_close($connection);
	$numberOfOrders=mysql_num_rows($resultListOrders);
	
	if($numberOfOrders==0){
		echo("
			<tr>
				<td colspan='4' style='text-align:center;'><b>You have no orders</b></td>
			</tr>
		");
	}
	else{
		while($row=mysql_fetch_array($resultListOrders)){
			$game=$row['game'];
			$date=$row['date'];
			$price=$row['price'];
			$idProduct=$row['idProduct'];
			
			echo("
				<tr>
					<td>".$game."</td>
					<td>".$date."</td>
					<td>".$price."$</td>
					<td style='text-align:center;'><input type='checkbox' name='chbOrder' value='".$idProduct."'/></td>
				</tr>
			");
		}
		echo("
			<tr>
				<td colspan='4' style='text-align:left;'>
					<input type='hidden' value='".$idUser."' id='idUserOrders'/> 
					<button class='btn btn-primary' style='margin-top:20px;' onClick='cancleOrders();'>Cancle orders</button>
				</td>
			</tr>
		");
	}
?>