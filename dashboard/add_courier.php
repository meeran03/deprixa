<?php

  define("_VALID_PHP", true);
  require_once("../init.php");
  
  if (!$user->is_Admin())
      redirect_to("login.php");
	
	$row = $user->getUserData();
	$roww = $user->getUserData();
	$ser = $services->getAllServices();
	$subs = $services->getBuySubServices();
	
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php $track = $courier->order_track();?>
				<?php $prefix = $courier->order_prefix();?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title><?php echo $lang['add-courier'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<script type="text/javascript">
	 $(document).ready(function() {
	   $("#reset1").click(function() {
		 $("form")[0].reset();
	   });
	 });
	 </script>

<style>
.customTable td {
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
		
		<!-- General queries to the database  -->
		   
		<?php $row = Core::getRowById(Users::uTable, Filter::$id); ?>	
		<?php $office = $core->getOffices(); ?>
		<?php $agencyrow = $core->getBranchoffices(); ?>
		<?php $courierrow = $core->getCouriercom(); ?>
		<?php $statusrow = $core->getStatus(); ?>
		<?php $packrow = $core->getPack(); ?>
		<?php $itemrow = $core->getItem(); ?>
		<?php $moderow = $core->getShipmode();?>
		<?php $driverrow = $user->getDrivers();?>
		<?php $delitimerow = $core->getDelitime();?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
						<?php echo $lang['add-title1'] ?> <b><?php echo $row->country;?>, <?php echo $row->city;?> - <?php echo $row->postal;?></b></br>
						<?php echo $lang['add-title2'] ?> <b><?php echo $row->fname;?> <?php echo $row->lname;?></b>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
				<!-- Row -->

                <div class="row">
				<form id="admin_form" method="post">
                    <div class="col-lg-12">
                        <div >
                            
                                <div class="form-body">
									<div class="row">
										<div class="col-12 col-sm-12 col-md-12 card" style="display:none">
											<div class="card-body">
												
												<div class="row">
													<div class="col-sm-12 col-md-4">
														<div class="form-group">
															<label for="inputname" class="control-label col-form-label">User Name</label>
															<input type="text" class="form-control is-valid" name="username" value="<?php echo $row->username;?>" placeholder="User Name Here">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputname" class="control-label col-form-label">Sender Name</label>
															<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $row->fname;?> <?php echo $row->lname;?>" placeholder="First Name Here">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputEmail3" class="control-label col-form-label">Addres</label>
															<input type="text" class="form-control is-valid" name="address" value="<?php echo $row->address;?>" placeholder="Address">
														</div>
													</div>
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label">Phone</label>
															<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->phone;?>" placeholder="Phone">
														</div>
													</div>
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputEmail3" class="control-label col-form-label">Origin</label>
															<input type="text" class="form-control is-valid" name="country" value="<?php echo $row->country;?>" placeholder="Origin">
														</div>
													</div>                                       
												</div>
												<div class="row"> 
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label">City</label>
															<input type="text" class="form-control is-valid" name="city" value="<?php echo $row->city;?>" placeholder="City">
														</div>
													</div>
												
													<div class="col-sm-12 col-md-3">
														<div class="form-group">
															<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
															<input type="text" class="form-control is-valid" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
														</div>
													</div>
													<div class="col-sm-12 col-md-6">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label">Email</label>
															<input type="email" class="form-control is-valid" name="email" value="<?php echo $row->email;?>" placeholder="Email">
														</div>
													</div>
												</div>
											</div>
										</div>
										
									


										<!-- Till here -->
										
										<div class="col-12 col-sm-12 col-md-12 card">
											<div class="card-body">
											<h4 class="card-title"><i class="mdi mdi-book-multiple" style="color:#36bea6"></i> <?php echo $lang['add-title13'] ?></h4>
											<br>
											<!-- Collapse buttons -->
											
	 										<div class="row">
												<div class="col-12 col-sm-4 col-md-4">
												<div class="form-group">
														<label for="inputname" class="control-label col-form-label">Sender Name</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
															</div>
															<input type="text" class="form-control" id="searchnames"  name="r_name" autofocus placeholder="Sender Name" autocomplete="off" required>
														</div>
													</div>
												</div>

												<div class="col-12 col-sm-4 col-md-4">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title15'] ?></i></label>
															<div class="input-group">
																<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
																		<div class="input-group-text"><i style="color:#ff0000" class="fa fa-calendar"></i></div>
																	</div>
																<input type='text' class="form-control" id='datetimepicker1' name="collection_courier" placeholder="--<?php echo $lang['left206'] ?>--" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
															</div>
														</div>

													<div class="col-12 col-sm-4 col-md-4">										
														<label for="inputcom" class="control-label col-form-label"><?php echo $lang['add-title24'] ?></label>
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $prefix;?></span>
															</div>	
															<input type="text" class="form-control" name="tracking" value="<?php echo $track;?>" >
														</div>
													</div>
											</div>
												<!-- Collapsible element -->
													<div class="row">

														<div class="col-12 col-sm-4 col-md-4">
															<div class="form-group">
																<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title17'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
																<input class="custom-select col-12" name="package" placeholder="--<?php echo $lang['left203'] ?>--" list="browsers1" autocomplete="off" required="required">
																<datalist id="browsers1">
																	<?php foreach ($packrow as $row):?>
																	<option value="<?php echo $row->name_pack; ?>"><?php echo $row->name_pack; ?></option>
																	<?php endforeach;?>
																</datalist>	
															</div>
														</div>
														<!--/span-->
														<div class="col-12 col-sm-4 col-md-4">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title18'] ?></label>
															<div class="input-group">
																<input class="custom-select col-12" name="courier" placeholder="--<?php echo $lang['left204'] ?>--" list="browsers2" autocomplete="off" required="required">
																<datalist id="browsers2">
																	<?php foreach ($courierrow as $row):?>
																	<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
																	<?php endforeach;?>
																</datalist>
															</div>
														</div>
										
														<div class="col-12 col-sm-4 col-md-4">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['add-title19'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
															<div class="input-group">
																<input class="custom-select col-12" name="status_courier" placeholder="--<?php echo $lang['left210'] ?>--" list="browserstatus" autocomplete="off" required="required">
																<datalist id="browserstatus">
																	<?php foreach ($statusrow as $row):?>
																	<?php if($row->mod_style == 'Delivered'){?>
																	<?php }elseif($row->mod_style == 'Pending'){?>
																	<?php }elseif($row->mod_style == 'Rejected'){?>
																	<?php }elseif($row->mod_style == 'Pick up'){?>
																	<?php }elseif($row->mod_style == 'Picked up'){?>
																	<?php }elseif($row->mod_style == 'No Picked up'){?>
																	<?php }elseif($row->mod_style == 'Consolidate'){?>
																	<?php }else{ ?>
																	<option value="<?php echo $row->mod_style; ?>"><?php echo $row->mod_style; ?></option>
																	<?php } ?>
																	<?php endforeach;?>
																</datalist>
															</div>
														</div>
														<!--/span-->
													</div>
							
													
													<div class="row">

														
														<!--/span-->
		
														
														<!--/span-->
													</div>
													<!--/row-->
											</div>
											<hr>
											<div class="form-body">
												<div class="card-body bg-light">
													<div class="row"> 
														<div class="col-sm-12 col-md-4">
															<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title27'] ?></label>
															<div class="input-group">
																<input class="form-control" name="itemcat" placeholder="--<?php echo $lang['left211'] ?>--" list="browsers4" autocomplete="off" required="required">
																<datalist id="browsers4">
																	<?php foreach ($itemrow as $row):?>
																	<option value="<?php echo $row->name_item; ?>"><?php echo $row->name_item; ?></option>
																	<?php endforeach;?>
																</datalist>
															</div>
														</div> 
														
														<div class="col-sm-12 col-md-8">
															<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title32'] ?></label>
															<div class="input-group">
																 <textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['add-title33'] ?>"></textarea>
															</div>
														</div>
													</div>
												</div>					
											</div>		
										</div>
									</div>

									<HR>							
								
									<div class="col-12 col-sm-12 col-md-12 card">
										<div class="card-body">
										<h4 class="card-title"><i class="fas fas fa-boxes" style="color:#36bea6"></i>Volumetric Measures</h4>
											<div class="table-responsive">
												<table id="zero_config" class="table table-striped">
													<thead class="bg-darks border-0 text-white">
														<tr>
															<th class='text-center'><b><?php echo $lang['left215'] ?></b></th>
															<th class='text-center'><b><?php echo $lang['left216'] ?></b></th>
															<th class='text-center'><b><?php echo $lang['left217'] ?></b></th>
															<th class='text-center'><b><?php echo $lang['left218'] ?></b></th>
															<th style="width: 10%;" class='text-center'><b><?php echo $lang['left219'] ?></b></th>
														</tr>
													</thead>
													<tbody >
														<tr>
																<td style="width:10%"  class='text-center'>
																		<input id="r_weight" name="r_weight" style="width:80%" type="text" placeholder="Enter Weight" >
																</td>
																<td style="width:10%"  class='text-center'>
																		<input onchange="calculateWeight()" id="length" name="length" style="width:80%" type="text" placeholder="Enter Length" >
																</td>
																<td style="width:10%"  class='text-center'>
																		<input onchange="calculateWeight()" id="width" name="width" style="width:80%" type="text" placeholder="Enter Width" >
																</td>
																<td style="width:10%"  class='text-center'>
																		<input onchange="calculateWeight()" id="height" name="height" style="width:80%" type="text" placeholder="Enter Height" >
																</td>
																<td style="width: 10%;" class='text-center'>
																		<input id="v_weight" name="v_weight" type="text" placeholder="Enter Volumetric Weight" >
																</td>
														</tr>
													</tbody>
												</table>
											</div>											
										</div>
									</div>

									<div class="col-12 col-sm-12 col-md-12 card">
										<div class="card-body">
										<h4 class="card-title"><?php echo $lang['left220'] ?></h4>
											<div class="card-body">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group row">
															<label class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" name="notifyClient" tabindex="0">
																<span class="custom-control-indicator"></span>
																<label><span><i class="ti-email" style="color:#6610f2"></i>&nbsp; <?php echo $lang['left221'] ?></span></label>
															</label>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-actions">
															<div class="card-body">
																<div class="text-right">
																	<input type="hidden" name="r_address" class="search_addr">
																	<input type="hidden" name="latitude" class="search_latitude">
																	<input type="hidden" name="longitude" class="search_longitude">
																	<input type="hidden" name="latitude_history" class="search_latitude">
																	<input type="hidden" name="longitude_history" class="search_longitude">														
																	<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-airplane-takeoff"></i>&nbsp; <?php echo $lang['left222'] ?></button>
																	<a href="customer_list.php" class="btn btn-dark"> <?php echo $lang['add-title47'] ?></a> 
																</div>
															</div>
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>
									
										
								</div>	
                            </form>
						</div>
					</div>
					<!-- Row -->
				
					<form class="form-horizontal" name="save_item" id="save_item">
						<!-- Modal -->					
						<div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel1"><?php echo $lang['left223'] ?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-sm-12 col-md-8">
											<div class="form-group">
												<label for="message-text" class="control-label"><?php echo $lang['left224'] ?></label>
												<textarea class="form-control" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['left225'] ?>" id="detail_description" name="detail_description" required></textarea>
												<input type="hidden" class="form-control" id="action" name="action"  value="ajax">
											</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<div class="form-group">
													<label for="inputlname" class="control-label col-form-label"><?php echo $lang['left226'] ?></label>
													<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['left227'] ?>" class="form-control" name="detail_qnty" required>
												</div>
											</div>
										</div>	
										
										<div class="row">
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label for="inputlname" class="control-label col-form-label"><?php echo $lang['left228'] ?></label>
													<input type="text" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title31'] ?>" class="form-control" name="detail_weight" required>
												</div>
											</div>
											<div class="col-sm-12 col-md-9">
												<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title34'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['add-title35'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title36'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
												<div class="input-group">
													<!-- input box for Length -->
													<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title37'] ?>" class="form-control" name="detail_length" value="0" required>
													<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
													<!-- input box for width -->
													<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title38'] ?>" class="form-control" name="detail_width" value="0" required>
													<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
													<!-- input box for height -->
													<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title39'] ?>" class="form-control" name="detail_height" value="0" required>
													<!-- Input box for image field -->
													<div class="file-field">
														<div class="d-flex justify-content-center">
															<div class="btn btn-mdb-color btn-rounded float-left">
																<span>Add photo</span>
																<input type="file">
															</div>
														</div>
													</div>
												
												</div>
											</div>
										</div>
										
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['left229'] ?></button>
										<button type="submit" class="btn btn-default"><?php echo $lang['left230'] ?></button>
									</div>
								</div>
							</div>
						</div>

				
					<!-- End row -->
				</div>
				</form>

				<form class="form-horizontal" name="save_invoice" id="save_invoice">
						<!-- Modal -->					
						<div class="modal fade bs-example-modal-lg" id="save_invoice_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel1"><?php echo $lang['left223'] ?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
									<div class="modal-body">
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label">Upload scanned documents</label>
											<div class="input-group mb-3">
												<div id="editor">
													<textarea name="package_invoice" id="summernote" style="margin-top: 60px;" placeholder="Write a text.."></textarea>
													<div class="label2 label-important"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['left229'] ?></button>
										<button type="submit" class="btn btn-default">Upload</button>
									</div>
								</div>
							</div>
						</div>

				
					<!-- End row -->
				</div>
		</form>



            </div>
			<?php echo Core::doForm("processCourier");?>
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
			<script type="text/javascript" src="dist/js/centerwindows.js"></script>
			<script src="dist/js/alert_top.js"></script>	
			
			<script type="text/javascript">

			function calculateWeight() {
				var length = $("#length").val();
				var width = $("#width").val();
				var height = $("#height").val();

				console.log(length)

				var weight =  (length*width*height)/5000;
				document.getElementById("v_weight").value = weight;
			}

				function show_items(){
					var parametros={"action":"ajax"};
					$.ajax({
						url:'ajax/add_items_courier.php',
						data: parametros,
						 beforeSend: function(objeto){
						 $('.items').html('Procesando espere...');
					  },
						success:function(data){
							$(".items").html(data).fadeIn('slow');
					}
					})
				}				

				function delete_item(id){
					$.ajax({
						type: "GET",
						url: "ajax/add_items_courier.php",
						data: "action=ajax&id="+id,
						 beforeSend: function(objeto){
							 $('.items').html('Processing wait...');
						  },
						success: function(data){
							$(".items").html(data).fadeIn('slow');
						}
					});
				}
				
				$( "#save_item" ).submit(function( event ) {
					parametros = $(this).serialize();
					$.ajax({
						type: "POST",
						url:'ajax/add_items_courier.php',
						data: parametros,
						 beforeSend: function(objeto){
							 $('.items').html('Processing wait...');
						  },
						success:function(data){
							$(".items").html(data).fadeIn('slow');
							$("#myModal").modal('hide');
						}
					})
					
				  event.preventDefault();
				})

					show_items();
						
						
			</script>
			
			<script>
				$(document).ready(function() {
					$('#summernote').summernote();
				});
			</script>
			
			
			<?php include 'templates/footer_add_courier.php'; ?>
			