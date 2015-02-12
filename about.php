<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } 
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
			<meta name="description" content="UIG Questionnaire">
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
		<div class="container-fluid" width=200px>
			<div class="col-md-12">
			<h2 class="page-header">About Us</h2>

			<p style="float:left;">	
				UIG e.V. aims to academically substantiate and distribute best practices, in order to improve software development and software usage in medium-sized companies.
				The association's goal is to establish a network and user-oriented based development and usage of software, consisting of medium-sized companies, service providers, consultants, academic institutes and other experts and relevant stakeholders.
			</p><br/>
			<a href="http://www.usability-in-germany.de/" target="_blank" align=center><img class="about-img" src="img/uig.jpg" style="border: 2px solid #BDBDBD;"></img></a><br/><br/>
			<br />

			<p style="float:left;">	The Chair of Information Systems IV of the University of Mannheim in Germany focuses in research & education on Enterprise Systems.
			 	Thereby Information Systems are seen beeing a fundamentally sociotechnical matter.
			 	Central part is to investigate the lifecycle covering a development, implementation and use phase as well as novel concepts of Enterprise Systems.
			</p><br/>
			<a href="http://eris.bwl.uni-mannheim.de/en/home/" target="_blank" align=center><img class="about-img" src="img/chair.jpg" style="border: 2px solid #BDBDBD;"></img></a><br/><br/>
			<br/>

			
			<p style="float:left;">	InES was founded as the Institute of Enterprise Systems of the Unversity of Mannheim. 
									Its main goal is to study enterprise systems throughout their life cycle and to find innovative solutions and technical support.

			</p><br/>
			<a href="http://www.institute-for-enterprise-systems.de/" target="_blank" align=center><img class="about-img" src="img/ines.jpg" style="border: 2px solid #BDBDBD;"></img></a><br/><br/>
			<br />
			
			
			
			</div>
		</div>
	</body>
</html>