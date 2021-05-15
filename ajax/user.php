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
  /* Registration */
  if (isset($_POST['doRegister']))
      : if (intval($_POST['doRegister']) == 0 || empty($_POST['doRegister']))
      : redirect_to("../sign-up.php");
  endif;
  $user->register();
  endif;
?>

<?php
  /* Courier Online */
  if (isset($_POST['doRegister_online']))
      : if (intval($_POST['doRegister_online']) == 0 || empty($_POST['doRegister_online']))
      : redirect_to("../booking.php");
  endif;
  $courier->processCourier_online();
  endif;
?>

<?php
  /* Password Reset */
  if (isset($_POST['passReset']))
      : if (intval($_POST['passReset']) == 0 || empty($_POST['passReset']))
      : redirect_to("../index.php");
  endif;
  $user->passReset();
  endif;
?>
<?php
  /* Account Acctivation */
  if (isset($_POST['accActivate']))
      : if (intval($_POST['accActivate']) == 0 || empty($_POST['accActivate']))
      : redirect_to("../index.php?action=activate");
  endif;
  $user->activateUser();
  endif;
?>