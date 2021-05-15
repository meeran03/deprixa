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

  define("_VALID_PHP", true);
  require_once("../init.php");
  
  if (!$user->is_Admin())
      redirect_to("login.php");
	
	$row = $user->getUserData();
	$rowt = $user->getUserData();
	
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
	
    <title><?php echo $lang['add-courier'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">

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
		   
		<?php $office = $core->getOffices(); ?>
		<?php $agencyrow = $core->getBranchoffices(); ?>
		<?php $courierrow = $core->getCouriercom(); ?>
		<?php $statusrow = $core->getStatus(); ?>
		<?php $packrow = $core->getPack(); ?>
		<?php $payrow = $core->getPayment(); ?>
		<?php $itemrow = $core->getItem(); ?>
		<?php $moderow = $core->getShipmode();?>
		<?php $driverrow = $user->getDrivers();?>
		<?php $delitimerow = $core->getDelitime();?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Edit Shipment -->
				<?php switch(Filter::$action): case "pick": ?>
				<?php  $rows = Core::getRowById(Core::cTable, Filter::$id);?>
				<form id="admin_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-lg-6">
							<div class="card">
								<div class="card-body">
								<h4 class="card-title">Sender Data:</h4>
									<hr>
									<div class="row" style="display:none">
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label">User Name</label>
												<input type="text" class="form-control is-valid" name="username" value="<?php echo $rows->username;?>" placeholder="User Name Here" readonly>
											</div>
										</div>
									</div>
									<!-- Collapse buttons -->
									<a class="btn btn-default" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">See fields</a>
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label">Sender Name</label>
												<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $rows->s_name;?>" placeholder="First Name Here" readonly>
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label">E-mail</label>
												<input type="email" class="form-control is-valid" name="email" value="<?php echo $rows->email;?>" placeholder="Email" readonly>
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label">Phone</label>
												<input type="number" class="form-control is-valid" name="phone" value="<?php echo $rows->phone;?>" placeholder="Phone" readonly>
											</div>
										</div>
									</div>
									<!-- Collapsible element -->
									<div class="collapse" id="collapseExample">
										<div class="row">
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label for="inputEmail3" class="control-label col-form-label">Address</label>
													<input type="text" class="form-control is-valid" name="address" value="<?php echo $rows->address;?>" placeholder="Address" readonly>
												</div>
											</div>									
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label for="inputEmail3" class="control-label col-form-label">Origin</label>
													<input type="text" class="form-control is-valid" name="country" value="<?php echo $rows->country;?>" placeholder="Origin" readonly>
												</div>
											</div>  
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label for="inputcontact" class="control-label col-form-label">City</label>
													<input type="text" class="form-control is-valid" name="city" value="<?php echo $rows->city;?>" placeholder="City" readonly>
												</div>
											</div>
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
													<input type="text" class="form-control is-valid" name="postal" value="<?php echo $rows->postal;?>" placeholder="Postal Code" readonly>
												</div>
											</div>	
										</div>

										<hr class="m-t-0 m-b-35">

										<div class="row">
											<div class="col-sm-12 col-md-12">
												<label for="inputlname" class="control-label col-form-label">Collection Address</label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text"><i class="icon-direction"></i></span>
													</div>
													<input type="text" class="form-control" name="r_addresspickup" value="<?php echo $rows->r_addresspickup;?>" placeholder="Collection address" readonly>
												</div>
											</div>		
										</div>
									</div>
									
									<hr class="m-t-0 m-b-35">
									
									<h4 class="card-title"><?php echo $lang['add-title13'] ?></h4>
									<div class="row">									
										<div class="col-sm-12 col-md-6" style="display:none">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label">Staff Role*</label>
												<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
											</div>
										</div>
										
										<div class="col-12 col-sm-6 col-md-6">
											<div class="form-group">
												<label for="inputlname" class="control-label col-form-label">Agency List <i style="color:#ff0000" class="fas fas fa-building"></i></label>
												<input class="custom-select col-12" name="agency" value="<?php echo $rows->agency;?>" placeholder="-- Select Agency --" list="browsersag" autocomplete="off" required="required">
												<datalist id="browsersag">
													<?php foreach ($agencyrow as $row):?>
													<option value="<?php echo $row->name_branch; ?>"><?php echo $row->name_branch; ?></option>
													<?php endforeach;?>
												</datalist>	
											</div>
										</div>
										
										
										<?php if($rowt->userlevel == 9){?>
										<div class="col-sm-12 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
											<div class="input-group mb-3">
												<input class="custom-select col-12" id="exampleFormControlSelect1" name="origin_off" value="<?php if(isset($rows->origin_off)){echo  $rows->origin_off;}?>" list="browseroff" autocomplete="off">		
												<datalist id="browseroff">
													<?php foreach ($office as $row):?>
													<option value="<?php echo $row->name_off; ?>"><?php echo $row->name_off; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div>
										<?php }else if($rowt->userlevel == 2){?>
										<div class="col-sm-12 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
											<div class="input-group mb-3">
												<input class="form-control" name="origin_off" value="<?php echo $user->name_off; ?>" readonly>
											</div>
										</div>
										<?php } ?>
										
										<div class="col-sm-12 col-md-6">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title15'] ?></i></label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<span style="color:#ff0000" class="ti-calendar"></span>
													</span>
												</div>
												<input type='text' class="form-control" id='datetimepicker1' name="collection_courier" value="<?php echo $rows->collection_courier;?>" placeholder="Default Pickadate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
											</div>
										</div>

										<div class="col-sm-12 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_035'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="color:#ff0000"><i class="fas fa-car"></i></span>
												</div>
												<input class="custom-select col-12" id="exampleFormControlSelect1" name="c_driver" value="<?php echo $rows->c_driver;?>" list="browser" autocomplete="off" placeholder="Select driver">
												<datalist id="browser">
													<?php foreach ($driverrow as $row):?>
													<option value="<?php echo $row->username; ?>"><?php echo $row->fname; ?> <?php echo $row->lname; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div>								
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title17'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
											<div class="input-group">
												<input class="custom-select col-12" name="package" value="<?php echo $rows->package;?>" placeholder="Select package" list="browsers1" autocomplete="off" required="required">
												<datalist id="browsers1">
													<?php foreach ($packrow as $row):?>
													<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
													<?php endforeach;?>
												</datalist>	
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title18'] ?></label>
											<div class="input-group">
												<input class="custom-select col-12" name="courier" value="<?php echo $rows->courier;?>" placeholder="Select shipping company" list="browsers2" autocomplete="off" required="required">
												<datalist id="browsers2">
													<?php foreach ($courierrow as $row):?>
													<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div>										
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title19'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
											<div class="input-group">
												<input class="custom-select col-12" name="status_courier"  placeholder="-- Select status --" list="browserstatus" autocomplete="off" required="required">
												<datalist id="browserstatus">
													<?php foreach ($statusrow as $row):?>
													<?php if($row->mod_style == 'Delivered'){?>
													<?php }elseif($row->mod_style == 'Pending'){?>
													<?php }elseif($row->mod_style == 'Rejected'){?>
													<?php }elseif($row->mod_style == 'Pick up'){?>
													<?php }elseif($row->mod_style == 'Picked up'){?>
													<?php }elseif($row->mod_style == 'No Picked up'){?>
													<?php }elseif($row->mod_style == 'Consolidate'){?>
													<?php }else{ ?>
													<option value="<?php echo $row->mod_style; ?>"><?php echo $row->mod_style; ?></option>
													<?php } ?>
													<?php endforeach;?>
												</datalist>
											</div>
										</div>								                                     
									</div>
									<div class="row"> 									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title20'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
												</div>
												<input type="text" class="form-control" name="deli_time" value="<?php echo $rows->deli_time;?>" placeholder="Select shipping time" list="browsersstatus" autocomplete="off" required="required">
												<datalist id="browsersstatus">
													<?php foreach ($delitimerow as $row):?>
													<option value="<?php echo $row->delitime; ?>"><?php echo $row->delitime; ?></option>
													<?php endforeach;?>
												</datalist>	
											</div>
										</div>

										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title22'] ?></label>
											<div class="input-group mb-3">
												<input class="custom-select col-12" name="service_options" value="<?php echo $rows->service_options;?>" placeholder="Section send mode" list="browsers3" autocomplete="off" required="required">
												<datalist id="browsers3">
													<?php foreach ($moderow as $row):?>
													<option value="<?php echo $row->ship_mode; ?>"><?php echo $row->ship_mode; ?></option>
													<?php endforeach;?>
												</datalist>	
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title27'] ?></label>
											<div class="input-group">
												<input class="form-control" name="itemcat" value="<?php if(isset($rows->itemcat)){echo  $rows->itemcat;}?>" list="browsers4" autocomplete="off" required="required">
												<datalist id="browsers4">
													<?php foreach ($itemrow as $row):?>
													<option value="<?php echo $row->name_item; ?>"><?php echo $row->name_item; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div> 
										
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"><?php if(isset($rows->r_description)){echo  $rows->r_description;}?></textarea>
											</div>
										</div>										
									</div>	
								</div>
							</div>
						</div>
						
						<div class="col-sm-12 col-lg-6">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Recipient information</h4>
									<hr>
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title4'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
												</div>
												<input type="text" class="form-control" id="searchnames"  name="r_name" value="<?php echo $rows->r_name;?>" autofocus placeholder="Search recipient name" autocomplete="off" required>
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title5'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">@</span>
													</div>
													<input type="email" class="form-control" id="mail" name="r_email"  value="<?php echo $rows->r_email;?>" placeholder="Email" required>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title8'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>
												</div>
												<input type="number" class="form-control"  name="r_phone"  value="<?php echo $rows->r_phone;?>" placeholder="## #####">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputcontact" class="control-label col-form-label" style="color:#ff0000"><b><?php echo $lang['add-title9'] ?></b></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-screen-smartphone"></i></span>
												</div>
												<input type="number" class="form-control" id="phones" name="rc_phone" value="<?php echo $rows->rc_phone;?>" placeholder="(+1)3244152">
											</div>
										</div>									                                     
									</div>
									<div class="row"> 
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title10'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-location-pin"></i></span>
												</div>
												<input type="text" class="form-control" id="zones" name="r_dest" value="<?php echo $rows->r_dest;?>" required="required">
											</div>
										</div>  
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title11'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-map"></i></span>
												</div>
												<input type="text" class="form-control" id="citys" name="r_city" value="<?php echo $rows->r_city;?>">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title12'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-pin"></i></span>
												</div>
												<input type="text" class="form-control" id="zips" name="r_postal" value="<?php echo $rows->r_postal;?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 col-md-12">
											<label for="inputlname" class="control-label col-form-label">Recipient address</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
												</div>
												<input type="text" class="form-control" id="search_location" placeholder="Search address in google" value="<?php echo $rows->r_addresspickup;?>" required>
												<div class="input-group-btn">
													<button class="btn btn-info get_map" type="submit">
														Search for
													</button>
												</div>
											</div>
										</div>		
								
										<div class="col-sm-12 col-md-12">
											<div class="form-group">											
												<!-- display google map -->
												<div id="geomap" style="height: 240px"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-lg-12">
							<div class="card">
								<div class="card-body">

									<div class="col-sm-12 col-lg-12">
										<div class="card-body">
											<h4 class="card-title">Add box to the list</h4>
											<div class="row">																		
												<div class="col-md-12">	
													<div class="table-responsive">
														<table class="table table-hover"  id="tabla">
															<thead class="bg-darks border-0 text-white">
																<tr class="row100 head">
																	<th style="width: 40%;" align='center'><b>Description</b></th>
																	<th class='text-center'><b>Quantity</b></th>
																	<th class='text-center'><b>Weight (lb)</b></th>
																	<th class='text-center'><b>Long (cm)</b></th>
																	<th class='text-center'><b>Width (cm)</b></th>
																	<th class='text-center'><b>High (cm)</b></th>
																	<th class='text-center'><b>Weight Vol. (lb)</b></th>
																	<th class='text-center'></th>
																</tr>
															</thead>
															<tbody class='items'>
																
															</tbody>	
														</table>
														<?php $track = $courier->order_track();?>
														<?php $prefix = $courier->order_prefix();?>
														<?php $payrow = $core->getPayment(); ?>
														<div class="col-lg-12 col-xl-12">
															<div class="card card-hover">
																<div class="card-body">						
																	<div class="row">
																		<div class="col-12 col-sm-4 col-md-4">										
																			<label for="inputcom" class="control-label col-form-label"><?php echo $lang['add-title24'] ?></label>
																			<div class="input-group mb-3">
																				<div class="input-group-prepend">
																					<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
																				</div>	
																				<input type="text" class="form-control" name="tracking" value="<?php echo $rows->tracking;?>" readonly>
																				<input type="hidden" class="form-control" name="order_inv" value="<?php echo $rows->order_inv;?>" readonly>
																			</div>
																		</div>
																		
																		<div class="col-sm-12 col-md-2">
																			<label for="inputEmail3" class="control-label col-form-label">Pound Price</label>
																			<div class="input-group mb-3">
																				<div class="input-group-prepend">
																					<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
																				</div>
																				<input type="text" class="form-control" name="value_weight" id="precio_libra" onkeyup="calcular()" value="<?php echo $core->value_weight;?>">
																			</div>
																		</div>
																		
																		<div class="col-sm-12 col-md-2">
																			<label for="inputEmail3" class="control-label col-form-label">Shipping Handles</label>
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
																				<input type="text" class="form-control"  name="r_tax" id="impuesto" onkeyup="calcular()" value="<?php echo $core->tax;?>">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-2">
																			<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title26'] ?></label>
																			<div class="input-group mb-3">
																				<div class="input-group-prepend">
																					<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
																				</div>
																				<input type="text" class="form-control"  name="r_insurance" id="porcentaje_seguro" onkeyup="calcular()" value="<?php echo $core->insurance;?>">											
																			</div>
																		</div>
																	
																		<div class="col-sm-12 col-md-2" style="display:none">
																			<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
																			<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" >
																		</div>
																		<div class="col-sm-12 col-md-6">
																			<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title23'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
																			<div class="input-group mb-3">
																				<input class="custom-select col-12" name="pay_mode" placeholder="--Select payment mode--" list="browsersss" autocomplete="off" required="required">
																				<datalist id="browsersss">
																					<?php foreach ($payrow as $row):?>
																					<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
																					<?php endforeach;?>
																				</datalist>
																			</div>
																		</div>

																		<div class="col-sm-12 col-md-3">
																			<label for="inputEmail3" class="control-label col-form-label">Declared Value <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Customs Tax for the insured value, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
																			<div class="input-group">
																				<input type="text" class="form-control" name="r_custom"  id="declarado" onkeyup="calcular()" value="0">
																			</div>
																		</div>	
																		
																		<div class="col-sm-12 col-md-3" style="display:none">
																			<label for="inputEmail3" class="control-label col-form-label">Subtotal <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Customs Tax for the insured value, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
																			<div class="input-group">
																				<input type="text" class="form-control" name="l_price"  id="total_libra" value="0">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3" style="display:none">
																			<label for="inputEmail3" class="control-label col-form-label">Total tax <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Customs Tax for the insured value, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
																			<div class="input-group">
																				<input type="text" class="form-control" name="total_tax"  id="total_impuesto" value="0">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3" style="display:none">
																			<label for="inputEmail3" class="control-label col-form-label">Total insurance <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Customs Tax for the insured value, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
																			<div class="input-group">
																				<input type="text" class="form-control" name="total_insurance"  id="tinsurance"  value="0">
																			</div>
																		</div>
																		<div class="col-sm-12 col-md-3">
																			<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
																			<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" name="r_costtotal" id="total_result" value="" >
																		</div>														
																	</div>
																		
																</div>
															</div>
														</div>
													</div>	
												</div>
											</div>										
										</div>
									</div>
									<hr>
									
									<div class="col-sm-12 col-lg-12">
										<div class="card-body">
										<h4 class="card-title">Notify the customer by e-mail</h4>
											<div class="card-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group row">
															<label class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" name="notifyClient" tabindex="0">
																<span class="custom-control-indicator"></span>
																<label><span><i class="ti-email" style="color:#6610f2"></i>&nbsp; Notify the customer is your shipment created?</span></label>
															</label>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
											<hr>
											<div class="form-actions">
												<div class="card-body">
													<div class="text-right">
														<input type="hidden" name="r_address" class="search_addr">
														<input type="hidden" name="latitude" class="search_latitude">
														<input type="hidden" name="longitude" class="search_longitude">
														<input type="hidden" name="latitude_history" class="search_latitude">
														<input type="hidden" name="longitude_history" class="search_longitude">
														<input type="hidden" name="act_status" value="1">
														<input type="hidden" name="con_status" value="0">
														<input type="hidden" name="id_pickup" value="0">
														<input type="hidden" name="status_pickup" value="0">															
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="icon-plane"></i>&nbsp; Update pickup</button>
														<a href="pickup.php?do=list_pickup" class="btn btn-dark"><i class="icon-action-undo"></i> <i class="icon-people"></i> <?php echo $lang['add-title47'] ?></a> 
													</div>
												</div>
											</div>
											<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
										</div>
									</div>

								</div>
							</div>
						</div>	
					</div>
				</form>
                <?php echo Core::doForm("processUpdatePickup");?>
				<?php break;?>
				<?php endswitch;?>
            </div>
			 <!-- Row -->
				
				<form class="form-horizontal" name="save_item" id="save_item">
					<!-- Modal -->					
					<div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel1">New items shipping</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12 col-md-8">
										<div class="form-group">
											<label for="message-text" class="control-label">Package Description:</label>
											<textarea class="form-control" data-toggle="tooltip" data-placement="bottom" title="Description of the articles" id="detail_description" name="detail_description" required></textarea>
											<input type="hidden" class="form-control" id="action" name="action"  value="ajax">
										</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputlname" class="control-label col-form-label">Quantity</label>
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="Quantity of articles" class="form-control" name="detail_qnty" required>
											</div>
										</div>
									</div>	
									
									<div class="row">
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputlname" class="control-label col-form-label">Weight (lb)</label>
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title31'] ?>" class="form-control" name="detail_weight" required>
											</div>
										</div>
										<div class="col-sm-12 col-md-9">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title34'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['add-title35'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title36'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title37'] ?>" class="form-control" name="detail_length" value="0" required>
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title38'] ?>" class="form-control" name="detail_width" value="0" required>
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title39'] ?>" class="form-control" name="detail_height" value="0" required>
											</div>
										</div>
									</div>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-default">Add box</button>
								</div>
							</div>
						</div>
					</div>
				</form>
				
                <!-- End row -->

			 <?php include 'templates/footer_add_courier.php'; ?>
			 
			 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
			<script type="text/javascript" src="dist/js/centerwindows.js"></script>
			<script src="dist/js/alert_top.js"></script>	

			<script type="text/javascript">

				function show_items(){
					var parametros={"action":"ajax"};
					$.ajax({
						url:'ajax/addp_items_courier.php',
						data: parametros,
						 beforeSend: function(objeto){
						 $('.items').html('Processing wait...');
					  },
						success:function(data){
							$(".items").html(data).fadeIn('slow');
					}
					})
				}				

				function delete_item(id){
					$.ajax({
						type: "GET",
						url: "ajax/addp_items_courier.php",
						data: "action=ajax&id="+id,
						 beforeSend: function(objeto){
							 $('.items').html('Processing wait...');
						  },
						success: function(data){
							$(".items").html(data).fadeIn('slow');
						}
					});
				}
				
				$( "#save_item" ).submit(function( event ) {
					parametros = $(this).serialize();
					$.ajax({
						type: "POST",
						url:'ajax/addp_items_courier.php',
						data: parametros,
						 beforeSend: function(objeto){
							 $('.items').html('Processing wait...');
						  },
						success:function(data){
							$(".items").html(data).fadeIn('slow');
							$("#myModal").modal('hide');
						}
					})
					
				  event.preventDefault();
				})

					show_items();
						
						
			</script>