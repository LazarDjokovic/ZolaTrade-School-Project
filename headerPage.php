<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<!-- LOGO -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">ZOLATRADE</a>
		</div>
		
		<!-- Manu items-->
		<div class="collapse navbar-collapse" id="mainNavBar">
			<ul class="nav navbar-nav">
				<!--<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=7">All Products</a></li>
				<li><a href="index.php?page=5">Contact</a></li>
				<li><a href="index.php?page=6">Author</a></li>-->
				
				<?php include("menus.php");?>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li>
						<!-- LOGIN FORM-->
						<?php
							/*$queryOrdersCheck="SELECT * FROM orders WHERE idUser='".$_SESSION['idUsers']."'";
							include('connection.php');
							$resultOrdersCheck=mysql_query($queryOrdersCheck,$connection);
							mysql_close($connection);
							$numRowsOrdersCheck=mysql_num_rows($resultOrdersCheck);*/
							if(isset($_SESSION['username'])){
								$username=$_SESSION['username'];
								$idUser=$_SESSION['idUsers'];
								
								if($username=="lignjoslavPipak" && $idUser=="25"){
									echo("<a href='index.php?page=12' style='color:#FF0000'><b>ADMIN PANEL</b></a></li>");
									echo("<li><a href='logout.php'>Logout</a></li>");
								}
								else{
									echo("<input type='hidden' id='idUsersValue' value='".$_SESSION['idUsers']."'/>");
									echo("<a href='index.php?page=4'>My Profile</a></li>");
									echo("<li><a href='index.php?page=4'>
												<span class='glyphicon glyphicon-shopping-cart' id='shoppingCart'></span> 
												<span id='numberOfOrders'></span></a></li>
												<script type='text/javascript'>numberOfOrders();</script>");
									echo("<li><a href='logout.php'>Logout</a></li>");
								}
							}
							else{
								echo("<button type='button' class='btn btn-success' data-toggle='modal' data-target='#popUpWindow'>Log In</button>");
							}
						?>
						
						
						<div class="modal fade" id="popUpWindow">
							<div class="modal-dialog">
								<div class="modal-content">
									<!-- header-->
									<div class="modal-header">
										<button tupy="button" class="close" data-dismiss="modal">&times;</button>
										<h3 class="modal-title">Log In Form</h3>
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
			
				</li>
			</ul>
		</div>
	</div>
</nav>