<?php
 define("_VALID_PHP", true);
 require_once("../init.php");


 if(isset($_POST['inspect_id'])){
	
	$inspect_id	=	sanitize($_POST['inspect_id']);		
	$return_id		=	sanitize($_POST['return_id']);
	$discard_id		=	sanitize($_POST['discard_id']);				
	$inspect_price		= 	sanitize($_POST['inspect_price']);					
	$return_price		= 	sanitize($_POST['return_price']);
	$discard_price		= 	sanitize($_POST['discard_price']);
	$id = $_POST['id'];
	

	//  query to update data 
	
	$db->query("UPDATE add_courier SET inspect_id='$inspect_id', return_id='$return_id', discard_id='$discard_id', inspect_price='$inspect_price', discard_price='$discard_price',  return_price='".$return_price."' WHERE id='$id'");

	echo'<script type="text/javascript">
        alert("<strong><center>The data was updated successfully</center></strong>");
        window.location.href="#";
        </script>';

}

if(isset($_POST['detail_description'])){
	
	$detail_description	=	sanitize($_POST['detail_description']);		
	$detail_qnty		=	sanitize($_POST['detail_qnty']);
	$detail_weight		=	sanitize($_POST['detail_weight']);				
	$detail_length		= 	sanitize($_POST['detail_length']);					
	$detail_width		= 	sanitize($_POST['detail_width']);
	$detail_height		= 	sanitize($_POST['detail_height']);
	$id = $_POST['id'];
	
	//Calculate weight Volumetric
	$l= sanitize($_POST['detail_length']); 
	$w= sanitize($_POST['detail_width']); 
	$h= sanitize($_POST['detail_height']);
	$z=$l*$w*$h/$core->meter;
	
	$detail_volume= "".round_out($z)."";

	//  query to update data 
	
	$db->query("UPDATE detail_addcourier SET detail_description='$detail_description', detail_qnty='$detail_qnty', detail_weight='$detail_weight', detail_length='$detail_length', detail_width='$detail_width', detail_height='$detail_height', detail_vol='".$detail_volume."' WHERE id='$id'");

	echo'<script type="text/javascript">
        alert("<strong><center>The data was updated successfully</center></strong>");
        window.location.href="#";
        </script>';

}
?>