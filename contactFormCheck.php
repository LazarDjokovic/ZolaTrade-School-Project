<?php
	if(isset($_REQUEST['sendForm'])){
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$yourMessage=$_REQUEST['message'];
		
		$message="
		<html>
			<head></head>
			<body>
				<table border='1px'>
					<tr>
						<th colspan='2' style='color:#0000FF;'>Contact Form ZolaTrade</th>
					</tr>
					<tr>
						<td style='color:#0000FF;'><b>Name</b></td>
						<td>".$name."</td>
					</tr>
					<tr>
						<td style='color:#0000FF;'><b>Email</b></td>
						<td>".$email."</td>
					</tr>
					<tr>
						<td style='color:#0000FF;'><b>Message</b></td>
						<td>".$yourMessage."</td>
					</tr>
				</table>
			</body>		
		</html>";
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;" . "\r\n";
		 
		mail("ldjokovic95@gmail.com","Contact From | ZolaTrade",$message,$headers);
		
		echo("<div class='alert alert-success fade in' style='text-align:center;'>
					<a href='index.php?page=5' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> The message has been sent.
			  </div>");
	}
?>