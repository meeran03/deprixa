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
				<span><?php echo $lang['tools-config61'] ?> | Setup Tracking and Invoice</span>
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

	<div class="row justify-content-center">
		<div class="col-lg-12">
			<div class="row">
				<!-- Column -->
				<div class="col-12">
					<div class="card-body">
					<header><b><?php echo $lang['tools-config57'] ?></b></header>
						<form class="form-horizontal form-material" id="admin_form" method="post">
							<hr />
							<h4 class="card-title"><b><?php echo $lang['tools-config35'] ?></b></h4>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-config36'] ?></label>
											<input type="text" title="<?php echo $lang['tools-config37'] ?>" data-toggle="tooltip" class="form-control" name="prefix" value="<?php echo $core->prefix;?>" placeholder="<?php echo $lang['tools-config40'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><i class="mdi mdi-cube-send"></i> <?php echo $lang['tools-config38'] ?></label>
											<input type="text" title="<?php echo $lang['tools-config49'] ?>" data-toggle="tooltip" class="form-control" name="track_digit" value="<?php echo $core->track_digit;?>" placeholder="<?php echo $lang['tools-config39'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-config36'] ?></label>
											<input type="text" title="<?php echo $lang['tools-config37'] ?>" data-toggle="tooltip" class="form-control" name="prefix_con" value="<?php echo $core->prefix_con;?>" placeholder="<?php echo $lang['tools-config40'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><i class="mdi mdi-view-week"></i> <?php echo $lang['tools-config41'] ?></label>
											<input type="text" title="<?php echo $lang['tools-config49'] ?>" data-toggle="tooltip" class="form-control" name="track_container" value="<?php echo $core->track_container;?>" placeholder="<?php echo $lang['tools-config39'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-config71'] ?></label>
											<input type="text" title="<?php echo $lang['tools-config67'] ?>" data-toggle="tooltip" class="form-control" name="prefix_consolidate" value="<?php echo $core->prefix_consolidate;?>" placeholder="<?php echo $lang['tools-config68'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><i class="mdi mdi-gift" style="color:#7460ee"></i> <?php echo $lang['tools-config72'] ?></label>
											<input type="text" title="<?php echo $lang['tools-config69'] ?>" data-toggle="tooltip" class="form-control" name="track_consolidate" value="<?php echo $core->track_consolidate;?>" placeholder="<?php echo $lang['tools-config70'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['tools-config42'] ?></label>
											<textarea class="form-control" rows="6"  name="interms" ><?php echo $core->interms;?></textarea>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-config43'] ?></label>
											<input type="text" class="form-control" name="signing_company" value="<?php echo $core->signing_company;?>" placeholder="<?php echo $lang['tools-config43'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['tools-config44'] ?></label>
											<input type="text" class="form-control" name="signing_customer" value="<?php echo $core->signing_customer;?>" placeholder="<?php echo $lang['tools-config44'] ?>">
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
<?php echo Core::doForm("processConfig_track_invoice");?> 
