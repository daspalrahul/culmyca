<?php
	ini_set("display_errors", "1");
	error_reporting(-1);
	try
	{
		$con= new PDO("mysql:host=localhost;dbname=culmyca","root","");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
