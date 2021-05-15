<?php

	define("_VALID_PHP", true);
	require_once("../../../init.php");
	
	$data = json_decode(file_get_contents("php://input"));
	 
	  $out = array('error' => false);
	 
	  foreach ($data as $key => $value) {
		$sql = "DELETE FROM detail_container_tmp WHERE id = '".$value."'";
		$query = $db->query($sql);
	  }
	 
	  if($query){
		$out['message'] = "Item deleted Successfully";
	  }
	  else{
		$out['error'] = true;
		$out['message'] = "Something went wrong. Cannot deleteItem";
	  }
	 
	  echo json_encode($out);

?>