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
			<h3><b>User edit</b></h3>
			
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
							if(isset($_REQUEST['saveChangesEditUser'])){
								$idUser=$_REQUEST['idUser'];
								$firstNameEdit=$_REQUEST['firstName'];
								$lastNameEdit=$_REQUEST['lastName'];
								$usernameEdit=$_REQUEST['username'];
								$emailEdit=$_REQUEST['email'];
								$passwordEdit=$_REQUEST['password'];
								$idRoleEdit=$_REQUEST['idRole'];
								$activeEdit=$_REQUEST['active'];
								
								$queryUpadateUser="UPDATE users SET firstName='".$firstNameEdit."', lastName='".$lastNameEdit."', username='".$usernameEdit."', 
								email='".$emailEdit."', password='".md5($passwordEdit)."', idRole='".$idRoleEdit."', active='".$activeEdit."' 
								WHERE idUsers='".$idUser."'";
								include("connection.php");
								mysql_query($queryUpadateUser,$connection);
								mysql_close($connection);
								
							}
							
							$idUser=$_REQUEST['idUser'];
							$queryListUser="SELECT * FROM users WHERE idUsers='".$idUser."'";
							include('connection.php');
							$resultListUsers=mysql_query($queryListUser,$connection);
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
									
										<form action='".$_SERVER['PHP_SELF']."?page=13&idUser=".$idUser."' method='POST'>
										
											<input type='submit' class='btn btn-success' id='saveChangesEditUser' value='Save changes' name='saveChangesEditUser' class='form-control' style='margin-bottom:50px;'/>
										
										<tr>
											<th>Id user</th>
											<td>".$idUser."</td>
										</tr>
										<tr>
											<th>First name</th>
											<td><input type='text' value='".$firstName."' id='firstName' name='firstName' class='form-control'/></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><input type='text' value='".$lastName."' id='lastName' name='lastName' class='form-control'/></td>
										</tr>
										<tr>
											<th>Username</th>
											<td><input type='text' value='".$username."' id='username' name='username' class='form-control'/></td>
										</tr>
										<tr>
											<th>Email</th>
											<td><input type='text' value='".$email."' id='email' name='email' class='form-control'/></td>
										</tr>
										<tr>
											<th>Password</th>
											<td><input type='text' value='".$password."' id='password' name='password' class='form-control'/></td>
										</tr>
										<tr>
											<th>profilePicture</th>
											<td>".$profilePicture."</td>
										</tr>
										<tr>
											<th>Id role</th>
											<td><input type='text' value='".$idRole."' id='idRole' name='idRole' class='form-control'/></td>
										</tr>
										<tr>
											<th>Active</th>
											<td><input type='text' value='".$active."' id='active' name='active' class='form-control'/></td>
										</tr>
										</form>
									
									
								");
							}
							echo("</table>");
						?>
			
		</div>
	</div>
	
</div>