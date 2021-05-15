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
				<span><?php echo $lang['tools-config61'] ?> | Viewing SMS Templates</span>
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
<?php $row = Core::getRowById(Core::smsTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card-body">
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-smstemplate1'] ?><span><?php echo $lang['tools-smstemplate2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->name;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-smstemplate3'] ?></label>
										<input type="text" class="form-control" name="name" value="<?php echo $row->name;?>" placeholder="<?php echo $lang['tools-smstemplate3'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-smstemplate4'] ?></label>
										<textarea class="form-control" name="help" rows="3"><?php echo $row->help;?></textarea>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<section class="col col-12">
								<b><i class="ti-comments-smiley"></i> <?php echo $lang['tools-smstemplate5'] ?></b></br>
								</section>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<textarea class="form-control" name="body1" rows="2"><?php echo $row->body1;?></textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<textarea class="form-control" name="body2" rows="2"><?php echo $row->body2;?></textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<textarea class="form-control" name="body3" rows="2"><?php echo $row->body3;?></textarea>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<div class="btn-group" data-toggle="buttons">
											<label class="btn">
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio4" name="active" value="1" <?php getChecked($row->active, 1); ?> class="custom-control-input">
													<label class="custom-control-label" for="customRadio4"> <?php echo $lang['tools-smstemplate6'] ?></label>
												</div>
											</label>
											<label class="btn">
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio5" name="active" value="0" <?php getChecked($row->active, 0); ?> class="custom-control-input">
													<label class="custom-control-label" for="customRadio5"> <?php echo $lang['tools-smstemplate7'] ?></label>
												</div>
											</label>
										</div>
										<div class="note"><?php echo $lang['tools-smstemplate8'] ?></div>
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-smstemplate9'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=templates_sms" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-smstemplate10'] ?></a>
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
<?php echo Core::doForm("processSmsTemplate");?>
<?php break;?>
<?php default: ?>
<?php $temprow = $core->getSmsTemplates();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card-body">						
					<div class="row">
					  <h4><i class="ti-email"></i> <?php echo $lang['tools-smstemplate11'] ?></h4>
					</div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th class="header"><b><?php echo $lang['tools-smstemplate12'] ?></b></b></th>
									<th><b><?php echo $lang['tools-smstemplate13'] ?></b></th>
									<th class="text-center"><b><?php echo $lang['tools-smstemplate14'] ?></b></th>
									<th class="text-center"><b><?php echo $lang['tools-smstemplate15'] ?></b></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!$temprow):?>
								<tr>
									<td colspan="4">
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
									<td class="text-center"><?php echo isActivesms($row->active, $row->id);?></td>
									<td class="text-center">
										<a href="all_tools.php?do=templates_sms&amp;action=edit&amp;id=<?php echo $row->id;?>"><span class="ti-pencil"></span></a>
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
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $('a.activate').on('click', function () {
        var uid = $(this).attr('id').replace('act_', '')
        var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this TEMPLATE SMS?<br />";
        new Messi(text, {
            title: "Activate TEMPLATE SMS",
            modal: true,
            closeButton: true,
            buttons: [{
                id: 0,
                label: "Activate",
                val: '1'
            }],
			  callback: function (val) {
				  $.ajax({
					  type: 'post',
					  url: "controller.php",
					  data: {
						  activateSMS: 1,
						  id: uid,
					  },
					  cache: false,
					  beforeSend: function () {
						  showLoader();
					  },
					  success: function (msg) {
						  hideLoader();
						  $("#msgholder").html(msg);
						  $('html, body').animate({
							  scrollTop: 0
						  }, 600);
					  }
				  });
			  }
        });
    });

});
// ]]>
</script>													
<?php break;?>
<?php endswitch;?>