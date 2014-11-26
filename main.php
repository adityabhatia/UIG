<!DOCTYPE html>
<?php 
session_start();
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } else{ ?>

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
						$('#nav li').removeClass();
						$(".list-group-item").removeClass('active');
						$( this ).addClass( " active" );
					});	
					$('#nav li').click(function() {
						$('#nav li').removeClass();
						$(".list-group-item").removeClass('active');
						$( this ).addClass( " active" );
						$(".sublist").css("display","none");
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
						var winURL = document.getElementById("iframe").contentWindow.location.href;
						var queryStringArray = winURL.split("?");
						if(queryStringArray[1]){
						var queryStringParamArray = queryStringArray[1].split("&");
						for ( var i=0; i<queryStringParamArray.length; i++ )
						{           
							queryStringNameValueArray = queryStringParamArray[i].split("=");
							
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
						}}
						$urlnew = "sub.php?sname="+s_name+"&sver="+s_ver+"&sel=";			
						$(".sublist a:nth-child(1)").attr("href", $urlnew+1);
						$(".sublist a:nth-child(2)").attr("href", $urlnew+2);
						$(".sublist a:nth-child(3)").attr("href", $urlnew+3);
						$(".sublist a:nth-child(4)").attr("href", $urlnew+4);
				});
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
			<link rel="stylesheet" type="text/css" href="css/offcanvas.css">
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
					<div class="navbar-brand" style="padding: 8px 8px 8px 8px;"><img src="img/uig-logo.png"></img></div>
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
						<ul class="dropdown-menu nopadding" role="menu" aria-labelledby="dropdownMenu1" style="min-width:100%;">
							<li class="nopadding" role="presentation"><a class="nopadding" role="menuitem" tabindex="-1" href="user.php" target="myiframe">Profile</a></li>
							<li class="nopadding" role="presentation"><a role="menuitem" tabindex="-1" href="user.php" target="myiframe">Change Password</a></li>
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
							<a href="mp.php" target="myiframe" class="list-group-item deactive external" id="listh"><i class="glyphicon glyphicon-cog"></i>&nbsp&nbspManage Products</a>
							<span class = "sublist"><a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspOverview</a>
							<a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspSoftware Team</a>
							<a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspUser</a>
							<a href="" target="myiframe" class="list-group-item deactive" id="listh" style="padding-left:1em; border-left:none; border-right:none; border-bottom:none;"><i class="glyphicon glyphicon-minus"></i>&nbsp&nbspReview</a>
							</span>
							<a href="np.php" target="myiframe" class="list-group-item deactive external" id="listnp"><i class="glyphicon glyphicon-plus"></i>&nbsp&nbspNew Product</a>
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
	</body>
</html>
<?php } ?>
	
	
	