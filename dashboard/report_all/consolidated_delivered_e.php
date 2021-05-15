<?php

	// *************************************************************************
	// *                                                                       *
	// * DEPRIXA -  Integrated Web System		                               *
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
	session_start();
	ob_start();
	
	define("_VALID_PHP", true);
	require_once("../../init.php");
	$row = $user->getUserData();
	
	include "fungsi_tanggal.php";

	include "fungsi_rupiah.php";
	
	$hari_ini = date("d-m-Y");


	$tgl1     = $_GET['tgl_awal'];
	$explode  = explode('-',$tgl1);
	$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

	$tgl2      = $_GET['tgl_akhir'];
	$explode   = explode('-',$tgl2);
	$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];
	
	$used	= $_GET['level'];
	
	if (isset($_GET['tgl_awal'])) {
		$no    = 1;
		$query = mysqli_query($con, "SELECT * FROM consolidate WHERE code_off='".$row->name_off."' AND status_courier='Delivered' AND  created  BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id ASC") 
								or die('error '.mysqli_error($con));
		$count  = mysqli_num_rows($query);
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>CONSOLIDATED SHIPPING REPORT</title>
		<link rel="stylesheet" type="text/css" href="../dist/css/laporan.css" />
    </head>
    <body>
	   <table style="width: 100%;">
		  <tr>
			<th style="width: 20%;" align="left">
				<div id="logo">
				<?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" />': $core->site_name;?> 
			   </div>
			</th>
			<th style="width: 50%;"  align="center">
				<h4 align="center"><strong><?php echo $core->site_name;?></strong></h4>
				<?php echo $core->c_nit;?><br>
				<?php echo $core->c_address;?> - <?php echo $core->c_city;?>
			</th>
			<th style="width: 30%;" align="center">
				<h5 class="headtitle">Print date and time
					<br>
				  <?php date_default_timezone_set(''.$core->timezone.'');
					setlocale(LC_TIME, 'es_MX.UTF-8');
					echo date('m/d/y g:ia');?>
				</h5>
			</th>
		  </tr>
		</table>
	   <br>
	   <div id="title">
          Consolidated shipments | Employee: <?php echo $used; ?>
        </div>
		
		<?php  
		if ($tgl_awal==$tgl_akhir) { ?>
			<div id="title-tanggal">
				Fecha <?php echo tgl_eng_to_ind($tgl1); ?>
			</div>
		<?php
		} else { ?>
			<div id="title-tanggal">
				Desde <?php echo tgl_eng_to_ind($tgl1); ?> hasta <?php echo tgl_eng_to_ind($tgl2); ?>
			</div>
		<?php
		}
		?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle"><small>#.</small></th>
                        <th height="20" align="center" valign="middle"><small># Track </small></th>
                        <th height="20" align="center" valign="middle"><small>Client</small></th>
						<th height="20" align="center" valign="middle"><small>Date</small></th>
						<th height="20" align="center" valign="middle"><small>Collection Date</small></th>
                        <th height="20" align="center" valign="middle"><small>Shipping Status </small></th>
                        <th height="20" align="center" valign="middle"><small>Total cost</small></th>
                    </tr>
                </thead>
                <tbody>
					<?php
						
						if($count == 0) {
							echo "  <tr>
										<td width='30' height='13' align='center' valign='middle'></td>
										<td width='90' height='13' align='center' valign='middle'></td>
										<td width='170' height='13' align='center' valign='middle'></td>
										<td width='80' height='13' align='center' valign='middle'></td>
										<td width='140' height='13' align='center' valign='middle'></td>
										<td width='100' height='13' align='center' valign='middle'></td>
										<td style='padding-left:5px;' width='60' height='13' valign='middle'></td>
									</tr>";
						}

						else {
					   
							while ($row = mysqli_fetch_assoc($query)) {
								$tanggal       = $data['created'];
							$exp           = explode('-',$tanggal);
							$created = $exp[2]."-".$exp[1]."-".$exp[0];
								echo "  <tr>
											<td width='30' height='13' align='center' valign='middle'>$no</td>
											<td width='90' height='13' align='center' valign='middle'>$row[order_inv]</td>
											<td width='170' height='13' align='center' valign='middle'>$row[s_name]</td>
											<td width='80' height='13' align='center' valign='middle'>$row[created]</td>
											<td width='140' height='13' align='center' valign='middle'>$row[collection_courier]</td>
											<td width='100' height='13' valign='middle'>$row[status_courier]</td>
											<td width='60' height='13' align='right' valign='middle'>$row[r_costtotal] $core->currency</td>
										</tr>";
								$no++;
							}
						}
					?>	
                </tbody>
            </table>

        </div>
    </body>
</html>
<?php
$filename="consolidate shipment.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

require_once('../dist/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','es', true, 'UTF-8',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>