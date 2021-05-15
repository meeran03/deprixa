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
  require_once("../init.php");
?>
<?php
	if ($user->is_Admin())
      redirect_to("index.php");
	  
	if (isset($_POST['submit']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  
	/* Login Successful */
	if ($result)
		if($_SESSION['userlevel'] == 9)
			:	redirect_to("index.php");
	elseif($_SESSION['userlevel'] == 1)
			:	redirect_to("client.php");
	
	elseif($_SESSION['userlevel'] == 2)
			:	redirect_to("index.php");	
			
	else:
		if($_SESSION['userlevel'] == 3)
			:	redirect_to("dash_driver.php");
	endif;
	endif;
	endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $lang['tools-login1'] ?> | <?php echo $core->site_name ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="../uploads/favicon.png">
   <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">


	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
	<link rel="stylesheet" href="../assets-theme/css/bundle.css">
	<link rel="stylesheet" href="../assets-theme/css/style.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        
		<?php include 'preloader.php'; ?>
		
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
		
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/login/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" class="logo" width="190" height="39"/>': $core->site_name;?></span>
						<br><br>
                        <h5 class="font-medium m-b-20">Log in</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
							<form class="form-horizontal m-t-20" id="admin_form" name="admin_form" method="post" action="#">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" aria-label="<?php echo $lang['tools-login3'] ?>" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg"  name="password" placeholder="Password" aria-label="<?php echo $lang['tools-login4'] ?>" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
										<div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-primary"name="submit" type="submit"><?php echo $lang['tools-login5'] ?></button>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        <?php echo $lang['tools-login6'] ?> <a href="../sign-up.php" class="text-info m-l-5"><b><?php echo $lang['tools-login7'] ?></b></a> | <a class="txt2" href="../index.php"><?php echo $lang['tools-login8'] ?></a>
										</br>
										<div id="message-box"><?php print Filter::$showMsg;?></div>
                                    </div>
                                </div>
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>



</html>