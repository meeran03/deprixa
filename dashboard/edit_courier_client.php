<?php

  define("_VALID_PHP", true);
  require_once("../init.php");
  

	$row = $user->getUserData();
	$subs = $services->getBuySubServices();
	$inspect;
	$return;
	$discard;
	foreach ($subs as $service) {
		if ($service->name == "Inspection" ) {
			$inspect = $service;
		}
		else if ($service->name == "Discard" ) {
			$discard = $service;
		}
		else {
			$return = $service;
		}
	}
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title><?php echo $lang['edit-courier1'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/extra-libs/prism/prism.css">

</head>

<body>

    <div id="main-wrapper">
		<!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        
		<?php include 'preloader.php'; ?>
		
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
	
        <?php include 'topbar.php'; ?>
		
        <!-- End Topbar header -->

		
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
		<?php include 'left_sidebar.php'; ?>
	
	
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
		
		<!-- General queries to the database  -->		   

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->			
			<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
						<?php echo $lang['add-title1'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> - <?php echo $row->postal;?></b></br>
						<?php echo $lang['add-title2'] ?> <b><?php echo $row->fname;?> <?php echo $row->lname;?></b>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>

			<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
				<?php switch(Filter::$action): case "ship": ?>
				<?php  $roww = Core::getRowById(Core::cTable, Filter::$id);
				
				$total = $roww->receive_price;
				;?>
				<!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form id="admin_form" method="post">
                                <div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-lg-6">
											<h4 class="card-title"><i class="mdi mdi-information-outline" style="color:#36bea6"></i>Package Information</h4>
										</div>
									</div>		
                                </div>
                                <hr>
                                <div class="form-body">
									<div class="row">
										<div class="col-sm-12 col-lg-6" style="display:none">
											<div class="card-body">
												<hr>
											<div class="col-12 col-sm-4 col-md-4" style="display:none">
													<div class="form-group">
														<label for="inputname" class="control-label col-form-label">Staff Role*</label>
														<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputname" class="control-label col-form-label">Sender Name</label>
															<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $roww->s_name;?>" placeholder="<?php echo $lang['edit-courier4'] ?>">
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-sm-12 col-md-4">
														<div class="form-group">
															<label for="inputname" class="control-label col-form-label">User Name</label>
															<input type="text" class="form-control is-valid" name="username" value="<?php echo $roww->username;?>" placeholder="User Name Here">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputEmail3" class="control-label col-form-label">Addres</label>
															<input type="text" class="form-control is-valid" name="address" value="<?php echo $roww->address;?>" placeholder="Address">
														</div>
													</div>
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label">Phone</label>
															<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->phone;?>" placeholder="Phone">
														</div>
													</div>
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputEmail3" class="control-label col-form-label">Origin</label>
															<input type="text" class="form-control is-valid" name="country" value="<?php echo $roww->country;?>" placeholder="Origin">
														</div>
													</div>                                       
												</div>
												<div class="row"> 
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label">City</label>
															<input type="text" class="form-control is-valid" name="city" value="<?php echo $roww->city;?>" placeholder="City">
														</div>
													</div>
												
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
															<input type="text" class="form-control is-valid" name="postal" value="<?php echo $roww->postal;?>" placeholder="Postal Code">
														</div>
													</div>
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label">Email</label>
															<input type="email" class="form-control is-valid" name="email" value="<?php echo $roww->email;?>" placeholder="Email">
														</div>
													</div>
												</div>
											</div>
										</div>
																			
										
										<div class="col-sm-12 col-lg-12">
											<div class="card-body">
												<div class="row">


												<div class="row">
												
											
												<div class="col-sm-12 col-md-12 hide">
													<div class="form-group">											
														<!-- display google map -->
														<div id="geomap" style="height: 200px"></div>
													</div>
												</div>
											</div>

                                                <div class="col-sm-12 col-md-6">
														<label for="inputname" class="control-label col-form-label">Sender Name</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
															</div>
															<input readonly type="text" class="form-control" id="searchnames"  name="r_name" value="<?php echo $roww->r_name;?>" readonly>
														</div>
                                                </div>
													<div class="col-sm-12 col-md-4">
														<div class="form-group">
															<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title17'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
															<input readonly class="custom-select col-12" name="package" list="browsers1" autocomplete="off" required="required" value="<?php if(isset($roww->package)){echo  $roww->package;}?>">
															<datalist id="browsers1">
																<?php 
																$packrow = $core->getPack();
																foreach ($packrow as $rows):?>
																<option value="<?php echo $rows->name_pack; ?>"><?php echo $rows->name_pack; ?></option>
																<?php endforeach;?>
															</datalist>	
														</div>
													</div>
													<!--/span-->

													<div class="col-sm-12 col-md-4">
														<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title15'] ?></i></label>
														<div class="input-group">
															<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
																	<div class="input-group-text"><i style="color:#ff0000" class="fa fa-calendar"></i></div>
																</div>
															<input readonly type='text' class="form-control" id='datetimepicker1' name="collection_courier" placeholder="<?php echo $lang['edit-courier11'] ?>" value="<?php echo $roww->collection_courier;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
														</div>
													</div>
													
						
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-4">
														<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title18'] ?></label>
														<div class="input-group">
															<input readonly class="custom-select col-12" name="courier" list="browsers2" autocomplete="off" required="required" value="<?php if(isset($roww->courier)){echo  $roww->courier;}?>">
															<datalist id="browsers2">
																<?php 
																$courierrow = $core->getCouriercom();
																foreach ($courierrow as $rows):?>
																<option value="<?php echo $rows->name_com; ?>"><?php echo $rows->name_com; ?></option>
																<?php endforeach;?>
															</datalist>
														</div>
													</div>	
													<!--/span-->
											
													
												
													<!--/span-->
												</div>
												
												<div class="row">
												
													<!--/span-->
	
													<div class="col-sm-12 col-md-6">
														<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title19'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
														<div class="input-group">
															<input class="custom-select col-12" readonly  name="status_courier" value="<?php if(isset($roww->status_courier)){echo  $roww->status_courier;}?>" list="browserstatus" autocomplete="off" required="required">
															<datalist id="browserstatus">
																<?php 
																$statusrow = $core->getStatus();
																foreach ($statusrow as $rows):?>
																<?php if($row->mod_style == 'Delivered'){?>
																<?php }elseif($row->mod_style == 'Pending'){?>
																<?php }elseif($row->mod_style == 'Rejected'){?>
																<?php }elseif($row->mod_style == 'Pick up'){?>
																<?php }elseif($row->mod_style == 'Picked up'){?>
																<?php }elseif($row->mod_style == 'No Picked up'){?>
																<?php }elseif($row->mod_style == 'Consolidate'){?>
																<?php }else{ ?>
																<option value="<?php echo $rows->mod_style; ?>"><?php echo $rows->mod_style; ?></option>
																<?php } ?>
																<?php endforeach;?>
															</datalist>
														</div>
													</div>	
													<!--/span-->
												</div>
												<!--/row-->
										
												<div class="row"> 
													<div class="col-sm-12 col-md-6">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title27'] ?></label>
														<div class="input-group">
															<input readonly class="form-control" name="itemcat" value="<?php if(isset($roww->itemcat)){echo  $roww->itemcat;}?>" list="browsers4" autocomplete="off" required="required">
															<datalist id="browsers4">
																<?php 
																$itemrow = $core->getItem();
																foreach ($itemrow as $rows):?>
																<option value="<?php echo $rows->name_item; ?>"><?php echo $rows->name_item; ?></option>
																<?php endforeach;?>
															</datalist>
														</div>
													</div> 
													<div class="col-sm-12 col-md-6">
														<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title28'] ?></label>
														<div class="input-group">
															<input readonly type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title30'] ?>" class="form-control" name="r_qnty" value="<?php echo $roww->r_qnty;?>" readonly>
														</div>
													</div>
													
													<div class="col-sm-12 col-md-12">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
														<div class="input-group">
															 <textarea readonly class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"><?php if(isset($roww->r_description)){echo  $roww->r_description;}?></textarea>
														</div>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>								
								
								<?php $prefix = $courier->order_prefix();?>

								<div class="col-sm-12 col-lg-12">
									<div class="card-body">
										<h4 class="card-title"> <?php echo $lang['left212'] ?></h4>
										<div class="row">																		
											<div class="col-md-12">	
												<div class="table-responsive">
													<table class="table table-hover"  id="tabla">
														<thead class="bg-darks border-0 text-white">
															<tr class="row100 head">
																<th class='text-center'><b><?php echo $lang['left215'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left216'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left217'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left218'] ?></b></th>
																<th style="width: 10%;" class='text-center'><b><?php echo $lang['left219'] ?></b></th>
															</tr>
														</thead>
														<tbody>
												
															<tr id="<?php echo $roww->id; ?>" class="fixed-row">
																<td data-target="detail_weight" class='text-center'><?php echo $roww->r_weight;?></td>
																<td data-target="detail_length" class='text-center'><?php echo $roww->length;?></td>
																<td data-target="detail_width" class='text-center'><?php echo $roww->width;?></td>
																<td data-target="detail_height" class='text-center'><?php echo $roww->height;?></td>
																<td data-target="detail_vol" class='text-center'><?php echo $roww->v_weight;?></td>
															</tr>
														
															<?php echo "<script>console.log(".json_encode($roww).");</script>"; ?>
															<tr  >
																<td colspan="12">
																	<h4>Active Services</h4>
																	<div class="row align-items-center "  >

																		<span class="col-4" >Inspection</span>																	
																		<span class="col-4" > 
																			<span class="btn btn-primary"><?php echo $roww->inspect_id == $inspect->id ? "AVAILED" : "NOT AVAILED" ; ?></span>																	
																		</span>

																	<?php 
																	
																	if ($roww->inspect_id == $inspect->id) {
																		if ($roww->inspect_upload == "") {
																		echo   '<span class="col-4" > 
																					<span class="btn btn-primary">Waiting For Upload</span>																	
																				</span>';
																		} 
																		else {
																		echo   '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#save_invoice_modal_inspect" data-whatever="@mdo">
																					<span class="mdi mdi-book-plus"></span>See Documents
																				</button>';
																		}
																	}

																	?>


																	</div>
																	<div class="row align-items-center "  >
																		<span class="col-4" >Return</span>																	
																		<span class="col-4" > 
																		<span class="btn btn-primary"><?php echo $roww->return_id == $return->id ? "AVAILED" : "NOT AVAILED" ; ?></span>																	
																		</span>

																		<?php 
																		
																		if ($roww->return_id == $return->id) {
																			if ($roww->return_upload == "") {
																			echo   '<span class="col-4" > 
																						<span class="btn btn-primary">Waiting For Upload</span>																	
																					</span>';
																			} 
																			else {
																			echo   '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#save_invoice_modal_return" data-whatever="@mdo">
																						<span class="mdi mdi-book-plus"></span>See Documents
																					</button>';
																			}
																		}

																	?>

																	</div>
																	<div class="row align-items-center "  >
																		<span class="col-4" >Discard</span>																	
																		<span class="col-4" > 
																		<span class="btn btn-primary"><?php echo $roww->discard_id == $discard->id ? "AVAILED" : "NOT AVAILED" ; ?></span> 										
																		</span>

																		<?php 
																		
																		if ($roww->discard_id == $discard->id) {
																			if ($roww->discard_upload == "") {
																			echo   '<span class="col-4" > 
																						<span class="btn btn-primary">Waiting For Upload</span>																	
																					</span>';
																			} 
																			else { 
																			echo   '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#save_invoice_modal_discard" data-whatever="@mdo">
																						<span class="mdi mdi-book-plus"></span>See Documents
																					</button>';
																			}
																		}

																	?>
																	</div>
																</td>
															
																
														
															</tr>

															<tr >
																<td colspan="12">
																	<h4>Total Service Charges</h4>

																	<div class="row align-items-center "  >

																

																	<?php 
																	
																		
																	echo   '<span class="col-4" >Receive</span>																	
																			<span class="col-4" > 
																				<span class="btn btn-primary">'.$core->currency." " .$roww->receive_price.'</span>																	
																			</span><br>';
																	

																	?>	


																	</div>
																	<div class="row align-items-center "  >

																

																	<?php 
																		if ($roww->inspect_id != "") {
																			$total += $roww->inspect_price;
																		echo   '<span class="col-4" >Inspection</span>																	
																				<span class="col-4" > 
																					<span class="btn btn-primary">'.$core->currency." " .$roww->inspect_price.'</span>																	
																				</span>';
																		}

																	?>


																	</div>

																	<div class="row align-items-center "  >

																	

																	<?php 
																		if ($roww->return_id != "") {
																			$total += $roww->return_price;
																		
																		echo   '<span class="col-4" >Return</span>																	
																				<span class="col-4" > 
																					<span class="btn btn-primary">'.$core->currency." " .$roww->return_price.'</span>																	
																				</span>';
																		}

																	?>


																	</div>
																		<hr>
																	<div class="row align-items-center "  >

																	

																	<?php 
																		
																		echo   '<span class="col-4 h5" >Total</span>																	
																				<span class="col-4" > 
																					<span class="pill">'.$core->currency." " .$total.'</span>																	
																				</span>';


																		?>
																	</div>
																</td>
															
																
														
															</tr>

															<tr><td colspan='12'><br><br></td></tr>
															<tr>
																<td colspan='12'>
																
																<div class="row">
																	<div class="col-lg-12 col-xl-4">
																		<div class="card">
																			<div class="card-body">
																				<div class="row">
																					<div class="col-sm-6 col-md-6">									
																						<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left233'] ?></b></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1" style="color:#ff0000"></span>
																							</div>	
																							<input type="text" class="form-control" name="r_qnty" value="<?php echo $sumr_qnty; ?>">
																						</div>
																					</div>
																					
																					<div class="col-sm-6 col-md-6">										
																						<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left235'] ?></b></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1" style="color:#ff0000">lb</span>
																							</div>	
																							<input type="text" class="form-control" name="r_weight" value="<?php echo $sumweight; ?>">
																						</div>
																					</div>
																					
																					<div class="col-sm-6 col-md-6">										
																						<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left235'] ?></b></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1" style="color:#ff0000">Vol</span>
																							</div>	
																							<input type="text" class="form-control" name="v_weight" value="<?php echo $sumvol; ?>">
																						</div>
																					</div>
																					
																					<div class="col-sm-6 col-md-6">										
																						<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left236'] ?></b></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1" style="color:#ff0000">lb</span>
																							</div>	
																							<input type="text" class="form-control" name="t_weight" value="<?php echo $calculate_weight;; ?>">
																						</div>
																					</div>	
																					
																				</div>
																			</div>
																		</div>
																	</div>	

																
																	<div class="col-lg-12 col-xl-8">
																		<div class="card card-hover">
																			<div class="card-body">						
																				<div class="row">
																					<div class="col-12 col-sm-4 col-md-4">										
																						<label for="inputcom" class="control-label col-form-label"><?php echo $lang['add-title24'] ?></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
																							</div>	
																							<input type="text" class="form-control" name="tracking" value="<?php echo $roww->tracking;?>" readonly>
																							<input type="hidden" class="form-control" name="order_inv" value="<?php echo $roww->order_inv;?>" readonly>
																						</div>
																					</div>
																					
																					<div class="col-sm-12 col-md-2">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left237'] ?></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
																							</div>
																							<input type="text" class="form-control" name="value_weight" id="precio_libra" onkeyup="calcular()" value="<?php echo $core->value_weight;?>">
																						</div>
																					</div>
																					
																					<div class="col-sm-12 col-md-2">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left238'] ?></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
																							</div>
																							<input type="text" class="form-control" name="c_handling" id="manejo" onkeyup="calcular()" value="<?php echo $core->c_handling;?>">
																						</div>
																					</div>
																					<div class="col-sm-12 col-md-2">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title25'] ?></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
																							</div>
																							<input type="text" class="form-control"  name="r_tax" id="impuesto" onkeyup="calcular()" value="<?php echo $roww->r_tax;?>">
																						</div>
																					</div>
																					<div class="col-sm-12 col-md-2">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title26'] ?></label>
																						<div class="input-group mb-3">
																							<div class="input-group-prepend">
																								<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
																							</div>
																							<input type="text" class="form-control"  name="r_insurance" id="porcentaje_seguro" onkeyup="calcular()" value="<?php echo $roww->r_insurance;?>">											
																						</div>
																					</div>
																				
																					<div class="col-sm-12 col-md-2" style="display:none">
																						<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
																						<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" >
																					</div>
																					
																					<div class="col-sm-12 col-md-6">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title23'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
																						<div class="input-group mb-3">
																							<input class="custom-select col-12" name="pay_mode" placeholder="--<?php echo $lang['left243'] ?>--" value="<?php if(isset($roww->pay_mode)){echo  $roww->pay_mode;}?>" list="browsersss" autocomplete="off" required="required">
																							<datalist id="browsersss">
																								<?php 
																								$payrow = $core->getPayment();
																								foreach ($payrow as $rows):?>
																								<option value="<?php echo $rows->met_payment; ?>"><?php echo $rows->met_payment; ?></option>
																								<?php endforeach;?>
																							</datalist>
																						</div>
																					</div>

																					<div class="col-sm-12 col-md-3">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left239'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left244'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
																						<div class="input-group">
																							<input type="text" class="form-control" name="r_custom"  id="declarado" onkeyup="calcular()" value="<?php echo $roww->r_custom;?>">
																						</div>
																					</div>	
																					
																					<div class="col-sm-12 col-md-3" style="display:none">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left240'] ?> </label>
																						<div class="input-group">
																							<input type="text" class="form-control" name="l_price"  id="total_libra" value="<?php echo $roww->l_price;?>">
																						</div>
																					</div>
																					<div class="col-sm-12 col-md-3" style="display:none">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left241'] ?> </label>
																						<div class="input-group">
																							<input type="text" class="form-control" name="total_tax"  id="total_impuesto" value="<?php echo $roww->total_tax;?>">
																						</div>
																					</div>
																					<div class="col-sm-12 col-md-3" style="display:none">
																						<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left242'] ?> </label>
																						<div class="input-group">
																							<input type="text" class="form-control" name="total_insurance"  id="tinsurance"  value="<?php echo $roww->total_insurance;?>">
																						</div>
																					</div>
																					<div class="col-sm-12 col-md-3">
																						<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
																						<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" name="r_costtotal" id="total_result" value="<?php echo $roww->r_costtotal;?>" >
																					</div>														
																				</div>
																					
																			</div>
																		</div>
																	</div>	
																</div>	
																</td>
															</tr>

														</tbody>	
													</table>
												</div>	
											</div>
										</div>										
									</div>
								</div>
								<hr>
								
								
                            </form>
                    </div>
                </div>

                <!-- End row -->
				<!-- This is the modal for inspect docs upload -->
						<!-- Modal -->					
						<div class="modal fade bs-example-modal-lg" id="save_invoice_modal_inspect" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel1"><?php echo $lang['left223'] ?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label">Upload scanned documents</label>
											<div class="input-group mb-3">
												<div id="editor">
													<textarea name="inspect_upload"  id="summernote" style="margin-top: 60px;" placeholder="Write a text..">
														<?php echo $roww->inspect_upload; ?> 
													</textarea>
													<div class="label2 label-important"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['left229'] ?></button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
									</div>
								</div>
							</div>
						</div>

				
					<!-- End row -->

				<!--This is the modal for retirn docs upload  -->
						<!-- Modal -->					
						<div class="modal fade bs-example-modal-lg" id="save_invoice_modal_return" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel1"><?php echo $lang['left223'] ?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label">Upload scanned documents</label>
											<div class="input-group mb-3">
												<div id="editor">
													<textarea name="return_upload" id="summernote1" style="margin-top: 60px;" placeholder="Write a text..">
														<?php echo $roww->return_upload; ?> 
													</textarea>
													<div class="label2 label-important"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['left229'] ?></button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
									</div>
								</div>
							</div>
						</div>

				
					<!-- End row -->

				<!-- THis is the modal for discard docs uplaod -->

						<!-- Modal -->					
						<div class="modal fade bs-example-modal-lg" id="save_invoice_modal_discard" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel1"><?php echo $lang['left223'] ?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label">Upload scanned documents</label>
											<div class="input-group mb-3">
												<div id="editor">
													<textarea name="discard_upload" id="summernote2" style="margin-top: 60px;" placeholder="Write a text..">
													<?php echo $roww->discard_upload; ?> 

													</textarea>
													<div class="label2 label-important"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['left229'] ?></button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
										<!-- <button type="submit" class="btn btn-default">Upload</button> -->
									</div>
								</div>
							</div>
						</div>
				<!-- Modal edit detail courier -->	

				</div>
            </div>
			<?php echo Core::doForm("processUCourier");?>
			<?php break;?>
			<?php endswitch;?>

			 <?php include 'templates/footer_edit_courier.php'; ?>
	
			 
			 <!-- ============================================================== -->
			<!-- All Jquery -->
			<script>
			  $(document).ready(function(){

				//  append values in input fields
				  $(document).on('click','a[data-role=update]',function(){
						var id  = $(this).data('id');
						var detail_description  = $('#'+id).children('td[data-target=detail_description]').text();
						var detail_qnty  = $('#'+id).children('td[data-target=detail_qnty]').text();
						var detail_weight  = $('#'+id).children('td[data-target=detail_weight]').text();
						var detail_length  = $('#'+id).children('td[data-target=detail_length]').text();
						var detail_width  = $('#'+id).children('td[data-target=detail_width]').text();
						var detail_height  = $('#'+id).children('td[data-target=detail_height]').text();

						$('#detail_description').val(detail_description);
						$('#detail_qnty').val(detail_qnty);
						$('#detail_weight').val(detail_weight);
						$('#detail_length').val(detail_length);
						$('#detail_width').val(detail_width);
						$('#detail_height').val(detail_height);
						$('#uid').val(id);
						$('#edit_courier').modal('toggle');
				  });

				  // now create event to get data from fields and update in database 

				   $('#save').click(function(){
					  var id  = $('#uid').val(); 
					  var detail_description =  $('#detail_description').val();
					  var detail_qnty =  $('#detail_qnty').val();
					  var detail_weight =   $('#detail_weight').val();
					  var detail_length =   $('#detail_length').val();
					  var detail_width =   $('#detail_width').val();
					  var detail_height =   $('#detail_height').val();

					  $.ajax({
						  url      : 'update_addcourier.php',
						  method   : 'post', 
						  data     : {detail_description : detail_description , detail_qnty: detail_qnty , detail_weight : detail_weight , detail_length : detail_length, detail_width : detail_width, detail_height : detail_height, id: id},
						  success  : function(response){
										// now update user record in table 
										 $('#'+id).children('td[data-target=detail_description]').text(detail_description);
										 $('#'+id).children('td[data-target=detail_qty]').text(detail_qty);
										 $('#'+id).children('td[data-target=detail_weight]').text(detail_weight);
										 $('#'+id).children('td[data-target=detail_length]').text(detail_length);
										 $('#'+id).children('td[data-target=detail_width]').text(detail_width);
										 $('#'+id).children('td[data-target=detail_height]').text(detail_height);
										 $('#edit_courier').modal('toggle'); 
										if (response == "refresh"){
										  window.location.reload(true);   // This is not jQuery but simple plain ol' JS
										}
									 }
									 
								 
					  });
				   });
			  });
			</script>
			
			<script>
				$(document).ready(function() {
					$('#summernote').summernote();
				});
			</script>

			<script>
				function calcular() {
						var total_result = 0;
						var libra=eval(document.getElementById("precio_libra").value); // precio de la libra
						var seguro=eval(document.getElementById("porcentaje_seguro").value); // seguro del envio
						var t_manejo=eval(document.getElementById("manejo").value); // valor declarado del envio
						var t_imp=eval(document.getElementById("impuesto").value); // impuesto del envio
						var t_declarate=eval(document.getElementById("declarado").value); // valor declarado del envio
						
						var t_libra = libra * <?php echo $calculate_weight; ?>; // calculo de la libra
						var t_libras = libra * <?php echo $calculate_weight; ?>; // calculo de la libra
						var t_manejo_envio = t_manejo; // calculo manejo de envio
						var t_seguro = t_libra * seguro/100; // calculo del seguro
						var t_seguros = t_libra * seguro/100; // calculo del seguro
						var t_impuesto = t_declarate * t_imp/100; // calculo del impuesto
						var t_impuestos = t_declarate * t_imp/100; // calculo del impuesto
						
						var calculate_impuesto;
						if (t_declarate > 199) {
							calculate_impuesto = t_impuesto;
						} else {
							calculate_impuesto = 0;
						}

						
						var input = document.getElementById("total_result"); // calculo total del precio
						var input1 = document.getElementById("total_libra"); 
						var input2 = document.getElementById("total_impuesto");
						var input3 = document.getElementById("tinsurance");
						
						total_result = parseFloat(parseFloat(t_libra)  +  parseFloat(t_seguro) + parseFloat(calculate_impuesto) + parseFloat(t_manejo_envio)) .toFixed(2); <!--Total result formula-->
						total_libra = parseFloat(parseFloat(t_libras)) .toFixed(2);
						total_impuesto = parseFloat(parseFloat(t_impuestos)) .toFixed(2);
						tinsurance = parseFloat(parseFloat(t_seguros)) .toFixed(2);
						
						input.value= total_result;
						input1.value= total_libra;
						input2.value= total_impuesto;
						input3.value= tinsurance;
						
					}
			</script>


<script>
		$(document).ready(function() {

			var data1 = <?php echo json_encode($roww->inspect_upload); ?> ;
			var data2 = <?php echo json_encode($roww->return_upload); ?> ;
			var data3 = <?php echo json_encode($roww->discard_upload); ?> ;
			$('#summernote').summernote();
			// $('#summernote').summernote('code',data1);
			$('#summernote1').summernote();
			// $('#summernote1').summernote('code',data2);
			$('#summernote2').summernote();
			// $('#summernote2').summernote('code',data3);
		});
</script>