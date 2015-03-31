<?php 
session_start();
require('connect.php');
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } else{ 
	$msg="";
	if (isset($_POST['submit'])){
$username = $_SESSION['username'];
$performance = $_POST['performance'];
$usability = $_POST['usability'];
//$category = $_POST['category'];
$comments = $_POST['comments'];
$ncategory = $_POST['mydropdown'];
    /*$N = count($category);
    for($i=0; $i < $N; $i++)
    {
    	if($ncategory)
      $ncategory = $ncategory . ', ' . $category[$i];
  		else
  			$ncategory = $category[$i];
    }*/

$query = "INSERT INTO `feedback` (username, performance, usability, category, comments) VALUES ('$username', '$performance', '$usability', '$ncategory', '$comments')";
$result = mysql_query($query) or die(mysql_error());
if($result){
            $msg = ": Thanks for your Message!";
            require("Mailer/PHPMailerAutoload.php");
				$mail             = new PHPMailer();
				$arrContextOptions=array(
				    "ssl"=>array(
				        "verify_peer"=>false,
				        "verify_peer_name"=>false,
				    ),
				);
									$mail->IsSMTP(); // telling the class to use SMTP
					//$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
					//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
					                                           // 1 = errors and messages
					                                           // 2 = messages only
					$mail->SMTPAuth   = true;                  // enable SMTP authentication
					$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
					$mail->Host       = "smtp.office365.com";      // sets GMAIL as the SMTP server
					$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
					$mail->Username   = "UIG@es.uni-mannheim.de";  // GMAIL username
					$mail->Password   = "n123456789/*-";            // GMAIL password

					$mail->SetFrom('UIG@es.uni-mannheim.de', 'Usability in Germany');

					$mail->AddReplyTo("UIG@es.uni-mannheim.de","Usability in Germany");

					$mail->Subject    = "New Feedback!";
					//$mail->IsHTML(true);
					$mail->AddEmbeddedImage('img/uig.jpg', 'myattach');
					$mail->Body = '<img src="cid:myattach"  style="display: block;
						    margin-left: auto;
						    margin-right: auto" /><br /><br />
						Dear <b>Admin</b>,<br /><br />
						You have received a new feedback. 
						<br /><br />
						Username: ' . $username . 
						'<br />Performance: ' . $performance . 
						'<br />Usability: ' . $usability . 
						'<br />Category: ' . $ncategory . 
						'<br />Comments: ' . $comments . 
						'<br /><br />Thanks,<br />
						UIG Team.';

						$mail->AltBody    = "New UIG Feedback!" ; // optional, comment out and test

						$mail->AddAddress("bhatia.aditya11@gmail.com", "admin");
						$mail->AddAddress("werder@es.uni-mannheim.de", "admin");
						$mail->AddAddress("thilo@thiloweigold.de", "admin");

						if(!$mail->Send()) {
						  $msg = "Mailer Error: " . $mail->ErrorInfo;
						} else {
						  $msg = "Message sent!";
						}
        }
}

	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
				$( document ).ready(function() {
					$("#nav li:nth-child(1)").addClass( " active" );
					$(".sublist").css("display","none");
					$(".list-group-item").click(function(){
						$(".dropdown-menu li").removeClass('active');
						$('#nav li').removeClass();
						$(".list-group-item").removeClass('active');
						$( this ).addClass( " active" );
					});	
					$('#nav li').click(function() {
						$(".dropdown-menu li").removeClass('active');
						$('#nav li').removeClass();
						$(".list-group-item").removeClass('active');
						$( this ).addClass( " active" );
						$(".sublist").css("display","none");
					});
					
					$('.dropdown-menu li').click(function(){
							$('#nav li').removeClass();
							$(".list-group-item").removeClass('active');
							$(".dropdown-menu li").removeClass('active');
							$(".sublist").css("display","none");
							$( this ).addClass( " active" );

					});
					$(".external").click(function(){
						$(".sublist").css("display","none");
					});
					$('[data-toggle="offcanvas"]').click(function () {
    					$('.row-offcanvas').toggleClass('active')
  					});
				$(".iframe").attr('src','home.php');
				$('.iframe').load(function(){
						var sel, s_name, s_ver = null;
						var complete;
						var winURL = document.getElementById("iframe").contentWindow.location.href;
						var queryStringArray = winURL.split("?");
						if(queryStringArray[1]){
						var queryStringParamArray = queryStringArray[1].split("&");
						for ( var i=0; i<queryStringParamArray.length; i++ )
						{           
							queryStringNameValueArray = queryStringParamArray[i].split("=");
							
							if ( "complete" == queryStringNameValueArray[0] )
								complete = queryStringNameValueArray[1];
							if ( "sname" == queryStringNameValueArray[0] )
								s_name = queryStringNameValueArray[1];
							if ( "sver" == queryStringNameValueArray[0] )
								s_ver = queryStringNameValueArray[1];
							if ( "sel" == queryStringNameValueArray[0] )
							{
								sel = queryStringNameValueArray[1];
								$(".sublist").css("display","block");
								
								if(sel==1){ $(".list-group-item").removeClass('active'); $(".sublist a:nth-child(1)").addClass('active');}
								
							}  
							if ( "reset" == queryStringNameValueArray[0] ){
								$(".list-group-item").removeClass('active');
								$(".list-group a:nth-child(1)").addClass( " active" );}

							if ("complete" == queryStringNameValueArray[0] ){
								complete = queryStringNameValueArray[1];
							}
							}
						}
						$urlnew = "sub.php?sname="+s_name+"&sver="+s_ver+"&sel=";	
				
						$(".sublist a:nth-child(1)").attr("href", $urlnew+1+"&complete="+complete);
						$(".sublist a:nth-child(2)").attr("href", $urlnew+2+"&complete="+complete);
						$(".sublist a:nth-child(3)").attr("href", $urlnew+3+"&complete="+complete);
						$(".sublist a:nth-child(4)").attr("href", $urlnew+4+"&complete="+complete);
				});
				/*$('#edit').click(function(){
					var newname = $("#inputName").val();
					var $url= "main.php?cname="+substr[1]+"&cver="+substr[2]+"&nn="+newname+"&nv="+newver;
					window.location.replace($url);
				});*/
				});
		</script>
		<!--Inclusions-->
			<meta charset="utf-8">
			<title>Welcome <?php echo($_SESSION['username']);?> </title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/dashboard.css">

			<link type="text/css" rel="stylesheet" href="css/main.css">

			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>


	<body>
	
		<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		         	</button>
					<div class="navbar-brand">
						<img id="uig-logo" src="img/uig-logo.png"></img>
					</div>
				</div>
			<!-- Collection of nav links, forms, and other content for toggling -->
			<div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
				<ul class="nav navbar-nav" id="nav">
					<li><a id="add" href="home.php" target="myiframe">Home</a></li>
					<li><a id="add" href="about.php" target="myiframe">About Us</a></li>
					<li><a id="add" href="contact.php" target="myiframe">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" >
					<div class="dropdown" >
						<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" style="display:block; width:160px;">
						<i class="glyphicon glyphicon-user"></i>   <?php echo($_SESSION['username']); ?>
							<span class="caret"></span></a>
						<ul class="dropdown-menu nopadding" role="menu" aria-labelledby="dropdownMenu1" style="min-width:100%;" id="nav1">
							<li class="nopadding" role="presentation"><a class="nopadding" role="menuitem" tabindex="-1" href="user.php" target="myiframe">Profile</a></li>
							<!--<li data-toggle="modal" data-target="#password" class="nopadding" role="presentation"><a role="menuitem" tabindex="-1" href="user.php" target="myiframe">Change Password</a></li>-->
							<li role="presentation" class="divider nopadding"></li>
							<li  class="nopadding" role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>
						</ul>
					</div>
				</ul>
			</div>
			</div>
		</nav>

		<div class="container-fluid">	
			<div class="row">
					<div class="col-sm-3 col-md-2 sidebar" id="sidebar" role="navigation">
						<div class="list-group">
							<a href="mp.php" target="myiframe" class="list-group-item deactive external" id="listh"><i class="glyphicon glyphicon-cog"></i>&nbsp&nbspOrganize Products</a>
							<span class = "sublist"><a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbsp Product Overview</a>
							<a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspTeam Survey</a>
							<a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspUser Survey</a>
							<a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none; border-bottom:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspDashboard</a>
							</span>
							<a href="np.php" target="myiframe" class="list-group-item deactive external" id="listnp"><i class="glyphicon glyphicon-plus"></i>&nbsp&nbspRegister Product</a>
							
							<br /><a href="" data-toggle="modal" data-target="#feedback" type="button" class="btn btn-default center-block" align=right style="display:block; white-space: normal;">Give your Feedback here!</a>
							<br /><img class=beta src="img/beta.jpg" height=120 width=120></img>
							
							<br /> 	<div class="panel"> 
										<img class=beta src="img/logoBMWi.png"></img> 
								 		<img class=beta src="img/logoMittelstandDigital.gif"></img>
								 	</div>
							
							</div>
					</div>
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
						<div class="embe">
							<iframe src="home.php" name="myiframe" width=100% 
							frameborder="0" scrolling=no class="iframe" id="iframe"> </iframe>
						</div>
					</div>
			</div>

	</div>

	

	<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      		<div class="panel panel-default" style="margin:0 auto; max-width:500px; width=200px">
							<div class="panel-heading">
								<h2 class="panel-title">Your Feedback<!--<?php echo($msg);?>--></h2>
							</div>
							<div class="panel-body">
							Your feedback is important to us. Please let us know how can we improve this tool further.<br/><br/>
							<form name="contactform" method="post" action="" class="form-horizontal" role="form" style="">
								<h2 class="panel-title"><b>Please rate your experience using this tool</b></h2>
									<div style="text-align:left; font-size:12px;">(1-Poor, 5-Outstanding)</div>
									<div class="form-group">
										<label for="inputName" class="col-sm-3 col-xs-3 control-label nopadding" align=right>Performance</label>
										<div class="col-sm-9 col-xs-9">
											<label class="radio-inline">
											      <input type="radio" name="performance" value="1" required /> 1 
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="performance" value="2"> 2
											    </label>
											   
											    <label class="radio-inline">
											      <input type="radio" name="performance" value="3"> 3
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="performance" value="4"> 4
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="performance" value="5"> 5
											    </label>
										</div>
									</div>
									<div class="form-group">
										<label for="inputName" class="col-sm-3 col-xs-3 control-label nopadding" align=right>Usability</label>
										<div class="col-sm-9 col-xs-9">
												<label class="radio-inline">
											      <input type="radio" name="usability" value="1" required /> 1 
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usability" value="2"> 2
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usability" value="3"> 3
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usability" value="4"> 4
											    </label>
											    <label class="radio-inline">
											      <input type="radio" name="usability" value="5"> 5
											    </label>
										</div>
									</div><br />
									<h2 class="panel-title"><b>Improvement Areas</b></h2>
									<div class="form-group">
										<label for="inputName" class="col-sm-3 col-xs-3 control-label nopadding" align=right>Category</label>
										<div class="col-sm-9 col-xs-9" style="margin-top:5px;">
												<select name="mydropdown">
													<option value="Main Menu">Main Menu</option>
													<option value="roduct Area">Product Area</option>
													<option value="Teamsurvey">Teamsurvey</option>
													<option value="Usersurvey">Usersurvey</option>
												</select>
												<!--<label class="checkbox-inline">
											      <input type="checkbox" name="category[]" value="Page"> Pages 
											    </label>
											    <label class="checkbox-inline">
											      <input type="checkbox" name="category[]" value="Menu"> Menu
											    </label>
											   
											    <label class="checkbox-inline">
											      <input type="checkbox" name="category[]" value="Feature"> Features
											    </label>-->
										</div>
									</div>
									<div class="form-group">
										<label for="username" class="col-sm-3 col-xs-3 control-label nopadding" align=right>Comments</label>
										<div class="col-sm-9 col-xs-9">
											<textarea type="text" rows="4" class="form-control" id="message" name="comments" placeholder="Message" value="" style="resize:none;"required /></textarea>
										</div>
									</div>
									<div class="form-group" align=center style="margin-bottom:-10px;">
											<button type="submit" class="btn btn-default" name=submit >
												Send Message
											</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
							<div align=center>Thanks for taking out the time to give us your feedback.</div>
			</div>
		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<style type="text/css">
	.beta {
					    display: block;
					    margin-left: auto;
					    margin-right: auto;
					   
				}
	</style>
	</body>
</html>
<?php } ?>
	
	
	