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
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
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
	
	<!--This page plugins -->
    <script src="<?php SITEURL ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
	
	<!--This page plugins -->
    <script src="<?php SITEURL ?>dist/js/pages/datatable/datatable-basic.init.js"></script>
	<script src="<?php SITEURL ?>assets/js/jscolor.min.js"></script>
	
	<script src="<?php SITEURL ?>assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
	<script src="<?php SITEURL ?>assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
	<script src="<?php SITEURL ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
	<script src="<?php SITEURL ?>assets/libs/%40claviska/jquery-minicolors/jquery.minicolors.min.js"></script>
	
	<script>
	$('.demo').each(function() {
		$(this).minicolors({
			control: $(this).attr('data-control') || 'hue',
			defaultValue: $(this).attr('data-defaultValue') || '',
			format: $(this).attr('data-format') || 'hex',
			keywords: $(this).attr('data-keywords') || '',
			inline: $(this).attr('data-inline') === 'true',
			letterCase: $(this).attr('data-letterCase') || 'lowercase',
			opacity: $(this).attr('data-opacity'),
			position: $(this).attr('data-position') || 'bottom left',
			swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
			change: function(value, opacity) {
				if (!value) return;
				if (opacity) value += ', ' + opacity;
				if (typeof console === 'object') {
					console.log(value);
				}
			},
			theme: 'bootstrap'
		});

	});
	</script>
</body>

</html>
