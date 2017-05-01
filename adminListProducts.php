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
	
	if(isset($_REQUEST['btnDeleteProducts'])){
		include('connection.php');
		if(!empty($_REQUEST['chbIdProduct'])) {
			foreach ($_REQUEST['chbIdProduct'] as $selected) {
				$queryDeleteProducts="DELETE FROM products WHERE idProduct='".$selected."';";
				mysql_query($queryDeleteProducts,$connection);
				//echo $selected;
			}
		}
		else{
			echo("
					<div class='row' style='text-align:center;'>
						<div class='col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12'>
							<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Warning!</strong> You need to select atleast one product!
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
			<h3><b>PRODUCTS</b></h3>
			<table class="table table-striped" style='text-align:left;'> 
				<thead> 
					<tr >
						<th>Id product</th>
						<th>Title</th>
						<th>Price</th>
						<th>Picture</th>
						<th>Description</th>
						<th>Trailer</th>
						<th>Edit Product</th>
						<th>Delete product</th>
					<tr>
				</thead>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>?page=15" method="POST">
					<?php
						$queryListProducts="SELECT * FROM products";
						include('connection.php');
						$resultListProducts=mysql_query($queryListProducts,$connection);
						mysql_close($connection);
						
						
						while($row=mysql_fetch_array($resultListProducts)){
							$idProduct=$row['idProduct'];
							$title=$row['title'];
							$price=$row['price'];
							$picture=$row['picture'];
							$description=$row['description'];
							$trailer=$row['trailer'];
							
							echo("
								<tr>
									<td style='text-align:center;'>".$idProduct."</td>
									<td>".$title."</td>
									<td>".$price."$</td>
									<td>".$picture."</td>
									<td>...</td>
									<td>".$trailer."</td>
									<td style='text-align:center;'>
										<a href='index.php?page=16&idProduct=".$idProduct."'><img src='images/edit/edit.jpg' alt='Edit user' style='width:25px;height:25px;'/></a>
									</td>
									<td style='text-align:center;'>
										<input type='checkbox' name='chbIdProduct[]' value='".$idProduct."'/>
									</td>
								</tr>
							");
						}
						echo("</table>");
						echo("
								<input type='submit' class='btn btn-success' name='btnDeleteProducts' id='btnDeleteProducts' value='Delete products'/>
								<a href='index.php?page=17'><button type='button' class='btn btn-success'>Add product</button></a>
							");
					?>
					</form>
		</div>
	</div>
</div>