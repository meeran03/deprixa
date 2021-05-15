	
		<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
					<?php if($row->userlevel == 9){?>
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" />': $core->site_name;?>
                        </span>
                    </a>
					<?php }else if($row->userlevel == 1){?>
					<a class="navbar-brand" href="client.php">
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" />': $core->site_name;?>
                        </span>
                    </a>
					<?php }else if($row->userlevel == 2){?>
					<a class="navbar-brand" href="index.php">
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" />': $core->site_name;?>
                        </span>
                    </a>
					
					<?php }else if($row->userlevel == 3){?>
					<a class="navbar-brand" href="dash_driver.php">
                        <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" />': $core->site_name;?>
                        </span>
                    </a>
					<?php } ?>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
						
						<!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block"><b>
							 <?php 							 
								$dias = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
								$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
								 
								echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
							 ?></b></span>  
                            </a>
                        </li>
                    </ul>
					
					 
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  <?php if ($core->language == "en"){ ?>	
								<img src="dist/icon-flag/us.png"  width="34" />
							  <?php }else if($core->language == "es"){ ?>
								<img src="dist/icon-flag/es.png"  width="34" />
							  <?php }else if($core->language == "fr"){ ?>
							    <img src="dist/icon-flag/fr.png"  width="34" />
							  <?php }else if($core->language == "ru"){ ?>
							     <img src="dist/icon-flag/ru.png"  width="34" />
							  <?php }else{ ?>
								 <img src="dist/icon-flag/it.png"  width="34" />
							  <?php } ?>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
						<?php if($row->userlevel == 9){?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							 <?php if (countEntries(Core::cTable, "status_courier", "Pending")){ ?>
								<img src="assets/images/alert/bell.png"  width="26" /><span class="badge badge-notify badge-sm up bg-danger pull-top-xs"><?php echo countEntries(Core::cTable, "status_courier", "Pending");?></span>
							<?php }else{ ?>	
								<img src="assets/images/alert/bell.png"  width="26" /><span class="badge badge-pill badge-light">0</span>
							<?php } ?>	
							</a>
							
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
									<div class="drop-title bg-danger text-white">
										<h4 class="m-b-0 m-t-5"><?php echo countEntries(Core::cTable, "status_courier", "Pending");?> <?php echo $lang['notinew'] ?></h4>
										<span class="font-light"><?php echo $lang['notiapprove'] ?></span>
									</div>
                            </div>
                        </li>
						<?php }else if($row->userlevel == 2){?>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							 <?php 
								$total1 = $db->query("SELECT count(id) as total1 FROM add_courier WHERE   status_courier='Pending' AND act_status='0'")->fetch_object()->total1;
								if ($total1 >= 1){ ?>
								<img src="assets/images/alert/bell.png"  width="26" /><span class="badge badge-notify badge-sm up bg-danger pull-top-xs"><?php echo $total1;?></span>
							<?php }else{ ?>	
								<img src="assets/images/alert/bell.png"  width="26" /><span class="badge badge-pill badge-light">0</span>
							<?php } ?>	
							</a>
							
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
									<div class="drop-title bg-danger text-white">
										<h4 class="m-b-0 m-t-5"><?php echo $total1;?> <?php echo $lang['notinew'] ?></h4>
										<span class="font-light"><?php echo $lang['notiapprove'] ?></span>
									</div>
                            </div>
                        </li>
						
						<?php }else if($row->userlevel == 1){?>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							 <?php 
								$total1 = $db->query("SELECT count(id) as total1 FROM quote WHERE   status_quote='Pending' AND idquote='2'")->fetch_object()->total1;
								if ($total1 >= 1){ ?>
								<img src="assets/images/alert/bell.png"  width="26" /><span class="badge badge-notify badge-sm up bg-danger pull-top-xs"><?php echo $total1;?></span>
							<?php }else{ ?>	
								<img src="assets/images/alert/bell.png"  width="26" /><span class="badge badge-pill badge-light">0</span>
							<?php } ?>	
							</a>
							
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow"><span class="bg-danger"></span></span>
									<div class="drop-title bg-danger text-white">
										<h4 class="m-b-0 m-t-5"><?php echo $total1;?> <?php echo $lang['notinew'] ?></h4>
										<span class="font-light"><?php echo $lang['notiapprove'] ?></span>
									</div>
                            </div>
                        </li>
						
                        <?php } ?>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="51" />&nbsp; <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1"  width="80" /> </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $user->username;?></h4>
                                        <p class=" m-b-0"><?php echo $user->email;?></p>
                                    </div>
                                </div>
								<?php if($row->userlevel == 9){?>	
									<a class="dropdown-item" href="all_tools.php?do=main&amp;action=edit&amp;id=<?php echo $user->uid;?>"><i class="ti-user m-r-5 m-l-5"></i> <?php echo $lang['miprofile'] ?></a>
									
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="all_tools.php?do=main"><i class="ti-settings m-r-5 m-l-5"></i> <?php echo $lang['accountset'] ?></a>
									<div class="dropdown-divider"></div>
								<?php }else if($row->userlevel == 1){?>
									<a class="dropdown-item" href="user_client.php"><i class="ti-user m-r-5 m-l-5"></i> <?php echo $lang['miprofile'] ?></a>

									<div class="dropdown-divider"></div>
								<?php } ?>
                                <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> <?php echo $lang['logoouts'] ?></a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>