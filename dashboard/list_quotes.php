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

<?php include 'templates/head_user.php'; ?>


<?php $quoterow = $core->getQuotes_list(); ?>
<?php $pickupemployeerow = $user->getPrealertemployee_list(); ?>
<div class="row">
	<!-- Column -->
	<?php if($roww->userlevel == 9){?>
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['left249'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left250'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left251'] ?></b></th>	
								<th class="text-center"><b><?php echo $lang['left252'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left261'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left255'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left256'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<h3><?php echo $lang['left260'] ?></h3>
									</div>
								</div>
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$quoterow):?>
							<tr>
								<td colspan="10">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($quoterow as $row):?>
							<tr>
								<td><b><?php echo $row->order_quote;?></b></td>
								<td><?php echo $row->s_name;?></td>
								<td><?php echo $row->phone;?></td>
								<td class="text-center"><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
								<td class="text-center"><?php echo $core->currency;?> <?php echo $row->r_costotal;?></td>															
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_quote;?></span></td>
								<td><?php echo "<a href='".$row->url_product."' target=\"_blank\"><img src='./assets/images/alert/url.png' height='20' width='44'></a>" ; ?></td>
								<td align='center'>
								<a  href="edit_quote.php?do=edit_quote&amp;action=edit&amp;id=<?php echo $row->id;?>" ><button type="button" class="btn btn-sm btn-icon btn-success btn-outline"><?php echo $lang['left262'] ?></button></a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
					<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
				</div>
			</div>
		</div>
	</div>
	
	<?php }else if($roww->userlevel == 2){?>
	
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">			
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['left249'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left250'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left251'] ?></b></th>	
								<th class="text-center"><b><?php echo $lang['left252'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left261'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left255'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['left256'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['aaction'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<h3><?php echo $lang['left260'] ?></h3>
									</div>
								</div>
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$quoterow):?>
							<tr>
								<td colspan="10">
								<?php echo "
								<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='140' /></i>
								",false;?>
								</td>
							</tr>
							<?php else: ?>
							<?php foreach ($quoterow as $row):?>
							<tr>
								<td><b><?php echo $row->order_quote;?></b></td>
								<td><?php echo $row->s_name;?></td>
								<td><?php echo $row->phone;?></td>
								<td class="text-center"><?php echo $row->r_dest;?> | <?php echo $row->r_city;?></td>
								<td class="text-center"><?php echo $core->currency;?> <?php echo $row->r_costotal;?></td>															
								<td class="text-center"><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_quote;?></span></td>
								<td><?php echo "<a href='".$row->url_product."' target=\"_blank\"><img src='./assets/images/alert/url.png' height='20' width='44'></a>" ; ?></td>
								<td align='center'>
								<a  href="edit_quote.php?do=edit_quote&amp;action=edit&amp;id=<?php echo $row->id;?>" ><button type="button" class="btn btn-sm btn-icon btn-success btn-outline"><?php echo $lang['left262'] ?></button></a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo $pager->display_pages();?>
					<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- Column -->
</div>
<script src="dist/js/stacktable.js"></script>
<script>
	$('table').stacktable();
</script>