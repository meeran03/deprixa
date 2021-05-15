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


<?php $courierrow = $core->getCourier_list(); ?>
<?php $courieremployeerow = $user->getCourieremployee_list(); ?>
<div class="row">
	<!-- Column -->
	<?php if($row->userlevel == 9){?>
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ltracking'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ncustomer'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['lorigin'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ldestination'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['lshipline'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['lpayment'] ?></b></th>
								<th class="th-sm" align='center'><b>View map</b></th>
								<th class="text-center"><b><?php echo $lang['lstatusshipment'] ?></b></th>
								<th><b>Employee</b></th>
								<th class="text-center"><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="customer_list.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['createnewship'] ?></button></a>
									</div>
								</div>
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$courierrow):?>
							<tr>
								<td colspan="10">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								</br>
								<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['oohhship']."</p>
								<p style='font-size: 16px; -webkit-font-smoothing: antialiased; color: #999;' align='center'> ".$lang['ooohhship']."</p>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($courierrow as $row):?>
							<tr>
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->r_name;?></td>
								<td class="text-center"><?php echo $row->country;?>-<?php echo $row->city;?></td>
								<td class="text-center"><?php echo $row->r_dest;?>-<?php echo $row->r_city;?></td>
								<td class="text-center"><?php echo $row->courier;?> | <?php echo $row->service_options;?></td>
								<td class="text-center"><?php echo $row->pay_mode;?></td>
								<td align='center'><a  href="view-google-maps.php?do=view-google-maps&amp;action=mapview&amp;id=<?php echo $row->id;?>" target="_blank"><input  type=image src="assets/images/icon_map.png" ></a></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td><?php echo $row->level;?></td>
								<td align='center'>
								<a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooledit'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
								<a  href="invoice/inv_ship.php?do=inv_ship&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolprint'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
								<a  href="invoice/label_ship.php?do=label_ship&amp;action=label&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toollabel'] ?>"><i style="color:#343a40" class="ti-bookmark-alt"></i></a>
								<a  href="status_shipment.php?do=status_shipment&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolupdate'] ?>"><i style="color:#20c997" class="ti-reload"></i></a> 
								<a  href="deliver_shipment.php?do=deliver_shipment&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a>
								<a  id="item_<?php echo $row->qid;?>" data-rel="<?php echo $row->s_name;?>" class="delete" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldelete'] ?>"><i style="color:#343a40" class="ti-trash"></i></a>
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
	
	<?php }else if($row->userlevel == 2){?>
	
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ltracking'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ncustomer'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['lorigin'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ldestination'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['lshipline'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['lpayment'] ?></b></th>
								<th class="th-sm" align='center'><b>View map</b></th>
								<th class="text-center"><b><?php echo $lang['lstatusshipment'] ?></b></th>
								<th><b>Employee</b></th>
								<th class="text-center"><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="customer_list.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['createnewship'] ?></button></a>
									</div>
								</div>
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$courieremployeerow):?>
							<tr>
								<td colspan="10">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								</br>
								<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['oohhship']."</p>
								<p style='font-size: 16px; -webkit-font-smoothing: antialiased; color: #999;' align='center'> ".$lang['ooohhship']."</p>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($courieremployeerow as $row):?>
							<tr>
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->r_name;?></td>
								<td class="text-center"><?php echo $row->country;?>-<?php echo $row->city;?></td>
								<td class="text-center"><?php echo $row->r_dest;?>-<?php echo $row->r_city;?></td>
								<td class="text-center"><?php echo $row->courier;?> | <?php echo $row->service_options;?></td>
								<td class="text-center"><?php echo $row->pay_mode;?></td>
								<td align='center'><a  href="view-google-maps.php?do=view-google-maps&amp;action=mapview&amp;id=<?php echo $row->id;?>" target="_blank"><input  type=image src="assets/images/icon_map.png" ></a></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td><?php echo $row->level;?></td>
								<td align='center'>
								<a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooledit'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
								<a  href="invoice/inv_ship.php?do=inv_ship&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolprint'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
								<a  href="invoice/label_ship.php?do=label_ship&amp;action=label&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toollabel'] ?>"><i style="color:#343a40" class="ti-bookmark-alt"></i></a>
								<a  href="status_shipment.php?do=status_shipment&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolupdate'] ?>"><i style="color:#20c997" class="ti-reload"></i></a> 
								<a  href="deliver_shipment.php?do=deliver_shipment&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a>							
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