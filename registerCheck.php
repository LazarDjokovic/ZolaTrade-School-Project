<?php

	if(isset($_REQUEST['btnRegister'])){
		$firstName=trim($_REQUEST['firstName']);
		$lastName=trim($_REQUEST['lastName']);
		$username=trim($_REQUEST['usernameReg']);
		$emailRegister=trim($_REQUEST['emailReg']);
		$passwordRegister=trim($_REQUEST['passwordReg']);
		$confirmPasswordRegister=trim($_REQUEST['confirmPassword']);
		
		$mistakes=0;
		
		$regFirstName="/^[A-Z]{1}[a-z]{2,20}$/";
		$regLastName="/^[A-Z]{1}[a-z]{2,20}$/";
		$regUsername="/^[a-zA-z0-9]{3,20}$/";
		$regEmailRegister="/^[\w\.]+[\d]*@[\w]+\.\w{2,3}(\.[\w]{2})?$/";
		
		if(!preg_match($regFirstName, $firstName)){
			$mistakes++;
		}
		if(!preg_match($regLastName, $lastName)){
			$mistakes++;
		}
		if(!preg_match($regUsername, $username)){
			$mistakes++;
		}
		if(!preg_match($regEmailRegister, $emailRegister)){
			$mistakes++;
		}
		
		/*
		min 6 characters, max 50 characters
		must contain 1 letter
		must contain 1 number
		may contain special characters like !@#$%^&*()_+
		*/
		
		if (strlen($passwordRegister) < 6) {
			$mistakes++;
		} 
		
		if (strlen($passwordRegister) > 50) {
			$mistakes++;
		} 
		
		if (!preg_match('/[a-zA-Z]/', $passwordRegister)) {
			$mistakes++;
		} 
		
		if (!preg_match('/[0-9]/', $passwordRegister)) {
			$mistakes++;
		} 
		
		
		if($mistakes==0){
			$confirmPasswordRegister=md5($confirmPasswordRegister);
			$query="SELECT * FROM users WHERE email='".$emailRegister."' OR username='".$username."'";
			include("connection.php");
			$result=mysql_query($query,$connection);
			mysql_close($connection);
			
			if(mysql_num_rows($result)==0){
				
				$query2="INSERT INTO users( firstName, lastName, username, email, password , profilePicture, idRole, active ) VALUES ('".$firstName."','".$lastName."', '".$username."',  '".$emailRegister."',  '".$confirmPasswordRegister."',  'default.png',  2,  0)";
				
				include("connection.php");
				$result2=mysql_query($query2,$connection);
				mysql_close($connection);
				
				if(!$result2){
					header("Location:index.php?page=2&message=Error: ".mysql_error());
					echo("Proba");
				}
				else{
					$to=$emailRegister;
					$subject='Registration';
					$message="<html>
								<head></head>
								<body style='font-family: Arial;'>
									<h1 style='text-align:center;'>Click here to confirm your registration</h1>
									<div style='margin:0 auto;background-color:#006699;border-radius:5px;width:250px;height:50px;'>
										<p style='text-align:center;padding-top:15px;'><a href='http://zolatrade.lazardjokovic.com/index.php?page=8&email=".$emailRegister."&code=".$confirmPasswordRegister."' style='color:#FFF;text-decoration:none'>Confirm</p></a>
									</div>
									<p style='text-align:center;'>----------------ZolaTrade----------------</p>
								</body>
							  </html>";
					
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;" . "\r\n";
					
					if(mail($to,$subject,$message,$headers))
                    {
						echo("<div class='alert alert-success alert-dismissable fade in'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<strong>Success!</strong> The activation email has been sent to your email address.
							  </div>");
                    }
                    else
                    {
						echo("<div class='alert alert-danger alert-dismissable fade in'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<strong>Warning!</strong> Registration failed.
							  </div>");
                    }
				}
			}
			else{
				echo("<div class='alert alert-danger alert-dismissable fade in'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>Warning!</strong> User with this email address or username already exists. Please try again.
					  </div>");
			}
		}
	}	
?>