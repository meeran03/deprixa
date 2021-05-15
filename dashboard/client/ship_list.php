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
	canvas{
		margin:auto;
	}
	.alert{
		margin-top:20px;
	}
</style>

<?php include '../head_tab.php'; ?>

<?php $courierrow = $core->getCourier_list(); ?>
<?php $onlinerow = $core->getCourier_list_online(); ?>

<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-lg-5">
		<div class="card">
			<div class="card-body">
				<div class="d-md-flex align-items-center">
					<div>
						<h4 class="card-title"><?php echo $lang['salesummary'] ?></h4>
						 <h5 class="card-subtitle">Overall summary</h5>
					</div>
				</div>
				<div class="row">
					<!-- column -->					
					<!-- col -->
					<div class="col-lg-6 col-md-6">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><a  href="shipping.php?do=shipment"><span class="text-secondary display-5"><i class="mdi mdi-package-variant-closed"></i></a></span></div>
							<div><span><?php echo $lang['shipment'] ?></span>
								<h3 class="font-medium m-b-0">
								<?php
								$total = $db->query("SELECT count(id) as total FROM add_courier WHERE act_status='1'")->fetch_object()->total; 
								print $total; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->	
					<div class="col-lg-6 col-md-6">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><a  href="container.php?do=list_container"><span class="text-secondary display-5"><i class="mdi mdi-view-week"></i></a></span></div>
							<div><span><?php echo $lang['countcontainer'] ?></span>
								<h3 class="font-medium m-b-0"> 
								<?php
								$total4 = $db->query("SELECT count(id) as total4 FROM add_container WHERE act_status='3'")->fetch_object()->total4; 
								print $total4; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->				
					<div class="col-lg-6 col-md-6">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><span class="text-secondary display-5">
							<?php 
							$total1 = $db->query("SELECT count(id) as total1 FROM add_courier WHERE status_courier='Pending' AND act_status='0'")->fetch_object()->total1;
							if ($total1 >= 1){ ?>
							<i class="mdi mdi-bell-ring-outline" style="color:#fc6767"></i></span>
							<?php }else{ ?>
							<i class="mdi mdi-bell-off"></i></span>
							<?php } ?>
							</div>
							<div><span><?php echo $lang['shiptoapprove'] ?></span>
								<h3 class="font-medium m-b-0">
								<?php
								$total2 = $db->query("SELECT count(id) as total2 FROM add_courier WHERE status_courier='Pending' AND act_status='0'")->fetch_object()->total2; 
								print $total2; //output value
								?></h3>
							</div>
						</div>
					</div>					
					<!-- col -->
					<div class="col-lg-6 col-md-6">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><a  href="shipping.php?do=delivered"><span class="text-secondary display-5"><i class="mdi mdi-package-variant"></i></a></span></div>
							<div><span><?php echo $lang['delveries'] ?></span>
								<h3 class="font-medium m-b-0">
								<?php
								$total3 = $db->query("SELECT count(id) as total3 FROM add_courier WHERE  act_status='2'")->fetch_object()->total3; 
								print $total3; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->
					<div class="col-lg-6 col-md-6">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><a  href="add_packages.php"><span class="text-secondary display-5"><i class="mdi mdi-dropbox"></i></a></span></div>
							<div><span><?php echo $lang['langs_01040'] ?></span>
								<h3 class="font-medium m-b-0">
								<?php
								$total4 = $db->query("SELECT count(id) as total4 FROM add_consolidate WHERE  act_status='0'")->fetch_object()->total4; 
								print $total4; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->
					<div class="col-lg-6 col-md-6">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><a  href="consolidate.php?do=list_consolidate"><span class="text-secondary display-5"><i class="mdi mdi-gift"></i></a></span></div>
							<div><span><?php echo $lang['langs_01041'] ?></span>
								<h3 class="font-medium m-b-0">
								<?php
								$total5 = $db->query("SELECT count(id) as total5 FROM consolidate WHERE  act_status='0'")->fetch_object()->total5; 
								print $total5; //output value
								?></h3>
							</div>
						</div>
					</div>
				</div>
			
				<div class="card-body border-top">
					<div class="row m-b-0">
						<!-- col -->
						<div class="col-lg-6 col-md-6">
							<div class="d-flex align-items-center">
								<div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
								<div><span><?php echo $lang['currentsales'] ?></span>
									<h3 class="font-medium m-b-0"><?php echo $core->currency;?> <?php
									$total6 = $db->query("SELECT SUM(r_costtotal) as total6 FROM add_courier WHERE act_status='1'")->fetch_object()->total6; 
									print formato($total6); //output value
									?></h3>
								</div>
							</div>
						</div>					
						<!-- col -->
						<div class="col-lg-6 col-md-6">
							<div class="d-flex align-items-center">
								<div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-currency-usd"></i></span></div>
								<div><span><?php echo $lang['flexcurrentsales'] ?></span>
									<h3 class="font-medium m-b-0"><?php echo $core->currency;?> <?php
									$month = date('m');
									$year = date('Y'); //2018
									$total7 = $db->query("SELECT SUM(r_costtotal) as total7 FROM add_courier WHERE month(created)='$month' AND year(created)='$year' AND act_status='1'")->fetch_object()->total7; 
									print formato($total7); //output value
									?></h3>
								</div>
							</div>
						</div>
						<!-- col -->
					</div>					
				</div>
				<div class="card-body border-top">
					<a  class="waves-effect waves-light m-t-60 btn btn-lg btn-info accent-4 m-b-7" href="shipping.php?do=billings"><?php echo $lang['lastsummary'] ?></a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-7"  ng-app="app">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<!-- column -->
					<div class="col-lg-12" ng-controller="myCtrl">						
						<canvas ng-init="fetchsales()" id="dvCanvas"></canvas>
						<h6 class="font-light text-muted"><?php echo $lang['chartsales'] ?> | <i class="ti-calendar"></i> <?php echo $lang['chartcurrent'] ?> <strong><?php echo date("F"); ?> <?php echo date("Y"); ?></strong></h6>
						
					</div>
					<!-- column -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-lg-8 col-xl-9">
		<div class="card card-hover">
			<div class="card-body">
				<div class="d-md-flex align-items-center">
					<div>
						<h4 class="card-title"><?php echo $lang['shipearrin'] ?></h4>
					</div>
				</div>
				<!-- column -->
				<div id="msgholder"></div>
				<div class="table-responsive">
					<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
						<thead>
								<tr>
								<th class="th-sm"><b><?php echo $lang['ltracking'] ?></b></th>
								<th class="th-sm"><b><?php echo $lang['rreceiver'] ?></b></th>
								<th class="th-sm"><b><?php echo $lang['qquantity'] ?></b></th>
								<th class="th-sm"><b><?php echo $lang['dasha'] ?></b></th>
								<th class="th-sm"><b><?php echo $lang['ddate'] ?></b></th>
								<th class="th-sm"><b><?php echo $lang['sstatus'] ?></b></th>
								<th data-hide="all" class="th-sm" align='center'><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php if(!$courierrow):?>
								<tr>
									<td colspan="7">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='../assets/images/alert/ohh_shipment.png' width='160' /></i>
									</br>
									<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['oohhship']."</p>
									<p style='font-size: 16px; -webkit-font-smoothing: antialiased; color: #999;' align='center'> ".$lang['ooohhship']."</p>
									",false;?>
									</td>
								</tr>
								<?php else: ?>
								<?php foreach ($courierrow as $row):?>								
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->r_name;?></td>
								<td><?php echo $row->r_qnty;?></td>
								<td><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
								<td><?php echo $row->created;?></td>
								<td><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td align='center'>
								<a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooledit'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
								<a  href="invoice/inv_ship.php?do=inv_ship&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolprint'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
								<a  href="invoice/label_ship.php?do=label_ship&amp;action=label&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toollabel'] ?>"><i style="color:#343a40" class="ti-bookmark-alt"></i></a>
								<a  href="status_shipment.php?do=status_shipment&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolupdate'] ?>"><i style="color:#20c997" class="ti-reload"></i></a> 

								<a  href="deliver_shipment.php?do=deliver_shipment&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a>
								<a  id="item_<?php echo $row->id;?>" data-rel="<?php echo $row->s_name;?>" class="delete" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldelete'] ?>"><i style="color:#343a40" class="ti-trash"></i></a>
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
				<!-- column -->
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-xl-3">
		<div class="card card-hover">
			<div class="card-body">
				<div class="p-t-20 text-center">
					<div class="d-md-flex align-items-center">
					<div>
						<h4 class="card-title"><?php echo $lang['cardtitle'] ?></h4>
					</div>
				</div>
				<!-- column -->
				<div id="loader" style="display:none"></div>
				<div id="msgholder"></div>
				<div class="table-responsive">
					<table id="default_order" class="table table-striped  display">
						<thead>
						   <tr class="border-0">
								<th class="border-0"><b><?php echo $lang['ltracking'] ?></b></th>
								<th data-hide="all" class="border-0" align='center'><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php if(!$onlinerow):?>
								<tr>
									<td colspan="2">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='../assets/images/alert/ohh_shipment_online.png' width='193' /></i>
									</br>
									<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['oohhship']."</p>
									<p style='font-size: 16px; -webkit-font-smoothing: antialiased; color: #999;' align='center'> ".$lang['oooohhship']."</p>
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($onlinerow as $row):?>
								<td><?php echo $row->order_inv;?></td>								
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
				</div>
				<!-- column -->
			</div>
		</div>
	</div>
</div>

<script src="app.js"></script>