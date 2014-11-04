<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } $username = $_SESSION['username'];
if(isset($_POST["submit"])){
$name = $_POST['name'];
$company = $_POST['company'];
$desig = $_POST['desig'];
$experience = $_POST['experience'];
$user = $_POST['username'];
$email = $_POST['email'];
			$query1 =  "UPDATE `user` SET `name`='$name',`company`='$company',
			`desig`='$desig',`experience`='$experience',`username`='$user',
			`email`='$email' WHERE username='$username'";
			$_SESSION['name'] = $name;
			$_SESSION['username'] = $username;
			$result1 = mysql_query($query1) or die(mysql_error());
				if($result1)
					$msg = ": Success!";
	}				
$query = "SELECT * FROM `user` WHERE username='$username'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
while($row = mysql_fetch_array($result)){
?>

<html lang="en">
	<head>
		<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
		</script>
		<!--Inclusions-->
			<meta charset="utf-8">
			<title>Welcome <?php echo($_SESSION['name']);?> </title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			<link href="css/bootstrap.min.css" rel="stylesheet">
			
			<link type="text/css" rel="stylesheet" href="css/main.css">
			<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
		<div class="container" width=200px>
						<div class="panel panel-default" style="margin:0 auto;width:50%">
							<div class="panel-heading">
								<h2 class="panel-title">User Summary<?php echo($msg);?></h2>
							</div>
							<div class="panel-body">
								<form name="contactform" method="post" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputName" class="col-sm-3 control-label nopadding">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?php echo($row['name']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="username" class="col-sm-3 control-label nopadding">Username</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo($row['username']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-sm-3 control-label nopadding">E-Mail</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" value="<?php echo($row['email']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="company" class="col-sm-3 control-label nopadding">Company Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="cname" name="company" placeholder="Company Name" value="<?php echo($row['company']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="desig" class="col-sm-3 control-label nopadding">Job Title</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="desig" name="desig" placeholder="Designation" value="<?php echo($row['desig']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-sm-3 control-label nopadding">Experience (Yrs.)</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="experience" name="experience" placeholder="Experience" value="<?php echo($row['experience']);?>" required />
										</div>
									</div>
									
									<div class="form-group" align=center>
										
											<button type="submit" class="btn btn-default" name=submit style="margin-bottom:-10px;">
												Save Changes
											</button>
									
									</div>
								</form>

							</div>
						</div>
					</div>
	</body>
</html>
<?php }}?>