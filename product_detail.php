<?php 
session_start();
require('connect.php');
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php }  


if (isset($_GET["sname"])){
	$username = $_SESSION['username'];
	$name = $_GET["sname"];
	$query = "SELECT * FROM products where p_name='$name'and username='$username'";
	$result = mysql_query($query);
  	if (!$result) {
    	die('Invalid query: ' . mysql_error());
  	}

  while($row = mysql_fetch_array($result)){
      
      $product_name = $row['p_name'];
      $product_version = $row['p_class'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>DataTables example - Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/shCore.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<link type="text/css" rel="stylesheet" href="css/main.css">
	
	<style type="text/css" class="init"></style>
	
	<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="js/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="js/demo.js"></script>

</head>

<body>
	<h1>Overview product <?php echo($product_name) ?> </h1>
	<h2>Product description: </h2>
	<h3>Product details: </h3>
	<h3>Product survey</h3>
	<ul>
		<li><a href="">Product SDT Survey</a></li>
		<li><a href="">Product User Survey</a></li>
		<li><a href="">Product Survey Results</a></li>
	</ul>




</body>
</html>