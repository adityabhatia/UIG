<?php


	session_start();
	require("connect.php");

	$product_id = $_POST['product_id'];


	$date = date('Y/m/d', time());
	$survey_end = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " +4 week"));
	$query_update= "UPDATE `products` SET `user_survey_end`='$survey_end' WHERE `product_id`='$product_id'";
	$result_update= mysql_query($query_update);

	echo json_encode($survey_end);


?>