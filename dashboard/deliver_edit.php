<?php

	/* Connect To Database*/
	define("_VALID_PHP", true);
	require_once("../init.php");
		
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id'])) {
           $errors[] = "ID empty";
        } else if (empty($_POST['deliver_date'])){
			$errors[] = "Delivery date empty";
		} else if (empty($_POST['delivery_hour'])){
			$errors[] = "Delivery hour empty";
		} else if (empty($_POST['person_receives'])){
			$errors[] = "Receives empty";
		} else if (empty($_POST['name_employee'])){
			$errors[] = "Employee empty";
		} else if (empty($_POST['act_status'])){
			$errors[] = "Status empty";
		} else if (empty($_POST['status_courier'])){
			$errors[] = "Status Courier empty";	
			
		}   else if (
			!empty($_POST['id']) &&
			!empty($_POST['deliver_date']) && 
			!empty($_POST['delivery_hour']) &&
			!empty($_POST['person_receives']) &&
			!empty($_POST['name_employee']) &&
			!empty($_POST['act_status']) &&
			!empty($_POST['status_courier']) 
			
		){	
		
			// escaping, additionally removing everything that could be (html/javascript-) code
			$deliver_date = mysqli_real_escape_string($con,(strip_tags($_POST["deliver_date"],ENT_QUOTES)));
			$delivery_hour = mysqli_real_escape_string($con,(strip_tags($_POST["delivery_hour"],ENT_QUOTES)));
			$person_receives = mysqli_real_escape_string($con,(strip_tags($_POST["person_receives"],ENT_QUOTES)));
			$name_employee = mysqli_real_escape_string($con,(strip_tags($_POST["name_employee"],ENT_QUOTES)));
			$act_status = mysqli_real_escape_string($con,(strip_tags($_POST["act_status"],ENT_QUOTES)));
			$status_courier = mysqli_real_escape_string($con,(strip_tags($_POST["status_courier"],ENT_QUOTES)));
			
			$id=intval($_POST['id']);
			
			if(isset($_POST['sig-dataUrl'])) {

				$img = $_POST['sig-dataUrl']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
				$img = str_replace('data:image/png;base64,', '', $img);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				file_put_contents('doc_signs/'.$id.'.png', $data);

			}

			// UPDATE data into database
			$sql = "UPDATE add_courier SET deliver_date='".$deliver_date."', delivery_hour='".$delivery_hour."', person_receives='".$person_receives."', name_employee='".$name_employee."',  act_status='".$act_status."', status_courier='".$status_courier."' WHERE id='".$id."' ";
			$query = mysqli_query($con,$sql);
			// if product has been added successfully
			if ($query) {
				$messages[] = "The shipment has been delivered successfully..";
			} else {
				$errors[] = "Sorry, the update failed. Please come back and try again.";
			}
		
		}else{
			$errors[] = "desconocido.";
		}
	
	if (isset($errors)){
			
	?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error!</strong> 
			<?php
			foreach ($errors as $error) {
					echo $error;
				}
			?>
		</div>
	<?php
	}
	if (isset($messages)){ ?>
		<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Well done!</strong>
			<?php
				foreach ($messages as $message) {
						echo $message;
					}
				?>
		</div>
	<?php } ?>			