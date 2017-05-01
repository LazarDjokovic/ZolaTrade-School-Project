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
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' style='text-align:center;'>
			<h3><b>Product edit</b></h3>
			
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
						<?php
							if(isset($_REQUEST['saveChangesEditProduct'])){
								$idProduct=$_REQUEST['idProduct'];
								$titleEdit=$_REQUEST['title'];
								$priceEdit=$_REQUEST['price'];
								//$picture=$_REQUEST['picture'];
								$descriptionEdit=$_REQUEST['description'];
								$trailerEdit=$_REQUEST['trailer'];
								
								$queryUpadateProduct="UPDATE products SET title='".$titleEdit."', price='".$priceEdit."',
							    description='".$descriptionEdit."', trailer='".$trailerEdit."' WHERE idProduct='".$idProduct."';";
								include("connection.php");
								mysql_query($queryUpadateProduct,$connection);
								mysql_close($connection);
								
							}
							
							$idProduct=$_REQUEST['idProduct'];
							$queryListProduct="SELECT * FROM products WHERE idProduct='".$idProduct."'";
							include('connection.php');
							$resultListProduct=mysql_query($queryListProduct,$connection);
							mysql_close($connection);
							
							
							while($row=mysql_fetch_array($resultListProduct)){
								$idProduct=$row['idProduct'];
								$title=$row['title'];
								$price=$row['price'];
								$picture=$row['picture'];
								$description=$row['description'];
								$trailer=$row['trailer'];
								
								echo("
									
										<form action='".$_SERVER['PHP_SELF']."?page=16&idProduct=".$idProduct."' method='POST'>
										
											<input type='submit' class='btn btn-success' id='saveChangesEditProduct' value='Save changes' name='saveChangesEditProduct' class='form-control' style='margin-bottom:50px;'/>
										
										<tr>
											<th>Id product</th>
											<td>".$idProduct."</td>
										</tr>
										<tr>
											<th>Title</th>
											<td><input type='text' value='".$title."' id='title' name='title' class='form-control'/></td>
										</tr>
										<tr>
											<th>Price</th>
											<td><input type='text' value='".$price."' id='price' name='price' class='form-control'/></td>
										</tr>
										<tr>
											<th>Picture</th>
											<td><img src='images/games/".$picture."' name='picture' id='picture'/></td>
										</tr>
										<tr>
											<th>Description</th>
											<td><textarea  type='text' id='description' name='description' class='form-control' style='max-width:350px;'>".$description."</textarea>
										</tr>
										<tr>
											<th>Trailer</th>
											<td><input type='text' value='".$trailer."' id='trailer' name='trailer' class='form-control'/></td>
										</tr>
										</form>
									
									
								");
							}
							echo("</table>");
						?>
			
		</div>
	</div>
	
</div>