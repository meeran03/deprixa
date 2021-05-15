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
  
	$packrow = $core->getPack();
?>

<!-- ============================================================== -->
<!-- Right Part contents-->
<!-- ============================================================== -->
<div class="right-part mail-list bg-white">
	<div class="p-15 b-b">
		<div class="d-flex align-items-center">
			<div>
				<span><?php echo $lang['tools-config61'] ?> | Packaging Type</span>
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


<!-- Styles and Status -->
<?php switch(Filter::$action): case "edit-packaging": ?>
<?php $row_pack = Core::getRowById(Core::ptTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-packaging1'] ?><span><?php echo $lang['tools-packaging2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_pack->name_pack;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-packaging1'] ?></label>
										<input type="text" class="form-control" name="name_pack" value="<?php echo $row_pack->name_pack;?>" placeholder="<?php echo $lang['tools-packaging1'] ?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-packaging3'] ?></label>
										<textarea class="form-control" rows="2" type="text" name="detail_pack" placeholder="<?php echo $lang['tools-packaging3'] ?>"><?php echo $row_pack->detail_pack;?></textarea>
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-packaging4'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=packaging" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-packaging5'] ?></a>
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
<?php echo Core::doForm("processPack");?> 

<?php break;?>
<?php case "add-packaging":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-packaging6'] ?><span><?php echo $lang['tools-packaging7'] ?></span></header>
						<section>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-packaging6'] ?></label>
										<input type="text" class="form-control" name="name_pack" placeholder="<?php echo $lang['tools-packaging6'] ?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-packaging8'] ?></label>
										<textarea class="form-control" rows="2" type="text" name="detail_pack" placeholder="<?php echo $lang['tools-packaging8'] ?>"></textarea>
									</div>
								</div>
							</div>
						</section>	
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-packaging9'] ?> <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=packaging" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-packaging5'] ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processPack");?> 

<?php break;?>
<?php default: ?>

<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">			
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h3 class="card-title"><?php echo $lang['tools-packaging10'] ?></h3>
						</div>
					</div>
					<!-- column -->
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-packaging11'] ?></b></th>
									<th data-hide="Deatils Packaging Type"><b><?php echo $lang['tools-packaging12'] ?></b></th>
									<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-packaging13'] ?></b></th>
								</tr>
							</thead>
							<div class="m-t-40">
								<div class="d-flex">
									<div class="mr-auto">
										<div class="form-group">
											<a href="all_tools.php?do=packaging&amp;action=add-packaging"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['tools-packaging14'] ?></button></a>
										</div>
									</div>
								</div>
							</div>
							<tbody>
								<?php if(!$packrow):?>
								<tr>
									<td colspan="5">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($packrow as $row):?>
								<tr>
									<td><?php echo $row->name_pack;?></td>
									<td><?php echo $row->detail_pack;?></td>
									<td class="text-center">
										<a href="all_tools.php?do=packaging&amp;action=edit-packaging&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-packaging15'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
										
										<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->name_pack;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-packaging16'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
									</td>
								</tr>
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>	
							</tbody>							
						</table>
					</div>
					<!-- column -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $pager->display_pages();?>
<?php echo Core::doDelete("Delete Packaging","deletePack");?> 
<?php break;?>
<?php endswitch;?>