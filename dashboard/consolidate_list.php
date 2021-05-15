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
	
    <title> <?php echo $lang['langs_083'] ?> | <?php echo $core->site_name ?></title>
   <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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
				<?php include 'templates/head_user.php'; ?>
				
				<?php $courierrow = $core->getConsolidate_list(); ?>
				<?php $courieremployeerow = $user->getConsolidateemployee_list(); ?>
				<div class="row">
					<!-- Column -->
					<?php if($roww->userlevel == 9){?>
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
							<div id="msgholder"></div>
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
									<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
										<thead>
											<tr>
												<th><b><?php echo $lang['left321'] ?></b></th>
												<th><b><?php echo $lang['left322'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left323'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left324'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left325'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left326'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left327'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left328'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left329'] ?></b></th>
											</tr>
										</thead>
										<div class="m-t-40">
											<div class="d-flex">
												<div class="mr-auto">
													<div class="form-group">
														<a href="consolidate.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['left330'] ?></button></a>
													</div>
												</div>
											</div>
										</div>
										<tbody id="projects-tbl">
											<?php if(!$courierrow):?>
											<tr>
												<td colspan="9">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
												",false;?>
												</td>
											</tr>
											<?php else: ?>
											<?php foreach ($courierrow as $row):?>
											<tr>
												<td><a  href="edit_consolidate.php?do=edit_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></td>
												<td><strong><?php echo $row->n_trackc;?></strong></td>
												<td><?php echo $row->r_name;?></td>
												<td><?php echo $row->agency;?></td>
												<td class="text-center"><?php echo $row->code_off;?></td>
												<td class="text-center"><?php echo $row->r_dest;?>-<?php echo $row->r_address;?></td>
												<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
												<td class="text-center"><?php echo $row->level;?></td>
												<td align='center'>
												<a  href="edit_consolidate.php?do=edit_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooledit'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
												<a  href="invoice/inv_consolidate.php?do=inv_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolprint'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
												<a  href="invoice/label_consolidate.php?do=label_consolidate&amp;action=label&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toollabel'] ?>"><i style="color:#343a40" class="ti-bookmark-alt"></i></a>
												<a  href="status_consolidate.php?do=status_consolidate&amp;action=status_cons&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolupdate'] ?>"><i style="color:#20c997" class="ti-reload"></i></a> 
												<a  href="deliver_consolidate.php?do=deliver_consolidate&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a>
												<a id="item_<?php echo $row->consol_tid;?>" data-rel="<?php echo $row->r_name;?>" class="delete" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldelete'] ?>"><i style="color:#343a40" class="ti-trash"></i></a>
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
					
					<?php }else if($roww->userlevel == 2){?>
					
					<div class="col-lg-12 col-xl-12 col-md-12">
						<div class="card">
							<div class="card-body">
							<div id="msgholder"></div>
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
									<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
										<thead>
											<tr>
												<th><b><?php echo $lang['left321'] ?></b></th>
												<th><b><?php echo $lang['left322'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left323'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left325'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left326'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left327'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left328'] ?></b></th>
												<th class="text-center"><b><?php echo $lang['left329'] ?></b></th>
											</tr>
										</thead>
										<div class="m-t-40">
											<div class="d-flex">
												<div class="mr-auto">
													<div class="form-group">
														<a href="consolidate.php"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['left330'] ?></button></a>
													</div>
												</div>
											</div>
										</div>
										<tbody id="projects-tbl">
											<?php if(!$courieremployeerow):?>
											<tr>
												<td colspan="9">
												<?php echo "
												<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
												",false;?>
												</td>
											</tr>
											<?php else: ?>
											<?php foreach ($courieremployeerow as $row):?>
											<tr>
												<td><a  href="edit_consolidate.php?do=edit_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>"><?php echo $row->order_inv;?></a></td>
												<td><strong><?php echo $row->n_trackc;?></strong></td>
												<td><?php echo $row->r_name;?></td>
												<td class="text-center"><?php echo $row->code_off;?></td>
												<td class="text-center"><?php echo $row->r_dest;?>-<?php echo $row->r_address;?></td>
												<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
												<td class="text-center"><?php echo $row->level;?></td>
												<td align='center'>
												<a  href="edit_consolidate.php?do=edit_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooledit'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
												<a  href="invoice/inv_consolidate.php?do=inv_consolidate&amp;action=ship&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolprint'] ?>"><i style="color:#343a40" class="ti-printer"></i></a>
												<a  href="invoice/label_consolidate.php?do=label_consolidate&amp;action=label&amp;id=<?php echo $row->id;?>" target="_blank" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toollabel'] ?>"><i style="color:#343a40" class="ti-bookmark-alt"></i></a>
												<a  href="status_consolidate.php?do=status_consolidate&amp;action=status_cons&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['toolupdate'] ?>"><i style="color:#20c997" class="ti-reload"></i></a> 
												<a  href="deliver_consolidate.php?do=deliver_consolidate&amp;action=status&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['tooldeliver'] ?>"><i style="color:#2962FF" class="ti-package"></i></a>												
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
					<?php } ?>
					<!-- Column -->
				</div>

            </div>
			
			<!-- footer -->

			<?php include 'templates/footer.php'; ?>
