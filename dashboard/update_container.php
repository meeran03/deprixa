<?php
 define("_VALID_PHP", true);
 require_once("../init.php");

if(isset($_POST['detail_container'])){
	
	$detail_container	=	sanitize($_POST['detail_container']);		
	$price				=	sanitize($_POST['price']);
	$detail_qty			=	sanitize($_POST['detail_qty']);				
	$detail_weight		= 	sanitize($_POST['detail_weight']);					
	$total				= 	$detail_qty*$price;
	$id = $_POST['id'];

	//  query to update data 
	
	$db->query("UPDATE detail_container SET detail_container='$detail_container', detail_weight='$detail_weight', detail_qty='$detail_qty', price='$price', tprice='$total' WHERE id='$id'");
	if($db){
		echo  alert("<strong><center>The data was updated successfully</center></strong>"); 
	}

}
?>