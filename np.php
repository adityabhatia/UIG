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
$pname = $_POST['inputName'];
$pversion = $_POST['version'];

$query = "INSERT INTO `products` (username, p_name, p_class) VALUES ('$username', '$pname', '$pversion')";
$result = mysql_query($query) or die(mysql_error());
if($result){
            $msg = ": Success!";
        }
}
}

?>

<!DOCTYPE html>

<html lang="en">
	<head>
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
								<h2 class="panel-title">Add new Product <?php echo($msg);?></h2>
							</div>
							<div class="panel-body">
								<form name="contactform" method="post" action="" class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputName" class="col-sm-3 control-label nopadding">Product Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required />
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-sm-3 control-label nopadding">Version</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="version" name="version" placeholder="Version" required />
										</div>
									</div>
									<div class="form-group" align=center>
										
											<button type="submit" class="btn btn-default" name=submit style="margin-bottom:-10px;">
												Add Product
											</button>
									
									</div>
								</form>

							</div>
						</div>
					</div>
	
				
			<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		</body>
</html>