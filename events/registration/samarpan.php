<link rel="stylesheet" href="css/bootstrap.min.css" />
<?php include "conn_db.php";
	echo "<div class='jumbotron'>Yup, this looks ugly, deal with it :P <a class='btn btn-success' href='logout.php'>Logout</a></div>";
	echo "<div class='container'>";
	$val=66;
	while($val<=77)
	{
		$sql="SELECT event_name FROM culmyca_events WHERE event_id='".$val."'";
		$sql=$con->prepare($sql);
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		$sql->execute();	
		$ans=$sql->fetch();
		echo $ans['event_name']."<br />";
		$sql="SELECT user_id FROM culmyca_registration WHERE event_id='".$val."'";
		$sql=$con->prepare($sql);
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		$sql->execute();
		echo "<table class='table table-striped'>";
		while($ans=$sql->fetch())
		{
			$uid=$ans['user_id'];
			$sth="SELECT user_name,user_email,user_college,user_contact FROM culmyca_users WHERE user_id='".$uid."'";
			$sth=$con->prepare($sth);
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$sth->execute();	
			while($result=$sth->fetch())
			{
				echo "<tr><td>".$result['user_name']."</td><td>".$result['user_email']."</td><td>".$result['user_college']."</td><td>".$result['user_contact']."</td></tr>";
			}
		}
		echo "</table>";
		$val+=1;
	}
	echo "</div>";
?>