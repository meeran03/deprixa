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
<?php $companyList = $user->getCompanyList(); ?>

<script>
	console.log(<?php echo json_encode($companyList) ?>)
</script>

<div class="row">
	
	<?php 
		 if (!($row->locker == "")):
	?>
	<div class="col-sm-12 col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="col-md-12 ">
						<p><?php echo $lang['left1000'] ?> <b><?php echo $row->fname;?> <?php echo $row->lname;?></b></p>
					</div>
					 <h4 class="card-title"><?php echo $lang['left1001'] ?></h4>
					<div class="row bg-light m-b-0 p-3">						
						<div class="col-xs-4 col-sm-4">
							<small class="text-muted"><?php echo $lang['left1002'] ?></small> <h6><?php echo $core->locker_address;?></h6>
							<small class="text-muted"><?php echo $lang['left1003'] ?></small> <h6><?php echo $row->locker;?></h6>
						</div>
						
						<div class="col-xs-4 col-sm-4">
							<small class="text-muted"><?php echo $lang['left1004'] ?></small> <h6><?php echo $core->c_country;?></h6>
							<small class="text-muted"><?php echo $lang['left1005'] ?></small> <h6><?php echo $core->c_city;?></h6>
						</div>
						<div class="col-xs-4 col-sm-4">						
							<small class="text-muted"><?php echo $lang['left1006'] ?></small> <h6><?php echo $core->c_postal;?></h6>
							<small class="text-muted"><?php echo $lang['left1007'] ?></small> <h6><?php echo $core->c_phone;?></h6>
						</div>
					</div>
				</div>	
			</div>
		</div>
	<?php endif; ?>
	
	<?php 
		 if (($row->buying_service == 1)):
	?>
	<div class="col-sm-12 col-lg-8">
		<div class="card">
			<div class="card-body border-bottom">
				<h4 class="card-title"><?php echo $lang['left1008'] ?></h4>
				<h5 class="card-subtitle"><?php echo $lang['left1009'] ?></h5>
			</div>
			<div class="card-body">
				<div class="row m-t-10">
					<!-- col -->
					<div class="col-md-6 col-sm-12 col-lg-3">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-cube-send" style="color:#f62d51"></i></span></div>
							<div><span class="text-muted"><?php echo $lang['left1010'] ?></span>
								<h3 class="font-medium m-b-0">
								<?php
								$total = $db->query("SELECT count(id) as total FROM add_courier WHERE act_status='1' and con_status='0' and username='$user->username'")->fetch_object()->total; 
								print $total; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->
					<!-- col -->
					<div class="col-md-6 col-sm-12 col-lg-3">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-view-week"></i></span></div>
							<div><span class="text-muted"><?php echo $lang['left1011'] ?></span>
								<h3 class="font-medium m-b-0"> 
								<?php
								$total4 = $db->query("SELECT count(id) as total4 FROM consolidate WHERE act_status='2' and payment_status='1' and username='$user->username'")->fetch_object()->total4; 
								print $total4; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->
					<!-- col -->
					<div class="col-md-6 col-sm-12 col-lg-3">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><span class="display-5"><i class="mdi mdi-clock-fast"></i></span></div>
							<div><span class="text-muted"><?php echo $lang['left1012'] ?></span>
								<h3 class="font-medium m-b-0"> 
								<?php
								$total15 = $db->query("SELECT count(id) as total15 FROM add_courier WHERE status_courier='Pick up' and status_pickup='1' and username='$user->username'")->fetch_object()->total15; 
								print $total15; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->
					<!-- col -->
					<div class="col-md-6 col-sm-12 col-lg-3">
						<div class="d-flex align-items-center">
							<div class="m-r-10"><span class="display-5"><i class="ti ti-stats-up" style="color:#6610f2"></i></span></div>
							<div><span class="text-muted"><?php echo $lang['left1013'] ?></span>
								<h3 class="font-medium m-b-0"> 
								<?php
								$total16 = $db->query("SELECT count(id) as total16 FROM quote WHERE (status_quote='Quotation' OR status_quote='Pending') and username='$user->username'")->fetch_object()->total16; 
								print $total16; //output value
								?></h3>
							</div>
						</div>
					</div>
					<!-- col -->
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>

<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">	
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					
					<div class="d-md-flex align-items-center">
						<div>
							<h4 class="card-title">Business Registration Orders</h4>
						</div>
					</div>
					
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-striped" cellpadding="0" cellspacing="0" border="0" >
							<thead>
								<tr>
									<th class="th-sm"><b>Order Id</b></th>
									<th class="th-sm"><b>Company Name</b></th>
									<th class="th-sm"><b>Package Name</b></th>
									<th class="th-sm"><b>Price</b></th>
									<th class="th-sm"><b>Transaction ID</b></th>
									<th class="th-sm"><b>Payment Status</b></th>
									<th class="th-sm"><b>Order Status</b></th>
								</tr>
							</thead>
							<tbody id="projects-tbl">
								
								<?php if(!$companyList):?>
								<tr>
									<td colspan="7">
									<?php echo "
									<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>There are no active orders </p>
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($companyList  as $row):?>
								<tr class="card-hover">			
									<td><b><?php echo $row->id;?></b></td>
									<td><?php echo $row->c_name;?></td>
									<td><?php echo $row->name;?></td>
									<td><?php echo $core->currency;?> <?php echo ($row->paid_amount)/100;?></td>
									<td><?php echo $row->transaction_id;?></td>
									<td><?php echo ($row->payment_status);?></td>
									<?php 
										if ($row->status == "In Review") 
											$row->color = "#a89d32";
										else 
											$row->color = "green"
									?>
									<td  class="col-2" ><span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status;?></span></td>
									
									<!-- <?php if($row->idquote == 2){ ?>
									<td align='center'>
										<a  href="edit_quote.php?do=edit_quote&amp;action=edit&amp;id=<?php echo $row->id;?>" ><button type="button" class="btn btn-sm btn-icon btn-success btn-outline"><?php echo $lang['left1019'] ?></button></a>
									</td>
									<?php }else if($row->idquote == 3){ ?>
									<td><b><em><?php echo $lang['left1020'] ?></em></b></td>
									<?php }else{ ?>
									<td><b><em><?php echo $lang['left1021'] ?></em></b></td>
									<?php } ?> -->
								</tr>											
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>
							</tbody>	
						</table>
						<?php echo $pager->display_pages();?>
						<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
						
					</div>
				</div>
			</div>
		</div>
	
	
		<!-- <div class="card">
			<div class="card-body">
				<div class="row">
					
					<div class="d-md-flex align-items-center">
						<div>
							<h4 class="card-title"><?php echo $lang['left1022'] ?></h4>
						</div>
					</div>
					
					<div id="msgholder"></div>
					<div class="table-responsive">
						<table id="zero_config" class="table table-striped" cellpadding="0" cellspacing="0" border="0" >
							<thead>
								<tr>
									<th class="th-sm"><b><?php echo $lang['booking-list2'] ?></b></th>
									<th class="th-sm"><b><?php echo $lang['booking-list3'] ?></b></th>
									<th class="th-sm"><b><?php echo $lang['left1023'] ?></b></th>
									<th class="th-sm"><b><?php echo $lang['booking-list6'] ?></b></th>
									<th class="th-sm"><b><?php echo $lang['booking-list7'] ?></b></th>
									<th class="th-sm"><b><?php echo $lang['booking-list8'] ?></b></th>
								</tr>
							</thead>
							<tbody id="projects-tbl">
								
								<?php if(!$courier_onlinerow):?>
								<tr>
									<td colspan="6">
									<?php echo "
									<p style='font-size: 20px; -webkit-font-smoothing: antialiased; color: #737373;' align='center'>There are no pending packages</p>
									",false;?>
									</td>
								</tr>
								<?php else:?>
								<?php foreach ($courier_onlinerow  as $row):
								
								$suma=0;
								$total=$row->r_costtotal;
								$total=number_format($total,2,'.','');
								$suma+=$total;
								
								?>
								<tr class="card-hover">			
									<td><b><?php echo $row->order_inv;?></b></td>
									<td><?php echo $row->created;?></td>
									<td><?php echo $row->r_name;?></td>
									<td><?php echo $row->r_dest;?> | <?php echo $row->r_city;?> <br> <?php echo $lang['left1024'] ?> <b><?php echo $row->r_description;?></b></td>
									<td>
										<span style="background: <?php echo $row->color; ?>;"  class="label label-large" ><?php echo $row->status_courier;?></span>
										<span style="background: #ffb091;"  class="label label-large" ><?php echo $row->status_prealert;?></span>
									</td>
									<td><?php echo $row->r_curren;?> <span class="text-black"><strong><?php echo $suma;?></strong></td>
								</tr>											
								<?php endforeach;?>
								<?php unset($row);?>
								<?php endif;?>
							</tbody>	

							
						</table>
						<?php echo $pager->display_pages();?>
						<?php echo Core::doDelete("Delete Shipment","deleteCourier");?> 
						
					</div>
				</div>
			</div>
		</div> -->
	</div>
</div>
<script src="app.js"></script>
<script src="dist/js/stacktable.js"></script>
<script>
	$('table').stacktable();
</script>
<script src="assets/extra-libs/prism/prism.js"></script>