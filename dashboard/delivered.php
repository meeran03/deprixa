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
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- Datepicker -->
<link href="dist/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="dist/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

<?php $allshiprow = $core->getDeliveredship();?>
<?php $allshipemployeerow = $user->getDeliveredshipemployee();?>
<div class="row">
	<!-- Column -->
	<?php if($row->userlevel == 9){?>
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="example">
							<h4 class="card-title m-t-30"><?php echo $lang['langs_01025'] ?></h4>
							<form id="dForm" class="form-horizontal" method="GET" action="report_all/shipment_delivered.php" target="_blank">
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
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($allshiprow as $row):
							
								$suma=0;
								// total shipping cost
								$total=$row->r_costtotal;
								$total=number_format($total,2,'.','');
								$suma+=$total;
							
							?>
							<tr>
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
							<h4 class="card-title m-t-30"><?php echo $lang['langs_01025'] ?></h4>
							<form id="dForm" class="form-horizontal" method="GET" action="report_all/shipment_delivered_e.php" target="_blank">
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
							<?php if(!$allshipemployeerow):?>
							<tr>
								<td colspan="9">
								<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($allshipemployeerow as $row):
							
								$suma=0;
								// total shipping cost
								$total=$row->r_costtotal;
								$total=number_format($total,2,'.','');
								$suma+=$total;
							
							?>
							<tr>
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


