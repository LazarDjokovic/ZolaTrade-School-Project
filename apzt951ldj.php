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
			//include("logout.php");
		}
	}
	else{
		header("Location:index.php");
		//include("logout.php");
	}
	
	if(isset($_REQUEST['btnDeleteUsers'])){
		include('connection.php');
		if(!empty($_REQUEST['chbIdUser'])) {
			foreach ($_REQUEST['chbIdUser'] as $selected) {
				$queryDeleteUsers="DELETE FROM users WHERE idUsers='".$selected."';";
				mysql_query($queryDeleteUsers,$connection);
				//echo $selected;
			}
		}
		else{
			echo("
					<div class='row' style='text-align:center;'>
						<div class='col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12'>
							<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Warning!</strong> You need to select atleast one user!
							</div>
						</div>
				  </div>
				  ");
		}
		mysql_close($connection);
	}
?>
<div class='container-fluid'>
	<div class='row'>
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' style='text-align:center;'>
			<a href='index.php?page=12'><button type='button' class='btn btn-success'>Users</button></a>
			<a href='index.php?page=15'><button type='button' class='btn btn-success'>Products</button></a>
			<a href='index.php?page=18'><button type='button' class='btn btn-success'>Comments</button></a>
		</div>
	</div>
	<div class='row' style='margin-top:50px;margin-bottom:50px'>
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' style='text-align:center;'>
			<h3><b>USERS</b></h3>
			<table class="table table-striped"> 
				<thead> 
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
						<th>Edit</th>
						<th style='text-align:center;'>Delete users</th>
					<tr>
				</thead>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>?page=12" method="POST">
					<?php
						$queryListUsers="SELECT * FROM users";
						include('connection.php');
						$resultListUsers=mysql_query($queryListUsers,$connection);
						mysql_close($connection);
						
						
						while($row=mysql_fetch_array($resultListUsers)){
							$idUser=$row['idUsers'];
							$firstName=$row['firstName'];
							$lastName=$row['lastName'];
							$username=$row['username'];
							$email=$row['email'];
							$password=$row['password'];
							$profilePicture=$row['profilePicture'];
							$idRole=$row['idRole'];
							$active=$row['active'];
							
							echo("
								<tr>
									<td>".$idUser."</td>
									<td>".$firstName."</td>
									<td>".$lastName."</td>
									<td>".$username."</td>
									<td>".$email."</td>
									<td>".$password."</td>
									<td>".$profilePicture."</td>
									<td>".$idRole."</td>
									<td>".$active."</td>
									<td>
										<a href='index.php?page=13&idUser=".$idUser."'><img src='images/edit/edit.jpg' alt='Edit user' style='width:25px;height:25px;'/></a>
									</td>
									<td style='text-align:center;'>
										<input type='checkbox' name='chbIdUser[]' value='".$idUser."'/>
									</td>
								</tr>
							");
						}
						echo("</table>");
						echo("
								<input type='submit' class='btn btn-success' name='btnDeleteUsers' id='btnDeleteUsers' value='Delete users'/>
								<a href='index.php?page=14'><button type='button' class='btn btn-success'>Add user</button></a>
							");
					?>
					</form>
		</div>
	</div>
</div>