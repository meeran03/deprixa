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
	
    <title><?php echo $lang['deliver-ship1'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="dist/css/style.min.css" rel="stylesheet">
	
	<script>
		function hacerFoto(){
			navigator.camera.getPicture(onSuccess, onFail, { quality: 50, destinationType: Camera.DestinationType.FILE_URI });
		}
									
	</script>
	
	<style type="text/css">
		#sig-clearBtn {
			color: #fff;
			background: #f99a0b;
			padding: 3px;
			border: none;
			border-radius: 3px;
			font-size: 10px;
			margin-top: 8px;
		}
	</style>
	
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
				<?php switch(Filter::$action): case "status_driver": ?>
				<?php $row = Core::getRowById(Core::cTable, Filter::$id);?>
				<div class="row justify-content-center">
					<!-- Column -->
					<div class="col-sm-12 col-lg-8">
						<div class="card">
							<div class="card-body">
								<div id="loader" style="display:none"></div>
								<div id="msgholder"></div>
								<form name="myForm" class="xform"  id="deliver_form" method="POST">
									<header>
									<h4 class="modal-title"><?php echo $lang['deliver-ship2'] ?> <?php echo $row->order_inv;?> 
									</h4> <?php echo $lang['deliver-ship3'] ?> <?php echo $row->r_dest;?> | <?php echo $row->r_city;?></header>
									
									<div class="row"> 										
										<div class="col-sm-12 col-md-4">
											<div class="input-group mb-3">
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['deliver-ship4'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<span style="color:#ff0000" class="ti-calendar"></span>
													</span>
												</div>
												<input type="text" class="form-control" id="datepicker-autoclose" name="deliver_date" placeholder="mm/dd/yyyy" >
											</div>
										</div>

										<div class="col-sm-12 col-md-4">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['deliver-ship5'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ti-timer"></i></span>
												</div>
												<input class="form-control" name="delivery_hour" value="<?php date_default_timezone_set("".$core->timezone.""); echo "" . date("h:i:sa"); ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<div class="input-group mb-3">
												<i align='left' class='display-3 text-warning d-block'><img src='assets/images/alert/deliver.png' width='200' /></i>
											</div>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship6'] ?></label>
											<textarea class="form-control" name="person_receives" placeholder="Name of the person who receives the package" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['left1070'] ?>" required><?php echo $row->r_name; ?></textarea>
										</div>
										<div class="col-sm-12 col-md-4">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship7'] ?></label>
											<div class="input-group mb-3">
												<textarea class="form-control" name="name_employee" id="name_employee" placeholder="Name of the driver or dealer" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['left1071'] ?>" required><?php echo $user->username; ?></textarea>
											</div>
										</div>
									
										<div class="col-sm-12 col-md-2" style="display:none">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship8'] ?></label>
											<input class="form-control" name="status_courier" value="Delivered" placeholder="<?php echo $lang['deliver-ship8'] ?>">
										</div>
										<div class="col-sm-12 col-md-2" style="display:none">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship9'] ?></label>
											<input class="form-control" name="act_status" value="2" placeholder="<?php echo $lang['deliver-ship9'] ?>">
										</div>	
									</div>
									
									<div class="row">
										<div class="col-sm-12 col-md-4">
											<div class="input-group mb-3">
												
											</div>
										</div>
										<div class="col-sm-12 col-md-8">
											<div class="form-group">
												<label class="subtitle"><?php echo $lang['left1064'] ?> </label>
												<input type="file" class="form-control form-control-sm" onclick="hacerFoto();" name="miarchivo[]" multiple="" accept="image/*" capture="camera">
											</div>
										</div>
									</div>
									
									<div class="row">	
										<div class="col-sm-12 col-md-4">
											<div class="input-group mb-3">
												
											</div>
										</div>
										
										<div class="col-sm-12 col-md-8">
											<label for="inputcontact" class="control-label col-form-label"><i align='left'><img src='assets/images/alert/sign_icon.png' width='32' /></i>&nbsp;&nbsp;&nbsp;<?php echo $lang['left1065'] ?></label>
											<div class="row">

												<!-- Trigger the modal with a button -->
												<button type="button" class="button" data-toggle="modal" data-target=".bs-example-modal-lg"> <?php echo $lang['left1066'] ?> </button>
												
												<!-- sample modal content -->
												<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="myLargeModalLabel"><?php echo $lang['left1067'] ?></h4>
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															</div>
															<div class="modal-body">
																<p>
																	<canvas id="sig-canvas" width="400" height="160">
																		Get a better browser.
																	</canvas>
																</p>
																
																<br><br><br><br><br><br><br><br>
																<span class="btn btn-danger" id="sig-clearBtn"><?php echo $lang['left1068'] ?></span>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal"><?php echo $lang['left1069'] ?></button>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												<!-- /.modal -->
											</div>
											<br/>
											<div class="row" style="display:none">
												<div class="col-md-8">
													<textarea  id="sig-dataUrl" name="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
												</div>
											</div>
										</div>
									</div>
									</br>
									<footer>
										<button type="submit" class="button"  onclick="mandarFirma()" id="sig-submitBtn" ><?php echo $lang['deliver-ship10'] ?><span><i class="ti-briefcase"></i></span></button>
										<a href="dash_driver.php" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['deliver-ship11'] ?></a> 
									</footer>
									<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />									
								</form>
							</div>
						</div>
					</div>
					<!-- Column -->
				</div>
                <!-- End row -->
            </div>
			<?php echo Courier::doForm("processDelivershipment");?> 
			<?php break;?>
			<?php endswitch;?>

			<!-- footer -->
			
            <?php include 'templates/footer.php'; ?>
			
			<script>
			// Date Picker
			jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
			jQuery('#datepicker-autoclose').datepicker({
				autoclose: true,
				todayHighlight: true
			});
			jQuery('#date-range').datepicker({
				toggleActive: true
			});
			jQuery('#datepicker-inline').datepicker({
				todayHighlight: true
			});
			</script>