<?php
session_start();
$_SESSION['username']=NULL;
?>

<!DOCTYPE html>
<html>
	<head>
			<meta http-equiv="refresh" content="2; url=login.php" />
			<!--Inclusions-->
				<meta charset="utf-8">
				<title>Logout</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="INES Questionnaire">
				<meta name="author" content="adityabhatia">
				
				
				<link href="css/bootstrap.min.css" rel="stylesheet">
				<link href="css/main.css" rel="stylesheet">
				
				<link type="text/css" rel="stylesheet" href="css/login.css">
				<link type="text/css" rel="stylesheet" href="css/main.css">
				
				<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
				 <!--[if lt IE 9]>
				  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
				<![endif]-->

	</head>
	<body style="background-color:#2E2E2E">
	<div align=center style="margin-left:auto; margin-right:auto;">
		<div class=" well well-sm" align=center >You have been logged out!</div>
	</div>
	</body>
</html>