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
				<span><?php echo $lang['tools-config61'] ?> | Payment Settings</span>
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
						<form class="form-horizontal form-material" id="admin_form" method="post">							
							
						<h4 class="card-title"><b><?php echo $lang['tools-config30'] ?></b>  => <img src='assets/images/alert/paypal.jpg' width='153' /></h4>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><i class="fas fa-at"></i> <?php echo $lang['tools-config31'] ?></label>
										<input type="text" class="form-control" name="account_paypal" value="<?php echo $core->account_paypal;?>" placeholder="<?php echo $lang['tools-config31'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><i class="far fa-id-card"></i> <?php echo $lang['tools-config32'] ?></label>
										<input type="text" class="form-control" name="client_id" value="<?php echo $core->client_id;?>" placeholder="<?php echo $lang['tools-config32'] ?>">
									</div>
								</div>
							</div>
							
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

<?php echo Core::doForm("processConfig_payment");?>
