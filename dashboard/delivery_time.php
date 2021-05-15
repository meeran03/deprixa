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
				<span><?php echo $lang['tools-config61'] ?> | <?php echo $lang['left700'] ?></span>
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
<?php switch(Filter::$action): case "edit-time": ?>
<?php $row_off = Core::getRowById(Core::delitimeTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<form class="form-horizontal form-material" id="admin_form" method="post">
							<header><?php echo $lang['tools-shipmode1'] ?><span><?php echo $lang['tools-shipmode2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->ship_mode;?></span></header>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-shipmode1'] ?></label>
											<input type="text" class="form-control" name="delitime" value="<?php echo $row_off->delitime;?>" placeholder="Delivery time">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['tools-shipmode3'] ?></label>
											<input type="text" class="form-control" name="detail" value="<?php echo $row_off->detail;?>" placeholder="Detail delivery time">
										</div>
									</div>
								</div>
							</section>	
							<br><br>
							<div class="form-group">
								<div class="col-sm-12">	
									<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['left806'] ?> <span><i class="icon-ok"></i></span></button>
									<a href="all_tools.php?do=delivery_time" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span><?php echo $lang['left807'] ?></a>
								</div>
							</div>
							<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processDelitime");?> 

<?php break;?>
<?php case "add-time":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<form class="form-horizontal form-material" id="admin_form" method="post">
							<header><?php echo $lang['tools-shipmode6'] ?><span><?php echo $lang['tools-shipmode7'] ?></span></header>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-shipmode6'] ?></label>
											<input type="text" class="form-control" name="delitime" placeholder="Delivery time">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['tools-shipmode8'] ?></label>
											<input type="text" class="form-control" name="detail" placeholder="Detail delivery time">
										</div>
									</div>
								</div>
							</section>	
							<br><br>
							<div class="form-group">
								<div class="col-sm-12">	
									<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['left808'] ?> <span><i class="icon-ok"></i></span></button>
									<a href="all_tools.php?do=delivery_time" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['left807'] ?></a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processDelitime");?> 

<?php break;?>
<?php default: ?>
<?php $moderow = $core->getDelitime();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['left700'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['left609'] ?></b></th>
										<th data-hide="Description"><b><?php echo $lang['tools-shipmode12'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-shipmode13'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-40">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="all_tools.php?do=delivery_time&amp;action=add-time"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['left701'] ?></button></a>
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$moderow):?>
									<tr>
										<td colspan="5">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($moderow as $row):?>
									<tr>
										<td><?php echo $row->delitime;?></td>
										<td><?php echo $row->detail;?></td>
										<td class="text-center">
											<a href="all_tools.php?do=delivery_time&amp;action=edit-time&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipmode15'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->delitime;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipmode16'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
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
</div>
<?php echo $pager->display_pages();?>
<?php echo Core::doDelete("Delete Status","deleteDelitime");?> 
<?php break;?>
<?php endswitch;?>