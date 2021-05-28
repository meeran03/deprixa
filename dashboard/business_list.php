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

				<?php $courier_onlinerow = $user->getCompanyList(); ?>

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
                                                <th class="th-sm"><b>Order Id</b></th>
                                                <th class="th-sm"><b>Company Name</b></th>
                                                <th class="th-sm"><b>Package Name</b></th>
                                                <th class="th-sm"><b>Price</b></th>
                                                <th class="th-sm"><b>Transaction ID</b></th>
                                                <th class="th-sm"><b>Payment Status</b></th>
                                                <th class="th-sm"><b>Order Status</b></th>
                                                <th class="th-sm"><b>Actions</b></th>
												</tr>
											</thead>
											<tbody id="projects-tbl">
												<tr class="row100">
													<?php if(!$courier_onlinerow):?>
													<tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
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
																							
													
													?>				
                                                    <td><b><?php echo $row->id;?></b></td>
                                                    <td><?php echo $row->c_name;?></td>
                                                    <td><?php echo $row->name;?></td>
                                                    <td><?php echo $core->currency;?> <?php echo ($row->paid_amount)/100;?></td>
                                                    <td><?php echo $row->transaction_id;?></td>
                                                    <td><?php echo ($row->payment_status);?></td>
                                                    <?php 
                                                        if ($row->status == "In Review") 
                                                            $row->color = "#a89d32";
                                                        else 
                                                            $row->color = "green"
                                                    ?>
                                                    <td  class="col-2" ><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status;?></span></td>
									
													<td align='center' >
														<a  href="edit_courier_client.php?do=edit_courier&amp;action=ship&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo "View" ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
														<a  href="#" data-role="update" data-id="<?php echo $row->id ;?>">
														<?php echo "<script>console.log(".json_encode($courier_onlinerow).");</script>"; ?>
															<i style="color:#343a40" class="ti-package"></i>
															<input type="hidden" 
																value="<?php echo $row->inspect_id ;?>" 
																id="inspect_id<?php echo $row->id ;?>" 
																name="inspect_id" >
															<input type="hidden" 
																value="<?php echo $row->discard_id ;?>" 
																id="discard_id<?php echo $row->id ;?>" 
																name="discard_id"
																>
															<input type="hidden" 
																value="<?php echo $row->return_id ;?>" 
																id="return_id<?php echo $row->id ;?>" 
																name="return_id" >
														</a>
													</td>
											
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
			<script>
			  $(document).ready(function(){

				//  append values in input fields

				  $(document).on('click','a[data-role=update]',function(e){
						var id;
						var inspect_id;
						var return_id  ;
						var discard_id ;
						id  = $(this).data('id');
						inspect_id  = $(e.currentTarget).find("input[name=inspect_id]").val()
						return_id  = $(e.currentTarget).find("input[name=return_id]").val()
						discard_id  = $(e.currentTarget).find("input[name=discard_id]").val()
						console.log("Inspect id is ",inspect_id);
						console.log("return id is ",return_id)
						console.log(e.currentTarget);
						console.log(inspect_id, " : ","<?php echo $inspect->id ?>")
						console.log(return_id, " : ","<?php echo $return->id ?>")
						console.log(discard_id, " : ","<?php echo $discard->id ?>")
						$(`#inspect_button`).val(inspect_id==="<?php echo $inspect->id ?>" ? ["on"] : ["off"]);
						$(`#return_button`).val(return_id=== "<?php echo $return->id ?>" ? ["on"] : ["off"]);
						$(`#discard_button`).val(discard_id==="<?php echo $discard->id ?>" ? ["on"] : ["off"]);
						$(`#idHolder`).val([id]);
				
						$('#save_invoice_modal').modal('toggle');
				  });
				  // now create event to get data from fields and update in database 

				   $('#save').click(function(e){
					   e.preventDefault()
					  var inspect_id =  $(`#inspect_button`).prop('checked') ? "<?php echo $inspect->id; ?>" : "";
					  var return_id =  $(`#return_button`).prop('checked') ? "<?php echo $return->id; ?>" : "";
					  var discard_id =   $(`#discard_button`).prop('checked') ? "<?php echo $discard->id; ?>" : "";
					  var id =   $(`#idHolder`).val();
					  var inspect_price =  $(`#inspect_button`).prop('checked') ? "<?php echo $inspect->price; ?>" : "";
					  var return_price =   $(`#return_button`).prop('checked') ? "<?php echo $return->price; ?>" : "";
					  var discard_price =   $(`#discard_button`).prop('checked') ? "<?php echo $discard->price; ?>" : "";
					console.log(inspect_id)
					console.log(return_id)
					console.log($(`#discard_button`).prop('checked') )
					console.log($(`#return_button`).prop('checked') )
					let d = {
							  			inspect_id : inspect_id !== "" ? parseInt(inspect_id)  : null  , 
										return_id: return_id !== "" ? parseInt(return_id) : null  , 
										discard_id : discard_id !== "" ? parseInt(discard_id) : null  , 
										inspect_price : inspect_price !== "" ? parseInt(inspect_price)  : null, 
										return_price : return_price !== "" ? parseInt(return_price)  : null, 
										discard_price : discard_price !== "" ? parseInt(discard_price) : null, 
										id: id !== "" ? parseInt(id) : null }

										console.log(d)

					  $.ajax({
						  url      : 'update_addcourier.php',
						  method   : 'post', 
						  data     : d,
						  success  : function(response){
										// now update user record in table 
										//  $('#'+id).children('td[data-target=detail_description]').text(detail_description);
										//  $('#'+id).children('td[data-target=detail_qty]').text(detail_qty);
										//  $('#'+id).children('td[data-target=detail_weight]').text(detail_weight);
										//  $('#'+id).children('td[data-target=detail_length]').text(detail_length);
										//  $('#'+id).children('td[data-target=detail_width]').text(detail_width);
										//  $('#'+id).children('td[data-target=detail_height]').text(detail_height);
										//  $('#edit_courier').modal('toggle'); 
										// if (response == "refresh"){
										//   window.location.reload(true);   // This is not jQuery but simple plain ol' JS
										// }
										console.log(response)
									 }
									 
								 
					  });
				   });
			  });
			</script>
			<script src="app.js"></script>
            <?php include 'templates/footer.php'; ?>
			