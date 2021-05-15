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

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>

<!-- ============================================================== -->
<!-- Right Part contents-->
<!-- ============================================================== -->
<div class="right-part mail-list bg-white">
	<div class="p-15 b-b">
		<div class="d-flex align-items-center">
			<div>
				<span><?php echo $lang['tools-config61'] ?> | Viewing Email Templates</span>
			</div>
			
		</div>
	</div>
	<!-- Action part -->
	<!-- Button group part -->
	<div class="bg-light p-15">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row">
					<div class="col-12">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Action part -->


<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Core::eTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-template1'] ?><span><?php echo $lang['tools-template2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-template3'] ?></label>
										<input type="text" class="form-control" name="name" value="<?php echo $row->name;?>" placeholder="<?php echo $lang['tools-template3'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-template4'] ?></label>
										<input type="text" class="form-control" name="subject" value="<?php echo $row->subject;?>" placeholder="<?php echo $lang['tools-template4'] ?>">
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-template5'] ?></label>
										<textarea type="text" class="form-control" name="help" rows="3" ><?php echo $row->help;?></textarea>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div id="editor">
										<textarea name="body" id="summernote" style="margin-top: 30px;" placeholder="Type some text">
											<?php echo $row->body;?>
										</textarea>
										<div class="label2 label-important"><?php echo $lang['tools-template6'] ?> [ ]</div>
									</div>
								</div>
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-template7'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=templates" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-template8'] ?></a>
							</div>
						</div>	
						<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processEmailTemplate");?>
<?php break;?>
<?php default: ?>
<?php $temprow = $core->getEmailTemplates();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card-body">						
					<div class="row">
					  <h4><i class="ti-email"></i> <?php echo $lang['tools-template9'] ?></h4>
					</div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th class="header"><b><?php echo $lang['tools-template10'] ?></b></b></th>
									<th><b><?php echo $lang['tools-template11'] ?></b></th>
									<th class="text-center"><b><?php echo $lang['tools-template12'] ?></b></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!$temprow):?>
								<tr>
									<td colspan="3">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($temprow as $row):?>
								<tr>
									<td class="nowrap"><?php echo $row->name;?></td>
									<td><?php echo $row->help;?></td>
									<td class="text-center">
										<a href="all_tools.php?do=templates&amp;action=edit&amp;id=<?php echo $row->id;?>"><span class="ti-pencil"></span></a>
									</td>
								</tr>
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>													
<?php break;?>
<?php endswitch;?>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>