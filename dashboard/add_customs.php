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
	$rows = $user->getUserData();
	
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
	
    <title><?php echo $lang['left383'] ?>  | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDo8U67OYdk92BXV9y00n2LaxkMFE75DkU&callback=myMap.initMap&libraries=places"></script>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link href="../assets/css_log/front.css" rel="stylesheet" type="text/css">

	<style>
		#map-canvas{
			width: 100%;
			height: 250px;
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
		   
		<?php  $roww = Core::getRowById(Core::cTable, Filter::$id);?>
		<?php $office = $core->getOffices(); ?>
		
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
						<?php echo $lang['left384'] ?> <b><?php echo $roww->order_inv;?></b>
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
					<div class="col-sm-12 col-lg-12">
						 <div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['left385'] ?></h4>
								<p><small><?php echo $lang['left386'] ?> <b><?php echo $roww->agency;?></b> | <?php echo $lang['left387'] ?> <b><?php echo $roww->origin_off;?></b></small></p>
								<div class="row">																		
									<?php if($rows->userlevel == 9){?>
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group">
											<select class="custom-select col-12" id="exampleFormControlSelect1" name="origin_off" >
											<?php foreach ($office as $row):?>
												<option value="<?php echo $row->name_off; ?>"><?php echo $row->name_off; ?></option>
											<?php endforeach;?>
											</select>
										</div>
									</div>
									
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['left388'] ?></label>
										<div class="input-group">
											<input class="form-control" name="novelty_origin" placeholder="<?php echo $lang['left389'] ?>">
										</div>
									</div>
									<?php }else if($rows->userlevel == 2){?>
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title14'] ?></label>
										<div class="input-group">
											<input class="form-control" name="origin_off" value="<?php echo $user->name_off; ?>" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['left390'] ?></label>
										<div class="input-group">
											<input class="custom-select col-12" id="exampleFormControlSelect1" name="novelty_origin" placeholder="<?php echo $lang['left391'] ?>">
										</div>
									</div>
									<?php } ?>	
									<!--/span-->
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left392'] ?></label>
										<div class="input-group mb-3">
											<input class="custom-select col-12" name="type_novelty" placeholder="-- <?php echo $lang['left393'] ?> --" list="browsersnovelty" autocomplete="off" required>
											<datalist id="browsersnovelty">	
												<option value="Novedad Aduana"><?php echo $lang['left394'] ?></option>
											</datalist>	
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['left395'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="ti-money"></i></span>
											</div>
											<input type='number' class="form-control" name="readjustment" placeholder="<?php echo $lang['left396'] ?>" >
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left391'] ?></label>
										<div class="input-group mb-3">
											<input class="custom-select col-12" name="novelty_concept" placeholder="-- <?php echo $lang['left398'] ?> --" list="browserscustom" autocomplete="off" required>
											<datalist id="browserscustom">	
												<option value="APREHENSION">Aprehensión</option>
												<option value="CAMBIO DE MODALIDAD">Cambio de modalidad</option>
												<option value="INMOVILIZACION DIAN">Inmovilización DIAN</option>
												<option value="INMOVILIZACION INVIMA">Inmovilización INVIMA</option>
												<option value="INMOVILIZACION ICA">Inmovilización ICA</option>
												<option value="RE VALORACION ADUANERA (Reajuste)">Re Valoración Aduanera (Reajuste Precio)</option>
											</datalist>	
										</div>
									</div>
								</div>	
								<div class="row">	
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left399'] ?></i></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span style="color:#ff0000" class="ti-calendar"></span>
												</span>
											</div>
											<input type='text' class="form-control" id='datetimepicker1' name="date_novelty" placeholder="<?php echo $lang['left400'] ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" required />
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left401'] ?></i></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><?php echo $roww->r_curren;?></span>
											</div>
											<input type="text" class="form-control" name="declared_value" value="<?php echo $roww->r_custom;?>" placeholder="<?php echo $lang['left402'] ?>" readonly />
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left403'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-lock"></i></span>
											</div>
											<input type="text" class="form-control" name="status_novelty" Value="locked" readonly>
										</div>
									</div>
								</div>
								<div class="card-body bg-light">
									<div class="row">										
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left404'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="4" name="novelty_observation" placeholder="<?php echo $lang['left405'] ?>"></textarea>
											</div>
											<p><small style="color:red;"><?php echo $lang['left407'] ?></small></p>
										</div>
									</div>
								</div>
								<div class="row"> 									
									<input type="hidden" name="id_custom" value="<?php echo $roww->id;?>">
									<input type="hidden" name="n_qid" value="<?php echo $roww->qid;?>">
									<input type="hidden" name="order_inv" value="<?php echo $roww->order_inv;?>">
									<div class="form-actions">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
												<hr>
													<div class="row">
														<div class="col-md-offset-3 col-md-12">
															<button type="submit" name="dosubmit" class="btn btn-success"> <i class="ti-pencil-alt"></i>&nbsp; <?php echo $lang['left406'] ?></button>
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
				</form>
                <!-- End row -->
				</div>
            </div>
			<?php echo Core::doForm("processNovelty");?>
				
			<?php include 'templates/footer_container.php'; ?>
			