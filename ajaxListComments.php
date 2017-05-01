<?php
	$idUser=$_GET['idUser'];
	$idProduct=$_GET['idProduct'];
	
	$queryListComments="SELECT * FROM comments WHERE idProduct='".$idProduct."' ORDER BY date DESC";
	include('connection.php');
	$resultListComments=mysql_query($queryListComments,$connection);
	mysql_close($connection);
	$countResultListComments=mysql_num_rows($resultListComments);
	
	
	if($idUser!=0){
		$queryListUserData="SELECT * FROM users WHERE idUsers='".$idUser."';";
		include('connection.php');
		$resultListUserData=mysql_query($queryListUserData,$connection);
		mysql_close($connection);
		
		while($row=mysql_fetch_array($resultListUserData)){
			$profilePictureUser=$row['profilePicture'];
			$usernameUser=$row['username'];
			
			echo("
				<div class='col-lg-1 col-ld-offset-2 col-md-1 col-md-offset-2 col-sm-2 col-xs-1'>
					<div class='thumbnail'>
						<img class='img-responsive user-photo' src='images/profile/".$profilePictureUser."'>
					</div>
				</div>

				<div class='col-lg-7 col-md-7 col-sm-10 col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<strong>".$usernameUser."</strong>
						</div>
						<div class='panel-body'>
							<textarea style='width:100%;height:50px;' id='taComment' name='taComment' placeholder='Comment...'></textarea>
						</div>	
					</div>
				</div>
				<div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12'>
					<input type='submit' value='Post comment' id='postComment' name='postComment' style='float:right;' onClick='postComment();'/>
				</div>
				<div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12'>
					<hr style='height:1px;background-color:#CCC;'/>
				</div>
			");
		}
	}
	else{
		echo("
				<div class='col-lg-1 col-ld-offset-2 col-md-1 col-md-offset-2 col-sm-2 col-xs-1'>
					<div class='thumbnail'>
						<img class='img-responsive user-photo' src='images/profile/default.png'>
					</div>
				</div>

				<div class='col-lg-7 col-md-7 col-sm-10 col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<strong>username</strong>
						</div>
						<div class='panel-body'>
							<b>Only registred users can post commets</b>
						</div>	
					</div>
				</div>
				<div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12'>
					<hr style='height:1px;background-color:#CCC;'/>
				</div>
			");
	}
	
	if($countResultListComments==0){
		echo("
			<div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-body' style='text-align:center;'>
							<b>There are no comments for this post</b>
						</div>	
					</div>	
				</div>
		");
	}
	else{
		while($row=mysql_fetch_array($resultListComments)){
			$profilePictureComment=$row['profilePicture'];
			$usernameComment=$row['username'];
			$dateComment=$row['date'];
			$comment=$row['comment'];
			
			
			echo("
				<div class='col-lg-1 col-ld-offset-2 col-md-1 col-md-offset-2 col-sm-2 col-xs-1'>
					<div class='thumbnail'>
						<img class='img-responsive user-photo' src='images/profile/".$profilePictureComment."'>
					</div>
				</div>

				<div class='col-lg-7 col-md-7 col-sm-10 col-xs-12'>
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<strong>".$usernameComment."</strong> <span class='text-muted' style='float:right;'> commented on ".$dateComment."</span>
						</div>
						<div class='panel-body'>
							".$comment."
						</div>	
					</div>	
				</div>
			");
		}
	}
?>