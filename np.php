
<!DOCTYPE html>


<html lang="en">
	<head>
		<!--Inclusions-->
			<meta charset="utf-8">
			<title>Welcome to UIG</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="INES Questionnaire">
			<meta name="author" content="adityabhatia">
			
			<link href="css/bootstrap.min.css" rel="stylesheet">

			<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<link type="text/css" rel="stylesheet" href="css/main.css">
			<link href="css/datepicker.css" rel="stylesheet">
			 <!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->

	</head>
	<body>
		<div class="container" style=" margin: 0 auto;">
		<div class = "col-sm-12 col-xs-12" >
						<div class="panel panel-default " style="margin:0 auto;width:100%; min-width:150px;">
							<div class="panel-heading">
								<h2 class="panel-title" align=center>Register a new product</h2>
							</div>
							<div class="panel-body">
								Please fill out the form below to register a new product for the UIG survey.<br />
								<div id="errorstatus" style="color:#AA4139;"></div>
								<br />
								<form class="form-horizontal" method="post" action="">
									<div class="col-xs-12 col-sm-6 ">
										<h2 class="panel-title"><b>General Product Information</b></h2><br />
										<div class="row" style="margin-bottom:5px;">
											<label for="inputName" class="col-sm-5 col-xs-6 control-label nopadding">Product Name</label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" id="tb1" name="inputName" placeholder="Name" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="inputEmail1" class="col-sm-5 col-xs-6 control-label nopadding">Version</label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" id="tb2" name="version" placeholder="Version" required />
											</div>
										</div>
										
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >Budget <span style="font-weight:normal;">(in 1000 € /year)</span></label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" id="tb3" name="budget" placeholder="Budget" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >Start Date <span style="font-weight:normal;">(dd/mm/yyyy)</span></label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" value="" data-date-format="dd/mm/yyyy" id="tb4" name="sdate" placeholder="Start Date" required />
											</div>
										</div>
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >End Date <span style="font-weight:normal;">(dd/mm/yyyy)</span></label>
											<div class="col-sm-7 col-xs-6">
												<input type="text" class="form-control" value="" data-date-format="dd/mm/yyyy" id="tb5" id="edate" name="edate" placeholder="End Date" required />
											</div>
										</div>
										<HR WIDTH="100%" SIZE="3" style=" border-width:2px;" > 
										<h2 class="panel-title"><b>Development Information</b></h2><br />
										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding">Team Size</label>
											<div class="col-sm-7 col-xs-6">
												<input type="number" class="form-control" id="tb6" name="groupsize" placeholder="No. of Team Members" required />
											</div>
										</div>

										<div class="row" style="margin-bottom:5px;">
											<label for="budget" class="col-sm-5 col-xs-6 control-label nopadding" >Sites</label>
											<div class="col-sm-7 col-xs-6">
												<input type="number" min="1" class=form-control id="tb9" name="teamno" placeholder="No. of Sites" required />
											</div>
										</div>
										

										<div class="row" style="margin-bottom:5px;">
											<label class="col-sm-5 col-xs-6 control-label nopadding">Team Role</label>
												<div class="col-sm-2 col-xs-2" style="padding-right:0; text-align:center; font-size:12px;">
													<input type="number" class="form-control" min="0" id="tb7" name="developers" placeholder="0" required />
													Developers <br />
												</div>
												<div class="col-sm-2 col-xs-2" style="padding-right:0; text-align:center; font-size:12px;">
													<input type="number" class="form-control" min="0" id="tb8" name="designers" placeholder="0" required />
													Designers <br />
												</div>
												<div class="col-sm-2 col-xs-2" style="padding-right:0; text-align:center; font-size:12px;">
													<input type="number" class="form-control" min="0" id="tb10" name="others" placeholder="0" required />
													Others <br />
												</div>
										</div>
										
										</div>
									<div class="col-xs-12 col-sm-6">
										<h2 class="panel-title"><b>Location Information</b></h2><br />
										<div>
											<table class="table-bordered table-striped table-condensed" id="teamallocation" align=center>
												
											</table>
										</div>
									</div>
									<div class="col-sm-12 col-xs-12">
										<div class="form-group" align=center>
												<input id="submit" type="button" class="btn btn-default" style="margin-bottom:-10px;" value="Add Product" />
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
				
			<!--Inclusions-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script>
		$(document).ready(function(){
			/*$('#dp2').datepicker();
			
		$('#dp2').datepicker()
				.on('changeDate', function(ev){
		$('#dp2').datepicker('hide');
		});
		//var checkin = $('#dp1').datepicker();
		$('#dp1').attr('value', "01/01/2014");
		var checkin = $('#dp1').datepicker()
				.on('changeDate', function(ev){
		$('#dp1').datepicker('hide');
		});*/
			$('#tb5').attr('value', "01/01/2015");
			$('#tb4').attr('value', "01/01/2015");

			var newDate;
			var checkin = $('#tb4').datepicker().on('changeDate', function(ev) {
			    newDate = new Date(ev.date)
			    newDate.setDate(newDate.getDate() + 1);
			    checkout.setValue(newDate);
			  checkin.hide();
			  $('#tb5')[0].focus();
			}).data('datepicker');
			var checkout = $('#tb5').datepicker({
			  onRender: function(date) {
			    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			  }
			}).on('changeDate', function(ev) {
			  checkout.hide();
			}).data('datepicker');
		
		$('#teamallocation').append('<tr><th>Location</th><th>No. of Employees</th></tr><tr><td style="padding:0;"><input type=text class="table-form nopadding" /></td><td style="padding:0;"><input type=text class="table-form nopadding" /></td></tr>');
				
				var count;	
				var stringsum="";

			$('#tb9').change(function(){
			$('#teamallocation').html("");
			count = parseInt($('#tb9').val());
			count1=count;
			var i = 0;
			$('#teamallocation').append('<tr><th class="addition">Location</th><th>No. of Employees</th></tr><tr><td style="padding:0;"><input type=text class="table-form nopadding" id="location'+i+'" /></td><td style="padding:0;"><input type=text class="table-form nopadding" id="locationno'+i+'" /></td></tr>');
			while(count1>1){
				i++;
			$('#teamallocation').append('<tr><td style="padding:0;"><input type=text class="table-form" id="location'+i+'" /></td><td style="padding:0;"><input type=text class="table-form" id="locationno'+i+'" /></td></tr>');
			count1-=1;
			}
			
		});

			

			$("#submit").click(function() {
				$("#errorstatus").html("");
				var counter=0;
				var valid=0;
				for(var i=1; i<11; i++){
					var check = "#tb"+i; 
					$(check).css("border", "");
					if($(check).val()==""){
						$(check).css("border", "solid 2px #AA4139");
						counter++;
					}
				}


				for(var i=0;i<count;i++){
				if($("#location"+i).val()!=0)
				stringsum=stringsum+$("#location"+i).val();
				if($("#locationno"+i).val()!=0)
				stringsum=stringsum+","+$("#locationno"+i).val()+";";
				}

				if(counter==0){
				var inputName1 = $("#tb1").val();
				var version1 = $("#tb2").val();
				var budget1 = $("#tb3").val();
				var dp11 = $("#tb4").val();
				var dp21 = $("#tb5").val();
				var groupsize1 = $("#tb6").val();
				var developers1 = $("#tb7").val();
				var designers1 = $("#tb8").val();
				var teamno1 = $("#tb9").val();
				var others1 = $("#tb10").val();
				var location1 = stringsum;

				queryStringNameValueArray = dp11.split("/");
				if (queryStringNameValueArray[0]>31 || queryStringNameValueArray[1]>12 || queryStringNameValueArray[2]<2000 ||
					!queryStringNameValueArray[1] || !queryStringNameValueArray[2]){
					$("#tb4").css("border", "solid 2px #AA4139");
					valid=1;
					$("#errorstatus").html("");
					$("#errorstatus").html("**Invalid Date!");
				}

				queryStringNameValueArray = dp21.split("/");
				if (queryStringNameValueArray[0]>31 || queryStringNameValueArray[1]>12 || queryStringNameValueArray[2]<2000 |
					!queryStringNameValueArray[1] || !queryStringNameValueArray[2]){
					$("#tb5").css("border", "solid 2px #AA4139");
					valid=1;
					$("#errorstatus").html("");
					$("#errorstatus").html("**Invalid Date!");
				}
					var total = parseInt(others1)+parseInt(designers1)+parseInt(developers1);
				if(total!=groupsize1)
				{
					$("#tb6,#tb7,#tb8,#tb10").css("border", "solid 2px #AA4139");
					console.log(total);
					console.log(groupsize1);
					if(valid==1)
					$("#errorstatus").append("<br />**Team Size should be equal to the sum of Team Roles ");
					else{
					$("#errorstatus").append("**Team Size should be equal to the sum of Team Roles ");
					valid=1;
				}
				}

				if(valid==0){
					var sdatesplit = dp11.split("/");
				dp11 = sdatesplit[2]+"-"+sdatesplit[1]+"-"+sdatesplit[0];

					var edatesplit = dp21.split("/");
				dp21 = edatesplit[2]+"-"+edatesplit[1]+"-"+edatesplit[0];

				$.post("form.php", {

					inputName: inputName1,
					version: version1,
					budget: budget1,
					dp1: dp11,
					dp2: dp21,
					groupsize: groupsize1,
					developers: developers1,
					designers: designers1,
					teamno: teamno1,
					others: others1,
					location: location1,
					}, function(data) {
						if (parseInt(data)==1){
							$("#errorstatus").html("");
							$("#errorstatus").html("**Start Date should be less than End Date!");
							$("#tb4").css("border", "solid 2px #AA4139");
							$("#tb5").css("border", "solid 2px #AA4139");
						}
						else if (parseInt(data)==2){
							$("#errorstatus").html("");
							$("#errorstatus").html("**Product already exists!");
							$("#tb1").css("border", "solid 2px #AA4139");
							$("#tb2").css("border", "solid 2px #AA4139");
						}
						else{
							alert(data);
							window.location.href = "mp.php?reset=1";
							}
					});

				/*$.ajax({
							type: "POST",
							url: "form.php",
							data: 'inputName='+inputName1+'&version='+version1+'&budget='+budget1+'&dp1='+dp11+'&dp2='+dp21+'&groupsize='+groupsize1+'&developers='+developers1+'&designers='+designers1+'&teamno='+teamno1,
							success: function(data){
								alert("Product added !");
							}
						});*/
							}
						}
					else{
						$("#errorstatus").html("");
						$("#errorstatus").html("**Please fill in all fields!");
					}
				});
			});

		</script>
		</body>
</html>