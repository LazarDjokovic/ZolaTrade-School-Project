<?php
	$querySlider="SELECT * FROM sliderpictures";
	include('connection.php');
	$resultSlider=mysql_query($querySlider,$connection);
	mysql_close($connection);

	$idSliderPicture="";
	$idProductSliderPicture="";
	$sliderPicture="";
	$active="";
	/*
		Here we take all data from the slidepictures table
	*/
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="mySlider" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
						$countRows=mysql_num_rows($resultSlider);
						$count=0;
						while($countRows>$count){
							if($count==0){
								echo("
									<li data-target='#mySlider' data-slide-to='".$count."' class='active'></li>
								");
							}
							else{
								echo("
									<li data-target='#mySlider' data-slide-to='".$count."'></li>
								");
							}
							$count++;
						}
						/*
							Here we are counting rows in the slidepicture table, and we are making on variable count with value 0.
							Than we are asking is the if the number of the rows is bigger than variable count.
							In while we ask is the the value of the count 0, if it is than we echo li with class active,
							otherwise the dot wont br white when the page loads.
							If it's not 0 we echo li without class active.
						*/
					?>
					<!--<li data-target="#mySlider" data-slide-to="0" class="active"></li>
					<li data-target="#mySlider" data-slide-to="1"></li>
					<li data-target="#mySlider" data-slide-to="2"></li>
					Code without PHP
					-->
			    </ol>
				
				<!-- wrapper for slider -->
				<!-- IMAGES HAVE TO BE THE SAME SIZE, in this case 1920x740-->
				<div class="carousel-inner" role="listbox">
					<?php
						while($row=mysql_fetch_array($resultSlider)){
							$idSliderPicture=$row['idSliderPicture'];
							$idProductSliderPicture=$row['idProduct'];
							$sliderPicture=$row['sliderPicture'];
							$active=$row['firstPicture'];
							echo("<div class='item ".$active."'>
									<a href='index.php?page=1&idProduct=".$idProductSliderPicture."'><img src='images/slider/".$sliderPicture."' alt='".$title."' class='img'/></a>
								</div>");
						}
						/*
							Here we echo all the pictures from the table, including the one that we want to be first.
							First picture has the column firstPicture in base and that column MUST HAVE VALUE active.
							With that value we are telling bootstrap that we want that picture to be first when we load the page.
							If we dont't have column firstPicture this code can't work!!!
						*/
					?>
					<!--<div class="item active">
						<a href="index.php?page=1"><img src="images/slider/worldOfWarcraft.jpg" alt="World of Warcraft"/></a>
					</div>
					<div class="item">
						<a href="index.php?page=1"><img src="images/slider/overwatch.jpg" alt="Overwatch" class="img-rounded"/></a>
					</div>
					<div class="item">
						<a href="index.php?page=1"><img src="images/slider/callOfDuty.jpg" alt="Call of Duty"/></a>
					</div>
					Code without PHP
					-->
				</div>
				
				<!-- controls or next and previous button-->
				<a class="left carousel-control" href="#mySlider" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#mySlider" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>