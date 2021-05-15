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
				<span><?php echo $lang['tools-config61'] ?> | List of Status</span>
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
<?php switch(Filter::$action): case "edit-status": ?>
<?php $row_off = Core::getRowById(Core::yTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-statuscourier1'] ?><span><?php echo $lang['tools-statuscourier2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->mod_style;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-statuscourier1'] ?></label>
										<input type="text" class="form-control" name="mod_style" value="<?php echo $row_off->mod_style;?>" placeholder="<?php echo $lang['tools-statuscourier1'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-statuscourier3'] ?></label>
										<input type="text" class="form-control" name="detail" value="<?php echo $row_off->detail;?>" placeholder="<?php echo $lang['tools-statuscourier3'] ?>">
									</div>
								</div>			
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-statuscourier4'] ?></label>
										<input type="text" id="position-top-right" class="form-control demo" data-position="top right" name="color" value="<?php echo $row_off->color;?>" placeholder="<?php echo $lang['tools-statuscourier4'] ?>">
									</div>
								</div>			
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-statuscourier5'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=status_courier" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-statuscourier6'] ?></a>
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
<?php echo Core::doForm("processStatus");?> 

<?php break;?>
<?php case "add-status":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-statuscourier7'] ?><span><?php echo $lang['tools-statuscourier8'] ?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-statuscourier7'] ?></label>
										<input type="text" class="form-control" name="mod_style" placeholder="<?php echo $lang['tools-statuscourier1'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-statuscourier9'] ?></label>
										<input type="text" class="form-control" name="detail" placeholder="<?php echo $lang['tools-statuscourier9'] ?>">
									</div>
								</div>			
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-statuscourier10'] ?></label>
										<input type="text" name="color" id="position-top-right" class="form-control demo" data-position="top right" value="#0088cc">
									</div>
								</div>			
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-statuscourier11'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=status_courier" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-statuscourier6'] ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processStatus");?> 

<?php break;?>
<?php default: ?>
<?php $stylerow = $core->getStatus();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h3 class="card-title"><?php echo $lang['tools-statuscourier12'] ?></h3>
						</div>
					</div>
					<!-- column -->
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-statuscourier13'] ?></b></th>
									<th data-hide="Description"><b><?php echo $lang['tools-statuscourier14'] ?></b></th>
									<th data-hide="Button"><b><?php echo $lang['tools-statuscourier15'] ?></b></th>
									<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-statuscourier16'] ?></b></th>
								</tr>
							</thead>
							<div class="m-t-40">
								<div class="d-flex">
									<div class="mr-auto">
										<div class="form-group">
											<a href="all_tools.php?do=status_courier&amp;action=add-status"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-statuscourier17'] ?></button></a>
										</div>
									</div>
								</div>
							</div>
							<tbody>
								<?php if(!$stylerow):?>
								<tr>
									<td colspan="5">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($stylerow as $row):?>
								<tr>
									<td><?php echo $row->mod_style;?></td>
									<td><?php echo $row->detail;?></td>
									<td><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->color;?></span></td>
									<td class="text-center">
									<?php 	if ($row->mod_style == 'Pending') { ?>
									<?php } else if ($row->mod_style == 'Delivered'){ ?>
									<?php } else if ($row->mod_style == 'Approved'){ ?>
									<?php }else if ($row->mod_style == 'Rejected'){ ?>
									<?php }else if($row->mod_style == 'Pick up'){?>
									<?php }else if($row->mod_style == 'Picked up'){?>
									<?php }else if($row->mod_style == 'No Picked up'){?>
									<?php }else if($row->mod_style == 'Quotation'){?>
									<?php }else if($row->mod_style == 'In Transit'){?>
									<?php }else if($row->mod_style == 'Pre Alert'){?>
									<?php }else if($row->mod_style == 'Invoiced'){?>
									<?php }else if($row->mod_style == 'Consolidate'){?>
									<?php } else { ?>
										<a href="all_tools.php?do=status_courier&amp;action=edit-status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier18'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
										<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->mod_style;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-statuscourier19'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
									<?php } ?>	
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
<?php echo Core::doDelete("Delete Status","deleteStatus");?> 
<?php break;?>
<?php endswitch;?>

<script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="assets/libs/%40claviska/jquery-minicolors/jquery.minicolors.min.js"></script>
<script>
$('.demo').each(function() {

	$(this).minicolors({
		control: $(this).attr('data-control') || 'hue',
		defaultValue: $(this).attr('data-defaultValue') || '',
		format: $(this).attr('data-format') || 'hex',
		keywords: $(this).attr('data-keywords') || '',
		inline: $(this).attr('data-inline') === 'true',
		letterCase: $(this).attr('data-letterCase') || 'lowercase',
		opacity: $(this).attr('data-opacity'),
		position: $(this).attr('data-position') || 'bottom left',
		swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
		change: function(value, opacity) {
			if (!value) return;
			if (opacity) value += ', ' + opacity;
			if (typeof console === 'object') {
				console.log(value);
			}
		},
		theme: 'bootstrap'
	});

});
</script>