<?php
	session_start();
	$val=$_SESSION['next'];
	session_destroy();
	header('Location: /culmyca/events/?id='.$val);
?>
