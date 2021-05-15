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
						<?php
						  require_once(BASEPATH . "lib/class_dbtools.php");
						  Registry::set('dbTools',new dbTools());
						  $tools = Registry::get("dbTools");
						  
						  if (isset($_GET['backupok']) && $_GET['backupok'] == "1")
							  Filter::msgOk('<span>Success!</span>Backup created successfully!',1,1);

						  if (isset($_GET['restore']) && $_GET['restore'] == "1")
							  Filter::msgOk('<span>Success!</span>Database restored successfully!',1,1);
								
						  if (isset($_GET['create']) && $_GET['create'] == "1")
							  $tools->doBackup('',false);

						  if (isset($_POST['backup_file']))
							  $tools->doRestore($_POST['backup_file']);
						?>
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Action part -->

<?php include 'templates/head_user.php'; ?>

<div class="row justify-content-center">
	<div class="col-lg-12">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card-body">
					<div class="d-flex no-block align-items-center m-b-30">
						<h4 class="card-title"></h4>
						<div class="ml-auto">
							<div class="btn-group">
								<a href="all_tools.php?do=backup&amp;create=1"><button type="button" class="btn btn-dark" >
									<?php echo $lang['tools-database1'] ?>
								<span class="icon-hdd"></span></button></a>
							</div>
						</div>
					</div>
					<p class="bluetip"><i class="icon-lightbulb icon-3x pull-left"></i><?php echo $lang['tools-database2'] ?><br />
						  <?php echo $lang['tools-database3'] ?> [<strong>/dashboard/backups/</strong>] <?php echo $lang['tools-database4'] ?> <br />
						  <?php echo $lang['tools-database5'] ?>
					</p>
					<div class="table-responsive">
						<?php
						$dir = BASEPATH . 'dashboard/backups/';
						if (is_dir($dir)):
							$getDir = dir($dir);
							while (false !== ($file = $getDir->read())):
								if ($file != "." && $file != ".." && $file != "user.php"):
									  $sql =  ($file == $core->backup)? " db-latest" : "";
									  echo '<div class="db-backup' . $sql . '" id="item_' . $file . '"><i class="icon-hdd pull-left icon-3x icon-white"></i>';
									  echo '<span>' . getSize(filesize(BASEPATH . 'dashboard/backups/' . $file)) . '</span>';
									  
									  echo '<a class="delete">
									  <small class="sdelet btn btn-light" data-toggle="tooltip" title="'.$lang['tools-database6'].'" '. $file . 'p"><i class="icon-trash icon-white"></i></small></a>';
									  
									  echo '<a href="' . ADMINURL . '/backups/' . $file . '">
									  <small class="sdown btn btn-light" data-toggle="tooltip" title="'.$lang['tools-database7'].'"><i class="icon-download-alt icon-white"></i></small></a>';
									  
									  echo '<a class="restore">
									  <small class="srestore btn btn-light" data-toggle="tooltip" title="'.$lang['tools-database8'].'"'. $file . '"><i class="icon-refresh icon-white"></i></small></a>';
									  echo '<p>' . str_replace(".sql", "", $file) . '</p>';
									  
									  echo '</div>';
								endif;
							endwhile;
							$getDir->close();
						endif;
					  ?>
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
    $('a.delete').on('click', function () {
        var parent = $(this).closest('div');
        var id = parent.attr('id').replace('item_', '')
        var title = $(this).attr('data-rel');
        var text = "<div><i class=\"icon-warning-sign icon-2x pull-left\"></i>Are you sure you want to delete this record?<br /><strong>This action cannot be undone!!!</strong></div>";
        new Messi(text, {
            title: "Delete Database Backup",
            modal: true,
            closeButton: true,
            buttons: [{
                id: 0,
                label: "Delete",
                val: 'Y'
            }],
            callback: function (val) {
                if (val === "Y") {
					$.ajax({
						type: 'post',
						url: "controller.php",
						data: 'deleteBackup=' + id,
						beforeSend: function () {
							parent.animate({
								'backgroundColor': '#FFBFBF'
							}, 400);
						},
						success: function (msg) {
							parent.fadeOut(400, function () {
								parent.remove();
							});
							$("html, body").animate({
								scrollTop: 0
							}, 600);
							$("#msgholder").html(msg);
						}
					});
                }
            }
        })
    });
	
    $('a.restore').on('click', function () {
        var parent = $(this).closest('div');
        var id = parent.attr('id').replace('item_', '')
        var title = $(this).attr('data-rel');
        var text = "<div><i class=\"icon-warning-sign icon-2x pull-left\"></i>Are you sure you want to restore databse?<br /><strong>This action cannot be undone!!!</strong></div>";
        new Messi(text, {
            title: "Restore Database",
            modal: true,
            closeButton: true,
            buttons: [{
                id: 0,
                label: "Restore Database",
                val: 'Y'
            }],
            callback: function (val) {
                if (val === "Y") {
					$.ajax({
						type: 'post',
						url: "controller.php",
						data: 'restoreBackup=' + id,
						success: function (msg) {
							parent.effect('highlight', 1500);
							$("html, body").animate({
								scrollTop: 0
							}, 600);
							$("#msgholder").html(msg);
						}
					});
                }
            }
        })
    });
});
// ]]>
</script>