<?php
	if(isset($_SESSION['username'])){
		$username=$_SESSION['username'];
		$idUser=$_SESSION['idUsers'];
		
		if($username=="lignjoslavPipak" && $idUser=="25"){
			/*echo("<div class='col-xs-12'>
					<h5 style='color:#FF0000'><b>ADMIN PANEL</b></h5>
				  </div>
			    ");*/
		}
		else{
			unset($_SESSION['idUsers']);
			unset($_SESSION['username']);
			session_destroy();
			header("Location:index.php");
		}
	}
	else{
		header("Location:index.php");
	}
?>
<div class='container'>
	<div class='row'>
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' style='text-align:center;'>
			<a href='index.php?page=12'><button type='button' class='btn btn-success'>Users</button></a>
			<a href='index.php?page=15'><button type='button' class='btn btn-success'>Products</button></a>
			<a href='index.php?page=18'><button type='button' class='btn btn-success'>Comments</button></a>
		</div>
	</div>
	<div class='row' style='margin-top:50px;margin-bottom:50px'>
		<?php
			if(isset($_REQUEST['addProduct'])){
				if(isset($_FILES['inputProfilePicture']['tmp_name'])){ 
					move_uploaded_file($_FILES['inputProfilePicture']['tmp_name'],"images/games/".$_FILES['inputProfilePicture']['name']);
					$title=$_REQUEST['title'];
					$price=$_REQUEST['price'];
					$description=$_REQUEST['description'];
					$trailer=$_REQUEST['trailer'];
		
					$queryAddProduct="INSERT INTO products (title, picture, price, description, trailer) VALUES('".$title."', '".$_FILES['inputProfilePicture']['name']."','".$price."', '".$description."', '".$trailer."');";
					
					include("connection.php");
					mysql_query($queryAddProduct,$connection);
					mysql_close($connection);
					
					echo("
						<div class='row' style='text-align:center;'>
							<div class='col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12'>
								<div class='alert alert-success alert-dismissable fade in'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<strong>Success!</strong> Product is added.
								</div>
							</div>
						</div>
						");
				}
			}
		?>
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' style='text-align:center;'>
			<h3><b>Add product</b></h3>
			
				<table class="table table-responsive" style='text-align:left;'>
					<!--<thead> 
						<tr >
							<th>Id user</th>
							<th>First name</th>
							<th>Last Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							<th>profilePicture</th>
							<th>Id role</th>
							<th>Active</th>
						<tr>
					</thead>-->
						
								
					<form action='<?php echo $_SERVER['PHP_SELF'];?>?page=17' method='POST' enctype="multipart/form-data">
					
						<input type='submit' class='btn btn-success' id='addProduct' value='Add product' name='addProduct' class='form-control' style='margin-bottom:50px;'/>
					
						<tr>
							<th>Title</th>
							<td><input type='text'  id='title' name='title' class='form-control'/></td>
						</tr>
						<tr>
							<th>Price</th>
							<td><input type='text' id='price' name='price' class='form-control' placeholder='type only numbers'/></td>
						</tr>
						<tr>
							<th>Picture</th>
							<td>
								<input type='file' name='inputProfilePicture' id='inputProfilePicture'/><br/>
							</td>
						</tr>
						<tr>
							<th>Description</th>
							<td><input type='text'  id='description' name='description' class='form-control'/></td>
						</tr>
						<tr>
							<th>Trailer</th>
							<td><input type='text'  id='trailer' name='trailer' class='form-control'/></td>
						</tr>
					</form>
								
								
							
				</table>
						
			
		</div>
	</div>
	
</div>