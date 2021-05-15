<?php
if (isset($_GET['term'])){
 # I will connect the database
 include_once '../lib/dbcontroller.php';
$db_handle = new DBController();

$return_arr = array();

$sqlc = "SELECT  * FROM users WHERE  fname like '%".$_GET['term']."%' AND userlevel=1 LIMIT 15";

$faq = $db_handle->runQuery($sqlc);

foreach($faq as $k=>$v) {
/*Recover and store the results of the query together.*/		
	$row_array['value'] = $faq[$k]['fname'];
	$row_array['fname']=$faq[$k]['fname'];
	
	$row_array['idx']=$faq[$k]['id'];
	$row_array['searchnames']=$faq[$k]['fname'];
	$row_array['users']=$faq[$k]['username'];
	$row_array['mail']=$faq[$k]['email'];
	$row_array['phones']=$faq[$k]['phone'];
	$row_array['citys']=$faq[$k]['city'];
	$row_array['zones']=$faq[$k]['country'];
	$row_array['zips']=$faq[$k]['postal'];
	
	array_push($return_arr,$row_array);
}
/* Encode the array result in JSON. */
echo json_encode($return_arr);
}
?>