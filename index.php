<?php
	session_start();
	
    if(isset($_REQUEST['btnLogin'])){
		$username=$_REQUEST['username'];
		$password= $_REQUEST['password'];

		$password=md5($password);

		$query="SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";

		include("connection.php");
		$result=mysql_query($query,$connection);
		mysql_close($connection);

		$id="";
		$dbPassword="";
		$dbUsername="";
		$dbActive="";

		while($row=mysql_fetch_array($result)){
		   $id=$row['idUsers'];
		   $dbPassword=$row['password'];
		   $dbUsername=$row['username'];
		   $dbActive=$row['active'];
		}

		if($dbPassword=='' || $dbUsername==''){
		   echo("<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<p><strong>Warning!</strong> Email or password is incorrent, please try again.</p>
				  </div>");
		}
		else if($password==$dbPassword && $username==$dbUsername && $dbActive=='1'){
		   $_SESSION['username']=$username;
		   $_SESSION['idUsers']=$id;
		   //header("Location:index.php");
		}
		else{
		   echo("<div class='alert alert-danger alert-dismissable fade in' style='text-align:center;'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<p><strong>Warning!</strong> Email or password is incorrent, please try again.</p>
				  </div>");
		}
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<meta charset="utf-8">
		<title>ZolaTrade</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/main.css"/>
		<link rel="shortcut icon" href="images/shortcutIcon/shortcutIcon.jpg"/>
		<link rel="stylesheet" href="styles/lightbox.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="scripts/mainJS.js"></script>
	</head>
		
	<body>
		<?php
			include("headerPage.php");
			
			if(isset($_REQUEST['page']))
			{ 
				$page=$_REQUEST['page'];
			}else
			{
				$page=100;
			} 
			switch($page)
			{
				case "0": include("content.php");break;
				case "1": include("product.php");break;
				case "2": include("register.php");break;
				case "4": include("myProfile.php");break;
				case "5": include("contact.php");break;
				case "6": include("author.php");break;
				case "7": include("allProducts.php");break;	
				case "8": include("confirm.php"); break; 
				case "9": include("notLoggedIn.php");break;
				case "10": include("addToCart.php");break;
				case "11": include("gallery.php");break;
				case "12": include("apzt951ldj.php");break;
				case "13": include("adminUserEdit.php");break;
				case "14": include("adminAddUser.php");break;
				case "15": include("adminListProducts.php");break;
				case "16": include("adminEditProduct.php");break;
				case "17": include("adminAddProduct.php");break;
				case "18": include("adminListComments.php");break;
				case "19": include("adminEditComment.php");break;
				default: include("content.php");break;
			}
    
			
			include("footer.php");
		?>
		<script src="scripts/lightbox-plus-jquery.min.js"></script>
    </body>
</html>