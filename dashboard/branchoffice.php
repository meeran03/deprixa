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
				<span><?php echo $lang['tools-config61'] ?> | List of Agencies</span>
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

<!-- List of Offices -->
<?php switch(Filter::$action): case "edit-branchoffice": ?>
<?php $row_off = Core::getRowById(Core::branchTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card-body">
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header><?php echo $lang['tools-office1'] ?><span><?php echo $lang['tools-office2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_off->name_branch;?></span></header>
						<section>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1">Name Agencie</label>
										<input type="text" class="form-control" name="name_branch" value="<?php echo $row_off->name_branch;?>" placeholder="Agency Name">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-office3'] ?></label>
										<input type="text" class="form-control" name="branch_address" value="<?php echo $row_off->branch_address;?>" placeholder="<?php echo $lang['tools-office3'] ?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-office4'] ?></label>
										<input type="text" class="form-control" name="branch_city" value="<?php echo $row_off->branch_city;?>" placeholder="<?php echo $lang['tools-office4'] ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-office5'] ?></label>
										<input type="text" class="form-control" name="phone_branch" value="<?php echo $row_off->phone_branch;?>" placeholder="<?php echo $lang['tools-office5'] ?>">
									</div>
								</div>
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit">Agency Update <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=branchoffice" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['edit-clien30'] ?></a>
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
<?php echo Core::doForm("processBranchoffices");?> 

<?php break;?>
<?php case "add_branchoffice":?>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card-body">
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<form class="form-horizontal form-material" id="admin_form" method="post">
						<header>New agency <span> Add new Agency</span></header>
						<section>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1">New Agency</label>
										<input type="text" class="form-control" name="name_branch" placeholder="New Agency">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-office10'] ?></label>
										<input type="text" class="form-control" name="branch_address" placeholder="<?php echo $lang['tools-office10'] ?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstName1"><?php echo $lang['tools-office11'] ?></label>
										<input type="text" class="form-control" name="branch_city" placeholder="<?php echo $lang['tools-office11'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastName1"><?php echo $lang['tools-office12'] ?></label>
										<input type="text" class="form-control" name="phone_branch" placeholder="<?php echo $lang['tools-office12'] ?>">
									</div>
								</div>
							</div>
						</section>
						<br><br>
						<div class="form-group">
							<div class="col-sm-12">	
								<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit">Add new Agency <span><i class="icon-ok"></i></span></button>
								<a href="all_tools.php?do=branchoffice" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-office7'] ?></a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processBranchoffices");?> 

<?php break;?>
<?php default: ?>
<?php $officesrow = $core->getBranchoffices();?>
<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-md-flex align-items-center">
						<div>
							<h3 class="card-title">Agency List</h3>
						</div>
					</div>
					<!-- column -->
					<div id="loader" style="display:none"></div>
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['tools-office15'] ?></b></th>
									<th data-hide="Address"><b><?php echo $lang['tools-office16'] ?></b></th>
									<th data-hide="City"><b><?php echo $lang['tools-office17'] ?></b></th>
									<th data-hide="Phone"><b><?php echo $lang['tools-office18'] ?></b></th>
									<th data-sort-ignore="true" class="text-center"><b><?php echo $lang['tools-office19'] ?></b></th>
								</tr>
							</thead>								
							<div class="m-t-40">
								<div class="d-flex">
									<div class="mr-auto">
										<div class="form-group">
											<a href="all_tools.php?do=branchoffice&amp;action=add_branchoffice"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> Add new Agency</button></a>
										</div>
									</div>
								</div>
							</div>
							<tbody>
								<?php if(!$officesrow):?>
								<tr>
									<td colspan="5">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($officesrow as $row):?>
								<tr>
									<td><?php echo $row->name_branch;?></td>
									<td><?php echo $row->branch_address;?></td>
									<td><?php echo $row->branch_city;?></td>
									<td><?php echo $row->phone_branch;?></td>
									<td class="text-center">
										<a href="all_tools.php?do=branchoffice&amp;action=edit-branchoffice&amp;id=<?php echo $row->id;?>"  data-toggle="tooltip" data-original-title="<?php echo $lang['tools-office21'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a>
										<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->name_branch;?>"  data-toggle="tooltip" data-original-title="<?php echo $lang['tools-office22'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
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
<?php echo Core::doDelete("Delete Branch Office","deleteBranchoffice");?> 
<?php break;?>
<?php endswitch;?>