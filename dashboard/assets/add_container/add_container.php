<?php
	define("_VALID_PHP", true);
	require_once("../../../init.php");

		$data = json_decode(file_get_contents("php://input"));  
		 if(count($data) > 0)  
		 {  
			$tracking = mysqli_real_escape_string($db, $data->tracking);       
			$idcon = mysqli_real_escape_string($db, $data->idcon);
			$username = mysqli_real_escape_string($db, $data->username);
			$r_name = mysqli_real_escape_string($db, $data->r_name);
			$r_email = mysqli_real_escape_string($db, $data->r_email);
			$r_address = mysqli_real_escape_string($db, $data->r_address);
			$r_phone = mysqli_real_escape_string($db, $data->r_phone);
			$r_dest = mysqli_real_escape_string($db, $data->r_dest);
			$r_city = mysqli_real_escape_string($db, $data->r_city);
			$r_postal = mysqli_real_escape_string($db, $data->r_postal);
			$origin_port = mysqli_real_escape_string($db, $data->origin_port);
			$destination_port = mysqli_real_escape_string($db, $data->destination_port);
			$s_week = mysqli_real_escape_string($db, $data->s_week);
			$expiration_date = mysqli_real_escape_string($db, $data->expiration_date);
			$package = mysqli_real_escape_string($db, $data->package);
			$courier = mysqli_real_escape_string($db, $data->courier);
			$ship_mode = mysqli_real_escape_string($db, $data->ship_mode);
			$deli_time = mysqli_real_escape_string($db, $data->deli_time);
			$status_courier = mysqli_real_escape_string($db, $data->status_courier);
			$incoterms = mysqli_real_escape_string($db, $data->incoterms);
			$pay_mode = mysqli_real_escape_string($db, $data->pay_mode);
			$r_curren = mysqli_real_escape_string($db, $data->r_curren);
			$r_tax = mysqli_real_escape_string($db, $data->r_tax);
			$r_insurance = mysqli_real_escape_string($db, $data->r_insurance);
			$s_description = mysqli_real_escape_string($db, $data->s_description);
			$length = mysqli_real_escape_string($db, $data->length);
			$width = mysqli_real_escape_string($db, $data->width);
			$height = mysqli_real_escape_string($db, $data->height);
			$n_weight = mysqli_real_escape_string($db, $data->n_weight);
			$g_weight = mysqli_real_escape_string($db, $data->g_weight);
			
			$sql = "INSERT INTO tbl_user(tracking, idcon, username, r_name, r_email, r_address, r_phone, r_dest, r_city, r_postal, origin_port, destination_port, s_week, expiration_date, package,
											courier, ship_mode, deli_time, status_courier, incoterms, pay_mode, r_curren, r_tax, r_insurance, s_description, length, width, height, n_weight, g_weight) VALUES 
											('$tracking','$idcon','username','$r_name','$r_email','$r_address','$r_phone','$r_dest','$r_city','$r_postal','$origin_port','$destination_port','$s_week','$expiration_date',
											'$package','$courier','$ship_mode','$deli_time','$status_courier','$incoterms','$pay_mode','$r_curren','$r_tax','$r_insurance','$s_description','$length','$width','$height','$n_weight','$g_weight')";  
			  $query = $db->query($sql);  

			 if($query){
					 echo "Data Inserted...";
				}
				else{
					 echo 'Error';  
				} 
		 }  
		
?>