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

/* Connect To Database*/
define("_VALID_PHP", true);
require_once("../../init.php");
	
	
if(isset($_POST["id"]))
{
	foreach($_POST["id"] as $id)
	{
		$sql="UPDATE add_courier SET consol_id='2', consol_tid='2'  WHERE id='".$id."'";
		$update=mysqli_query($con,$sql);
	}
}
?>