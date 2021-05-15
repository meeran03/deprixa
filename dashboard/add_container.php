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
	$roww = $user->getUserData();
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en" ng-app="app">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title><?php echo $lang['conlist-title24'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	

</head>

<body ng-controller="memberdata" ng-init="fetch()">

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
		   
		<?php $row = Core::getRowById(Users::uTable, Filter::$id); ?>	
		<?php $office = $core->getOffices(); ?>
		<?php $linerow = $core->getShipline(); ?>
		<?php $statusrow = $core->getStatus(); ?>
		<?php $packrow = $core->getPack(); ?>
		<?php $payrow = $core->getPayment(); ?>
		<?php $itemrow = $core->getItem(); ?>
		<?php $incorow = $core->getIncoterms();?>
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
						</br>
						<?php echo $lang['conlist-title25'] ?> <b><?php echo $row->fname;?> <?php echo $row->lname;?></b>
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
					<div class="col-sm-12 col-lg-8" style="display:none">
						 <div class="card card-hover">
							<div class="card-body">
								<h4 class="card-title">Sender Data:</h4>
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
											<label for="inputname" class="control-label col-form-label">Sender Name</label>
											<input type="text" class="form-control is-valid" name="r_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="First Name Here">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Addres</label>
											<input type="text" class="form-control is-valid" name="r_address" value="<?php echo $row->address;?>" placeholder="Address">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">Phone</label>
											<input type="number" class="form-control is-valid" name="r_phone" value="<?php echo $row->phone;?>"" placeholder="Phone">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Origin</label>
											<input type="text" class="form-control is-valid" name="r_dest" value="<?php echo $row->country;?>" placeholder="Origin">
										</div>
									</div>                                       
								</div>
								<div class="row"> 
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">City</label>
											<input type="text" class="form-control is-valid" name="r_city" value="<?php echo $row->city;?>" placeholder="City">
										</div>
									</div>
								
									<div class="col-sm-12 col-md-3">
										<div class="form-group">
											<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
											<input type="text" class="form-control is-valid" name="r_postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<div class="form-group">
											<label for="inputcontact" class="control-label col-form-label">Email</label>
											<input type="email" class="form-control is-valid" name="r_email" value="<?php echo $row->email;?>" placeholder="Email">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-8">
						 <div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['conlist-title26'] ?></h4>
								<div class="row">									
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" disabled>
										</div>
									</div>
									<?php if($roww->userlevel == 9){?>
									<div class="col-sm-12 col-md-12">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group mb-3">
											<select class="custom-select col-12" id="exampleFormControlSelect1" name="origin_off" >
											<?php foreach ($office as $row):?>
												<option value="<?php echo $row->name_off; ?>"><?php echo $row->name_off; ?></option>
											<?php endforeach;?>
											</select>
										</div>
									</div>
									<?php }else if($roww->userlevel == 2){?>
									<div class="col-sm-12 col-md-12">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="origin_off" value="<?php echo $user->name_off; ?>" readonly>
										</div>
									</div>
									<?php } ?>	
									<!--/span-->
									
									<div class="col-sm-12 col-md-4">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['conlist-title27'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="origin_port" placeholder="<?php echo $lang['conlist-title28'] ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['conlist-title29'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="destination_port" placeholder="<?php echo $lang['conlist-title30'] ?>" >
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title37'] ?></label>
										<div class="input-group mb-3">
											<select class="custom-select col-12" name="ship_mode">
												<option value="<?php echo $lang['conlist-title38'] ?>"><?php echo $lang['conlist-title38'] ?></option>
												<option value="<?php echo $lang['conlist-title39'] ?>"><?php echo $lang['conlist-title39'] ?></option>
												<option value="<?php echo $lang['conlist-title40'] ?>"><?php echo $lang['conlist-title40'] ?></option>
											</select>	
										</div>
									</div>
								</div>	
								<div class="row">	
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title33'] ?></i></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span style="color:#ff0000" class="ti-calendar"></span>
												</span>
											</div>
											<input type='text' class="form-control" id='datetimepicker1' name="expiration_date" placeholder="Default Pickadate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title31'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="s_week" placeholder="<?php echo $lang['conlist-title32'] ?>" value="<?php echo $numeroSemana = date("W");  ?>" />
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title42'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
											</div>
											<input type="text" class="form-control" name="deli_time" value="<?php echo $lang['conlist-title43'] ?>" placeholder="Select shipping time" list="browsersstatus" autocomplete="off" >
											<datalist id="browsersstatus">
												<?php foreach ($delitimerow as $row):?>
												<option value="<?php echo $row->delitime; ?>"><?php echo $row->delitime; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['conlist-title35'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
										<div class="input-group">
											<input class="custom-select col-12" name="package" placeholder="Select Package" list="browserr" autocomplete="off" required="required">
											<datalist id="browserr">
												<?php foreach ($packrow as $row):?>
												<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title36'] ?></label>
										<div class="input-group">
											<input class="custom-select col-12" name="courier" placeholder="Select Courier" list="browserssss" autocomplete="off" required="required">
											<datalist id="browserssss">
												<?php foreach ($linerow as $row):?>
												<option value="<?php echo $row->ship_line; ?>"><?php echo $row->ship_line; ?></option>
												<?php endforeach;?>
											</datalist>
										</div>
									</div>
									
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title44'] ?></label>
										<div class="input-group mb-3">
											<input class="custom-select col-12" name="incoterms" placeholder="Select Incoterms" list="browserss" autocomplete="off" required="required">
											<datalist id="browserss">
												<?php foreach ($incorow as $row):?>
												<option value="<?php echo $row->inco_name; ?>"><?php echo $row->inco_name; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>                                
								</div>
								<div class="row"> 									
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title45'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
										<div class="input-group mb-3">
											<input class="custom-select col-12" name="pay_mode" placeholder="Select Pay Mode" list="browsersss" autocomplete="off" required="required">
											<datalist id="browsersss">
												<?php foreach ($payrow as $row):?>
												<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
												<?php endforeach;?>
											</datalist>	
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['conlist-title46'] ?></label>
										<input class="custom-select col-12" name="r_curren" placeholder="Select Currency" list="browsers" autocomplete="off" required="required">
										<datalist id="browsers">
											<option value="" disabled=""><?php echo $lang['conlist-title46'] ?></option>
											<option label="AED" value="AED">AED</option>
											<option label="ARS" value="ARS">ARS</option>
											<option label="AUD" value="AUD">AUD</option>
											<option label="BGN" value="BGN">BGN</option>
											<option label="BND" value="BND">BND</option>
											<option label="BOB" value="BOB">BOB</option>
											<option label="BRL" value="BRL">BRL</option>
											<option label="CAD" value="CAD">CAD</option>
											<option label="CHF" value="CHF">CHF</option>
											<option label="CLP" value="CLP">CLP</option>
											<option label="CNY" value="CNY">CNY</option>
											<option label="COP" value="COP">COP</option>
											<option label="CZK" value="CZK">CZK</option>
											<option label="DKK" value="DKK">DKK</option>
											<option label="EGP" value="EGP">EGP</option>
											<option label="EUR" value="EUR">EUR</option>
											<option label="FJD" value="FJD">FJD</option>
											<option label="GBP" value="GBP">GBP</option>
											<option label="HKD" value="HKD">HKD</option>
											<option label="HRK" value="HRK">HRK</option>
											<option label="HUF" value="HUF">HUF</option>
											<option label="IDR" value="IDR">IDR</option>
											<option label="ILS" value="ILS">ILS</option>
											<option label="INR" value="INR">INR</option>
											<option label="JPY" value="JPY">JPY</option>
											<option label="KES" value="KES">KES</option>
											<option label="KRW" value="KRW">KRW</option>
											<option label="LTL" value="LTL">LTL</option>
											<option label="MAD" value="MAD">MAD</option>
											<option label="MXN" value="MXN">MXN</option>
											<option label="MYR" value="MYR">MYR</option>
											<option label="NGN" value="NGN">NGN</option>
											<option label="NOK" value="NOK">NOK</option>
											<option label="NZD" value="NZD">NZD</option>
											<option label="PEN" value="PEN">PEN</option>
											<option label="PHP" value="PHP">PHP</option>
											<option label="PKR" value="PKR">PKR</option>
											<option label="PLN" value="PLN">PLN</option>
											<option label="RON" value="RON">RON</option>
											<option label="RSD" value="RSD">RSD</option>
											<option label="RUB" value="RUB">RUB</option>
											<option label="SAR" value="SAR">SAR</option>
											<option label="SEK" value="SEK">SEK</option>
											<option label="SGD" value="SGD">SGD</option>
											<option label="THB" value="THB">THB</option>
											<option label="TRY" value="TRY">TRY</option>
											<option label="TWD" value="TWD">TWD</option>
											<option label="UAH" value="UAH">UAH</option>
											<option label="USD" value="USD" selected="selected">USD</option>
											<option label="VEF" value="VEF">VEF</option>
											<option label="VND" value="VND">VND</option>
											<option label="ZAR" value="ZAR">ZAR</option>
										</datalist>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['conlist-title41'] ?> <i style="color:#ff0000" class="mdi mdi-ferry"></i></label>
										<div class="input-group">
											<input class="custom-select col-12" name="status_courier" placeholder="Select Status" list="browserstatus" autocomplete="off" required="required">
											<datalist id="browserstatus">
												<?php foreach ($statusrow as $row):?>
												<?php if($row->mod_style == 'Delivered'){?>
												<?php }elseif($row->mod_style == 'Pending'){?>
												<?php }elseif($row->mod_style == 'Rejected'){?>
												<?php }elseif($row->mod_style == 'Consolidated'){?>
												<?php }else{ ?>
												<option value="<?php echo $row->mod_style; ?>"><?php echo $row->mod_style; ?></option>
												<?php } ?>
												<?php endforeach;?>
											</datalist>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					
					<?php $track = $courier->container_track();?>
					<?php $prefix = $courier->container_prefix();?>
					<div class="col-sm-12 col-lg-4">
						 <div class="card card-hover">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['conlist-title47'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label"><?php echo $lang['conlist-title48'] ?></label>
										<div class="input-group mb-6">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
											</div>	
											<input type="text" class="form-control" name="tracking" value="<?php echo $track;?>" readonly>
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title49'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();"  id="sum3" name="r_tax" value="<?php echo $core->tax;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title50'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control"  onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="sum5" name="r_insurance" value="<?php echo $core->insurance;?>">											
										</div>
									</div>
								</div>
								<div class="card-body bg-light">
									<div class="row">										
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title51'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="12" name="s_description" placeholder="<?php echo $lang['conlist-title52'] ?>"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 col-lg-4">
						 <div class="card card-hover">
							<div class="card-body">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['conlist-title53'] ?> <i class="mdi mdi-view-week" style="color:#36bea6"></i> <?php echo $lang['conlist-title54'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-html="true" data-placement="top" title="-20 Pies Standard 20´ x 8´ x 8´6″.<br>-40 Pies Standard 40´ x 8´ x 8´6″.<br>-40 Pies High Cube 40´ x 8´ x 9´6″."></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['conlist-title55'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="l1" value="0" name="length">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['conlist-title56'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}"  onKeyUp="suma();" id="w2" value="0" name="width">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['conlist-title57'] ?>" class="form-control" onblur="if(this.value == ''){this.value='0'}" onKeyUp="suma();" id="h3" value="0" name="height">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title58'] ?> <b><i class="mdi mdi-weight" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['conlist-title59'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" name="n_weight" placeholder="Net weight...">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['conlist-title60'] ?> <b><i class="mdi mdi-weight-kilogram" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['conlist-title61'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" name="g_weight" placeholder="<?php echo $lang['conlist-title62'] ?>">
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
													<div class="col-md-offset-3 col-md-12">
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-view-week"></i>&nbsp; <?php echo $lang['conlist-title63'] ?></button>
														<a href="client_container.php" class="btn waves-effect waves-light btn-outline-secondary"><i class="icon-action-undo"></i> <i class="icon-people"></i> <?php echo $lang['conlist-title64'] ?></a> 
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
				</form>
                <!-- End row -->
				
				
				<div class="col-sm-12 col-lg-8">
					 <div class="card card-hover">
						<div class="card-body">
							<h4 class="card-title"><?php echo $lang['conlist-title65'] ?></h4>
							<div class="row">																		
								<div class="col-md-12">	
									<div class="alert alert-success text-center" ng-show="success">
										<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check"></i> {{ successMessage }}
									</div>
									<div class="alert alert-danger text-center" ng-show="error">
										<button type="button" class="close" ng-click="clearMessage()"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i> {{ errorMessage }}
									</div>
									<form name="addForm" novalidate>
										<fieldset ng-repeat="memberfield in memberfields">
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-4">
															<input type="text" placeholder="Description" class="form-control m-t-20" ng-model="memberfield.detail_container" required>
														</div>
														<div class="col-md-2">
															<input type="number" placeholder="Quantity" class="form-control m-t-20" ng-model="memberfield.detail_qty" required>
														</div>
														<div class="col-md-2">
															<input type="number" placeholder="Weight" class="form-control m-t-20" ng-model="memberfield.detail_weight" required>
														</div>
														<div class="col-md-2">
															<input type="number" placeholder="Price" class="form-control m-t-20" ng-model="memberfield.price" required>
													
														</div>														
														<div class="col-md-2">
															<button class="btn btn-danger m-t-20" type="button" ng-show="$last" ng-click="removeField()"><i class="ti ti-minus"></i></button>
														</div>
													</div>
												</div>
											</div>									
										</fieldset>
										</br></br>
										<button type="button" class="btn waves-effect waves-light btn-outline-secondary" ng-click="newfield()"><span class="ti ti-plus"></span> <?php echo $lang['langs_063'] ?></button>
										<button type="button" class="btn waves-effect waves-light btn-outline-info" ng-disabled="addForm.$invalid" ng-click="submitForm()"><span class="ti ti-save"></span> Save item</button>									
									</form>
									<br>
									
									<table id="zero_config" class="table table-condensed table-hover table-striped">
										<thead>
											<tr>
												<th><input type="checkbox" ng-model="checkAll" ng-change="toggleAll()"></th>
												<th><?php echo $lang['conlist-title69'] ?></th>
												<th><?php echo $lang['conlist-title70'] ?></th>
												<th><?php echo $lang['conlist-title71'] ?></th>
												<th><?php echo $lang['conlist-title72'] ?></th>
												<th><?php echo $lang['conlist-title73'] ?></th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="member in members" >
												<td><input type="checkbox" ng-model="member.Selected" ng-change="toggleOne()"></td>
												<td>{{ member.detail_container }}</td>
												<td>{{ member.detail_qty }}</td>
												<td>{{ member.detail_weight }}</td>
												<td>{{ member.price }}</td>
												<td>{{ member.tprice }}</td>
											</tr>
											<button type="button" class="btn waves-effect waves-light btn-xs btn-outline-danger " ng-click="deleteAll()"><i class="mdi mdi-trash"></i> Delete</button>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
            </div>
			<?php echo Core::doForm("processContainer");?>
				
			<?php include 'templates/footer_container.php'; ?>