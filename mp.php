<!DOCTYPE html>
<?php 
session_start();
require('connect.php');
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php }  else 
{	$msg ="";
	$success="";
	$uname = $_SESSION['username'];
	
if (isset($_GET["cname"])){
			$cname = $_GET["cname"];
			$cver = $_GET["cver"];
			$np_name = $_GET['nn'];
			$np_class = $_GET['nv']; 
						$query =  "UPDATE products SET p_name='$np_name', p_class='$np_class' WHERE username = '$uname' and p_name='$cname' and p_class='$cver'";
						$result = mysql_query($query) or die(mysql_error());
							if($result==1)
							$success = "**Updated!";
						}	
if (isset($_GET["dname"])){
			$result = 0;
			$dname = $_GET["dname"];
			$dver = $_GET["dver"];
			$query = "SELECT p_name FROM products where username = '$uname' and p_name='$dname' and p_class='$dver'";
			$result = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($result);
			if($count==1){
			$query = "DELETE FROM products WHERE username = '$uname' and p_name='$dname' and p_class='$dver'";
			$result = mysql_query($query) or die(mysql_error());
				if($result==1)
					$success = "**Deleted!";
					echo($msg);
					}		
						}	
 ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>Welcome to UIG</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<!--<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">-->

	
	<style type="text/css" class="init"></style>
	
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		
	<script src="js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>-->
	<script type="text/javascript" language="javascript" src="js/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="js/demo.js"></script>
</head>

<body id="tabular" >
	<div class="container">
		<h2 class="page-header"><b> Organize Products</b></h2>
		Please select a product to get more detailed information.<br />
		<div style="color:#AA4139;"><?php echo($msg);?></span><span style="color:#408E2F"><?php echo($success);?></div><br />
		<section>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th style="text-align:center;" colspan="3">Product</th>
						<th style="text-align:center; " colspan="3">Survey Status</th>
					</tr>
					<tr>
						<th style="text-align:center;">Name</th>
						<th style="text-align:center;">Version</th>
						<th style="text-align:center;">Actions</th>
						<th style="text-align:center;">Team Survey</th>
						<th style="text-align:center;">User Survey</th>
						<th style="text-align:center;">Progress</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						$user=$_SESSION['username'];
						$query = "SELECT * FROM products WHERE username='$user' ";
						$result = mysql_query($query) or die(mysql_error()); 
						$count = mysql_num_rows($result);
						echo('<script>var totalproducts='.$count.'</script>');
						$counter = 0;
						while($row = mysql_fetch_array($result)){
							echo ('<tr><td style="width:20%; vertical-align:middle; padding:5px 10px 5px 10px; text-align:center;"><a style="vertical-align:middle;" href="" class=selec_name>' . $row['p_name'] . '</a></td>

							<td class=selec_version style="width:10%; vertical-align:middle; padding:5px 10px 5px 10px; text-align:center;">' . $row['p_class'] . '</td>

							<td style="width:10%; text-align:center; vertical-align:middle; padding:5px 10px 5px 10px ;"><a style="vertical-align:middle;" href="" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-trash __' . $row['p_name'] . '__' . $row['p_class'] . '"></a>&nbsp&nbsp
							<a style="vertical-align:middle;" href="" data-toggle="modal" id=pencil data-target="#myModalc" class="glyphicon glyphicon-pencil __' . $row['p_name'] . '__' . $row['p_class'] . '"></a></td>

							<td class="teamstatus'.$counter.'" style="padding:0 5px 0 5px; width:20%; vertical-align:middle; text-align:center;">

							</td>

							<td class="userstatus'.$counter.'" style="padding:0 5px 0 5px; width:20%; vertical-align:middle; text-align:center;">

							</td>

							<td style="padding:0 5px 0 5px; vertical-align:middle; width:20%; text-align:center;">

							<span class="nopadding col-md-6 col-sm-6 col-md-offset-3" style="display: table-cell; text-align:center; border: 1px solid #D5D3D4; border-radius:4px; height:24px; min-width:97px;">
							<!--BOXES DEFINED-->
							<div title="Product Registered" class="progres'.$counter.'" style=" height:80%; width:13px; vertical-align:bottom; display: inline-block; border-radius:2px; margin-left:-1px;"></div>
							<div class="progres'.$counter.'" style=" height:80%; width:13px; vertical-align:bottom; display: inline-block; border-radius:2px; margin-left:-1px;"></div>
							<div class="progres'.$counter.'" style=" height:80%; width:13px; vertical-align:bottom; display: inline-block; border-radius:2px; margin-left:-1px;"></div>
							<div class="progres'.$counter.'" style=" height:80%; width:13px; vertical-align:bottom; display: inline-block; border-radius:2px; margin-left:-1px;"></div>
							<div class="progres'.$counter.'" style=" height:80%; width:13px; vertical-align:bottom; display: inline-block; border-radius:2px; margin-left:-1px;"></div>

							</span>');
							
							//REQUIRED COUNTERS
							$uend = $row['user_survey_end'];
							$tend = $row['team_survey_end'];
							$date = date('Y-m-d', time());
							$ut_counter = $row['surveyEnd'];

							//STATUS & COLOR INITIALIZATION
							echo('<script>$(".teamstatus'.$counter.'").text("Not Started");</script>');
							echo('<script>$(".userstatus'.$counter.'").text("Not Started");</script>');
							echo('<script>$(".progres'.$counter.':eq(1)").css("background","#BDBDBD");</script>');
							echo('<script>$(".progres'.$counter.':eq(2)").css("background","#BDBDBD");</script>');
							echo('<script>$(".progres'.$counter.':eq(3)").css("background","#BDBDBD");</script>');
							echo('<script>$(".progres'.$counter.':eq(4)").css("background","#BDBDBD");</script>');
							echo('<script>$(".progres'.$counter.':eq(0)").css("background","#373737");</script>');

							//TEAM & USER SURVEY NOT STARTED
							if($uend==0 && $tend==0)
							{		for ($i=1; $i<5; $i++){
									echo('<script>$(".progres'.$counter.':eq('.$i.')").attr("title","User/Team Survey: Not Started");</script>');}
							}

							//EITHER TEAM OR USER SURVEY STARTED
							else if(($uend==0 && $tend!=0) || ($tend==0 && $uend!=0))
								{	echo('<script>console.log("hi'.$counter.'");</script>');

								//User Survey First
									if($ut_counter==1){ 
									echo('<script>$(".progres'.$counter.':eq(1)").css("background","#373737");
									$(".userstatus'.$counter.'").text("Started");</script>');
									echo('<script>$(".progres'.$counter.':eq(1)").attr("title","User Survey: Started");</script>
										<script>$(".progres'.$counter.':eq(2)").attr("title","Team Survey: Not Started");</script>
										<script>$(".progres'.$counter.':eq(3)").attr("title","Team/User Survey: Not Complete");</script>
										<script>$(".progres'.$counter.':eq(4)").attr("title","Report: Generated if both surveys complete");</script>');
								}
								//Team Survey First
									else if($ut_counter==2){ 
									echo('<script>$(".progres'.$counter.':eq(1)").css("background","#373737");
									$(".teamstatus'.$counter.'").text("Started");</script>');
									echo('<script>$(".progres'.$counter.':eq(1)").attr("title","Team Survey: Started");</script>
										<script>$(".progres'.$counter.':eq(2)").attr("title","User Survey: Not Started");</script>
										<script>$(".progres'.$counter.':eq(3)").attr("title","Team/User Survey: Not Complete");</script>
										<script>$(".progres'.$counter.':eq(4)").attr("title","Report: Generated if both surveys complete");</script>');
								}

								}

							//BOTH TEAM OR USER SURVEYS STARTED	
							else if($uend!=0 && $tend!=0)
							{
									echo('<script>$(".progres'.$counter.':eq(1)").css("background","#373737");</script>
									<script>$(".progres'.$counter.':eq(2)").css("background","#373737");</script>
									<script>$(".teamstatus'.$counter.'").text("Started");</script>
									<script>$(".userstatus'.$counter.'").text("Started");</script>
									<script>$(".progres'.$counter.':eq(3)").attr("title","User/Team Survey: Not Complete");</script>
									<script>$(".progres'.$counter.':eq(4)").attr("title","Report: Generated only when both surveys complete");</script>');

								//User Survey First
									if($ut_counter==1){
										echo('<script>$(".progres'.$counter.':eq(1)").attr("title","User Survey: Started");</script>');
										echo('<script>$(".progres'.$counter.':eq(2)").attr("title","Team Survey: Started");</script>');
									}
								
								//Team Survey First
									else if($ut_counter==2){
										echo('<script>$(".progres'.$counter.':eq(2)").attr("title","User Survey: Started");</script>');
										echo('<script>$(".progres'.$counter.':eq(1)").attr("title","Team Survey: Started");</script>');
									}
							}

							//CHECK TEAM SURVEY END
							if($tend!=0){
										
										if (strtotime($date)>strtotime($tend)){
												echo('<script>$(".teamstatus'.$counter.'").text("Complete");</script>');

										//Team Survey started first, Complete & User survey not started	
											if($ut_counter==2 && $uend==0){ 
												echo('<script>$(".progres'.$counter.':eq(2)").css("background","#373737").attr("title","Team Survey: Complete");
												$(".progres'.$counter.':eq(3)").attr("title","User Survey: Not Started");</script>');
										}

										//Team Survey started first, Complete & User survey started	
											else if(($ut_counter==2 && $uend!=0) || (($ut_counter==1) && (strtotime($date)<strtotime($uend)))){ //Team Survey started first, Complete & User started second
												echo('<script>$(".progres'.$counter.':eq(3)").css("background","#373737").attr("title","Team Survey: Complete");</script>');
											}

										//User Survey started First, Complete & Team Survey Started, Complete	
											else if(($ut_counter==1) && (strtotime($date)>strtotime($uend))){ //Team Survey Completed
												echo('<script>$(".progres'.$counter.':eq(4)").css("background","#373737").attr("title","Report: Generated");</script>');
										}
										}
									}

							//CHECK USER SURVEY END
							if($uend!=0){

										if (strtotime($date)>strtotime($uend)){
												echo('<script>$(".userstatus'.$counter.'").text("Complete");</script>');

										//User Survey Started first, Complete & Team Survey not Started
											if($ut_counter==1 && $tend==0){ 
													echo('<script>$(".progres'.$counter.':eq(2)").css("background","#373737").attr("title","User Survey: Complete");
														$(".progres'.$counter.':eq(3)").attr("title","Team Survey: Not Started");</script>');
										}

										//User Survey started first, Complete & Team survey started
											else if(($ut_counter==1 && $tend!=0) || (($ut_counter==2) && (strtotime($date)<strtotime($tend)))){ //User Survey started first, Complete & Team started second
												echo('<script>$(".progres'.$counter.':eq(3)").css("background","#373737").attr("title","User Survey: Complete");</script>');
											}

										//Team Survey started First, Complete & User Survey Started, Complete
											else if(($ut_counter==2) && (strtotime($date)>strtotime($tend))){ //Team Survey Completed
											echo('<script>$(".progres'.$counter.':eq(4)").css("background","#373737").attr("title","Report: Generated");</script>');
										}
										}
									}
							$counter++;
							echo('</td></tr>');
							} 
						if($count==0){echo ('<tr><td>-Empty-</td><td>-Empty-</td><td>-Empty-</td></tr>');}
						?>
				</tbody>
			</table>			
		</section>
	<!-- Modal -->
  <div class="modal fade modal-open" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Are you sure you want to delete?</h4>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="delete" id="removal">Delete Permanently</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Enter new product information</h4>
        <div id="errorstatus" style="color:#AA4139;"></div>
      </div>
      <div class="modal-body">
		<form name="contactform" method="post" class="form-horizontal">
			<div class="form-group">
				<label for="inputName" class="col-sm-3 control-label nopadding">Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" id="inputName" name="pname" placeholder="Name" value="" required />
				</div>
			</div>
			<div class="form-group">
				<label for="inputVersion" class="col-sm-3 control-label nopadding" align=right style="vertical-align:bottom;">Version</label>
				<div class="col-sm-9">
					<input type="text" class="form-control input-sm" id="version" name="version" placeholder="Version"  required />
				</div>
			</div>
		</div>
		</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="button" name="delete" id="edit" class="btn btn-default" value="Save Details" />
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	</div>

	<script type="text/javascript">
$(document).ready(function() {
for(var i=0; i<totalproducts;i++)
{
	for(var j=0; j<5;j++){
	$('.progres'+i+':eq('+j+')').tooltip({
    	'show': true,
        'placement': 'bottom',
        'container':'body'
});
}
}

	var className, substr;
	$('.glyphicon').click(function(){
		$("#inputName").val("");
		$("#version").val("");
		className = $(this).attr('class');
		substr = className.split('__');
			$("#inputName").attr("placeholder", substr[1]);
			$("#version").attr("placeholder", substr[2]);
	});
	$('#removal').click(function(){
		var $url= "mp.php?dname="+substr[1]+"&dver="+substr[2];
			//$('.form-horizontal').attr('action', $url);
			window.location.replace($url);
	});


	$('.glyphicon-pencil').click(function(){
		$("#version").css("border", "");
		$("#inputName").css("border", "");
		$("#errorstatus").html("");
	});

	$('#edit').click(function(){
			var counter=2;
			$("#version").css("border", "");
			$("#inputName").css("border", "");
		if($("#inputName").val()==""){
			$("#inputName").css("border", "solid 2px #AA4139");
			$("#errorstatus").html("");
			$("#errorstatus").html("**Please fill in both fields!");
			counter=1;
		}

		if ($("#version").val()==""){
			$("#version").css("border", "solid 2px #AA4139");
			$("#errorstatus").html("");
			$("#errorstatus").html("**Please fill in both fields!");
			counter=1;
		}

		if(counter==2){
		var newname = $("#inputName").val();
		var newversion = $("#version").val();
		$.post("form.php", {
					ajaxname: newname,
					ajaxversion: newversion,
					}, function(data) {
						if (parseInt(data)==5){
							$("#errorstatus").html("");
							$("#errorstatus").html("**Similar product already exists!");
							$("#inputName").css("border", "solid 2px #AA4139");
							$("#version").css("border", "solid 2px #AA4139");
							counter=1;
						}
						else{
							var newname = $("#inputName").val();
							var newver = $("#version").val();
							var $url= "mp.php?cname="+substr[1]+"&cver="+substr[2]+"&nn="+newname+"&nv="+newver;
							window.location.replace($url);	
						}
					});
		}
		
	});
	$('.selec_name').click(function(){
	var selec_name = $(this).html();
	var selec_version = $(this).closest('td').next().html();
	var $url= "sub.php?sname="+selec_name+"&sver="+selec_version+"&sel=1";
	$('.selec_name').attr("href", $url);
	});



});
	</script>
</body>


</html>
<?php } ?>

