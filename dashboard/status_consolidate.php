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
  
  if (!$user->is_Admin())
      redirect_to("login.php");
	
	$row = $user->getUserData();
	
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
    <title><?php echo $lang['status-ship1'] ?> | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

</head>

<body>

    <div id="main-wrapper">
		<!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        
		<?php include 'preloader.php'; ?>
		
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
		
        <?php include 'topbar.php'; ?>
		
        <!-- End Topbar header -->

		
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
 
		<?php include 'left_sidebar.php'; ?>
	

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
		
		<!-- General queries to the database  -->		   

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php include("filter.php");?></h4>
                    </div>
                </div>
				<?php include 'templates/head_courier.php'; ?>
            </div>
			<?php $office = $core->getOffices(); ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
				<!-- Edit Shipment -->
				<?php switch(Filter::$action): case "status_cons": ?>
				<?php $row = Core::getRowById(Core::consolTable, Filter::$id);?>
				<?php $statusrow = $core->getStatus(); ?>
				<div class="row justify-content-center">
					<!-- Column -->
					<div class="col-sm-12 col-lg-8">
						<div class="card">
							<div class="card-body">
								<div id="loader" style="display:none"></div>
								<div id="msgholder"></div>
								<form class="xform" id="admin_form" method="post">
									<header><h4 class="modal-title"><?php echo $lang['status-ship2'] ?> <?php echo $row->order_inv;?> </h4> <?php echo $lang['status-ship3'] ?> <?php echo $row->r_dest;?></header>
									<div class="row" style="display:none"> 									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label">Tracking</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="order_track" Value="<?php echo $row->order_inv;?>">
											</div>
										</div>

										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label">Id</label>
											<div class="input-group mb-3">
												<input class="form-control" name="t_id" Value="<?php echo $row->id;?>">
											</div>
										</div>
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label">Phone</label>
											<div class="input-group mb-3">
												<input class="form-control" name="rc_phone" Value="<?php echo $row->r_phone;?>">
											</div>
										</div>
									</div>
							
									<div class="row"> 									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['status-ship4'] ?> </label>
											<div class="input-group mb-3">
												<input type="text" class="form-control"  name="t_dest" placeholder="Select Country" list="browsers" autocomplete="off" required="required">
												<datalist id="browsers">
													<option value="United States">United States</option> 
													<option value="United Kingdom">United Kingdom</option> 
													<option value="Afghanistan">Afghanistan</option> 
													<option value="Albania">Albania</option> 
													<option value="Algeria">Algeria</option> 
													<option value="American Samoa">American Samoa</option> 
													<option value="Andorra">Andorra</option> 
													<option value="Angola">Angola</option> 
													<option value="Anguilla">Anguilla</option> 
													<option value="Antarctica">Antarctica</option> 
													<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
													<option value="Argentina">Argentina</option> 
													<option value="Armenia">Armenia</option> 
													<option value="Aruba">Aruba</option> 
													<option value="Australia">Australia</option> 
													<option value="Austria">Austria</option> 
													<option value="Azerbaijan">Azerbaijan</option> 
													<option value="Bahamas">Bahamas</option> 
													<option value="Bahrain">Bahrain</option> 
													<option value="Bangladesh">Bangladesh</option> 
													<option value="Barbados">Barbados</option> 
													<option value="Belarus">Belarus</option> 
													<option value="Belgium">Belgium</option> 
													<option value="Belize">Belize</option> 
													<option value="Benin">Benin</option> 
													<option value="Bermuda">Bermuda</option> 
													<option value="Bhutan">Bhutan</option> 
													<option value="Bolivia">Bolivia</option> 
													<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
													<option value="Botswana">Botswana</option> 
													<option value="Bouvet Island">Bouvet Island</option> 
													<option value="Brazil">Brazil</option> 
													<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
													<option value="Brunei Darussalam">Brunei Darussalam</option> 
													<option value="Bulgaria">Bulgaria</option> 
													<option value="Burkina Faso">Burkina Faso</option> 
													<option value="Burundi">Burundi</option> 
													<option value="Cambodia">Cambodia</option> 
													<option value="Cameroon">Cameroon</option> 
													<option value="Canada">Canada</option> 
													<option value="Cape Verde">Cape Verde</option> 
													<option value="Cayman Islands">Cayman Islands</option> 
													<option value="Central African Republic">Central African Republic</option> 
													<option value="Chad">Chad</option> 
													<option value="Chile">Chile</option> 
													<option value="China">China</option> 
													<option value="Christmas Island">Christmas Island</option> 
													<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
													<option value="Colombia">Colombia</option> 
													<option value="Comoros">Comoros</option> 
													<option value="Congo">Congo</option> 
													<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
													<option value="Cook Islands">Cook Islands</option> 
													<option value="Costa Rica">Costa Rica</option> 
													<option value="Cote D'ivoire">Cote D'ivoire</option> 
													<option value="Croatia">Croatia</option> 
													<option value="Cuba">Cuba</option> 
													<option value="Cyprus">Cyprus</option> 
													<option value="Czech Republic">Czech Republic</option> 
													<option value="Denmark">Denmark</option> 
													<option value="Djibouti">Djibouti</option> 
													<option value="Dominica">Dominica</option> 
													<option value="Dominican Republic">Dominican Republic</option> 
													<option value="Ecuador">Ecuador</option> 
													<option value="Egypt">Egypt</option> 
													<option value="El Salvador">El Salvador</option> 
													<option value="Equatorial Guinea">Equatorial Guinea</option> 
													<option value="Eritrea">Eritrea</option> 
													<option value="Estonia">Estonia</option> 
													<option value="Ethiopia">Ethiopia</option> 
													<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
													<option value="Faroe Islands">Faroe Islands</option> 
													<option value="Fiji">Fiji</option> 
													<option value="Finland">Finland</option> 
													<option value="France">France</option> 
													<option value="French Guiana">French Guiana</option> 
													<option value="French Polynesia">French Polynesia</option> 
													<option value="French Southern Territories">French Southern Territories</option> 
													<option value="Gabon">Gabon</option> 
													<option value="Gambia">Gambia</option> 
													<option value="Georgia">Georgia</option> 
													<option value="Germany">Germany</option> 
													<option value="Ghana">Ghana</option> 
													<option value="Gibraltar">Gibraltar</option> 
													<option value="Greece">Greece</option> 
													<option value="Greenland">Greenland</option> 
													<option value="Grenada">Grenada</option> 
													<option value="Guadeloupe">Guadeloupe</option> 
													<option value="Guam">Guam</option> 
													<option value="Guatemala">Guatemala</option> 
													<option value="Guinea">Guinea</option> 
													<option value="Guinea-bissau">Guinea-bissau</option> 
													<option value="Guyana">Guyana</option> 
													<option value="Haiti">Haiti</option> 
													<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
													<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
													<option value="Honduras">Honduras</option> 
													<option value="Hong Kong">Hong Kong</option> 
													<option value="Hungary">Hungary</option> 
													<option value="Iceland">Iceland</option> 
													<option value="India">India</option> 
													<option value="Indonesia">Indonesia</option> 
													<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
													<option value="Iraq">Iraq</option> 
													<option value="Ireland">Ireland</option> 
													<option value="Israel">Israel</option> 
													<option value="Italy">Italy</option> 
													<option value="Jamaica">Jamaica</option> 
													<option value="Japan">Japan</option> 
													<option value="Jordan">Jordan</option> 
													<option value="Kazakhstan">Kazakhstan</option> 
													<option value="Kenya">Kenya</option> 
													<option value="Kiribati">Kiribati</option> 
													<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
													<option value="Korea, Republic of">Korea, Republic of</option> 
													<option value="Kuwait">Kuwait</option> 
													<option value="Kyrgyzstan">Kyrgyzstan</option> 
													<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
													<option value="Latvia">Latvia</option> 
													<option value="Lebanon">Lebanon</option> 
													<option value="Lesotho">Lesotho</option> 
													<option value="Liberia">Liberia</option> 
													<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
													<option value="Liechtenstein">Liechtenstein</option> 
													<option value="Lithuania">Lithuania</option> 
													<option value="Luxembourg">Luxembourg</option> 
													<option value="Macao">Macao</option> 
													<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
													<option value="Madagascar">Madagascar</option> 
													<option value="Malawi">Malawi</option> 
													<option value="Malaysia">Malaysia</option> 
													<option value="Maldives">Maldives</option> 
													<option value="Mali">Mali</option> 
													<option value="Malta">Malta</option> 
													<option value="Marshall Islands">Marshall Islands</option> 
													<option value="Martinique">Martinique</option> 
													<option value="Mauritania">Mauritania</option> 
													<option value="Mauritius">Mauritius</option> 
													<option value="Mayotte">Mayotte</option> 
													<option value="Mexico">Mexico</option> 
													<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
													<option value="Moldova, Republic of">Moldova, Republic of</option> 
													<option value="Monaco">Monaco</option> 
													<option value="Mongolia">Mongolia</option> 
													<option value="Montserrat">Montserrat</option> 
													<option value="Morocco">Morocco</option> 
													<option value="Mozambique">Mozambique</option> 
													<option value="Myanmar">Myanmar</option> 
													<option value="Namibia">Namibia</option> 
													<option value="Nauru">Nauru</option> 
													<option value="Nepal">Nepal</option> 
													<option value="Netherlands">Netherlands</option> 
													<option value="Netherlands Antilles">Netherlands Antilles</option> 
													<option value="New Caledonia">New Caledonia</option> 
													<option value="New Zealand">New Zealand</option> 
													<option value="Nicaragua">Nicaragua</option> 
													<option value="Niger">Niger</option> 
													<option value="Nigeria">Nigeria</option> 
													<option value="Niue">Niue</option> 
													<option value="Norfolk Island">Norfolk Island</option> 
													<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
													<option value="Norway">Norway</option> 
													<option value="Oman">Oman</option> 
													<option value="Pakistan">Pakistan</option> 
													<option value="Palau">Palau</option> 
													<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
													<option value="Panama">Panama</option> 
													<option value="Papua New Guinea">Papua New Guinea</option> 
													<option value="Paraguay">Paraguay</option> 
													<option value="Peru">Peru</option> 
													<option value="Philippines">Philippines</option> 
													<option value="Pitcairn">Pitcairn</option> 
													<option value="Poland">Poland</option> 
													<option value="Portugal">Portugal</option> 
													<option value="Puerto Rico">Puerto Rico</option> 
													<option value="Qatar">Qatar</option> 
													<option value="Reunion">Reunion</option> 
													<option value="Romania">Romania</option> 
													<option value="Russian Federation">Russian Federation</option> 
													<option value="Rwanda">Rwanda</option> 
													<option value="Saint Helena">Saint Helena</option> 
													<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
													<option value="Saint Lucia">Saint Lucia</option> 
													<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
													<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
													<option value="Samoa">Samoa</option> 
													<option value="San Marino">San Marino</option> 
													<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
													<option value="Saudi Arabia">Saudi Arabia</option> 
													<option value="Senegal">Senegal</option> 
													<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
													<option value="Seychelles">Seychelles</option> 
													<option value="Sierra Leone">Sierra Leone</option> 
													<option value="Singapore">Singapore</option> 
													<option value="Slovakia">Slovakia</option> 
													<option value="Slovenia">Slovenia</option> 
													<option value="Solomon Islands">Solomon Islands</option> 
													<option value="Somalia">Somalia</option> 
													<option value="South Africa">South Africa</option> 
													<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
													<option value="Spain">Spain</option> 
													<option value="Sri Lanka">Sri Lanka</option> 
													<option value="Sudan">Sudan</option> 
													<option value="Suriname">Suriname</option> 
													<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
													<option value="Swaziland">Swaziland</option> 
													<option value="Sweden">Sweden</option> 
													<option value="Switzerland">Switzerland</option> 
													<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
													<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
													<option value="Tajikistan">Tajikistan</option> 
													<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
													<option value="Thailand">Thailand</option> 
													<option value="Timor-leste">Timor-leste</option> 
													<option value="Togo">Togo</option> 
													<option value="Tokelau">Tokelau</option> 
													<option value="Tonga">Tonga</option> 
													<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
													<option value="Tunisia">Tunisia</option> 
													<option value="Turkey">Turkey</option> 
													<option value="Turkmenistan">Turkmenistan</option> 
													<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
													<option value="Tuvalu">Tuvalu</option> 
													<option value="Uganda">Uganda</option> 
													<option value="Ukraine">Ukraine</option> 
													<option value="United Arab Emirates">United Arab Emirates</option> 
													<option value="United Kingdom">United Kingdom</option> 
													<option value="United States">United States</option> 
													<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
													<option value="Uruguay">Uruguay</option> 
													<option value="Uzbekistan">Uzbekistan</option> 
													<option value="Vanuatu">Vanuatu</option> 
													<option value="Venezuela">Venezuela</option> 
													<option value="Viet Nam">Viet Nam</option> 
													<option value="Virgin Islands, British">Virgin Islands, British</option> 
													<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
													<option value="Wallis and Futuna">Wallis and Futuna</option> 
													<option value="Western Sahara">Western Sahara</option> 
													<option value="Yemen">Yemen</option> 
													<option value="Zambia">Zambia</option> 
													<option value="Zimbabwe">Zimbabwe</option>
												</datalist>
											</div>
										</div>

										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['status-ship5'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ti-direction"></i></span>
												</div>
												<input type="text" class="form-control" id="search_location" placeholder="Search address in google" required>
											</div>
										</div>
									</div>
									<div class="row"> 																	
										<div class="col-sm-12 col-md-12">
											<div class="form-group">											
												<!-- display google map -->
												<div id="geomap" style="height: 150px"></div>
											</div>
										</div>
									</div>
									
									<div class="row"> 									
										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['status-ship6'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<span style="color:#ff0000" class="ti-calendar"></span>
													</span>
												</div>
												<input type="text" class="form-control" id="datepicker-autoclose" name="t_date"placeholder="mm/dd/yyyy" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>">
											</div>
										</div>

										<div class="col-sm-12 col-md-6">
											<label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['status-ship7'] ?></label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="ti-timer"></i></span>
												</div>
												<input class="form-control" name="t_hour" value="<?php date_default_timezone_set("".$core->timezone.""); echo "" . date("h:i:sa"); ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12 col-md-6">
											<label for="message-text" class="control-label"><?php echo $lang['status-ship8'] ?></label>
											<textarea class="form-control" placeholder="Details of change status...." id="message-text" name="comments"></textarea>
										</div>
										<div class="col-sm-12 col-md-3">
											<div class="form-group"> 
												<label for="inputcontact" class="control-label col-form-label">Código oficina</label> 
												<select class="form-control" name="code_offnew" list="browsee" autocomplete="off">
													<?php foreach ($office as $row):?>
														<option value="<?php echo $row->code_off; ?>"><?php echo $row->code_off; ?></option>
													<?php endforeach;?>
												</select>													
											</div> 
										</div> 
										<div class="col-sm-12 col-md-3">
											<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['status-ship9'] ?> <i style="color:#ff0000" class="fas fa-shipping-fast"></i></label>
											<div class="input-group mb-3">
												<select class="form-control" name="status_courier" list="browser" autocomplete="off">
													<?php foreach ($statusrow as $row):?>
													<?php if($row->mod_style == 'Delivered'){?>
													<?php }elseif($row->mod_style == 'Pending'){?>
													<?php }elseif($row->mod_style == 'Rejected'){?>
													<?php }else{ ?>
													<option value="<?php echo $row->mod_style; ?>"><?php echo $row->mod_style; ?></option>
													<?php } ?>
													<?php endforeach;?>
												</select>
											</div>
										</div>
									</div>
									</br>
									<footer>
										<input type="hidden" name="t_city" class="search_addr">
										<input type="hidden" name="latitude_history" class="search_latitude">
										<input type="hidden" name="longitude_history" class="search_longitude">
										<button class="button" name="dosubmit" type="submit"><?php echo $lang['status-ship10'] ?><span><i class="ti-briefcase"></i></span></button>
										<a href="consolidate_list.php" class="button button-secondary"><span><i class="ti-share-alt"></i></span> <?php echo $lang['status-ship11'] ?></a> 
									</footer>
								</form>
							</div>
						</div>
					</div>
					<!-- Column -->
				</div>
                <!-- End row -->
            </div>
			<?php echo Core::doForm("processStatusConsolidates");?> 
			<?php break;?>
			<?php endswitch;?>
			
			<!-- footer -->

			<?php include 'templates/footer_statusconsolidate.php'; ?>