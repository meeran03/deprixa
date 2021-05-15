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
    <link rel="shortcut icon" type="image/png" href="../uploads/favicon.png">
	
    <title><?php echo $lang['payment1'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->
     <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
	<script src="../assets/js/jquery.ui.touch-punch.js"></script>
	<script src="../assets/js/jquery.wysiwyg.js"></script>
	<script src="../assets/js/global.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
	

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
                        <h4 class="page-title"><?php echo $lang['payment1'] ?></h4>
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
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title"><?php echo $lang['payment2'] ?></h4>
                                </div>
								<?php $paymentlistrow = $core->getPaymentsonline();?>
								<div class="table-responsive">
                                    <table id="zero_config" class="table table-condensed table-hover table-striped">
                                        <thead>
											<tr>
												<th><b><?php echo $lang['payment3'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['payment4'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['payment5'] ?></b></th>												
												<th class="text-center"><b><?php echo $lang['payment6'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['payment7'] ?></b></th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<?php if(!$paymentlistrow):?>
											<tr>
												<td colspan="5">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>
												</br>
												<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['payment1']."</p>											
												",false;?>
												</td>
											</tr>
											<?php else: ?>
											<?php foreach ($paymentlistrow as $row):?>
											
											<td><?php echo $row->transaction_track;?></td>
											<td><?php echo $row->transaction_id;?></td>
											<td class="text-center"><?php echo $core->currency;?> <?php echo $row->transaction_amount;?></td>
											<td class="text-center"><span class="label label-success"><?php echo $row->transaction_state;?></span></td>
											<td class="text-center"><?php echo $row->transaction_date;?></td>
										</tr>											
										<?php endforeach;?>
										<?php unset($row);?>
										<?php endif;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
			
			<!-- footer -->
			
            <?php include 'templates/footer.php'; ?>