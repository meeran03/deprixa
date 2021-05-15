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

  define("_VALID_PHP", true);
  require_once("init.php");
  

  if (isset($_POST['doLogin']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  
  /* Login Successful */
	if ($result)
		if($_SESSION['userlevel'] == 9)
			:	redirect_to("dashboard/index.php");
	elseif($_SESSION['userlevel'] == 1)
			:	redirect_to("dashboard/client.php");
			
	elseif($_SESSION['userlevel'] == 2)
			:	redirect_to("dashboard/index.php");
			
	else:
		if($_SESSION['userlevel'] == 3)
			:	redirect_to("dashboard/dash_driver.php");
	endif;
	endif;
	endif;
?>

<?php include("assets/templates/head_forgotpass.php");?>


        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                   <a class="logo" href="index.php"><?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'"  width="190" height="39"/>': $core->site_name;?></a>
                </div>                 
                <div class="buy-button">
                    <a href="sign-up.php" class="btn btn-light-outline rounded"><i class="mdi mdi-account-alert ml-3 icons"></i> <?php echo $lang['left169'] ?></a>
                </div><!--end login button-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
				<div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="index.php"><?php echo $lang['left170'] ?></a></li>
                        
                        <li><a href="tracking.php"><i class="mdi mdi-package-variant-closed"></i> <?php echo $lang['left171'] ?></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Navbar End -->
        
         <!-- Hero Start -->
        <section class="bg-home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-6">
                                <div class="mr-lg-5">   
                                    <img src="<?php SITEURL ?>assets/theme_deprixa/images/user/recovery.png" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <div class="login_page bg-white shadow rounded p-4">
                                    <div class="text-center">
                                        <h4 class="mb-4"><?php echo $lang['left172'] ?></h4>  
                                    </div>
									<?php include("div_loader.php");?>
									<div id="msgholder2"><?php print Filter::$showMsg;?></div>
		
                                    <form class="login-form" id="admin_form" method="post">
                                        <div class="row">
											<div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left173'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" placeholder="<?php echo $lang['left174'] ?>" name="uname" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left175'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-mail-ru ml-3 icons"></i>
                                                    <input type="email" class="form-control pl-5" placeholder="<?php echo $lang['left176'] ?>" name="email" required="">
                                                </div>
                                            </div>
											<div class="col-md-4">
												<div class="form-group">
													<label><?php echo $lang['left177'] ?><span class="text-danger">*</span></label>
													<span class="badge-light"><img src="lib/captcha.php" alt="" class="captcha-append" /></span>
												</div>
											</div> <!-- /.col- -->
											<div class="col-md-8">
                                                <div class="form-group">
                                                    <label><?php echo $lang['left178'] ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="captcha" placeholder="<?php echo $lang['left179'] ?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" name="dosubmit"  class="btn btn-primary rounded w-100"><?php echo $lang['langs_010108'] ?></button>
                                            </div>
                                        </div>
                                    </form>
									<?php echo Core::doForm("passReset","ajax/user.php");?>
									<br><br>	
									<p>
										<?php echo $lang['langs_010109'] ?> </br><?php if($core->reg_allowed):?><a href="sign-up.php" class="text-primary"><?php echo $lang['langs_010110'] ?></a><?php endif;?> | <a href="index.php" class="text-primary"><?php echo $lang['langs_010111'] ?></a>
									</p>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->
                    </div> <!--end container-->
                </div>
            </div>
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->

        <?php include("assets/templates/footer_all.php");?>