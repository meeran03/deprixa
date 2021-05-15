	<div class=" left-sidebar">
		<div class="left-part">
			<a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
			<div class="scrollable" style="height:100%;">
				<div class="p-15">
					<a id="compose_mail" class="waves-effect waves-light btn btn-danger d-block" href="">Settings System Configuration</a>
				</div>
				<div class="divider"></div>
				<?php if($row->userlevel == 9){?>
				<nav class="sidebar-nav">
					<ul class="list-group" id="sidebarnav">
				
						<li>
							<small class="p-15 grey-text text-lighten-1 db"></small>
						</li>
						<li class="list-group-item">
							<a href="all_tools.php?do=config_general" class="list-group-item-action"><i class="mdi mdi-settings-box"></i> <?php echo $lang['left601'] ?></a>
						</li>
						<li class="list-group-item">
							<a href="all_tools.php?do=config" class="list-group-item-action"><i class="mdi mdi-briefcase-check"></i> <?php echo $lang['setcompany'] ?></a>
						</li>
						<li class="list-group-item">
							<a href="all_tools.php?do=config_taxes" class="list-group-item-action"> <i class="mdi mdi-percent"></i> <?php echo $lang['left29'] ?> </a>
						</li>
						<li class="list-group-item">
							<a href="all_tools.php?do=config_track_invoice" class="list-group-item-action"> <i class="mdi mdi-truck"></i> <?php echo $lang['left600'] ?> </a>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left606'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=offices" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['officegroup'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=branchoffice" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left30'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=courier_company" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left31'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=delivery_time" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left609'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=shipping_mode" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipmode'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=status_courier" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['stylestatus'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=payment_method" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['paymode'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=packaging" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu">  <?php echo $lang['packatype'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=category" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['itemcategory'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left602'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=config_payment" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left603'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=config_api_google" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left604'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=config_sms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left34'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left607'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=shipline" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipline'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=incoterms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['incoterms'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['template'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=templates" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['emailtemplate'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=templates_sms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['smstemplate'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item">
							<a href="all_tools.php?do=backup" class="list-group-item-action"> <i class="mdi mdi-backup-restore"></i> <?php echo $lang['restorbackup'] ?> </a>
						</li>
						<li class="list-group-item">
							<hr>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-account-plus"></i> <span class="hide-menu"> <?php echo $lang['left28'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=main" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['usermanage'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=main&amp;action=edit&amp;id=<?php echo $user->uid;?>" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['profiles'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=newsletter" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['newsletter'] ?></span></a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<?php }else if($row->userlevel == 2){?>
				<nav class="sidebar-nav">
					<ul class="list-group" id="sidebarnav">
						<li>
							<small class="p-15 grey-text text-lighten-1 db"></small>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left606'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=offices" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['officegroup'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=branchoffice" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left30'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=courier_company" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left31'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=delivery_time" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left609'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=shipping_mode" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipmode'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=status_courier" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['stylestatus'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=payment_method" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['paymode'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=packaging" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu">  <?php echo $lang['packatype'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=category" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['itemcategory'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left602'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=config_payment" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left603'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=config_api_google" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left604'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=config_sms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left34'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left607'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=shipline" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipline'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=incoterms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['incoterms'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['template'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=templates" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['emailtemplate'] ?></span></a></li>
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=templates_sms" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['smstemplate'] ?></span></a></li>
							</ul>
						</li>
						<li class="list-group-item">
							<hr>
						</li>
						<li class="list-group-item sidebar-item"><a class="list-group-item-action has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"> <i class="mdi mdi-playlist-plus"></i> <span class="hide-menu"> <?php echo $lang['left28'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="list-group-item sidebar-item"><a href="all_tools.php?do=main&amp;action=edit&amp;id=<?php echo $user->uid;?>" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['profiles'] ?></span></a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<?php } ?>
			</div>
		</div>
	</div>