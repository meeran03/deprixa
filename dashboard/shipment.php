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


<?php $allshiprow = $core->getAllship();?>
<?php $allshipemployeerow = $user->getAllshipemployee();?>
<?php $agencyrow = $core->getBranchoffices(); ?>
<div class="row">
	<!-- Column -->
	<?php if($row->userlevel == 9){?>
	
	<div class="col-lg-12 col-xl-6">
		<div class="card card-hover">
			<div class="card-body">
			<h4 class="card-title m-t-30">PDF reports</h4>
			<h5 class="card-subtitle">all shipments by date range</h5>
				<div class="p-t-20 text-center">
					<form id="dForm" class="form-horizontal" method="GET" action="report_all/shipment_all.php" target="_blank">
						<div class="input-daterange input-group" id="date-range">						
							<div class="row">
								<div class="col-md-5">								  
								   <div class="input-group">
									 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal"autocomplete="off" placeholder="Since the date" width="276" required="required" />
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-5">									
									<div class="input-group">
									 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" placeholder="Till the date" width="276"  required="required"/>
									 <input type="hidden" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="input-group">
										<button type="submit" class="waves-effects waves-light m-t-60 btn btn-lg btn-light accent-4 m-b-7">
										  <img src='assets/images/alert/pdf.png' width='29' />
										</button>
									</div>
								</div>
							</div>	
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12 col-xl-6">
		<div class="card card-hover">
			<div class="card-body">
			<h4 class="card-title m-t-30">Excel Report</h4>
			<h5 class="card-subtitle">all shipments by date range</h5>
				<div class="p-t-20 text-center">
					<form id="dForm" class="form-horizontal" method="post" action="report_all/shipment_all_excel.php" >
						<div class="input-daterange input-group" id="date-range">														
							<div class="row">
								<div class="col-md-3">								  
								   <div class="input-group">
									 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy"  name="fecha1"  placeholder="Since the date" />
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-3">									
									<div class="input-group">
									 <input type="text"  class="form-control date-picker" data-date-format="dd-mm-yyyy"  name="fecha2"  placeholder="Htill the date"  />
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<input type="text"  class="form-control" name="agencys"  placeholder="--Select Agency--" list="browsersag" autocomplete="off" required="required"/>
									<datalist id="browsersag">
										<?php foreach ($agencyrow as $row):?>
										<option value="<?php echo $row->name_branch; ?>"><?php echo $row->name_branch; ?></option>
										<?php endforeach;?>
									</datalist>	
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<button type="submit" name="generar_reporte" class="waves-effects waves-light m-t-60 btn btn-lg btn-light accent-4 m-b-7">
										  <img src='assets/images/alert/excel.png' width='29' />
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ship-all1'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all2'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all3'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01043'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all4'] ?></b></th>
								<th class="text-center"><b>Employee</b></th>
								<th class="text-center"><b><?php echo $lang['ship-all5'] ?></b></th>
							</tr>
						</thead>
						
						<tbody id="projects-tbl">
							<?php if(!$allshiprow):?>
							<tr>
								<td colspan="7">
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
								<td><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->email;?></td>
								<td class="text-center"><?php echo $row->created.' - '.$row->r_hour;?></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->level;?></td>
								<td class="text-center"><b><?php echo $core->currency;?> <?php echo $suma;?></b></td>
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
	
	<div class="col-lg-12 col-xl-6">
		<div class="card card-hover">
			<div class="card-body">
			<h4 class="card-title m-t-30">PDF reports</h4>
			<h5 class="card-subtitle">all shipments by date range</h5>
				<div class="p-t-20 text-center">
					<form id="dForm" class="form-horizontal" method="GET" action="report_all/shipment_all_e.php" target="_blank">
						<div class="input-daterange input-group" id="date-range">						
							<div class="row">
								<div class="col-md-5">								  
								   <div class="input-group">
									 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal"autocomplete="off" placeholder="Since the date" width="276" required="required" />
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-5">									
									<div class="input-group">
									 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" placeholder="Till the date" width="276" required="required" />
									 <input type="hidden" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="input-group">
										<button type="submit" class="waves-effects waves-light m-t-60 btn btn-lg btn-light accent-4 m-b-7">
										  <img src='assets/images/alert/pdf.png' width='29' />
										</button>
									</div>
								</div>
							</div>	
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12 col-xl-6">
		<div class="card card-hover">
			<div class="card-body">
			<h4 class="card-title m-t-30">Excel Report</h4>
			<h5 class="card-subtitle">all shipments by date range</h5>
				<div class="p-t-20 text-center">
					<form id="dForm" class="form-horizontal" method="post" action="report_all/shipment_all_excel_e.php" >
						<div class="input-daterange input-group" id="date-range">														
							<div class="row">
								<div class="col-md-3">								  
								   <div class="input-group">
									 <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy"  name="fecha1"  placeholder="Since the date" />
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-3">									
									<div class="input-group">
									 <input type="text"  class="form-control date-picker" data-date-format="dd-mm-yyyy"  name="fecha2"  placeholder="Till the date"  />
										<div class="input-group-append">
											<span class="input-group-text"><i class="ti-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<input type="text"  class="form-control" name="agencys"  placeholder="--Select Agency--" list="browsersag" autocomplete="off" required="required"/>
									<datalist id="browsersag">
										<?php foreach ($agencyrow as $row):?>
										<option value="<?php echo $row->name_branch; ?>"><?php echo $row->name_branch; ?></option>
										<?php endforeach;?>
									</datalist>	
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<button type="submit" name="generar_reporte" class="waves-effects waves-light m-t-60 btn btn-lg btn-light accent-4 m-b-7">
										  <img src='assets/images/alert/excel.png' width='29' />
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>

	
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['ship-all1'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all2'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all3'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['langs_01043'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['ship-all4'] ?></b></th>
								<th class="text-center"><b>Employee</b></th>
								<th class="text-center"><b><?php echo $lang['ship-all5'] ?></b></th>
							</tr>
						</thead>
						
						<tbody id="projects-tbl">
							<?php if(!$allshipemployeerow):?>
							<tr>
								<td colspan="7">
								<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='130' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($allshipemployeerow as $row):
							
								$suma=0;
								// total shipping cost
								$total=$row->r_costtotal+$row->total_tax+$row->total_insurance;
								$total=number_format($total,2,'.','');
								$suma+=$total;
							
							?>
							<tr>
								<td><a  href="edit_courier.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></td>
								<td><?php echo $row->s_name;?></td>
								<td class="text-center"><?php echo $row->email;?></td>
								<td class="text-center"><?php echo $row->created.' - '.$row->r_hour;?></td>
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
								<td class="text-center"><?php echo $row->level;?></td>
								<td class="text-center"><b><?php echo $core->currency;?> <?php echo $suma;?></b></td>
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