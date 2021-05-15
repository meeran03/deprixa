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

define("_VALID_PHP", true);
require_once("../../init.php");
include("../../lb/Dbconexion.php");
include("../../lb/config.ini.php");

if (!$user->is_Admin())
  redirect_to("../login.php");


switch(Filter::$action): case "label": 

$suma3=0;
$row = Core::getRowById(Core::cTable, Filter::$id);

// total shipping cost
$total=$row->r_costtotal;
$total=number_format($total,2,'.','');
$suma3+=$total;

$suma=0;
$suma1=0;
$suma2=0;
// volumetric query of the length of the box
$sql_add=mysqli_query($con,"select SUM(detail_length) as total0 from detail_addcourier where id_add='".$row->qid."'");
$rw_add0=mysqli_fetch_array($sql_add);

// volumetric query of the box width
$sql1=mysqli_query($con,"select SUM(detail_width) as total1 from detail_addcourier where id_add='".$row->qid."'");
$rw_add1=mysqli_fetch_array($sql1);

// volumetric query of the box width
$sql2=mysqli_query($con,"select SUM(detail_height) as total2 from detail_addcourier where id_add='".$row->qid."'");
$rw_add2=mysqli_fetch_array($sql2);

$suma= $rw_add0["total0"];//Length
$suma1= $rw_add1["total1"];//Width
$suma2= $rw_add2["total2"];//Height
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../uploads/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Tracking - <?php echo $row->order_inv; ?></title>
	 <link type='text/css' href='../dist/css/label_custom.css' rel='stylesheet'/>

</head>

<body>
<?php include("print/print.php"); ?>
</body>
</html>

<?php 
break;
endswitch;
?>