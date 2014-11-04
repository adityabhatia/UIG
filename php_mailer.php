<?php 
session_start();
include "connect.php";
$msg="";
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $query="select * from user where username='$username'";
    $result   = mysql_query($query);
    $count=mysql_num_rows($result);
    // If the count is equal to one, we will send message other wise display an error message.
    if($count==1)
    {
        $rows=mysql_fetch_array($result);
        $pass  =  $rows['password'];//FETCHING PASS
        //echo "your pass is ::".($pass)."";
        $recep = $rows['email'];
        //echo "your email is ::".$email;
	}
	
require_once('Mailer/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "bhatia.aditya1@gmail.com";  // GMAIL username
$mail->Password   = "n123456789-*/";            // GMAIL password

$mail->SetFrom('bhatia.aditya1@gmail.com', 'Aditya Bhatia');

$mail->AddReplyTo("bhatia.aditya1@gmail.com","Aditya Bhatia");

$mail->Subject    = "Password Lost!";

$mail->AltBody    = "Password: " . $pass; // optional, comment out and test

$mail->MsgHTML("Password: " . $pass);

$mail->AddAddress($recep, $username);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  $msg = "Mailer Error: " . $mail->ErrorInfo;
} else {
  $msg = "Message sent!";
}
?>

<?php
   /*require("Mailer/class.phpmailer.php"); // path to the PHPMailer class.
 
   $mail = new PHPMailer();
   $mail->IsSMTP();
   $mail->Mailer = "smtp";
   $mail->Host = "smtp.gmail.com"; //Enter your SMTP2GO account's SMTP server.
   $mail->Port = "465"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'ssl'; // Uncomment this line if you want to use SSL.
   $mail->Username = "bhatia.aditya1@gmail.com";
   $mail->Password = "n123456789";
    
   $mail->From     = "bhatia.aditya1@gmail.com";
   $mail->FromName = "Susan Sender";
   $mail->AddAddress("bhatia.aditya11@gmail.com", "Rachel Recipient");
   $mail->AddReplyTo("bhatia.aditya1@gmail.com", "Sender's Name");
 
   $mail->Subject  = "Hi!";
   $mail->Body     = "Hi! How are you?";
   $mail->WordWrap = 50;  
 
   if(!$mail->Send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
		exit;
   } else {
		echo 'Message has been sent.';
   }*/
?>

 <?php } ?>

<!DOCTYPE html>
<html>
	<head>

		<!--Inclusions-->
			<meta charset="utf-8">
			<title>INES Login</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			
			<link href="css/bootstrap.min.css" rel="stylesheet">
			
			<link type="text/css" rel="stylesheet" href="css/login.css">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	
	<body style="background-color:#2E2E2E">
		<!-- Form for logging in the users -->
		<div class="wrapper">
			<form class=form-signin action="" method="POST">      
				  <h2 class="form-signin-heading" align=center>FORGOT PASSWORD</h2>
				  <div align=center><?php echo($msg);?></div>
				  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />      
				  <!--<label class="checkbox">
					<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
				  </label>--><br />
				  <div class="col-sm-6 nopadding">
					<button class="btn btn-default" type="submit" style="display: block; width: 100%;">Send Password</button>
				</div>
				<div class="col-sm-6 nopadding">
					<button class="btn btn-default" type="reset" style="display: block; width: 100%;">Reset</button>
				</div>
			</form>
			<form class="form-signin">
				<div class="col-sm-6 nopadding col-sm-offset-3">
				<a class="btn btn-default" type="submit" style="display: block; width: 100%;" href="login.php">Go Back</a>
				</div>
				<!--<div class="col-sm-6 nopadding">
				<a class="btn btn-default" type="submit" style="display: block; width: 100%;" href="login.php">Login</a>
				</div>-->
			</form>		
		</div>

		<!--Inclusions-->
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>
   