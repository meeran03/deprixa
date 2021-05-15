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
	
    <title><?php echo $lang['langs_01'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">

	
	<style>
		.btn-sml {
			padding: 2px 3px;
			font-size: 9px;
			border-radius: 4px;
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
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
						</br>
						<?php echo $lang['langs_02'] ?> <b></b>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>
			
			<?php $track_con = $courier->ordertrack_consolidate();?>
			<?php $prefix_con = $courier->order_prefix_consolidate();?>
			<?php $driverrow = $user->getDrivers();?>
			<?php $statusrow = $core->getStatus(); ?>
			<?php $office = $core->getOffices(); ?>
			<?php $agencyrow = $core->getBranchoffices(); ?>
			<?php $moderow = $core->getShipmode();?>
			<?php $courierrow = $core->getCouriercom(); ?>
			<?php $payrow = $core->getPayment(); ?>
			<?php $delitimerow = $core->getDelitime();?>
			
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
	
				<form id="admin_form" method="post">
					<div class="row">
						<div class="col-lg-6 col-xl-6">
							<div class="card card-hover">
								<div class="card-body">
									<h4  class="card-subtitle"><i class="icon-people"></i> <?php echo $lang['left334'] ?></h4>
									<?php 

										$sql1 = $db->query("SELECT * FROM add_courier WHERE  act_status=1 AND con_status=0 limit 1");
										while ($rows=mysqli_fetch_array($sql1)){

											$s_name = $rows["s_name"];
											$username = $rows["username"];
											$email = $rows["email"];
											$phone = $rows["phone"];
											$country = $rows["country"];
											$city = $rows["city"];
											$postal = $rows["postal"];
												
									?>
									<!-- Collapse buttons -->
									<a class="btn waves-effect waves-light btn-xs btn-info btn-outline-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-align-left"></i> <?php echo $lang['left193'] ?></a>
									<br>
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title4'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
												</div>
												<input type="text" class="form-control" id="searchnames"  name="r_name" value="<?php echo $s_name; ?>" placeholder="<?php echo $lang['left335'] ?>" autocomplete="off" required>
											</div>
										</div>
										<div class="col-sm-12 col-md-6" style="display:none"> 
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_023'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
												</div>										
												<input type="text" class="form-control" id="users" name="username" value="<?php echo $username; ?>" placeholder="<?php echo $lang['left336'] ?>" >
											</div>
										</div>
									</div>
									<!-- Collapsible element -->
									<div class="collapse" id="collapseExample">
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title5'] ?></label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon1">@</span>
														</div>
														<input type="email" class="form-control" id="mail" name="r_email"  value="<?php echo $email; ?>" placeholder="<?php echo $lang['left337'] ?>" required>
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<label for="inputcontact" class="control-label col-form-label" style="color:#ff0000"><b><?php echo $lang['add-title9'] ?></b></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-screen-smartphone"></i></span>
													</div>
													<input type="number" class="form-control" id="phones" name="r_phone" value="<?php echo $phone; ?>" placeholder="(+1)3244152">
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
													<input type="text" class="form-control" id="zones" name="r_dest" value="<?php echo $country; ?>" required="required">
												</div>
											</div>  
											<div class="col-sm-12 col-md-4">
												<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title11'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-map"></i></span>
													</div>
													<input type="text" class="form-control" id="citys" name="r_city" value="<?php echo $city; ?>">
												</div>
											</div>
										
											<div class="col-sm-12 col-md-4">
												<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title12'] ?></label>
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="icon-pin"></i></span>
													</div>
													<input type="text" class="form-control" id="zips" name="r_postal" value="<?php echo $postal; ?>">
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
									<!-- / Collapsible element -->

									<div class="row">
										<div class="col-sm-12 col-md-12">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title6'] ?></label>
											<div class="input-group mb-3">
												
												<div class="input-group-btn">
													<button class="btn btn-secondary get_map" type="submit">
														<?php echo $lang['left339'] ?>
													</button>
												</div>
												<input type="text" class="form-control" id="search_location" placeholder="<?php echo $lang['left338'] ?>" required>
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
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
									
									
									<div class="row"> </br></div>
									<hr class="m-t-0 m-b-35">
									
									<h4 class="card-title"><?php echo $lang['langs_03'] ?></h4>

									<div class="table-responsive">
										<table id="zero_config" class="tablesaw table-striped table-hover table-bordered table" data-tablesaw-mode="columntoggle">
											<thead>
												<tr class="well">
													<th width="120"><strong><center><?php echo $lang['langs_06'] ?></center></strong></th>
													<th width="250"><strong><center><?php echo $lang['langs_08'] ?></center></strong></th>
													<th width="40"><strong><center><?php echo $lang['qquantity'] ?></center></strong></th>
													<th width="40"><strong><center><?php echo $lang['langs_09'] ?></center></strong></th>
													<th width="40"><strong><center><?php echo $lang['left340'] ?></center></strong></th>
												</tr>
											</thead>
											<?php 
												
												$neto=0;$item=0;$itemv=0;$netos=0;$netov=0;$items=0;$nums=0;$net=0;$iten=0;
												$sql = "SELECT COUNT(*) total FROM add_courier";
												$result = $db->query($sql);
												$fila = $result->fetch_assoc();
												$iten=$iten+$fila['total'];	
												$net=$iten;

												$sql = $db->query("SELECT * FROM add_courier WHERE  consol_id=1 AND con_status=0");

												while ($row=mysqli_fetch_array($sql)){

													$id = $row["id"];
													$order_inv = $row["order_inv"];
													$s_name = $row["s_name"];
													$itemcat = $row["itemcat"];
													$r_weight = $row["r_weight"];
													$v_weight = $row["v_weight"];
													$r_qnty = $row["r_qnty"];
													$act_status = $row["act_status"];
													$con_status = $row["con_status"];
													$consol_id = $row["consol_id"];
													$consol_tid = $row["consol_tid"];
													
													$item=$item+$row['r_weight'];
													$itemv=$itemv+$row['v_weight'];
													$items=$items+$row['r_qnty'];
													$neto=$item;
													$netov=$itemv;
													$netos=$items;
													
													if ($nums%2==0){
														$clase="clouds";
													} else {
														$clase="silver";
													} 
												
											?>
											<tr> 
												<td class="<?php echo $clase;?>" style="display:none"><input type="text" class="form-control" name="consol_tid" value="<?php echo $consol_tid; ?>"></td>
												<td class="<?php echo $clase;?>" style="display:none"><input type="text" class="form-control" name="consol_id" value="<?php echo $consol_id; ?>"></td>
												<td class="<?php echo $clase;?>" style="display:none"><input type="text" class="form-control" name="act_status" value="<?php echo $act_status; ?>"></td>
												<td class="<?php echo $clase;?>"><input type="text" class="form-control"  value="<?php echo $order_inv; ?>"></td>
												<td class="<?php echo $clase;?>"><input type="text" class="form-control" value="<?php echo $itemcat; ?>"></td>
												<td class="<?php echo $clase;?>"><input type="text" class="form-control" value="<?php echo $r_qnty; ?>"></td>
												<td class="<?php echo $clase;?>"><input type="text" class="form-control" value="<?php echo $r_weight; ?>"></td>
												<td class="<?php echo $clase;?>"><input type="text" class="form-control" value="<?php echo $v_weight; ?>"></td>												
											</tr>							
											<?php $nums++; } ?>
										</table>
									</div>

									<hr class="m-t-0 m-b-35">
									<div class="row"> 										
										<div class="col-md-12"> 
											<div class="form-group"> 
												<label for="field-3" class="control-label"><?php echo $lang['langs_042'] ?></label> 
												<textarea class="form-control" name="comments"  placeholder="<?php echo $lang['langs_041'] ?>" required></textarea> 
											</div> 
										</div> 
									</div>
							
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-xl-6">
							<div class="card card-hover">
								<div class="card-body">
									<div class="row">
										<div class="col-md-2"> 
											<div class="form-group"> 
												<label for="field-2" class="control-label"><?php echo $lang['langs_019'] ?></label> 
												<input type="text" class="form-control" name="letter_or" value="<?php echo $prefix_con;?>">													
											</div> 
										</div> 
										<div class="col-md-4"> 
											<div class="form-group"> 
												<label for="field-1" class="control-label"><?php echo $lang['langs_020'] ?>:</label> 			
												<input  type="text" class="form-control" name="tracking" value="<?php echo $track_con;?>">
											</div> 
										</div> 
										<div class="col-md-6"> 
											<div class="form-group"> 
												<label for="field-2" class="control-label"><?php echo $lang['langs_021'] ?></label> 
												<input name="seals" class="form-control" placeholder="00-00000">													
											</div> 
										</div> 
									</div> 
									<hr>
									
									<div class="row">
										<div class="col-12 col-sm-6 col-md-6">
											<div class="form-group">
												<label for="field-2" class="control-label"><?php echo $lang['left341'] ?> <i style="color:#ff0000" class="fas fas fa-building"></i></label>
												<input class="custom-select col-12" name="agency" placeholder="--<?php echo $lang['left342'] ?>--" list="browsersag" autocomplete="off" required="required">
												<datalist id="browsersag">
													<?php foreach ($agencyrow as $row):?>
													<option value="<?php echo $row->name_branch; ?>"><?php echo $row->name_branch; ?></option>
													<?php endforeach;?>
												</datalist>	
											</div>
										</div>
										
										<?php if($roww->userlevel == 9){?>
										<div class="col-md-6" > 
											<div class="form-group"> 
												<label for="field-2" class="control-label"><?php echo $lang['langs_037'] ?></label> 
												<input class="form-control" name="code_off" list="browsee" autocomplete="off" placeholder="--<?php echo $lang['left343'] ?>--">
												<datalist id="browsee">
													<?php foreach ($office as $row):?>
														<option value="<?php echo $row->name_off; ?>"><?php echo $row->name_off; ?></option>
													<?php endforeach;?>
												</datalist>													
											</div> 
										</div> 
										<?php }else if($roww->userlevel == 2){?>
										<div class="col-md-6" >
											<label for="field-2" class="control-label"><?php echo $lang['add-title14'] ?></label>
											<div class="input-group mb-3">
												<input class="form-control" name="code_off" value="<?php echo $user->name_off; ?>" readonly>
											</div>
										</div>
										<?php } ?>
									</div>
									
									<div class="row"> 										
										<div class="col-md-4" > 
											<div class="form-group"> 
												<label for="field-2" class="control-label"><?php echo $lang['langs_030'] ?></label> 
												<input name="courier" class="form-control" list="browsecom" autocomplete="off" placeholder="--<?php echo $lang['left344'] ?>--">
												<datalist id="browsecom">
													<?php foreach ($courierrow as $row):?>
														<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
													<?php endforeach;?>
												</datalist>
											</div> 
										</div>
										<div class="col-md-4"> 
											<div class="form-group"> 
												<label for="field-3" class="control-label"><?php echo $lang['langs_032'] ?></label> 
												<input class="form-control" name="service_options" list="browsemo" autocomplete="off" placeholder="--<?php echo $lang['langs_033'] ?>--">
												<datalist id="browsemo">
													<?php foreach ($moderow as $row):?>
														<option value="<?php echo $row->ship_mode; ?>"><?php echo $row->ship_mode; ?></option>
													<?php endforeach;?>
												</datalist>
											</div> 
										</div>
										<div class="col-md-4" > 
											<div class="form-group"> 
												<label for="field-2" class="control-label"><?php echo $lang['langs_034'] ?></label> 
												<input name="deli_time" class="form-control" placeholder="--<?php echo $lang['left345'] ?>--" list="browsersstatus" autocomplete="off" required="required">	
												<datalist id="browsersstatus">
													<?php foreach ($delitimerow as $row):?>
													<option value="<?php echo $row->delitime; ?>"><?php echo $row->delitime; ?></option>
													<?php endforeach;?>
												</datalist>
											</div> 
										</div>
									</div>
									<div class="row">
										<div class="col-md-6"> 
										<label for="field-3" class="control-label"><?php echo $lang['langs_035'] ?></label> 
											<div class="input-group mb-3"> 
												<div class="input-group-prepend">
													<span class="input-group-text" style="color:#ff0000"><i class="fas fa-car"></i></span>
												</div>
												<input class="form-control" name="c_driver" list="browser" autocomplete="off" placeholder="--<?php echo $lang['langs_036'] ?>--">
												<datalist id="browser">
													<?php foreach ($driverrow as $row):?>
													<option value="<?php echo $row->username; ?>"><?php echo $row->fname; ?> <?php echo $row->lname; ?></option>
													<?php endforeach;?>
												</datalist>
											</div> 
										</div>
										
										<div class="col-md-6"> 
											<div class="form-group"> 
												<label for="field-3" class="control-label"><?php echo $lang['langs_039'] ?></label> 
												<input class="form-control" name="status_courier" list="browse" autocomplete="off" placeholder="--<?php echo $lang['langs_040'] ?>--">
												<datalist id="browse">
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
									
									<hr />
									<h4  class="card-subtitle"> <?php echo $lang['left347'] ?></h4>
									<div class="row"> 
										<div class="col-sm-12 col-md-3">
											<label for="field-2" class="control-label"><?php echo $lang['add-title23'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
											<div class="input-group mb-3">
												<input class="custom-select col-12" name="pay_mode" placeholder="--<?php echo $lang['left346'] ?>--" list="browsersss" autocomplete="off" required="required">
												<datalist id="browsersss">
													<?php foreach ($payrow as $row):?>
													<option value="<?php echo $row->met_payment; ?>"><?php echo $row->met_payment; ?></option>
													<?php endforeach;?>
												</datalist>
											</div>
										</div>
									
										<div class="col-md-3" > 
											<label for="field-2" class="control-label"><?php echo $lang['langs_044'] ?></label>
											<div class="input-group mb-3"> 
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
												</div>	
												<input type="number" name="r_qnty" value="<?php echo $netos; ?>" class="form-control" >													
											</div> 
										</div>
										
										<div class="col-md-3" > 
											<label for="field-2" class="control-label"><?php echo $lang['langs_045'] ?></label>
											<div class="input-group mb-3"> 
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="mdi mdi-weight-kilogram"></i></span>
												</div>
												<input type="number" name="r_weight" value="<?php echo $neto; ?>" class="form-control" >													
											</div> 
										</div>

										<div class="col-md-3" > 
											<label for="field-2" class="control-label"><?php echo $lang['left348'] ?></label>
											<div class="input-group mb-3"> 
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="mdi mdi-weight-kilogram"></i></span>
												</div>
												<input type="number" name="v_weight" value="<?php echo $netov; ?>" class="form-control" >													
											</div> 
										</div>
									</div>
									
									<?php $payrow = $core->getPayment(); ?>
									<div class="col-lg-12 col-xl-12">
										<div class="card">
											<div class="card-body">						
												<div class="row">
													<div class="col-sm-12 col-md-3">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left349'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
															</div>
															<input type="text" class="form-control" name="value_weight" id="precio_libra" onkeyup="calcular()" value="<?php echo $core->value_weight;?>">
														</div>
													</div>
													
													<div class="col-sm-12 col-md-3">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left350'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
															</div>
															<input type="text" class="form-control" name="c_handling" id="manejo" onkeyup="calcular()" value="<?php echo $core->c_handling;?>">
														</div>
													</div>
													<div class="col-sm-12 col-md-3">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title25'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
															</div>
															<input type="text" class="form-control"  name="r_tax" id="impuesto" onkeyup="calcular()" value="<?php echo $core->tax;?>">
														</div>
													</div>
													<div class="col-sm-12 col-md-3">
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
													
													<div class="col-sm-12 col-md-4">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_048'] ?></label>
														<div class="input-group mb-3">  
															<div class="input-group-prepend">
																<span class="input-group-text"><?php echo $core->currency;?></span>
															</div>
															<input type="number" name="reexpedition" id="reexpedition" onkeyup="calcular()" value="<?php echo $core->c_reexpedition;?>" class="form-control" >													
														</div> 
													</div>

													<div class="col-sm-12 col-md-4">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left351'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left244'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
														<div class="input-group">
															<input type="text" class="form-control" name="r_declarate"  id="declarado" onkeyup="calcular()" value="0">
														</div>
													</div>	
													
													<div class="col-sm-12 col-md-3" style="display:none">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left352'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left245'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
														<div class="input-group">
															<input type="text" class="form-control" name="l_price"  id="total_libra" value="0">
														</div>
													</div>
													<div class="col-sm-12 col-md-3" style="display:none">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left353'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left246'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
														<div class="input-group">
															<input type="text" class="form-control" name="total_tax"  id="total_impuesto" value="0">
														</div>
													</div>
													<div class="col-sm-12 col-md-3" style="display:none">
														<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left354'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left247'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
														<div class="input-group">
															<input type="text" class="form-control" name="total_insurance"  id="tinsurance"  value="0">
														</div>
													</div>
													<div class="col-sm-12 col-md-4">
														<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
														<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" name="r_costtotal" id="total_result" value="" >
													</div>														
												</div>
												<input type="hidden" name="r_address" class="search_addr">
												<input type="hidden" name="latitude" class="search_latitude">
												<input type="hidden" name="longitude" class="search_longitude">
											</div>
										</div>
									</div>
									
									<div class="form-actions">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-offset-3 col-md-12">
															<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-gift"></i>&nbsp; <?php echo $lang['langs_050'] ?></button>
															<a href="consolidate.php?do=list_consolidate" class="btn btn-dark"><i class="icon-action-undo"></i> <i class="icon-people"></i> <?php echo $lang['conlist-title64'] ?></a> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input name="idcon" type="hidden" value="<?php echo $id_con; ?>" />
								</div>
							</div>
						</div>
					</div>
				</form>	
			</div>
        </div>
		
		<?php echo Core::doForm("processConsolidate");?>	
		<script>
		$(document).ready(function(){
			$('#delete').click(function(){
				if(confirm("Are you sure to delete?"))
				{
					var id = [];
					$(':checkbox:checked').each(function(i){
						id[i] = $(this).val();
					});
					if(id.length === 0)
					{
						alert("Please Select Checkbox");
					}
					else
					{
						$.ajax({
							url:"delete_item_add_consolidate.php",
							method: "POST",
							data:{id:id},
							success:function()
							{
								for(var i =0; i<id.length; i++)
								{
									$('tr#'+id[i]+'').css('background-color', '#ccc');
									$('tr#'+id[i]+'').fadeOut('slow');
								}
							}
						});
					}
				}
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
				var t_reexpedition=eval(document.getElementById("reexpedition").value); // valor re expedition del envio
				
				var t_libra = libra * <?php echo $neto; ?>; // calculo de la libra
				var v_libra = libra * <?php echo $netov; ?>; // calculo de la libra
				var t_libras = libra * <?php echo $neto; ?>; // calculo de la libra
				var t_manejo_envio = t_manejo; // calculo manejo de envio
				var t_manejo_reexp = t_reexpedition; // calculo manejo de envio
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
				
				
				var calculate_libra;
				if (t_libra > v_libra) {
					calculate_libra = t_libra;
				} else {
					calculate_libra = v_libra;
				}

				
				var input = document.getElementById("total_result"); // calculo total del precio
				var input1 = document.getElementById("total_libra"); 
				var input2 = document.getElementById("total_impuesto");
				var input3 = document.getElementById("tinsurance");
				
				total_result = parseFloat(parseFloat(calculate_libra)  +  parseFloat(t_seguro) + parseFloat(calculate_impuesto) + parseFloat(t_manejo_envio) + parseFloat(t_manejo_reexp)) .toFixed(2); <!--Total result formula-->
				total_libra = parseFloat(parseFloat(t_libras)) .toFixed(2);
				total_impuesto = parseFloat(parseFloat(t_impuestos)) .toFixed(2);
				tinsurance = parseFloat(parseFloat(t_seguros)) .toFixed(2);
				
				input.value= total_result;
				input1.value= total_libra;
				input2.value= total_impuesto;
				input3.value= tinsurance;
				
			}
	</script>
		<?php include 'templates/footer_consolidate.php'; ?>