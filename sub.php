<!DOCTYPE html>
<?php 
session_start();
require('connect.php');
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } else{ 
$user = $_SESSION['username'];
if (isset($_GET["sname"])){
			$result = 0;
			$sname = $_GET["sname"];
			$sversion = $_GET["sver"];
$query = "SELECT `product_id`, `username`, `p_name`, `p_class`, `budget`, `sdate`, `edate`, `gsize`, `teamno` FROM `products` WHERE username = '$user' and  p_name = '$sname' and p_class = '$sversion'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
while($row = mysql_fetch_array($result)){
?>

<html lang="en">
	<head>
		<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<!--Inclusions-->
			<meta charset="utf-8">
			<title></title>
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
			
			<script>
			$( document ).ready(function() {
				//var url = document.URL;
				//document.write(url);
					$("span").css("display","none");
					var value = null;
						var winURL = window.location.href;
						var queryStringArray = winURL.split("?");
						var queryStringParamArray = queryStringArray[1].split("&");
						for ( var i=0; i<queryStringParamArray.length; i++ )
						{           
							queryStringNameValueArray = queryStringParamArray[i].split("=");

							if ( "sel" == queryStringNameValueArray[0] )
							{
								value = queryStringNameValueArray[1];
							}                       
						}
				if(value==2)
					$(".sel2").css("display","block");
				else if(value==3)
					$(".sel3").css("display","block");
				else if(value==4)
					$(".sel4").css("display","block");
				else
					$(".sel1").css("display","block");
					
			});
			</script>
	</head>
	<body>
	<div class="container">
			<span class="sel1">
				<h2 class="page-header"><b>Overview <?php echo($row['p_name']);?></b></h2><br />
				<!--<div class="col-xs-6 col-sm-6" style="text-align:right;" >
						Product Name:<br />
						Version:<br />
						Budget (in thousand € /year):<br />
						Start of product design and development:<br />
						End of product design and development:<br />
						<br />Group size of the design and development team:<br/>
						Number of team members located at each site:<br/>
				</div>
				<div class="col-xs-6 col-sm-6" >
					<?php echo($row['p_name']);?><br />
					<?php echo($row['p_class']);?><br />
					<?php echo($row['budget']);?><br />
					<?php echo($row['sdate']);?><br />
					<?php echo($row['edate']);?><br /><br />
					<?php echo($row['gsize']);?><br />
					<?php echo($row['teamno']);?>
				</div>-->
		<div id="table-responsive">
            <table class="col-md-12 table-bordered table-striped table-condensed">
        		<thead>
        			<tr>
        				<th>Attribute</th>
        				<th>Value</th>
        			</tr>
        		</thead>
				<tbody>
        			<tr>
						<td data-title="Attribute">Product Name</td>
        				<td data-title="Attribute"><?php echo($row['p_name']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Version</td>
        				<td data-title="Attribute"><?php echo($row['p_class']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Budget (in thousand € /year)</td>
        				<td data-title="Attribute"><?php echo($row['budget']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Start of product design and development</td>
        				<td data-title="Attribute"><?php $sdate=date('d/m/Y', strtotime($row['sdate']));
						echo($sdate);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">End of product design and development</td>
        				<td data-title="Attribute"><?php $edate=date('d/m/Y', strtotime($row['edate']));
						echo($edate);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Group size of the design and development team</td>
        				<td data-title="Attribute"><?php echo($row['gsize']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Number of team members located at each site</td>
        				<td data-title="Attribute"><?php echo($row['teamno']);?></td>
        			</tr>
				</tbody>
			</table>
		</div>
			</span>
			<span class="sel2">
				<h2 class="page-header" ><b> Team Survey Product <?php echo($row['p_name']);?> </b></h2><br/>
				<div class="col-xs-12 col-sm-12" style="text-align:left;" >
					<p>The team survey contains questions about the develop and designing process of the product.</p>
					<p>In order to create a new team survey follow the link below.</p>
					<a href="<?php echo("http://www.unipark.de/uc/agileSDT/?a=".$row['product_id']."&b=".$row['p_name']."&c=".$row['p_class']);?>" target="_blank" style="font-size:20px;"> Start Team Survey </a>
					<p></p>
					
					<p>To send the survey invitation to specific team members fill out the following form and click "Send invitation"!</p>
					
					<!-- TODO: Form/Submit functionality-->
					<form id="user-survey-form">	
						<table class="col-md-12 table-bordered table-striped table-condensed" style="border-spacing: 5px;">
						  <tr>
						  	<th>Nr.</th>
						    <th>Name</th>
						    <th>Email</th>		
						    <th>Position in team</th>
						  </tr>
						  <tr>
						  	<td>1</td>
						    <td><input type="text" name="name" form="user-survey-form" value="Name"></td>
						    <td><input type="text" name="mail" form="user-survey-form" value="Email"></td>		
						    <td><input type="text" name="position" form="user-survey-form" value="Position"></td>
						  </tr>
						  <tr>
						  	<td>2</td>
							<td><input type="text" name="name" form="user-survey-form" value="Name"></td>
						    <td><input type="text" name="mail" form="user-survey-form" value="Email"></td>		
						    <td><input type="text" name="position" form="user-survey-form" value="Position"></td>
						  </tr>
						  <tr>
						  	<td>3</td>
							<td><input type="text" name="name" form="user-survey-form" value="Name"></td>
						    <td><input type="text" name="mail" form="user-survey-form" value="Email"></td>		
						    <td><input type="text" name="position" form="user-survey-form" value="Position"></td>
						  </tr>
						</table>
						</br>
						<input type="submit" value="Send invitation">
					</form>
					</br>
					<p>An overview of the results of all product-related surveys is shown in the review section.</p>
				</div>

			</span>
			<span class="sel3">	
				<h2 class="page-header" ><b>User Survey Product <?php echo($row['p_name']);?></b></h2><br />
				<div class="col-xs-12 col-sm-12" style="text-align:left;" >
					
					<p>The user survey contains questions about the usability of the product.</p>
					<p>In order to create a new user survey follow the link below.</p>
					<a href="<?php echo("http://www.unipark.de/uc/UIG_SUS/?a=".$row['product_id']."&b=".$row['p_name']."&c=".$row['p_class']);?>" target="_blank" style="font-size:20px;"> Start User Survey </a>
					<p>To send the survey invitation to specific users, fill out the following form and click "Send invitation"!</p>
					<!-- TODO: Form/Submit functionality-->
					<form id="user-survey-form">	
						<table class="col-md-12 table-bordered table-striped table-condensed" style="border-spacing: 5px;">
						  <tr>
						  	<th>Nr.</th>
						    <th>Name</th>
						    <th>Email</th>
						  </tr>
						  <tr>
						  	<td>1</td>
						    <td><input type="text" name="name" form="user-survey-form" value="Name"></td>
						    <td><input type="text" name="mail" form="user-survey-form" value="Email"></td>		
						  </tr>
						  <tr>
						  	<td>2</td>
							<td><input type="text" name="name" form="user-survey-form" value="Name"></td>
						    <td><input type="text" name="mail" form="user-survey-form" value="Email"></td>		
						  </tr>
						  <tr>
						  	<td>3</td>
							<td><input type="text" name="name" form="user-survey-form" value="Name"></td>
						    <td><input type="text" name="mail" form="user-survey-form" value="Email"></td>		
						  </tr>
						</table>
						</br>
						<input type="submit" value="Send invitation">
					</form>
					</br>
					<p>An overview of the results of all product-related surveys is shown in the review section.</p>
				</div>

			</span>
			<span class="sel4">	
				<h2 class="page-header" ><b>Review</b></h2><br />
				<div class="col-xs-12 col-sm-12" style="text-align:right;" >
				</div>
			</span>
	</div>
	
	
	</body>
</html>

<?php }}}} ?>