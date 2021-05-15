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
	ob_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	define("_VALID_PHP", true);
	require_once("../init.php");
  
	if (!$user->is_Admin())
		redirect_to("login.php");
		
	$row = $user->getUserData();	
	
	$ratesrow = $core->getTrack_post();
  
	$historyrow = $core->getTrack_post_history(); 

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
	
    <title> <?php echo $lang['langs_083'] ?> | <?php echo $core->site_name ?></title>
   <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $core->apikey; ?>&callback=myMap.initMap&libraries=places"></script>
	
	<style>
		#mapcanvas{
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

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"> <?php echo $lang['left508'] ?> | <?php include("filter.php");?></h4>
						 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<?php if(!$ratesrow):?>

			<!--============================= TRACKING NOT FOUND =============================-->
			<section class="main-block">
				<div class="container-fluid">
					<div class="row justify-content-center align-items-center  mintrack-height-block" style="align='center'">
					<div class="col-md-12">
						<div class="confirmation-wrap">
							<?php echo "
							<i align='center' class='display-3 text-warning d-block'><img src='dashboard/assets/images/alert/ohh_shipment_rate.png' width='143' /></i>
							</br>
							<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['track-shipment1']." <strong style='color:#FF0000;'>".$_POST['order_inv']."</strong> </p>	
							<p style='font-size: 18px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['track-shipment2']."</p>
							",false;?>
							<a href="index.php" class="btn btn-outline-danger btn-confirmation" align='center'><?php echo $lang['track-shipment3'] ?></a>
						</div>
					</div>
					
					</div>
				</div>
			</section>
			<!--//END TRACKING NOT FOUND -->			
			<?php else:?>
			<?php foreach ($ratesrow  as $rowr):?>
	
			
			<div class="row">
				<!-- Column -->
				<div class="col-lg-12 col-xl-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="content">
								<h5 class="card-title"> <?php echo $lang['left497'] ?> - <label><?php echo $lang['track-shipment4'] ?> <b><?php echo $rowr->order_inv;?></b></label></h5>
								<hr><br>
								<div class="col-md-12">
									<div class="confirmation-wrap">
										<div class="main-container">									
											<div id="mapcanvas"></div>
											<button style="display:none" id="get">Get Directions</button>
											<div class="clear"><br></div>
										</div>
									</div>
								</div>
								<script type="text/javascript">
									var directionsDisplay = new google.maps.DirectionsRenderer();
									
									var directionsService = new google.maps.DirectionsService();
									
									var map;
									
									var boudha = new google.maps.LatLng(<?php echo $rowr->latitude;?>, <?php echo $rowr->longitude;?>);
									var hattisar = new google.maps.LatLng(<?php echo $rowr->latitude_history;?>, <?php echo $rowr->longitude_history;?>);
									
									var mapOptions = {
										zoom: 14,
										center: hattisar
										
									};
									map = new google.maps.Map(document.getElementById('mapcanvas'),mapOptions);
									
									directionsDisplay.setMap(map);
									
									function calculateRoute(){
										var request = {
											origin: boudha,
											destination: hattisar,
											travelMode: 'DRIVING'				
										};
										
										directionsService.route(request, function(result, status){
											
											if(status == 'OK'){
												
												directionsDisplay.setDirections(result);
											}
										});
									}
									
									$(calculateRoute);
									
									document.getElementById('get').onclick= function(){
										calculateRoute();
									};
								</script>

								<br>
								<br>
								<div class="row">
									<div class="col-md-12">
										<div class="row match-height">
											<div class=" col-md-5 col-sm-12">
												<div class="card no-border box-shadow-0" style="background-color:#f9f9f9">
													<div class="card-body">
														<div class="card-block" style="padding-top:20px;padding-bottom:0">
															<div class="delivery">
																<div class="row">
																	<div class="col-md-6">
																		<p style="margin:10px"><?php echo $lang['left492'] ?>: <b><?php echo $rowr->order_inv;?></b></p>
																		<p style="margin:10px"><?php echo $lang['left493'] ?>: <b><?php echo $rowr->country;?>, <?php echo $rowr->city;?></b></p>
																		<p style="margin:10px"><?php echo $lang['left494'] ?>: <b><?php echo $rowr->r_dest;?>, <?php echo $rowr->r_city;?></b></p>
																	</div>
																	<div class="col-md-6">
																		<p style="margin:10px"><?php echo $lang['left498'] ?>: <b><?php echo $rowr->s_name;?></b></p>
																		<p style="margin:10px"><?php echo $lang['left499'] ?>: <b><?php echo $rowr->r_name;?></b></p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class=" col-md-5 col-sm-12">
												<div class="card no-border box-shadow-0">
													<div class="card-body">
														<div class="card-block" style="padding-top:20px;padding-bottom:0">
															<div class="delivery">
																<h4><span class="ti-package align-top" style="font-size: 30px;"></span> <span style="background: <?php echo $rowr->color; ?>;"  class="label label-large" ><?php echo $rowr->status_courier;?></span></h4>
																<p style="margin:10px"><?php echo $lang['left500'] ?>: <b><?php echo $rowr->collection_courier;?></b> </p>
																<p style="margin:10px"><?php echo $lang['left501'] ?>: <b><?php echo $rowr->person_receives;?></b> </p>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>
								
								<div class="row">
									<?php if(!$historyrow):?>
									<div class="col-md-12">
										<h4 class="form-section"><i class="icon-direction"></i> <?php echo $lang['left502'] ?></h4>
									</div>
									
									<div class="col-md-12">
										<div class="table-responsive">
											<table id="zero_config" class="table table-striped">
												<thead class="bg-secondary border-0 text-white">
													<tr class="row100 head">
														<th><?php echo $lang['left503'] ?></th>
														<th><?php echo $lang['left504'] ?></th>
														<th><?php echo $lang['left505'] ?></th>
														<th><?php echo $lang['left506'] ?></th>
														<th><?php echo $lang['left507'] ?></th>
													</tr>
												</thead>
												<tbody id="projects-tbl">
												
												</tbody>	
											</table>											
										</div>
									</div>
									<?php else:?>
									<div class="col-md-12">
										<h4 class="form-section"><i class="icon-direction"></i> <?php echo $lang['left502'] ?></h4>
									</div>
									
									<div class="col-md-12">
										<div class="table-responsive">
											<table id="zero_config" class="table table-striped">
												<thead class="bg-secondary border-0 text-white">
													<tr class="row100 head">
														<th><?php echo $lang['left503'] ?></th>
														<th><?php echo $lang['left504'] ?></th>
														<th><?php echo $lang['left505'] ?></th>
														<th><?php echo $lang['left506'] ?></th>
														<th><?php echo $lang['left507'] ?></th>
													</tr>
												</thead>
												<?php foreach ($historyrow  as $rows):?>
												<tbody id="projects-tbl">
													<tr>
														<td><?php echo $rows->t_date;?></td>
														<td><?php echo $rows->t_hour;?></td>
														<td><?php echo $rows->t_dest;?>,<?php echo $rows->t_city;?></td>
														<td><span style="background: <?php echo $rows->color; ?>;"  class="label label-large" ><?php echo $rows->status_courier;?></span></td>
														<td><?php echo $rows->comments;?></td>
													</tr>
												</tbody>
												<?php endforeach;?>
												<?php unset($row);?>
												<?php endif;?>	
											</table>											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<?php
  
		  if (!defined("_VALID_PHP"))
			  die('Direct access to this location is not allowed.');
		?>			
			
			<footer class="footer text-center">
				&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
			</footer>

            <!-- End footer -->
        </div>
    </div>

    <!-- End Wrapper -->	
		<script src="app.js"></script>
		<script src="dist/js/stacktable.js"></script>
		<script>
			$('table').stacktable();
		</script>
			
		<script src="../assets/vendor/jquery.2.2.3.min.js"></script>
		<!-- Bootstrap tether Core JavaScript -->
		<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
		<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- apps -->
		<script src="dist/js/app.min.js"></script>
		<script src="dist/js/app.init.js"></script>
		<script src="dist/js/app-style-switcher.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="assets/extra-libs/sparkline/sparkline.js"></script>
		<!--Wave Effects -->
		<script src="dist/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="dist/js/sidebarmenu.js"></script>
		<!--Custom JavaScript -->
		<script src="dist/js/custom.min.js"></script>
		<!--This page JavaScript -->
		<!--chartis chart-->
		<script src="assets/libs/chartist/dist/chartist.min.js"></script>
		<script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
		<!--c3 charts -->
		<script src="assets/extra-libs/c3/d3.min.js"></script>
		<script src="assets/extra-libs/c3/c3.min.js"></script>
		<!--chartjs -->
		<script src="assets/libs/chart.js/dist/Chart.min.js"></script>

			<!--This page plugins -->
		<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
		<script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
		
</body>

</html>
		