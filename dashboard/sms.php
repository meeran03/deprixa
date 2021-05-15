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

<link href="dist/assets/css_log/front.css" rel="stylesheet" type="text/css">
	
<script type="text/javascript" src="dist/assets/js/jquery.js"></script>
<script type="text/javascript" src="dist/assets/js/jquery-ui.js"></script>
<script src="dist/assets/js/jquery.ui.touch-punch.js"></script>
<script src="dist/assets/js/jquery.wysiwyg.js"></script>
<script src="dist/assets/js/global.js"></script>
<script src="dist/assets/js/custom.js"></script>


<?php $smsrow = $core->getSmstwilio();?>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="dt-material-checkbox" class="table table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th><b><?php echo $lang['tools-twilio1'] ?></th>
										<th class="text-center"><b><?php echo $lang['tools-twilio2'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-twilio3'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-twilio4'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-twilio5'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-twilio6'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="#"><img src='assets/images/alert/twilio-logo.png' width='121' />  <?php echo $lang['tools-twilio7'] ?></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php foreach ($smsrow as $row):?>
									<tr>
										<td><?php echo $row->namesms;?></td>
										<td class="text-center"><?php echo $row->account_sid;?></td>
										<td class="text-center"><?php echo $row->auth_token;?></td>
										<td class="text-center"><?php echo $row->twilio_number;?></td>
										<td class="text-center"><?php echo isActivetwilio($row->active_twi, $row->id);?></td>
										<td class="text-center">
											<a href="tools.php?do=smstwilio&amp;action=edit&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-twilio8'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a> 											
										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>

<?php $smsrow = $core->getSmsnexmo();?>
<div class="row justify-content-center">
	<div class="col-lg-10">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="dt-material-checkbox" class="table table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th><b><?php echo $lang['tools-nexmo1'] ?></th>
										<th class="text-center"><b><?php echo $lang['tools-nexmo2'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-nexmo3'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-nexmo4'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-nexmo5'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-nexmo6'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-0">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="#"><img src='assets/images/alert/nexmo-logo.png' width='105' />  <?php echo $lang['tools-nexmo7'] ?></a> 
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php foreach ($smsrow as $row):?>
									<tr>
										<td><?php echo $row->namesms;?></td>
										<td class="text-center"><?php echo $row->api_key;?></td>
										<td class="text-center"><?php echo $row->api_secret;?></td>
										<td class="text-center"><?php echo $row->nexmo_number;?></td>
										<td class="text-center"><?php echo isActivenexmo($row->active_nex, $row->id);?></td>
										<td class="text-center">
											<a href="tools.php?do=smsnexmo&amp;action=edit&amp;id=<?php echo $row->id;?>"data-toggle="tooltip" data-original-title="<?php echo $lang['tools-nexmo8'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a> 											
										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
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
        var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this SMS TWILIO?<br />";
        new Messi(text, {
            title: "Activate SMS TWILIO",
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
						  activateTwilio: 1,
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

<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $('a.activatenex').on('click', function () {
        var uid = $(this).attr('id').replace('act_', '')
        var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this SMS NEXMO?<br />";
        new Messi(text, {
            title: "Activate SMS NEXMO",
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
						  activateNexmo: 1,
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