<?php
	if(isset($_REQUEST['idProduct'])){
		$idProduct=$_REQUEST['idProduct'];
		$ipAddress=getenv('REMOTE_ADDR');
		$query="SELECT * FROM products WHERE idProduct=".$idProduct."";
		include('connection.php');
		$result=mysql_query($query,$connection);
		mysql_close($connection);
		
		$title="";
		$productPicture="";
		$price="";
		$description="";
		//$likes="";
		//$dislikes="";
		$trailer="";
		
		while($row=mysql_fetch_array($result)){
			$title=$row['title'];
			$productPicture=$row['picture'];
			$price=$row['price'];
			$description=$row['description'];
			//$likes=$row['likes'];
			//$dislikes=$row['dislikes'];
			$trailer=$row['trailer'];
		}
		
		$queryCheckLikes="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND likeOrDislike=1";
		$queryCheckDislikes="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND likeOrDislike=0";
		$queryCheckIfLiked="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND ipAddress='".$ipAddress."' AND likeOrDislike=1";
		$queryCheckIfDisliked="SELECT * FROM likesanddislikes WHERE idProduct='".$idProduct."' AND ipAddress='".$ipAddress."' AND likeOrDislike=0";
		
		include("connection.php");
		$resultCheckLikes=mysql_query($queryCheckLikes,$connection);
		$resultCheckDislikes=mysql_query($queryCheckDislikes,$connection);
		$resultCheckIfLiked=mysql_query($queryCheckIfLiked,$connection);
		$resultCheckIfDisliked=mysql_query($queryCheckIfDisliked,$connection);
		mysql_close($connection);
		
		$numRowsLikes=mysql_num_rows($resultCheckLikes);
		$numRowsDislikes=mysql_num_rows($resultCheckDislikes);
		$numRowsIfLiked=mysql_num_rows($resultCheckIfLiked);
		$numRowsIfDisliked=mysql_num_rows($resultCheckIfDisliked);
	}
	
	$profilePictureName="";
	
	if(isset($_SESSION['idUsers'])){
		$queryUsers="SELECT * FROM users WHERE idUsers='".$_SESSION['idUsers']."'";
		$queryOrdersCheck="SELECT * FROM orders WHERE idUser='".$_SESSION['idUsers']."' AND idProduct='".$idProduct."'";
		include('connection.php');
		$resultOrdersCheck=mysql_query($queryOrdersCheck,$connection);
		$resultQueryUsers=mysql_query($queryUsers,$connection);
		mysql_close($connection);
		
		while($row=mysql_fetch_array($resultQueryUsers)){
			$profilePictureName=$row['profilePicture'];
		}
		
		$numRowsOrdersCheck=mysql_fetch_array($resultOrdersCheck);
	}
?>
<div class="container">
	<div class="row" style="padding:15px;">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h1><?php echo $title; ?></h1>
			<input type="hidden" id="titleValue" value="<?php echo $title;?>"/>
			<input type="hidden" id="idUsersValue" value="<?php echo $_SESSION['idUsers'];?>"/>
			<input type="hidden" id="idUsernameValue" value="<?php echo $_SESSION['username'];?>"/>
			<input type="hidden" id="profilePictureValue" value="<?php echo $profilePictureName;?>"/>
			<input type="hidden" id="idProductValue" value="<?php echo $idProduct;?>"/>
			<input type="hidden" id="dateValue" value="<?php echo date("d/m/Y")?>"/>
			<input type="hidden" id="ipAddress" value="<?php echo getenv('REMOTE_ADDR');?>"/>
			<img src="images/games/<?php echo $productPicture;?>" alt="" class="img-rounded allProductsPicture"/>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h1><?php echo $price; ?>$</h1>
			<input type="hidden" id="priceValue" value="<?php echo $price;?>"/>
			<hr/>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
			<p><?php echo $description; ?></p>
			<hr/>
			<div id="divLikes">
				<?php
					if($numRowsIfLiked==0 && $numRowsIfDisliked==0){
						echo("
							<span id='spanLikePictureAdded'></span>
							<span id='spanLikePicture' onClick='addLike();'></span>
							<span id='likeNumbers'><p>$numRowsLikes</p></span>
						");
					}
					else if($numRowsIfLiked==0 && $numRowsIfDisliked==1){
						echo("
							<span><img src='images/likesDislikes/like.png'></span>
							<span id='likeNumbers'><p>$numRowsLikes</p></span>
						");
					}
					else if($numRowsIfDisliked==0 && $numRowsIfLiked==1){
						echo("
							<span><img src='images/likesDislikes/likeClicked.png'></span>
							<span id='likeNumbers'><p>$numRowsLikes</p></span>
						");
					}
				?>
			</div>
			<div id="divDislikes">
				<?php
					if($numRowsIfDisliked==0 && $numRowsIfLiked==0){
						echo("
							<span id='spanDislikePictureAdded'></span>
							<span id='spanDislikePicture' onClick='addDislike();'></span>
							<span id='dislikeNumbers'><p>$numRowsDislikes</p></span>
						");
					}
					else if($numRowsIfLiked==0 && $numRowsIfDisliked==1){
						echo("
							<span><img src='images/likesDislikes/dislikeClicked.png'></span>
							<span id='dislikeNumbers'><p>$numRowsDislikes</p></span>
						");
					}
					else if($numRowsIfDisliked==0 && $numRowsIfLiked==1){
						echo("
							<span><img src='images/likesDislikes/dislike.png'></span>
							<span id='dislikeNumbers'><p>$numRowsDislikes</p></span>
						");
					}
				?>
			</div>
			
			<hr/>
			
				<?php
					if(!isset($_SESSION['idUsers'])){
						echo("<a href='index.php?page=9'><button class='btn btn-primary'>Add to cart</button></a>");
					}
					else if($numRowsOrdersCheck==0){
						echo("<button type='submit' class='btn btn-primary' id='addToCartButton' name='addToCartButton' onClick='addOrders(); numberOfOrders();'>Add to cart</button>
						<input type='hidden' id='idUsersValue' value='".$_SESSION['idUsers']."'/><br/><span id='productAdded'></span>");
					}
					else{
						echo("<b style='color:#337ab7;'>Product is added to your cart</b>");
					}
				?>
			
		</div>
	</div>
</div><br/>
<div class="container" style="text-align:center;">
	<div class="row" style="text-align:center;">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $trailer;?>"></iframe>
			</div>
		</div>
	</div><br/>
</div>
<div class="container">
	<span id="commentEmptyWarning"></span>
	<div class="row">
		<div class="col-md-6 col-md-offset-2 col-xs-12">
			<h3>Comments</h3>
		</div>
	</div>
	<div class="row" id="listComments">
		<script type="text/javascript">listComments();</script>
	</div>	
</div>