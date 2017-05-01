<?
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
		   header("Location:index.php?page=0");
		}
		else if($password==$dbPassword && $username==$dbUsername && $dbActive=='1'){
		   $_SESSION['username']=$username;
		   $_SESSION['idUsers']=$id;
		   header("Location:index.php?page=1");
		}
		else{
		   header("Location:index.php?page=1");
		}
	}
?>