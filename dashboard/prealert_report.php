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
  
    $fechai=date('Y-m-d');
	$fechaf=date('Y-m-d');
  	
?>

<?php include 'templates/head_user.php'; ?>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- Datepicker -->
<link href="dist/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="dist/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

<?php $preshiprow = $core->getPREALERTship();?>
<?php $preshipemployeerow = $user->getPREALERTshipemployee();?>
<div class="row">
	<!-- Column -->
	<?php if($row->userlevel == 9){?>
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="example">
							<h4 class="card-title m-t-30"><?php echo $lang['langs_01042'] ?></h4>
							<form id="dForm" class="form-horizontal" method="GET" action="report_all/pre_alerts.php" target="_blank">
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
				</div>
				<div class="table-responsive">
					
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ship-all1'] ?></b></th>
								<th class="text-center"><b>Purchase Tracking</b></th>
								<th class="text-center"><b><?php echo $lang['ncustomer'] ?></b></th>	
								<th class="text-center"><b>Shipping Company</b></th>
								<th class="text-center"><b>Store / Supplier</b></th>
								<th class="text-center"><b>Package Description</b></th>
								<th class="text-center"><b>Shipping Status</b></th>
								<th class="text-center"><b>Employee</b></th>
								<th class="text-center"><b>Declared Value</b></th>
							</tr>
						</thead>
						
						<tbody id="projects-tbl">
							<?php if(!$preshiprow):?>
							<tr>
								<td colspan="9">
								<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($preshiprow as $row):?>
							<tr>
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->order_purchase;?></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->courier;?></td>
								<td class="text-center"><?php echo $row->supplier;?></td>
								<td class="text-center"><?php echo $row->r_description;?></td>								
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->level;?></td>
								<td class="text-center"><b><?php echo $core->currency;?> <?php echo $row->r_custom;?></b></td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
				</div>
			</div>
		</div>
	</div>
	
	<?php }else if($row->userlevel == 2){?>
	
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="example">
							<h4 class="card-title m-t-30"><?php echo $lang['langs_01042'] ?></h4>
							<form id="dForm" class="form-horizontal" method="GET" action="report_all/pre_alerts_e.php" target="_blank">
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
				</div>
				<div class="table-responsive">
					
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ship-all1'] ?></b></th>
								<th class="text-center"><b>Purchase Tracking</b></th>
								<th class="text-center"><b><?php echo $lang['ncustomer'] ?></b></th>	
								<th class="text-center"><b>Shipping Company</b></th>
								<th class="text-center"><b>Store / Supplier</b></th>
								<th class="text-center"><b>Package Description</b></th>
								<th class="text-center"><b>Shipping Status</b></th>
								<th class="text-center"><b>Employee</b></th>
								<th class="text-center"><b>Declared Value</b></th>
							</tr>
						</thead>
						
						<tbody id="projects-tbl">
							<?php if(!$preshipemployeerow):?>
							<tr>
								<td colspan="9">
								<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($preshipemployeerow as $row):?>
							<tr>
								<td><b><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></b></td>
								<td><?php echo $row->order_purchase;?></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->courier;?></td>
								<td class="text-center"><?php echo $row->supplier;?></td>
								<td class="text-center"><?php echo $row->r_description;?></td>								
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->level;?></td>
								<td class="text-center"><b><?php echo $core->currency;?> <?php echo $row->r_custom;?></b></td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Column -->
</div>

	<!-- jQuery 2.1.3 -->
    <script src="dist/plugins/jQuery/jQuery-2.1.3.min.js"></script>
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
