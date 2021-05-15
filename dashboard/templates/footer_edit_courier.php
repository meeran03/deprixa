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
	<script src="<?php SITEURL ?>assets/extra-libs/prism/prism.js"></script>

	
		
	<script type="text/javascript">
	$(function() {
				$("#searchnames").autocomplete({
					source: "search_ship.php",
					minLength: 2,
					select: function(event, ui) {
						event.preventDefault();
						$('#searchnames').val(ui.item.fname);
						$('#idx').val(ui.item.idx);
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
			
			<!--VOLUMETRIC WEIGHT-->
			var l1 = document.getElementById("l1");
			var w2 = document.getElementById("w2");
			var h3 = document.getElementById("h3");

			var input = document.getElementById("total_result");
			
			<!--Formula Values-->
			var volumetric = <?php echo $core->meter;?>;
			var pound_weight_price = <?php echo $core->value_weight;?>;
			var percent = 100;

			var total_insurance = sum2.value * sum5.value/percent; 									<!--Tax on the value of the article-->
			var total_metric = l1.value * w2.value * h3.value/volumetric * pound_weight_price; 		<!--Volumetric weight result-->
			var total_weight = pound_weight_price * sum4.value; 									<!--Shipping weight value-->	
			
			var calculate_weight;
			if (total_weight > total_metric) {
				calculate_weight = total_weight;
			} else {
				calculate_weight = total_metric;
			}
			
			var total_tax = (calculate_weight + total_insurance) * sum3.value/percent; 	<!--Total sales tax-->
			
			total_result = parseFloat(parseFloat(total_insurance)  +  parseFloat(calculate_weight) + parseFloat(total_tax)) .toFixed(2); <!--Total result formula-->
			
			input.value= total_result;
			

		}
		

	</script>
	
	<script type="text/javascript"> 
	// <![CDATA[
	$(document).ready(function () {
		$('a.activate').on('click', function () {
			var uid = $(this).attr('id').replace('act_', '')
			var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this user account?<br /><strong>Email notification will be sent as well</strong>";
			new Messi(text, {
				title: "Activate User Account",
				modal: true,
				closeButton: true,
				buttons: [{
					id: 0,
					label: "Activate",
					val: 'Y'
				}],
				  callback: function (val) {
					  $.ajax({
						  type: 'post',
						  url: "controller.php",
						  data: {
							  activateAccount: 1,
							  id: uid,
						  },
						  cache: false,
						  beforeSend: function () {
							  showLoader();
						  },
						  success: function (msg) {
							  hideLoader();
							  $("#msgholder").html(msg);
							  $('html, body').animate({
								  scrollTop: 0
							  }, 600);
						  }
					  });
				  }
			});
		});
	});
	// ]]>
	</script>
	
	<script type="text/javascript">
	// <![CDATA[
	  function showResponse(msg) {
		  hideLoader();
		  if (msg == 'OK') {
			  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Success!<\/span>You have successfully registered. Please check your email for further information<\/p><\/div>";
			  $("#fullform").hide();
		  } else {
			  result = msg;
		  }
		  $(this).html(result);
		  $("html, body").animate({
			  scrollTop: 0
		  }, 600);
	  }
	  $(document).ready(function () {
		  var options = {
			  target: "#msgholder",
			  beforeSubmit: showLoader,
			  success: showResponse,
			  url: "../ajax/user.php",
			  resetForm: 0,
			  clearForm: 0,
			  data: {
				  processContact: 1
			  }
		  };
		  $("#client_form").ajaxForm(options);
	  });
	// ]]>
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
	<script type="text/javascript"> 
	// <![CDATA[
	$(document).ready(function () {
		$('a.activate').on('click', function () {
			var uid = $(this).attr('id').replace('act_', '')
			var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this user account?<br /><strong>Email notification will be sent as well</strong>";
			new Messi(text, {
				title: "Activate User Account",
				modal: true,
				closeButton: true,
				buttons: [{
					id: 0,
					label: "Activate",
					val: 'Y'
				}],
				  callback: function (val) {
					  $.ajax({
						  type: 'post',
						  url: "controller.php",
						  data: {
							  activateAccount: 1,
							  id: uid,
						  },
						  cache: false,
						  beforeSend: function () {
							  showLoader();
						  },
						  success: function (msg) {
							  hideLoader();
							  $("#msgholder").html(msg);
							  $('html, body').animate({
								  scrollTop: 0
							  }, 600);
						  }
					  });
				  }
			});
		});
	});
	// ]]>
	</script>
	
	<!--Datetimepicker -->
		
	<?php include 'datetimepicker.php'; ?>
		
</body>
</html>