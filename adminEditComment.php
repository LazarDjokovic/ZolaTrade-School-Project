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
							if(isset($_REQUEST['saveChangesEditComment'])){
								$idComment=$_REQUEST['idComment'];
								//$idProduct=$row['idProduct'];
								//$idUser=$row['idUser'];
								//$profilePicture=$row['profilePicture'];
								//$username=$row['username'];
								$date=$_REQUEST['date'];
								$comment=$_REQUEST['comment'];
								
								$queryUpadateComment="UPDATE comments SET date='".$date."', comment='".$comment."' WHERE idComment='".$idComment."';";
								include("connection.php");
								mysql_query($queryUpadateComment,$connection);
								mysql_close($connection);
								
							}
							
							$idComment=$_REQUEST['idComment'];
							$queryListComment="SELECT * FROM comments WHERE idComment='".$idComment."'";
							include('connection.php');
							$resultListComments=mysql_query($queryListComment,$connection);
							mysql_close($connection);
							
							
							while($row=mysql_fetch_array($resultListComments)){
								$idComment=$row['idComment'];
								$idProduct=$row['idProduct'];
								$idUser=$row['idUser'];
								$profilePicture=$row['profilePicture'];
								$username=$row['username'];
								$date=$row['date'];
								$comment=$row['comment'];
								
								echo("
									
										<form action='".$_SERVER['PHP_SELF']."?page=19&idComment=".$idComment."' method='POST'>
										
											<input type='submit' class='btn btn-success' id='saveChangesEditComment' value='Save changes' name='saveChangesEditComment' class='form-control' style='margin-bottom:50px;'/>
										
										<tr>
											<th>Id comment</th>
											<td>".$idComment."</td>
										</tr>
										<tr>
											<th>Id product</th>
											<td>".$idProduct."</td>
										</tr>
										<tr>
											<th>Id user</th>
											<td>".$idUser."</td>
										</tr>
										<tr>
											<th>Profile picture</th>
											<td><img src='images/profile/".$profilePicture."' name='profilePicture' id='profilePicture' class='img img-rounded' style='width:50px;height:50px;'/></td>
										</tr>
										<tr>
											<th>Username</th>
											<td>".$username."</td>
										</tr>
										<tr>
											<th>Date</th>
											<td><input type='text' value='".$date."' id='date' name='date' class='form-control'/></td>
										</tr>
										<tr>
											<th>Comment</th>
											<td><textarea type='text' id='comment' name='comment' class='form-control'>".$comment."</textarea>
										</tr>
										</form>
									
									
								");
							}
							echo("</table>");
						?>
			
		</div>
	</div>
	
</div>