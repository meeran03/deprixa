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

  
  if (!$user->is_Admin())
      redirect_to("login.php");
	
	$row = $user->getUserData();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
   <link href="dist/css/style.min.css" rel="stylesheet">
  <style>
	#geomap {
    width:100%;
    height:100%;
    position: absolute;
    top: 0px;
    left: 0px;
}
</style>
	
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<?php include 'templates/head_courier.php'; ?>
<body onload="initialize()">
    <div class="container">
		<?php switch(Filter::$action): case "mapview": ?>
		<?php  $row = Core::getRowById(Core::cTable, Filter::$id);?>
												
		<div class="input-group mb-3" style="position: adsolute; z-index: 3; touch-action: pan-x pan-y;">
			<div class="input-group-btn">
				<button class="btn btn-secondary get_map" type="submit">
					Search for
				</button>
			</div>
			<input type="text" class="form-control" id="search_location" value="<?php echo $row->r_address;?>" placeholder="Search address on google map" required>	
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
			</div>
		</div>													
				<!-- display google map -->
		<div id="geomap"></div>

	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<!-- Bootstrap tether Core JavaScript -->

	<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
	<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- apps -->
	<script src="dist/js/app.min.js"></script>
	<script src="dist/js/app.init.js"></script>
	<script src="dist/js/app-style-switcher.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
	<script src="assets/extra-libs/sparkline/sparkline.js"></script>
	<!--Wave Effects -->
	<script src="dist/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="dist/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="dist/js/custom.min.js"></script>
	
	<!--Datetimepicker -->
	
	<?php include 'datetimepicker.php'; ?>
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $core->apikey; ?>"></script>
		<script>
		var geocoder;
		var map;
		var marker;

		/*
		 * Google Map with marker
		 */
		function initialize() {
			var initialLat = $('.search_latitude').val();
			var initialLong = $('.search_longitude').val();
			initialLat = initialLat?initialLat:<?php echo $row->latitude; ?>;
			initialLong = initialLong?initialLong:<?php echo $row->longitude; ?>;

			var latlng = new google.maps.LatLng(initialLat, initialLong);
			var options = {
				zoom: 16,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			map = new google.maps.Map(document.getElementById("geomap"), options);

			geocoder = new google.maps.Geocoder();

			marker = new google.maps.Marker({
				map: map,
				draggable: true,
				position: latlng
			});

			google.maps.event.addListener(marker, "dragend", function () {
				var point = marker.getPosition();
				map.panTo(point);
				geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						map.setCenter(results[0].geometry.location);
						marker.setPosition(results[0].geometry.location);
						$('.search_addr').val(results[0].formatted_address);
						$('.search_latitude').val(marker.getPosition().lat());
						$('.search_longitude').val(marker.getPosition().lng());
					}
				});
			});

		}

		$(document).ready(function () {
			//load google map
			initialize();
			
			/*
			 * autocomplete location search
			 */
			var PostCodeid = '#search_location';
			$(function () {
				$(PostCodeid).autocomplete({
					source: function (request, response) {
						geocoder.geocode({
							'address': request.term
						}, function (results, status) {
							response($.map(results, function (item) {
								return {
									label: item.formatted_address,
									value: item.formatted_address,
									lat: item.geometry.location.lat(),
									lon: item.geometry.location.lng()
								};
							}));
						});
					},
					select: function (event, ui) {
						$('.search_addr').val(ui.item.value);
						$('.search_latitude').val(ui.item.lat);
						$('.search_longitude').val(ui.item.lon);
						var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
						marker.setPosition(latlng);
						initialize();
					}
				});
			});
			
			/*
			 * Point location on google map
			 */
			$('.get_map').click(function (e) {
				var address = $(PostCodeid).val();
				geocoder.geocode({'address': address}, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						map.setCenter(results[0].geometry.location);
						marker.setPosition(results[0].geometry.location);
						$('.search_addr').val(results[0].formatted_address);
						$('.search_latitude').val(marker.getPosition().lat());
						$('.search_longitude').val(marker.getPosition().lng());
					} else {
						alert("Geocode was not successful for the following reason: " + status);
					}
				});
				e.preventDefault();
			});

			//Add listener to marker for reverse geocoding
			google.maps.event.addListener(marker, 'drag', function () {
				geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						if (results[0]) {
							$('.search_addr').val(results[0].formatted_address);
							$('.search_latitude').val(marker.getPosition().lat());
							$('.search_longitude').val(marker.getPosition().lng());
						}
					}
				});
			});
		});
		</script>
		
	<?php break;?>
	<?php endswitch;?>
    </div>
</body>

</html>