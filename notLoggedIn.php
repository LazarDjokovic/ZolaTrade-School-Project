<div class="container">
	<div class="col-md-6 col-md-offset-3">
	<div class="modal-content" id="notLoggedInModal">
		<!-- header-->
		<div class="modal-header">
			<h3 class="modal-title">You have to be logged in</h3>
		</div>
		
		
		<!-- body (form)-->
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="loginForm" name="loginForm">
			<div class="modal-body">
				
					<div class="form-group">
						<input type="username" class="form-control" placeholder="Username" name="username" id="username"/>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password" id="password"/>
					</div>
				
			</div>
			
			
			<!-- footer (button)-->
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-block" name="btnLogin" id="btnLogin">Log In</button><br/>
				Not registered yet? <a href="index.php?page=2">Create account</a>
			</div>
		</form>
	</div>
	</div>
</div>