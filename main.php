<?php 
session_start();
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php }?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">

				$( document ).ready(function() {
					$("#nav li:nth-child(1)").addClass( " active" );
					$(".list-group-item").click(function(){
					$('#nav li').removeClass();
					$(".list-group-item").removeClass('active');
					$( this ).addClass( " active" );
					});	
					$('#nav li').click(function() {
					$('#nav li').removeClass();
					$(".list-group-item").removeClass('active');
					$( this ).addClass( " active" );
        			});
					$(".iframe").attr('src','home.php');
				});

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
	  <div class="container-fluid">
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
				</ul>
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
			<div class="col-xs-4 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation" style="margin-left:-14px;">
				<div class="list-group">
					<a href="mp.php" target="myiframe" class="list-group-item deactive" id="listh">Manage Products</a>
					<a href="np.php" target="myiframe" class="list-group-item deactive" id="listnp">New Product</a>
				</div>
			</div>
			<div class="col-xs-8 col-md-10 nopadding " style="margin-left:14px;" >
				<iframe src="home.php" name="myiframe" width=100% height=590px scrolling=yes
				frameborder="0" style="float:left;" class="iframe"></iframe>
			</div>
		</div>
	</div>
	</body>
</html>
	  
	
	
	
	