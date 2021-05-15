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
	
	include "fungsi_tanggal.php";

	include "fungsi_rupiah.php";
	
	$hari_ini = date("d-m-Y");


	$tgl1     = $_GET['tgl_awal'];
	$explode  = explode('-',$tgl1);
	$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

	$tgl2      = $_GET['tgl_akhir'];
	$explode   = explode('-',$tgl2);
	$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];
	
	if (isset($_GET['tgl_awal'])) {
		$no    = 1;
		
		$query = mysqli_query($con, "SELECT a.id,a.order_inv, a.pay_mode,a.created,b.idcon,b.created,b.tprice
                                    FROM add_container as a INNER JOIN detail_container as b ON a.id=b.idcon
                                    WHERE a.created BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY a.id ASC") 
								or die('error '.mysqli_error($con));
		$count  = mysqli_num_rows($query);
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>CONTAINER REPORT</title>
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
				<h5 class="headtitle">Print Date and Time
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
           BILLING CONTAINER
        </div>
		
		<?php  
		if ($tgl_awal==$tgl_akhir) { ?>
			<div id="title-tanggal">
				Date <?php echo tgl_eng_to_ind($tgl1); ?>
			</div>
		<?php
		} else { ?>
			<div id="title-tanggal">
				Since <?php echo tgl_eng_to_ind($tgl1); ?> Until <?php echo tgl_eng_to_ind($tgl2); ?>
			</div>
		<?php
		}
		?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle"><small>NO.</small></th>
                        <th height="20" align="center" valign="middle"><small>TRACKING </small></th>
						<th height="20" align="center" valign="middle"><small>DATE</small></th>
                        <th height="20" align="center" valign="middle"><small>PAYMENT MODE </small></th>
                        <th height="20" align="center" valign="middle"><small>BALANCE</small></th>
                    </tr>
                </thead>
                <tbody>
					<?php
						
						if($count == 0) {
							echo "  <tr>
										<td width='40' height='13' align='center' valign='middle'></td>
										<td width='170' height='13' align='center' valign='middle'></td>
										<td width='150' height='13' align='center' valign='middle'></td>
										<td width='150' height='13' align='center' valign='middle'></td>
										<td style='padding-left:5px;' width='150' height='13' valign='middle'></td>
									</tr>";
						}

						else {
							$neto=0;	
							while ($row = mysqli_fetch_assoc($query)) {
							$tanggal       = $data['created'];
							$exp           = explode('-',$tanggal);
							$created = $exp[2]."-".$exp[1]."-".$exp[0];
							$neto=$neto+$row['tprice'];
								echo "  <tr>
											<td width='40' height='13' align='center' valign='middle'>$no</td>
											<td width='170' height='13' align='center' valign='middle'>$row[order_inv]</td>
											<td width='150' height='13' align='center' valign='middle'>$row[created]</td>
											<td width='150' height='13' align='center' valign='middle'>$row[pay_mode]</td>
											<td width='150' height='13' align='right' valign='middle'>$row[tprice] $core->currency</td>
										</tr>
										<tr>
											<td colspan='5'><div align='right'>GRAND TOTAL $core->currency  <strong> $neto</strong></div></td>
										</tr>
										";
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
$filename="billing container.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

require_once('../dist/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>