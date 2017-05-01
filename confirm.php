<?php

	$emailConfirm=$_REQUEST['email'];
	$code=$_REQUEST['code'];
	
	include("connection.php");
	$queryConfirm="SELECT * FROM users WHERE email='".$emailConfirm."' AND password='".$code."'";
	$result=mysql_query($queryConfirm,$connection);
	
	if($result){
		
		$queryConfirm2="UPDATE users SET active=1 WHERE email='".$emailConfirm."' AND password='".$code."'";
		$result2=mysql_query($queryConfirm2,$connection);
		mysql_close($connection);
		
		if($result2){
			echo("<div class='container'>
					<div class='row'>
						<div class='col-xs-12 col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2'>
							<div class='alert alert-dismissable alert-success fade in' style='text-align:center;'>
								<p><strong>Success!</strong> You have registered your account. WELCOME! NOW YOU CAN LOG IN.</p>
							</div>
						</div>
					</div>
				  </div>");
		}
	}

?>