<?php 
session_start();
require('connect.php');
$msg="";
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } 
else if (isset($_POST['ajaxname'])){
	$uname = $_SESSION['username'];
	$np_name = $_POST['ajaxname'];
	$np_class = $_POST['ajaxversion']; 
				$validate = "SELECT * FROM `products` WHERE `username` = '$uname' AND `p_name`='$np_name' AND `p_class`='$np_class'";
				$validation = mysql_query($validate) or die(mysql_error());
				$count = mysql_num_rows($validation);
					if ($count>=1){
						$msg="5";
						echo($msg);
					}
				}
else{
	$msg="";
	$success="";
	$username = $_SESSION['username'];
	$pname = $_POST['inputName'];
	$pversion = $_POST['version'];
	$budget = $_POST['budget'];
	$sdate = $_POST['dp1'];
	$edate = $_POST['dp2'];
	$groupsize = $_POST['groupsize'];
	$teamno = $_POST['teamno'];
	$developers = $_POST['developers'];
	$designers = $_POST['designers'];
	$others = $_POST['others'];
	$location = $_POST['location'];
	$edate=date('Y-m-d', strtotime($edate));
	$sdate=date('Y-m-d', strtotime($sdate));
	if(strtotime($edate)<strtotime($sdate)){
		$msg=1;
		echo($msg);
	}
	else{
	date_default_timezone_set('Europe/Berlin');
	$timestamp = time();
	$date = date('Y/m/d', time());
	$surveyEnd = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " +4 week"));
	$team_survey_end = 0;
	$user_survey_end = 0;
	$validate = "SELECT * FROM `products` WHERE `username` = '$username' AND `p_name`='$pname' AND `p_class`='$pversion'";
	$validation = mysql_query($validate) or die(mysql_error());
	$count = mysql_num_rows($validation);
	if ($count>=1){
		$msg=2;
		echo($msg);}
	else{
	$query = "INSERT INTO `products` (`username`, `p_name`, `p_class`, `budget`, `sdate`, `edate`, `gsize`, `developers`,`designers`,`others`, `teamno`,`surveyEnd`, `team_survey_end`,`user_survey_end`, `location`) VALUES ('$username', '$pname', '$pversion', '$budget', '$sdate', '$edate', '$groupsize', '$developers','$designers','$others', '$teamno', 0, '$team_survey_end','$user_survey_end', '$location')";
	$result = mysql_query($query) or die(mysql_error());
		if($result){ 	$success="Product Added!";
						echo($success);
       }
      }
     }
}

?>