<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
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

	
	define("_VALID_PHP", true);
	require_once("../../init.php");
	
	include "fungsi_tanggal.php";

	include "fungsi_rupiah.php";
	
	$hari_ini = date("d-m-Y");


	$tgl1     = $_POST['fecha1'];
	$explode  = explode('-',$tgl1);
	$fecha1 = $explode[2]."-".$explode[1]."-".$explode[0];

	$tgl2      = $_POST['fecha2'];
	$explode   = explode('-',$tgl2);
	$fecha2 = $explode[2]."-".$explode[1]."-".$explode[0];
	
	$agen=$_POST['agencys'];	


	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=All shipments.xls');

	if($_POST['agencys']=='TODAS LAS AGENCIAS'){
		$query="SELECT a.id, a.qid, a.order_inv, a.s_name, a.r_name, a.agency, a.origin_off, a.created, a.r_hour, a.status_courier, a.pay_mode, a.service_options, a.act_status, a.status_novelty, a.r_insurance, a.r_tax, a.total_insurance, a.total_tax, a.r_custom, a.r_costtotal, a.level, a.l_price,
					b.detail_description, b.detail_qnty, b.detail_weight, b.detail_vol  FROM add_courier a, detail_addcourier b WHERE a.origin_off='".$row->name_off."' AND a.qid=b.id_add AND  a.created  BETWEEN '$fecha1' AND '$fecha2' AND  a.act_status='1' AND a.status_novelty='0' ORDER BY a.id ASC";
		$result=mysqli_query($con, $query);
	}else{
	$query="SELECT a.id, a.qid, a.order_inv, a.s_name, a.r_name, a.agency, a.origin_off, a.created, a.r_hour, a.status_courier, a.pay_mode, a.service_options, a.act_status, a.status_novelty, a.r_insurance, a.r_tax, a.total_insurance, a.total_tax, a.r_custom, a.r_costtotal, a.level, a.l_price,
					b.detail_description, b.detail_qnty, b.detail_weight, b.detail_vol  FROM add_courier a, detail_addcourier b WHERE a.origin_off='".$row->name_off."' AND a.qid=b.id_add AND a.agency='$agen' AND   a.created  BETWEEN '$fecha1' AND '$fecha2' AND  a.act_status='1' AND a.status_novelty='0' ORDER BY a.id ASC";
		$result=mysqli_query($con, $query);
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Report all shipments | <?php echo $core->site_name; ?></title>
	
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Online shipping" />
	<meta name="keywords" content="admin,dashboard" />
	<meta name="author" content="osorio2380@yahoo.es" />
	
	<style>
		 
			* { margin: 0; padding: 0; }
			body {
				font: 15px/1.5 Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			#page-wrap { width: 1000px; margin: 0 auto; }
			#customers {
				font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
				border-collapse: collapse;
				width: 100%;
			}

			#customers tr:hover {background-color: #f5f5f5;}

			#customers th {		
				text-align: center;
				font-size: 15px;
				background-color: #0070E0;
				color: white;
			}
			
			#customers td {
				text-align: center;
			}
			
			#panel {
				text-align: center;
			}
			
			#panel-body {
				text-align: center;
			}
	</style>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<!-- Page Container -->
	<div class="page-container">
		<div class="page-content">            
			<div class="page-inner">
			
				<div id="main-wrapper">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="panel panel-white">
								<div class="panel-body">
								   <table style="width: 100%;">
									  <tr>
										<th style="width: 100%;" align="left">
											<div id="logo">
											<?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" />': $core->site_name;?> 
										   </div>
										</th>
										
									  </tr>
									</table>
									  <br>
									<th style="width: 100%;" align="right">
										<h5 class="headtitle">Print date and time
											<br>
										  <?php date_default_timezone_set(''.$core->timezone.'');
											setlocale(LC_TIME, 'es_MX.UTF-8');
											echo date('m/d/y g:ia');?>
										</h5>
									</th>  
									<h3 class="headtitle"><center>All shipping - <?php echo $core->site_name; ?></center></h3>
									<td colspan="6"><center><strong><?php echo ' Start date: '. tgl_eng_to_ind($tgl1).' | Final date: '.tgl_eng_to_ind($tgl2); ?></strong></center></td>
									<br>
									<table width="100%" border="1" id="customers">
										<tr>
											<th><b>#</b></th>
											<th><b>Date</b></th>
											<th><b>Hour</b></th>
											<th><b> # of Guide </b></th>
											<th><b>Agency</b></th>
											<th><b> Office</b></th>
											<th><b> Recipient Name </b></th>
											<th><b> Sender Name </b></th>
											<th><b> Guide Status </b></th>
											<th><b> Payment method </b></th>
											<th><b> Service</b> </th>
											<th><b> Description</b></th>
											<th><b>Quantity</b></th>
											<th><b> Weight</b></th>
											<th> <b> Weight Vol. </b></th>
											<th><b>Secure</b></th>
											<th><b>IVA</b></th>
											<th><b> Declared</b></th>
											<th><b>Subtotal</b></th>
											<th><b>Total</b> </th>
											<th><b> User</b> </th>
										</tr>
										<?php

											while ($row=mysqli_fetch_assoc($result)) {
												$n++;
												
										?>
											<tbody id="projects-tbl">
												<td><?php echo $n; ?></td>
												<td><?php echo $row['created']; ?></td>
												<td><?php echo $row['r_hour']; ?></td>
												<td><?php echo $row['order_inv']; ?></td>
												<td><?php echo $row['agency']; ?></td>
												<td><?php echo $row['origin_off']; ?></td>
												<td><?php echo $row['s_name']; ?></td>
												<td><?php echo $row['r_name']; ?></td>
												<td><?php echo $row['status_courier']; ?></td>
												<td><?php echo $row['pay_mode']; ?></td>
												<td><?php echo $row['service_options']; ?></td>
												<td><?php echo $row['detail_description']; ?></td>
												<td><?php echo $row['detail_qnty']; ?></td>
												<td><?php echo $row['detail_weight']; ?></td>
												<td><?php echo $row['detail_vol']; ?></td>
												<td><?php echo $row['total_insurance']; ?></td>
												<td><?php echo $row['total_tax']; ?></td>
												<td><?php echo $row['r_custom']; ?></td>
												<td><?php echo $row['l_price']; ?></td>
												<td><?php echo $row['r_costtotal']; ?></td>
												<td><?php echo $row['level']; ?></td>
											</tr>	
										<?php } ?>
									</table>
									<table width="100%" border="0">
										<tr>
										<tr>
										<tr>
										<tr>
										<td colspan="5">
										<p><strong>Quien Recibe:________________________________________</strong></p>
										</td>
									  </tr>
									</table>
								</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>					
</body>
</html>