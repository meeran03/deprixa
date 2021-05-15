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


<?php $row = (isset(Filter::$get['emailid'])) ? Core::getRowById(Core::eTable, 12) : Core::getRowById(Core::eTable, 4);?>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<!-- Column -->
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form class="xform" id="admin_form" method="post">						
						  <header><?php echo $lang['send-news1'] ?><span><?php echo $lang['send-news2'] ?></span></header>
							<div class="row">
								<section class="col col-6">
									<label class="input state-disabled">
										<input name="title" type="text" disabled="disabled" value="<?php echo $core->site_email;?>" placeholder="<?php echo $lang['send-news3'] ?>" readonly="readonly">
									</label>
									<div class="note"><?php echo $lang['send-news3'] ?></div>
								</section>
								<section class="col col-6">
									<?php if(isset(Filter::$get['emailid'])):?>
									<label class="input">
										<input name="recipient" type="text" value="<?php echo sanitize(Filter::$get['emailid']);?>" placeholder="<?php echo $lang['send-news4'] ?>" >
									</label>
									<?php else:?>
									<select name="recipient" >
										<option value="all"><?php echo $lang['send-news5'] ?></option>
										<option value="newsletter"><?php echo $lang['send-news6'] ?></option>
									</select>
									<?php endif;?>
									<div class="note"><?php echo $lang['send-news4'] ?></div>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append icon-asterisk"></i>
										<input type="text" name="subject"  value="<?php echo $row->subject;?>" placeholder="<?php echo $lang['send-news7'] ?>">
									</label>
									<div class="note note-error"><?php echo $lang['send-news7'] ?></div>
								</section>
							</div>
							<hr />
							<div class="row">
								<section class="col col-12">
									<div id="editor">
										<textarea name="body" id="summernote" style="margin-top: 30px;" placeholder="Type some text">
											<?php echo $row->body;?>
										</textarea>
									</div>
									<div class="label2 label-important"><?php echo $lang['send-news8'] ?> [ ]</div>
								</section>
							</div>
							<footer>
								<button class="button" name="dosubmit" type="submit"><?php echo $lang['send-news9'] ?><span><i class="far fa-envelope"></i></span></button>								 				
							</footer>
						</form>
						<?php echo Core::doForm("processNewsletter");?> 
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
