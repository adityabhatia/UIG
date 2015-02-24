<!DOCTYPE html>
<?php 
	session_start();
	require('connect.php');
	if($_SESSION['username']==""){
	?>
	<script>window.location.replace("login.php");</script>
	<?php } 
	else{ 
	$user = $_SESSION['username'];

	if (isset($_GET["sname"])){
				$result = 0;
				$sname = $_GET["sname"];
				$sversion = $_GET["sver"];


	//VARIABLES
	$product_id;
	$product_name;
	$product_version;
	$product_budget;
	$product_start;
	$product_end;
	$product_gsize;
	$product_teamno;
	$product_team_survey_end;
	$product_user_survey_end;

	$array_name = array();
	$array_mail = array();
	$array_role = array();
	$array_invitations = array();
	$count2=0;
	$counter=0;


	//SELECT PRODUCT
	$query = "SELECT * FROM `products` WHERE username = '$user' and  p_name = '$sname' and p_class = '$sversion'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);

	if ($count == 1){
		while ($selected_product = mysql_fetch_array($result)){
			$product_id = $selected_product['product_id'];
			$product_name = $selected_product['p_name'];
			$product_version = $selected_product['p_class'];
			$product_start = $selected_product['sdate'];
			$product_end = $selected_product['edate'];
			$product_budget = $selected_product['budget'];
			$product_gsize = $selected_product['gsize'];
			$product_teamno = $selected_product['teamno'];
			$product_team_survey_end = $selected_product['team_survey_end'];
			$product_user_survey_end = $selected_product['user_survey_end'];
		}
	}


	//SELECT SURVEY PARTICIPANTS
	$query2 ="SELECT * FROM participants WHERE product_id=$product_id";
	$result2 = mysql_query($query2) or die(mysql_error());
	$count2 = mysql_num_rows($result2);

	if($count2 != 0){

		while($row2 = mysql_fetch_array($result2)){
			$array_name[$counter] = $row2['name'];
			$array_mail[$counter] = $row2['email'];
			$array_role[$counter] = $row2['role'];
			$array_invitations[$counter] = $row2['invitations'];
			$counter++;
		}
	}
?>


<html lang="en">
	<head>
		<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/spin.min.js"></script>
		
		<!--Inclusions-->
			<meta charset="utf-8">
			<title></title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
	
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
			<link type="text/css" rel="stylesheet" href="css/main.css">
			<script type="text/javascript">


				//VARIABLES
				var name_array;
				var mail_array;
				var role_array;
				var invitations_array;
				var product_id;
				var product_name;
				var product_version;
				var product_end;
				var product_user_survey_end;
				var product_team_survey_end;

				var counter;

				var table_name=1;
				var table_mail=1;
				var table_role=1;

				var row_counter=1;


				$( document ).ready(function() {
					$("#spinner").hide();
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

					name_array = <?php echo json_encode($array_name);?>;
					mail_array = <?php echo json_encode($array_mail);?>;
					role_array  = <?php echo json_encode($array_role);?>;
					invitations_array = <?php echo json_encode($array_invitations);?>;
					counter = <?php echo json_encode($count2);?>;
					product_id = <?php echo($product_id);?>;
					product_name = <?php echo json_encode($product_name);?>;
					product_version = <?php echo json_encode($product_version);?>;
					product_end = <?php echo json_encode($product_end);?>;
					product_team_survey_end = <?php echo json_encode($product_team_survey_end);?>;
					product_user_survey_end = <?php echo json_encode($product_user_survey_end);?>;




					if(product_team_survey_end == 0){
						$('#survey_not').show();
						$('#survey_started').hide();
					}
					else{
						$('#survey_not').hide();
						$('#survey_started').show();
					}

					if(product_user_survey_end == 0){
						$('#c_survey_not').show();
						$('#btn-create_link').show();
						$('#c_survey_started').hide();
					}
					else{
						$('#c_survey_not').hide();
						$('#c_survey_started').show();
						$('#btn-create_link').hide();
					}

					for (var i = 0; i < counter; i++) {
						var name = name_array[i];
						var mail = mail_array[i];
						var role = role_array[i];
						var invitations = invitations_array[i];
						$("#participant-table").append('<tr><td><input class="table-form" type="text" name="name[]" value="'+name+'" readonly></td><td><input class="table-form" type="text" name="mail[]" value="'+mail+'" readonly></td><td><input class="table-form" type="text" name="role[]" value="'+role+'" readonly ></td><td><input class="table-form" type="text" name="invitations[]" value="'+invitations+'" readonly ></td><td><a href="javascript:void(0);" class="sendINV"><i class="glyphicon glyphicon-envelope"></i></a></td></tr>');
					};

					$("#participant-table").on('click','.sendINV',function(){
    					var $row = $(this).closest("tr");    // Find the row
   						var $tds = $row.find("td");
   						var ajaxName;
   						var ajaxMail;
   						var ajaxRole;
   						var invitations;
   						var counter3 = 0;

   						$("#spinner").show();

   						$.each($tds, function() {
   							var $type = $(this).children('input').val();
   							if(counter3 ==0){
   								ajaxName = $type;
   							}
   							else if(counter3==1){
   								ajaxMail = $type;
   							}
   							else if(counter3==2){
   								ajaxRole = $type;
   							}
   							else if(counter3==3){
   								invitations = $type;
   							}

   							counter3++;

    					});
   						$.ajax({
							type: "POST",
							url: "sendall.php",
							data: 'name='+ajaxName+'&mail='+ajaxMail+'&role='+ajaxRole+'&id='+product_id+'&product_name='+product_name+'&product_version='+product_version+'&product_end='+product_end+'&survey_end='+product_team_survey_end+'&invitations='+invitations,
							success: function(data){
								alert("Invitation has been sent!");
								$("#spinner").hide();
								location.reload();
								
							}
						});
					});


					// this is the id of the form
						$("form").submit(function() {

							var url = "sendsingle.php"; // the script where you handle the form input.
							var postdata = $("form").serializeArray();

							postdata[postdata.length] = { name: "product_id", value: product_id };
							postdata[postdata.length] = { name: "product_name", value: product_name };
							postdata[postdata.length] = { name: "product_version", value: product_version };
							postdata[postdata.length] = { name: "product_end", value: product_end };
							postdata[postdata.length] = { name: "survey_end", value: product_team_survey_end };
							$("#spinner").show();

						    $.ajax({
						           type: "POST",
						           url: url,
						           data: postdata, // serializes the form's elements.
						           success: function(data){
					           		alert("Invitations have been sent!");
					           		$("#spinner").hide();
					           		location.reload();
					           		
					           }
						    });
						    return false;
						});

					//SPINNER ELEMENT
					var opts = {
					  lines: 13, // The number of lines to draw
					  length: 0, // The length of each line
					  width: 5, // The line thickness
					  radius: 10, // The radius of the inner circle
					  corners: 0.8, // Corner roundness (0..1)
					  rotate: 1, // The rotation offset
					  direction: 1, // 1: clockwise, -1: counterclockwise
					  color: '#333', // #rgb or #rrggbb or array of colors
					  speed: 1.3, // Rounds per second
					  trail: 66, // Afterglow percentage
					  shadow: false, // Whether to render a shadow
					  hwaccel: false, // Whether to use hardware acceleration
					  className: 'spinner', // The CSS class to assign to the spinner
					  zIndex: 2e9, // The z-index (defaults to 2000000000)
					  top: '50%', // Top position relative to parent
					  left: '50%', // Left position relative to parent
					  
					};
					var target = document.getElementById('spinner');
					var spinner = new Spinner(opts).spin(target);



				});

				function addRow(){
					table_name++;
					table_mail++;
					table_role++;
					row_counter++;
					$("#participant-table").append('<tr><td><input class="table-form" type="text" name="name[]" placeholder="Name"></td><td><input class="table-form" type="text" name="mail[]" placeholder="Email"></td><td><input class="table-form" type="text" name="role[]" placeholder="Team Role"></td><td><input class="table-form" type="text" name="invitations[]" placeholder="Invitations" readonly></td><td><a href="javascript:void(0);" class="sendINV"><i class="glyphicon glyphicon-envelope"></i></a>&nbsp;&nbsp;<a href="javascript:void(0);" class="remCF"><i class="glyphicon glyphicon-minus"></i></a></td></tr>');
				}

				function createLink(){
					$.ajax({
			        	type: "POST",
			        	url: "start_user_survey.php",
			        	data: 'product_id='+product_id,
			      		success: function(data){
			           		alert("Link has been created");
			           		location.reload();
		           		}
					});
				}

			</script>



	</head>
	<body>
		<div class="container">


				<!--
				UIG PRODUCT OVERVIEW
				-->
				<span class="sel1">
					<h2 class="page-header"><b>Product Overview:</b> <?php echo($product_name);?></h2><br />
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
			        				<td data-title="Attribute"><?php echo($product_name);?></td>
			        			</tr>
								<tr>
									<td data-title="Attribute">Version</td>
			        				<td data-title="Attribute"><?php echo($product_version);?></td>
			        			</tr>
								<tr>
									<td data-title="Attribute">Budget (in thousand € /year)</td>
			        				<td data-title="Attribute"><?php echo($product_budget);?></td>
			        			</tr>
								<tr>
									<td data-title="Attribute">Start of product design and development</td>
			        				<td data-title="Attribute"><?php $sdate=date('d/m/Y', strtotime($product_start));
									echo($sdate);?></td>
			        			</tr>
								<tr>
									<td data-title="Attribute">End of product design and development</td>
			        				<td data-title="Attribute"><?php $edate=date('d/m/Y', strtotime($product_end));
									echo($edate);?></td>
			        			</tr>
								<tr>
									<td data-title="Attribute">Group size of the design and development team</td>
			        				<td data-title="Attribute"><?php echo($product_gsize);?></td>
			        			</tr>
								<tr>
									<td data-title="Attribute">Number of team members located at each site</td>
			        				<td data-title="Attribute"><?php echo($product_teamno);?></td>
			        			</tr>
							</tbody>
						</table>
					</div>
				</span>



				<!--
				UIG TEAM SURVEY
				-->
				<span class="sel2">
					<h2 class="page-header" ><b> Product Development Survey:</b> <?php echo($product_name);?> </h2><br/>
					<div class="col-xs-12 col-sm-12" style="text-align:left;" >
						<p>
							The results of the team survey help us to diagnose the status quo of the software development team, providing suggestions for future improvements.<br>
							Therefore we ask you to invite the project's team members to our UIG survey. 
							As soon as you have invited a team member by adding to the following table the survey starts and will be available for you the next 3 weeks.

							<h3>Invitation Instructions</h3>
							To invite members of the development team you can fill out the form below and click "Send invitation".<br>
							A single invitation can be send through a click on the envelope of the table's right column.

							<h3>Team Survey Status</h3>
							<p id="survey_not">The survey hasn't started yet!</p>
							<p id="survey_started">The questionnaire will be made available for you until <b><?php echo($product_team_survey_end)?></b>!</p>
						</p>
						<br/>
						<h4>Hint:</h4>
						<p>To make the measurement as accurate as possible, we would be very grateful if every member of the development team could participate in the UIG questionnaire.</p>
						<br/>
						<p></p>
						<h3>Survey Participants</h3>
						<button class="btn btn-default" id="btn-addRow" type="button" name="table_row" value="Add Participant" onclick="addRow();"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add participant</button>
						
						<!-- TODO: Form/Submit functionality-->
						<form method="post" action="" class="form-horizontal">	
							<button class="btn btn-default" id="btn-sendIn" type="submit" name="submitall" value="Send invitations" ><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;Send invitations</button>
							<div id="spinner">
							</div>
							<table class="col-xs-12 table-bordered table-striped table-condensed" id="participant-table" style="border-spacing: 5px;">
							  <tr>
							    <th>Name</th>
							    <th>Email</th>		
							    <th>Team Role</th>
							    <th>Invitations</th>
							    <th>Action</th>
							  </tr>
							  <tr>
							    <td><input class="table-form" type="text" name="name[]" placeholder="Name"></td>
							    <td><input class="table-form" type="text" name="mail[]" placeholder="Email"></td>		
							    <td><input class="table-form" type="text" name="role[]" placeholder="Team Role"></td>
							    <td><input class="table-form" type="text" name="invitations[]" placeholder="Invitations" readonly></td>
							    <td><a href="javascript:void(0);" class="sendINV"><i class="glyphicon glyphicon-envelope"></i></a></td>
							  </tr>
							</table>
							
						</form>					
					</div>
					<div class="col-xs-12 col-sm-12" style="text-align:left;" ><br>
						<p>An overview of the results of all product-related surveys is shown in the review section.</p>
						
					</div>
				</span>


				<!--
				UIG CUSTOMER SURVEY
				-->
				<span class="sel3">	
					<h2 class="page-header" ><b>Product User Survey:</b> <?php echo($product_name);?></h2><br />
					<div class="col-xs-12 col-sm-12" style="text-align:left;" >
						
						<p>	The user survey contains questions about the usability of the product <b><?php echo($product_name);?></b>.<br>
							<p>To start the survey it is necessary to create a link by clicking the button below. As soon as you have created the link the survey starts and will be available for you the <b>next 4 weeks</b>.</p>
							To invite your product's users and customers you can provide them the access link.
						</p>
						
						<h3>Customer Survey Status</h3>
						<p id="c_survey_not">The survey hasn't started yet!</p>
						<button class="btn btn-default" id="btn-create_link" type="button" value="Create Customer Survey Link" onclick="createLink();">&nbsp;Create Customer Survey Link</button>
						<div id="c_survey_started">Link to customer survey:
							<form id="user-survey-form">	
								<input id="survey-link" type="text" value="<?php echo("http://www.unipark.de/uc/UIG_SUS/?a=".$product_id."&b=".str_replace(' ','%',$product_name)."&c=".str_replace(' ','%',$product_version)."&d=".$product_user_survey_end);?>" class="field left" readonly>
							</form>
							<br/>
							<p>The questionnaire will be made available for you until <b><?php echo($product_user_survey_end)?></b>!</p>
						</div>
						<br/>
						<h4>Hint:</h4>
						<p>To make the measurement as accurate as possible, we would be very grateful if 30 customers could participate in the UIG questionnaire.</p>
					</div>
				</span>


				<!--
				UIG SURVEY REPORT
				-->
				<span class="sel4">	
					<h2 class="page-header" ><b>Review</b></h2><br />
				<p align=center style="font-size:20px;">	Work in Progress. <br /><br />
					<img src="img/construction.jpg" width="40%" height="40%"></img>
				</p>

				<div class="col-xs-12 col-sm-12" style="text-align:right;" >
				</div>
				</span>
		</div>
	</body>
</html>

<?php }} ?>