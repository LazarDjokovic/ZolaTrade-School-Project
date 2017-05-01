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
			if(isset($_REQUEST['addUser'])){
				$firstNameEdit=$_REQUEST['firstName'];
				$lastNameEdit=$_REQUEST['lastName'];
				$usernameEdit=$_REQUEST['username'];
				$emailEdit=$_REQUEST['email'];
				$passwordEdit=$_REQUEST['password'];
				$idRoleEdit=$_REQUEST['idRole'];
				$activeEdit=$_REQUEST['active'];
				
				
				
				
				$queryAddUser="INSERT INTO users (firstName, lastName, username, email, password, profilePicture, idRole, active) VALUES('".$firstNameEdit."', '".$lastNameEdit."', '".$usernameEdit."', 
				'".$emailEdit."', '".md5($passwordEdit)."', 'default.png', '".$idRoleEdit."', '".$activeEdit."');";
				
				include("connection.php");
				mysql_query($queryAddUser,$connection);
				mysql_close($connection);
				
				echo("
					<div class='row' style='text-align:center;'>
						<div class='col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12'>
							<div class='alert alert-success alert-dismissable fade in'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Success!</strong> User is added.
							</div>
						</div>
					</div>
					");
				
			}
		?>
		<div class='col-xs-12 col-md-12 col-sm-12 col-lg-12' style='text-align:center;'>
			<h3><b>Add user</b></h3>
			
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
						
								
					<form action='<?php echo $_SERVER['PHP_SELF'];?>?page=14' method='POST'>
					
						<input type='submit' class='btn btn-success' id='addUser' value='Add user' name='addUser' class='form-control' style='margin-bottom:50px;'/>
					
						<tr>
							<th>First name</th>
							<td><input type='text'  id='firstName' name='firstName' class='form-control'/></td>
						</tr>
						<tr>
							<th>Last Name</th>
							<td><input type='text' id='lastName' name='lastName' class='form-control'/></td>
						</tr>
						<tr>
							<th>Username</th>
							<td><input type='text'  id='username' name='username' class='form-control'/></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><input type='text'  id='email' name='email' class='form-control'/></td>
						</tr>
						<tr>
							<th>Password</th>
							<td><input type='password'  id='password' name='password' class='form-control'/></td>
						</tr>
						<tr>
							<th>profilePicture</th>
							<td>default.png</td>
						</tr>
						<tr>
							<th>Id role</th>
							<td><input type='text'  id='idRole' name='idRole' class='form-control' placeholder='type 1 for user, 2 for admin'/></td>
						</tr>
						<tr>
							<th>Active</th>
							<td><input type='text'  id='active' name='active' class='form-control' placeholder='type 0 for innactive, 1 for active'/></td>
						</tr>
					</form>
								
								
							
				</table>
						
			
		</div>
	</div>
	
</div>