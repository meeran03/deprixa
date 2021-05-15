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
	
    <title><?php echo $lang['edit-container1'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

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
		
		<!-- General queries to the database  -->	   

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
				<?php switch(Filter::$action): case "edit": ?>
				<?php $row = Core::getRowById(Core::contaTable, Filter::$id);?>
				<form id="admin_form" method="post">
                <div class="row">
					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['edit-container2'] ?> <?php echo $row->order_inv; ?></h4>
								<div class="row">									
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" readonly>
										</div>
									</div>										
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-container3'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="origin_port" value="<?php echo $row->origin_port; ?>" placeholder="<?php echo $lang['edit-container3'] ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-container4'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="destination_port" value="<?php echo $row->destination_port; ?>" placeholder="<?php echo $lang['edit-container4'] ?>" >
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-container6'] ?></i></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<span style="color:#ff0000" class="ti-calendar"></span>
												</span>
											</div>
											<input type='text' class="form-control" id='datetimepicker1' name="expiration_date" placeholder="Default Pickadate" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-container5'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="s_week" placeholder="<?php echo $lang['edit-container5'] ?>" value="<?php echo $row->s_week; ?>" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-container8'] ?> <i style="color:#ff0000" class="fas fa-boxes"></i></label>
										<div class="input-group">
											<input class="form-control" name="package" value="<?php echo $row->package; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-container9'] ?></label>
										<div class="input-group">
											<input class="form-control" name="courier" value="<?php echo $row->courier; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container10'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="ship_mode" value="<?php echo $row->ship_mode; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['edit-container11'] ?> <i style="color:#ff0000" class="mdi mdi-ferry"></i></label>
										<div class="input-group">
											<input class="form-control" name="status_courier" value="<?php echo $row->status_courier; ?>">
										</div>
									</div>								                                     
								</div>
								<div class="row"> 									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container12'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
											</div>
											<input type="text" class="form-control" name="deli_time" value="<?php echo $row->deli_time; ?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container13'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="incoterms" value="<?php echo $row->incoterms; ?>">	
										</div>
									</div>
									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container14'] ?> <i style="color:#ff0000" class="fas fa-donate"></i></label>
										<div class="input-group mb-3">
											<input class="form-control" name="pay_mode" value="<?php echo $row->pay_mode; ?>">	
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
											<label for="inputname" class="control-label col-form-label"><?php echo $lang['edit-container15'] ?></label>
											<input class="form-control" name="r_curren" value="<?php echo $row->r_curren; ?>">
										</div>
								</div>
								
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-3">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['edit-container16'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6" style="display:none">										
										<label for="inputcom" class="control-label col-form-label">Order Number (Tracking)</label>
										<div class="input-group mb-6">
											<input type="text" class="form-control" name="order_inv" value="<?php echo $row->order_inv; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container17'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control" name="r_tax" value="<?php echo $row->r_tax; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container18'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="number" class="form-control"  name="r_insurance" value="<?php echo $row->r_insurance; ?>">											
										</div>
									</div>
								</div>
								<div class="card-body bg-light">
									<div class="row">										
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container19'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="3" name="s_description" placeholder="<?php echo $lang['edit-container20'] ?>"><?php echo $row->s_description; ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-12 col-lg-3">
						<div class="card">
							<div class="card-body">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12 col-md-12">
											<label for="inputlname" class="control-label col-form-label"><?php echo $lang['edit-container21'] ?> <i class="mdi mdi-view-week" style="color:#36bea6"></i> <?php echo $lang['edit-container22'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-container23'] ?>"></i></b></label>
											<div class="input-group">
												<!-- input box for Length -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-container24'] ?>" class="form-control" value="<?php echo $row->length; ?>" name="length">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for width -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-container25'] ?>" class="form-control" value="<?php echo $row->width; ?>" name="width">
												<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
												<!-- input box for height -->
												<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['edit-container26'] ?>" class="form-control" value="<?php echo $row->height; ?>" name="height">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container27'] ?> <b><i class="mdi mdi-weight" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-container28'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" name="n_weight" value="<?php echo $row->n_weight; ?>" placeholder="<?php echo $lang['edit-container27'] ?>">
											</div>
										</div>
									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['edit-container30'] ?> <b><i class="mdi mdi-weight-kilogram" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-container29'] ?>"></i></b></label>
											<div class="input-group">
												<input type="number" class="form-control" name="g_weight" value="<?php echo $row->g_weight; ?>" placeholder="<?php echo $lang['edit-container30'] ?>">
											</div>
										</div>
										<!--/span-->
									</div>
								</div>
								<hr>
								<div class="form-actions">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-offset-3 col-md-12">
														<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-view-week"></i>&nbsp; <?php echo $lang['edit-container31'] ?></button>
														<a href="container.php?do=list_container" class="btn btn-dark"><i class="icon-action-undo"></i> <i class="mdi mdi-view-week"></i><?php echo $lang['edit-container32'] ?></a> 
													</div>
												</div>
											</div>
											<div class="col-md-6"> </div>
										</div>
									</div>
								</div>
								<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
							</div>
						</div>
					</div>
				</form>
                <!-- End row -->
				<?php echo Core::doForm("processContainer_update");?>
				<?php break;?>
				<?php endswitch;?>
				
				</div>
				<div class="col-sm-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title"><?php echo $lang['edit-container33'] ?></h4>
							<div class="row">																		
								<div class="col-md-12">	
									<div class="table-responsive">
										<table id="bill" class="table" >
											<thead>
												<tr class="well">
													<th width="350"><b><?php echo $lang['edit-container34'] ?></b></th>
													<th width="200"><b><?php echo $lang['edit-container35'] ?></b></th>
													<th width="140"><b><?php echo $lang['edit-container36'] ?></b></th>
													<th width="130"><b><?php echo $lang['edit-container37'] ?></b></th>
													<th></th>
												</tr>
											</thead>
											<?php $ctmprow = $core->getCouriercontainer(); ?>
											<?php 
											
												$table = $db->query("SELECT * FROM add_container, detail_container WHERE add_container.idcon=detail_container.idcon AND add_container.id='".Filter::$id."'");
												while($row = $table->fetch_assoc()) {
											?>
											<tr id="<?php echo $row['id']; ?>">
												<td data-target="detail_container"><?php echo $row['detail_container']; ?></td>
												<td data-target="detail_qty" align='center'><?php echo $row['detail_qty']; ?></td>
												<td data-target="detail_weight" align='center'><?php echo $row['detail_weight']; ?></td>
												<td data-target="price"><?php echo formato($row['price']); ?></td>
												<td align='center'><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>"  class="btn btn-default"><i class="ti-pencil" aria-hidden="true"></i></a></td>
											</tr>
											<?php } ?>
										</table>  
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal edit detail container -->
				<div class="panel-body">
					<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Modal Content is Responsive</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-6">
											<strong><?php echo $lang['edit-container38'] ?></strong><br>
											<input class="form-control" type="text" id="detail_container" autocomplete="off" required ><br>																			
											<strong><?php echo $lang['edit-container39'] ?></strong><br>
											<input class="form-control" type="number" id="detail_qty" min="1" autocomplete="off" required><br>												
										</div>
										<div  class="col-sm-6">	
											<strong><?php echo $lang['edit-container40'] ?></strong><br>
											<input class="form-control" type="number" id="detail_weight" step="any" min="0" autocomplete="off" required><br>	
											<strong><?php echo $lang['edit-container41'] ?></strong><br>    
											<input class="form-control" type="number" id="price" step="any" min="0" autocomplete="off" required><br>											
										</div>
										<input class="form-control" type="hidden" id="uid">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="ti-close" aria-hidden="true"></i> <?php echo $lang['edit-container43'] ?></button>
									<a id="save" class="btn btn-danger waves-effect waves-light"><?php echo $lang['edit-container42'] ?></a>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
				 <!-- /.Modal edit detail container -->		
            </div>
			
			<!-- footer -->
			
            <?php include 'templates/footer_edit_container.php'; ?>
			
			<!-- All Jquery -->
				<script>
				  $(document).ready(function(){

					//  append values in input fields
					  $(document).on('click','a[data-role=update]',function(){
							var id  = $(this).data('id');
							var detail_container  = $('#'+id).children('td[data-target=detail_container]').text();
							var detail_qty  = $('#'+id).children('td[data-target=detail_qty]').text();
							var detail_weight  = $('#'+id).children('td[data-target=detail_weight]').text();
							var price  = $('#'+id).children('td[data-target=price]').text();
							var tprice  = $('#'+id).children('td[data-target=tprice]').text();

							$('#detail_container').val(detail_container);
							$('#detail_qty').val(detail_qty);
							$('#detail_weight').val(detail_weight);
							$('#price').val(price);
							$('#tprice').val(tprice);
							$('#uid').val(id);
							$('#myModal').modal('toggle');
					  });

					  // now create event to get data from fields and update in database 

					   $('#save').click(function(){
						  var id  = $('#uid').val(); 
						  var detail_container =  $('#detail_container').val();
						  var detail_qty =  $('#detail_qty').val();
						  var detail_weight =   $('#detail_weight').val();
						  var price =   $('#price').val();
						  var tprice =   $('#tprice').val();

						  $.ajax({
							  url      : 'update_container.php',
							  method   : 'post', 
							  data     : {detail_container : detail_container , detail_qty: detail_qty , detail_weight : detail_weight , price : price, tprice : tprice, id: id},
							  success  : function(response){
											// now update user record in table 
											 $('#'+id).children('td[data-target=detail_container]').text(detail_container);
											 $('#'+id).children('td[data-target=detail_qty]').text(detail_qty);
											 $('#'+id).children('td[data-target=detail_weight]').text(detail_weight);
											 $('#'+id).children('td[data-target=price]').text(price);
											 $('#'+id).children('td[data-target=tprice]').text(tprice);
											 $('#myModal').modal('toggle'); 
											if (response == "refresh"){
											  window.location.reload(); // This is not jQuery but simple plain ol' JS
											}
										 }
									 
						  });
					   });
				  });
				</script>