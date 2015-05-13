<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>top.window.location.href="login.php";</script>
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
			<link type="text/css" rel="stylesheet" href="css/main.css">
			
			
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
		<?php include_once("analyticstracking.php") ?>
		<div class="container-fluid innerContainer">
			<h2 class="page-header"><b> Contact Us</b></h2>
				<p>Feel free to send us your questions and comments regarding the diagnose tool.<p>
					<br>
					<h4 style="color:#2C8BB7;"><b>Contact Form</b></h4>
					<form class="form-horizontal" name="contactform" method="post" action=""  role="form">
							<div class="form-group">
								
								<div class="col-sm-7 col-xs-10">
								<input class="form-control" type="text" id="reason" name="reason" placeholder="Subject" value="" required />
								</div>
							</div>

							<div class="form-group">
								
								<div class="col-sm-7 col-xs-10">
									<textarea class="form-control" cols="50" rows="6" type="text" id="message" name="message" placeholder="Message" value="" style="resize:none;"required /></textarea>

							<hr>
							<button type="submit" class="btn btn-default" name=submit>
								Send Message
							</button>	
							<hr>					
								</div>
							</div>
					</form>
				
				<div class="col-xs-12 col-sm-5">

				</div>


			</div>
	</body>
</html>