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
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php SITEURL ?>assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php SITEURL ?>assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="<?php SITEURL ?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?php SITEURL ?>assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="<?php SITEURL ?>assets/libs/chart.js/dist/Chart.min.js"></script>

	
	<!--This page plugins -->
    <script src="<?php SITEURL ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="<?php SITEURL ?>dist/js/pages/datatable/datatable-basic.init.js"></script>
	<script type="text/javascript">

		function suma(){
			
			<!--General sale formula-->
			var num2 = "5.56789";
			var sum2 = document.getElementById("sum2");
			
			<!--VOLUMETRIC WEIGHT-->
			var l1 = document.getElementById("l1");
			var w2 = document.getElementById("w2");
			var h3 = document.getElementById("h3");


			var input = document.getElementById("total_result");
			
			<!--Formula Values-->
			var volumetric = <?php echo $core->meter;?>;

			var total_metric = l1.value * w2.value * h3.value/volumetric; 		<!--Volumetric weight result-->
			var total_weight = sum2.value; 										<!--Shipping weight value-->	
			
			
			var calculate_weight;
			if (total_weight > total_metric) {
				calculate_weight = total_weight;
			} else {
				calculate_weight = total_metric;
			}
			
			
			total_result = parseFloat(parseFloat(calculate_weight)) .toFixed(2); <!--Total result formula-->
			
			input.value= total_result;

		}
			


		
	//]]>

	</script>

	<script>

		function clearScripts() {
			$('.weight-slider').slider('destroy'); // Clear old stuff
			$('.dim-slider').slider('destroy'); // Clear old stuff
		}
		function dimensionToggle(sender)
		{
			if (sender.checked)
				$(sender).attr('checked', true);
			else
				$(sender).attr('checked', false);
				
			$(sender).closest('.check-box-wrapper').siblings('.dimensions').toggleClass('collapsed');
		}

	</script>
	

</body>

</html>
