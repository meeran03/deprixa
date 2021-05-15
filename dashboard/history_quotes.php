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
  
  if (!$user->logged_in)
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
    <meta name="keywords" content="Courier DEPRIXA-Integral Web System" />
	<meta name="author" content="Jaomweb">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <title><?php echo $lang['left1052'] ?> | <?php echo $core->site_name ?></title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
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

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php echo $lang['dashboard'] ?></h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
			<!-- ============================================================== -->


				<?php include 'templates/head_tab.php'; ?>

				<?php $quoterow = $user->getQuoteapproved_history(); ?>

				<!-- Sales chart -->
				<!-- ============================================================== -->
				<div class="row">					
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<!-- column -->
									<div class="d-md-flex align-items-center">
										<div>
											<h4 class="card-title"><?php echo $lang['left1053'] ?></h4>
										</div>
									</div>
									<!-- column -->
									<div class="table-responsive">
										<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped">
											<thead class="bg-secondary border-0 text-white">
												<tr class="row100 head">
													<th><b><?php echo $lang['left1054'] ?></b></th>
													<th class="text-center"><b><?php echo $lang['left1055'] ?></b></th>	
													<th class="text-center"><b><?php echo $lang['left1056'] ?></b></th>
													<th class="text-center"><b><?php echo $lang['left1057'] ?></b></th>
													<th class="text-center"><b><?php echo $lang['left1058'] ?></b></th>
													<th class="text-center"><b><?php echo $lang['left1059'] ?></b></th>
													<th class="text-center"><b><?php echo $lang['left1060'] ?></b></th>
												</tr>
											</thead>
											<tbody id="projects-tbl">
												<tr class="row100">
													<?php if(!$quoterow):?>
													<tr>
														<td colspan="10">
														<?php echo "
														<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
														",false;?>
														</td>
													</tr>
													<?php else: ?>
													<?php foreach ($quoterow as $row):?>								
													<td><b><?php echo $row->order_quote;?></b></td>
													<td><?php echo $row->phone;?></td>
													<td class="text-center"><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
													<td class="text-center"><?php echo $core->currency;?> <?php echo $row->price_product;?></td>
													<td class="text-center"><?php echo $core->currency;?> <?php echo $row->r_costotal;?></td>													
													<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_quote;?></span></td>
													<td><?php echo "<a href='".$row->url_product."' target=\"_blank\"><img src='./assets/images/alert/url.png' height='20' width='44'></a>" ; ?></td>
												</tr>											
												<?php endforeach;?>
												<?php unset($row);?>
												<?php endif;?>
											</tbody>	
										</table>
										<?php echo $pager->display_pages();?>
										<!-- column -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- footer -->
			
			<script src="app.js"></script>
            <?php include 'templates/footer.php'; ?>
			