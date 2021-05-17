<?php
  define("_VALID_PHP", true);
  require_once("../init.php");

	if (!$user->logged_in)
	redirect_to("login.php");
	
	$row = $user->getUserData();
	$ser = $services->getAllServices();
	$subs = $services->getAllSubServices();
		
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
	
    <title>Services | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	
	<link href="../assets/css_log/front.css" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
	<script src="../assets/js/jquery.ui.touch-punch.js"></script>
	<script src="../assets/js/jquery.wysiwyg.js"></script>
	<script src="../assets/js/global.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/modernizr.mq.js" type="text/javascript" ></script>
	<script src="../assets/js/checkbox.js"></script>
	<script src="../assets/js/menu.js"></script>
	 <link rel="StyleSheet" href="dist/css/calculator.css" type="text/css">
	<script src="assets/js/checkbox.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<script>
	function myFunction() {
	  var checkBox = document.getElementById("myCheck");
	  var text = document.getElementById("text");
	  if (checkBox.checked == true){
		text.style.display = "block";
	  } else {
		 text.style.display = "none";
	  }
	}
	</script>
	<style>
	.modal-backdrop {
  z-index: -1;
}
.table td {
  text-align: center;
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
                        <h4 class="page-title">Services</h4>
						 
                    </div>
                </div>
            </div>	
			<div class="col-12 col-sm-12 col-md-12 card">
				<div class="card-body">
				<h4 class="card-title"><i class="fas fas fa-boxes" style="color:#36bea6"></i> Add A New Service</h4>
					<div class="table-responsive">
						<table id="zero_config" class="table table-striped">
							<thead class="bg-darks border-0 text-white">
								<tr>
									<th style="width: 30%;" align='center'><b>ID</b></th>
									<th class='text-center'><b>NAME</b></th>
									<th class='text-center'><b>Url</b></th>
									<th class='text-center'><b>Actions</b></th>
								</tr>
							</thead>
							<tbody class='items'>
							<tr class="row100">
										<?php if(!$ser):?>
										<tr>
											<td colspan="7">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='160' /></i>
											</br>
											<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>Currently, There are no Available Services</p>
											",false;?>
											</td>
										</tr>
										<?php else:?>
											<?php foreach ($ser  as $service):
												
												
												?>								
												<td class="center" ><?php echo $service->id;?></td>
												<td class="center" ><?php echo $service->name;?></td>
												<td class="center" ><?php echo $service->url;?></td>
												<td class="center" >
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
														<label class="form-check-label" for="flexSwitchCheckChecked"
															>Subscribe</label
														>
													</div>
												</td>
												
											</tr>											
											<?php endforeach;?>
										<?php unset($service);?>
										<?php endif;?>
							</tbody>
						</table>
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Service</span></a>
					</div>		
														
				</div>
			</div>

			<div class="col-12 col-sm-12 col-md-12 card">
				<div class="card-body">
				<h4 class="card-title"><i class="fas fas fa-boxes" style="color:#36bea6"></i> Add A New Sub Service</h4>
					<div class="table-responsive">
						<table id="zero_config" class="table table-striped">
							<thead class="bg-darks border-0 text-white">
								<tr>
									<th style="width: 30%;" align='center'><b>ID</b></th>
									<th class='text-center'><b>NAME</b></th>
									<th class='text-center'><b>Service Name</b></th>
									<th class='text-center'><b>Price</b></th>
									<th class='text-center'><b>Actions</b></th>
								</tr>
							</thead>
							<tbody class='items'>
							<tr class="row100">
										<?php if(!$ser):?>
										<tr>
											<td colspan="7">
											<?php echo "
											<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='160' /></i>
											</br>
											<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>Currently, There are no Available Services</p>
											",false;?>
											</td>
										</tr>
										<?php else:?>
											<?php foreach ($subs  as $service):
												
												
												?>								
												<td class="center" ><?php echo $service->id;?></td>
												<td class="center" ><?php echo $service->name;?></td>
												<td class="center" >
												<?php 
													$req;
													foreach ($ser as $i) {
														if ($i->id == $service->id) {
															$req = $i;
														}
													}
													echo $req->name;
												?></td>
												<td class="center" ><?php echo $service->price;?></td>
												<td class="center" >
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
														<label class="form-check-label" for="flexSwitchCheckChecked"
															>Subscribe</label
														>
													</div>
												</td>
												
											</tr>											
											<?php endforeach;?>
										<?php unset($service);?>
										<?php endif;?>
							</tbody>
						</table>
						<a href="#addSubService" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Sub Service</span></a>
					</div>		
														
				</div>
			</div>


			<div id="addEmployeeModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" name="save_item" id="save_item" >
							<input type="hidden" name="type" value="1"  class="form-control" required>
							<div class="modal-header">						
								<h4 class="modal-title">Add Service</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">					
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name"  class="form-control" required>
								</div>
								<div class="form-group">
									<label>URL</label>
									<input type="text" name="url" class="form-control" required>
								</div>			
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-success" value="Add">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div id="addSubService" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" name="save_sub_service" id="save_sub_service" >
							<input type="hidden" name="type" value="2"  class="form-control" required>
							<div class="modal-header">						
								<h4 class="modal-title">Add Sub Service</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">					
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name"  class="form-control" required>
								</div>
								<div class="form-group">
									<label for="ServiceType"><strong>Select Service</strong></label>
									<input type="text" class="form-control add-listing_form" name="service_id" placeholder="Select A Service" list="browsers2" autocomplete="off" required="required">
									<datalist id="browsers2">
										<?php foreach ($ser as $ss):?>
										<option value="<?php echo $ss->id; ?>"><?php echo $ss->name; ?></option>
										<?php endforeach;?>
									</datalist>
								</div>
								<div class="form-group">
									<label>Price</label>
									<input type="number" name="price" class="form-control" required>
								</div>			
							</div>
							<div class="modal-footer">
								<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
								<input type="submit" class="btn btn-success" value="Add">
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<!-- footer -->

		</div>

	</div>
<script>
				$( "#save_item" ).submit(function( event ) {
					parametros = $(this).serialize();
					console.log(parametros);
					$.ajax({
						type: "POST",
						url:'ajax/add_service.php',
						data: parametros,
						//  beforeSend: function(objeto){
						// 	 $('.items').html('Processing wait...');
						//   },
						success:function(data){
							$(".items").html(data).fadeIn('slow');
							$("#myModal").modal('hide');
						}
					})
					
				  event.preventDefault();
				})

				$( "#save_sub_service" ).submit(function( event ) {
					parametros = $(this).serialize();
					console.log(parametros);
					$.ajax({
						type: "POST",
						url:'ajax/add_service.php',
						data: parametros,
						//  beforeSend: function(objeto){
						// 	 $('.items').html('Processing wait...');
						//   },
						success:function(data){
							$(".items").html(data).fadeIn('slow');
							$("#myModal").modal('hide');
						}
					})
					
				  event.preventDefault();
				})
</script>
<!-- THis is the modal -->
</body>
						
            <?php include 'templates/footer_prealert.php'; ?>