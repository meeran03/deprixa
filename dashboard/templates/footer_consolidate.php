<?php

		  if (!defined("_VALID_PHP"))
			  die('Direct access to this location is not allowed.');
		?>			
		
		<footer class="footer text-center">
			&copy <?php echo date('Y').' '.$core->site_name;?> - <?php echo $lang['foot'] ?>
		</footer>

		<!-- End footer -->
	</div>
</div>

	<!-- End Wrapper -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<!-- Bootstrap tether Core JavaScript -->
		
		<script src="<?php SITEURL ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
		<script src="<?php SITEURL ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- apps -->
		<script src="<?php SITEURL ?>dist/js/app.min.js"></script>
		<script src="<?php SITEURL ?>dist/js/app.init.js"></script>
		<script src="<?php SITEURL ?>dist/js/app-style-switcher.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="<?php SITEURL ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="<?php SITEURL ?>assets/extra-libs/sparkline/sparkline.js"></script>
		<!--Wave Effects -->
		<script src="<?php SITEURL ?>dist/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="<?php SITEURL ?>dist/js/sidebarmenu.js"></script>
		<!--Custom JavaScript -->
		<script src="<?php SITEURL ?>dist/js/custom.min.js"></script>

<!--Datetimepicker -->
		
		<?php include 'datetimepicker.php'; ?>
		
		<script type="text/javascript">
		$(function() {
					$("#searchnames").autocomplete({
						source: "search_ship.php",
						minLength: 2,
						select: function(event, ui) {
							event.preventDefault();
							$('#searchnames').val(ui.item.fname);
							$('#idx').val(ui.item.idx);
							$('#users').val(ui.item.users);
							$('#mail').val(ui.item.mail);
							$('#phones').val(ui.item.phones);
							$('#citys').val(ui.item.citys);
							$('#zones').val(ui.item.zones);
							$('#zips').val(ui.item.zips);

							$("#searchnames").focus();
						 }
					});
				});
		</script>


		<script type="text/javascript">

			function suma(){
				
				<!--General sale formula-->
				var num2 = "5.56789";
				var sum2 = document.getElementById("sum2");
				var sum3 = document.getElementById("sum3");
				var sum4 = document.getElementById("sum4");
				var sum5 = document.getElementById("sum5");

				<!--Formula Values-->
				
				var value_pound = <?php echo $core->c_value_pound;?>;
				var add_pound = <?php echo $core->c_add_pound;?>;
				var handling = <?php echo $core->c_handling;?>;
				var fuel = <?php echo $core->c_fuel;?>;
				var reexpedition = <?php echo $core->c_reexpedition;?>;
				var logistic = <?php echo $core->c_logistic;?>;
				var surcharges = <?php echo $core->c_surcharges;?>;
				var safe = <?php echo $core->c_safe;?>;
				var nationalization = <?php echo $core->c_nationalization;?>;
				var tariffs = <?php echo $core->c_tariffs;?>;
				var vat = <?php echo $core->c_vat;?>;
				var input = document.getElementById("total_result");
				
				var percent = 100;
				
				var total_pound = sum2.value * value_pound; 									<!--Tax on the value of the article-->
				var total_add_pound = sum3.value * add_pound;
				var total_fuel = fuel;												<!--Shipping weight value-->
				var total_handling = handling;
				var total_reexpedition = sum5.value;
				var total_logistic = logistic * <?php echo $net; ?>;
				var total_safe =  sum4.value * safe/percent;
				var total_nationalization = nationalization * <?php echo $netos; ?>;
				
				var total_tax = vat/percent; 	<!--Total sales tax-->

				
				
				taxes = parseFloat(parseFloat(total_pound) +  parseFloat(total_add_pound) +  parseFloat(total_fuel) +  parseFloat(total_handling) +  parseFloat(total_reexpedition) +  parseFloat(total_safe) +  parseFloat(total_logistic) +  parseFloat(total_nationalization) ) * parseFloat(vat/percent) .toFixed(2);
				surcharge = parseFloat(parseFloat(total_pound) +  parseFloat(total_add_pound) +  parseFloat(total_fuel) +  parseFloat(total_handling) +  parseFloat(total_reexpedition) +  parseFloat(total_safe) +  parseFloat(total_logistic) +  parseFloat(total_nationalization) ) * parseFloat(surcharges/percent) .toFixed(2); <!--Total result formula-->
				
				total_result = parseFloat(parseFloat(total_pound) +  parseFloat(total_add_pound) +  parseFloat(total_fuel) +  parseFloat(total_handling) +  parseFloat(total_reexpedition) +  parseFloat(total_safe) +  parseFloat(total_logistic) +  parseFloat(total_nationalization)  + parseFloat(taxes) + parseFloat(surcharge)) .toFixed(2); <!--Total result formula-->
				
				input.value= total_result;

			}
			

		</script>
		
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
			initialLat = initialLat?initialLat:<?php echo $core->latitude; ?>;
			initialLong = initialLong?initialLong:<?php echo $core->longitude; ?>;

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

</body>

</html>