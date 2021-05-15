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
				<span><?php echo $lang['tools-config61'] ?> | Setup Taxes and Fees</span>
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
							<h4 class="card-title"><b><?php echo $lang['tools-config45'] ?></b></h4>
							<section>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="firstName1"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['tools-config46'] ?></label>
											<input type="text" class="form-control" name="tax" value="<?php echo $core->tax;?>" placeholder="<?php echo $lang['tools-config46'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['tools-config47'] ?></label>
											<input type="text" class="form-control" name="insurance" value="<?php echo $core->insurance;?>" placeholder="<?php echo $lang['tools-config48'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['tools-config58'] ?></label>
											<input type="text" class="form-control" name="value_weight" value="<?php echo $core->value_weight;?>" placeholder="<?php echo $lang['tools-config58'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><i class="ti-package" style="color:#ff0000"></i> <?php echo $lang['tools-config50'] ?> <b>L x W x H / <?php echo $core->meter;?></b></label>
											<input type="text" title="Limit digits in tracking 15" data-toggle="tooltip" class="form-control" name="meter" value="<?php echo $core->meter;?>" placeholder="Volumetric">
										</div>
									</div>
									
								</div>

								</br></br>
								<h4 class="card-title"><b><?php echo $lang['langs_070'] ?></b></h4>
								<hr />
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="firstName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_072'] ?></label>
											<input type="text" class="form-control" name="c_value_pound" value="<?php echo $core->c_value_pound;?>" placeholder="<?php echo $lang['langs_071'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><i class="mdi mdi-weight" style="color:#ff0000"></i> <?php echo $lang['langs_073'] ?></label>
											<input type="text" class="form-control" name="c_add_pound" value="<?php echo $core->c_add_pound;?>" placeholder="<?php echo $lang['langs_073'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_074'] ?></label>
											<input type="text" class="form-control" name="c_handling" value="<?php echo $core->c_handling;?>" placeholder="<?php echo $lang['langs_074'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="firstName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_075'] ?></label>
											<input type="text" class="form-control" name="c_fuel" value="<?php echo $core->c_fuel;?>" placeholder="75">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_076'] ?></label>
											<input type="text" class="form-control" name="c_reexpedition" value="<?php echo $core->c_reexpedition;?>" placeholder="<?php echo $lang['langs_076'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_077'] ?></label>
											<input type="text" class="form-control" name="c_logistic" value="<?php echo $core->c_logistic;?>" placeholder="<?php echo $lang['langs_077'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="firstName1"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_078'] ?></label>
											<input type="text" class="form-control" name="c_surcharges" value="<?php echo $core->c_surcharges;?>" placeholder="<?php echo $lang['langs_078'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_079'] ?></label>
											<input type="text" class="form-control" name="c_safe" value="<?php echo $core->c_safe;?>" placeholder="<?php echo $lang['langs_079'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><b style="color:#ff0000"><?php echo $core->currency;?></b> <?php echo $lang['langs_080'] ?></label>
											<input type="text" class="form-control" name="c_nationalization" value="<?php echo $core->c_nationalization;?>" placeholder="<?php echo $lang['langs_080'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="firstName1"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_081'] ?></label>
											<input type="text" class="form-control" name="c_tariffs" value="<?php echo $core->c_tariffs;?>" placeholder="<?php echo $lang['langs_081'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="lastName1"><i class="fas fa-percent" style="color:#ff0000"></i> <?php echo $lang['langs_082'] ?></label>
											<input type="text" class="form-control" name="c_vat" value="<?php echo $core->c_vat;?>" placeholder="<?php echo $lang['langs_082'] ?>">
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
<?php echo Core::doForm("processConfig_taxes");?> 
