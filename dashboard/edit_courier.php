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
				<?php  $roww = Core::getRowById(Core::cTable, Filter::$id);?>
				<!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form id="admin_form" method="post">
                                <div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-lg-6">
											<h4 class="card-title"><i class="mdi mdi-information-outline" style="color:#36bea6"></i> <?php echo $lang['add-title3'] ?></h4>
										</div>
										<div class="col-sm-12 col-lg-6">
											<h4 class="card-title"><i class="mdi mdi-book-multiple" style="color:#36bea6"></i> <?php echo $lang['add-title13'] ?></h4>
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
										
										<div class="col-sm-12 col-lg-6">
											<div class="card-body">
											<!-- Collapse buttons -->
												<a class="btn waves-effect waves-light btn-xs btn-info btn-outline-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-align-left"></i> <?php echo $lang['left193'] ?></a>
												<div class="row">
													<div class="col-sm-12 col-md-6">
														<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title4'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
															</div>
															<input type="text" class="form-control" id="searchnames"  name="r_name" value="<?php echo $roww->r_name;?>" readonly>
														</div>
													</div>
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title5'] ?></label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1">@</span>
																</div>
																<input type="email" class="form-control" id="mail" name="r_email"  value="<?php echo $roww->r_email;?>" readonly >
															</div>
														</div>
													</div>
												</div>
												<!-- Collapsible element -->
												<div class="collapse" id="collapseExample">
													<div class="row">
														<div class="col-sm-12 col-md-6">
															<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title8'] ?></label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>
																</div>
																<input type="number" class="form-control"  name="r_phone"  value="<?php echo $roww->r_phone;?>">
															</div>
														</div>
														<div class="col-sm-12 col-md-6">
															<label for="inputcontact" class="control-label col-form-label" style="color:#ff0000"><b><?php echo $lang['add-title9'] ?></b></label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="icon-screen-smartphone"></i></span>
																</div>
																<input type="number" class="form-control" id="phones" name="rc_phone" value="<?php echo $roww->rc_phone;?>">
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
																<input type="text" class="form-control" id="zones" name="r_dest" value="<?php echo $roww->r_dest;?>">
															</div>
														</div>  
														<div class="col-sm-12 col-md-4">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title11'] ?></label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="icon-map"></i></span>
																</div>
																<input type="text" class="form-control" id="citys" name="r_city" value="<?php echo $roww->r_city;?>">
															</div>
														</div>
													
														<div class="col-sm-12 col-md-4">
															<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title12'] ?></label>
															<div class="input-group mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="icon-pin"></i></span>
																</div>
																<input type="text" class="form-control" id="zips" name="r_postal" value="<?php echo $roww->r_postal;?>">
															</div>
														</div>
													</div>
												</div>
												<!-- / Collapsible element -->

												<div class="row">
													<div class="col-sm-12 col-md-12">
														<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title6'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-btn">
																<button class="btn btn-secondary get_map" type="submit">
																	<?php echo $lang['left199'] ?>
																</button>
															</div>
															<input type="text" class="form-control" id="search_location" value="<?php echo $roww->r_address;?>" placeholder="<?php echo $lang['left200'] ?>" required>
															<input type="hidden" name="r_address" value="<?php echo $roww->r_address;?>" class="search_addr">
															<input type="hidden" name="latitude" value="<?php echo $roww->latitude;?>" class="search_latitude">
															<input type="hidden" name="longitude" value="<?php echo $roww->longitude;?>" class="search_longitude">
															<input type="hidden" name="latitude_history" value="<?php echo $roww->latitude_history;?>" class="search_latitude">	
															<input type="hidden" name="longitude_history" value="<?php echo $roww->longitude_history;?>" class="search_longitude">	
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
															</div>
														</div>
													</div>		
											
													<div class="col-sm-12 col-md-12">
														<div class="form-group">											
															<!-- display google map -->
															<div id="geomap" style="height: 200px"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
										
										<div class="col-sm-12 col-lg-6">
											<div class="card-body">
												<div class="row">
								
													<div class="col-sm-12 col-md-4">
														<div class="form-group">
															<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title17'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
															<input class="custom-select col-12" name="package" list="browsers1" autocomplete="off" required="required" value="<?php if(isset($roww->package)){echo  $roww->package;}?>">
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
															<input type='text' class="form-control" id='datetimepicker1' name="collection_courier" placeholder="<?php echo $lang['edit-courier11'] ?>" value="<?php echo $roww->collection_courier;?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
														</div>
													</div>
													
													<div class="col-sm-12 col-md-4">
														<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
														<div class="input-group mb-3">
															<select class="custom-select col-12" id="exampleFormControlSelect1" name="origin_off" value="<?php if(isset($roww->origin_off)){echo  $roww->origin_off;}?>">
															<?php 
															$office = $core->getOffices();
															foreach ($office as $rows):?>
																<option value="<?php echo $rows->name_off; ?>"><?php echo $rows->name_off; ?></option>
															<?php endforeach;?>
															</select>
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-4">
														<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title18'] ?></label>
														<div class="input-group">
															<input class="custom-select col-12" name="courier" list="browsers2" autocomplete="off" required="required" value="<?php if(isset($roww->courier)){echo  $roww->courier;}?>">
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
													<?php $delitimerow = $core->getDelitime();?>
													<div class="col-sm-12 col-md-4">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title20'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
															</div>
															<input type="text" class="form-control" name="deli_time" value="<?php if(isset($roww->deli_time)){echo  $roww->deli_time;}?>" placeholder="--<?php echo $lang['left207'] ?>--" list="browsersstatus" autocomplete="off" required="required">
															<datalist id="browsersstatus">
																<?php foreach ($delitimerow as $row):?>
																<option value="<?php echo $row->delitime; ?>"><?php echo $row->delitime; ?></option>
																<?php endforeach;?>
															</datalist>	
														</div>
													</div>
													
													<div class="col-sm-12 col-md-4">
														<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_035'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" style="color:#ff0000"><i class="fas fa-car"></i></span>
															</div>
															<input class="custom-select col-12" id="exampleFormControlSelect1" name="c_driver" list="browser" autocomplete="off" value="<?php if(isset($roww->c_driver)){echo  $roww->c_driver;}?>">
															<datalist id="browser">
																<?php 
																$driverrow = $user->getDrivers();
																foreach ($driverrow as $rows):?>
																<option value="<?php echo $rows->username; ?>"><?php echo $rows->fname; ?> <?php echo $rows->lname; ?></option>
																<?php endforeach;?>
															</datalist>			
														</div>
													</div>	
													<!--/span-->
												</div>
												
												<div class="row">
													<div class="col-sm-12 col-md-6">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title22'] ?></label>
														<div class="input-group mb-3">
															<input class="custom-select col-12" name="service_options" value="<?php if(isset($roww->service_options)){echo  $roww->service_options;}?>" list="browsers3" autocomplete="off" required="required">
															<datalist id="browsers3">
																<?php 
																$moderow = $core->getShipmode();
																foreach ($moderow as $rows):?>
																<option value="<?php echo $rows->ship_mode; ?>"><?php echo $rows->ship_mode; ?></option>
																<?php endforeach;?>
															</datalist>	
														</div>
													</div>
													<!--/span-->
	
													<div class="col-sm-12 col-md-6">
														<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title19'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
														<div class="input-group">
															<input class="custom-select col-12" name="status_courier" value="<?php if(isset($roww->status_courier)){echo  $roww->status_courier;}?>" list="browserstatus" autocomplete="off" required="required">
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
															<input class="form-control" name="itemcat" value="<?php if(isset($roww->itemcat)){echo  $roww->itemcat;}?>" list="browsers4" autocomplete="off" required="required">
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
															<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title30'] ?>" class="form-control" name="r_qnty" value="<?php echo $roww->r_qnty;?>" readonly>
														</div>
													</div>
													
													<div class="col-sm-12 col-md-12">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
														<div class="input-group">
															 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"><?php if(isset($roww->r_description)){echo  $roww->r_description;}?></textarea>
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
																<th style="width: 30%;" align='center'><b><?php echo $lang['left213'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left214'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left215'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left216'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left217'] ?></b></th>
																<th class='text-center'><b><?php echo $lang['left218'] ?></b></th>
																<th style="width: 10%;" class='text-center'><b><?php echo $lang['left219'] ?></b></th>
																<th class='text-center'></th>
															</tr>
														</thead>
														<tbody>
															<?php 
																$sumweight=0;
																$sumr_qnty=0;
																$sumvol=0;
																$calculate_weight = 0;
																$table = $db->query("SELECT * FROM add_courier, detail_addcourier WHERE add_courier.qid=detail_addcourier.id_add AND add_courier.id='".Filter::$id."'");
																while($row = $table->fetch_assoc()) {
																	$id_add=$row['id_add'];
																	$qid=$row['qid'];
																	$id=$row['id'];
																	$detail_weight=$row['detail_weight'];
																	$detail_length=$row['detail_length'];
																	$detail_width=$row['detail_width'];	
																	$detail_height =$row['detail_height'];
																	$detail_vol =$row['detail_vol'];
																	$detail_description =$row['detail_description'];
																	$detail_qnty=$row['detail_qnty'];
																
																	$totalweight=$row['detail_weight'];
																	$totalr_qnty=$row['detail_qnty'];
																	$totalvol=$row['detail_vol'];
																	
															?>
															<tr id="<?php echo $row['id']; ?>" class="fixed-row">
																<td  data-target="detail_description" style="width: 40%;" align="left"><?php echo $row['detail_description'];?></td>
																<td data-target="detail_qnty" class='text-center'><?php echo $row['detail_qnty'];?></td>
																<td data-target="detail_weight" class='text-center'><?php echo $row['detail_weight'];?></td>
																<td data-target="detail_length" class='text-center'><?php echo $row['detail_length'];?></td>
																<td data-target="detail_width" class='text-center'><?php echo $row['detail_width'];?></td>
																<td data-target="detail_height" class='text-center'><?php echo $row['detail_height'];?></td>
																<td data-target="detail_vol" class='text-center'><?php echo $row['detail_vol'];?></td>
																<td class='text-right'><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAACP0lEQVRIS7WVv2sUQRTHv+/t7iUERMXbE1PYCEIEEbQypDhtRYJFCsUmECysrNSAu7e3eyaoiKL/gMQ/QIiVgnpg4S9C7C1ERcTbuwQLi9vZmyd7svEI3o+9I1PuzHw+b96bnUfY4UE7zMeWYL/TPKqBJRDv6ikVOGFgvR40sC2B7TSftnTu8sZN+tZts+2qqtYyxdAzYWX80yCSfwJXVUPfKvbalAhYx/OaeT2ncoe+L1Ojc33eiS4R87EYxq3NMn1N5jILkiAKnpoWjfshmzPwKEpAdkkFAowz4Ukr1i9EcoeTbGQTONGrMLBOAyR5Nz7PWp+pVXIXC67yW8CRhm/O/Z1TpwiYDX3rSiZBoaTKLdBBQ+RLErUAFwSogfAGgpMG6M5P31i13dZDAt7VfPNxJkECzTvRCRjUvmmi9XUmXg/L1uKkJxORjp+zoCHAhzCwKplr0FnQgqs8IYwl8PT7Pjd+wCK1FD604H9wu6TuiWCj7ltBZyCZU9QVrrFZDyx/+zXPJMgKz5SibnAN2tMom/PdftCBTtAVLnrKAL+t+ZY3tMB21aIWHG8E1lwKSQpKgl+aUWWN4oiCZiTg92C6XffM1RSeQPOeKo4kyHsySaLu8m9roTURPwNQZ+BjGvHoAjc+C8hVkuQ50LMAO6FvLaepGl3Qfhb4ACJjrb5EP7YXcmRBv4aSTXAjekTEL7Uh7UYxyCDBOdK0VgvMlb7XdO812W2MxQsM9O7JHSQBfQ59YyXpAX0Fg0Q8zJo/HjlnKNVj0b8AAAAASUVORK5CYII="></a></td>
															</tr>
															<?php 
																$sumweight+=$totalweight;
																$sumr_qnty+=$totalr_qnty;
																$sumvol+=$totalvol;
																
																if ($sumweight > $sumvol) {
																	$calculate_weight = $sumweight;
																} elseif($sumvol > $sumweight) {
																	$calculate_weight = $sumvol;
																}else{
																	$calculate_weight = 0;
																}
															
															} ?>
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

																	<?php $track = $courier->order_track();?>
																	<?php $prefix = $courier->order_prefix();?>
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
								
								<div class="col-sm-12 col-lg-12">
									<div class="card-body">
										<div class="form-actions">
											<div class="card-body">
												<div class="text-right">
																									
													<button type="submit" name="dosubmit" class="btn btn-success"> <i class="icon-plane"></i>&nbsp; <?php echo $lang['left248'] ?></button>
													<a href="index.php" class="btn btn-dark"> <?php echo $lang['add-title47'] ?></a> 
												</div>
											</div>
										</div>
										<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
									</div>
								</div>								
                            </form>
                    </div>
                </div>

                <!-- End row -->
				
				<!-- Modal edit detail courier -->	
				<div class="panel-body">
					<div class="modal fade bs-example-modal-lg" id="edit_courier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myLargeModalLabel"><?php echo $lang['left223'] ?></h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12 col-md-8">
											<div class="form-group">
												<label for="message-text" class="control-label"><?php echo $lang['left224'] ?></label>
												<textarea class="form-control" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['left225'] ?>" id="detail_description" autocomplete="off" required></textarea>
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputlname" class="control-label col-form-label"><?php echo $lang['left226'] ?></label>
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['left227'] ?>" class="form-control" id="detail_qnty" autocomplete="off" required>
											</div>
										</div>
										
									</div>
									
									
									<div class="row">
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputlname" class="control-label col-form-label"><?php echo $lang['left228'] ?></label>
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title31'] ?>" class="form-control" id="detail_weight" autocomplete="off" required>
											</div>
										</div>
										<div class="col-sm-12 col-md-9">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title34'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['add-title35'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title36'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title37'] ?>" class="form-control" id="detail_length" autocomplete="off" required>
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title38'] ?>" class="form-control" id="detail_width" autocomplete="off" required>
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title39'] ?>" class="form-control" id="detail_height" autocomplete="off" required>
											</div>
										</div>
									</div>
									<input class="form-control" type="hidden" id="uid">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['left229'] ?></button>
									<button id="save" name="btn" onclick="window.location.reload();" class="btn btn-default"><?php echo $lang['left248'] ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
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