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
			$survey_end = $_POST['survey_end'];


			$user = $_SESSION['username'];

			if($survey_end == 0){
		  		$date = date('Y/m/d', time());
				$link_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " +3 week"));
		  	}
		  	else{
		  		$link_date = $survey_end;
		  	}
			

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
				$survey_url =  "http://www.unipark.de/uc/agileSDT/?a=".$product_id."&b=".$product_name."&c=".$product_version."&d=".$link_date;
				$survey_url = str_replace(' ','%', $survey_url);

				//LINK TO SEND IN E-MAIL
				
				require_once('Mailer/PHPMailerAutoload.php');
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

				$mail->IsHTML(true);
				$mail->AddEmbeddedImage('img/uig.jpg', 'myattach');
				$mail->Body = '<div style="width:100%;"><img src="cid:myattach"  style="display: block;
			    margin-left: auto;
			    margin-right: auto" /></div><br />Dear <b>'. $name .'</b>,<br/><br/>

				As you&#39;re an active team member within the development of the product ' . $product_name . ', ' . $user . ' has selected you to participate in a short 20-25 minutes questionnaire, that is conducted by Usability in Germany (UIG) to gather opinions on various aspects of software usability.

				You will be asked to answer a few questions throughout the survey. Your answers will be completely anonymous and analysed in combination with other members&#39; responses.

				<br/>We thank you for your time!<br/><br /> 

				<a href="' . $survey_url .'" style="background-color:#373737;border:1px solid grey;border-radius:3px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:14px;line-height:30px;text-align:center;text-decoration:none;width:100px;-webkit-text-size-adjust:none;mso-hide:all;">Click here! &rarr;</a>
				
				<br/><br/>Best Regards,<br/>
				UIG Team';

				$mail->AltBody    = "Survey Invitation" ; // optional, comment out and test

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
						if ($result_insert==null) {
						if($invitations == 1){
						}	
						else{
							$query_update = "UPDATE `participants` SET `invitations`='$invitations' WHERE `email`='$nmail' AND `product_id`='$product_id'";
							$result_update= mysql_query($query_update);
						}
					}
					}

					if($survey_end == 0){
			  			$date = date('Y/m/d', time());
						$survey_end = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " +3 week"));
						$query_update= "UPDATE `products` SET `team_survey_end`='$survey_end' WHERE `product_id`='$product_id'";
						$result_update= mysql_query($query_update);

						$query_counter= "UPDATE `products` SET `surveyEnd`=2 WHERE `product_id`='$product_id' AND `surveyEnd`=0";
						$result_counter= mysql_query($query_counter);
						echo json_encode($survey_end);
		  			}


				}
			}
?>