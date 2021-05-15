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
	
    <title><?php echo $lang['conlist-title14'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	

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
                        <h4 class="page-title"><?php echo $lang['conlist-title14'] ?></h4>
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
                                    <h4 class="card-title"><?php echo $lang['conlist-title15'] ?></h4>
                                </div>
								<?php $userrow = $user->getCustomers();?>
								<div class="table-responsive">
                                    <table id="zero_config" class="table table-condensed table-hover table-striped">
                                        <thead>
											<tr>
												<th><b><?php echo $lang['conlist-title16'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['conlist-title17'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['conlist-title18'] ?></b></th>												
												<th class="text-center"><b><?php echo $lang['conlist-title19'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['conlist-title20'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['conlist-title21'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['conlist-title22'] ?></b></th>
											</tr>
										</thead>
										<tbody id="projects-tbl">
											<?php if(!$userrow):?>
											<tr>
												<td colspan="7">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
												",false;?>
												</td>
											</tr>
											<?php else:?>
											<?php foreach ($userrow as $row):?>
											<tr>
												<td><?php echo $row->fname;?> <?php echo $row->lname;?></td>
												<td><?php echo $row->email;?></td>
												<td class="text-center"><?php echo $row->phone;?></td>												
												<td class="text-center"><?php echo $row->address;?></td>
												<td class="text-center"><?php echo $row->country;?> | <?php echo $row->city;?></td>
												<td class="text-center"><?php echo userStatus($row->active, $row->id);?></td>
												<td class="text-center">				
													<a href="add_container.php?do=add_container&amp;action=add&amp;id=<?php echo $row->id;?>" class='btn waves-effect waves-light btn-outline-info top-btn' data-toggle="tooltip" data-placement="top" title="<?php echo $lang['conlist-title23'] ?>" ><span class="ti-layout-column3"></span></a>
												</td>
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

			<?php include 'templates/footer_clientcontainer.php'; ?>