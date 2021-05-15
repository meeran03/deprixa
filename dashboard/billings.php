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
<link rel="stylesheet" type="text/css" href="assets/extra-libs/prism/prism.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- Datepicker -->
<link href="dist/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="dist/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

<?php include 'templates/head_tab.php'; ?>

<style type="text/css">
	canvas{
		margin:auto;
	}
	.alert{
		margin-top:20px;
	}
</style>

<?php $allshiprow = $core->getBillingship();?>
<?php $allconsorow = $core->getBillingconso();?>
<?php $allconrow = $core->getBillingcon();?>


<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-lg-7">
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
					<div class="col-lg-4">
						<div class="m-r-10"><span class="text-secondary display-5"><i style="color:#6f42c1" class="mdi mdi-package-variant-closed"></i></span></div>
						<span><?php echo $lang['billing1'] ?></span>
						<h3 class="m-b-0 m-t-30">
							<?php echo $core->currency;?>
							<?php
								$total = $db->query("SELECT SUM(r_costtotal) as total FROM add_courier WHERE act_status=2 AND status_courier='Delivered'")->fetch_object()->total; 
								print formato($total); //output value
							?>
						</h3>
						<h6 class="font-light text-muted"><?php echo $lang['billing2'] ?></h6>
						<h4 class="m-t-30 m-b-0">
						<div class="card-body border-top"></div>
							<?php echo $core->currency;?>
							<?php
								$month = date('m');
								$year = date('Y'); //2018
								$total2 = $db->query("SELECT SUM(r_costtotal) as total2 FROM add_courier WHERE month(created)='$month' AND year(created)='$year' AND act_status=2 AND status_courier='Delivered'")->fetch_object()->total2; 
								print formato($total2); //output value
							?>
						</h4>
						<h6 class="font-light text-muted"><?php echo $lang['billing3'] ?></h6>
					</div>
					
					<div class="col-lg-4">
						<div class="m-r-10"><span class="text-secondary display-5"><i style="color:#6610f2" class="mdi mdi-gift"></i></span></div>
						<span>Consolidados</span>
						<h3 class="m-b-0 m-t-30">
							<?php echo $core->currency;?>
							<?php
								$total = $db->query("SELECT SUM(r_costtotal) as total FROM consolidate WHERE act_status='2' ")->fetch_object()->total; 
								print formato($total); //output value
							?>
						</h3>
						<h6 class="font-light text-muted">Earnings consolidated sales</h6>
						<h4 class="m-t-30 m-b-0">
						<div class="card-body border-top"></div>
							<?php echo $core->currency;?>
							<?php
								$month = date('m');
								$year = date('Y'); //2018
								$total2 = $db->query("SELECT SUM(r_costtotal) as total2 FROM consolidate WHERE month(created)='$month' AND year(created)='$year' AND act_status=2")->fetch_object()->total2; 
								print formato($total2); //output value
							?>
						</h4>
						<h6 class="font-light text-muted"><?php echo $lang['billing3'] ?></h6>
					</div>
					
					<div class="col-lg-4">
						<div class="m-r-10"><span class="text-secondary display-5"><i style="color:#f62d51" class="mdi mdi-view-week"></i></span></div>
						<span><?php echo $lang['billing4'] ?></span>
						<h3 class="m-b-0 m-t-30">
							<?php echo $core->currency;?>
							<?php
								$total3 = $db->query("SELECT SUM(tprice) as total3 FROM detail_container WHERE act_status=3")->fetch_object()->total3; 
								print formato($total3); //output value
							?>
						</h3>
						<h6 class="font-light text-muted"><?php echo $lang['billing5'] ?></h6>
						<h4 class="m-t-30 m-b-0">
						<div class="card-body border-top"></div>
							<?php echo $core->currency;?>
							<?php
								$month = date('m');
								$year = date('Y'); //2018
								$total4 = $db->query("SELECT SUM(tprice) as total4 FROM detail_container WHERE month(created)='$month' AND year(created)='$year' AND act_status=3")->fetch_object()->total4; 
								print formato($total4); //output value
							?>
						</h3>
						<h4 class="font-light text-muted"><?php echo $lang['billing6'] ?></h6>
					</div>
				</div>				
			</div>
		</div>
	</div>
	
	<div class="col-lg-5"  ng-app="app_billing">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<!-- column -->
					<div class="col-lg-12" ng-controller="myCtrls">						
						<canvas ng-init="fetchsales()" id="dvbCanvas"></canvas>
						<h6 class="font-light text-muted"><?php echo $lang['billing7'] ?> | <i class="ti-calendar"></i><?php echo $lang['billing8'] ?> <strong><?php echo date("F"); ?> <?php echo date("Y"); ?></strong></h6>
					</div>
					<!-- column -->
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs customtab" role="tablist">
					<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#shipping" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-package-variant-closed"></i></span> <span class="hidden-xs-down"><?php echo $lang['billing9'] ?></span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#consolidated" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-gift"></i></span> <span class="hidden-xs-down">Consolidated</span></a> </li>
					<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#container" role="tab"><span class="hidden-sm-up"><i class="mdi mdi-view-week"></i></span> <span class="hidden-xs-down"><?php echo $lang['billing10'] ?></span></a> </li>						
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="shipping" role="tabpanel">
						<div class="p-20">
							<!-- Pdf report -->
							<div class="col-lg-6">
								<div class="example">
									<h4 class="card-title m-t-30"><?php echo $lang['billing11'] ?></h4>
									<form id="dForm" class="form-horizontal" method="GET" action="report_all/billing.php" target="_blank">
										<div class="input-daterange input-group" id="date-range">
											<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal"autocomplete="off" placeholder="From Date" width="276" /> 
											&nbsp;
												<span class="input-group-text bg-info b-0 text-white"><?php echo $lang['langs_01036'] ?></span>
											&nbsp;
											<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" placeholder="To Date" width="276" />
											&nbsp;&nbsp;
											<input type="hidden" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
											<div class="input-group-append">
												<button type="submit" class="waves-effects waves-light m-t-60 btn btn-lg btn-secodarys accent-4 m-b-7" style="width: 120px;">
												  <i class="fa fa-print"></i> Print
												</button>
											</div>
										</div>
									</form>	
								</div>	
							</div>
							<div class="table-responsive">
								<table id="zero_config" class="table table-condensed table-hover table-striped">
									<thead>
										<tr> 
											<th><b><?php echo $lang['billing12'] ?></b></th>
											<th><b><?php echo $lang['billing13'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['billing14'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['billing15'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['billing16'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['billing17'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['billing18'] ?> (<?php echo $core->currency; ?>)</b></th>
										</tr>
									</thead>
									
									<tbody>
										<?php if(!$allshiprow):?>
										<tr>
											<td colspan="7">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
											",false;?>
											</td>
										</tr>
										<?php else: ?>
										<?php foreach ($allshiprow as $row):
										
											$suma=0;
											// total shipping cost
											$total=$row->r_costtotal;
											$total=number_format($total,2,'.','');
											$suma+=$total;
										
										?>
										<tr>
											<td><?php echo $row->created;?></td>
											<td><?php echo $row->order_inv;?></td>
											<td class="text-center"><?php echo $row->itemcat;?> | <?php echo $row->r_description;?></td>
											<td class="text-center"><?php echo $row->r_qnty;?></td>
											<td class="text-center">
											<?php 

											if ($row->r_weight > $row->v_weight) {
												echo  round_out($row->r_weight);
											} else {
												echo round_out($row->v_weight);
											}
											
											?>
											</td>	
											<td class="text-center"><?php echo $row->pay_mode;?></td>
											<td class="text-center"><?php echo $core->currency;?> <?php echo $suma;?></td>
										</tr>
										<?php endforeach;?>
										<?php unset($row);?>
										<?php endif;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<div class="tab-pane  p-20" id="consolidated" role="tabpanel">
						<!-- Pdf report -->
						<div class="col-lg-6">
							<div class="example">
								<h4 class="card-title m-t-30"><?php echo $lang['billing11'] ?></h4>
								<form id="dForm" class="form-horizontal" method="GET" action="report_all/billing_consolidated.php" target="_blank">
									<div class="input-daterange input-group" id="date-range">
										<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal"autocomplete="off" placeholder="From Date" width="276" /> 
										&nbsp;
											<span class="input-group-text bg-info b-0 text-white"><?php echo $lang['langs_01036'] ?></span>
										&nbsp;
										<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" placeholder="To Date" width="276" />
										&nbsp;&nbsp;
										<div class="input-group-append">
											<button type="submit" class="waves-effects waves-light m-t-60 btn btn-lg btn-secodarys accent-4 m-b-7" style="width: 120px;">
											  <i class="fa fa-print"></i> Print
											</button>
										</div>
									</div>
								</form>	
							</div>	
						</div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr> 
										<th><b><?php echo $lang['billing12'] ?></b></th>
										<th><b><?php echo $lang['billing13'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing14'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing15'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing16'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing17'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing18'] ?> (<?php echo $core->currency; ?>)</b></th>
									</tr>
								</thead>
								
								<tbody>
									<?php if(!$allconsorow):?>
										<tr>
											<td colspan="7">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
											",false;?>
											</td>
										</tr>
										<?php else: ?>
									<?php foreach ($allconsorow as $row):?>
									<tr>
										<td><?php echo $row->created;?></td>
											<td><?php echo $row->order_inv;?></td>
											<td class="text-center"><?php echo $row->comments;?></td>
											<td class="text-center"><?php echo $row->r_qnty;?></td>
											<td class="text-center"><?php echo $row->r_weight;?></td>	
											<td class="text-center"><?php echo $row->pay_mode;?></td>
											<td class="text-center"><?php echo $row->r_costtotal;?></td>
									</tr>
									<?php endforeach;?>
									<?php unset($row);?>
									<?php endif;?>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="tab-pane  p-20" id="container" role="tabpanel">
						<!-- Pdf report -->
						<div class="col-lg-6">
							<div class="example">
								<h4 class="card-title m-t-30"><?php echo $lang['billing11'] ?></h4>
								<form id="dForm" class="form-horizontal" method="GET" action="report_all/billing_container.php" target="_blank">
									<div class="input-daterange input-group" id="date-range">
										<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal"autocomplete="off" placeholder="From Date" width="276" /> 
										&nbsp;
											<span class="input-group-text bg-info b-0 text-white"><?php echo $lang['langs_01036'] ?></span>
										&nbsp;
										<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" placeholder="To Date" width="276" />
										&nbsp;&nbsp;
										<div class="input-group-append">
											<button type="submit" class="waves-effects waves-light m-t-60 btn btn-lg btn-secodarys accent-4 m-b-7" style="width: 120px;">
											  <i class="fa fa-print"></i> Print
											</button>
										</div>
									</div>
								</form>	
							</div>	
						</div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr> 
										<th><b><?php echo $lang['billing12'] ?></b></th>
										<th><b><?php echo $lang['billing13'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing19'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing20'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing17'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['billing18'] ?> (<?php echo $core->currency; ?>)</b></th>
									</tr>
								</thead>
								
								<tbody>
									<?php if(!$allconrow):?>
										<tr>
											<td colspan="7">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
											",false;?>
											</td>
										</tr>
										<?php else: ?>
									<?php foreach ($allconrow as $row):?>
									<tr>
										<td><?php echo $row->created;?></td>
										<td><?php echo $row->order_inv;?></td>
										<td class="text-center"><?php echo $row->origin_port;?></td>
										<td class="text-center"><?php echo $row->destination_port;?></td>	
										<td class="text-center"><?php echo $row->pay_mode;?></td>
										<td class="text-center"><?php echo $row->tprice;?></td>
									</tr>
									<?php endforeach;?>
									<?php unset($row);?>
									<?php endif;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
</div>

	<!-- datepicker -->
    <script src="dist/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="dist/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
	
	<!-- page script -->
    <script type="text/javascript">
      $(function () {
        // datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });


      });
    </script>
	<script src="app_billing.js"></script>
	<script src="assets/extra-libs/prism/prism.js"></script>