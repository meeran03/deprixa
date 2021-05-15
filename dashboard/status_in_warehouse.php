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

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<style type="text/css">
	.alert{
		margin-top:20px;
	}

	* {
	  box-sizing: border-box;
	}
</style>

<?php include 'templates/head_tab.php'; ?>

<?php $courierrow = $core->getCourier_list_In_Warehouse(); ?>
<?php $courieremployeerow = $user->getCourieremployee_list(); ?>



<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
<div class="row">
	<?php if($row->userlevel == 9){?>
	<div class="col-12 col-sm-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="d-md-flex align-items-center">
					<div>
						<h4 class="card-title">All Status</h4>
						<h5 class="card-subtitle">Selected state: In Warehouse</h5>
					</div>
				</div>
				<ul class="nav nav-pills m-t-30 m-b-30">
					<li class=" nav-item"> <a href="index.php" class="nav-link"><h5 class="card-title"><?php echo $lang['shipearrin'] ?></h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_in_transit" class="nav-link"><h5 class="card-title">In Transit</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_in_warehouse" class="nav-link active" ><h5 class="card-title">In Warehouse</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_received_office" class="nav-link" ><h5 class="card-title">Received Office</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_on_route" class="nav-link" ><h5 class="card-title">On Route</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_distribution" class="nav-link" ><h5 class="card-title">Distribution</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_pending_collection" class="nav-link" ><h5 class="card-title">Pending Collection</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_pick_up" class="nav-link" ><h5 class="card-title">Pick up</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_picked_up" class="nav-link" ><h5 class="card-title">Picked up</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_pre_alert" class="nav-link" ><h5 class="card-title">Pre Alert</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_delivered" class="nav-link" ><h5 class="card-title">Delivered</h5></a> </li>
				</ul>
				<div class="tab-content br-n pn">
					<div id="navpills-1" class="tab-pane active">
						<div class="row">
							<!-- Shipping List -->
							<div id="msgholder"></div>
							<div class="table-responsive">
								<table id="zero_config" class="table table-striped">
									<thead>
										<tr>
											<th><b><?php echo $lang['ltracking'] ?></b></th>
											<th><b><?php echo $lang['rreceiver'] ?></b></th>
											<th><b><?php echo $lang['qquantity'] ?></b></th>
											<th><b><?php echo $lang['dasha'] ?></b></th>
											<th><b><?php echo $lang['ddate'] ?></b></th>
											<th align='center'><b><?php echo $lang['count15'] ?></b></th>
											<th><b><?php echo $lang['sstatus'] ?></b></th>
											<th><b><?php echo $lang['count16'] ?></b></th>
											<th data-hide="all" align='center'><b><?php echo $lang['aaction'] ?></b></th>
										</tr>
									</thead>
									<tbody id="projects-tbl">
										<?php if(!$courierrow):?>
										<tr>
											<td colspan="8">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='160' /></i>
											",false;?>
											</td>
										</tr>
										<?php else: ?>
										<?php foreach ($courierrow as $row):?>	
										<tr class="card-hover">		
											<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
											<td  class="clients-rpt" style="text-align: left;"><?php echo $row->r_name;?></td>
											<td><?php echo $row->r_qnty;?></td>
											<td><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
											<td><?php echo $row->created;?></td>
											<td><a  href="view-google-maps.php?do=view-google-maps&amp;action=mapview&amp;id=<?php echo $row->id;?>" target="_blank"><input  type=image src="assets/images/icon_map.png" ></a></td>
											<td><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
											<td><?php echo $row->level;?></td>
											<td>
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
							</div>	
							<?php echo $pager->display_pages();?>
							<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
							<!-- end Shipping List -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
	
	<script src="app.js"></script>
	<script src="appuser.js"></script>
	<script src="dist/js/stacktable.js"></script>
	<script>
		$('table').stacktable();
	</script>