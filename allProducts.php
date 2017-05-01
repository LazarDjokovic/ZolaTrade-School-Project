<?php
	
?>
<div class="container" style="text-align:center;">
		<h1>All games that are available at ZolaTrade store</h1>
		<hr/>
		<br/>
		<div class="row" style="padding:15px; text-align:center;">
			<?php
				include('connection.php');
				$sql=mysql_query("SELECT * FROM products",$connection);
				mysql_close($connection);
				
				$nr=mysql_num_rows($sql); //counting rows
				
				if(isset($_GET['pn'])) //value from url
				{
					$pn=preg_replace('#[^0-9]#i','',$_GET['pn']); 
				}
				else
				{
					$pn=1; //if thre is no value in url, it means user is first time on page
				}
				
				$itemsPerPage=9; 
				
				$lastPage=ceil($nr/$itemsPerPage); 
				if($pn<1)
				{
					$pn=1;
				}
				else if($pn>$lastPage)
				{
					$pn=$lastPage;
				}
				
				$centerPages=''; //showing number of pages
				$sub1=$pn-1; 
				$sub2=$pn-2;
				$add1=$pn+1; 
				$add2=$pn+2;
				
				if($pn == 1)  //if user is on first page
				{
					$centerPages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //display the current number
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$add1'>$add1</a> &nbsp;"; //and option to add one more page
				}
				else if($pn == $lastPage) //if user is on the last page
				{
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$sub1'>$sub1</a> &nbsp;"; //display the option for one less
					$centerPages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;"; //and current page
				}
				else if($pn > 2 && $pn < ($lastPage-1))
				{
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$sub2'>$sub2</a> &nbsp;";
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$sub1'>$sub1</a> &nbsp;";
					$centerPages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$add1'>$add1</a> &nbsp;";
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$add2'>$add2</a> &nbsp;";
				}
				else if($pn > 1 && $pn < $lastPage)
				{
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$sub1'>$sub1</a> &nbsp;";
					$centerPages.="&nbsp; <span class='page_num_active'>$pn</span>&nbsp;";
					$centerPages.="&nbsp; <a href='index.php?page=7&pn=$add1'>$add1</a> &nbsp;";
				} 		 
				
				$paginationDisplay=''; 
				
				if($lastPage != "1") //if there is more than one page, if there isn't nothing of this will show up
				{
					//$paginationDisplay.="Page <strong>$pn</strong> of $lastPage"; //display the current page, from all od the pages
					
					if($pn != 1) //if user is not on the fist page
					{
						$previous=$pn - 1;
						$paginationDisplay.="&nbsp; <a href='index.php?page=7&pn=$previous' class='nazad'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>";
					}
					
					$paginationDisplay.="<span class='pagination_numbers'>$centerPages<span>";
					
					if($pn != $lastPage) //if user is not on the last page
					{ 
						$nextPage=$pn+1; 
						$paginationDisplay.="&nbsp; <a href='index.php?page=7&pn=$nextPage' class='napred'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>"; 
					}
				}	
								
				$pom=($pn-1)*$itemsPerPage;				
				$query="SELECT * FROM products  LIMIT $pom,$itemsPerPage";
				include('connection.php');
				$result=mysql_query($query,$connection);
				mysql_close($connection);
				
				$idProduct="";
				$title="";
				$productPicture="";				
								
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
				echo ("
						<div class='col-xs-12'>
							<div id='pagination'>$paginationDisplay</div>
						</div>
					");
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
		</div>-->
		<!--<div class="row" style="text-align:center; padding:15px;">
			<div class="col-xs-12">
				1 2 3 4 5
			</div>
		</div>-->
	</div>
</div>