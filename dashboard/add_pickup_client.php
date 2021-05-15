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
// Turn off error reporting

  define("_VALID_PHP", true);
  require_once("../init.php");
  
   if (!$user->logged_in)
	
	$roww = $user->getUserData();
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
	
    <title><?php echo $lang['left82'] ?> | <?php echo $core->site_name ?></title>
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
                <!-- row -->
				<form id="admin_form" method="post">
                <div class="row">
					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
								<div style="display:none">
									<h4 class="card-title"><?php echo $lang['left83'] ?></h4>
									<hr>
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label">User Name</label>
												<input type="text" class="form-control is-valid" name="username" value="<?php echo $row->username;?>" placeholder="User Name Here">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputname" class="control-label col-form-label"><?php echo $lang['left84'] ?></label>
												<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="<?php echo $lang['left85'] ?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left86'] ?></label>
												<input type="email" class="form-control is-valid" name="email" value="<?php echo $row->email;?>" placeholder="<?php echo $lang['left87'] ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<div class="form-group">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left88'] ?></label>
												<input type="text" class="form-control is-valid" name="address" value="<?php echo $row->address;?>" placeholder="<?php echo $lang['left89'] ?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left90'] ?></label>
												<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->phone;?>" placeholder="<?php echo $lang['left108'] ?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left109'] ?></label>
												<input type="text" class="form-control is-valid" name="country" value="<?php echo $row->country;?>" placeholder="<?php echo $lang['left91'] ?>">
											</div>
										</div>                                       
									</div>
									<div class="row"> 
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left92'] ?></label>
												<input type="text" class="form-control is-valid" name="city" value="<?php echo $row->city;?>" placeholder="<?php echo $lang['left93'] ?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left94'] ?></label>
												<input type="text" class="form-control is-valid" name="postal" value="<?php echo $row->postal;?>" placeholder="<?php echo $lang['left95'] ?>">
											</div>
										</div>	
									</div>
								</div>
								
								<h4 class="card-title"><i class="mdi mdi-information-outline" style="color:#36bea6"></i> <?php echo $lang['add-title3'] ?></h4>
								<br>
								<!-- Collapse buttons -->
								<a class="btn waves-effect waves-light btn-xs btn-info btn-outline-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-align-left"></i> <?php echo $lang['left193'] ?></a>
									
									<div class="row">
										<div class="col-12 col-sm-6 col-md-6">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title4'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
												</div>
												<input type="text" class="form-control" id="searchnames"  name="r_name" autofocus placeholder="<?php echo $lang['left194'] ?>" autocomplete="off" required>
											</div>
										</div>
										<div class="col-12 col-sm-6 col-md-6">
											<div class="form-group">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title5'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">@</span>
													</div>
													<input type="email" class="form-control" id="mail" name="r_email"  placeholder="<?php echo $lang['left195'] ?>" required>
												</div>
											</div>
										</div>
									</div>
									<!-- Collapsible element -->
									<div class="collapse" id="collapseExample">
										<div class="row">
											<div class="col-12 col-sm-6 col-md-6">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title8'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>
													</div>
													<input type="number" class="form-control"  name="r_phone"  placeholder="(+1) ##-#######">
												</div>
											</div>
											<div class="col-12 col-sm-6 col-md-6">
												<label for="inputcontact" class="control-label col-form-label" style="color:#ff0000"><b><?php echo $lang['add-title9'] ?></b></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-screen-smartphone"></i></span>
													</div>
													<input type="number" class="form-control" id="phones" name="rc_phone" placeholder="(+1) ## ######">
												</div>
											</div>									                                     
										</div>
										<div class="row"> 
											<div class="col-12 col-sm-4 col-md-4">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title10'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-location-pin"></i></span>
													</div>
													<input type="text" class="form-control" id="zones" name="r_dest" placeholder="<?php echo $lang['left196'] ?>" required="required">
												</div>
											</div>  
											<div class="col-12 col-sm-4 col-md-4">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title11'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-map"></i></span>
													</div>
													<input type="text" class="form-control" id="citys" name="r_city" placeholder="<?php echo $lang['left197'] ?>">
												</div>
											</div>
										
											<div class="col-12 col-sm-4 col-md-4">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title12'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-pin"></i></span>
													</div>
													<input type="text" class="form-control" id="zips" name="r_postal" placeholder="<?php echo $lang['left198'] ?>">
												</div>
											</div>
										</div>
									</div>
									<!-- / Collapsible element -->
								
								<div class="row"> </br></div>
								<hr class="m-t-0 m-b-35">

								<div class="row">
									<div class="col-sm-12 col-md-12">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['left96'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
											</div>
											<input type="text" class="form-control" id="search_location" placeholder="<?php echo $lang['left97'] ?>" required>
											<div class="input-group-btn">
												<button class="btn btn-info get_map" type="submit">
													<?php echo $lang['left98'] ?>
												</button>
											</div>
										</div>
									</div>		
							
									<div class="col-sm-12 col-md-12">
										<div class="form-group">											
											<!-- display google map -->
											<div id="geomap" style="height: 210px"></div>
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
							<h4 class="card-title"><?php echo $lang['left99'] ?></h4>
							
								<div class="row" style="display:none">
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label"><?php echo $lang['add-title24'] ?></label>
										<div class="input-group mb-4">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
											</div>	
											<input type="text" class="form-control" name="tracking" value="<?php echo $track;?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title25'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
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
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
										</div>
									</div>
									
									<div class="col-12 col-sm-6 col-md-6">
										<div class="form-group">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['left100'] ?> <i style="color:#ff0000" class="fas fas fa-building"></i></label>
											<input class="custom-select col-12" name="agency" placeholder="--<?php echo $lang['left101'] ?>--" list="browsersag" autocomplete="off" required="required">
											<datalist id="browsersag">
												<?php foreach ($agencyrow as $row):?>
												<option value="<?php echo $row->name_branch; ?>"><?php echo $row->name_branch; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									
									<?php if($roww->userlevel == 9){?>
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group mb-3">
											<select class="custom-select col-12" id="exampleFormControlSelect1" name="origin_off" placeholder="Select Office">
											<?php foreach ($office as $row):?>
												<option value="<?php echo $row->name_off; ?>"><?php echo $row->name_off; ?></option>
											<?php endforeach;?>
											</select>
										</div>
									</div>
									<?php }else if($roww->userlevel == 2){?>
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="origin_off" value="<?php echo $user->name_off; ?>" placeholder="Select Office" readonly>
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
											<input type='text' class="form-control" id='datetimepicker1' name="collection_courier" placeholder="<?php echo $lang['left102'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
										</div>
									</div>
			
									<div class="col-sm-12 col-md-6" style="display:none;">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_035'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" style="color:#ff0000"><i class="fas fa-car"></i></span>
											</div>
												<select class="custom-select col-12" id="exampleFormControlSelect1" name="c_driver"  placeholder="--<?php echo $lang['left103'] ?>--">
												
													<?php foreach ($driverrow as $row):?>
													<option value="<?php echo $row->username; ?>"><?php echo $row->fname; ?> <?php echo $row->lname; ?></option>
													<?php endforeach;?>
												</select>
										</div>
									</div>								
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title17'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
										<div class="input-group">
											<input class="custom-select col-12" name="package" placeholder="--<?php echo $lang['left104'] ?>--" list="browsers1" autocomplete="off" required="required">
											<datalist id="browsers1">
												<?php foreach ($packrow as $row):?>
												<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>									
									<div class="col-sm-12 col-md-6">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left105'] ?> <i style="color:#ff0000" class="mdi mdi-clock-fast"></i></label>
										<div class="input-group">
											<input class="form-control" name="status_courier" value="Pick up" required="required" readonly>
										</div>
									</div>								                                     
								</div>
								<div class="row"></br></div>
								<div class="card-body bg-light">
									<div class="row"> 
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title27'] ?></label>
											<div class="input-group">
												<input class="form-control" name="itemcat" placeholder="--<?php echo $lang['left106'] ?>--" list="browsers4" autocomplete="off" required="required">
												<datalist id="browsers4">
													<?php foreach ($itemrow as $row):?>
													<option value="<?php echo $row->name_item; ?>"><?php echo $row->name_item; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div> 
										<div class="col-sm-12 col-md-6">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title28'] ?></label>
											<div class="input-group">
												<input type="number" class="form-control" name="r_qnty" placeholder="--<?php echo $lang['left110'] ?>--" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title30'] ?>" >
											</div>
										</div>
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"></textarea>
											</div>
										</div>
									</div>
									
									<div class="row" style="display:none">
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title40'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title41'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum2" name="r_custom"  placeholder="0">
											</div>
										</div>
										<div class="col-sm-12 col-md-6" style="display:none">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
											<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" >
										</div>
									</div>									
								</div>
								<hr class="m-t-0 m-b-5">
								<div class="card-body" style="display:none">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group row">
												<label class="control-label text-left col-md-5"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
												<div class="col-md-6">
													<p class="form-control-static"> <input type="text" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" class="form-control" name="r_costtotal" id="total_result" value="0" readonly> </p>
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
													<div class="col-sm-12 col-md-12">
														<input type="hidden" name="r_address" class="search_addr">
														<input type="hidden" name="latitude" class="search_latitude">
														<input type="hidden" name="longitude" class="search_longitude">													
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-clock-fast"></i>&nbsp; <?php echo $lang['left107'] ?></button>
														
													</div>
												</div>
											</div>
											<div class="col-md-6"> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
				</form>
                <!-- End row -->
            </div>
			<?php echo Core::doForm("processPickupclient");?>

			<?php include 'templates/footer_add_courier.php'; ?>