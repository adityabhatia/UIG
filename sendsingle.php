<?php
			session_start();
			require("connect.php");



			$counter=0;

			$array_name = $_POST['name'];
			$array_mail = $_POST['mail'];
			$array_role = $_POST['role'];
			$array_invitations = $_POST['invitations'];
			$product_id = $_POST['product_id'];
			$product_version = $_POST['product_version'];
			$product_name = $_POST['product_name'];
			$product_end = $_POST['product_end'];

			$user = $_SESSION['username'];
			



			foreach ($array_name as $value) {
				$name=$value;
				$mail=$array_mail[$counter];
				$role=$array_role[$counter];
				$invitations=$array_invitations[$counter];
				$counter++;
				
				//$mail = trim($mail);
				if (is_string($mail)) {
					$nmail = trim($mail);
				}
				$survey_url =  "http://www.unipark.de/uc/agileSDT/?a=".$product_id."&b=".$product_name."&c=".$product_version."&d=".$product_end;
				$survey_url = str_replace(' ','%', $survey_url);

				//LINK TO SEND IN E-MAIL
				$pass = "Dear ". $name .",<br/><br/>

				As you're an active team member within the development of the product " . $product_name . ", " . $user . " has selected you to participate in a short 8-10 mins questionnaire, that is conducted by Usability in Germany (UIG) to gather opinions on various aspects of software usability.

				You will be asked to answer a few questions throughout the survey. Your answers will be completely anonymous and analysed in combination with other members' responses.

				<br/>We thank you for your time!<br/><br/>" . $survey_url .
				"
				<br/><br/>Best Regards,<br/>
				UIG Team";					
				require_once('Mailer/class.phpmailer.php');
				$mail = new PHPMailer();
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
				} 
				else {
					$msg = "Message sent!";
					$invitations++;


					//SAVE PARTICIPANTS IN DB
					$query_insert= "INSERT INTO participants VALUES ('$name','$nmail','$role','1','$product_id')";
					$result_insert= mysql_query($query_insert);
					if ($result_insert==null) {
						$query_update = "UPDATE `participants` SET `invitations`='$invitations' WHERE `email`='$nmail'";
						$result_update= mysql_query($query_update);
					}


				}
			}
?>