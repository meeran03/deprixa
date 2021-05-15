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

<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Core::nTable, Filter::$id);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="form-horizontal form-material" id="admin_form" method="post">
							<header><?php echo $lang['tools-news1'] ?><span><?php echo $lang['tools-news2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->title;?></span></header>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-news3'] ?></label>
											<input type="text" class="form-control" name="title" value="<?php echo $row->title;?>" placeholder="<?php echo $lang['tools-news3'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['tools-news4'] ?></label>
											<input type="text" class="form-control" name="author" value="<?php echo $row->author;?>" placeholder="<?php echo $lang['tools-news4'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-news5'] ?></label>
											<input type="text" class="form-control" name="created" value="<?php echo $row->created;?>" id="datepicker-autoclose" placeholder="<?php echo $lang['tools-news5'] ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<div class="btn-group" data-toggle="buttons">
												<label class="btn">
													<div class="custom-control custom-radio">
														<input type="radio" id="customRadio4"  name="active" value="1" <?php getChecked($row->active, 1); ?> class="custom-control-input">
														<label class="custom-control-label" for="customRadio4"> <?php echo $lang['tools-news6'] ?></label>
													</div>
												</label>
												<label class="btn">
													<div class="custom-control custom-radio">
														<input type="radio" id="customRadio5" name="active" value="0" <?php getChecked($row->active, 0); ?> class="custom-control-input">
														<label class="custom-control-label" for="customRadio5"> <?php echo $lang['tools-news7'] ?></label>
													</div>
												</label>
											</div>
											<div class="note"><?php echo $lang['tools-news8'] ?></i></div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div id="editor">
											<textarea name="body" id="summernote" style="margin-top: 30px;" placeholder="Type some text">
												<?php echo $row->body;?>
											</textarea>
										</div>
									</div>
								</div>
							</section>
							<br><br>
							<div class="form-group">
								<div class="col-sm-12">	
									<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-news9'] ?> <span><i class="icon-ok"></i></span></button>
									<a href="user.php?do=news" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-news10'] ?></a>
								</div>
							</div>	
							<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>							
<?php echo Core::doForm("processNews");?> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#date").datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>
<?php break;?>
<?php case "add":?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<form class="form-horizontal form-material" id="admin_form" method="post">
							<header><?php echo $lang['tools-news11'] ?><span><?php echo $lang['tools-news12'] ?></span></header>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-news13'] ?></label>
											<input type="text" class="form-control" name="title" placeholder="<?php echo $lang['tools-news13'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['tools-news14'] ?></label>
											<input type="text" class="form-control" name="author" placeholder="<?php echo $lang['tools-news14'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['tools-news5'] ?></label>
											<input type="text" class="form-control" name="created" value="<?php echo date('Y-m-d');?>" id="datepicker-autoclose" placeholder="<?php echo $lang['tools-news5'] ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<div class="btn-group" data-toggle="buttons">
												<label class="btn">
													<div class="custom-control custom-radio">
														<input type="radio" id="customRadio4"  name="active" value="1" checked="checked" class="custom-control-input">
														<label class="custom-control-label" for="customRadio4"> <?php echo $lang['tools-news6'] ?></label>
													</div>
												</label>
												<label class="btn">
													<div class="custom-control custom-radio">
														<input type="radio" id="customRadio5" name="active" value="0" class="custom-control-input">
														<label class="custom-control-label" for="customRadio5"> <?php echo $lang['tools-news7'] ?></label>
													</div>
												</label>
											</div>
											<div class="note"><?php echo $lang['tools-news8'] ?></i></div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div id="editor">
											<textarea name="body" id="summernote" style="margin-top: 30px;" placeholder="Type some text"></textarea>
										</div>
									</div>
								</div>
							</section>
							<br><br>
							<div class="form-group">
								<div class="col-sm-12">	
									<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-news15'] ?> <span><i class="icon-ok"></i></span></button>
									<a href="user.php?do=news" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-news10'] ?></a>
								</div>
							</div>	
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doForm("processNews");?> 
<script type="text/javascript">
  $(document).ready(function() {
    $("#date").datepicker({
        dateFormat: 'yy-mm-dd'
    });
});
</script>
<?php break;?>
<?php default: ?>
<?php $newsrow = $core->getNews();?>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<div class="table-responsive">
							<table id="zero_config" class="table table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th><b><?php echo $lang['tools-news16'] ?></th>
										<th class="text-center"><b><?php echo $lang['tools-news17'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-news18'] ?></b></th>
										<th class="text-center"><b><?php echo $lang['tools-news19'] ?></b></th>
									</tr>
								</thead>
								<div class="m-t-40">
									<div class="d-flex">
										<div class="mr-auto">
											<div class="form-group">
												<a href="user.php?do=news&amp;action=add"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i>  <?php echo $lang['tools-news20'] ?></button></a>
											</div>
										</div>
									</div>
								</div>
								<tbody>
									<?php if(!$newsrow):?>
									<tr>
										<td colspan="3">
										<?php echo "
										<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='130' /></i>								
										",false;?>
										</td>
									</tr>
									<?php else:?>
									<?php foreach ($newsrow as $row):?>
									<tr>
										<td><?php echo $row->title;?></td>
										<td class="text-center"><?php echo $row->cdate;?></td>
										<td class="text-center"><?php echo $row->author;?></td>
										<td class="text-center">
											<a href="user.php?do=news&amp;action=edit&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-news21'] ?>"><i class="ti-pencil" aria-hidden="true"></i></a> 
											<a id="item_<?php echo $row->id;?>" class="delete" data-rel="<?php echo $row->title;?>" data-toggle="tooltip" data-original-title="<?php echo $lang['tools-news22'] ?>"><i class="ti-close" aria-hidden="true"></i></a>
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
			</div>
			<!-- Column -->
		</div>
	</div>
</div>
<?php echo Core::doDelete("Delete News","deleteNews");?>
<?php break;?>
<?php endswitch;?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>