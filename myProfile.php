<div class="container">
	<?php
		if(!isset($_SESSION['username'])){
			header('location:index.php');
		}else{
			$query="SELECT * FROM users WHERE idUsers='".$_SESSION['idUsers']."'";
			include("connection.php");
			$result=mysql_query($query,$connection);
			mysql_close($connection);
			
			while($row=mysql_fetch_array($result)){
				$firstName=$row['firstName'];
				$lastName=$row['lastName'];
				$email=$row['email'];
				$username=$row['username'];
				$profilePicture=$row['profilePicture'];
			}
		}
	?>
    <div class="row">
		<?php
			if(isset($_REQUEST['profilePictureSubmit'])){
				if(isset($_FILES['inputProfilePicture']['tmp_name'])){ 
					$maxsize    = 2097152;
					$types = array( 
						'image/jpeg',
						'image/jpg',
						'image/gif',
						'image/png'
					);
					if(($_FILES['inputProfilePicture']['size'] >= $maxsize) || (!in_array($_FILES['inputProfilePicture']['type'], $types))){
						echo("<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Warning!</strong>Only JPG, JPEG, PNG, GIF image formats, and 2mb max!
							  </div>");
					}else{
						$imageName=$_FILES['inputProfilePicture']['name'];
						
						$queryAllImageNames="SELECT profilePicture FROM users WHERE profilePicture='".$imageName."'";
						include("connection.php");
						$resultAllImageNames = mysql_query($queryAllImageNames, $connection);
						$countAllImageNames=mysql_num_rows($resultAllImageNames);
						
						if($countAllImageNames==0){
							move_uploaded_file($_FILES['inputProfilePicture']['tmp_name'],"images/profile/".$_FILES['inputProfilePicture']['name']);
							$queryChangePicture = "UPDATE users SET profilePicture = '".$_FILES['inputProfilePicture']['name']."' WHERE username = '".$_SESSION['username']."'";
							$queryChangePictureComments = "UPDATE comments SET profilePicture = '".$_FILES['inputProfilePicture']['name']."' WHERE username = '".$_SESSION['username']."'";
							include("connection.php");
							mysql_query($queryChangePictureComments,$connection);
							$resultUpdatePicture = mysql_query($queryChangePicture, $connection); 
							mysql_close($connection);
						}
						else{
							echo("<div class='col-md-8 col-md-offset-2 col-sm-12 col-xs-12 col-lg-8 col-lg-offset-2'>
									<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										There is already picture with that name! Plase change the name of the picture.
									</div>
								 </div>");
						}
						//move_uploaded_file($_FILES['inputProfilePicture']['tmp_name'],"images/profile/".$_FILES['inputProfilePicture']['name']);
						/*$queryChangePicture = "UPDATE users SET profilePicture = '".$_FILES['inputProfilePicture']['name']."' WHERE username = '".$_SESSION['username']."'";
						include("connection.php");
						$rezultat = mysql_query($queryChangePicture, $connection); 
						mysql_close($connection);*/
					}
					//echo $imageName;
				}
			}
		?>
        <div class="col-xs-12 col-sm-9 col-sm-offset-1 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <div class="well well-sm">
				<input type="hidden" value="<?php echo $_SESSION['idUsers'];?>" id="idUserProfile"/>
				<script type="text/javascript">listProfilePicture();</script>
				
                <div class="row">
                    <div class="col-xs-8 col-sm-6 col-md-4" id="listMyProfile">
                       
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <h4><?php echo $firstName;?> <?php echo $lastName;?></h4>
                            <i class="glyphicon glyphicon-envelope"></i> <?php echo $email;?>
                            <br />
                            <i class="glyphicon glyphicon-user"></i> <?php echo $username;?>
                            <br/><br/>
                        <!-- Split button -->
						
                        <div class="btn-group">
							<form method="POST" action="index.php?page=4" enctype="multipart/form-data">
								<input type='file' name='inputProfilePicture' id='inputProfilePicture'/><br/>
								<input type="submit" value='Change profile picture' name='profilePictureSubmit' class='btn btn-primary'/>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-9 col-sm-offset-1 col-xs-12">
			<span id='cancleOrdersResponse'></span>
			<h3>Your orders</h3>
			<table class="table table-striped"> 
				<thead> 
					<tr>
						<th>Game</th>
						<th>Date</th>
						<th>Price</th>
						<th style='text-align:center;'>Cancle order</th>
					<tr>
				</thead>
				<tbody id="listOrders">
					<input type="hidden" id="idUserOrders" value="<?php echo $_SESSION['idUsers'];?>"/>
					<script type="text/javascript">listOrders();</script>
					<!--
					<tr>
						<td>Battlefiele 3</td>
						<td>1.21.207</td>
						<td>19$</td>
					</tr>
					<tr>
						<td>Battlefiele 3</td>
						<td>1.21.207</td>
						<td>19$</td>
					</tr>
					<tr>
						<td>Battlefiele 3</td>
						<td>1.21.207</td>
						<td>19$</td>
					</tr>-->
				</tbody>
			</table>
		</div>
	</div>
	
</div>