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
  require_once("init.php"); 

  $ratesrow = $core->getTrack_post();
  
  $historyrow = $core->getTrack_post_history(); 

?>

<?php include("assets/templates/header_track.php");?>


        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                   <a class="logo" href="index.php"><?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'"  width="190" height="39"/>': $core->site_name;?></a>
                </div>                 
                <div class="buy-button">
                    <a href="sign-up.php" class="btn btn-light-outline rounded"><i class="mdi mdi-account-alert ml-3 icons"></i> <?php echo $lang['left185'] ?></a>
                </div><!--end login button-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
				<div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="index.php"><?php echo $lang['left180'] ?></a></li>
                        
                        <li><a href="tracking.php"><i class="mdi mdi-package-variant-closed"></i> <?php echo $lang['left181'] ?></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Navbar End -->
        
        
		<!-- ERROR PAGE -->
        <section class="bg-home">
            <div class="home-center">
                <div class="home-desc-center">
					<div class="container">
						<div class="checkout-form">
							<div class="row">
							<?php if(!$ratesrow):?>

								<!--============================= TRACKING NOT FOUND =============================-->
								<div class="col-lg-12">
									<div class="user-profile-data">
										<div class="row justify-content-center">
										<?php echo "
											<div class='col-lg-8 col-md-12 text-center'>
												<img src='dashboard/assets/images/alert/ohh_shipment_rate.png' class='img-fluid' alt=''/>
												<div class='text-uppercase mt-4 display-4'>Oh ! no</div>
												<div class='text-capitalize text-dark mb-4 display-6'>".$lang['track-shipment1']." <strong style='color:#FF0000;'>".$_POST['order_inv']." </strong></div>
												<p class='text-muted para-desc mx-auto'><span class='text-primary font-weight-bold'>".$lang['track-shipment2']."</span></p>
											</div>
										",false;?>	
										</div>

										<div class="row">
											<div class="col-md-12 text-center">  
												<a href="tracking.php" class="btn btn-light-outline rounded mt-4"><?php echo $lang['left182'] ?></a>
												<a href="index.php" class="btn btn-light rounded mt-4 ml-2"><?php echo $lang['left183'] ?></a>
											</div>
										</div>
									</div>
								</div>
								<!--//END TRACKING NOT FOUND -->			
								<?php else:?>
								<?php foreach ($ratesrow  as $row):?>
								
								<div class="col-lg-7">
									<div class="user-profile-data">
									<br><br><br>
										<div class="row">
											<div class="col-md-6">
												<div class="trackstatus-title">
													<p><span class="ti-package align-top" style="font-size: 30px;"></span> <b><?php echo $row->status_courier;?></b></p>
													<label> </label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="trackstatus-title">
													<label><?php echo $lang['track-shipment4'] ?> <b><?php echo $row->order_inv;?></b></label>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">						
												<div id="map-canvas"></div>
												<button style="display:none" id="get">Get Directions</button>
												<div class="clear"><br></div>
											</div>
										</div>
										
										<script type="text/javascript">
											var directionsDisplay = new google.maps.DirectionsRenderer();
											
											var directionsService = new google.maps.DirectionsService();
											
											var map;
											
											var boudha = new google.maps.LatLng(<?php echo $row->latitude;?>, <?php echo $row->longitude;?>);
											var hattisar = new google.maps.LatLng(<?php echo $row->latitude_history;?>, <?php echo $row->longitude_history;?>);
											
											var mapOptions = {
												zoom: 14,
												center: boudha
												
											};
											map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
											
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
										
										<!-- General Information -->
											<div class="payment-wrap">
												<div class="row">
													<div class="col-md-12">
														<div class="track-title">
															<h5 class="form_sub"><?php echo $lang['track-shipment5'] ?></h5>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="track-title">
														   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment6'] ?></br> <b><?php echo $row->country;?></b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="track-title">
														   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment7'] ?></br> <b><?php echo $row->city;?></b></label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="track-title">
														   <span class="ti-calendar align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment8'] ?></br> <b><?php echo $row->created;?></b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="track-title">
															<span class="ti-timer align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment9'] ?></br> <b><?php echo $row->r_hour;?></b></label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="track-title">
															 <label><?php echo $lang['track-shipment20'] ?></br> <b><?php echo $row->s_name;?></b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="track-title">
															<span class="ti-direction-alt align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment10'] ?></br> <b><?php echo $row->address;?></b></label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="track-title">
															 <label><?php echo $lang['track-shipment11'] ?></br> <b><?php echo $row->r_qnty;?></b></label>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="track-title">
															  <label><?php echo $lang['track-shipment12'] ?></br> <b><?php echo $row->package;?></b></label>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<div class="track-title">
															  <label><?php echo $lang['track-shipment13'] ?></br> <b><?php if ($row->r_weight > $row->v_weight) { echo  round_out($row->r_weight); } else { echo round_out($row->v_weight); }?></b></label>
															</div>
														</div>
													</div>
												</div>

											</div>
											<!--// General Information -->

											<!-- track shipment -->
											<div class="payment-wrap">
												<div class="row">
													<div class="col-md-12">
														 <div class="track-title">
															<h5 class="form_sub"><?php echo $lang['track-shipment15'] ?></h5>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="track-title">
														   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment16'] ?></br> <b><?php echo $row->r_dest;?></b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="track-title">
														   <span class="ti-location-pin align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment17'] ?></br> <b><?php echo $row->r_city;?></b></label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="track-title">
														  <span class="ti-calendar align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment18'] ?></br> <b><?php echo $row->collection_courier;?></b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="track-title">
															<span class="ti-timer align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment19'] ?></br> <b><?php echo $row->r_hour;?></b></label>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="track-title">
															 <label><?php echo $lang['track-shipment20'] ?></br> <b><?php echo $row->r_name;?></b></label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="track-title">
															<span class="ti-direction-alt align-top" style="font-size: 30px;"></span>  <label><?php echo $lang['track-shipment10'] ?></br> <b><?php echo $row->r_address;?></b></label>
															</div>
														</div>
													</div>
												</div>
											</div>

									</div> <!-- /.user-profile-data -->
								</div> <!-- /.col- -->
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>
								
								<?php if(!$historyrow):?>
								<?php else:?>
								<div class="col-lg-5">
								<br><br><br>
									<div class="booking-summary_block">
										<div class="booking-summary-box">
										<h5><?php echo $lang['track-shipment22'] ?></h5>
										<?php foreach ($historyrow  as $rows):?>
											<div class="track-cost">			
												<ul class="timeline a">
												  <li class="event">
													<div class="row">
													  <div class="col-md-9">
														<p class="text-left"><?php echo $rows->t_date;?></p>
														<h6 class="text-left"><?php echo $rows->status_courier;?> - <?php echo $rows->t_dest;?>,<?php echo $rows->t_city;?></h6>
														<button class="popup button4" onclick="mostrarMensaje()">+ <?php echo $lang['left184'] ?>
														  <span class="popuptext" id="myPopup"><?php echo $rows->comments;?></span>
														</button>
													  </div>
													  <div class="col-md-3">
														<p class="text-right"><?php echo $rows->t_hour;?></p>
														<h4></h4>
													  </div>
													</div>
												  </li>
												  <!--event schedule 1 end--> 
												</ul>										
											</div> 
										<?php endforeach;?>
										<?php unset($row);?>
										<?php endif;?>			
										</div>
									</div>
								</div>
							</div> <!-- /.row -->
						</div> <!-- /.checkout-form -->
					</div> <!-- /.container -->
                </div>
            </div>
        </section>
        <!-- ERROR PAGE -->

        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->

        <?php include("assets/templates/footer_track.php");?>