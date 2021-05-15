<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************


$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	/* Connect To Database*/
	define("_VALID_PHP", true);
	require_once("../../init.php");
	
	
	//updates

	if (empty($_POST['edit_id_courier'])){
	
	} elseif (!empty($_POST['edit_id_courier'])){
	

	
	$id=intval($_POST['edit_id_courier']);	
	


	$sql="UPDATE detail_addcourier SET detail_description='".$detail_description."', detail_weight='".$detail_weight."', detail_length='".$detail_length."', detail_width='".$detail_width."', detail_height='".$detail_height."', detail_qnty='".$detail_qnty."', detail_vol='".$detail_volume."'  WHERE id='".$id."'";
	$update=mysqli_query($con,$sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "The product has been updated successfully.";
	} else {
		$errors[] = "Sorry, the update failed. Please, come back and try again.";
	}
		
	} else 
	{
		$errors[] = "desconocido.";
	}
	if (isset($errors)){
			
		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php
		}
		if (isset($messages)){
			
			?>
			<div class="alert alert-success" role="alert" id="success-alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
					<strong>¡Well done!</strong>
					<?php
						foreach ($messages as $message) {
								echo $message;
							}
						?>
			</div>
			<?php
		}

	
	$query=mysqli_query($con,"select * from add_courier order by qid");

	while($row=mysqli_fetch_array($query)){
	
		$qid=$row['qid'];
		$order_inv=$row['order_inv'];

		
	?>

	<a href="#edit_shipment"  data-target="#edit_shipment" class="edit" data-toggle="modal" data-qid='<?php echo $qid;?>' data-order_inv="<?php echo $order_inv;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a> 

	<?php
			
	}
	?>
<?php

}