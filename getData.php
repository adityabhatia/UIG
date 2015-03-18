<?php
	
	session_start();
	require("connect.php");


	//INTERNAL
	$array_agility = array("v_74","v_75","v_76","v_77","v_78","v_79","v_80","v_81","v_201","v_202","v_203","v_204","v_205");
	$array_ui = array("v_206","v_183","v_184","v_185","v_188","v_189","v_190","v_191","v_192");
	$array_team = array("v_93","v_94","v_95","v_96","v_97","v_98","v_99","v_100","v_101","v_116","v_117","v_118","v_119","v_120","v_121","v_122","v_123","v_124","v_125","v_127");
	$array_org = array("dupl2_v_93","dupl2_v_94","dupl1_v_95","dupl1_v_96"); //4/5

	$agility_absolute = 0;
	$team_absolute = 0 ;
	$ui_absolute = 0;
	$org_absolute = 0;

	$value_agility = 0;
	$value_ui = 0;
	$value_team = 0;
	$value_org = 0;

	//EXTERNAL
	$array_sus = array("v_63","v_64","v_65","v_66","v_67","v_68","v_69","v_70","v_71","v_72");
	$array_usefullness = array("v_84","v_85","v_86","v_87","v_88","v_89");
	$array_satisfaction = array("v_76","v_90","v_78","v_79","v_80","v_95");

	$sus_absolute = 0;
	$usefullness_absolute = 0;
	$intention_absolute = 0;
	$satisfaction_absolute = 0;

	$value_sus = 0;
	$value_usefullness = 0;
	$value_intention = 0;
	$value_satisfaction = 0;


	//PRODUCT
	$product_id = $_GET['product_id'];

	
	//SELECT FROM DB
	$query = "SELECT * FROM `data` WHERE `p_0001`=$product_id";
	$result= mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);

	$queryExt = "SELECT * FROM `externaldata` WHERE `p_0001`=$product_id";
	$resultExt= mysql_query($queryExt) or die(mysql_error());
	$countExt = mysql_num_rows($resultExt);

	//GET INTERNAL UNIPARK DATA
	while($row = mysql_fetch_array($result)){
		foreach ($array_agility as $value) {
			if($row[$value]>0){
				$agility_absolute += $row[$value];
			}
			else{
				$agility_absolute += 2.5;

			}

		}
	
		foreach ($array_ui as $value) {
			
			if($row[$value]>0){
				$ui_absolute += $row[$value];
			}
			else{
				$ui_absolute += 2.5;

			}	

		}

		foreach ($array_team as $value) {
			
			if($row[$value]>0){
				$team_absolute += $row[$value];
			}
			else{
				$team_absolute += 2.5;

			}	

		}

		foreach ($array_org as $value) {
			if($row[$value]>0){
				$org_absolute += $row[$value];
			}
			else{
				$org_absolute += 2.5;

			}	
		}

	
	}
	//GET EXTERNAL UNIPARK DATA
	while($row2 = mysql_fetch_array($resultExt)){
		foreach ($array_sus as $value) {
			if($row2[$value]>0){
				$sus_absolute += $row2[$value];
			}
			else{
				$sus_absolute += 2.5;

			}

		}
	
		foreach ($array_usefullness as $value) {
			
			if($row2[$value]>0){
				$usefullness_absolute += $row2[$value];
			}
			else{
				$usefullness_absolute += 2.5;

			}	

		}

		foreach ($array_intention as $value) {
			
			if($row2[$value]>0){
				$intention_absolute += $row2[$value];
			}
			else{
				$intention_absolute += 2.5;

			}	

		}

		foreach ($array_satisfaction as $value) {
			if($row2[$value]>0){
				$satisfaction_absolute += $row2[$value];
			}
			else{
				$satisfaction_absolute += 2.5;

			}	
		}


	}

	//EXTERNAL VALUES
	$value_agility = $agility_absolute/$count;
	$value_ui = $ui_absolute/$count;
	$value_team = $team_absolute/$count;
	$value_org = $org_absolute/$count;

	$agility = ($value_agility/65) * (25);
	$ui = ($value_ui/46) * (25);
	$team = ($value_team/100) * (25);
	$org = ($value_org/20) * (25);


	//INTERNAL VALUES


	$value_sus = $sus_absolute/$countExt;
	$value_usefullness = $usefullness_absolute/$countExt;
	$value_satisfaction = $satisfaction_absolute/$countExt;

	$sus = ($value_sus/100)*(50);
	$usefullness = ($value_usefullness/30)*25;
	$satisfaction = ($value_satisfaction/30)*25;

	

	//RESPONSE BODY JSON
	$arr = array ('item1'=>$agility,'item2'=>$ui,'item3'=>$team, 'item4'=>$org, 'item5'=>$sus, 'item6'=>$usefullness, 'item7'=>$satisfaction, 'item8'=> $count, 'item9'=>$countExt);
	echo json_encode($arr);

?>