<?php
	$query="SELECT * FROM products";
	include('connection.php');
	$resultPictures=mysql_query($query,$connection);
	mysql_close($connection);
?>
<div class="container" style="text-align:center;">
		<h1>GAME COVERS</h1>
		<hr/>
		<br/>
		<div class="row" style="padding:15px; text-align:center;">
			<?php
				while($row=mysql_fetch_array($resultPictures)){
					echo("
						<div class='col-md-4 col-sm-6 col-xs-12'>
							<h3>".$row['title']."<h3>
							<a  class='example-image-link'  data-lightbox='example-set' data-title='".$row['title']."' href='images/games/".$row['picture']."'>
							<img class='example-image' src='images/games/".$row['picture']."' alt='".$row['title']."' style='width:200px;height:267px;'/></a> 
						</div>
					");
				}
			?>
	</div>
</div>