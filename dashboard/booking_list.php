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
  include_once '../lib/BookingClass.php';
  
    if (is_dir("../setup"))
      : die("<div style='text-align:center'>" 
		  . "</br></br>"
		  . "<span style='padding: 15px; border: 1px solid #999; background-color:#f9b66d;border-radius:5px;color:#666;padding:5px;margin-top: 40px;" 
		  . "font-family: Verdana; font-size: 14px; margin-left:auto; margin-right:auto'>" 
		  . "<b>Warning:</b> Please delete the <b>setup</b> folder!</span></div>");
  endif;
  
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
    <title><?php echo $lang['dashboard'] ?> | <?php echo $core->site_name ?></title>
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<script>
	/* global paypal */
		function pymnt_initiate(total, order, el , id) {
			paypal.Button.render({
				env: 'production',
				style: {
					label: 'buynow',
					fundingicons: true, // optional
					branding: true, // optional
					size: 'small', // small | medium | large | responsive
					shape: 'rect', // pill | rect
					color: 'gold'   // gold | blue | silver | black
				},
				client: {
					sandbox: '',
					production: '<?php echo $core->client_id ?>'
				},
				commit: true,
				payment: function (data, actions) {
					return actions.payment.create({
						payment: {
							transactions: [
								{
									amount: {total: total, currency: '<?php echo $core->currency ?>'}
								}
							]
						}
					});
				},
				// onAuthorize() is called when the buyer approves the payment
				onAuthorize: function (data, actions) {

					// Make a call to the REST api to execute the payment
					return actions.payment.execute().then(function (payment) {

					  

						var path = "<?php echo SITEURL ?>/lib/success.php";
						$.ajax({
							type: 'POST',
							url: path,
							data: {
								tid: payment.id,
								state: payment.state,
								amount:total,
								track:order,
								item_id:id

							},
							success: function (response) {

								console.log(response);

								if (response == "success") {
									$('#'+el).html('<h6><?php echo $lang['langs_01059'] ?></h6>');
									setTimeout(function () {
										//after succefull payment send user to specific page
										window.location.href = "";

									}, 2500);
								}

							}
						});

					});
				}

			}, '#' + el);
		}
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

				<?php $courier_onlinerow = $user->getCourier_list_booking(); ?>

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
											<h4 class="card-title"><?php echo $lang['left1049'] ?></h4>
										</div>
									</div>
									<!-- column -->
									<div class="table-responsive">
										<table id="zero_config" cellpadding="0" cellspacing="0" border="0" class="table table-striped">
											<thead class="bg-secondary border-0 text-white">
												<tr class="row100 head">
													<th class="th-sm"><b><?php echo $lang['booking-list2'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['booking-list3'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['booking-list5'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['booking-list6'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['booking-list7'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['booking-list8'] ?></b></th>
													<th class="th-sm"><b><?php echo $lang['left1050'] ?></b></th>
												</tr>
											</thead>
											<tbody id="projects-tbl">
												<tr class="row100">
													<?php if(!$courier_onlinerow):?>
													<tr>
														<td colspan="7">
														<?php echo "
														<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='160' /></i>
														</br>
														<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>".$lang['oohhship']."</p>
														<p style='font-size: 16px; -webkit-font-smoothing: antialiased; color: #999;' align='center'> ".$lang['ooohhship']."</p>
														",false;?>
														</td>
													</tr>
													<?php else:?>
													<?php foreach ($courier_onlinerow  as $row):
													
													$suma=0;
													// total shipping cost
													$total1=$row->r_costtotal;
													$total1=number_format($total1,2,'.','');
													$suma+=$total1;
													
													
													?>								
													<td><b><?php echo $row->order_inv;?></b></td>
													<td><?php echo $row->created;?></td>
													<td><?php echo $row->r_name;?></td>
													<td><?php echo $row->r_dest;?> | <?php echo $row->r_city;?> </td>
													<td><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span></td>
													<td><?php echo $row->r_curren;?> <span class="text-black"><strong><?php echo $suma;?></strong></td>
													<?php if ($row->status_courier == 'Pending'){ ?>
													<td><span class="text-danger"><?php echo $lang['langs_01058'] ?></span></td>
													<?php }else{ ?>
													
														<?php if ($row->pay_mode == 'Paypal' && $row->payment_status == 0){ ?>
														<script>
															pymnt_initiate("<?php echo $suma; ?>","<?php echo $row->order_inv;?>","pay-btn<?php echo $row->id; ?>","<?php echo $row->id;?>");
														</script>
														<td id="pay-btn<?php echo $row->id; ?>"></td>
														<?php }elseif ($row->pay_mode == 'Credit card' && $row->payment_status == 0){ ?>
														<script>
															pymnt_initiate("<?php echo $suma; ?>","<?php echo $row->order_inv;?>","pay-btn<?php echo $row->id; ?>","<?php echo $row->id;?>");
														</script>
														<td id="pay-btn<?php echo $row->id; ?>"></td>
														<?php }elseif ($row->pay_mode == 'Cash' && $row->payment_status == 1){ ?>
														<td><img src='assets/images/alert/paid.png' width='68' /></td>
														<?php }else{ ?>
														
														<?php } ?>
													<?php } ?>	
												</tr>											
												<?php endforeach;?>
												<?php unset($row);?>
												<?php endif;?>
											</tbody>	
										</table>
										<?php echo $pager->display_pages();?>
										<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
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
			