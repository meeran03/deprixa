<?php
 define("_VALID_PHP", true);
 require_once("../init.php");

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