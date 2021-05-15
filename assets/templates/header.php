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
	  
	$news = $core->renderNews();
?>
			
	<div id="sidebar-menu" class="eCommerce-side-menu op-page-menu-one">
		<div class="inner-wrapper">
			<div class="logo-wrapper">
				<button class="close-button"><img src="<?php SITEURL ?>assets/images/icon/icon19.svg" alt=""></button>
				<?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" class="logo" width="190" height="39"/>': $core->site_name;?>
			</div>

			<div class="main-menu-list">
				<ul>
					<li><a href="index.php">Login</a></li>
					<li><a href="sign-up.php">Sign up</a></li>
					<li><a href="tracking.php">Track Shipment</a></li>
				</ul>
			</div>
			<p class="copy-right">&copy; <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?></p>
		</div> <!-- /.inner-wrapper -->
	</div> <!-- #sidebar-menu -->	