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
    <script src="<?php SITEURL ?>assets/libs/jquery/dist/jquery.min.js"></script>
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
	
	<!--This page plugins -->
    <script src="<?php SITEURL ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="<?php SITEURL ?>dist/js/pages/datatable/datatable-basic.init.js"></script>

</body>

</html>