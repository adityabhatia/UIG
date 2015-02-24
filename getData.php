<?php
	
	session_start();
	require("connect.php");


	//UTILS
	$array_agility = array("v_74","v_75","v_76","v_77","v_78","v_79","v_80","v_81","v_201","v_202","v_203","v_204","v_205");
	$array_ui = array("v_206","v_183","v_184","v_185","v_188","v_189","v_190","v_191","v_192");
	$array_team = array("v_93","v_94","v_95","v_96","v_97","v_98","v_99","v_100","v_101","v_116","v_117","v_118","v_119","v_120","v_121","v_122","v_123","v_124","v_125","v_126","v_127");
	$array_org = array("dupl2_v_93","dupl2_v_94","dupl1_v_95","dupl1_v_96");


	$value_agility = 0;
	$value_ui = 0;
	$value_team = 0;
	$value_org = 0;

	$product_id = 19;

	
	//SELECT FROM DB
	$query = "SELECT * FROM `data` WHERE `p_0001`=$product_id";
	$result= mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);


	while($row = mysql_fetch_array($result)){

		foreach ($array_agility as $value) {
			if($row[$value]>0){
				$value_agility += $row[$value];
			}
			
		}

		foreach ($array_ui as $value) {
			
			if($row[$value]>0){
				$value_ui += $row[$value];
			}

		}

		foreach ($array_team as $value) {
			
			if($row[$value]>0){
				$value_team += $row[$value];
			}

		}

		foreach ($array_org as $value) {
			if($row[$value]>0){
				$value_org += $row[$value];
			}
		}

	
	}

	$value_agility = $value_agility/$count;
	$value_ui = $value_ui/$count;
	$value_team = $value_team/$count;
	$value_org = $value_org/$count;

	$agility = ($value_agility/65) * (100/4) *(2/3);
	$ui = ($value_ui/30) * (100/4) *(2/3);
	$team = ($value_team/100) * (100/4) *(2/3);
	$org = ($value_org/20) * (100/4) *(2/3);



	$arr = array ('item1'=>$value_agility,'item2'=>$value_ui,'item3'=>$value_team, 'item4'=>$value_org);
	echo json_encode($arr);

?>