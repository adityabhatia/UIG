<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>top.window.location.href="login.php";</script>
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
		<?php include_once("analyticstracking.php") ?>
		<div class="container-fluid innerContainer">

				<h1 class="page-header">Welcome to the UIG survey tool, <?php echo($_SESSION['username']);?></h1>
				<p></p>
				<h3 style="color:#2C8BB7;">Why considering Usability?</h3>
				<br/>
				<p style="text-align:justify;">	
					65% of enterprises mention usability as an important role for selecting the right software for their business.<br/>
					Therefore software companies can bring differentiation benefits by investing in usability.<br/>
					But how successful and effective does your company already turn common usability procedures into reality?<br/>
					This platform provides a self-test, designed for estimating the usability level of your product.<br/><br/>

				</p>
				<hr>
				<div class="row">
					<h3 style="color:#2C8BB7;" >Only three Steps to a successful UIG Diagnosis!</h3>
										
					<div class="col-xs-12 col-md-12">
						<br/><br/>
						<div class="row">
							<div class="col-xs-2 col-md-1">
								<img style="width:30px;" src="img/count1.png"/>
							</div> 
							<div class="col-xs-9 col-md-4" style="padding-top:6px">  Register a product for the UIG survey.</div><br/>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-2 col-md-1  vcenter">		        
						        	<img style="width:30px;" src="img/count2.png"/>
						    </div>
						 <div class="col-xs-9 col-md-4  vcenter">
						        
						        	<div style="padding-top:0px">  Invite development team members to your survey and share the user survey link with your software customers and clients.</div>
						    </div>
						    <div class="col-xs-10 col-md-6 vcenter">
						        <img style="width:100%; max-width:600px;" src="img/home.png"/>
						    </div>
						</div>

						<hr>
						<div class="row">
							<div class="col-xs-2 col-md-1"><img style="width:30px;" src="img/count3.png"/></div> <div class="col-xs-9 col-md-4" style="padding-top:6px">  Analyze the responses and take actions.</div><br/>
						</div>
						
					</div>

				
				</div>
				<hr>

	</div>
	
	</body>
</html>
	