<?php  //Start the Session

session_start();
$_SESSION['username']=NULL;
$_SESSION['name']=NULL;
require('connect.php');
$msg="";
 
//The form is submitted or not.
//If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){

//Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];

//Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE username='$username' and password=MD5('$password')";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);

//If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
while($row = mysql_fetch_array($result)){
$_SESSION['name'] = $row['name'];															
}}else{

//If the login credentials doesn't match, he will be shown with an error message.
$msg =  "Invalid Login Credentials.";
}
}

//If the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
 ?>
<script>window.location.replace("main.php");</script>
 <?php
}
else{
//When the user visits the page first time, simple login form will be displayed.
?>
<!DOCTYPE html>
<html>
	<head>

		<!--Inclusions-->
			<meta charset="utf-8">
			<title>UIG Login</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="UIG Questionnaire">
			<meta name="author" content="adityabhatia">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			
			<link type="text/css" rel="stylesheet" href="css/login.css">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	
	<body style="background-color:#f5f5f5">
		<div class="row">
		<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container-fluid">
				<div class="navbar-header">
					<div class="navbar-brand" style="padding: 8px 8px 8px 8px;"><img src="img/uig-logo.png"></img></div>
				</div>
			</div>
		</nav>
	</div>
		<!-- Form for logging in the users -->
	<div class="row">
		<div class="wrapper">
			<form class=form-signin action="login.php" method="POST">      
				  <h2 class="form-signin-heading" align=center>LOGIN</h2>
				  <div style="margin-top:-20px; text-align: justify;">
				  Please use existing login credentials to continue. Incase you do not have an account, please register first.<br /><br />
				  </div>
				  <div align=center><?php echo($msg);?></div>
				  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
				  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
				  
				  <!--<label class="checkbox">
					<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
				  </label>-->
				  <div class="col-sm-6 nopadding">
					<button class="btn btn-default" type="submit" style="display: block; width: 100%;">Login</button>
				</div>
				<div class="col-sm-6 nopadding">
					<button class="btn btn-default" type="reset" style="display: block; width: 100%;">Reset</button>
				</div>
			</form>
			<form class="form-signin">
				<div class="col-sm-6 nopadding">
				<a class="btn btn-default" type="submit" style="display: block; width: 100%;" href="register.php">Register</a>
				</div>
				<div class="col-sm-6 nopadding">
				<a class="btn btn-default" type="submit" style="display: block; width: 100%;" href="php_mailer.php">Forgot Password</a>
				</div>
			</form>		
		</div>
	</div>
	<?php } ?>

		<!--Inclusions-->
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>