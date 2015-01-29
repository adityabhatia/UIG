<!DOCTYPE html>
<?php 
session_start();
require('connect.php');
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php }  else 
{	$msg ="";
	$uname = $_SESSION['username'];
	
if (isset($_GET["cname"])){
			$result = 0;
			$cname = $_GET["cname"];
			$query = "SELECT p_name FROM products where p_name='$cname' and username = '$uname'";
			$result = mysql_query($query) or die(mysql_error());
			$count = mysql_num_rows($result);
			if($count==1){
			$cver = $_GET["cver"];
			$np_name = $_GET['nn'];
			$np_class = $_GET['nv'];
			$query =  "UPDATE products SET p_name='$np_name', p_class='$np_class' WHERE username = '$uname' and p_name='$cname' and p_class='$cver'";
			$result = mysql_query($query) or die(mysql_error());
				if($result==1)
					$msg = "Updated!";
					echo($msg);
					}		
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
					$msg = "Deleted!";
					echo($msg);
					}		
						}	
 ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>DataTables example - Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">

	
	<style type="text/css" class="init"></style>
	
	<link type="text/css" rel="stylesheet" href="css/main.css">

	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="js/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="js/demo.js"></script>
	

</head>

<body id="tabular" >
	<div class="container">
		<h2 class="page-header"><b> Manage Products </b></h2><br />
		<section>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Product</th>
						<th>Version</th>
						<!--<th>Entry Date</th>
						<th>Type&nbsp&nbsp </th>
						<th>Questionnaire&nbsp&nbsp  </th>-->
						<th>Actions</th>
					</tr>
				</thead>

				<!--<tfoot>
					<tr>
						<th>Name</th>
						<th>Version</th>
						<th>Entry Date</th>
						<th>Type&nbsp&nbsp </th>
						<th>Questionnaire&nbsp&nbsp  </th>
						<th>Actions</th>
					</tr>
				</tfoot>-->

				<tbody>
					<?php 
						$user=$_SESSION['username'];
						$query = "SELECT * FROM products WHERE username='$user' ";
						$result = mysql_query($query) or die(mysql_error()); 
						$count = mysql_num_rows($result);
						while($row = mysql_fetch_array($result)){
							echo ('<tr><td><a href="" class=selec_name>' . $row['p_name'] . '</a></td>');
							echo ('<td class=selec_version>' . $row['p_class'] . '</td>');
							echo ('<td><a href="" data-toggle="modal" data-target="#myModal" class="glyphicon glyphicon-trash __' . $row['p_name'] . '__' . $row['p_class'] . '"></a>&nbsp&nbsp
							<a href="" data-toggle="modal" data-target="#myModalc" class="glyphicon glyphicon-pencil __' . $row['p_name'] . '__' . $row['p_class'] . '"></a></td></tr>');
							} 
						if($count==0){echo ('<tr><td>-Empty-</td><td>-Empty-</td><td>-Empty-</td></tr>');}
						}?>
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
        <h4 class="modal-title">Enter new information</h4>
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
		</form>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="delete" id="edit">Save Details</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	</div>

	<script>
$(document).ready(function() {
	$('#example').dataTable();
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
	$('#edit').click(function(){
		var newname = $("#inputName").val();
		var newver = $("#version").val();
		var $url= "mp.php?cname="+substr[1]+"&cver="+substr[2]+"&nn="+newname+"&nv="+newver;
			window.location.replace($url);
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

