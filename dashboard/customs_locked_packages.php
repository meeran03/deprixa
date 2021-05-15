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
	$roww = $user->getUserData();	

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
	
    <title> <?php echo $lang['left408'] ?> | <?php echo $core->site_name ?></title>
   <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<style>
	table{
		table-layout: fixed;
		}

	th, td {
		word-wrap: break-word;
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
                        <h4 class="page-title"><?php echo $lang['left409'] ?> | <?php include("filter.php");?></h4>
						 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				<?php include 'templates/head_user.php'; ?>
				
				<?php $courierrow = $core->getNovelty_list(); ?>
				<div class="row">
					<!-- Column -->
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
							<div id="msgholder"></div>
								<div class="p-15 b-b">
									<div class="d-flex align-items-center">
										<div>
											<h4><?php echo $lang['left410'] ?></h4>
											<span><?php echo $lang['left411'] ?></span>
										</div>
									</div>
								</div>
								<!-- Action part -->
								
								<div id="resultado"></div> 
								
								<div class="table-responsive">
									<table id="zero_config" style="width:100%" cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
										<thead>
											<tr>
												<th style="width:150px"><b><?php echo $lang['left412'] ?></b></th>
												<th style="width:250px" class="text-center"><b><?php echo $lang['left413'] ?></b></th>
												<th style="width:250px" class="text-left"><b><?php echo $lang['left414'] ?></b></th>
												<th style="width:300px" class="text-center"><b><?php echo $lang['left415'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left416'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left417'] ?></b></th>
												<th style="width:150px"class="text-center"><b><?php echo $lang['left418'] ?></b></th>
											</tr>
										</thead>
										<div class="m-t-40">
											<div class="d-flex">
												<div class="mr-auto">
													<div class="form-group">
														<a href="customs_news.php"><button type="button" class="btn btn-info btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['left419'] ?></button></a>
													</div>
												</div>
											</div>
										</div>
										<tbody id="projects-tbl">
											<?php if(!$courierrow):?>
											<tr>
												<td colspan="7">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
												",false;?>
												</td>
											</tr>
											<?php else: ?>
											<?php foreach ($courierrow as $row):?>											
				
											<tr>
												<td style="width:150px"><?php echo $row->order_inv;?></td>
												<td style="width:250px"><?php echo $lang['left420'] ?> <br><b><?php echo $row->type_novelty;?></b><br>
												<?php echo $lang['left421'] ?> <br><b><?php echo $row->novelty_concept;?></b></td>
												<td style="width:250px" class="text-center"><?php echo $row->novelty_observation;?></td>
												<td style="width:300px" class="text-left"><b><?php echo $lang['left429'] ?></b> <?php echo $row->created;?><br><b><?php echo $lang['left422'] ?></b> <?php echo $row->date_novelty;?><br>
												<?php echo $lang['left423'] ?> <b><?php echo $row->origin_off;?></b><br><?php echo $lang['left424'] ?> <b><?php echo $row->agency;?></b><br><?php echo $lang['left425'] ?> <b><?php echo $row->novelty_origin;?></b></td>
												<td class="text-center"><span style="background: #ff0000;"  class="label label-large" ><?php echo $row->status_novelty;?></span></td>
												<td class="text-center"><?php echo $row->level;?></td>
												<td style="width:150px" align='left'>
														<a href="update_customs.php?do=update_customs&amp;action=edit&amp;id=<?php echo $row->id;?>" class="btn waves-effect waves-light btn-outline-info top-btn" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left426'] ?>" ><span class="ti ti-share" style="color:#20c997"></span> <?php echo $lang['left427'] ?></a> 
												</td>
											</tr>
											<?php endforeach;?>
											<?php unset($row);?>
											<?php endif;?>
										</tbody>
									</table>
									<br />				
									<?php echo $pager->display_pages();?>
									<?php echo Core::doDelete("Delete Consolidated","deleteListconsolidate");?> 
								</div>
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