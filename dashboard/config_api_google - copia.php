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

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>

<!-- ============================================================== -->
<!-- Right Part contents-->
<!-- ============================================================== -->
<div class="right-part mail-list bg-white">
	<div class="p-15 b-b">
		<div class="d-flex align-items-center">
			<div>
				<span><?php echo $lang['tools-config61'] ?> | Google address and api key</span>
			</div>
			
		</div>
	</div>
	<!-- Action part -->
	<!-- Button group part -->
	<div class="bg-light p-15">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row">
					<div class="col-12">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Action part -->
	<?php $zonerow = $core->getZone(); ?>
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<div class="row">
				<!-- Column -->
				<div class="col-12">
					<div class="card-body">				
						<form class="form-horizontal form-material" id="admin_form" method="post">							
							
						<h4 class="card-title"><b>Google address and api key</b></h4>
						<section>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="firstName1"><img src='assets/images/alert/lat.png' width='20' /> Latitude</label>
										<input type="text" class="form-control" name="latitude" value="<?php echo $core->latitude;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="lastName1">Longitude</label>
										<input type="text"class="form-control" name="longitude" value="<?php echo $core->longitude;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><img src='assets/images/alert/apikey.png' width='20' /> Api Key google map</label>
										<input type="text" class="form-control" name="apikey" value="<?php echo $core->apikey;?>">
									</div>
								</div>
							</div>						
							<hr />
							
						</section>
						<div class="form-group">
							<div class="col-sm-12">										
								<button type="submit" class="btn btn-primary btn-confirmation" name="dosubmit" ><?php echo $lang['tools-config56'] ?> <span><i class="icon-ok"></i></span></button>								
							</div>
						</div>
						</form>
					</div>
				</div>
				<!-- Column -->
			</div>
		</div>
	</div>
	
	<div class="p-15 m-t-30">
		
	</div>
</div>

<?php echo Core::doForm("processConfig_apigooglekey");?>
 