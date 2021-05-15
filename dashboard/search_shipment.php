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
	
    <title> <?php echo $lang['langs_083'] ?> | <?php echo $core->site_name ?></title>
   <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" />
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
  
	
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
                        <h4 class="page-title"> <?php echo $lang['left488'] ?> | <?php include("filter.php");?></h4>
						 
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
								<h2 align="center"><?php echo $lang['left489'] ?></h2>
								<div class="form-group">
									<div class="input-group">
										<button type="button" name="search" class="btn btn-secondary" id="search"><i class="fa fa-search"></i> <?php echo $lang['left490'] ?></button>	
										<input type="text" name="search_text" id="search_text" placeholder="<?php echo $lang['left491'] ?>" class="form-control" />
									</div>
								</div>
							</div>
						</div>
						<div class="card-body wizard-content">
							<div id="result"></div>						
						</div>
					</div>
				</div>
			</div>
		</div>
			
			
		<script src="app.js"></script>
		<script src="dist/js/stacktable.js"></script>
		<script>
			$('table').stacktable();
		</script>

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
		<!--This page JavaScript -->
		<!--chartis chart-->
		<script src="<?php SITEURL ?>assets/libs/chartist/dist/chartist.min.js"></script>
		<script src="<?php SITEURL ?>assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
		<!--c3 charts -->
		<script src="<?php SITEURL ?>assets/extra-libs/c3/d3.min.js"></script>
		<script src="<?php SITEURL ?>assets/extra-libs/c3/c3.min.js"></script>
		<!--chartjs -->
		<script src="<?php SITEURL ?>assets/libs/chart.js/dist/Chart.min.js"></script>

			<!--This page plugins -->
		<script src="<?php SITEURL ?>assets/extra-libs/DataTables/datatables.min.js"></script>
		<script src="<?php SITEURL ?>dist/js/pages/datatable/datatable-basic.init.js"></script>
		
		<script>
		
		$(document).ready(function(){

		 load_data();

		 function load_data(query)
		 {
		  $.ajax({
		   url:"search_live.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
			$('#result').html(data);
		   }
		  });
		 }
		 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  }
		  else
		  {
		   load_data();
		  }
		 });
		});
	</script>