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
    <title><?php echo $lang['left1096'] ?> | <?php echo $core->site_name ?></title>
     <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	
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

	* {
	  box-sizing: border-box;
	}
	
	.content_search {
	margin-top: 40px;
	}
	.search {
	max-width: 250px;
	margin: 0 auto;
	position: relative;
	}
	.search input {
	width: 230px;
	height: 44px;
	display: flex;
	padding: .375rem .75rem;
	border: 1px solid #dfe1e5;
	border-radius: 3px;
	z-index: 3;
	}	
	.search i {
		position: absolute;
		cursor: pointer;
		right: 15px;
		top: 0px;
	}
	input:focus { 
		outline: none !important;
		border-color: #719ECE;
		box-shadow: 0 0 5px #719ECE;
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
                    <div class="col-12 align-self-center">
                        <h5 class="page-title"><?php echo $lang['dashboard'] ?> | <?php echo $lang['left1096'] ?></h5>
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

				<?php $deliveredrow = $user->getDeliveredshipdriver(); ?>

				<!-- Sales chart -->
				<!-- ============================================================== -->
				<div class="row">					
					<div class="col-lg-12">
						<div class="card">
							<div class="row">
								<!-- column -->
								<div class="d-md-flex align-items-center">
									<div>
										<h4 class="card-title"><br>&nbsp;&nbsp;<?php echo $lang['left1102'] ?></h4>
									</div>
								</div>
								<!-- column -->
								<div class="table-responsive">
									<table id="demo-foo-addrow2" class="table table-striped table-hover toggle-circle" data-page-size="7">
										<thead>
											<tr>
												<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['left1097'] ?></b></th>
												<th><b><?php echo $lang['left1098'] ?></b></th>	
												<th data-hide="phone, tablet"><b><?php echo $lang['left1099'] ?></b></th>
												<th data-hide="phone, tablet"><b><?php echo $lang['left1100'] ?></b></th>
												<th><b><?php echo $lang['left1101'] ?></b></th>
											</tr>
										</thead>
										<div class="m-t-5">
											<div class="d-flex">
												<div class="ml-auto">
													<div class="form-group">
														<div class="content_search">
															<div class="search">
																<input type="text" id="demo-input-search2" placeholder="Barcode..." autofocus autocomplete="off">
																<span class="text-secondary display-7"><i class="mdi mdi-barcode-scan" style="color:#FF5C26"></i></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<tbody id="projects-tbl">
											<?php if(!$deliveredrow):?>
											<tr>
												<td colspan="10">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
												",false;?>
												</td>
											</tr>
											<?php else: ?>
											<?php foreach ($deliveredrow as $row):?>
											<tr class="card-hover">	
												<td><b><?php echo $row->order_inv;?></b></td>
												<td><?php echo $row->s_name;?></td>
												<td class="text-center"><?php echo $row->deliver_date.' - '.$row->delivery_hour;?></td>
												<td class="text-center"><?php echo $row->person_receives;?></td>															
												<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
											</tr>											
											<?php endforeach;?>
											<?php unset($row);?>
											<?php endif;?>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="9">
													<div class="text-right">
														<ul class="pagination"></ul>
													</div>
												</td>
											</tr>
										</tfoot>
									</table>
									<?php echo $pager->display_pages();?>
									<!-- column -->
								</div>
							</div>
						</div>
					</div>
				</div>

				
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- footer -->
			
			
			<?php include 'templates/footer.php'; ?>
			
			<script src="app.js"></script>
			<script src="dist/js/stacktable.js"></script>
			<!--This page JavaScript -->
			<script src="assets/libs/footable/dist/footable.all.min.js"></script>
			<script src="dist/js/pages/tables/footable-init.js"></script>
			<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
			<script src="dist/js/pages/datatable/datatable-basic.init.js"></script>    
			<script src="assets/extra-libs/prism/prism.js"></script>