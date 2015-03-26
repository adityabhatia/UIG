<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } 
else{$username = $_SESSION['username'];
if(isset($_POST["submit"])){

$name = $_POST['name'];
$company = $_POST['company'];
$desig = $_POST['desig'];
$experience = $_POST['experience'];
$user = $_POST['username'];
$email = $_POST['email'];

			$query2 = "SELECT * FROM `user` WHERE username='$username'";
			$result2 = mysql_query($query2) or die(mysql_error());
			$count2 = mysql_num_rows($result2);
			$user = strtolower($user);
				if(($count2>=1 && $user==$username) || ($count2<1) )
				{
			$query1 =  "UPDATE `user` SET `name`='$name',`company`='$company',
			`desig`='$desig',`experience`='$experience',`username`='$user',
			`email`='$email' WHERE username='$username'";
			$_SESSION['username'] = $user;
			$username = $user;
			$result1 = mysql_query($query1) or die(mysql_error());
			if($result1){
					echo('<script>alert("The User information has been changed successfully. The page will be reloaded.");
					top.window.location.href="main.php";</script>');
					}
				
				}
				else
				{
					echo('<script>alert("Username already exists!");
						window.location.replace("user.php");</script>');
					
				}
			
}
else{	

$query = "SELECT * FROM `user` WHERE username='$username'";
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
		<script>
		</script>
		<!--Inclusions-->
			<meta charset="utf-8">
			<title>Welcome <?php echo($_SESSION['username']);?> </title>
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
		<div class="container">
						<div class="panel panel-default" style="margin:0 auto; width:100%; max-width:500px">
							<div class="panel-heading">
								<h2 class="panel-title" align=center>Account Settings<?php echo($msg);?></h2>
							</div>
							<div class="panel-body">
								<div class="col-sm-12 " style="margin-top:-10px; margin-bottom:5px;">
										
										<div style="text-align:center;">
										<button class="btn btn-default center-block" data-toggle="modal" data-target="#password" style="display:block; white-space: normal; ">
															Change Password here!
										</button>
										</div>
										<HR WIDTH="100%" SIZE="3" style="margin-bottom:-10px; border-width:2px;" >
								</div>
								
								<form name="contactform" method="post" action="" class="form-horizontal" role="form">
								<div class="col-sm-12">	
									<h4><b>Account Information</b></h4>
									<div class="form-group">
										<label for="inputName" class="col-sm-5 col-xs-4 control-label nopadding" >Name</label>
										<div class="col-sm-7 col-xs-8">
											<input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?php echo($row['name']);?>" required />
										</div>
									</div>
									<div class="form-group" style="margin-top:">
										<label for="username" class="col-sm-5 col-xs-4 control-label nopadding" style="margin-top:-10px;">Username</label>
										<div class="col-sm-7 col-xs-8">
											<input type="text" class="form-control" id="username" style="margin-top:-10px;" name="username" placeholder="Username" value="<?php echo($row['username']);?>" style="margin-top:5px;" required />
										</div>
									</div>
									<div class="form-group">
										<label for="email" class="col-sm-5 col-xs-4 control-label nopadding" style="margin-top:-10px;">E-Mail</label>
										<div class="col-sm-7 col-xs-8">
											<input type="email" class="form-control" style="margin-top:-10px;" id="email" name="email" placeholder="E-Mail" value="<?php echo($row['email']);?>" required />
										</div>
									</div>
									<h4><b>General Information</b></h4>
									<div class="form-group">
										<label for="company" class="col-sm-5 col-xs-4 control-label nopadding" >Company</label>
										<div class="col-sm-7 col-xs-8">
											<input type="text" class="form-control" id="cname" name="company" placeholder="Company Name" value="<?php echo($row['company']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="desig" class="col-sm-5 col-xs-4 control-label nopadding" style="margin-top:-10px;">Job Title</label>
										<div class="col-sm-7 col-xs-8">
											<input type="text" class="form-control" id="desig" name="desig" style="margin-top:-10px;" placeholder="Designation" value="<?php echo($row['desig']);?>" required />
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail1" class="col-sm-5 col-xs-4 control-label nopadding" style="margin-top:-10px;">Experience (Yrs.)</label>
										<div class="col-sm-7 col-xs-8">
											<input type="text" class="form-control" id="experience" style="margin-top:-10px;" name="experience" placeholder="Experience" value="<?php echo($row['experience']);?>" required />
										</div>
									</div>
								
									<div class="col-sm-12" style="text-align:center;">
													<button type=button name=submit class="btn btn-default formbutton">
														Save Changes
									 				</button> <br/>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h4 class="modal-title">Enter New Password</h4>
						      </div>
						      <div class="modal-body">
								<form name="contactform" method="post" class="form-horizontal">
									<div class="form-group">
										<label for="inputName" class="col-sm-3 control-label nopadding">Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control input-sm" id="inputName" name="pass" placeholder="New Password" value="" required />
										</div>
									</div>
						        <button type="button" class="btn btn-primary center-block formbutton"  name="submit1" id="edit" >Change Password</button>
						        </form>
						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						<?php 
						        	if (isset($_POST['submit1'])){
						        		$user = $_SESSION['username'];
						        		$newpass = $_POST['pass'];
						        		$query1 = "UPDATE `user` SET password = MD5('$newpass') where username = '$user'";
										$result1 = mysql_query($query1) or die("error: " . mysql_error()) ;
						        	}
						        ?>

	<script type="text/javascript">
$(document).ready(function() {
	$('.formbutton').on("click",function(){
  	var username = '<?php echo($username); ?>';
  	var result;
  	result= username.search(new RegExp("demo", "i"));
  	console.log(result);
  	if(result==0)
  	{
  		alert("Sorry, not possible to change demo account information!");
  		$('#password').modal('hide');
  	}
  	else
  		$(this).attr("type","submit");
});	
});
</script>
	</body>
</html>
<?php }}}}?>