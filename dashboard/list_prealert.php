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


<?php $pickuprow = $core->getPrealert_list(); ?>
<?php $pickupemployeerow = $user->getPrealertemployee_list(); ?>
<div class="row">
	<!-- Column -->
	<?php if($roww->userlevel == 9){?>
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ltracking'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left46'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ncustomer'] ?></b></th>	
								<th class="text-center"><b><?php echo $lang['left47'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left48'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left49'] ?></b></th>
								<th class="th-sm" align='center'><b><?php echo $lang['left50'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left51'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left52'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="prealert.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i>  <?php echo $lang['left53'] ?></button></a>
									</div>
								</div>
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$pickuprow):?>
							<tr>
								<td colspan="10">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($pickuprow as $row):?>
							<tr>
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->order_purchase;?></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->courier;?></td>
								<td class="text-center"><?php echo $row->supplier;?></td>
								<td class="text-center"><?php echo $row->r_description;?></td>								
								<td align='center'><a  href="view-google-maps.php?do=view-google-maps&amp;action=mapview&amp;id=<?php echo $row->id;?>" target="_blank"><input  type=image src="assets/images/icon_map.png" ></a></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->level;?></td>
								<td align='center'>
								<a  href="edit_courier_online.php?do=edit_courier_online&amp;action=ship&amp;id=<?php echo $row->id;?>" ><button type="button" class="btn btn-sm btn-icon btn-success btn-outline"><?php echo $lang['aapprove'] ?></button></a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
					<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
				</div>
			</div>
		</div>
	</div>
	
	<?php }else if($roww->userlevel == 2){?>
	
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ltracking'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left46'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ncustomer'] ?></b></th>	
								<th class="text-center"><b><?php echo $lang['left47'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left48'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left49'] ?></b></th>
								<th class="th-sm" align='center'><b><?php echo $lang['left50'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left51'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left52'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="prealert.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['left53'] ?></button></a>
									</div>
								</div>
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$pickupemployeerow):?>
							<tr>
								<td colspan="10">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($pickupemployeerow as $row):?>
							<tr>
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->order_purchase;?></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->courier;?></td>
								<td class="text-center"><?php echo $row->supplier;?></td>
								<td class="text-center"><?php echo $row->r_description;?></td>								
								<td align='center'><a  href="view-google-maps.php?do=view-google-maps&amp;action=mapview&amp;id=<?php echo $row->id;?>" target="_blank"><input  type=image src="assets/images/icon_map.png" ></a></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->level;?></td>
								<td align='center'>
								<a  href="edit_courier_online.php?do=edit_courier_online&amp;action=ship&amp;id=<?php echo $row->id;?>" ><button type="button" class="btn btn-sm btn-icon btn-success btn-outline"><?php echo $lang['aapprove'] ?></button></a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
					<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Column -->
</div>
<script src="dist/js/stacktable.js"></script>
<script>
	$('table').stacktable();
</script>