<?php

	define("_VALID_PHP", true);
	require_once("../../../init.php");
	
	$output = array();
	$sql = "SELECT * FROM detail_container_tmp WHERE act_status=3";
	$query=$db->query($sql);
	while($row=$query->fetch_array()){
		$output[] = $row;
	}

	echo json_encode($output);
?>