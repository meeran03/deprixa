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



	//Configuration tracking order consolidated
	
	$sql2 = "SELECT MAX(consol_tid) as consol_tid FROM add_courier";//1
		
	$result2 = $db->query($sql2);
		if($db->numrows($result2) > 0)
		{
			$row=mysqli_fetch_array($result2);
			$cod2=$row[0];
			$sig2=$cod2+1;				
			$Strsig = (string)$sig2;
			$formato2 = str_pad($Strsig, "2", "0", STR_PAD_LEFT); 
		  
		}else{ 
			$sig2=1;
			$Strsig = (string)$sig2;
			$formato2= str_pad($Strsig, "4", "0", STR_PAD_LEFT); 
		}
	

	
	
?>