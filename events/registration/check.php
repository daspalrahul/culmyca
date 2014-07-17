<?php session_start();
		ob_start();	 
		include "conn_db.php" ?> 
<?php	
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username==""||$password=="")
	{
		header("Location: index.php");
	}
	$username = stripslashes($username);
	$password = stripslashes($password);
	$sql= "SELECT username,salt,hash,user_id,user_admin FROM culmyca_users WHERE username = '".$username."'";
	$res = $con->query($sql);
	$res->setFetchMode(PDO::FETCH_ASSOC);
	$result = $res->fetch();
	if($result)
	{
		$salt=$result['salt'];
		$has=$result['hash'];
		$hash=crypt($password,$salt);
		if($hash==$has)
		{
			$_SESSION["timeout"] = time();
			$_SESSION["username"] = $username;
			$_SESSION["uid"]=$result["user_id"];
			$_SESSION["login"] = true;
			$_SESION["check"] = 12;
			if($result['user_admin']=='999')
				header("Location: home.php");
			else {
			$url="/culmyca/events/?id=".$_SESSION['next'];
			header("Location: ".$url); }
		}
		else
		{
			$_SESSION["login"] = false;
			$url="index.php";
			header("Location: ".$url);
		}
	}
	else
	{
		$_SESSION["login"] = false;
		$url="index.php";
		header("Location: ".$url);
	}
?>
