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
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<?php $allshiprow = $core->getDeliveredship();?>
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
						<h5 class="card-subtitle">Selected state: Delivered</h5>
					</div>
				</div>
				<ul class="nav nav-pills m-t-30 m-b-30">
					<li class=" nav-item"> <a href="index.php" class="nav-link"><h5 class="card-title"><?php echo $lang['shipearrin'] ?></h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_in_transit" class="nav-link"><h5 class="card-title">In Transit</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_in_warehouse" class="nav-link" ><h5 class="card-title">In Warehouse</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_received_office" class="nav-link" ><h5 class="card-title">Received Office</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_on_route" class="nav-link" ><h5 class="card-title">On Route</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_distribution" class="nav-link" ><h5 class="card-title">Distribution</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_pending_collection" class="nav-link" ><h5 class="card-title">Pending Collection</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_pick_up" class="nav-link" ><h5 class="card-title">Pick up</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_picked_up" class="nav-link" ><h5 class="card-title">Picked up</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_pre_alert" class="nav-link" ><h5 class="card-title">Pre Alert</h5></a> </li>
					<li class="nav-item"> <a href="all_status.php?do=status_delivered" class="nav-link active" ><h5 class="card-title">Delivered</h5></a> </li>
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
											<th><b><?php echo $lang['ship-all1'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['ship-all2'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['ship-all3'] ?></b></th>								
											<th class="text-center"><b><?php echo $lang['langs_01027'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['langs_01028'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['left907'] ?></b></th>
											<th width="12%"><?php echo $lang['left908'] ?></th>
											<th class="text-center"><b><?php echo $lang['ship-all4'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['left909'] ?></b></th>
											<th class="text-center"><b><?php echo $lang['ship-all5'] ?></b></th>
										</tr>
									</thead>
									<tbody id="projects-tbl">
										<?php if(!$allshiprow):?>
										<tr>
											<td colspan="9">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='160' /></i>
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
										<tr class="card-hover">		
											<td><?php echo $row->order_inv;?></td>
											<td><?php echo $row->s_name;?></td>
											<td class="text-center"><?php echo $row->email;?></td>
											<td class="text-center"><?php echo $row->deliver_date.' - '.$row->delivery_hour;?></td>
											<td class="text-center"><?php echo $row->name_employee;?></td>
											<td><img src="doc_signs/<?php echo $row->id; ?>.png" width="130" height="60"></td>
											<td width="12%">
												<?php   
													$path = "files/".$row->id."/"; // Indicar ruta
														$filehandle = opendir($path); // Abrir archivos
														while ($file = readdir($filehandle)) {
														if ($file != "." && $file != "..") {
															$tamanyo = GetImageSize($path . $file);
													?>
													
													<div class="row">
														<a  href="<?php echo $path.$file ?>" target="_blank"><img src="<?php echo $path.$file ?>" width="50" height="50"/></a>
													</div>
													
													<?php
															} 
														} 
													closedir($filehandle); // Fin lectura archivos

												?>	
											</td>
											<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
											<td class="text-center"><?php echo $row->level;?></td>
											<td class="text-center"><b><?php echo $core->currency;?> <?php echo $suma;?></b></td>
										</tr>											
										<?php endforeach;?>
										<?php unset($row);?>
										<?php endif;?>
									</tbody>	
								</table>
							</div>	
							<?php echo $pager->display_pages();?>
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