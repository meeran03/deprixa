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
	ob_start();
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	define("_VALID_PHP", true);
	require_once("../init.php");
	

		 $dd=$_POST['Comp_id'];
		 $ss=$_POST['Comp_vl'];
		 $comp_order=$_POST['Comp_up'];
		 if($ss == 1){
		  $updateProj="UPDATE add_courier SET status_novelty='".$ss."' WHERE id='".$dd."' AND order_inv='".$comp_order."'";
		  $comp_projs= $db->query($updateProj);
		  if($comp_projs){
			 echo mensajes("Tracking package # has been blocked <strong>".$comp_order."</strong>, successfully!","rojo");
		  } else{
			  echo mensajes("An error has been registered in the blocking process","rojo");
		  }
		 } else{
		  $updateProj="UPDATE add_courier SET status_novelty='".$ss."' WHERE id='".$dd."' AND order_inv='".$comp_order."'";
		  $comp_projs= $db->query($updateProj);
		  if($comp_projs){
			  echo mensajes("Package with tracking # has been released <strong>".$comp_order."</strong>, successfully!.","verde");
		  } else{
			  echo mensajes("An error has been registered in the blocking process","rojo");
		  }		 
		 }
	
	
?>