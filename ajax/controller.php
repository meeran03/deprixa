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

  if (!$user->logged_in)
      redirect_to("../login.php");
?>
<?php
  /* Proccess User */
  if (isset($_POST['processUserclient']))
      : if (intval($_POST['processUserclient']) == 0 || empty($_POST['processUserclient']))
      : redirect_to("../account.php");
  endif;
  $user->updateProfile();
  endif;
?>

<?php
  /* Courier Online Update */
  if (isset($_POST['processBooking']))
      : if (intval($_POST['processBooking']) == 0 || empty($_POST['processBooking']))
      : redirect_to("../bookings_list.php");
  endif;
  $courier->processCourier_booking_update();
  endif;
?>

<?php
  /* Update consolidated  */
  if (isset($_POST['processDeliverconsolidated']))
      : if (intval($_POST['processDeliverconsolidated']) == 0 || empty($_POST['processDeliverconsolidated']))
      : redirect_to("../consolidated_deliveries.php");
  endif;
  $courier->processDeliverpackage();
  endif;
?>

<?php
  /* Update consolidated  */
  if (isset($_POST['processDeliver']))
      : if (intval($_POST['processDeliver']) == 0 || empty($_POST['processDeliver']))
      : redirect_to("../deliveries_list.php");
  endif;
  $courier->processDelivershipment();
  endif;
?>