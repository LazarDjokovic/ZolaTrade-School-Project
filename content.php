<?php
	$query="SELECT * FROM products LIMIT 6";
	include('connection.php');
	$result=mysql_query($query,$connection);
	mysql_close($connection);
	
	$idProduct="";
	$title="";
	$productPicture="";
?>
<div class="container">

	<?php
		include("slider.php");
		//include("product.php");
	?>
	<div class="content">
		<div class="row" style="padding:15px; text-align:center;">
			<h1>The most popular products</h1>
		</div>
		<div class="row" style="padding:15px; text-align:center;">
			<?php
				while($row=mysql_fetch_array($result)){
					$idProduct=$row['idProduct'];
					$title=$row['title'];
					$productPicture=$row['picture'];
					
					echo("
						<div class='col-md-4 col-sm-6 col-xs-12'>
							<h3>".$title."<h3>
							<hr/>
							<a href='index.php?page=1&idProduct=".$idProduct."'><img src='images/games/".$productPicture."' alt='Proba' class='img-rounded allProductsPicture'/></a>
							<hr/>
						</div>
					");
				}
			?>
			<!--<div class="col-md-4 col-sm-6 col-xs-12">
				<h3>Battlefield 3<h3>
				<hr/>
				<a href="index.php?page=1"><img src="images/games/proba.jpg" alt="Proba" class="img-rounded"/></a>
				<hr/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<h3>Battlefield 3<h3>
				<hr/>
				<a href="index.php?page=1"><img src="images/games/proba.jpg" alt="Proba" class="img-rounded"/></a>
				<hr/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<h3>Battlefield 3<h3>
				<hr/>
				<a href="index.php?page=1"><img src="images/games/proba.jpg" alt="Proba" class="img-rounded"/></a>
				<hr/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<h3>Battlefield 3<h3>
				<hr/>
				<a href="index.php?page=1"><img src="images/games/proba.jpg" alt="Proba" class="img-rounded"/></a>
				<hr/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<h3>Battlefield 3<h3>
				<hr/>
				<a href="index.php?page=1"><img src="images/games/proba.jpg" alt="Proba" class="img-rounded"/></a>
				<hr/>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<h3>Battlefield 3<h3>
				<hr/>
				<a href="index.php?page=1"><img src="images/games/proba.jpg" alt="Proba" class="img-rounded"/></a>
				<hr/>
			</div>-->
		</div>
		<div class="row" style="text-align:center; padding:15px;">
			<div class="col-xs-12">
				<a href="index.php?page=7">View all products</a>
			</div>
		</div>
	</div>
</div>
