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

	* {
	  box-sizing: border-box;
	}
	
	.content_search {
	margin-top: 40px;
	}
	.search {
	max-width: 250px;
	margin: 0 auto;
	position: relative;
	}
	.search input {
	width: 230px;
	height: 44px;
	display: flex;
	padding: .375rem .75rem;
	border: 1px solid #dfe1e5;
	border-radius: 3px;
	z-index: 3;
	}	
	.search i {
		position: absolute;
		cursor: pointer;
		right: 15px;
		top: 0px;
	}
	input:focus { 
		outline: none !important;
		border-color: #719ECE;
		box-shadow: 0 0 5px #719ECE;
	}
</style>


<?php $deliverpackagerow = $user->getDeliverpackage_list(); ?>

<!-- Sales chart -->
<!-- ============================================================== -->

	
	
	<div class="col-12 col-sm-12 col-md-12">
		<div class="card">
				<div class="row">
					<!-- column -->
					<div class="d-md-flex align-items-center">
						<div>
							<h5 class="card-title"><br>&nbsp;&nbsp;<?php echo $lang['left809'] ?></h5>
						</div>
					</div>
					<!-- column -->
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="demo-foo-addrow2" class="table table-striped table-hover toggle-circle" data-page-size="7">
							<thead>
								<tr>
									<th data-sort-initial="true" data-toggle="true"><b><?php echo $lang['left900'] ?></b></th>
									<th data-hide="phone, tablet"><b><?php echo $lang['left901'] ?></b></th>
									<th data-hide="phone, tablet"><b><?php echo $lang['left902'] ?></b></th>
									<th data-hide="phone, tablet"><b><?php echo $lang['langs_01075'] ?></b></th>
									<th class="th-sm"><b><?php echo $lang['left903'] ?></b></th>
									<th data-hide="phone, tablet"><b><?php echo $lang['left904'] ?></b></th>
									<th data-hide="phone, tablet"><b><?php echo $lang['left905'] ?></b></th>
									<th data-hide="phone, tablet"><b><?php echo $lang['langs_01076'] ?></b></th>
									<th><?php echo $lang['left906'] ?></th>
								</tr>
							</thead>
							<div class="m-t-5">
								<div class="d-flex">
									<div class="ml-auto">
										<div class="form-group">
											<div class="content_search">
												<div class="search">
													<input type="text" id="demo-input-search2" placeholder="Barcode..." autofocus autocomplete="off">
													<span class="text-secondary display-7"><i class="mdi mdi-barcode-scan" style="color:#FF5C26"></i></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<tbody id="projects-tbl">
								<?php if(!$deliverpackagerow):?>
								<tr>
									<td colspan="9">
									<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_shipment.png' width='120' /></i>
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($deliverpackagerow  as $row):?>	
								<tr class="card-hover">	
									<td><b><?php echo $row->order_inv;?></b></td>
									<td><?php echo $row->r_name;?></td>
									<td><?php echo $row->rc_phone;?></td>
									<td><?php echo $row->r_address;?></td>
									<td><?php echo $row->detail_description;?></td>
									<td><?php echo $row->r_qnty;?></td>
									<td><?php echo $row->r_costtotal;?></td>
									<td><?php echo $row->created;?> | <?php echo $row->r_hour;?></br>  <span style="background: <?php echo $row->color; ?>;"  class="label label-large u-rounded" ><?php echo $row->status_courier;?></span></td>					
									<td>
										<a  href="dash_driver_deliver.php?do=dash_driver_deliver&amp;action=status_driver&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['left704'] ?>"><i style="color:#20c997" class="mdi mdi-package-variant"></i> <?php echo $lang['left703'] ?></a>
									</td>
								</tr>											
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="9">
										<div class="text-right">
											<ul class="pagination"></ul>
										</div>
									</td>
								</tr>
							</tfoot>
						</table>
						<?php echo $pager->display_pages();?>
						<!-- column -->
					</div>

				</div>
		</div>
	</div>


	<script src="app.js"></script>
	<script src="dist/js/stacktable.js"></script>
	<!--This page JavaScript -->
	<script src="assets/libs/footable/dist/footable.all.min.js"></script>
	<script src="dist/js/pages/tables/footable-init.js"></script>
	<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
	<script src="dist/js/pages/datatable/datatable-basic.init.js"></script>    
	<script src="assets/extra-libs/prism/prism.js"></script>
