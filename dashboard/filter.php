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
?>
<?php
  switch (Filter::$do) {
      case "main";

		switch (Filter::$action) {
			case "edit":
				echo '<i class="icon-group"></i> '.$lang['filter1'].'';
			break;
			case "add":
				echo '<i class="icon-group"></i> '.$lang['filter2'].'';
			break;
		}

		break;
		  
		case "main_client";

		switch (Filter::$action) {
			case "edit":
					echo '<i class="icon-group"></i> '.$lang['filter4'].'';
				break;
			case "add":
					echo '<i class="icon-group"></i> '.$lang['filter5'].'';
				break;
		}

		break;  
		
		case "main_driver";

		switch (Filter::$action) {
			case "edit":
					echo '<i class="mdi mdi-car"></i> '.$lang['filter79'].'';
				break;
			case "add":
					echo '<i class="mdi mdi-car"></i> '.$lang['filter80'].'';
				break;
		}

		break;  

		case "config":

		case "backup":


		case "maintenance":

		  
		case "gateways":

			switch (Filter::$action) {
				case "edit":
					echo '<i class="icon-credit-card"></i> '.$lang['filter10'].'';
				break;
			}

		break;

		case "news":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="fas fa-comment-alt"></i> '.$lang['filter12'].'';
					break;
				case "add":
						echo '<i class="fas fa-comment-alt"></i> '.$lang['filter13'].'';
					break;
						echo '<i class="fas fa-comment-alt"></i> '.$lang['filter14'].'';

			}

		break;
		
		
		case "offices":

			switch (Filter::$action) {
				case "edit-office":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter15'].'';
					break;
				case "add_office":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter16'].'';
					break;				
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter17'].'';

			}

		break;
		
		case "branchoffice":

			switch (Filter::$action) {
				case "edit-branchoffice":
						echo '<i class="icon-file-text-alt"></i> Agencies';
					break;
				case "add_branchoffice":
						echo '<i class="icon-file-text-alt"></i>  Agencies';
					break;				
						echo '<i class="icon-file-text-alt"></i>  Agencies';

			}

		break;
		
		case "verify_purchase":

			switch (Filter::$action) {
				case "edit-purchase":
						echo '<i class="icon-file-text-alt"></i>Edit License';
					break;
				case "add_purchase":
						echo '<i class="icon-file-text-alt"></i>Add License';
					break;				
						echo '<i class="fas fas fa-key" style="color:#7460ee"></i> Activate License';

			}

		break;
		
		case "check_update":

			switch (Filter::$action) {
				case "edit-purchase":
						echo '<i class="icon-file-text-alt"></i>Edit';
					break;
				case "add_purchase":
						echo '<i class="icon-file-text-alt"></i>Add';
					break;				
						echo '<i class="fas fas fa-redo" style="color:#20c997"></i> Check for updates';

			}

		break;
		
		case "add_courier":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="ti-package"></i> '.$lang['filter18'].'';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter19'].'';

			}

		break;

		
		case "edit_quote":

			switch (Filter::$action) {				
				case "edit":
						echo '<i class="ti-package"></i> Edit quote';
					break;				
						echo '<i class="ti-package"></i> Edit quote';

			}

		break;
		
		case "add_courierq":

			switch (Filter::$action) {				
				case "edit":
						echo '<i class="ti-package"></i> Edit quote and invoice';
					break;				
						echo '<i class="ti-package"></i> Edit quote and invoice';

			}

		break;
		
		case "add_pickup":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="mdi mdi-clock-fast"></i> Add Pick up';
					break;				
						echo '<i class="mdi mdi-clock-fast"></i> Add Pick up';

			}

		break;

		case "add_pickup_client":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="mdi mdi-clock-fast"></i> Add Pick up';
					break;				
						echo '<i class="mdi mdi-clock-fast"></i> Add Pick up';

			}

		break;
		
		case "view-google-maps":

			switch (Filter::$action) {				
				case "mapview":
						echo '<i class="ti-package"></i>Map View';
					break;				
						echo '<i class="ti-package"></i>Map View';

			}

		break;
		
		case "add_container":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter20'].'';
					break;				
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter21'].'';

			}

		break;
		
		
		case "customs_locked_packages":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="fas fas fa-lock"></i> Blocked packages';
					break;				
						echo '<i class="fas fas fa-lock"></i> Blocked packages';

			}

		break;
		
		case "add_customs":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="ti-check-box"></i> Create Customs Novelty';
					break;				
						echo '<i class="ti-check-box"></i> Create Customs Novelty';

			}

		break;
		
		case "update_customs":

			switch (Filter::$action) {				
				case "edit":
						echo '<i class="ti-check-box"></i> Update Customs Novelty';
					break;				
						echo '<i class="ti-check-box"></i> Update Customs Novelty';

			}

		break;
		
		case "list_container":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="mdi mdi-view-week"></i>'.$lang['filter22'].'';
					break;				
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter23'].'';

			}

		break;
		
		case "list_courier":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="fas fa-cubes"></i> '.$lang['filter24'].'';
					break;				
						echo '<i class="fas fa-cubes"></i> '.$lang['filter25'].'';

			}

		break;
		
		case "list_consolidate":

			switch (Filter::$action) {				
				case "add":
						echo '<i class="fas fa-cubes"></i> Consolidate List';
					break;				
						echo '<i class="fas fa-cubes"></i> Consolidate List';

			}

		break;
		
		case "edit_courier":

			switch (Filter::$action) {				
				case "ship":
						echo '<i class="ti-package"></i> '.$lang['filter26'].'';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter26'].'';

			}

		break;
		
		case "edit_pickup":

			switch (Filter::$action) {				
				case "pick":
						echo '<i class="mdi mdi-clock-fast"></i>Edit Pickup';
					break;				
						echo '<i class="mdi mdi-clock-fast"></i> Edit Pickup';

			}

		break;
		
		case "edit_container":

			switch (Filter::$action) {				
				case "edit":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter27'].'';
					break;				
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter27'].'';

			}

		break;
		
		case "edit_consolidate":

			switch (Filter::$action) {				
				case "ship":
						echo '<i class="ti ti-gift"></i> '.$lang['langs_01029'].'';
					break;				
						echo '<i class="ti ti-gift"></i> '.$lang['langs_01029'].'';

			}

		break;
		
		case "status_shipment":

			switch (Filter::$action) {				
				case "status":
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';

			}

		break;
		
		case "dash_driver_deliver":

			switch (Filter::$action) {				
				case "status_driver":
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';

			}

		break;
		
		case "dash_driver_pickup":

			switch (Filter::$action) {				
				case "pickup_driver":
						echo '<i class="mdi mdi-clock-fast"></i> Pick up package';
					break;				
						echo '<i class="mdi mdi-clock-fast"></i> Pick up package';

			}

		break;
		
		case "status_container":

			switch (Filter::$action) {				
				case "status_container":
						echo '<i class="mdi mdi-view-week"></i>Status Container';
					break;				
						echo '<i class="mdi mdi-view-week"></i>Status Container';

			}

		break;
		
		case "status_consolidate":

			switch (Filter::$action) {				
				case "status_cons":
						echo '<i class="ti-package"></i> Status Consolidate';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter28'].'';

			}

		break;
		
		case "courier_company":

			switch (Filter::$action) {
				case "edit-courier_company":
						echo '<i class="fas fa-globe"></i> '.$lang['filter29'].'';
					break;
				case "add-courier_company":
						echo '<i class="fas fa-globe"></i> '.$lang['filter30'].'';
					break;				
						echo '<i class="fas fa-globe"></i> '.$lang['filter31'].'';

			}

		break;
		
		case "ship_rates":

			switch (Filter::$action) {
				case "edit-ship_rates":
						echo '<i class="fas fa-cube"></i> '.$lang['filter32'].'';
					break;
				case "add-ship_rates":
						echo '<i class="fas fa-cube"></i> '.$lang['filter33'].'';
					break;				
						echo '<i class="fas fa-cube"></i> '.$lang['filter34'].'';

			}

		break;
		
		case "status_courier":

			switch (Filter::$action) {
				case "edit-status":
						echo '<i class="fas fa-paint-brush"></i> '.$lang['filter35'].'';
					break;
				case "add-status":
						echo '<i class="fas fa-paint-brush"></i> '.$lang['filter36'].'';
					break;				
						echo '<i class="fas fa-paint-brush"></i> '.$lang['filter37'].'';

			}

		break;
		
		case "payment_method":

			switch (Filter::$action) {
				case "edit-payment":
						echo '<i class="fas fa-donate"></i> '.$lang['filter38'].'';
					break;
				case "add-Payment":
						echo '<i class="fas fa-donate"></i> '.$lang['filter39'].'';
					break;				
						echo '<i class="fas fa-donate"></i> '.$lang['filter40'].'';

			}

		break;
		
		case "shipping_mode":

			switch (Filter::$action) {
				case "edit-shipmode":
						echo '<i class="ti-truck"></i> '.$lang['filter41'].'';
					break;
				case "add-shipmode":
						echo '<i class="ti-truck"></i> '.$lang['filter42'].'';
					break;				
						echo '<i class="ti-truck"></i> '.$lang['filter43'].'';

			}

		break;
		
		case "delivery_time":

			switch (Filter::$action) {
				case "edit-time":
						echo '<i class="ti-truck"></i> Edit delivery time';
					break;
				case "add-time":
						echo '<i class="ti-truck"></i> Add delivery time';
					break;				
						echo '<i class="ti-truck"></i> Add delivery time';

			}

		break;
		
		case "shipline":

			switch (Filter::$action) {
				case "edit-shipline":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter44'].'';
					break;
				case "add-shipline":
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter45'].'';
					break;				
						echo '<i class="mdi mdi-view-week"></i> '.$lang['filter46'].'';

			}

		break;
		
		case "incoterms":

			switch (Filter::$action) {
				case "edit-incoterms":
						echo '<i class="ti-briefcase"></i> '.$lang['filter47'].'';
					break;
				case "add-incoterms":
						echo '<i class="ti-briefcase"></i> '.$lang['filter48'].'';
					break;				
						echo '<i class="ti-briefcase"></i> '.$lang['filter49'].'';

			}

		break;
		
		case "packaging":

			switch (Filter::$action) {
				case "edit-packaging":
						echo '<i class="fas fa-dolly-flatbed"></i> '.$lang['filter50'].'';
					break;
				case "add-packaging":
						echo '<i class="fas fa-dolly-flatbed"></i> '.$lang['filter51'].'';
					break;				
						echo '<i class="fas fa-dolly-flatbed"></i> '.$lang['filter52'].'';

			}

		break;
		
		case "category":

			switch (Filter::$action) {
				case "edit-category":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter53'].'';
					break;
				case "add-category":
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter54'].'';
					break;				
						echo '<i class="icon-file-text-alt"></i> '.$lang['filter56'].'';

			}

		break;

		case "templates":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-email"></i> '.$lang['filter57'].'';
					break;
				case "add":
						echo '<i class="ti-email"></i> '.$lang['filter57'].'';
					break;
						echo '<i class="ti-email"></i> '.$lang['filter57'].'';

			}

		break;
		
		case "websites":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-content-copy"></i> '.$lang['filter58'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-content-copy"></i> '.$lang['filter58'].'';
					break;
						echo '<i class="mdi mdi-content-copy"></i> '.$lang['filter58'].'';

			}

		break;
		
		case "about":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-briefcase-check"></i> '.$lang['filter59'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-briefcase-check"></i> '.$lang['filter59'].'';
					break;
						echo '<i class="mdi mdi-briefcase-check"></i> '.$lang['filter59'].'';

			}

		break;
		
		case "rates":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-package"></i> '.$lang['filter60'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-package"></i> '.$lang['filter60'].'';
					break;
						echo '<i class="mdi mdi-package"></i> '.$lang['filter60'].'';

			}

		break;
		
		case "contact":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-location-pin"></i> '.$lang['filter61'].'';
					break;
				case "add":
						echo '<i class="ti-location-pin"></i> '.$lang['filter61'].'';
					break;
						echo '<i class="ti-location-pin"></i> '.$lang['filter61'].'';

			}

		break;
		
		case "log_in":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-account-key"></i> '.$lang['filter62'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-account-key"></i> '.$lang['filter62'].'';
					break;
						echo '<i class="mdi mdi-account-key"></i> '.$lang['filter62'].'';

			}

		break;
		
		case "register":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-account"></i> '.$lang['filter63'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-account"></i> '.$lang['filter63'].'';
					break;
						echo '<i class="mdi mdi-account"></i>'.$lang['filter63'].'';

			}

		break;
		
		case "menu":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="mdi mdi-menu"></i> '.$lang['filter64'].'';
					break;
				case "add":
						echo '<i class="mdi mdi-menu"></i> '.$lang['filter64'].'';
					break;
						echo '<i class="mdi mdi-menu"></i> '.$lang['filter64'].'';

			}

		break;
		
		case "templates_sms":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-comments-smiley"></i> '.$lang['filter52'].'';
					break;
				case "add":
						echo '<i class="ti-comments-smiley"></i> '.$lang['filter65'].'';
					break;
						echo '<i class="ti-comments-smiley"></i> '.$lang['filter65'].'';

			}

		break;
		
		case "smstwilio":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter66'].'';
					break;
				case "add":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter66'].'';
					break;
						echo '<i class="fas fa-envelope"></i> '.$lang['filter66'].'';

			}

		break;
		
		case "smsnexmo":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter67'].'';
					break;
				case "add":
						echo '<i class="fas fa-envelope"></i> '.$lang['filter67'].'';
					break;
						echo '<i class="fas fa-envelope"></i> '.$lang['filter67'].'';

			}

		break;
		
		case "inv_ship":

			switch (Filter::$action) {				
				case "ship":
						echo '<i class="ti-package"></i> '.$lang['filter68'].'';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter68'].'';

			}

		break;
		
		case "label_ship":

			switch (Filter::$action) {				
				case "label":
						echo '<i class="ti-package"></i> '.$lang['filter69'].'';
					break;				
						echo '<i class="ti-package"></i> '.$lang['filter69'].'';

			}

		break;
		
		case "shipment":

			switch (Filter::$action) {				
				case "ship_list":
						echo '<i class="ti-package"></i>'.$lang['filter70'].'';
					break;
							echo '<i class="ti-package"></i>'.$lang['filter70'].'';
				}

		break;
		
		case "pending":

			switch (Filter::$action) {				
				case "pending":
						echo '<i class="ti-timer"></i> '.$lang['filter71'].'';
					break;
							echo '<i class="ti-timer"></i> '.$lang['filter71'].'';
				}

		break;
		
		case "rejected":

			switch (Filter::$action) {				
				case "pending":
						echo '<i class="ti-face-sad"></i> '.$lang['filter72'].'';
					break;
							echo '<i class="ti-face-sad"></i> '.$lang['filter72'].'';
				}

		break;
		
		case "delivered":

			switch (Filter::$action) {				
				case "delivered":
						echo '<i class="ti-truck"></i> '.$lang['filter73'].'';
					break;
			}

		break;
		
		case "deliver_shipment":

			switch (Filter::$action) {				
				case "status":
						echo '<i class="ti-package"></i> '.$lang['filter74'].'';
					break;
			}

		break;
		
		case "billings":

			switch (Filter::$action) {				
				case "billings":
						echo '<i class="ti-money"></i> '.$lang['filter75'].'';
					break;
			}

		break;
		
		case "sales_customer":

			switch (Filter::$action) {
				case "edit":
						echo '<i class="ti-money"></i> '.$lang['filter76'].'';
					break;
				case "add":
						echo '<i class="ti-money"></i> '.$lang['filter76'].'';
					break;
			}

		break;
		
		case "status_in_transit":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> In Transit';
					break;
			}

		break;
		
		case "status_in_warehouse":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> In Warehouse';
					break;
			}

		break;
		
		case "status_received_office":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Received Office';
					break;
			}

		break;
		
		case "status_on_route":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> On Route';
					break;
			}

		break;
		
		case "status_distribution":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Distribution';
					break;
			}

		break;
		
		case "status_pending_collection":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Pending Collection';
					break;
			}

		break;
		
		case "status_pick_up":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Pick up';
					break;
			}

		break;
		
		case "status_picked_up":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Picked up';
					break;
			}

		break;
		
		
		case "status_pre_alert":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Pre Alert';
					break;				
			}

		break;
		
		case "status_delivered":

			switch (Filter::$action) {				
				case "view":
						echo '<i class="mdi mdi-view-week"> Delivered';
					break;				
			}

		break;

		case "newsletter":
  }
?>