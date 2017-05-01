<div class="container">
	<?php
		include("registerCheck.php");
	?>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form action="index.php?page=2" role="form" method="POST" onSubmit="return registerCheck();">
				<h2>Registration form</h2>
				<hr/>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="firstName" id="firstName" class="form-control input-lg" placeholder="First Name" tabindex="1" onBlur="firstNameCheck();"/>
							<p style="display:none;" id="pFirstName">Must start with capital letter</p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="lastName" id="lastName" class="form-control input-lg" placeholder="Last Name" tabindex="2" onBlur="lastNameCheck();"/>
							<p style="display:none;" id="pLastName">Must start with capital letter</p>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="usernameReg" id="usernameReg" class="form-control input-lg" placeholder="Username" tabindex="3" onBlur="usernameCheck();"/>
					<p style="display:none;" id="pUsername">Must contain only letters and numbers, min 3 max 20 characters</p>
				</div>
				<div class="form-group">
					<input type="email" name="emailReg" id="emailReg" class="form-control input-lg" placeholder="Email Address" tabindex="4" onBlur="emailRegisterCheck();"/>
					<p style="display:none;" id="pEmailReg">Invalid email format</p>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordReg" id="passwordReg" class="form-control input-lg" placeholder="Password" tabindex="5" onBlur="passwordRegisterCheck();"/>
							<p style="display:none;" id="pPassword">Min 6 characters, must contatin atleast one number and one letter</p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="confirmPassword" id="confirmPassword" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" onBlur="confirmPasswordCheck();"/>
							<p style="display:none;" id="cPassword">Passwords don't match</p>
						</div>
					</div>
				</div>
				<hr/>
				<div class="row" style="text-align:center;">
					<div class="col-xs-12 col-md-6"><input type="submit" name="btnRegister" id="btnRegister" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				</div>
			</form>
		</div>
	</div>
	
	<!-- row before footer -->
	<div class="row" style="height:50px;"> 
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		</div>
	</div>
	
</div>