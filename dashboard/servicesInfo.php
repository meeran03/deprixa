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

	 include_once '../lib/BookingconsolClass.php';
?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>


	<style type="text/css">
		canvas{
			margin:auto;
		}
		.alert{
			margin-top:20px;
		}
	</style>

<?php include 'templates/head_tab.php'; ?>

<?php $courier_onlinerow = $user->getCourier_list_booking(); ?>
<?php $courier_onlineprealert = $user->getCourier_list_bookingpre(); ?>
<?php $quoterow = $user->getQuotes_list(); ?>
<?php $Costrowcourier = $user->getcosstotalcourier(); ?>
<?php $Costrowconsolidate = $user->getcosstotalconsolidate(); ?>
<?php $Costrowcourierx = $user->getcosstotalcourierpay(); ?>
<?php $Costrowconsolidatex = $user->getcosstotalconsolidatepay(); ?>

<div class="row">
	<!-- Column -->

	<!-- Column -->
	<div class="col-sm-12 col-lg-8">

	</div>
</div>

<!-- Sales chart -->

	</div>
</div>
<script src="app.js"></script>
<script src="dist/js/stacktable.js"></script>
<script>
	$('table').stacktable();
</script>
<script src="assets/extra-libs/prism/prism.js"></script>