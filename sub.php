<!DOCTYPE html>
<?php 
session_start();
require('connect.php');
if($_SESSION['username']==""){
?>
<script>window.location.replace("login.php");</script>
<?php } else{ 
$user = $_SESSION['username'];
if (isset($_GET["sname"])){
			$result = 0;
			$sname = $_GET["sname"];
			$sversion = $_GET["sver"];
$query = "SELECT `product_id`, `username`, `p_name`, `p_class`, `budget`, `sdate`, `edate`, `gsize`, `teamno` FROM `products` WHERE username = '$user' and  p_name = '$sname' and p_class = '$sversion'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
while($row = mysql_fetch_array($result)){
					if (isset($_POST['submit'])){

							$counter=0;

							$array_name = $_POST['name'];
							$array_mail = $_POST['mail'];
							$array_role = $_POST['role'];

							foreach ($array_name as $value) {
								$name=$value;
								$mail=$array_mail[$counter];
								$role=$array_role[$counter];
								$counter++;
							
							//$mail = trim($mail);
							if (is_string($mail)) {
								$nmail = trim($mail);
							}
							$survey_url =  "http://www.unipark.de/uc/agileSDT/?a=".$row['product_id']."&b=".$row['p_name']."&c=".$row['p_class'];
							$survey_url = str_replace(' ','%', $survey_url);

								//LINK TO SEND IN E-MAIL
								$pass = "Hello " . $name . "," . "<br />" . "You have been invited for a survey:". $survey_url  . "<br />" . "Your team role: " .  $role;					
						require_once('Mailer/class.phpmailer.php');
						$mail             = new PHPMailer();
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

						$mail->Subject    = "Survey Invitation: UIG!";

						//$mail->AltBody    = "Password: " . $pass; // optional, comment out and test

						$mail->MsgHTML($pass);

						$mail->AddAddress($nmail, $name);
						if(!$mail->Send()) {
						  $msg = "Mailer Error: " . $mail->ErrorInfo;
						} else {
						  $msg = "Message sent!";
						}
					}
					}
?>

<html lang="en">
	<head>
		<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<!--Inclusions-->
			<meta charset="utf-8">
			<title></title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
	
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
			<link type="text/css" rel="stylesheet" href="css/main.css">
			<script type="text/javascript">


			$( document ).ready(function() {

				//var url = document.URL;
				//document.write(url);
					$("span").css("display","none");
						var value = null;
						var winURL = window.location.href;
						var queryStringArray = winURL.split("?");
						var queryStringParamArray = queryStringArray[1].split("&");
						for ( var i=0; i<queryStringParamArray.length; i++ )
						{           
							queryStringNameValueArray = queryStringParamArray[i].split("=");

							if ( "sel" == queryStringNameValueArray[0] )
							{
								value = queryStringNameValueArray[1];
							}                       
						}
				if(value==2)
					$(".sel2").css("display","block");
				else if(value==3)
					$(".sel3").css("display","block");
				else if(value==4)
					$(".sel4").css("display","block");
				else
					$(".sel1").css("display","block");


				$("#participant-table").on('click','.remCF',function(){
						$(this).parent().parent().remove();
					});


					
			});
				
					var table_name=1;
					var table_mail=1;
					var table_role=1;

				function addRow(){

					table_name++;
					table_mail++;
					table_role++;

					$("#participant-table").append('<tr><td><input class="table-form" type="text" name="name[]" placeholder="Name"></td><td><input class="table-form" type="text" name="mail[]" placeholder="Email"></td><td><input class="table-form" type="text" name="role[]" placeholder="Team Role"></td><td><a href="javascript:void(0);" class="remCF"><i class="glyphicon glyphicon-minus"></i></a></td></tr>');

				}

 					

			</script>
	</head>
	<body>
	<div class="container">
			<span class="sel1">
				<h2 class="page-header"><b>Product Overview:</b> <?php echo($row['p_name']);?></h2><br />
				<!--<div class="col-xs-6 col-sm-6" style="text-align:right;" >
						Product Name:<br />
						Version:<br />
						Budget (in thousand € /year):<br />
						Start of product design and development:<br />
						End of product design and development:<br />
						<br />Group size of the design and development team:<br/>
						Number of team members located at each site:<br/>
				</div>
				<div class="col-xs-6 col-sm-6" >
					<?php echo($row['p_name']);?><br />
					<?php echo($row['p_class']);?><br />
					<?php echo($row['budget']);?><br />
					<?php echo($row['sdate']);?><br />
					<?php echo($row['edate']);?><br /><br />
					<?php echo($row['gsize']);?><br />
					<?php echo($row['teamno']);?>
				</div>-->
		<div id="table-responsive">
            <table class="col-xs-12 table-bordered table-striped table-condensed">
        		<thead>
        			<tr>
        				<th>Attribute</th>
        				<th>Value</th>
        			</tr>
        		</thead>
				<tbody>
        			<tr>
						<td data-title="Attribute">Product Name</td>
        				<td data-title="Attribute"><?php echo($row['p_name']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Version</td>
        				<td data-title="Attribute"><?php echo($row['p_class']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Budget (in thousand € /year)</td>
        				<td data-title="Attribute"><?php echo($row['budget']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Start of product design and development</td>
        				<td data-title="Attribute"><?php $sdate=date('d/m/Y', strtotime($row['sdate']));
						echo($sdate);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">End of product design and development</td>
        				<td data-title="Attribute"><?php $edate=date('d/m/Y', strtotime($row['edate']));
						echo($edate);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Group size of the design and development team</td>
        				<td data-title="Attribute"><?php echo($row['gsize']);?></td>
        			</tr>
					<tr>
						<td data-title="Attribute">Number of team members located at each site</td>
        				<td data-title="Attribute"><?php echo($row['teamno']);?></td>
        			</tr>
				</tbody>
			</table>
		</div>
			</span>
			<span class="sel2">
				<h2 class="page-header" ><b> Product Development Survey:</b> <?php echo($row['p_name']);?> </h2><br/>
				<div class="col-xs-12 col-sm-12" style="text-align:left;" >
					<p>The team survey contains questions about the develop and designing process of the product <?php echo($row['p_name']);?>.<br>
					The survey can be accessed by the link below.<br>
					To invite members of the development team you can provide them the access link, or fillout the form below and click "Send invitation".</p>

					<p>Link to product development survey:</p>
					<form id="team-survey-form">
					<input id="survey-link" type="text" value="<?php echo("http://www.unipark.de/uc/agileSDT/?a=".$row['product_id']."&b=".str_replace(' ','%',$row['p_name'])."&c=".str_replace(' ','%',$row['p_class']));?>" class="field left" readonly>
					</form>
					<p></p>
					<h3>Survey Participants</h3>
					<button class="btn btn-default" id="btn-addRow" type="button" name="table_row" value="Add Participant" onclick="addRow();"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add participant</button>
					
					<!-- TODO: Form/Submit functionality-->
					<form id="team-survey-form" method="post" action="" class="form-horizontal">	
						<button class="btn btn-default" id="btn-sendIn" type="submit" name="submit" value="Send invitation" ><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;Send invitation</button>
						<table class="col-md-12 table-bordered table-striped table-condensed" id="participant-table" style="border-spacing: 5px;">
						  <tr>
						    <th>Name</th>
						    <th>Email</th>		
						    <th>Team Role</th>
						    <th>Action</th>
						  </tr>
						  <tr>
						    <td><input class="table-form" type="text" name="name[]" placeholder="Name"></td>
						    <td><input class="table-form" type="text" name="mail[]" placeholder="Email"></td>		
						    <td><input class="table-form" type="text" name="role[]" placeholder="Team Role"></td>
						    <td></td>
						  </tr>
						</table>
						
					</form>					
				</div>
				<div class="col-xs-12 col-sm-12" style="text-align:left;" ><br>
					<p>An overview of the results of all product-related surveys is shown in the review section.</p>
					
				</div>
			</span>
			<span class="sel3">	
				<h2 class="page-header" ><b>Product User Survey:</b> <?php echo($row['p_name']);?></h2><br />
				<div class="col-xs-12 col-sm-12" style="text-align:left;" >
					
						<p>	The user survey contains questions about the usability of the product <?php echo($row['p_name']);?>.<br>
							The survey can be accessed by the link below.<br>
							To invite your product's users and customers you can provide them the access link.</p>
					
						<p>Link:</p>
					<form id="user-survey-form">	
						<input id="survey-link" type="text" value="<?php echo("http://www.unipark.de/uc/UIG_SUS/?a=".$row['product_id']."&b=".str_replace(' ','%',$row['p_name'])."&c=".str_replace(' ','%',$row['p_class']));?>" class="field left" readonly>
					</form>
					<br>
					<p>An overview of the results of all product-related surveys is shown in the review section.</p>

				</div>

			</span>
			<span class="sel4">	
				<h2 class="page-header" ><b>Review</b></h2><br />
				<div class="col-xs-12 col-sm-12" style="text-align:right;" >
				</div>
			</span>
	</div>
	
	
	</body>
</html>

<?php }}}} ?>