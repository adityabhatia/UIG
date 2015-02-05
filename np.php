
<!DOCTYPE html>
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
$edate=date('Y-m-d', strtotime($edate));
$sdate=date('Y-m-d', strtotime($sdate));
$query = "INSERT INTO `products` (`username`, `p_name`, `p_class`, `budget`, `sdate`, `edate`, `gsize`, `teamno`) VALUES ('$username', '$pname', '$pversion', '$budget', '$sdate', '$edate', '$groupsize', '$teamno')";
$result = mysql_query($query) or die(mysql_error());
if($result){ ?>
<script>window.location.replace("mp.php");</script>
<?php
        }
}
}

?>


<html lang="en">
	<head>
		<!--Inclusions-->
			<meta charset="utf-8">
			<title>Welcome <?php echo($_SESSION['name']);?> </title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			<link href="css/datepicker.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
		<div class="container" style=" margin: 0 auto;">
		<div class = "col-sm-12 col-xs-12" >
						<div class="panel panel-default " style="margin:0 auto;width:100%; min-width:150px;">
							<div class="panel-heading">
								<h2 class="panel-title" align=center>Register a new product</h2>
							</div>
							<div class="panel-body">
								<form name="contactform" method="post" action="" class="form-horizontal" role="form">
									<div class="col-xs-12 col-sm-6 ">
										<h2 class="panel-title"><b><i>General Product Information</i></b></h2><br />
										<div class="row" style="margin-bottom:5px;">
											<label for="inputName" class="col-sm-5 col-xs-6 control-label nopadding">Product Name</label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="inputEmail1" class="col-sm-5 col-xs-6 control-label nopadding">Version</label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" id="version" name="version" placeholder="Version" required />
											</div>
										</div>
										
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >Budget <span style="font-weight:normal;">(in 1000 € /year)</span></label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" id="budget" name="budget" placeholder="Budget" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >Start Date <span style="font-weight:normal;">(dd/mm/yyyy)</span></label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" value="" data-date-format="dd/mm/yyyy" id="dp1" name="sdate" placeholder="Start Date" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >End Date <span style="font-weight:normal;">(dd/mm/yyyy)</span></label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" value="" data-date-format="dd/mm/yyyy" id="dp2" name="edate" placeholder="End Date" required />
											</div>
										</div>
										<HR WIDTH="100%" SIZE="3" style=" border-width:2px;" > 
										<h2 class="panel-title"><b><i>Development Information</i></b></h2><br />
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding">Team Size</label>
											<div class="col-sm-7 col-xs-6">
												<input type="number" class="form-control" id="groupsize" name="groupsize" placeholder="No. of Team Members" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label class="col-sm-5 col-xs-6 control-label nopadding">Developers</label>
												<div class="col-sm-7 col-xs-6">
													<input type="number" class="form-control" min="0" id="developers" name="developers" placeholder="No. of Developers" required />
												</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label class="col-sm-5 col-xs-6 control-label nopadding">Designers</label>
												<div class="col-sm-7 col-xs-6">
													<input type="number" class="form-control" min="0" id="designers" name="designers" placeholder="No. of Designers" required />
												</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >Sites</label>
											<div class="col-sm-7 col-xs-6">
												<input type="number" min="1" class=form-control id="teamno" name="teamno" placeholder="No. of Sites" required />
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<h2 class="panel-title"><b><i>Location Information</i></b></h2><br />
										<div>
											<table class="table-bordered table-striped table-condensed" id="teamallocation" align=center>
												
											</table>
										</div>
									</div>
									<div class="col-sm-12 col-xs-12">
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
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script>
		$(document).ready(function(){
			/*$('#dp2').datepicker();
			
		$('#dp2').datepicker()
				.on('changeDate', function(ev){
		$('#dp2').datepicker('hide');
		});
		//var checkin = $('#dp1').datepicker();
		$('#dp1').attr('value', "01/01/2014");
		var checkin = $('#dp1').datepicker()
				.on('changeDate', function(ev){
		$('#dp1').datepicker('hide');
		});*/
			$('#dp2').attr('value', "01/01/2015");
			$('#dp1').attr('value', "01/01/2015");

			var newDate;
			var checkin = $('#dp1').datepicker().on('changeDate', function(ev) {
			    newDate = new Date(ev.date)
			    newDate.setDate(newDate.getDate() + 1);
			    checkout.setValue(newDate);
			  checkin.hide();
			  $('#dp2')[0].focus();
			}).data('datepicker');
			var checkout = $('#dp2').datepicker({
			  onRender: function(date) {
			    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			  }
			}).on('changeDate', function(ev) {
			  checkout.hide();
			}).data('datepicker');
		
		$('#teamallocation').append('<tr><th>Location</th><th>No.</th></tr><tr><td style="padding:0;"><input type=text class="table-form nopadding" /></td><td style="padding:0;"><input type=text class="table-form nopadding" /></td></tr>');
				
		$('#teamno').change(function(){
			$('#teamallocation').html("");
			var count = $('#teamno').val();
			$('#teamallocation').append('<tr><th>Location</th><th>No.</th></tr><tr><td style="padding:0;"><input type=text class="table-form nopadding" /></td><td style="padding:0;"><input type=text class="table-form nopadding" /></td></tr>');
			while(count>1){
			$('#teamallocation').append('<tr><td style="padding:0;"><input type=text class="table-form" /></td><td style="padding:0;"><input type=text class="table-form" /></td></tr>');
			count-=1;
			}
		});
			});
		</script>
		</body>
</html>