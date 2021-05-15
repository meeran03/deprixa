<?php

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
	<link rel="stylesheet" href="custom/services.css">
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

	<style >
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

				<?php $courierrow = $user->getConsolidateonline_list(); ?>

				<!-- Sales chart -->
				<!-- ============================================================== -->
				<div class="row">					
					<div class="col-lg-12">
					
      <!-- Column -->
                                <!-- column  -->
                            <div class="col-md-6">
                                    <div class="card card-shadow border-0 mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center">
                                        <h5 class="font-weight-medium mb-0">Basic Plan</h5>
                                        <div class="ml-auto"><span class="badge badge-danger font-weight-normal p-2">Popular</span></div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-5 text-center">
                                            <div class="price-box my-3">
                                            <sup>$</sup><span class="text-dark display-5">36</span>
                                            <h6 class="font-weight-light">MONTHLY</h6>
                                            <a class="btn btn-info-gradiant font-14 border-0 text-white p-3 btn-block mt-3" href="#">CHOOSE PLAN </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 align-self-center">
                                            <ul class="list-inline pl-3 font-14 font-weight-medium text-dark">
                                            <li class="py-2"><i class="icon-check text-info mr-2"></i> <span>6 Days a Week </span></li>
                                            <li class="py-2"><i class="icon-check text-info mr-2"></i> <span>Dedicated Trainer</span></li>
                                            <li class="py-2"><i class="icon-check text-info mr-2"></i> <span>Diet Plan Included </span></li>
                                            <li class="py-2"><i class="icon-check text-info mr-2"></i> <span>Morning and Evening Batches</span></li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                                <!-- column  -->
					</div>
				</div>

				
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- footer -->
			
			<script src="app.js"></script>
            <?php include 'templates/footer.php'; ?>
			