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
	ob_start();
	session_start();
	/* Connect To Database*/
	define("_VALID_PHP", true);
	require_once("../../../init.php");
	include("../../lb/Dbconexion.php");
	include("../../lb/config.ini.php");

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$id=intval($_GET['id']);
	$id_custon=intval($_GET['id_custom']);
	$order_inv=mysqli_real_escape_string($con,(strip_tags($_REQUEST['order_inv'], ENT_QUOTES)));
	
	$sql_add=mysqli_query($con,"select * from add_courier where id='".$_GET['id_custom']."'");//Obtengo los datos del proveedor
	$rw_add=mysqli_fetch_array($sql_add);
    
     include(dirname('__FILE__').'/res/customs_report_printing_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Customs Novelty Report_'.$order_inv.'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
