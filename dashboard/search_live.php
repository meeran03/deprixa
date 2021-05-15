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
	$roww = $user->getUserData();
	$row = $user->getUserData();

	if($roww->userlevel == 9){

		$output = '';
		if(isset($_POST["query"]))
		{
		 $search = mysqli_real_escape_string($con, $_POST["query"]);
		 $query = "
		  SELECT * FROM add_courier 
		  WHERE order_inv LIKE '%".$search."%'
		  OR country LIKE '%".$search."%' 
		  OR r_dest LIKE '%".$search."%' 
		  OR collection_courier LIKE '%".$search."%' 
		  OR status_courier LIKE '%".$search."%'
		 ";
		}
		else{		
		 $query = "
		  SELECT a.id, a.order_inv, a.country, a.city, a.r_dest, a.r_city, a.status_courier, a.collection_courier, a.level, a.status_novelty, a.origin_off, s.mod_style, s.color FROM  add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.status_novelty='0' ORDER BY a.id   DESC limit 10
		 ";
		}
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0) 
		{
		 $output .= '
		  <div class="table-responsive">
		   <table id="zero_config" class="table table-striped">
			<thead class="bg-secondary border-0 text-white">
				<tr class="row100 head">
					<th>'.$lang['left492'].'</th>
					<th>'.$lang['left493'].'</th>
					<th>'.$lang['left494'].'</th>
					<th>'.$lang['left495'].'</th>
					<th>'.$lang['left496'].'</th>
				</tr>
			<thead>	
		 ';
		 while($row = mysqli_fetch_array($result))
		 {
		  $output .= '
			<tbody id="projects-tbl">
				<tr>
					<td>
						<form action="display_track.php" method="post">
							<input type="hidden" name="order_inv" value="'.$row["order_inv"].'" required>
							<button type="submit" name="submit" class="btn">
								<span class="icon icon-Truck text-white"></span>'.$row["order_inv"].'
							</button>
						</form>
					</td>
					<td>'.$row["country"].', '.$row["city"].'</td>
					<td>'.$row["r_dest"].', '.$row["r_city"].'</td>
					<td>'.$row["collection_courier"].'</td>
					<td><span style="background: '.$row["color"].'"  class="label label-large" >'.$row["status_courier"].'</span></td>
				</tr>
			</tbody>
		  ';
		 }
		 echo $output;
		}
		else
		{
		 echo 'No shipping number';
		}
	
	}else if($roww->userlevel == 2){
		
			$output = '';
		if(isset($_POST["query"]))
		{
		 $search = mysqli_real_escape_string($con, $_POST["query"]);
		 $query = "
		  SELECT * FROM add_courier 
		  WHERE origin_off='".$row->name_off."' AND (order_inv LIKE '%".$search."%'
		  OR country LIKE '%".$search."%' 
		  OR r_dest LIKE '%".$search."%' 
		  OR collection_courier LIKE '%".$search."%'
		  OR status_courier LIKE '%".$search."%') 
		 ";
		}
		else{		
		 $query = "
		  SELECT a.id, a.order_inv, a.country, a.city, a.r_dest, a.r_city, a.status_courier, a.collection_courier, a.level, a.status_novelty, a.origin_off, s.mod_style, s.color FROM  add_courier a, styles s WHERE a.origin_off='".$row->name_off."' AND a.status_courier=s.mod_style AND a.status_novelty='0' ORDER BY a.id  DESC limit 10
		 ";
		}
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0) 
		{
		 $output .= '
		  <div class="table-responsive">
		   <table id="zero_config" class="table table-striped">
			<thead class="bg-secondary border-0 text-white">
				<tr class="row100 head">
					<th>'.$lang['left492'].'</th>
					<th>'.$lang['left493'].'</th>
					<th>'.$lang['left494'].'</th>
					<th>'.$lang['left495'].'</th>
					<th>'.$lang['left496'].'</th>
				</tr>
			<thead>	
		 ';
		 while($row = mysqli_fetch_array($result))
		 {
		  $output .= '
			<tbody id="projects-tbl">
				<tr>
					<td>
						<form action="display_track.php" method="post">
							<input type="hidden" name="order_inv" value="'.$row["order_inv"].'" required>
							<button type="submit" name="submit" class="btn">
								<span class="icon icon-Truck text-white"></span>'.$row["order_inv"].'
							</button>
						</form>
					</td>
					<td>'.$row["country"].', '.$row["city"].'</td>
					<td>'.$row["r_dest"].', '.$row["r_city"].'</td>
					<td>'.$row["collection_courier"].'</td>
					<td><span style="background: '.$row["color"].'"  class="label label-large" >'.$row["status_courier"].'</span></td>
				</tr>
			</tbody>
		  ';
		 }
		 echo $output;
		}
		else
		{
		 echo 'No shipping number';
		}
	
	}
	
?>