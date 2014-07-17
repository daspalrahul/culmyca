<?php include 'conn_db.php' ?>
<?php 
	session_start();
	$TTL=3600;
	if(isset($_SESSION["username"]))
	{
		if(time()-$_SESSION["timeout"]>$TTL)
		{
			$val=$_SESSION['next'];
			session_destroy();
			session_start();
			$_SESSION['next']=$val;
			$_SESSION['check']=0;
		}
		else{
			$_SESSION["timeout"]=time();
			$_SESSION["check"]=12;			
			header("Location: /culmyca/events/?id=".$_SESSION['next']);}
	}
	else
		$_SESSION['check']=0;
?>
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/file.js"></script>
<body style="height:100%">
	<?php include 'header.php'; ?>

<?php
	if(isset($_GET['visitor']))
	{
		if($_GET['visitor']=='true')
		{
?>		
<div class="alert alert-danger" style="margin-top:0px" align="center">
	<strong>Aha!! </strong>You must login first
</div>
<div class="container" style="min-height:89%">

<?php			
		}
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h3>Login</h3>
			<form action="check.php" method="post" role="form" id="ford">
				<div class="form-group">
					<label for="exampleInputEmail">Username : <div style="color:red" class="use1"><small>Required</small></div></label>
					<input type="text" name="username" class="form-control" id="exampleInputEmail" />
				</div>
				<div class="form-group">
					<label for="exampleInputPassword">Password : <div style="color:red" class="pass1"><small>Required</small></div></label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword"/>
				</div>
				<?php 
					if(isset($_SESSION["login"]))
						if($_SESSION["login"]==false)
							echo "<strong><small style='color:red'>Invalid Credentials</small></strong><br />";
				?>
				<br />
				<input type="submit" class="btn btn-success" />
			</form>
		<br />
		</div>
		<div class="col-md-1" style="padding-top:130px">
			<center>--<b>or</b>--</center>
		</div>
		<div class="col-md-6">
			<h3>Register</h3>
			<form action="process.php" method="post" id="register" role="form">
				<div class="form-group">
				<label for="exampleInputEmail1">Username : <div style="color:red" class="use2"><small style="color:red" id="reguse">Required</small></div></label>
				<input type="text" name="username" class="form-control" id="exampleInputEmail1"/></div>
				<div class="form-group">
				<label for="exampleInputName1">Full Name : <div style="color:red" class="name1"><small style="color:red" id="regname">Required</small></div></label>
				<input type="text" name="name" class="form-control" id="exampleInputName1"/></div>
				<div class="form-group">
				<label for="exampleInputPassword1">Password : <div style="color:red" class="pass2"><small style="color:red" id="regpass">Required</small></div></label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1"/></div>
				<div class="form-group">
				<label for="exampleInputPassword1">Re-type Password : <div style="color:red" class="repass2"><small style="color:red" id="regrepass">Required</small></div></label>
				<input type="password" name="rep_password" class="form-control" id="exampleInputPassword1" /></div>
				<div class="form-group">
				<label for="exampleInputEmail1">Email : <div style="color:red" class="email1"><small style="color:red" id="regemail">Required</small></div></label>
				<input type="text" name="email" class="form-control" id="exampleInputEmail1" /></div>
				<div class="form-group">
				<label for="exampleInputContact1">Contact No. : <div style="color:red" class="contact1"><small style="color:red" id="regcontact">Required</small></div></label>
				<div class="input-group">
  				<span class="input-group-addon">+91</span>
				<input type="text" name="contact" class="form-control" id="exampleInputContact1"/></div></div>
				<div class="form-group">
				<label for="exampleInputCollege1">College Name : <div style="color:red" class="college1"><small style="color:red" id="regcollege">Required</small></div></label>
				<input type="text" name="collegename" class="form-control" id="exampleInputCollege1"/></div>
				By clicking on 'Submit' you agree with the <a target='_blank' href="/events/registration/tos.html" class="link">Terms of Service </a>and <a target='_blank' href="/events/registration/privacy.html">Privacy Policy</a>
				<br /><br />
			<input id="bt" type="submit" action="submit" value="Submit" class="btn btn-success"/>
			</form>
		</div>
	</div>
</div>
</div>
<?php include "footer.php" ?>
</body>
