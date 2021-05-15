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
  
  if (!$user->logged_in)
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

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
				<!-- Edit Shipment -->
				<?php switch(Filter::$action): case "ship": ?>
				<?php  $row = Core::getRowById(Core::cTable, Filter::$id);?>
				<form id="admin_form" method="post">
					<div class="row">
						<div class="col-sm-12 col-lg-6">
							<div class="card">
								<div class="card-body">
								<h4 class="card-title"><?php echo $lang['edit-courier2'] ?></h4>
									<div class="row">
										<div class="col-sm-12 col-md-6" style="display:none">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courier5'] ?></label>
												<div class="input-group mb-3">
													<input type="email" class="form-control" name="r_email" value="<?php echo $row->r_email;?>" readonly>
												</div>
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-courier6'] ?></label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_name" value="<?php echo $row->r_name;?>" readonly>
											</div>
										</div>
									</div>
									<div class="row" style="display:none">
										<div class="col-sm-12 col-md-4">
											<label for="inputlname" class="control-label col-form-label">Address</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_address" value="<?php echo $row->r_address;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label">Phone</label>
											<div class="input-group mb-3">
												<input type="number" class="form-control" name="r_phone" value="<?php echo $row->r_phone;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label">Cell Phone</label>
											<div class="input-group mb-3">
												<input type="number" class="form-control" name="rc_phone" value="<?php echo $row->rc_phone;?>">
											</div>
										</div>									                                     
									</div>
									<div class="row" style="display:none"> 
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label">Destination</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_dest" value="<?php echo $row->r_dest;?>">
											</div>
										</div>  
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label">City</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_city" value="<?php echo $row->r_city;?>">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="r_postal" value="<?php echo $row->r_postal;?>">
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
												<input type="text" class="form-control" id="search_location" value="<?php echo $row->r_address;?>" placeholder="Search address in google" required>
											</div>
										</div>		
								
										<div class="col-sm-12 col-md-12">
											<div class="form-group">											
												<!-- display google map -->
												<div id="geomap" style="height: 200px"></div>
											</div>
										</div>
									</div>
									
									<div class="row"> </br></div>
									<hr class="m-t-0 m-b-35">
									
									<h4 class="card-title"><?php echo $lang['edit-courier7'] ?></h4>
		
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-courier12'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
											<div class="input-group">
												<input class="form-control" name="package" value="<?php echo $row->package;?>">	
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courier13'] ?></label>
											<div class="input-group">
												<input class="form-control" name="courier" value="<?php echo $row->courier;?>">
											</div>
										</div>										
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courier14'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
											<div class="input-group">
												<input class="form-control" name="status_courier" value="<?php echo $row->status_courier;?>" readonly>
											</div>
										</div>								                                     
									</div>
									<div class="row"> 									
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier15'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
												</div>
												<input type="text" class="form-control" name="deli_time" value="<?php echo $row->deli_time;?>">
											</div>
										</div>

										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier16'] ?></label>
											<div class="input-group mb-3">
												<input class="form-control" name="service_options" value="<?php echo $row->service_options;?>">
											</div>
										</div>
										
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier17'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
											<div class="input-group mb-3">
												<input class="form-control" name="pay_mode" value="<?php echo $row->pay_mode;?>">
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>

						<div class="col-sm-12 col-lg-6">
							<div class="card">
								<div class="card-body">
								<h4 class="card-title"><?php echo $lang['edit-courier20'] ?></h4>
								
									<div class="row">
										<div class="col-sm-12 col-md-6">										
											<label for="inputcom" class="control-label col-form-label"><?php echo $lang['edit-courier21'] ?></label>	
											<div class="input-group mb-4">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $row->letter_or;?></span>
											</div>	
												<input type="text" class="form-control" name="tracking" value="<?php echo $row->tracking;?>" readonly>
											</div>
										</div>

										<div class="col-sm-12 col-md-3">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier22'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
												</div>
												<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $row->r_tax;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier23'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
												</div>
												<input type="number" class="form-control"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $row->r_insurance;?>">											
											</div>
										</div>
									</div>
									<div class="row"></br></div>
									<div class="card-body bg-light">
										<div class="row"> 
											<div class="col-sm-12 col-md-4">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier24'] ?></label>
												<div class="input-group">
													<input class="form-control" name="itemcat" value="<?php echo $row->itemcat;?>">
												</div>
											</div> 
											<div class="col-sm-12 col-md-4">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courier25'] ?></label>
												<div class="input-group">
													<input type="text" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courier27'] ?>" class="form-control" name="r_qnty" value="<?php echo $row->r_qnty;?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-courier26'] ?></label>
												<div class="input-group">
													<input type="text" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-courier41'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum4" name="r_weight" value="<?php echo $row->r_weight;?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-12">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier28'] ?></label>
												<div class="input-group">
													 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['edit-courier29'] ?>"><?php echo $row->r_description;?></textarea>
												</div>
											</div>
										</div>
										<div class="row"> </br></br></div>
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-courier37'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-courier36'] ?>"></i></b></label>
												<div class="input-group">
													<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom" value="<?php echo $row->r_custom;?>">
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-courier38'] ?></label>
												<input class="form-control" name="r_curren" value="<?php echo $row->r_curren;?>" readonly>
											</div>
										</div>									
									</div>
									<hr class="m-t-0 m-b-5">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<label class="control-label text-left col-md-5"><?php echo $lang['edit-courier39'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
													<div class="col-md-6">
														<p class="form-control-static"> <input type="text" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-courier40'] ?>" class="form-control" name="r_costtotal" id="total_result" value="<?php echo $row->r_costtotal;?>" readonly> </p>
													</div>
												</div>
											</div>
											<!--/span-->
										</div>
									</div>
									<hr>
									<div class="form-actions">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-offset-3 col-md-9">
															<input type="hidden" name="r_address" value="<?php echo $row->r_address;?>" class="search_addr">
															<input type="hidden" name="latitude" value="<?php echo $row->latitude;?>" class="search_latitude">
															<input type="hidden" name="longitude" value="<?php echo $row->longitude;?>" class="search_longitude">
															<button type="submit" name="dosubmit" class="btn btn-success"> <i class="ti-reload"></i>&nbsp; <?php echo $lang['edit-courier18'] ?></button>
															<a href="booking_list.php" class="btn btn-dark"><i class="icon-action-undo"></i><?php echo $lang['edit-courier19'] ?></a> 
														</div>
													</div>
												</div>
												<div class="col-md-6"> </div>
											</div>
										</div>
									</div>
									<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
								</div>
							</div>
						</div>
					</div>
				</form>
                <!-- End row -->
            </div>
			<?php echo Core::doForm("processBooking","../ajax/controller.php");?> 
			<?php break;?>
			<?php endswitch;?>

			 <?php include 'templates/footer_edit_courier.php'; ?>