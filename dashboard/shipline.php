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
				<span><?php echo $lang['tools-config61'] ?> | List of Shipping Line</span>
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
<?php switch(Filter::$action): case "edit-shipline": ?>
<?php $row_off = Core::getRowById(Core::slineTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-shipline1'] ?><span><?php echo $lang['tools-shipline2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->ship_line;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-shipline1'] ?></label>
										<input type="text" class="form-control" name="ship_line" value="<?php echo $row_off->ship_line;?>" placeholder="<?php echo $lang['tools-shipline3'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-shipline3'] ?></label>
										<input type="text" class="form-control" name="detail" value="<?php echo $row_off->detail;?>" placeholder="<?php echo $lang['tools-shipmode3'] ?>">
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-shipline4'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=shipline" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-shipline5'] ?></a>
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
<?php echo Core::doForm("processShipline");?> 

<?php break;?>
<?php case "add-shipline":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-shipline6'] ?><span><?php echo $lang['tools-shipline7'] ?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-shipline6'] ?></label>
										<input type="text" class="form-control" name="ship_line" placeholder="<?php echo $lang['tools-shipline6'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-shipline8'] ?></label>
										<input type="text" class="form-control" name="detail" placeholder="<?php echo $lang['tools-shipmode8'] ?>">
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-shipline9'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=shipline" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-shipline5'] ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processShipline");?> 

<?php break;?>
<?php default: ?>
<?php $moderow = $core->getShipline();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h3 class="card-title"><?php echo $lang['tools-shipline10'] ?></h3>
						</div>
					</div>
					<!-- column -->
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-shipline11'] ?></b></th>
									<th data-hide="Description"><b><?php echo $lang['tools-shipline12'] ?></b></th>
									<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-shipline13'] ?></b></th>
								</tr>
							</thead>
							<div class="m-t-40">
								<div class="d-flex">
									<div class="mr-auto">
										<div class="form-group">
											<a href="all_tools.php?do=shipline&amp;action=add-shipline"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i>  <?php echo $lang['tools-shipline14'] ?></button></a>
										</div>
									</div>
								</div>
							</div>
							<tbody>
								<?php if(!$moderow):?>
								<tr>
									<td colspan="3">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($moderow as $row):?>
								<tr>
									<td><?php echo $row->ship_line;?></td>
									<td><?php echo $row->detail;?></td>
									<td class="text-center">
										<a href="all_tools.php?do=shipline&amp;action=edit-shipline&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipline15'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
										<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->ship_line;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-shipline16'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
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
<?php echo Core::doDelete("Delete Status","deleteShipline");?> 
<?php break;?>
<?php endswitch;?>