<?php



$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	/* Connect To Database*/
	define("_VALID_PHP", true);
	require_once("../../init.php");
	
	$sql=mysqli_query($con, "select LAST_INSERT_ID(id_add) as last from detail_addcourier order by id desc limit 0,1 ");
	$rws=mysqli_fetch_array($sql);
	$numbers=$rws['last']+1;
	
	if (isset($_REQUEST['id'])){
		$id=intval($_REQUEST['id']);
		$delete=mysqli_query($con,"delete from detail_addcourier_tmp where id='$id'");
	}
	
	if (isset($_POST['detail_description'])){
		
		$detail_description=mysqli_real_escape_string($con,sanitize($_POST['detail_description']));
		$detail_qnty= sanitize($_POST['detail_qnty']);
		$detail_weight= sanitize($_POST['detail_weight']);
		$detail_length= sanitize($_POST['detail_length']);
		$detail_width= sanitize($_POST['detail_width']);
		$detail_height= sanitize($_POST['detail_height']);
		
		//Calculate weight Volumetric
		$l= sanitize($_POST['detail_length']); 
		$w= sanitize($_POST['detail_width']); 
		$h= sanitize($_POST['detail_height']);
		$z=$l*$w*$h/$core->meter;
		
		$detail_vol= "".round_out($z)."";
				
	$sql="INSERT INTO `detail_addcourier_tmp` (`id`, `id_add`, `detail_weight`, `detail_length`, `detail_width`, `detail_height`, `detail_vol`, `detail_qnty`, `detail_description`, `detail_created`, `level`) VALUES (NULL, '".$numbers."', '$detail_weight', '$detail_length', '$detail_width', '$detail_height', '$detail_vol', '$detail_qnty', '$detail_description', NOW(), '".$user->username."');";
		$insert=mysqli_query($con,$sql);
	}
	
	$sumweight=0;
	$sumr_qnty=0;
	$sumvol=0;
	$calculate_weight = 0;
	$query=mysqli_query($con,"select * from detail_addcourier_tmp order by id");

	while($row=mysqli_fetch_array($query)){
			$totalweight=$row['detail_weight'];
			$totalr_qnty=$row['detail_qnty'];
			$totalvol=$row['detail_vol'];
			
		?>

	<tr class="fixed-row">
		<td style="width: 30%;" align="left"><?php echo $row['detail_description'];?></td>
		<td class='text-center'><?php echo $row['detail_qnty'];?></td>
		<td class='text-center'><?php echo $row['detail_weight'];?></td>		
		<td class='text-center'><?php echo $row['detail_length'];?></td>
		<td class='text-center'><?php echo $row['detail_width'];?></td>
		<td class='text-center'><?php echo $row['detail_height'];?></td>
		<td class='text-center'><?php echo $row['detail_vol'];?></td>
		<td class='text-right'><a href="#" onclick="delete_item('<?php echo $row['id']; ?>')" ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAeFBMVEUAAADnTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDznTDx+VWpeAAAAJ3RSTlMAAQIFCAkPERQYGi40TVRVVlhZaHR8g4WPl5qdtb7Hys7R19rr7e97kMnEAAAAaklEQVQYV7XOSQKCMBQE0UpQwfkrSJwCKmDf/4YuVOIF7F29VQOA897xs50k1aknmnmfPRfvWptdBjOz29Vs46B6aFx/cEBIEAEIamhWc3EcIRKXhQj/hX47nGvt7x8o07ETANP2210OvABwcxH233o1TgAAAABJRU5ErkJggg=="></a></td>
	</tr>
	
		<?php
		$sumweight+=$totalweight;
		$sumr_qnty+=$totalr_qnty;
		$sumvol+=$totalvol;
		
		if ($sumweight > $sumvol) {
			$calculate_weight = $sumweight;
		} elseif($sumvol > $sumweight) {
			$calculate_weight = $sumvol;
		}else{
			$calculate_weight = 0;
		}
		
	}
	?>
	
	<tr>
		<td colspan='12'>		
			<div class="btn-der">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><span class="mdi mdi-book-plus"></span> <?php echo $lang['left231'] ?></button>
			</div>
		</td>		
	</tr>
	
	<tr class="card-hover hover" >
		<td colspan='12'>
			<div class="row">
				<div class="col-lg-12 col-xl-4">
					<div class="card card-hover">
						<div class="card-body">				
							<div class="row">
								<div class="col-sm-6 col-md-6">										
									<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left232'] ?></b></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1" style="color:#ff0000">Lb</span>
										</div>	
										<input type="text" class="form-control" name="r_weight" value="<?php echo $sumweight; ?>">
									</div>
								</div>

								<div class="col-sm-6 col-md-6">										
									<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left233'] ?></b></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1" ><i class="fas fa-sort-numeric-up" style="color:#ff0000"></i></span>
										</div>	
										<input type="text" class="form-control" name="r_qnty" value="<?php echo $sumr_qnty; ?>">
									</div>
								</div>
								
								<div class="col-sm-6 col-md-6">										
									<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left234'] ?></b></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1" style="color:#ff0000"><?php echo $lang['left235'] ?></span>
										</div>	
										<input type="text" class="form-control" name="v_weight" value="<?php echo $sumvol; ?>">
									</div>
								</div>
								
								<div class="col-sm-6 col-md-6">										
									<label for="inputcom" class="control-label col-form-label"><b><?php echo $lang['left236'] ?></b></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1" style="color:#ff0000">Lb</span>
										</div>	
										<input type="text" class="form-control" name="t_weight" value="<?php echo $calculate_weight; ?>">
									</div>
								</div>	
								
							</div>
						</div>
					</div>
				</div>

				<?php $track = $courier->order_track();?>
				<?php $prefix = $courier->order_prefix();?>
				<?php $payrow = $core->getPayment(); ?>
				<div class="col-lg-12 col-xl-8">
					<div class="card card-hover">
						<div class="card-body">						
							<div class="row">

								
								<div class="col-sm-12 col-md-2">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left237'] ?></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="" style="color:#36bea6">$</i></span>
										</div>
										<input type="text" class="form-control" name="value_weight" id="precio_libra" onkeyup="calcular()" value="<?php echo $core->value_weight;?>">
									</div>
								</div>
								

							
								<div class="col-sm-12 col-md-2" style="display:none">
									<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title43'] ?></label>
									<input class="form-control" name="r_curren" value="<?php echo $core->currency; ?>" >
								</div>


								<div class="col-sm-12 col-md-3">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left239'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left244'] ?>  <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
									<div class="input-group">
										<input type="text" class="form-control" name="r_custom"  id="declarado" onkeyup="calcular()" value="0">
									</div>
								</div>	
								
								<div class="col-sm-12 col-md-3" style="display:none">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left240'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left245'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
									<div class="input-group">
										<input type="text" class="form-control" name="l_price"  id="total_libra" value="0">
									</div>
								</div>
								<div class="col-sm-12 col-md-3" style="display:none">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left241'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left246'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
									<div class="input-group">
										<input type="text" class="form-control" name="total_tax"  id="total_impuesto" value="0">
									</div>
								</div>
								<div class="col-sm-12 col-md-3" style="display:none">
									<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['left242'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left247'] ?> <?php echo $core->insurance;?> <?php echo $lang['add-title42'] ?>"></i></b></label>
									<div class="input-group">
										<input type="text" class="form-control" name="total_insurance"  id="tinsurance"  value="0">
									</div>
								</div>
								<div class="col-sm-12 col-md-3">
									<label for="inputname" class="control-label col-form-label"><?php echo $lang['add-title44'] ?> &nbsp; <b><?php echo $core->currency;?></b></label>
									<input type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title45'] ?>" name="r_costtotal" id="total_result" value="" >
								</div>														
							</div>
								
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>


	<script>
		function calcular() {
				var total_result = 0;
				var libra=eval(document.getElementById("precio_libra").value); // precio de la libra
				var seguro=eval(document.getElementById("porcentaje_seguro").value); // seguro del envio
				var t_manejo=eval(document.getElementById("manejo").value); // valor declarado del envio
				var t_imp=eval(document.getElementById("impuesto").value); // impuesto del envio
				var t_declarate=eval(document.getElementById("declarado").value); // valor declarado del envio
				
				var t_libra = libra * <?php echo $calculate_weight; ?>; // calculo de la libra
				var t_libras = libra * <?php echo $calculate_weight; ?>; // calculo de la libra
				var t_manejo_envio = t_manejo; // calculo manejo de envio
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

				
				var input = document.getElementById("total_result"); // calculo total del precio
				var input1 = document.getElementById("total_libra"); 
				var input2 = document.getElementById("total_impuesto");
				var input3 = document.getElementById("tinsurance");
				
				total_result = parseFloat(parseFloat(t_libra)  +  parseFloat(t_seguro) + parseFloat(calculate_impuesto) + parseFloat(t_manejo_envio)) .toFixed(2); <!--Total result formula-->
				total_libra = parseFloat(parseFloat(t_libras)) .toFixed(2);
				total_impuesto = parseFloat(parseFloat(t_impuestos)) .toFixed(2);
				tinsurance = parseFloat(parseFloat(t_seguros)) .toFixed(2);
				
				input.value= total_result;
				input1.value= total_libra;
				input2.value= total_impuesto;
				input3.value= tinsurance;
				
			}
	</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php

}

