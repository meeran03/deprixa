<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<form class="form-horizontal" name="deliver_shipment" id="deliver_shipment">
		<!-- Modal -->					
		<div class="modal fade bs-example-modal-lg" id="edit_shipment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">Deliver shipping</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['deliver-ship4'] ?></i></label>
								<div class="input-group">
									<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
											<div class="input-group-text"><i style="color:#ff0000" class="fa fa-calendar"></i></div>
										</div>
									<input type='text' class="form-control" id="datepicker-autoclose" name="datepicker-autoclose" placeholder="--Deliver date--" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" />
									<input type="hidden" class="form-control" id="edit_id_courier" name="edit_id_courier">
									<input type="hidden" class="form-control" id="action" name="action"  value="ajax">
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['deliver-ship5'] ?></label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="ti-timer"></i></span>
									</div>
									<input class="form-control" id="edit_delivery_hour" name="edit_delivery_hour" value="<?php date_default_timezone_set("".$core->timezone.""); echo "" . date("h:i:sa"); ?>">
								</div>
							</div>
							
						</div>
						<input type="text" class="form-control" id="edit_order_inv" name="edit_order_inv">
						
						<div class="row">
							<div class="col-sm-12 col-md-3">
								<div class="form-group">
									<label for="inputlname" class="control-label col-form-label">Peso (lb)</label>
									<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title31'] ?>" class="form-control" id="edit_detail_weight" name="edit_detail_weight" required>
								</div>
							</div>
							<div class="col-sm-12 col-md-9">
								<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title34'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['add-title35'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title36'] ?> / <?php echo $core->meter;?> = lb"></i></b></label>
								<div class="input-group">
									<!-- input box for Length -->
									<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title37'] ?>" class="form-control" id="edit_detail_length" name="edit_detail_length"  required>
									<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
									<!-- input box for width -->
									<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title38'] ?>" class="form-control" id="edit_detail_width" name="edit_detail_width"  required>
									<div class="cross strong text__color-gray-darker text__size-smaller">&nbsp; x &nbsp;</div>
									<!-- input box for height -->
									<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title39'] ?>" class="form-control" id="edit_detail_height" name="edit_detail_height"  required>
								</div>
							</div>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-default">Update Package</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script>
		// Date Picker
		jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
		jQuery('#datepicker-autoclose').datepicker({
			autoclose: true,
			todayHighlight: true
		});
		jQuery('#date-range').datepicker({
			toggleActive: true
		});
		jQuery('#datepicker-inline').datepicker({
			todayHighlight: true
		});
		</script>