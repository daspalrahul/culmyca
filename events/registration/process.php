
<?php session_start(); 
	include "conn_db.php";
	$val=$_SESSION['next']; ?>
<?php
	if(isset($_SESSION['check']))
	{
		if($_SESSION['check']==0)
			header("Location: index.php?visitor=true");
	}
	else
		header("Location: index.php?visitor=true");
?>
<?php
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$collegename = $_POST['collegename'];
	$name = stripslashes($name);
	$contact = stripslashes($contact);
	//$contact+=0;
	$collegename = stripslashes($collegename); 
	$username = stripslashes($username);
	$password = stripslashes($password);
	$email = stripslashes($email);
	$admin=0;
	$salt=uniqid(mt_rand(), true);
	$hash=crypt($password,$salt);
	$num="0";
	try
	{
		try
		{
			$sth=$con->prepare("INSERT INTO culmyca_users (username,salt,hash,user_name,user_email,user_college,user_contact,user_admin) VALUES (?,?,?,?,?,?,?,?)");
			$sth->bindParam(1, $username);
			$sth->bindParam(2, $salt);
			$sth->bindParam(3, $hash);
			$sth->bindParam(4, $name);
			$sth->bindParam(5, $email);
			$sth->bindParam(6, $collegename);
			$sth->bindParam(7, $contact);
			$sth->bindParam(8, $admin);
		}
		catch(PDOException $se)
		{
			$se->getMessage();
		}
		try
		{
			$sth->execute();
		}
		catch(PDOException $pe)
		{
			$pe->getMessage();
		}
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
?>
<?php
	session_destroy();
	session_start();
	$_SESSION['next']=$val;
	header("Location: index.php?registered=true");
?>
