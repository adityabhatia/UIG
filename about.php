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
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/main.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
		<div class="container-fluid" width=200px>
			<div class="col-md-12">
			<h2>About Us</h2>
			<a href="http://eris.bwl.uni-mannheim.de/en/home/" align=center><img src="img/chair.jpg" style="border: 2px solid #BDBDBD;"></img></a><br/><br/>
			<p style="float:left;">	The Chair of Information Systems IV of the University of Mannheim in Germany focuses in research & education on Enterprise Systems.
			 	Thereby Information Systems are seen beeing a fundamentally sociotechnical matter.
			 	Central part is to investigate the lifecycle covering a development, implementation and use phase as well as novel concepts of Enterprise Systems.
			</p><br/><br/><br/><br /><br/><br />

			<a href="http://www.institute-for-enterprise-systems.de/" align=center><img src="img/ines.jpg" style="border: 2px solid #BDBDBD;"></img></a><br/><br/>
			<p style="float:left;">	The Chair of Information Systems IV of the University of Mannheim in Germany focuses in research & education on Enterprise Systems.
			 	Thereby Information Systems are seen beeing a fundamentally sociotechnical matter.
			 	Central part is to investigate the lifecycle covering a development, implementation and use phase as well as novel concepts of Enterprise Systems.
			</p><br/><br /><br/><br /><br/><br />
			
			<a href="http://www.usability-in-germany.de/" align=center><img src="img/uig.jpg" style="border: 2px solid #BDBDBD;"></img></a><br/><br/>
			<p style="float:left;">	Der UIG e.V. verfolgt das Ziel,
				Praktiken zur Verbesserung der Software-Entwicklung und –Nutzung bei mittelständischen Unternehmen
				wissenschaftlich zu fundieren und durch Weiter­bildung zu verbreiten.
				Durch den Verein soll eine Netzwerks, bestehend aus mittelständischen Unternehmen, Dienstleitsern und Beratern, wissenschaftlichen und ausbildenden Einrichtungen sowie weiteren Experten und relevanten Akteuren im Feld benutzerzentrierter Entwicklung und Nutzung, etabliert werden.
			</p><br/><br /><br/><br /><br/><br />
			</div>
		</div>
	</body>
</html>