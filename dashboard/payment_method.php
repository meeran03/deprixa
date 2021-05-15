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
				<span><?php echo $lang['tools-config61'] ?> | List of Method Payment</span>
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


<!-- List of Offices -->
<?php switch(Filter::$action): case "edit-payment": ?>
<?php $row_off = Core::getRowById(Core::pmTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-methodpay1'] ?><span><?php echo $lang['tools-methodpay2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->met_payment;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-methodpay1'] ?></label>
										<input type="text" class="form-control" name="met_payment" value="<?php echo $row_off->met_payment;?>" placeholder="<?php echo $lang['tools-methodpay1'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-methodpay3'] ?></label>
										<input type="text" class="form-control" name="detail" value="<?php echo $row_off->detail;?>" placeholder="<?php echo $lang['tools-methodpay3'] ?>">
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-methodpay4'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=payment_method" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-methodpay5'] ?></a>
							</div>
						</div>
						<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processPayment");?> 

<?php break;?>
<?php case "add-payment":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-methodpay6'] ?><span><?php echo $lang['tools-methodpay7'] ?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-methodpay6'] ?></label>
										<input type="text" class="form-control" name="met_payment" placeholder="<?php echo $lang['tools-methodpay6'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-methodpay9'] ?></label>
										<input type="text" class="form-control" name="detail" placeholder="<?php echo $lang['tools-methodpay9'] ?>">
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-methodpay10'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=payment_method" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-methodpay5'] ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processPayment");?> 

<?php break;?>
<?php default: ?>
<?php $payrow = $core->getPayment();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h3 class="card-title"><?php echo $lang['tools-methodpay11'] ?></h3>
						</div>
					</div>
					<!-- column -->
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-methodpay12'] ?></b></th>
									<th data-hide="Description"><b><?php echo $lang['tools-methodpay13'] ?></b></th>
									<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-methodpay14'] ?></b></th>
								</tr>
							</thead>
							<div class="m-t-40">
								<div class="d-flex">
									<div class="mr-auto">
										<div class="form-group">
											<a href="all_tools.php?do=payment_method&amp;action=add-payment"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-methodpay15'] ?></button></a>
										</div>
									</div>
								</div>
							</div>
							<tbody>
								<?php if(!$payrow):?>
								<tr>
									<td colspan="5">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($payrow as $row):?>
								<tr>
									<td><?php echo $row->met_payment;?></td>
									<td><?php echo $row->detail;?></td>
									<td class="text-center">
										<a href="all_tools.php?do=payment_method&amp;action=edit-payment&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-methodpay16'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
										<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->met_payment;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-methodpay17'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
									</td>
								</tr>
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>	
							</tbody>	
						</table>
					</div>
					<!-- column -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $pager->display_pages();?>
<?php echo Core::doDelete("Delete Status","deletePayment");?> 
<?php break;?>
<?php endswitch;?>