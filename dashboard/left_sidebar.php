
	   <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
				 <?php if($row->userlevel == 9){?>
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
									<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="50" />
								</div>
								<?php
									date_default_timezone_set("".$core->timezone."");
									$t = date("H");

									if($t < 12){
									$mensaje = ''.$lang['message1'].'';
									}
									else if($t < 18){
									$mensaje = ''.$lang['message2'].'';
									} 
									else{
									$mensaje = ''.$lang['message3'].'';
									}
								?> 
								
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $mensaje; ?>,&nbsp;&nbsp;</h5>
                                        <span class="op-5 user-email"><?php echo $row->fname;?></span>
                                    </a>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                       <li class="p-15 m-t-10"><a href="customer_list.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="ti-package"></i> <span class="hide-menu m-l-5"> <?php echo $lang['left1'] ?> </span> </a></li>
                        <!-- User Profile-->
                        <li class="nav-small-cap"> <span class="hide-menu"></span></li>
						
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> <?php echo $lang['dashboard'] ?> </span></a></li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-codepen"></i><span class="hide-menu"> <?php echo $lang['left2'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_prealert.php?do=list_prealert" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span class="hide-menu"> <?php echo $lang['left3'] ?> </span></a></li>								
								<li class="sidebar-item"><a href="prealert.php" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left4'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cube-send"></i><span class="hide-menu"> <?php echo $lang['shipment'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="courier.php?do=list_courier" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipmentlist'] ?> </span></a></li>
								<li class="sidebar-item"><a href="customer_list.php" class="sidebar-link"><i class="mdi mdi-cube-send" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['createshipment'] ?> </span></a></li>
								<li class="sidebar-item"><a href="customerpickup_list.php" class="sidebar-link"><i class="mdi mdi-clock-fast" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['left702'] ?> </span></a></li>
								<li class="sidebar-item"><a href="pickup.php?do=create_pickup" class="sidebar-link"><i class="mdi mdi-clock-fast"></i><span class="hide-menu"> <?php echo $lang['left5'] ?> </span></a></li>																
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="search_shipment.php" aria-expanded="false"><i class="mdi mdi-search-web"></i><span class="hide-menu"> <?php echo $lang['left16'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti ti-stats-up"></i><span class="hide-menu"> <?php echo $lang['left6'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_quote.php?do=list_quote" aria-expanded="false"><i class="mdi mdi-check" style="color:#FF5C26"></i><span class="hide-menu"> <?php echo $lang['left7'] ?> </span></a></li>								
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_quotes.php?do=list_quotes" aria-expanded="false"><i class="mdi mdi-check" style="color:#FFBF00"></i><span class="hide-menu"> <?php echo $lang['left8'] ?></span></a></li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_quote_approved.php?do=list_quote_approved" aria-expanded="false"><i class="mdi mdi-check" style="color:#00B22D"></i><span class="hide-menu"> <?php echo $lang['left9'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-week"></i><span class="hide-menu"> <?php echo $lang['container'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="container.php?do=list_container" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['contalist'] ?> </span></a></li>
								<li class="sidebar-item"><a href="client_container.php" class="sidebar-link"><i class="mdi mdi-view-week"></i><span class="hide-menu"> <?php echo $lang['createcontainer'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti ti-gift" style="color:#6610f2"></i><span class="hide-menu"> <?php echo $lang['conso-lidate'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="consolidate_list.php" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left10'] ?> </span></a></li>
								<li class="sidebar-item"><a href="consolidate.php" class="sidebar-link"><i class="fas fa-cubes" style="color:#975EF7"></i><span class="hide-menu"> <?php echo $lang['left11'] ?> </span></a></li>
								
							</ul>
                        </li>

						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="services.php" aria-expanded="false"><i class="fa fa-tasks "></i><span class="hide-menu"> My Services </span></a></li>

						
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chess-board" style="color:#17a2b8"></i><span class="hide-menu"> <?php echo $lang['left12'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customs_news.php" aria-expanded="false"><i class="fas fas fa-box-open" style="color:#7460ee"></i><span class="hide-menu"> <?php echo $lang['left13'] ?> </span></a></li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customs_locked_packages.php" aria-expanded="false"><i class="fas fas fa-lock" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['left14'] ?> </span></a></li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customs_liberate_packages.php" aria-expanded="false"><i class="ti-share" style="color:#36bea6"></i><span class="hide-menu"> <?php echo $lang['left15'] ?> </span></a></li>								
							</ul>
                        </li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-multiple" style="color:#fb8c00"></i><span class="hide-menu"> <?php echo $lang['left22'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="shipping.php?do=shipment" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['all'] ?> </span></a></li>
								<li class="sidebar-item"><a href="shipping.php?do=prealert_report" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left17'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=pending" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left18'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=rejected" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left19'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=delivered" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left20'] ?> </span></a></li>
								<li class="sidebar-item"><a href="shipping.php?do=delivered_consolidated" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left21'] ?> </span></a></li>								
							</ul>
						</li>		

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-hand-holding-usd" style="color:#2962FF"></i><span class="hide-menu"> <?php echo $lang['left25'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="shipping.php?do=billings" aria-expanded="false"><i class="mdi mdi-credit-card-plus" style="color:#7460ee"></i><span class="hide-menu" > <?php echo $lang['left26'] ?> </span></a></li>
								<li class="sidebar-item"><a href="paymentlist_online.php" class="sidebar-link"><i class="fas fa-donate"></i><span class="hide-menu"> <?php echo $lang['left27'] ?> </span></a></li>
							</ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu"> <?php echo $lang['left608'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customer.php?do=main_client" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"> <?php echo $lang['left23'] ?> </span></a></li>

								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="driver.php?do=main_driver" aria-expanded="false"><i class="mdi mdi-car"></i><span class="hide-menu"> <?php echo $lang['left24'] ?></span></a></li>	
							</ul>
                        </li>


                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"><?php echo $lang['configutarions'] ?></span></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="all_tools.php" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu"> <?php echo $lang['tool'] ?> </span></a></li>						
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"> <?php echo $lang['wout'] ?></span></a></li>
                    </ul>
					
					<?php }else if($row->userlevel == 2){?>
					
					<ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic">
									<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="50" />
								</div>
								<?php
									date_default_timezone_set("".$core->timezone."");
									$t = date("H");

									if($t < 12){
									$mensaje = ''.$lang['message1'].'';
									}
									else if($t < 18){
									$mensaje = ''.$lang['message2'].'';
									} 
									else{
									$mensaje = ''.$lang['message3'].'';
									}
								?> 
								
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?php echo $mensaje; ?>,&nbsp;&nbsp;</h5>
                                        <span class="op-5 user-email"><?php echo $row->fname;?><br></span>
										<span class="op-5 user-email"><?php echo $lang['left37'] ?>: <strong><?php echo $row->name_off;?></strong></span>
                                    </a>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                       <li class="p-15 m-t-10"><a href="customer_list.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="ti-package"></i> <span class="hide-menu m-l-5"><?php echo $lang['left1'] ?> </span> </a></li>
                        <!-- User Profile-->
                        <li class="nav-small-cap"> <span class="hide-menu"></span></li>
						
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> <?php echo $lang['dashboard'] ?> </span></a></li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-codepen"></i><span class="hide-menu"> <?php echo $lang['left2'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_prealert.php?do=list_prealert" aria-expanded="false"><i class="mdi mdi-alert-box"></i><span class="hide-menu"> <?php echo $lang['left3'] ?> </span></a></li>								
								<li class="sidebar-item"><a href="prealert.php" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left4'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-cube-send"></i><span class="hide-menu"> <?php echo $lang['shipment'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="courier.php?do=list_courier" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['shipmentlist'] ?> </span></a></li>
								<li class="sidebar-item"><a href="customer_list.php" class="sidebar-link"><i class="mdi mdi-cube-send" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['createshipment'] ?> </span></a></li>
								<li class="sidebar-item"><a href="customerpickup_list.php" class="sidebar-link"><i class="mdi mdi-clock-fast" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['left702'] ?> </span></a></li>
								<li class="sidebar-item"><a href="pickup.php?do=create_pickup" class="sidebar-link"><i class="mdi mdi-clock-fast"></i><span class="hide-menu"> <?php echo $lang['left5'] ?> </span></a></li>																	
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="search_shipment.php" aria-expanded="false"><i class="mdi mdi-search-web"></i><span class="hide-menu"> <?php echo $lang['left16'] ?> </span></a></li>
							</ul>
                        </li>
						 
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti ti-stats-up"></i><span class="hide-menu"> <?php echo $lang['left6'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_quote.php?do=list_quote" aria-expanded="false"><i class="mdi mdi-check" style="color:#FF5C26"></i><span class="hide-menu"> <?php echo $lang['left7'] ?> </span></a></li>								
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_quotes.php?do=list_quotes" aria-expanded="false"><i class="mdi mdi-check" style="color:#FFBF00"></i><span class="hide-menu"> <?php echo $lang['left8'] ?></span></a></li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_quote_approved.php?do=list_quote_approved" aria-expanded="false"><i class="mdi mdi-check" style="color:#00B22D"></i><span class="hide-menu"> <?php echo $lang['left9'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-view-week"></i><span class="hide-menu"> <?php echo $lang['container'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="container.php?do=list_container" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['contalist'] ?> </span></a></li>
								<li class="sidebar-item"><a href="client_container.php" class="sidebar-link"><i class="mdi mdi-view-week"></i><span class="hide-menu"> <?php echo $lang['createcontainer'] ?> </span></a></li>
							</ul>
                        </li>
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti ti-gift" style="color:#6610f2"></i><span class="hide-menu"> <?php echo $lang['conso-lidate'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="consolidate_list.php" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left10'] ?> </span></a></li>
								<li class="sidebar-item"><a href="consolidate.php" class="sidebar-link"><i class="fas fa-cubes" style="color:#975EF7"></i><span class="hide-menu"> <?php echo $lang['left11'] ?> </span></a></li>
								
							</ul>
                        </li>
						
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-chess-board" style="color:#17a2b8"></i><span class="hide-menu"> <?php echo $lang['left12'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customs_news.php" aria-expanded="false"><i class="fas fas fa-box-open" style="color:#7460ee"></i><span class="hide-menu"> <?php echo $lang['left13'] ?> </span></a></li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customs_locked_packages.php" aria-expanded="false"><i class="fas fas fa-lock" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['left14'] ?> </span></a></li>
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customs_liberate_packages.php" aria-expanded="false"><i class="ti-share" style="color:#36bea6"></i><span class="hide-menu"> <?php echo $lang['left15'] ?> </span></a></li>								
							</ul>
                        </li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-multiple" style="color:#fb8c00"></i><span class="hide-menu"> <?php echo $lang['left22'] ?></span></a>
							<ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"><a href="shipping.php?do=shipment" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['all'] ?> </span></a></li>
								<li class="sidebar-item"><a href="shipping.php?do=prealert_report" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left17'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=pending" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left18'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=rejected" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left19'] ?> </span></a></li> 
								<li class="sidebar-item"><a href="shipping.php?do=delivered" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left20'] ?> </span></a></li>
								<li class="sidebar-item"><a href="shipping.php?do=delivered_consolidated" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left21'] ?> </span></a></li>								
							</ul>
						</li>		
						
						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu"> <?php echo $lang['left608'] ?></span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="customer.php?do=main_client" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"> <?php echo $lang['left23'] ?> </span></a></li>

								<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="driver.php?do=main_driver" aria-expanded="false"><i class="mdi mdi-car"></i><span class="hide-menu"> <?php echo $lang['left24'] ?></span></a></li>	
							</ul>
                        </li>

						<li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> <?php echo $lang['left35'] ?> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">                              
								<li class="sidebar-item"><a href="all_tools.php?do=main&amp;action=edit&amp;id=<?php echo $user->uid;?>" class="sidebar-link"><i class="mdi mdi-check"></i><span class="hide-menu"> <?php echo $lang['left36'] ?> </span></a></li> 
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"><?php echo $lang['wout'] ?></span></a></li>
                    </ul>
					
					<?php }else if($row->userlevel == 1){?>
						<ul id="sidebarnav">
							<!-- User Profile-->
							<li>
								<!-- User Profile-->
								<div class="user-profile d-flex no-block dropdown m-t-20">
									<div class="user-pic">
										<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="50" />
									</div>
									<?php
										date_default_timezone_set("".$core->timezone."");
										$t = date("H");

										if($t < 12){
										$mensaje = ''.$lang['message1'].'';
										}
										else if($t < 18){
										$mensaje = ''.$lang['message2'].'';
										} 
										else{
										$mensaje = ''.$lang['message3'].'';
										}
									?> 
									
									<div class="user-content hide-menu m-l-10">
										<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h5 class="m-b-0 user-name font-medium"><?php echo $mensaje; ?>,&nbsp;&nbsp;</h5>
											<span class="op-5 user-email"><?php echo $row->fname;?></span>
											<br><?php echo $lang['left38'] ?> <b><?php echo $row->locker;?></b>
										</a>
									</div>
								</div>
								<!-- End User Profile-->
							</li>


						   <li class="p-15 m-t-10"><a href="prealert.php" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="mdi mdi-book-plus"></i> <span class="hide-menu"> <?php echo $lang['left4'] ?></span> </a></li>
							<!-- User Profile-->
							<li class="nav-small-cap"> <span class="hide-menu"></span></li>
						   
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="client.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> <?php echo $lang['dashboard'] ?> </span></a></li>

							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="add_pickup_client.php" aria-expanded="false"><i class="mdi mdi-clock-fast" style="color:#f62d51"></i><span class="hide-menu"> <?php echo $lang['left509'] ?> </span></a></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="quote.php" aria-expanded="false"><i class="ti ti-stats-up" style="color:#6610f2"></i><span class="hide-menu"> <?php echo $lang['left39'] ?> </span></a></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="booking_list.php" aria-expanded="false"><i class="mdi mdi-cube-send"></i><span class="hide-menu"> <?php echo $lang['left40'] ?> </span></a></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="consolidated_list.php" aria-expanded="false"><i class="ti ti-gift"></i><span class="hide-menu"> <?php echo $lang['left41'] ?> </span></a></li>

							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="services.php" aria-expanded="false"><i class="fa fa-tasks "></i><span class="hide-menu"> My Services </span></a></li>

							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="history_quotes.php" aria-expanded="false"><i class="ti ti-archive"></i><span class="hide-menu"> <?php echo $lang['left42'] ?> </span></a></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="delivered_booking_list.php" aria-expanded="false"><i class="mdi mdi-package-variant"></i><span class="hide-menu"> <?php echo $lang['left705'] ?> </span></a></li>
						
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="user_client.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu"> <?php echo $lang['left43'] ?> </span></a></li>

							<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"></span></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"><?php echo $lang['wout'] ?></span></a></li>
						</ul>
					<?php }else if($row->userlevel == 3){ ?>
						<ul id="sidebarnav">
							<!-- User Profile-->
							<li>
								<!-- User Profile-->
								<div class="user-profile d-flex no-block dropdown m-t-20">
									<div class="user-pic">
										<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="50" />
									</div>
									<?php
										date_default_timezone_set("".$core->timezone."");
										$t = date("H");

										if($t < 12){
										$mensaje = ''.$lang['message1'].'';
										}
										else if($t < 18){
										$mensaje = ''.$lang['message2'].'';
										} 
										else{
										$mensaje = ''.$lang['message3'].'';
										}
									?> 
									
									<div class="user-content hide-menu m-l-10">
										<a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<h5 class="m-b-0 user-name font-medium"><?php echo $mensaje; ?>,&nbsp;&nbsp;</h5>
											<span class="op-5 user-email"><?php echo $row->fname;?></span>
										</a>
									</div>
								</div>
								<!-- End User Profile-->
							</li>
						   
							<li class="nav-small-cap"> <span class="hide-menu"></span></li>
						   
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dash_driver.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> <?php echo $lang['dashboard'] ?> </span></a></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="collected_list.php" aria-expanded="false"><i class="ti ti-timer"></i><span class="hide-menu"> <?php echo $lang['left44'] ?> </span></a></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="history_list.php" aria-expanded="false"><i class="ti ti-archive"></i><span class="hide-menu"> <?php echo $lang['left45'] ?> </span></a></li>
							
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="user_driver.php" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu"> <?php echo $lang['left36'] ?> </span></a></li>

							<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu"></span></li>
							
							<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../logout.php" aria-expanded="false"><i class="fa fa-power-off m-r-5 m-l-5"></i><span class="hide-menu"> <?php echo $lang['wout'] ?></span></a></li>
						</ul>
					<?php } ?>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
	