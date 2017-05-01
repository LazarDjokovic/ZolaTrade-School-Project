<?php
	$query_menus="SELECT * FROM menus";
	include("connection.php");
	$result_menus=mysql_query($query_menus,$connection);
	mysql_close($connection);
	
	while($row=mysql_fetch_array($result_menus)){
		$name=$row['name'];
		$link=$row['link'];
		
		echo("
			<li><a href=".$link.">".$name."</a></li>
		");
	}
?>