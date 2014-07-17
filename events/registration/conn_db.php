<?php
	ini_set("display_errors", "1");
	error_reporting(-1);
	try
	{
		$con= new PDO("mysql:host=localhost;dbname=culmyca","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
