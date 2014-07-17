<!DOCTYPE HTML>
<html>
	<head>
		<title>Event Information</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="icon" href="images/favicon.ico">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/jquer.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<?php 
		session_start();
		ob_start();
		include "conn_db.php";
		$eid=$_GET['id'];  ?>
	<body>

		<!-- Header -->
			<div id="header" class="skel-panels-fixed" >

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							
							<h1 id="title"><?php echo $eid; ?></h1>
						</div>

					<!-- Nav -->
			
						<nav id="nav">
							<ul>
								
								<?php
									$_SESSION['next']=$eid;
									$sql="SELECT event_name FROM culmyca_events WHERE event_club='".$eid."'";
									$sql=$con->prepare($sql);
									$sql->setFetchMode(PDO::FETCH_ASSOC);
									$sql->execute();
									$hit=1;
									$id_name='#top';
									while($ans=$sql->fetch())
									{
										if($hit==1)
											echo "<li><a href='".$id_name.$hit."' id='top-".$hit."-link' class='skel-panels-ignoreHref active'><span class='fa fa-book'>".$ans['event_name']."</span></a></li>";
										else
											echo "<li><a href='".$id_name.$hit."' id='top-".$hit."-link' class='skel-panels-ignoreHref'><span class='fa fa-book'>".$ans['event_name']."</span></a></li>";

										$hit+=1;
									}
								?>
							</ul>
						</nav>
				
				</div>
				
			</div>
		<!-- Main -->
			<div id="main">
				<section class="conatiner">
					<?php
						if(isset($_SESSION['uid']))
						{
							if($_SESSION['uid'])
								echo "hi <strong>".$_SESSION['username']."</strong>! &nbsp;   <a href='registration/logout.php'>logout</a>";
							else{
								//echo "hi <strong>".$_SESSION['check']."</strong>!";
								echo "<ul class='menu'>
							<li><a href='registration/'>Login </a></li>
							<li><a href='registration/'>Register</a></li>
						</ul>"; }	
						}
						else
						{
					?>
					<ul class="menu">
							<li><a href="registration/">Login </a></li>
							<li><a href="registration/">Register</a></li>
						</ul>
					<?php } ?>
				</section>
				<?php
					$sql="SELECT * FROM culmyca_events WHERE event_club='".$eid."'";
					$sql=$con->prepare($sql);
					$sql->setFetchMode(PDO::FETCH_ASSOC);
					$sql->execute();
					$hit=1;
					$id_name_t='top';
					while($ans=$sql->fetch())
					{
						?>

						<section id="<?php echo $id_name_t.$hit; ?>">
							<header>
								<?php echo "<strong><h3 class='strong'>".$ans['event_name']."</h3></strong>"; ?>
							</header>
							<?php echo "<strong><h4><strong><em>Description</em></strong></h4></strong>";
									echo $ans['event_description']."<br />";
									echo "<h4><strong><em>Rules</em></strong></h4>";
									echo $ans['event_rules']."<br />";
									echo "<h4><strong><em>Contact</em></strong></h4>";
									echo $ans['event_coordinator']."<br />".$ans['event_coordinator_phone']."<br />" ?>
							<footer>
								<?php if(isset($_SESSION['username']))
										{
											?>
								<input tem="<?php echo $ans['event_id']; ?>" type="button" value="Register" class="button submit but"></input>
								<p style="display:none;color:#1E482E">Registration Successful!!</p>
								<?php } ?>
							</footer>
						</section>
						<?php
						$hit+=1;
					}
				?>
			</div>

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; 2014</p>
					</div>
					<div class="bottom">
						<br />
					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
							<li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
							<li><a href="#" class="fa fa-envelope solo"><span>Email</span></a></li>
						</ul>
				
				</div>
				
			</div>

	</body>
</html>