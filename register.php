<?php
	require('connect.php');
	$msg="";
	$msg1="";
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
		
		/*$name = $_POST['name'];
		$company = $_POST['company'];
        $desig = $_POST['desig'];
		$experience = $_POST['experience'];*/
		$username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
 
 		$query_check = "SELECT * FROM `user` WHERE `username`='$username' or 'email'='$email'";
 		$result_check = mysql_query($query_check) or die(mysql_error());
 		$count = mysql_num_rows($result_check);
 		if ($count>=1){
 			$msg1="User already exists!";
 		}
 		else{
        $query = "INSERT INTO `user`(`name`, `company`, `desig`, `experience`, `username`, `email`, `password`) 
		VALUES ('','','','0.0','$username','$email',MD5('$password'))";
        $result = mysql_query($query) or die(mysql_error());
		$msg = $result;
		}
	}
    ?>
<!DOCTYPE html>
<html>
	<head>

			<!--Inclusions-->
				<meta charset="utf-8">
				<title>INES Login</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="INES Questionnaire">
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
		<?php if(!$msg){ ?>
		<div class="wrapper">
			<form class=form-signin action="" method="POST">      
				  <h2 class="form-signin-heading" align=center>REGISTER</h2>
				  <div align=center><?php echo($msg1);?></div>
				  <!--<input type="text" class="form-control" name="name" placeholder="Name" required="" autofocus="" />
				  <input type="text" class="form-control" name="company" placeholder="Company" required />
				  <input type="text" class="form-control" name="desig" placeholder="Designation" required="" />
				  <input type="text" class="form-control" name="experience" placeholder="Experience (Yrs.)" required />-->
				  <input type="text" class="form-control" name="username" placeholder="Username" required />
				  <input type="email" class="form-control" name="email" placeholder="E-mail Address" required />
				  <input type="password" class="form-control" name="password" placeholder="Password" required /> 
				  
				  
				  
				  <!--<label class="checkbox">
					<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
				  </label>-->
				 <div class="col-sm-6 nopadding">
					<button class="btn btn-default" type="submit" style="display: block; width: 100%;">Register</button>
				</div>
				<div class="col-sm-6 nopadding">
					<button class="btn btn-default" type="reset" style="display: block; width: 100%;">Reset</button>
				</div>
			</form>
			<form class="form-signin">
				<div class="col-sm-6 nopadding col-sm-offset-3" style="text-align:center;">
				<a class="btn btn-default" type="submit" style="display: block; width: 100%;" href="login.php">Go Back</a>
				</div>
				<!--<div class="col-sm-6 nopadding">
				<a class="btn btn-default" type="submit" style="display: block; width: 100%;" href="php_mailer.php">Forgot Password</a>
				</div>-->
			</form>		
		</div>

		<!--Inclusions-->
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>

<?php }	if($msg){
        ?>
		<div align=center style="margin-left:auto; margin-right:auto;">
		<div class=" well well-sm" align=center >User Successfully added. Redirecting to Login Screen..</div>
	</div>
	</body>
</html>
<meta http-equiv="refresh" content="2; url=login.php" />
			<?php
		}
	?>