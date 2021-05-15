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

<?php include 'templates/head_user.php'; ?>


<!-- List of Offices -->
<?php switch(Filter::$action): case "edit-ship_rates": ?>
<?php $row_rates = Core::getRowById(Core::raTable, Filter::$id);?>
<script>
	function bs_input_file() {
		$(".input-file").before(
			function() {
				if ( ! $(this).prev().hasClass('input-ghost') ) {
					var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
					element.attr("name",$(this).attr("name"));
					element.change(function(){
						element.next(element).find('input').val((element.val()).split('\\').pop());
					});
					$(this).find("button.btn-choose").click(function(){
						element.click();
					});
					$(this).find("button.btn-reset").click(function(){
						element.val(null);
						$(this).parents(".input-file").find('input').val('');
					});
					$(this).find('input').css("cursor","pointer");
					$(this).find('input').mousedown(function() {
						$(this).parents('.input-file').prev().click();
						return false;
					});
					return element;
				}
			}
		);
	}
	$(function() {
		bs_input_file();
	});
</script>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<div class="responsive">
							<form class="form-horizontal form-material" id="admin_form" method="post">
								<header><?php echo $lang['ship-rate1'] ?><span><?php echo $lang['ship-rate2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_rates->n_courier;?></span></header>
								<section>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate4'] ?></label>
												<input type="text" class="form-control" name="n_courier" value="<?php echo $row_rates->n_courier;?>" placeholder="<?php echo $lang['ship-rate3'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate5'] ?></label>
												<input type="text" class="form-control" name="services" value="<?php echo $row_rates->services;?>" placeholder="<?php echo $lang['ship-rate5'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate6'] ?></label>
												<input type="text" class="form-control" name="weight" value="<?php echo $row_rates->weight;?>" placeholder="<?php echo $lang['ship-rate6'] ?>">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate7'] ?></label>
												<input type="text" class="form-control" name="rate" value="<?php echo $row_rates->rate;?>" placeholder="<?php echo $lang['ship-rate7'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate8'] ?></label>
												<input type="text" class="form-control" name="deli_time" value="<?php echo $row_rates->deli_time;?>" placeholder="<?php echo $lang['ship-rate8'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate9'] ?></label>
												<select class="custom-select form-control" name="typeweight" value="<?php echo $row_rates->typeweight;?>" placeholder="<?php echo $lang['ship-rate9'] ?>">
													<option value="Lb">Lb</option>
													<option value="Kg">Kg</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate10'] ?></label>
												<input type="text" class="form-control" name="free_ship" value="<?php echo $row_rates->free_ship;?>" placeholder="<?php echo $lang['ship-rate10'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate11'] ?></label>
												<input type="text" class="form-control" name="drop_off" value="<?php echo $row_rates->drop_off;?>" placeholder="<?php echo $lang['ship-rate11'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate12'] ?></label>
												<div class="input-group input-file" name="brand">
													<input type="text"  class="form-control" placeholder='Choose a file...' />			
													<span class="input-group-btn">
														<button class="btn btn-primary btn-choose" type="button">Choose</button>
													</span>
												</div>
											</div>
										</div>
									</div>
								</section>
								<br><br>
								<div class="form-group">
									<div class="col-sm-12">	
										<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['ship-rate13'] ?><span><i class="ti-reload"></i></span></button>
										<a href="tools.php?do=ship_rates" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['ship-rate14'] ?></a>
									</div>
									<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processShiprates");?> 

<?php break;?>
<?php case "add-ship_rates":?>
<script>
	function bs_input_file() {
		$(".input-file").before(
			function() {
				if ( ! $(this).prev().hasClass('input-ghost') ) {
					var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
					element.attr("name",$(this).attr("name"));
					element.change(function(){
						element.next(element).find('input').val((element.val()).split('\\').pop());
					});
					$(this).find("button.btn-choose").click(function(){
						element.click();
					});
					$(this).find("button.btn-reset").click(function(){
						element.val(null);
						$(this).parents(".input-file").find('input').val('');
					});
					$(this).find('input').css("cursor","pointer");
					$(this).find('input').mousedown(function() {
						$(this).parents('.input-file').prev().click();
						return false;
					});
					return element;
				}
			}
		);
	}
	$(function() {
		bs_input_file();
	});
</script>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="responsive">
							<form class="form-horizontal form-material" id="admin_form" method="post">
								<header><?php echo $lang['ship-rate15'] ?><span><?php echo $lang['ship-rate16'] ?></span></header>								
								<section>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate18'] ?></label>
												<input type="text" class="form-control" name="n_courier" placeholder="<?php echo $lang['ship-rate18'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate19'] ?></label>
												<input type="text" class="form-control" name="services" placeholder="<?php echo $lang['ship-rate19'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate20'] ?></label>
												<input type="text" class="form-control" name="weight" placeholder="<?php echo $lang['ship-rate20'] ?>">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate21'] ?></label>
												<input type="text" class="form-control" name="rate" placeholder="<?php echo $lang['ship-rate21'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate22'] ?></label>
												<input type="text" class="form-control" name="deli_time" placeholder="<?php echo $lang['ship-rate22'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate23'] ?></label>
												<select class="custom-select form-control" name="typeweight" placeholder="<?php echo $lang['ship-rate23'] ?>">
													<option value="Lb">Lb</option>
													<option value="Kg">Kg</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate24'] ?></label>
												<input type="text" class="form-control" name="free_ship" placeholder="<?php echo $lang['ship-rate24'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['ship-rate25'] ?></label>
												<input type="text" class="form-control" name="drop_off" placeholder="<?php echo $lang['ship-rate25'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['ship-rate26'] ?></label>
												<div class="input-group input-file" name="brand">
													<input type="text"  class="form-control" placeholder='Choose a file...' />			
													<span class="input-group-btn">
														<button class="btn btn-primary btn-choose" type="button">Choose</button>
													</span>
												</div>
											</div>
										</div>
									</div>
									
								</section>
								<br><br>
								<div class="form-group">
									<div class="col-sm-12">	
										<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['ship-rate27'] ?><span><i class="ti-briefcase"></i></span></button>
										<a href="tools.php?do=ship_rates" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['ship-rate14'] ?></a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processShiprates");?> 

<?php break;?>
<?php default: ?>

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
		<?php $shipratesrow = $core->getShiprates();?>
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="d-md-flex align-items-center">
							<div>
								<h3 class="card-title"><?php echo $lang['ship-rate28'] ?></h3>
							</div>
						</div>
						<!-- column -->
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['ship-rate29'] ?></b></th>
										<th data-hide="Services"><b><?php echo $lang['ship-rate30'] ?></b></th>
										<th data-hide="Weight"><b><?php echo $lang['ship-rate31'] ?></b></th>
										<th data-hide="rate"><b><?php echo $lang['ship-rate41'] ?></b></th>
										<th data-hide="Delivery Time"><b><?php echo $lang['ship-rate32'] ?></b></th>
										<th data-hide="Type Weight"><b><?php echo $lang['ship-rate33'] ?></b></th>
										<th data-hide="Free Ship"><b><?php echo $lang['ship-rate34'] ?></b></th>
										<th data-hide="Drop Off"><b><?php echo $lang['ship-rate35'] ?></b></th>
										<th data-hide="Company Brand"><b><?php echo $lang['ship-rate36'] ?></b></th>
										<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['ship-rate37'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-40">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="tools.php?do=ship_rates&amp;action=add-ship_rates"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['ship-rate38'] ?></button></a>
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$shipratesrow):?>
									<tr>
										<td colspan="9">
										<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
											",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($shipratesrow as $row):?>
									<tr>
										<td><?php echo $row->n_courier;?></td>
										<td><?php echo $row->services;?></td>
										<td><?php echo $row->weight;?></td>
										<td><?php echo $row->rate;?></td>
										<td><?php echo $row->deli_time;?></td>
										<td><?php echo $row->typeweight;?></td>
										<td><?php echo $row->free_ship;?></td>
										<td><?php echo $row->drop_off;?></td>
										<td><img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->brand) ? $row->brand : "no_photo.png";?>&amp;w=80&amp;h=40&amp;s=1&amp;a=t1" alt="" title="" class="avatar" /></td>
										<td class="text-center">
											<a href="tools.php?do=ship_rates&amp;action=edit-ship_rates&amp;id=<?php echo $row->id;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['ship-rate39'] ?>"><i class="ti-pencil" aria-hidden="true"></i></button></a>
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->n_courier;?>"><button type="button" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip" data-original-title="<?php echo $lang['ship-rate40'] ?>"><i class="ti-close" aria-hidden="true"></i></button></a>
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
<?php echo Core::doDelete("Delete Ship Rates","deleteShiprates");?> 
<?php break;?>
<?php endswitch;?>