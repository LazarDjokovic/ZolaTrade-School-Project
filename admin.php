<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="shortcut icon" href="images/shortcutIcon/shortcutIcon.jpg"/>
	</head>
	<body>
		<div class="container" style='margin-top:100px'>
			<div class="col-md-6 col-md-offset-3">
			<div class="modal-content" id="notLoggedInModal">
				<!-- header-->
				<div class="modal-header">
					<h3 class="modal-title">Adim panel ZOLATRADE</h3>
				</div>
				
				
				<!-- body (form)-->
				<form action="adminlol.php" method="POST" id="loginForm" name="loginForm">
					<div class="modal-body">
						
							<div class="form-group">
								<input type="username" class="form-control" placeholder="admin" name="username" id="username"/>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="admin" name="password" id="password"/>
							</div>
						
					</div>
					
					
					<!-- footer (button)-->
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-block" name="btnLogin" id="btnLogin">Log In</button><br/>
					</div>
				</form>
			</div>
			</div>
		</div>
	</body>
</html>