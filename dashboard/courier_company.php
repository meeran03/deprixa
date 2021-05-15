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
				<span><?php echo $lang['tools-config61'] ?> | List Courier Company</span>
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
<?php switch(Filter::$action): case "edit-courier_company": ?>
<?php $row_courier = Core::getRowById(Core::ccTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card-body">
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-courier1'] ?><span><?php echo $lang['tools-courier2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_courier->name_com;?></span></header>							
						<section>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-courier3'] ?></label>
										<input type="text" class="form-control" name="name_com" value="<?php echo $row_courier->name_com;?>" placeholder="<?php echo $lang['tools-courier3'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier4'] ?></label>
										<input type="text" class="form-control" name="address_cou" value="<?php echo $row_courier->address_cou;?>" placeholder="<?php echo $lang['tools-courier4'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier5'] ?></label>
										<input type="text" class="form-control" name="phone_cou" value="<?php echo $row_courier->phone_cou;?>" placeholder="<?php echo $lang['tools-courier5'] ?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-courier6'] ?></label>
										<input type="text" class="form-control" name="country_cou" value="<?php echo $row_courier->country_cou;?>" placeholder="<?php echo $lang['tools-courier6'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier7'] ?></label>
										<input type="text" class="form-control" name="city_cou" value="<?php echo $row_courier->city_cou;?>" placeholder="<?php echo $lang['tools-courier7'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier8'] ?></label>
										<input type="text" class="form-control" name="postal_cou" value="<?php echo $row_courier->postal_cou;?>" placeholder="<?php echo $lang['tools-courier8'] ?>">
									</div>
								</div>
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-courier9'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=courier_company" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-courier10'] ?></a>
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
<?php echo Core::doForm("processCouriercom");?> 

<?php break;?>
<?php case "add-courier_company":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<form class="form-horizontal form-material"  id="admin_form" method="post">
						<header><span><?php echo $lang['tools-courier11'] ?></span></header>							
						<section>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-courier12'] ?></label>
										<input type="text" class="form-control" name="name_com" placeholder="<?php echo $lang['tools-courier12'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier28'] ?></label>
										<input type="text" class="form-control" name="address_cou" placeholder="<?php echo $lang['tools-courier28'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier29'] ?></label>
										<input type="text" class="form-control" name="phone_cou" placeholder="<?php echo $lang['tools-courier29'] ?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-courier13'] ?></label>
										<input type="text" class="form-control" name="country_cou" placeholder="<?php echo $lang['tools-courier13'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier14'] ?></label>
										<input type="text" class="form-control" name="city_cou" placeholder="<?php echo $lang['tools-courier14'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-courier15'] ?></label>
										<input type="text" class="form-control" name="postal_cou" placeholder="<?php echo $lang['tools-courier15'] ?>">
									</div>
								</div>
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-courier16'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=courier_company" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-courier10'] ?></a>
							</div>
						</div>						
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processCouriercom");?> 

<?php break;?>
<?php default: ?>

<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
		<?php $courierrow = $core->getCouriercom();?>
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h3 class="card-title"><?php echo $lang['tools-courier17'] ?></h3>
						</div>
					</div>
					<!-- column -->
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-courier18'] ?></b></th>
									<th data-hide="Address"><b><?php echo $lang['tools-courier19'] ?></b></th>
									<th data-hide="Phone"><b><?php echo $lang['tools-courier20'] ?></b></th>
									<th data-hide="Country"><b><?php echo $lang['tools-courier21'] ?></b></th>
									<th data-hide="City"><b><?php echo $lang['tools-courier22'] ?></b></th>
									<th data-hide="Postal Code"><b><?php echo $lang['tools-courier23'] ?></b></th>
									<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-courier24'] ?></b></th>
								</tr>
							</thead>
							<div class="m-t-40">
								<div class="d-flex">
									<div class="mr-auto">
										<div class="form-group">
											<a href="all_tools.php?do=courier_company&amp;action=add-courier_company"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-courier25'] ?></button></a>
										</div>
									</div>
								</div>
							</div>
							<tbody>
								<?php if(!$courierrow):?>
								<tr>
									<td colspan="5">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($courierrow as $row):?>
								<tr>
									<td><?php echo $row->name_com;?></td>
									<td><?php echo $row->address_cou;?></td>
									<td><?php echo $row->phone_cou;?></td>
									<td><?php echo $row->country_cou;?></td>
									<td><?php echo $row->city_cou;?></td>
									<td><?php echo $row->postal_cou;?></td>
									<td class="text-center">
										<a href="all_tools.php?do=courier_company&amp;action=edit-courier_company&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-courier26'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
										<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->name_off;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-courier27'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
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
<?php echo Core::doDelete("Delete Courier Company","deleteCouriercom");?> 
<?php break;?>
<?php endswitch;?>