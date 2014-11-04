
<?php session_start();
include "connect.php"; //connects to the database
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
        //Details for sending E-mail
        
		require_once "mail/Mail.php";

$from = "Aditya Bhatia<bhatia.aditya1.gmail.com>";
$to = $recep;
$subject = 'Hi!';
$body = "Your Password is " . $pass . " for e-mail id  " . $recep  ;

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'bhatia.aditya1@gmail.com',
        'password' => 'n123456789-*/'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
    }else {
       echo "<span style='color: #ff0000;'> Not found your email in our database</span>";
             }
   
}
?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Mail Test</title>
</head>
<body>


<div class="register-form">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
<h1>Forgot Password</h1>
<form action="" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" /></p>
 
    <input class="btn register" type="submit" name="submit" value="Submit" />
    </form>
</div>

</body>
</html>