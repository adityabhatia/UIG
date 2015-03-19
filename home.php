<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } 
?>

<!DOCTYPE html>

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
			
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
		<div class="well well-sm">
						<h1>Welcome to the UIG survey tool, <?php echo($_SESSION['username']);?></h1>
							
								<p style="text-align:justify;">	
									65% of enterprises mention usability as an important role for selecting the right software for their business.<br/>
									Therefore software companies can bring differentiation benefits by investing in usability.<br/>
									But how successful and effective does your company already turn common usability procedures into reality?<br/>
									This platform provides a self-test, designed for estimating the usability level of your product.<br/><br/>

								</p>
								<h4> Required steps:</h4>
								<img style="float:left" src="img/uig-test.png"/>							
								<p>	<br/><br/>
									<b>First step:</b> Register a product for the UIG survey.<br/><br/>
									<b>Second step:</b> Invite development team members to your survey and share the user survey link with your software customers and clients.<br/><br/>
									<b>Third step:</b> Analyze the responses and take actions.
								</p>
								<br/><br/><br/><br/>
						<p>In the end we will present you a precise evaluation and analysis of the usability level of your product.</p>
						
		</div>
	
	</body>
</html>
	