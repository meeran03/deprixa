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
  
	if (!$user->is_Admin())
		redirect_to("login.php");
	
		
	$row = $user->getUserData();
						
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title> <?php echo $lang['left355'] ?> | <?php echo $core->site_name ?></title>
   <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	
	<link href="<?php SITEURL ?>dist/assets/css_log/front.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php SITEURL ?>dist/assets/jquery-ui.css" type="text/css" />
	<script type="text/javascript" src="<?php SITEURL ?>dist/assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php SITEURL ?>dist/assets/js/jquery-ui.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/jquery.ui.touch-punch.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/jquery.wysiwyg.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/global.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/custom.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/modernizr.mq.js" type="text/javascript" ></script>
	<script src="<?php SITEURL ?>dist/assets/js/checkbox.js"></script>
	<link href="<?php SITEURL ?>dist/css/style.min.css" rel="stylesheet">


	
  <style>
  .bootstrap-tagsinput {
   width: 80%;
  }
  </style>
	
</head>

<body>

    <div id="main-wrapper">
		<!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        
		<?php include 'preloader.php'; ?>
		
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
	
        <?php include 'topbar.php'; ?>
		
        <!-- End Topbar header -->

		
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
		<?php include 'left_sidebar.php'; ?>
	

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"> <?php echo $lang['left356'] ?> | <?php include("filter.php");?></h4>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->

			
			<div class="row">
				<!-- Column -->
				<div class="col-lg-12 col-xl-12 col-md-12">
					<div class="card">
					
						<div class="card-body">
							<!-- Action part -->
							<div class="container">	
								<h2 align="center" for="inlineFormInput"><?php echo $lang['left357'] ?></h2>
								<form method="post">
									<div class="form-group">
										<div class="input-group">
											<button type="submit" name="submit" class="btn btn-secondary"><i class="fas fas fa-box-open"></i> <?php echo $lang['left358'] ?></button>	
											<input type="text" name="search_text" id="inlineFormInput"   placeholder="<?php echo $lang['left359'] ?>" class="form-control" required />
										</div>
									</div>
								</form>
							</div>
						</div>

						
						<div id="resultado"></div>
						
						<div  class="card-body wizard-content">
							<?php
	
								if(isset($_POST['search_text']))
								{
									  $aKeyword = explode(" ", $_POST['search_text']);
									  $query ="SELECT T1.id, T1.order_inv, T1.country, T1.city, T1.agency, T1.r_weight, T1.v_weight, T1.status_novelty, T1.s_name, T2.id_add, T2.detail_description, T1.r_curren, T1.r_custom, T1.status_novelty,
									  T2.detail_length, T2.detail_width, T2.detail_height, T2.detail_weight, T2.detail_vol, T2.detail_qnty
									  FROM add_courier T1
									  INNER JOIN detail_addcourier T2 ON T1.qid = T2.id_add
									  WHERE T1.order_inv like '%" . $aKeyword[0] . "%' OR T1.s_name like '%" . $aKeyword[0] . "%'";
									  
									 for($i = 1; $i < count($aKeyword); $i++) {
										if(!empty($aKeyword[$i])) {
											$query .= " OR T1.s_name like '%" . $aKeyword[$i] . "%'";
										}
									  }
									 
									 $result = $db->query($query);
									 echo "<br>".$lang['left360'].":<b> ". $_POST['search_text']."</b>";
									echo "<br><br>";	

									
									 if(mysqli_num_rows($result) > 0) {
										$row_count=0;
										
										echo "
											<h4 class='page-title'> ".$lang['left361']."</h4>
											<div class='table-responsive'>
												<table id='zero_config' class='table table-striped'>
													<thead class='bg-secondary border-0 text-white'>
														<tr class='row100 head'>
															<th>".$lang['left362']."</th>
															<th>".$lang['left363']."</th>
															<th>".$lang['left364']."</th>
															<th>".$lang['left365']."</th>
															<th>".$lang['left366']."</th>
															<th style=\"width:200px\">".$lang['left367']."</th>
														</tr>
													<thead>	
										 ";

										while($row = $result->fetch_assoc()) {   
											$row_count++;
											
											 $res = ($row['status_novelty'] == '0') ? "<i class='ti ti-close' style='color:#E74C3C'></i> ".$lang['left368']." " : "";
											
											$respin = ($row['status_novelty'] == '0') ? "1" : "0";
											
											$bloket = ($row['status_novelty'] == '0') ? "":"<i class='ti ti-close' style='color:#E74C3C'></i> <span>".$lang['left369']."</span> ";
											
											$button = ($row['status_novelty'] == '0') ? 
											"
											<button class='btn waves-effect waves-light btn-outline-secondary' type='submit' name='enviar'  onclick=\"custom($('#comp_id').val(),$('#comp_vl').val(),$('#comp_up').val());\">
												<a href=\"javascript:timedRefresh(2000)\" style='color:#000'>". $res . "</a> 
											</button>
											" : "".$bloket."";

											$customs = ($row['status_novelty'] == '0') ? "":" | <a href='add_customs.php?do=add_customs&amp;action=add&amp;id=".$row['id']."' class=\"btn waves-effect waves-light btn-outline-info top-btn\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Crer novedad de aduana\" ><span style=\"color:#343a40\" class=\"ti-check-box\"></span> ".$lang['left370']."</a>";
											
											

											echo "
													<tbody id='projects-tbl'>
														<tr>
															<td><b>". $row['order_inv'] . "</b></td>
															<td><b>".$lang['left371']."</b> ". $row['country'] . " | ". $row['city'] . "<br><b>".$lang['left372']."</b> ". $row['agency'] . "</td>
															<td><b>".$lang['left373']."</b> ". $row['detail_weight'] . " <br><b>".$lang['left374']."</b> ". $row['detail_vol'] . "<br><b>".$lang['left375']."<br></b>
															(<b>".$lang['left376']."</b> ". $row['detail_length'] . "  X <b>".$lang['left377']."</b> ". $row['detail_width'] . " X <b>".$lang['left378']."</b> ". $row['detail_height'] . " )</td>
															<td><b>".$lang['left379']."</b> ". $row['detail_description'] . " <br><b>".$lang['left380']."</b> ". $row['detail_qnty'] . "</td>
															<td>".$lang['left381']." ". $row['r_curren'] . " <b>". $row['r_custom'] . "</b></td>
															<td style=\"width:200px\" class='text-center'>

															<input type='hidden' value='".$row['id']."' id='comp_id'/>
															<input type='hidden' value='".$respin."' id='comp_vl'/>
															<input type='hidden' value='".$row['order_inv']."' id='comp_up'/>
															
															".$button."

															".$customs."
															
															</td>
														</tr>
													</tbody>
											";
										}
										echo "</table>";
									
									}
								
									else {
										echo "<br>".$lang['left382']."";
										
									}
								
								}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="dist/js/stacktable.js"></script>
		<script>
			$('table').stacktable();
		</script>

			<?php
				  
				  if (!defined("_VALID_PHP"))
					  die('Direct access to this location is not allowed.');
				?>			
				
			</div>
		</div>
		<!-- End Wrapper -->
		

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
	   
		<!-- Bootstrap tether Core JavaScript -->
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
		
		<script>
		function custom(comp_id,comp_vl,comp_up) {
	
				var parametros = {"Comp_id":comp_id,"Comp_vl":comp_vl,"Comp_up":comp_up};
				 
			$.ajax({
				data:parametros,
				url:'process_customs.php',
				type: 'post',
				beforeSend: function () {
					$("#resultado").html("Processing, please wait");
				},
				success: function (response) {   
					$("#resultado").html(response);
					
				}
			});
			
			}
		</script>
		
		<script>
		<!--
		function timedRefresh(timeoutPeriod) {
			setTimeout("location.reload(true);",timeoutPeriod);
		}
		//   -->
		</script>
		
		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<!-- Bootstrap tether Core JavaScript -->

		<script src="<?php SITEURL ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
		<script src="<?php SITEURL ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- apps -->
		<script src="<?php SITEURL ?>dist/js/app.min.js"></script>
		<script src="<?php SITEURL ?>dist/js/app.init.js"></script>
		<script src="<?php SITEURL ?>dist/js/app-style-switcher.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="<?php SITEURL ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="<?php SITEURL ?>assets/extra-libs/sparkline/sparkline.js"></script>
		<!--Wave Effects -->
		<script src="<?php SITEURL ?>dist/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="<?php SITEURL ?>dist/js/sidebarmenu.js"></script>
		<!--Custom JavaScript -->
		<script src="<?php SITEURL ?>dist/js/custom.min.js"></script>
		
	
	<!--Datetimepicker -->
		
	<?php include 'datetimepicker.php'; ?>
		
</body>
</html>