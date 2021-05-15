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
  require_once("../init.php");
	//set timezone

	$year = date('Y'); //2019
	$prev = date('Y');
	$pre = date('Y');
	$preconta = date('Y');
	
	$yeardelivered = date('Y'); //2019
	$prevpending = date('Y');
	$prevconslidated = date('Y');
	$preconsolidate = date('Y');

	$out = array();
	
		for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(r_costtotal) as total FROM add_courier WHERE month(created)='$month' AND year(created)='$year' AND  origin_off='".$user->name_off."' AND act_status='1' AND con_status='0' AND status_novelty='0'";
		$query=$db->query($sql);
		$row=$query->fetch_array();

		$out['year'][]= round_out($row['total']);
	}

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT COUNT(id) as total FROM add_courier WHERE month(created)='$month' AND year(created)='$prev' AND origin_off='".$user->name_off."' AND status_novelty='0'";
		$pquery=$db->query($sql);
		$prow=$pquery->fetch_array();

		$out['prev'][]=$prow['total'];
	}
	
	
	
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(r_costtotal) as total FROM add_courier WHERE month(created)='$month' AND year(created)='$yeardelivered' AND  origin_off='".$user->name_off."' AND act_status='2' AND status_courier='Delivered' AND status_novelty='0'";
		$dquery=$db->query($sql);
		$drow=$dquery->fetch_array();

		$out['yeardelivered'][]= round_out($drow['total']);
	}

	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(tprice) as total FROM detail_container WHERE month(created)='$month' AND year(created)='$prevpending' AND  origin_off='".$user->name_off."' AND act_status='3'";
		$bquery=$db->query($sql);
		$brow=$bquery->fetch_array();

		$out['prevpending'][]=round_out($brow['total']);
	}
	
	for ($month = 1; $month <= 12; $month ++){
		$sql2="SELECT SUM(tprice) as total FROM detail_container WHERE month(created)='$month' AND year(created)='$preconta' AND  origin_off='".$user->name_off."'";
		$xquery=$db->query($sql2);
		$xro=$xquery->fetch_array();

		$out['preconta'][]=round_out($xro['total']);
	}
	
	for ($month = 1; $month <= 12; $month ++){
		$sql="SELECT SUM(r_costtotal) as total FROM consolidate WHERE month(created)='$month' AND year(created)='$prevconslidated' AND  code_off='".$user->name_off."' AND act_status='2'";
		$qquery=$db->query($sql);
		$qrow=$qquery->fetch_array();

		$out['prevconslidated'][]=round_out($qrow['total']);
	}
	
	for ($month = 1; $month <= 12; $month ++){
		$sql1="SELECT SUM(r_costtotal) as total FROM consolidate WHERE month(created)='$month' AND year(created)='$pre' AND  code_off='".$user->name_off."'";
		$cquery=$db->query($sql1);
		$bro=$cquery->fetch_array();

		$out['pre'][]=round_out($bro['total']);
	}

	echo json_encode($out);

?>