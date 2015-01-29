<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } 
else{
if (isset($_POST['submit'])){
$username = $_SESSION['username'];
$reason = $_POST['reason'];
$message = $_POST['message'];

$query = "INSERT INTO `contact` (username, reason, message) VALUES ('$username', '$reason', '$message')";
$result = mysql_query($query) or die(mysql_error());
if($result){
            $msg = ": Thanks for your Message!";
        }
}
}
?>

<html lang="en">
	<head>
		<!--Inclusions-->
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
			
		<!--Inclusions-->
			<meta charset="utf-8">
			<title>Welcome <?php echo($_SESSION['username']);?> </title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/dashboard.css">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			
			
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
	<div class="col-xs-12 col-sm-12"
		<div class="container" width=200px>
			<div class="panel panel-default" style="margin:0 auto; max-width:500px;">
							<div class="panel-heading">
								<h2 class="panel-title">Contact Form<?php echo($msg);?></h2>
							</div>
							<div class="panel-body">
							<form name="contactform" method="post" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputName" class="col-sm-3 col-xs-3 control-label nopadding" align=right>Subject</label>
										<div class="col-sm-9 col-xs-9">
											<input type="text" class="form-control" id="reason" name="reason" placeholder="Subject" value="" required />
										</div>
									</div>
									<div class="form-group">
										<label for="username" class="col-sm-3 col-xs-3 control-label nopadding" align=right>Message</label>
										<div class="col-sm-9 col-xs-9">
											<textarea type="text" class="form-control" id="message" name="message" placeholder="Message" value="" style="resize:none;"required /></textarea>
										</div>
									</div>
									<div class="form-group" align=center>
										
											<button type="submit" class="btn btn-default" name=submit style="margin-bottom:-10px;">
												Send Message
											</button>
									
									</div>
								</form>
							</div>
			</div>
		</div>
	</body>
</html>