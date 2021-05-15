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
  
	$row = $user->getUserData();
	$courierrow = $core->getCouriercom();
	$packrow = $core->getPack();
	$payrow = $core->getPayment();
	$itemcatrow = $core->getItem();
	$moderow = $core->getShipmode();
	
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
	
        <?php include 'topbar.php'; ?>
		
        <!-- End Topbar header -->

		
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
		<?php include 'left_sidebar.php'; ?>
	

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
		
		<!-- General queries to the database  -->
		   
			
		<?php $office = $core->getOffices(); ?>
		<?php $courierrow = $core->getCouriercom(); ?>
		<?php $statusrow = $core->getStatus(); ?>
		<?php $packrow = $core->getPack(); ?>
		<?php $payrow = $core->getPayment(); ?>
		<?php $itemrow = $core->getItem(); ?>
		<?php $moderow = $core->getShipmode();?>
		<?php $driverrow = $user->getDrivers();?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title">Dashboard cliente</h4>
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
                <!-- row -->
				<form id="client_form" method="post">
                <div class="row">
					<div class="col-sm-12 col-lg-6" style="display:none">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Sender Data:</h4>
								<hr>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">User Name</label>
											<input type="text" class="form-control is-valid" name="username" value="<?php echo $user->username;?>" placeholder="<?php echo $lang['create-booking2'] ?>" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Sender Name</label>
											<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="<?php echo $lang['create-booking3'] ?>" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Addres</label>
											<input type="text" class="form-control is-valid" name="address" value="<?php echo $row->address;?>" placeholder="Address">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">Phone</label>
											<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->code_phone;?><?php echo $row->phone;?>" placeholder="Phone">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Origin</label>
											<input type="text" class="form-control is-valid" name="country" value="<?php echo $row->country;?>" placeholder="Origin">
										</div>
									</div>                                       
								</div>
								<div class="row"> 
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">City</label>
											<input type="text" class="form-control is-valid" name="city" value="<?php echo $row->city;?>" placeholder="City">
										</div>
									</div>
								
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
											<input type="text" class="form-control is-valid" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">Email</label>
											<input type="email" class="form-control is-valid" name="email" value="<?php echo $row->email;?>" placeholder="Email">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['add-title3'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title4'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
											</div>
											<input type="text" class="form-control" name="r_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" required>
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title5'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">@</span>
												</div>
												<input type="email" class="form-control" id="mail" name="r_email"  value="<?php echo $row->email;?>" placeholder="Email" required>
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
											<input type="number" class="form-control"  name="r_phone"  placeholder="## ######">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputcontact" class="control-label col-form-label" style="color:#ff0000"><b><?php echo $lang['add-title9'] ?></b></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-screen-smartphone"></i></span>
											</div>
											<input type="number" class="form-control" id="phones" name="rc_phone" value="<?php echo $row->code_phone;?><?php echo $row->phone;?>" placeholder="(+1)3244152">
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
											<input type="text" class="form-control" id="zones" name="r_dest" value="<?php if(isset($_GET['scountry'])){ echo $_GET['scountry'];}?>" readonly required="required">
										</div>
									</div>  
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title11'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-map"></i></span>
											</div>
											<input type="text" class="form-control" id="citys" name="r_city" value="<?php if(isset($_GET['scity'])){ echo $_GET['scity'];}?>" readonly required="required">
										</div>
									</div>
								
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title12'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-pin"></i></span>
											</div>
											<input type="text" class="form-control" id="zips" name="r_postal">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12 col-md-12">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title6'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
											</div>
											<input type="text" class="form-control" id="search_location" placeholder="Search address on google map" required>
											<div class="input-group-btn">
												<button class="btn btn-info get_map" type="submit">
													Buscar
												</button>
											</div>
										</div>
									</div>		
							
									<div class="col-sm-12 col-md-12">
										<div class="form-group">											
											<!-- display google map -->
											<div id="geomap" style="height: 150px"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $track = $courier->order_track();?>
					<?php $prefix = $courier->order_prefix();?>
					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['add-title48'] ?></h4>
							
								<div class="row">
									<div class="col-md-6" style="display:none">
										<div class="form-group">
											<label class="input"> <i style="color:#ff0000"><?php echo $prefix;?></i>
											<input type="text" name="tracking" value="<?php echo $track;?>">	
										</div>
									</div>
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label">Shopping Tracking</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000">#</span>
											</div>	
											<input type="text" class="form-control" name="order_purchase" value="<?php if(isset($_GET['order_purchase'])){echo $_GET['order_purchase'];} ?>" readonly required="required">
										</div>
									</div>
									
									<div class="col-sm-12 col-md-6">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title18'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="courier" value="<?php if(isset($_GET['courier'])){echo $_GET['courier'];} ?>" readonly required="required">
										</div>
									</div> 

									<div class="col-sm-12 col-md-3" style="display:none">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title25'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3" style="display:none">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title26'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">											
										</div>
									</div>
								</div>

								<div class="row"> 
									<div class="col-sm-12 col-md-6">
										<label for="inputcontact" class="control-label col-form-label">Store / Supplier</label>
										<div class="input-group mb-3">
											<input class="form-control" name="supplier" value="<?php if(isset($_GET['supplier'])){echo $_GET['supplier'];} ?>" readonly required="required">
										</div>
									</div> 
									
									<div class="col-sm-12 col-md-6">
										<label for="inputcontact" class="control-label col-form-label">Number of packages</label>
										<div class="input-group mb-3">
											<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title30'] ?>" class="form-control" name="r_qnty">
										</div>
									</div>
								</div>

								<div class="row"> 									
									<div class="col-sm-12 col-md-6">
										<label for="inputEmail3" class="control-label col-form-label">Package declared value</label>
										<div class="input-group mb-3">
											<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom"  placeholder="0">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputEmail3" class="control-label col-form-label"><strong><?php echo $core->currency;?> Purchase value</strong> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Este es el precio cuando compras en tiendas como Amazon, Ebay, Nike, AliExpress y mucho más ..."></i></b></label>
										<div class="input-group mb-3">
											<input type="number" class="form-control" name="r_costtotal"  value="<?php if(isset($_GET['r_costtotal'])){echo $_GET['r_costtotal'];} ?>" readonly required="required">
										</div>
									</div>									
								</div>

								<div class="row">
									<div class="col-sm-12 col-md-12">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
										<div class="input-group mb-3">
											 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"><?php if(isset($_GET['r_description'])){echo $_GET['r_description'];} ?></textarea>
										</div>
									</div>
									
									<div class="col-sm-12 col-md-12">
										<label for="inputEmail3" class="control-label col-form-label">Upload the purchase invoice</label>
										<div class="input-group mb-3">
											 <div id="editor">
												<textarea name="package_invoice" id="summernote" style="margin-top: 60px;" placeholder="Write a text.."></textarea>
												<div class="label2 label-important">Copy and paste the invoice</div>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-md-6" style="display:none">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
										<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" readonly>
									</div>
									<div class="col-sm-12 col-md-4" style="display:none">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title19'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="status_courier" value="Pending">	
										</div>
									</div>
								</div>									

								<hr class="m-t-0 m-b-5">
								<div class="form-actions">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-sm-12 col-md-12">
														<input type="hidden" name="r_address" class="search_addr">
														<input type="hidden" name="latitude" class="search_latitude">
														<input type="hidden" name="longitude" class="search_longitude">	
														<input type="hidden" name="status_prealert" value="Pre Alert">	
														<button  name="dosubmit" type="submit" class="btn btn-success"> <i class="icon-plane"></i>&nbsp; Create pre alert now!</button>
														<a href="prealert.php" class="btn btn-dark"><i class="icon-action-undo"></i> Create another previous alert</a> 
													</div>
												</div>
											</div>
											<div class="col-md-6"> </div>
										</div>
									</div>
								</div>
								<input name="doRegister_online" type="hidden" value="1" />
							</div>
						</div>
					</div>
                </div>
				</form>
                <!-- End row -->
            </div>
			

			 <?php include 'templates/footer_add_courier.php'; ?>
			 
			 <script>
				$(document).ready(function() {
					$('#summernote').summernote();
				});
			</script>