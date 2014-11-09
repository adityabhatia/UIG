<?php 
session_start();
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } else{ ?>

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
			<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
	  <div class="container-fluid" style="min-width:750px;">
		<nav role="navigation" class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-brand nopadding" style="padding: 6px 8px 0 8px;"><img src="img/uig-logo.png"></img></div>
			</div>
			<!-- Collection of nav links, forms, and other content for toggling -->
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav" id="nav">
					<li><a id="add" href="home.php" target="myiframe">Home</a></li>
					<li><a id="add" href="about.php" target="myiframe">About Us</a></li>
					<li><a id="add" href="contact.php" target="myiframe">Contact</a></li>
					<!--<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><b class="caret"></b></a>
						<ul role="menu" class="dropdown-menu">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
							<li class="divider"></li>
							<li><a href="#"></a></li>
						</ul>
					</li>
				
				<form role="search" class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" placeholder="Search" class="form-control">
					</div>
				</form>--></ul>
				<ul class="nav navbar-nav navbar-right" style="padding: 8px 8px 0 0;" >
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
		</nav>
		
			<div class="row-fluid">
				<div class="col-xs-4 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation" style="margin-left:-14px; min-width:70px;">
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
				<div class="col-xs-8 col-sm-10  nopadding" style="margin-left:14px; min-width:350px;" >
				<div class="embe"><iframe src="home.php" name="myiframe" width=100% height=590px
					frameborder="0" scrolling=no style="position:absolute;" class="iframe" id="iframe"></iframe></div>
				</div>
			</div>
		</div>
		<style>
			body,html {padding:0;margin:0;height:100%;}

			html {overflow-y:auto}

			.embed-container {
				position: relative;
				height: 100%;
				max-width: 100%;
			}

			.embed-container iframe,
			.embed-container object,
			.embed-container embed {
				position: absolute;
				top: 0;
				left: 0;
				bottom: 0;
				width: 100%;
				height: 100%;
			}
		</style>
	</body>
</html>
<?php } ?>
	
	
	