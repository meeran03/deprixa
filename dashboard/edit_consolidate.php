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
	
    <title><?php echo $lang['langs_089'] ?> | <?php echo $core->site_name ?></title>
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
						</br>
						<?php echo $lang['langs_090'] ?><b></b>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				<?php switch(Filter::$action): case "ship": ?>
				<?php $row = Core::getRowById(Core::consolTable, Filter::$id);?> 
				<form id="admin_form" method="post">
                <div class="row">				
					<div class="col-sm-12 col-lg-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $lang['langs_091'] ?></h4>
								<div class="row">									
									<div class="col-sm-12 col-md-6" style="display:none">
										<div class="form-group">
											<label for="inputname" class="control-label col-form-label">Staff Role*</label>
											<input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>" placeholder="Staff Role" readonly>
										</div>
									</div>										
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_092'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="r_name" value="<?php echo $row->r_name; ?>" placeholder="Name Customer" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_093'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" id="exampleFormControlSelect1" name="r_email" value="<?php echo $row->r_email; ?>" placeholder="Email" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_094'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="r_address" value="<?php echo $row->r_address; ?>" placeholder="Address"  readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_095'] ?></i></label>
										<div class="input-group">
											<input type="text" class="form-control" name="r_phone" value="<?php echo $row->r_phone; ?>" placeholder="Phone" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<label for="inputlname" class="control-label col-form-label"><?php echo $lang['langs_096'] ?></label>
										<div class="input-group">
											<input class="form-control" name="r_dest" value="<?php echo $row->r_dest; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_097'] ?></label>
										<div class="input-group">
											<input class="form-control" name="r_address" value="<?php echo $row->r_address; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_098'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="courier" value="<?php echo $row->courier; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['langs_099'] ?></label>
										<div class="input-group">
											<input class="form-control" name="service_options" value="<?php echo $row->service_options; ?>">
										</div>
									</div>								                                     
								</div>
								<div class="row"> 									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0100'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="icon-clock"></i></span>
											</div>
											<input type="text" class="form-control" name="deli_time" value="<?php echo $row->deli_time; ?>">
										</div>
									</div>

									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0101'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="c_driver" value="<?php echo $row->c_driver; ?>" readonly>	
										</div>
									</div>
									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0102'] ?></label>
										<div class="input-group mb-3">
											<input class="form-control" name="code_off" value="<?php echo $row->code_off; ?>" readonly>	
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['langs_0103'] ?></label>
										<input class="form-control" name="status_courier" value="<?php echo $row->status_courier; ?>">
									</div>
								</div>
								
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-6">
						<div class="card">
							<div class="card-body">
							<h4 class="card-title"><?php echo $lang['edit-container16'] ?></h4>
								<div class="row">
									<div class="col-sm-12 col-md-6">										
										<label for="inputcom" class="control-label col-form-label"><?php echo $lang['langs_0104'] ?></label>
										<div class="input-group mb-6">
											<input type="text" class="form-control" name="order_inv" value="<?php echo $row->order_inv; ?>" readonly>
										</div>
									</div>
									<div class="col-sm-12 col-md-6">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0105'] ?></label>
										<div class="input-group mb-3">
											<input type="number" class="form-control" name="seals" value="<?php echo $row->seals; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="card-body bg-light">
									<div class="row">										
										<div class="col-sm-12 col-md-12">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_0106'] ?></label>
											<div class="input-group">
												 <textarea class="form-control" rows="3" name="comments" placeholder="<?php echo $lang['edit-container20'] ?>"><?php echo $row->comments; ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-lg-12 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="row"> 
								
									<div class="col-md-4" > 
										<label for="field-2" class="control-label"><?php echo $lang['langs_044'] ?></label>
										<div class="input-group mb-3"> 
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
											</div>	
											<input type="number" name="r_qnty" value="<?php echo $row->r_qnty; ?>" class="form-control" >													
										</div> 
									</div>
									
									<div class="col-md-4" > 
										<label for="field-2" class="control-label"><?php echo $lang['langs_045'] ?></label>
										<div class="input-group mb-3"> 
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="mdi mdi-weight-kilogram"></i></span>
											</div>
											<input type="number" name="r_weight" id="r_weight" onkeyup="calcular()" value="<?php echo $row->r_weight; ?>" class="form-control" >													
										</div> 
									</div>

									<div class="col-md-4" > 
										<label for="field-2" class="control-label">Peso Vol. total</label>
										<div class="input-group mb-3"> 
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="mdi mdi-weight-kilogram"></i></span>
											</div>
											<input type="number" name="v_weight" id="v_weight" onkeyup="calcular()"value="<?php echo $row->v_weight; ?>" class="form-control" >													
										</div> 
									</div>
								</div>

							
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label">Precio Libra</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
											</div>
											<input type="text" class="form-control" name="value_weight" id="precio_libra" onkeyup="calcular()" value="<?php echo $core->value_weight;?>">
										</div>
									</div>
									
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label">Manejos de envío</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
											</div>
											<input type="text" class="form-control" name="c_handling" id="manejo" onkeyup="calcular()" value="<?php echo $core->c_handling;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title25'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="text" class="form-control"  name="r_tax" id="impuesto" onkeyup="calcular()" value="<?php echo $core->tax;?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['add-title26'] ?></label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1"><i class="fas fa-percent" style="color:#36bea6"></i></span>
											</div>
											<input type="text" class="form-control"  name="r_insurance" id="porcentaje_seguro" onkeyup="calcular()" value="<?php echo $core->insurance;?>">											
										</div>
									</div>
								
									<div class="col-sm-12 col-md-2" style="display:none">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
										<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" >
									</div>
									
									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['langs_048'] ?></label>
										<div class="input-group mb-3">  
											<div class="input-group-prepend">
												<span class="input-group-text"><?php echo $core->currency;?></span>
											</div>
											<input type="number" name="reexpedition" id="reexpedition" onkeyup="calcular()" value="<?php echo $row->reexpedition; ?>" class="form-control" >													
										</div> 
									</div>

									<div class="col-sm-12 col-md-4">
										<label for="inputEmail3" class="control-label col-form-label">Valor declarado <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Impuesto Aduanero por el valor asegurado, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
										<div class="input-group">
											<input type="text" class="form-control" name="r_declarate"  id="declarado" onkeyup="calcular()" value="<?php echo $row->r_declarate; ?>">
										</div>
									</div>	
									
									<div class="col-sm-12 col-md-3" style="display:none">
										<label for="inputEmail3" class="control-label col-form-label">Subtotal <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Impuesto Aduanero por el valor asegurado, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
										<div class="input-group">
											<input type="text" class="form-control" name="l_price"  id="total_libra" value="<?php echo $row->l_price; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3" style="display:none">
										<label for="inputEmail3" class="control-label col-form-label">Total impuesto <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Impuesto Aduanero por el valor asegurado, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
										<div class="input-group">
											<input type="text" class="form-control" name="total_tax"  id="total_impuesto" value="<?php echo $row->total_tax; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-3" style="display:none">
										<label for="inputEmail3" class="control-label col-form-label">Total seguro <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="Impuesto Aduanero por el valor asegurado, <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
										<div class="input-group">
											<input type="text" class="form-control" name="total_insurance"  id="tinsurance"  value="<?php echo $row->total_insurance; ?>">
										</div>
									</div>
									<div class="col-sm-12 col-md-4">
										<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
										<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" name="r_costtotal" id="total_result" value="<?php echo $row->r_costtotal; ?>" >
									</div>														
								</div>
							</div>
							<hr>
							<div class="form-actions">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-offset-3 col-md-12">
													<button type="submit" name="dosubmit" class="btn btn-success"> <i class="mdi mdi-gift"></i>&nbsp; <?php echo $lang['langs_01013'] ?></button>
													<a href="consolidate_list.php" class="btn btn-dark"><i class="icon-action-undo"></i> <?php echo $lang['edit-container32'] ?></a> 
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
				</form>
                <!-- End row -->
				<?php echo Core::doForm("processConsolidate_update");?>
				<?php break;?>
				<?php endswitch;?>
				</div>
			</div>	
		
					<script>
		function calcular() {
				var total_result = 0;
				var libra=eval(document.getElementById("precio_libra").value); // precio de la libra
				
				var librar=eval(document.getElementById("r_weight").value); // precio de la libra
				var librav=eval(document.getElementById("v_weight").value); // precio de la libra
				
				var seguro=eval(document.getElementById("porcentaje_seguro").value); // seguro del envio
				var t_manejo=eval(document.getElementById("manejo").value); // valor declarado del envio
				var t_imp=eval(document.getElementById("impuesto").value); // impuesto del envio
				var t_declarate=eval(document.getElementById("declarado").value); // valor declarado del envio
				var t_reexpedition=eval(document.getElementById("reexpedition").value); // valor re expedition del envio
				
				var t_libra = libra * librar; // calculo de la libra
				var v_libra = libra * librav; // calculo de la libra
				var t_libras = libra * librar; // calculo de la libra
				var t_manejo_envio = t_manejo; // calculo manejo de envio
				var t_manejo_reexp = t_reexpedition; // calculo manejo de envio
				var t_seguro = t_libra * seguro/100; // calculo del seguro
				var t_seguros = t_libra * seguro/100; // calculo del seguro
				var t_impuesto = t_declarate * t_imp/100; // calculo del impuesto
				var t_impuestos = t_declarate * t_imp/100; // calculo del impuesto
				
				var calculate_impuesto;
				if (t_declarate > 199) {
					calculate_impuesto = t_impuesto;
				} else {
					calculate_impuesto = 0;
				}
				
				
				var calculate_libra;
				if (t_libra > v_libra) {
					calculate_libra = t_libra;
				} else {
					calculate_libra = v_libra;
				}

				
				var input = document.getElementById("total_result"); // calculo total del precio
				var input1 = document.getElementById("total_libra"); 
				var input2 = document.getElementById("total_impuesto");
				var input3 = document.getElementById("tinsurance");
				
				total_result = parseFloat(parseFloat(calculate_libra)  +  parseFloat(t_seguro) + parseFloat(calculate_impuesto) + parseFloat(t_manejo_envio) + parseFloat(t_manejo_reexp)) .toFixed(2); <!--Total result formula-->
				total_libra = parseFloat(parseFloat(t_libras)) .toFixed(2);
				total_impuesto = parseFloat(parseFloat(t_impuestos)) .toFixed(2);
				tinsurance = parseFloat(parseFloat(t_seguros)) .toFixed(2);
				
				input.value= total_result;
				input1.value= total_libra;
				input2.value= total_impuesto;
				input3.value= tinsurance;
				
			}
	</script>	
		
			<!-- footer -->
			
            <?php include 'templates/footer.php'; ?>