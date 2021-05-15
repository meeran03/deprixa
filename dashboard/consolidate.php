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
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	define("_VALID_PHP", true);
	require_once("../init.php");
	include("track.php");
  
	if (!$user->is_Admin())
		redirect_to("login.php");
		
	$row = $user->getUserData();


		

	// define variables and set to empty values
	$selectorErr = "";
	$selector = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["selector"])) {
		$selectorErr = "".$lang['left331']."";
		} else {
			$id_check=$_POST['selector'];
			$N = count($id_check);
			for($i=0; $i < $N; $i++)
			{
				$consol_id=$_POST['consol_id'];
				$consol_status=$_POST['consol_status'];
				$consol_ids=$_POST['consol_ids'];
				$bulk_arr = explode(',', $consol_id);
				foreach($bulk_arr as $bulk_id){
				$sql="UPDATE add_courier SET con_status='$consol_status', consol_id='$consol_ids', consol_tid='".$formato2."' WHERE id='$id_check[$i]'";
				  $query = $db->query($sql);
					if($query){
						header("Location:add_consolidate.php?do=add_consolidate");
					} else{
						header("Location:add_consolidate.php?message=fail");
					}
				}
			}
		}
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
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
	
    <title> <?php echo $lang['langs_083'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="dist/css/style.min.css" rel="stylesheet">
	<link href="assets/libs/summernote/dist/summernote-bs4.css" rel="stylesheet">
	<link href="assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet">	
    
	<!-- Custom jquery -->
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>

	<style type="text/css">
		canvas{
			margin:auto;
		}
		.alert{
			margin-top:20px;
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
                        <h4 class="page-title"> <?php echo $lang['langs_084'] ?> | <?php include("filter.php");?></h4>
						 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
				 <?php $courierrow = $core->getCourier_list(); ?>
				 <?php $courieremployeerow = $user->getCourieremployee_list(); ?>
				<div class="row">
					<!-- Column -->
					<?php if($row->userlevel == 9){?>
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
							
								<div class="p-15 b-b">
									<div class="d-flex align-items-center">
										<div>
											<h4><?php echo $lang['left319'] ?></h4>
											<span><?php echo $lang['left320'] ?></span>
										</div>
									</div>
								</div>
								<!-- Action part -->
								
								<div class="table-responsive">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div id="tCreateTest">
											<div class="col-md-6 margin-top-10 clients" style="text-align:center; font-size:15px;">
											<?php if($selectorErr){?>
												<div class="alert alert-danger"><i class="ti-package"></i> <?php echo $selectorErr;?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
												</div>
												<?php } ?>
											</div>
										</div>
										<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
											<thead>
												<tr>
													<th class="th-sm">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input sl-all" id="cstall">
														</div>
													</th>
													<th class="th-sm"><b><?php echo $lang['ltracking'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['left332'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['rreceiver'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['qquantity'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['dasha'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['ddate'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['sstatus'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['left328'] ?></b></th>
												</tr>
											</thead>
											<div class="m-t-40">
												<div class="d-flex">
													<div class="mr-auto">
														<div class="form-group">
															<input type="hidden" class="bulk_ids" value="" name="consol_id"/>
															<input type="hidden" value="0" name="consol_status"/>
															<input type="hidden" value="1" name="consol_ids"/>
															<input type="hidden" value="Consolidated" name="bulk_status"/>
															<button type="submit" class="btn btn-info pull-right" name="submit" ><i class="ti ti-gift"></i> <?php echo $lang['left333'] ?></button>
																
														</div>
													</div>
												</div>
											</div>
											<tbody id="projects-tbl">
												<!-- row -->
												<?php if(!$courierrow):?>
												<tr>
													<td colspan="9">
													<?php echo "
													<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_consolidation.png' width='162' /></i>
													",false;?>
													</td>
												</tr>
												<?php else: ?>
												<?php 
													foreach ($courierrow as $row):
													$id_check=$row->id;	
												?>
												<tr>
													<td>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="selector[]" value="<?php echo $id_check; ?>">
															<span class="custom-control-indicator"></span>
														</label>
													</td>
													<td style="text-align:center; font-size:16px;" class="starred"><b><?php echo $row->order_inv;?></b></td>
													<td style="text-align:center; font-size:16px;" class="user-name">
														<h6 class="m-b-0"><?php echo $row->s_name;?></h6>
													</td>
													<td style="text-align:center; font-size:16px;" class="user-name">
														<h6 class="m-b-0"><?php echo $row->r_name;?></h6>
													</td>
													<td style="text-align:center; font-size:16px;" class="user-image"><?php echo $row->r_qnty;?></td>
													<td style="text-align:center; font-size:16px;" class="max-texts"><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
													<td style="text-align:center; font-size:16px;" class="time"> <?php echo $row->created;?></td>
													<td style="text-align:center; font-size:16px;" class="clip"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>											
													<td style="text-align:center; font-size:16px;" class="user-image"><?php echo $row->level;?></td>
												</tr>
												<?php endforeach;?>
												<?php unset($row);?>
												<?php endif;?>
											</tbody>
										</table>
										<br />				
										
										<?php echo $pager->display_pages();?>
									</form>	
								</div>
							</div>
						</div>
					</div>
					
					<?php }else if($row->userlevel == 2){?>
					
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
							
								<div class="p-15 b-b">
									<div class="d-flex align-items-center">
										<div>
											<h4><?php echo $lang['left319'] ?></h4>
											<span><?php echo $lang['left320'] ?></span>
										</div>
									</div>
								</div>
								<!-- Action part -->
								
								<div class="table-responsive">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div id="tCreateTest">
											<div class="col-md-6 margin-top-10 clients" style="text-align:center; font-size:15px;">
											<?php if($selectorErr){?>
												<div class="alert alert-danger"><i class="ti-package"></i> <?php echo $selectorErr;?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
												</div>
												<?php } ?>
											</div>
										</div>
										<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
											<thead>
												<tr>
													<th class="th-sm">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input sl-all" id="cstall">
														</div>
													</th>
													<th class="th-sm"><b><?php echo $lang['ltracking'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['left332'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['rreceiver'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['qquantity'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['dasha'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['ddate'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['sstatus'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['left328'] ?></b></th>
												</tr>
											</thead>
											<div class="m-t-40">
												<div class="d-flex">
													<div class="mr-auto">
														<div class="form-group">
															<input type="hidden" class="bulk_ids" value="" name="consol_id"/>
															<input type="hidden" value="0" name="consol_status"/>
															<input type="hidden" value="1" name="consol_ids"/>
															<input type="hidden" value="Consolidated" name="bulk_status"/>
															<button type="submit" class="btn btn-info pull-right" name="submit" ><i class="ti ti-gift"></i> <?php echo $lang['left333'] ?></button>
																
														</div>
													</div>
												</div>
											</div>
											<tbody id="projects-tbl">
												<!-- row -->
												<?php if(!$courieremployeerow):?>
												<tr>
													<td colspan="9">
													<?php echo "
													<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_consolidation.png' width='162' /></i>
													",false;?>
													</td>
												</tr>
												<?php else: ?>
												<?php 
													foreach ($courieremployeerow as $row):
													$id_check=$row->id;	
												?>
												<tr>
													<td>
														<label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="selector[]" value="<?php echo $id_check; ?>">
															<span class="custom-control-indicator"></span>
														</label>
													</td>
													<td style="text-align:center; font-size:16px;" class="starred"><b><?php echo $row->order_inv;?></b></td>
													<td style="text-align:center; font-size:16px;" class="user-name">
														<h6 class="m-b-0"><?php echo $row->s_name;?></h6>
													</td>
													<td style="text-align:center; font-size:16px;" class="user-name">
														<h6 class="m-b-0"><?php echo $row->r_name;?></h6>
													</td>
													<td style="text-align:center; font-size:16px;" class="user-image"><?php echo $row->r_qnty;?></td>
													<td style="text-align:center; font-size:16px;" class="max-texts"><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
													<td style="text-align:center; font-size:16px;" class="time"> <?php echo $row->created;?></td>
													<td style="text-align:center; font-size:16px;" class="clip"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>											
													<td style="text-align:center; font-size:16px;" class="user-image"><?php echo $row->level;?></td>
												</tr>
												<?php endforeach;?>
												<?php unset($row);?>
												<?php endif;?>
											</tbody>
										</table>
										<br />				
										
										<?php echo $pager->display_pages();?>
									</form>	
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					<!-- Column -->
				</div>

            </div>
			
			<!-- footer -->

			<?php include 'templates/footer.php'; ?>
