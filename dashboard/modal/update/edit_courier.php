<form class="form-horizontal" name="update_courier" id="update_courier">
		<!-- Modal -->					
		<div class="modal fade bs-example-modal-lg" id="edit_courier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myLargeModalLabel">Shipping Update</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12 col-md-8">
								<div class="form-group">
									<label for="message-text" class="control-label">Package Description:</label>
									<textarea class="form-control" data-toggle="tooltip" data-placement="bottom" title="Edit item description" id="edit_detail_description" name="edit_detail_description" required></textarea>
									<input type="hidden" class="form-control" id="edit_id_courier" name="edit_id_courier">
									<input type="hidden" class="form-control" id="action" name="action"  value="ajax">
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<div class="form-group">
									<label for="inputlname" class="control-label col-form-label">Quantity</label>
									<input type="number" data-toggle="tooltip" data-placement="bottom" title="Edit number of articles" class="form-control" id="edit_detail_qnty" name="edit_detail_qnty" required>
								</div>
							</div>
							
						</div>
						
						
						<div class="row">
							<div class="col-sm-12 col-md-3">
								<div class="form-group">
									<label for="inputlname" class="control-label col-form-label">Weight (lb)</label>
									<input type="number" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title31'] ?>" class="form-control" id="edit_detail_weight" name="edit_detail_weight" required>
								</div>
							</div>
							<div class="col-sm-12 col-md-9">
								<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title34'] ?> <i class="ti-package" style="color:#36bea6"></i> <?php echo $lang['add-title35'] ?> <b><i style="color:#FF0000" class="ti-help-alt" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['add-title36'] ?> / <?php echo $core->meter;?> = kg"></i></b></label>
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