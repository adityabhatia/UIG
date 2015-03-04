<?php
	
	session_start();
	require("connect.php");


	//UTILS
	$array_agility = array("v_74","v_75","v_76","v_77","v_78","v_79","v_80","v_81","v_201","v_202","v_203","v_204","v_205");
	$array_ui = array("v_206","v_183","v_184","v_185","v_188","v_189","v_190","v_191","v_192"); //9/6
	$array_team = array("v_93","v_94","v_95","v_96","v_97","v_98","v_99","v_100","v_101","v_116","v_117","v_118","v_119","v_120","v_121","v_122","v_123","v_124","v_125","v_127");//21/20!!!!!
	$array_org = array("dupl2_v_93","dupl2_v_94","dupl1_v_95","dupl1_v_96"); //4/5


	$agility_absolute = 0;
	$team_absolute = 0 ;
	$ui_absolute = 0;
	$org_absolute = 0;

	$value_agility = 0;
	$value_ui = 0;
	$value_team = 0;
	$value_org = 0;

	$product_id = 43;

	
	//SELECT FROM DB
	$query = "SELECT * FROM `data` WHERE `p_0001`=$product_id";
	$result= mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);


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

	$value_agility = $agility_absolute/$count;
	$value_ui = $ui_absolute/$count;
	$value_team = $team_absolute/$count;
	$value_org = $org_absolute/$count;

	$agility = ($value_agility/65) * (100/4);
	$ui = ($value_ui/30) * (100/4);
	$team = ($value_team/100) * (100/4);
	$org = ($value_org/20) * (100/4);



	$arr = array ('item1'=>$agility,'item2'=>$ui,'item3'=>$team, 'item4'=>$org, 'item5'=>$value_agility, 'item6'=>$value_ui, 'item7'=>$value_team, 'item8'=>$value_org);
	echo json_encode($arr);

?>