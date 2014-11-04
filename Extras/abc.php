
<?php 
session_start();
if($_SESSION['username']==""){
?>
<script>window.location.href = "login.php";</script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome <?php echo($_SESSION['username']);?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis">

    <link href="css/bootstrap.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/site.css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body> <img src="http://www.asta.uni-mannheim.de/wp-content/uploads/2014/07/Unbenannte-Anlage-00049.jpg" id="bg" alt=""></img>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">INES Questionnaire Account</a>
          <div class="btn-group pull-right">
			<a class="btn" href="my-profile.html"><i class="icon-user"></i> <?php echo($_SESSION['username']);?></a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
			  <li><a href="my-profile.html">Profile</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="index.html">Home</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="new-user.html">New User</a></li>
					<li class="divider"></li>
					<li><a href="users.html">Manage Users</a></li>
				</ul>
			  </li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><i class="icon-pencil"></i> Manage</li>
              <li class="active"><a href="users.html">Questionnaires</a></li>
              <li><a href="roles.html">Software Products</a></li>
              <li class="nav-header"><i class="icon-signal"></i>Figures</li>
              <li><a href="stats.html">User Responses</a></li>
              <li><a href="user-stats.html">Response Frequency</a></li>
             
              <li class="nav-header"><i class="icon-cog"></i>Account</li>
              <li><a href="#">Settings</a></li>
		  
            </ul>
          </div>
        </div>
        <div class="span6">
          <div class="well hero-unit">
		
            <h1>Welcome, <?php echo($_SESSION['username']);?></h1>
            <p>This area will help you manage your account.</p>
            <!--<p><a class="btn btn-success btn-large" href="users.html">Manage Users &raquo;</a></p>-->
          </div></div><div class="span9">
          <div class="row-fluid">
			
            <div class="span3">
              <h3>Total Users</h3>
              <p><a href="users.html" class="badge badge-inverse">563</a></p>
            </div>
            <div class="span3">
              <h3>New Users Today</h3>
              <p><a href="users.html" class="badge badge-inverse">8</a></p>
            </div>
            <div class="span3">
              <h3>Pending</h3>
			  <p><a href="users.html" class="badge badge-inverse">2</a></p>
            </div>
            <div class="span3">
              <h3>Roles</h3>
			  <p><a href="roles.html" class="badge badge-inverse">3</a></p>
            </div>
          </div>
		  <br />
		  <div class="row-fluid">
			<div class="page-header">
				<h1>Pending Users <small>Approve or Reject</small></h1>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>E-mail</th>
						<th>Phone</th>
						<th>City</th>
						<th>Role</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<tr class="pending-user">
					<td>564</td>
					<td>John S. Schwab</td>
					<td>johnschwab@provider.com</td>
					<td>402-xxx-xxxx</td>
					<td>Bassett, NE</td>
					<td>User</td>
					<td><span class="label label-important">Inactive</span></td>
					<td><span class="user-actions"><a href="javascript:void(0);" class="label label-success">Approve</a> <a href="javascript:void(0);" class="label label-important">Reject</a></span></td>
				</tr>
				<tr class="pending-user">
					<td>565</td>
					<td>Juliana M. Sheffield</td>
					<td>julianasheffield@provider.com</td>
					<td>803-xxx-xxxx</td>
					<td>Columbia, SC</td>
					<td>User</td>
					<td><span class="label label-important">Inactive</span></td>
					<td><span class="user-actions"><a href="javascript:void(0);" class="label label-success">Approve</a> <a href="javascript:void(0);" class="label label-important">Reject</a></span></td>
				</tr>
				</tbody>
			</table>
		  </div>
        </div>
      </div>

      </div>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>
