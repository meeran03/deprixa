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

  if (is_dir("../setup"))
      : die("<div style='text-align:center'>" 
		  . "<span style='padding: 5px; border: 1px solid #999; background-color:#EFEFEF;" 
		  . "font-family: Verdana; font-size: 13px; margin-left:auto; margin-right:auto'>" 
		  . "<b>Warning:</b> Please delete setup directory!</span></div>");
  endif;
  
	if (!$user->logged_in)
	redirect_to("login.php");
	
	$row = $user->getUserData();
	$ser = $services->getAllServices() ;
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
	
    <title><?php echo $lang['user_manage48'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	
	<link href="dist/assets/css_log/front.css" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="dist/assets/js/jquery.js"></script>
	<script type="text/javascript" src="dist/assets/js/jquery-ui.js"></script>
	<script src="dist/assets/js/jquery.ui.touch-punch.js"></script>
	<script src="dist/assets/js/jquery.wysiwyg.js"></script>
	<script src="dist/assets/js/global.js"></script>
	<script src="dist/assets/js/custom.js"></script>
	<script src="dist/assets/js/modernizr.mq.js" type="text/javascript" ></script>
	<script src="dist/assets/js/checkbox.js"></script>
	<script src="dist/assets/js/menu.js"></script>
	
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
                        <h4 class="page-title"><?php echo $lang['user_manage48'] ?> | <?php include("filter.php");?></h4>
						 
                    </div>
                </div>
            </div>
			
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
				<!-- Row -->
				<div class="row">
					<!-- Column -->
					<div class="col-lg-4 col-xlg-3 col-md-5">
						<div class="card">
							<div class="card-body">
								<!-- <center class="m-t-30"> <img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="150" /> -->
									<h4 class="card-title m-t-10"><?php echo $row->fname;?> <?php echo $row->lname;?></h4>
									<h6 class="card-subtitle"><span><?php echo $lang['user_manage2'] ?> <i class="icon-double-angle-right"></i></span>  <div class="badge badge-pill badge-light font-16"><span class="ti-user text-warning"></span>	<?php echo $user->username;?></div></h6>
									<h6 class="card-subtitle"><span>User Locker<i class="icon-double-angle-right"></i></span>  <div class="badge badge-pill badge-light font-16"><span class="ti-user text-warning"></span>	<?php echo $user->locker;?></div></h6>
								</center>
							</div>
							<div><hr> </div>

							<?php if($row->active == "y"){?>

								<div class="card-body">
									<div class="col-xs-12 ">
										<p class="lead"><b>Virtual Address</b></p>
									</div>

									<div class="col-xs-12" style="font-size:14px;">
										<div class="lead sub-title"><b></b></div>
										<small class="text-muted"><?php echo $lang['left1028'] ?></small>
										<h6><?php echo $row->fname;?> <?php echo $row->lname;?></h6>
										<small class="text-muted"><?php echo $lang['left1002'] ?></small> <h6><?php echo $core->locker_address;?></h6>
										<small class="text-muted"><?php echo $lang['left1003'] ?></small> <h6><?php echo $row->locker;?></h6>
										<small class="text-muted"><?php echo $lang['left1004'] ?></small> <h6><?php echo $core->c_country;?></h6>
										<small class="text-muted"><?php echo $lang['left1005'] ?></small> <h6><?php echo $core->c_city;?></h6>
										<small class="text-muted"><?php echo $lang['left1006'] ?></small> <h6><?php echo $core->c_postal;?></h6>
										<small class="text-muted"><?php echo $lang['left1007'] ?></small> <h6><?php echo $core->c_phone;?></h6>
									</div>
								</div>
								<?php }; ?>

							<div class="col-xs-12 pd0"><hr></div>

							<div class="card-body"> 
								<small class="text-muted"><?php echo $lang['left1061'] ?> </small>
								<h6><?php echo $row->email;?></h6> 
								<small class="text-muted p-t-30 db"><?php echo $lang['left1062'] ?></small>
								<h6><?php echo $row->code_phone;?> <?php echo $row->phone;?></h6> 
								<!-- <small class="text-muted p-t-30 db"><?php echo $lang['left1063'] ?></small> -->
								<!-- <h6><?php echo $row->country;?>, <?php echo $row->city;?>, <?php echo $row->postal;?>, <?php echo $row->address;?></h6> -->
							</div>
							<div class="card-body row text-center">
								<div class="col-6 border-right">
									<h6><?php echo $row->cdate;?></h6>
									<span><?php echo $lang['user-account18'] ?></span>
								</div>
								<div class="col-6">
									<h6><?php echo $row->ldate;?></h6>
									<span><?php echo $lang['user-account19'] ?></span>
								</div>
							</div>
						</div>
					</div>
					<!-- Column -->
					<!-- Column -->
					<div class="col-lg-8 col-xlg-9 col-md-7">





						<div class="card">
							<!-- Tabs -->
							<ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting profile</a>
								</li>
							</ul>
							<!-- Tabs -->
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
									<div class="card-body">
									<div id="msgholder"></div>
										<form class="form-horizontal form-material" id="admin_form" method="post">
											<section>
												<div class="row">
													<div class="col-md-3">
														<div class="form-group">
															<label for="firstName1"><?php echo $lang['user_manage3'] ?></label>
															<input type="text" class="form-control" disabled="disabled" name="username" readonly="readonly" value="<?php echo $row->username;?>" placeholder="<?php echo $lang['user_manage3'] ?>">
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="firstName1">Your virtual locker</label>
															<input type="text" class="form-control" disabled="disabled" readonly="readonly" value="<?php echo $row->locker;?>" placeholder="Your virtual locker">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="lastName1"><?php echo $lang['user_manage4'] ?></label>
															<input type="text" class="form-control" name="password" placeholder="<?php echo $lang['user_manage32'] ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="emailAddress1"><?php echo $lang['user_manage6'] ?></label>
															<input type="text" class="form-control" name="fname" value="<?php echo $row->fname;?>" placeholder="<?php echo $lang['user_manage6'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage7'] ?></label>
															<input type="text" class="form-control" name="lname" value="<?php echo $row->lname;?>" placeholder="<?php echo $lang['user_manage7'] ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="emailAddress1"><?php echo $lang['user_manage5'] ?></label>
															<input type="text" class="form-control" name="email" value="<?php echo $row->email;?>" placeholder="<?php echo $lang['user_manage5'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage10'] ?></label>
															<input type="text" class="form-control" name="address" value="<?php echo $row->address;?>" placeholder="<?php echo $lang['user_manage10'] ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="emailAddress1"><?php echo $lang['user_manage8'] ?></label>
															<input type="text" class="form-control" name="code_phone" value="<?php echo $row->code_phone;?>" placeholder="<?php echo $lang['user_manage8'] ?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage9'] ?></label>
															<input type="text" class="form-control" name="phone" value="<?php echo $row->phone;?>" placeholder="<?php echo $lang['user_manage9'] ?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="phoneNumber1">Title</label>
															<select class="custom-select form-control" name="gender" value="<?php echo $row->gender;?>" placeholder="<?php echo $lang['user_manage11'] ?>">
																<option value="Mr.">Mr.</option>
																<option value="Ms.">Ms.</option>
																<option value="Other">Other</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="emailAddress1"><?php echo $lang['user_manage12'] ?></label>
															<input type="text" class="form-control" name="country" value="<?php echo $row->country;?>" placeholder="<?php echo $lang['user_manage12'] ?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage13'] ?></label>
															<input type="text" class="form-control" name="city" value="<?php echo $row->city;?>" placeholder="<?php echo $lang['user_manage13'] ?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage14'] ?></label>
															<input type="text" class="form-control" name="postal" value="<?php echo $row->postal;?>" placeholder="<?php echo $lang['user_manage14'] ?>">
														</div>
													</div>
												</div>
												
												<div class="row ">
													<div class="col-md-5 hide hidden">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage20'] ?></label>
															<div class="inline-group">
																<label class="btn">
																	<div class="custom-control custom-radio">
																	<input readonly disabled type="radio" id="customRadio4"   name="active" value="y" <?php getChecked($row->active, "y"); ?>>
																	<label   for="customRadio4"> <?php echo $lang['user_manage16'] ?></label>
																	</div>
																</label>
																<label class="btn">
																	<div class="custom-control custom-radio">
																	<input readonly disabled type="radio" id="customRadio3"   name="active" value="n" <?php getChecked($row->active, "n"); ?>>
																	<label   for="customRadio3"> <?php echo $lang['user_manage17'] ?></label>
																	</div>
																</label>
																<label class="btn">
																	<div class="custom-control custom-radio">
																	<input readonly disabled type="radio" id="customRadio2"   name="active" value="b" <?php getChecked($row->active, "b"); ?>>
																	<label   for="customRadio2"> <?php echo $lang['user_manage18'] ?></label>
																	</div>
																</label>	
																<label class="btn">
																	<div class="custom-control custom-radio">
																	<input readonly disabled type="radio"id="customRadio1"    name="active" value="t" <?php getChecked($row->active, "t"); ?>>
																	<label   for="customRadio1"> <?php echo $lang['user_manage19'] ?></label>
																	</div>
																</label>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage23'] ?></label>
															<div class="btn-group" data-toggle="buttons">
																<label class="btn">
																	<div class="custom-control custom-radio">
																		<input type="radio" id="customRadio4" name="newsletter" value="1" <?php getChecked($row->newsletter, 1); ?>  >
																		<label  for="customRadio4"> <?php echo $lang['user_manage21'] ?></label>
																	</div>
																</label>
																<label class="btn">
																	<div class="custom-control custom-radio">
																		<input type="radio" id="customRadio5" name="newsletter" value="0" <?php getChecked($row->newsletter, 0); ?>  >
																		<label  for="customRadio5"> <?php echo $lang['user_manage22'] ?></label>
																	</div>
																</label>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row hide hidden ">
													<div class="col-md-6">
														<div class="form-group">
															<label for="lastName1"><?php echo $lang['user_manage24'] ?></label>
															<input class="form-control" name="avatar" type="file" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="emailAddress1"><?php echo $lang['user_manage24'] ?></label>
															<br>
															<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=40&amp;h=40&amp;s=1&amp;a=t1" alt="" title="" class="avatar" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="lastName1">PLease Upload Your Photo ID(Front)</label>
															<input class="form-control" name="card_id" type="file" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="emailAddress1">Photo ID</label>
															<br>
															<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->card_id) ? $row->card_id : "blank.png";?>&amp;w=40&amp;h=40&amp;s=1&amp;a=t1" alt="" title="" class="avatar" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="lastName1">PLease Upload Your Photo ID(Back)</label>
															<input class="form-control" name="card_id_back" type="file" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="emailAddress1">Photo ID</label>
															<br>
															<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->card_id_back) ? $row->card_id_back : "blank.png";?>&amp;w=40&amp;h=40&amp;s=1&amp;a=t1" alt="" title="" class="avatar" />
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label for="phoneNumber1"><?php echo $lang['user_manage27'] ?></label>
															<input type="text" class="form-control" name="lastip" disabled="disabled" readonly="readonly" value="<?php echo $row->lastip;?>" placeholder="<?php echo $lang['user_manage27'] ?>">
														</div>
													</div>
												</div>
												<hr />
												<div class="row hide hidden">
													<div class="col-md-12">
														<div class="form-group">
															<label for="emailAddress1"><?php echo $lang['user_manage28'] ?></label>
															<textarea class="form-control" name="notes" rows="6"  name="notes" placeholder="<?php echo $lang['user_manage31'] ?>"><?php echo $row->notes;?></textarea>
														</div>
													</div>
												</div>

											</section>
											<div class="form-group">
												<div class="col-sm-12">	
													<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['user-account20'] ?><span><i class="icon-ok"></i></span></button>
												</div>
											</div>

											<div class="table-responsive">
							<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped">
								<thead class="bg-secondary border-0 text-white">
									<tr class="row100 head">
										<th class="th-sm"><b>Name</b></th>
										<th class="th-sm"><b>Status</b></th>
									</tr>
								</thead>
								<tbody id="projects-tbl">
									<tr class="row100">
  										<td>BUYING SERVICE</td>
  										
  										<td>
										  <div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" <?php echo $row->buying_service==1 ? "checked" : ""; ?> id="buying_service" name="buying_service">
											<label class="custom-control-label"  for="buying_service">Subscribed</label>
  										  </div>
										</td>
									</tr>

									<tr class="row100">
  										<td>SELLING SERVICE</td>
  										
  										<td>
										  <div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" <?php echo $row->selling_service==1 ? "checked" : ""; ?> id="selling_service" name="selling_service">
											<label class="custom-control-label"  for="selling_service">Subscribed</label>
  										  </div>
										</td>
									</tr>

									<tr class="row100">
  										<td>CUSTOM CLEARENCE SERVICE</td>
  										
  										<td>
										  <div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" <?php echo $row->custom_service==1 ? "checked" : ""; ?> id="custom_service" name="custom_service">
											<label class="custom-control-label"  for="custom_service">Subscribed</label>
  										  </div>
										</td>
									</tr>

									<tr class="row100">
  										<td>PAYMENT SERVICE</td>
  										
  										<td>
										  <div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" <?php echo $row->payment_service==1 ? "checked" : ""; ?> id="switch3" name="payment_service">
											<label class="custom-control-label"  for="payment_service">Subscribed</label>
  										  </div>
										</td>
									</tr>

									<tr class="row100">
  										<td>BUSINESS SERVICE</td>
  										
  										<td>
										  <div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" <?php echo $row->business_service==1 ? "checked" : ""; ?> id="business_service" name="business_service">
											<label class="custom-control-label"  for="business_service">Subscribed</label>
  										  </div>
										</td>
									</tr>
										
								</tbody>	
							</table>
							<!-- column -->
						</div>

										</form>
									</div>
								</div>
							</div>
						</div>

						
					</div>
					<!-- Column -->
				</div>
			<?php echo Core::doForm("processUserclient","../ajax/controller.php");?> 
            </div>
			<!-- footer -->

			<?php
			  
			  if (!defined("_VALID_PHP"))
				  die('Direct access to this location is not allowed.');
			?>			
			<script>
			$("form :input").change(function() {
    console.log($(this).closest('form').serialize());
});
			</script>
			<footer class="footer text-center">
				&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
			</footer>

            <!-- End footer -->
        </div>
    </div>

    <!-- End Wrapper -->
    

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   
    <!-- Bootstrap tether Core JavaScript -->
	
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>

	
	<!--This page plugins -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>


</body>

</html>