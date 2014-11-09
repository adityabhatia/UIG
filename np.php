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
$budget = $_POST['budget'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$groupsize = $_POST['groupsize'];
$teamno = $_POST['teamno'];

$query = "INSERT INTO `products` (`username`, `p_name`, `p_class`, `budget`, `sdate`, `edate`, `gsize`, `teamno`) VALUES ('$username', '$pname', '$pversion', '$budget', '$sdate', '$edate', '$groupsize', '$teamno')";
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
		<div class="container-fixed" style=" margin: 0 auto;">
		<div class = "col-sm-12 col-xs-12" style="">
						<div class="panel panel-default " style="margin:0 auto;width:100%; min-width:150px;">
							<div class="panel-heading">
								<h2 class="panel-title">Add new Product <?php echo($msg);?></h2>
							</div>
							<div class="panel-body">
								<form name="contactform" method="post" action="" class="form-horizontal" role="form">
									<div class="col-sm-6 col-xs-6">
										<h2 class="panel-title" align=center><b>Background Information</b></h2><br />
										<div class="form-group nopadding">
											<label for="inputName" class="col-sm-3 col-xs-4 control-label nopadding">Product Name</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required />
											</div>
										</div>
										<div class="form-group nopadding">
											<label for="inputEmail1" class="col-sm-3 col-xs-4 control-label nopadding">Version</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="version" name="version" placeholder="Version" required />
											</div>
										</div>
										
										<div class="form-group nopadding">
											<label for="budget" class="col-sm-3 col-xs-4 control-label nopadding" style="margin-top:-10px;">Budget(in thousand € /year)</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="budget" name="budget" placeholder="Budget" required />
											</div>
										</div>
										<div class="form-group nopadding">
											<label for="budget" class="col-sm-3 col-xs-4 control-label nopadding" style="margin-top:-10px;">Start Date <br />(yyyy-mm-dd)</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="sdate" name="sdate" placeholder="Start Date" required />
											</div>
										</div>
										<div class="form-group nopadding">
											<label for="budget" class="col-sm-3 col-xs-4 control-label nopadding" style="margin-top:-10px;">End Date <br />(yyyy-mm-dd)</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="edate" name="edate" placeholder="End Date" required />
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-xs-6">
										<h2 class="panel-title" align=center><b>Group</b></h2><br />
										<div class="form-group nopadding">
											<label for="budget" class="col-sm-3 col-xs-4 control-label nopadding" style="margin-top:-10px;">Group size of the design and development team</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="groupsize" name="groupsize" placeholder="Group Size" required />
											</div>
										</div>
										<div class="form-group nopadding">
											<label for="budget" class="col-sm-3 col-xs-4 control-label nopadding" style="margin-top:-10px;">Number of team members located at each site</label>
											<div class="col-sm-9 col-xs-8">
												<input type="text" class="form-control" id="teamno" name="teamno" placeholder="Number of Team Members" required />
											</div>
										</div>
									
										<div class="form-group" align=center>
												<button type="submit" class="btn btn-default" name=submit style="margin-bottom:-10px;">
													Add Product
												</button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
				
			<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		
		
		</body>
</html>