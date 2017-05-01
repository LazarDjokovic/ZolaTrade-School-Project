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
	
	if(isset($_REQUEST['btnDeleteComments'])){
		include('connection.php');
		if(!empty($_REQUEST['chbIdComment'])) {
			foreach ($_REQUEST['chbIdComment'] as $selected) {
				$queryDeleteComments="DELETE FROM comments WHERE idComment='".$selected."';";
				mysql_query($queryDeleteComments,$connection);
				//echo $selected;
			}
		}
		else{
			echo("
					<div class='row' style='text-align:center;'>
						<div class='col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12'>
							<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Warning!</strong> You need to select atleast one comment!
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
			<h3><b>Comments</b></h3>
			<table class="table table-striped" style='text-align:left;'> 
				<thead> 
					<tr >
						<th>Id comment</th>
						<th>Id product</th>
						<th>Id user</th>
						<th>Profile picture</th>
						<th>Username</th>
						<th>Date</th>
						<th>Comment</th>
						<th>Edit comment</th>
						<th>Delete comments</th>
					<tr>
				</thead>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>?page=18" method="POST">
					<?php
						$queryListComments="SELECT * FROM comments";
						include('connection.php');
						$resultListComments=mysql_query($queryListComments,$connection);
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
								<tr>
									<td style='text-align:center;'>".$idComment."</td>
									<td>".$idProduct."</td>
									<td>".$idUser."</td>
									<td><img src='images/profile/".$profilePicture."' style='width:50px;height:50px' class='img img-rounded'/></td>
									<td>".$username."</td>
									<td>".$date."</td>
									<td>".$comment."</td>
									<td style='text-align:center;'>
										<a href='index.php?page=19&idComment=".$idComment."'><img src='images/edit/edit.jpg' alt='Edit user' style='width:25px;height:25px;'/></a>
									</td>
									<td style='text-align:center;'>
										<input type='checkbox' name='chbIdComment[]' value='".$idComment."'/>
									</td>
								</tr>
							");
						}
						echo("</table>");
						echo("
								<input type='submit' class='btn btn-success' name='btnDeleteComments' id='btnDeleteComments' value='Delete comments'/>
							");
					?>
					</form>
		</div>
	</div>
</div>