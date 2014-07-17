<?php
	include "conn_db.php";
	session_start();
	$eid=$_POST['eid'];
	$sql="INSERT INTO culmyca_registration(event_id,user_id) VALUES (?,?)";
	$sql=$con->prepare($sql);
	$sql->bindParam(1,$eid);
	$sql->bindParam(2,$_SESSION['uid']);
	try
	{
		$sql->execute();
	}
	catch(PDOException $pe)
	{
		$pe->getMessage();
	}
	echo "Registration Successful!!"
?>