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
  

  
  if (!$user->logged_in)
  redirect_to("login.php");
  
	$row = $user->getUserData();
	$rowS = $user->getUserData();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Courier DEPRIXA-Integral Web System" />
	<meta name="author" content="Jaomweb">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../uploads/favicon.png">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <title><?php echo $lang['left267'] ?> | <?php echo $core->site_name ?></title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	<link href="assets/css/quotes.css" rel="stylesheet">
	<link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	
	<link href="<?php SITEURL ?>dist/assets/css_log/front.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php SITEURL ?>dist/assets/jquery-ui.css" type="text/css" />
	<script type="text/javascript" src="<?php SITEURL ?>dist/assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php SITEURL ?>dist/assets/js/jquery-ui.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/jquery.ui.touch-punch.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/jquery.wysiwyg.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/global.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/custom.js"></script>
	<script src="<?php SITEURL ?>dist/assets/js/modernizr.mq.js" type="text/javascript" ></script>
	<script src="<?php SITEURL ?>dist/assets/js/checkbox.js"></script>
	<link href="<?php SITEURL ?>dist/css/style.min.css" rel="stylesheet">
	

	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>

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

        <!-- Page wrapper  -->

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php echo $lang['dashboard'] ?></h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
			<!-- ============================================================== -->


				<?php include 'templates/head_tab.php'; ?>			


				<!-- ============================================================== -->
				
				<?php switch(Filter::$action): case "edit": ?>
				<?php  $row = Core::getRowById(Core::cQuote, Filter::$id);?>
				<div class="row">					
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							<?php if($rowS->userlevel == 9){?>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
									<div id="msgholder"></div>
									<div id="loader" style="display:none"></div>
                                        <form id="admin_form" method="post">
											<!-- service-form -->
											<div class="service-form">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10 ">
														<h3><?php echo $lang['left268'] ?> 
														<?php 
														 $querya = $db->query("SELECT * FROM users WHERE username = '".$row->username."'");
															 $rowa = mysqli_fetch_array($querya);
															 $fn = $rowa['fname'];
															 $ln = $rowa['lname'];
														?> 
														<span style="color:#6610f2"><?php echo $fn;?> <?php echo $ln;?> </span>
														</h3><br> <?php echo $lang['left269'] ?> <strong><?php echo $row->order_quote;?></strong> | <?php echo $lang['left270'] ?> <strong><?php echo $row->status_quote;?></strong>
													</div>
													
													<div class="col-sm-12 col-lg-6" style="display:none">
														<div class="card">
															<div class="card-body">
																<h4 class="card-title">Sender Data:</h4>
																<hr>
																<div class="col-sm-12 col-md-6" style="display:none">
																	<div class="form-group">
																		<label for="inputname" class="control-label col-form-label">Staff Role*</label>
																		<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
																	</div>
																</div>	
																<div class="row">
																	<div class="col-sm-12 col-md-4">
																		<div class="form-group">
																			<label for="inputname" class="control-label col-form-label">User Name</label>
																			<input type="text" class="form-control is-valid" name="username" value="<?php echo $row->username;?>" placeholder="<?php echo $lang['create-booking2'] ?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12 col-md-4">
																		<div class="form-group">
																			<label for="inputname" class="control-label col-form-label">Locker</label>
																			<input type="text" class="form-control is-valid" name="locker" value="<?php echo $row->locker;?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12 col-md-6">
																		<div class="form-group">
																			<label for="inputname" class="control-label col-form-label">Sender Name</label>
																			<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $row->s_name;?>" placeholder="<?php echo $lang['create-booking3'] ?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12 col-md-6">
																		<div class="form-group">
																			<label for="inputEmail3" class="control-label col-form-label">Addres</label>
																			<input type="text" class="form-control is-valid" name="address" value="<?php echo $row->address;?>" placeholder="Address">
																		</div>
																	</div>
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputcontact" class="control-label col-form-label">Phone</label>
																			<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->code_phone;?><?php echo $row->phone;?>" placeholder="Phone">
																		</div>
																	</div>
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputEmail3" class="control-label col-form-label">Origin</label>
																			<input type="text" class="form-control is-valid" name="country" value="<?php echo $row->country;?>" placeholder="Origin">
																		</div>
																	</div>                                       
																</div>
																<div class="row"> 
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputcontact" class="control-label col-form-label">City</label>
																			<input type="text" class="form-control is-valid" name="city" value="<?php echo $row->city;?>" placeholder="City">
																		</div>
																	</div>
																
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
																			<input type="text" class="form-control is-valid" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left271'] ?></label>
															<input type="text"  class="form-control" value="<?php echo $row->s_name;?>" placeholder="<?php echo $lang['left272'] ?>" readonly required>
															<div class="form-icon"><i class="fa fa-user"></i></div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left273'] ?></label>
															<input type="email" class="form-control" name="email" value="<?php echo $row->email;?>" placeholder="<?php echo $lang['left273'] ?>" readonly required>
															<div class="form-icon"><i class="fa fa-envelope"></i></div>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo "<a href='".$row->url_product."' target=\"_blank\"><img src='./assets/images/alert/url.png' height='20' width='44'></a>" ; ?>    <?php echo $lang['left274'] ?></label>
															<input type="text" class="form-control" name="url_product"  value="<?php echo $row->url_product;?>" placeholder="Website URL" required>
															<div class="form-icon"><i class="fa fa-link"></i></div>
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left276'] ?></label>
															<div class="select">
																<input type="text" class="form-control" name="r_dest" value="<?php echo $row->r_dest;?>" placeholder="-- <?php echo $lang['left277'] ?> --" list="browsers01" autocomplete="off" required>
																<datalist id="browsers01">
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
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left278'] ?></label>
															<input type="text" class="form-control" name="r_city" value="<?php echo $row->r_city;?>" placeholder="<?php echo $lang['left279'] ?>" required>
															<div class="form-icon"><i class="fa fa-map-marker"></i></div>
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left280'] ?></label>
															<input type="text" class="form-control" name="r_phone" value="<?php echo $row->r_phone;?>" placeholder="<?php echo $lang['left281'] ?>" required>
															<div class="form-icon"><i class="fa fa-phone"></i></div>
														</div>
													</div>

													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left282'] ?></label>
															<div class="select">
																<input class="form-control" name="your_purchase" value="<?php echo $row->your_purchase;?>" placeholder="-- <?php echo $lang['left283'] ?> --" list="browsers02" autocomplete="off">
																<datalist id="browsers02">
																	<option value="<?php echo $lang['left284'] ?>"><?php echo $lang['left284'] ?></option>
																	<option value="<?php echo $lang['left285'] ?>"><?php echo $lang['left285'] ?></option>
																</datalist>
															</div>
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left286'] ?></label>
															<div class="select">
																<input class="form-control" name="your_quote" value="<?php echo $row->your_quote;?>" placeholder="-- <?php echo $lang['left287'] ?> --" list="browsers03" autocomplete="off">
																<datalist id="browsers03">
																	<option value="<?php echo $lang['left288'] ?>"><?php echo $lang['left288'] ?></option>
																	<option value="<?php echo $lang['left289'] ?>"><?php echo $lang['left289'] ?></option>
																</datalist>
															</div>
														</div>
														<input type="hidden" name="idquote" value="2">
														<input type="hidden" name="status_quote" value="Pending">
														<input type="hidden" name="order_quote" value="<?php echo $row->order_quote;?>">
													</div>
													
												</div>
											</div>
										
                                    </div>
									
									<div class="col-sm-12 col-md-6">
                                        <div class="">
											<div class="feature-description">
												<h2><?php echo $lang['left290'] ?></h2>
												<br><br><hr>
												<!-- feature-left -->
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left291'] ?></label>
															<input type="text"  class="form-control" name="name_product" value="<?php echo $row->name_product;?>" placeholder="<?php echo $lang['left292'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left293'] ?></label>
															<input type="number"  class="form-control" name="quantity" value="<?php echo $row->quantity;?>" placeholder="<?php echo $lang['left294'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left295'] ?></label>
															<input type="number"  class="form-control" name="weight_product" value="<?php echo $row->weight_product;?>" placeholder="<?php echo $lang['left296'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left297'] ?></label>
															<input type="number" class="form-control" name="price_product" value="<?php echo $row->price_product;?>" placeholder="<?php echo $lang['left298'] ?>" required>
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left299'] ?></label>
															<input type="text"  class="form-control" name="customs_tax" value="<?php echo $core->tax;?>" placeholder="<?php echo $lang['left300'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left301'] ?></label>
															<input type="text" class="form-control" name="freight" value="<?php echo $core->insurance;?>" placeholder="<?php echo $lang['left302'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left303'] ?></label>
															<input type="text" class="form-control" name="handling" value="<?php echo $core->c_handling;?>" placeholder="<?php echo $lang['left304'] ?>" required>
														</div>
													</div>
													<br><br>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left305'] ?> (<strong><?php echo $core->currency;?></strong>)</label>
															<input type="text" class="form-control" name="r_costotal" value="<?php echo $row->r_costotal;?>" placeholder="<?php echo $lang['left306'] ?>" required>
														</div>
													</div>
													<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
													<br>
													<?php if($row->status_quote == 'Approved'){ ?>
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
															<p><b><?php echo $lang['left307'] ?></b></p>
														</div>
													<?php }else { ?>
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
															<button type="submit" name="doupdate" class="btn btn-default btn-block mb10"><?php echo $lang['left308'] ?></button>
															<p><small></small></p>
														</div>
													<?php } ?>
												</div>	
												<!-- /.feature-left -->												
											</div>
											
										</div>
										</form>
										<!-- /.service-form -->
										<?php echo Core::doForm("processQuote");?>
                                    </div>
                                </div>

								<?php }else if($rowS->userlevel == 2){?>

								<div class="row">
                                    <div class="col-sm-12 col-md-6">
									<div id="msgholder"></div>
									<div id="loader" style="display:none"></div>
                                        <form id="admin_form" method="post">
											<!-- service-form -->
											<div class="service-form">
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb10 ">
														<h3><?php echo $lang['left268'] ?> 
														<?php 
														 $querya = $db->query("SELECT * FROM users WHERE username = '".$row->username."'");
															 $rowa = mysqli_fetch_array($querya);
															 $fn = $rowa['fname'];
															 $ln = $rowa['lname'];
														?> 
														<span style="color:#6610f2"><?php echo $fn;?> <?php echo $ln;?> </span>
														</h3><br> <?php echo $lang['left269'] ?> <strong><?php echo $row->order_quote;?></strong> | <?php echo $lang['left270'] ?> <strong><?php echo $row->status_quote;?></strong>
													</div>
													
													<div class="col-sm-12 col-lg-6" style="display:none">
														<div class="card">
															<div class="card-body">
																<h4 class="card-title">Sender Data:</h4>
																<hr>
																<div class="col-sm-12 col-md-6" style="display:none">
																	<div class="form-group">
																		<label for="inputname" class="control-label col-form-label">Staff Role*</label>
																		<input type="text" class="form-control" name="level" value="<?php echo $user->username; ?>" placeholder="Staff Role" >
																	</div>
																</div>	
																<div class="row">
																	<div class="col-sm-12 col-md-4">
																		<div class="form-group">
																			<label for="inputname" class="control-label col-form-label">User Name</label>
																			<input type="text" class="form-control is-valid" name="username" value="<?php echo $row->username;?>" placeholder="<?php echo $lang['create-booking2'] ?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12 col-md-4">
																		<div class="form-group">
																			<label for="inputname" class="control-label col-form-label">Locker</label>
																			<input type="text" class="form-control is-valid" name="locker" value="<?php echo $row->locker;?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12 col-md-6">
																		<div class="form-group">
																			<label for="inputname" class="control-label col-form-label">Sender Name</label>
																			<input type="text" class="form-control is-valid" name="s_name" value="<?php echo $row->s_name;?>" placeholder="<?php echo $lang['create-booking3'] ?>" readonly>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-sm-12 col-md-6">
																		<div class="form-group">
																			<label for="inputEmail3" class="control-label col-form-label">Addres</label>
																			<input type="text" class="form-control is-valid" name="address" value="<?php echo $row->address;?>" placeholder="Address">
																		</div>
																	</div>
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputcontact" class="control-label col-form-label">Phone</label>
																			<input type="number" class="form-control is-valid" name="phone" value="<?php echo $row->code_phone;?><?php echo $row->phone;?>" placeholder="Phone">
																		</div>
																	</div>
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputEmail3" class="control-label col-form-label">Origin</label>
																			<input type="text" class="form-control is-valid" name="country" value="<?php echo $row->country;?>" placeholder="Origin">
																		</div>
																	</div>                                       
																</div>
																<div class="row"> 
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputcontact" class="control-label col-form-label">City</label>
																			<input type="text" class="form-control is-valid" name="city" value="<?php echo $row->city;?>" placeholder="City">
																		</div>
																	</div>
																
																	<div class="col-sm-12 col-md-3">
																		<div class="form-group">
																			<label for="inputEmail3" class="control-label col-form-label">Postal Code</label>
																			<input type="text" class="form-control is-valid" name="postal" value="<?php echo $row->postal;?>" placeholder="Postal Code">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left271'] ?></label>
															<input type="text"  class="form-control" value="<?php echo $row->s_name;?>" placeholder="<?php echo $lang['left272'] ?>" readonly required>
															<div class="form-icon"><i class="fa fa-user"></i></div>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left273'] ?></label>
															<input type="email" class="form-control" name="email" value="<?php echo $row->email;?>" placeholder="<?php echo $lang['left274'] ?>" readonly required>
															<div class="form-icon"><i class="fa fa-envelope"></i></div>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo "<a href='".$row->url_product."' target=\"_blank\"><img src='./assets/images/alert/url.png' height='20' width='44'></a>" ; ?>    <?php echo $lang['left275'] ?></label>
															<input type="text" class="form-control" name="url_product"  value="<?php echo $row->url_product;?>" placeholder="Website URL" required>
															<div class="form-icon"><i class="fa fa-link"></i></div>
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left276'] ?></label>
															<div class="select">
																<input type="text" class="form-control" name="r_dest" value="<?php echo $row->r_dest;?>" placeholder="-- <?php echo $lang['left277'] ?> --" list="browsers01" autocomplete="off" required>
																<datalist id="browsers01">
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
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left278'] ?></label>
															<input type="text" class="form-control" name="r_city" value="<?php echo $row->r_city;?>" placeholder="<?php echo $lang['left279'] ?>" required>
															<div class="form-icon"><i class="fa fa-map-marker"></i></div>
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left280'] ?></label>
															<input type="text" class="form-control" name="r_phone" value="<?php echo $row->r_phone;?>" placeholder="<?php echo $lang['left281'] ?>" required>
															<div class="form-icon"><i class="fa fa-phone"></i></div>
														</div>
													</div>

													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left282'] ?></label>
															<div class="select">
																<input class="form-control" name="your_purchase" value="<?php echo $row->your_purchase;?>" placeholder="-- <?php echo $lang['left283'] ?> --" list="browsers02" autocomplete="off">
																<datalist id="browsers02">
																	<option value="<?php echo $lang['left284'] ?>"><?php echo $lang['left284'] ?></option>
																	<option value="<?php echo $lang['left285'] ?>"><?php echo $lang['left285'] ?></option>
																</datalist>
															</div>
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
														<div class="form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left286'] ?></label>
															<div class="select">
																<input class="form-control" name="your_quote" value="<?php echo $row->your_quote;?>" placeholder="-- <?php echo $lang['left287'] ?> --" list="browsers03" autocomplete="off">
																<datalist id="browsers03">
																	<option value="<?php echo $lang['left288'] ?>"><?php echo $lang['left288'] ?></option>
																	<option value="<?php echo $lang['left289'] ?>"><?php echo $lang['left289'] ?></option>
																</datalist>
															</div>
														</div>
														<input type="hidden" name="idquote" value="2">
														<input type="hidden" name="status_quote" value="Pending">
														<input type="hidden" name="order_quote" value="<?php echo $row->order_quote;?>">
													</div>
													
												</div>
											</div>
										
                                    </div>
									
									<div class="col-sm-12 col-md-6">
                                        <div class="">
											<div class="feature-description">
												<h2><?php echo $lang['left290'] ?></h2>
												<br><br><hr>
												<!-- feature-left -->
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left291'] ?></label>
															<input type="text"  class="form-control" name="name_product" value="<?php echo $row->name_product;?>" placeholder="<?php echo $lang['left292'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left293'] ?></label>
															<input type="number"  class="form-control" name="quantity" value="<?php echo $row->quantity;?>" placeholder="<?php echo $lang['left293'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left294'] ?></label>
															<input type="number"  class="form-control" name="weight_product" value="<?php echo $row->weight_product;?>" placeholder="<?php echo $lang['left294'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left297'] ?></label>
															<input type="number" class="form-control" name="price_product" value="<?php echo $row->price_product;?>" placeholder="<?php echo $lang['left298'] ?>" required>
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left299'] ?></label>
															<input type="text"  class="form-control" name="customs_tax" value="<?php echo $core->tax;?>" placeholder="<?php echo $lang['left300'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left301'] ?></label>
															<input type="text" class="form-control" name="freight" value="<?php echo $core->insurance;?>" placeholder="<?php echo $lang['left302'] ?>" required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left303'] ?></label>
															<input type="text" class="form-control" name="handling" value="<?php echo $core->c_handling;?>" placeholder="<?php echo $lang['left304'] ?>" required>
														</div>
													</div>
													<br><br>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left305'] ?> (<strong><?php echo $core->currency;?></strong>)</label>
															<input type="text" class="form-control" name="r_costotal" value="<?php echo $row->r_costotal;?>" placeholder="<?php echo $lang['left306'] ?>" required>
														</div>
													</div>
													<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
													<br>
													<?php if($row->status_quote == 'Approved'){ ?>
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
															<p><b><?php echo $lang['left307'] ?></b></p>
														</div>
													<?php }else { ?>
														<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
															<button type="submit" name="doupdate" class="btn btn-default btn-block mb10"><?php echo $lang['left308'] ?></button>
															<p><small></small></p>
														</div>
													<?php } ?>
												</div>	
												<!-- /.feature-left -->												
											</div>
											
										</div>
										</form>
										<!-- /.service-form -->
										<?php echo Core::doForm("processQuote");?>
                                    </div>
                                </div>

								<?php }else if($rowS->userlevel == 1){?>
								
								<div class="row">
									<form id="admin_form" method="post">
										<div class="col-sm-12 col-md-6">
											<div id="msgholder"></div>
											<div id="loader" style="display:none"></div>
											<div class="feature-description">
												<h2><?php echo $lang['left309'] ?></h2>
												<br><br><hr>
												<!-- feature-left -->
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left291'] ?></label>
															<input type="text"  class="form-control" name="name_product" value="<?php echo $row->name_product;?>" placeholder="<?php echo $lang['left292'] ?>" readonly required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left293'] ?></label>
															<input type="number"  class="form-control" name="quantity" value="<?php echo $row->quantity;?>" placeholder="<?php echo $lang['left294'] ?>" readonly required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left295'] ?></label>
															<input type="number"  class="form-control" name="weight_product" value="<?php echo $row->weight_product;?>" placeholder="<?php echo $lang['left296'] ?>" readonly required>
														</div>
													</div>
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left297'] ?></label>
															<input type="number" class="form-control" name="price_product" value="<?php echo $row->price_product;?>" placeholder="P<?php echo $lang['left298'] ?>" readonly required>
														</div>
													</div>
													
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left299'] ?></label>
															<input type="text"  class="form-control" name="customs_tax" value="<?php echo $row->customs_tax;?>" placeholder="<?php echo $lang['left300'] ?>" readonly required>
														</div>
													</div>
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left301'] ?></label>
															<input type="text" class="form-control" name="freight" value="<?php echo $row->freight;?>" placeholder="<?php echo $lang['left302'] ?>" readonly required>
														</div>
													</div>
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left303'] ?></label>
															<input type="text" class="form-control" name="handling" value="<?php echo $row->handling;?>" placeholder="<?php echo $lang['left304'] ?>" readonly required>
														</div>
													</div>
													<br><br>
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left305'] ?> (<strong><?php echo $core->currency;?></strong>)</label>
															<input type="text" class="form-control" name="r_costotal" value="<?php echo $row->r_costotal;?>" placeholder="<?php echo $lang['left306'] ?>" readonly required>
														</div>
													</div>
												</div>	
												<!-- /.feature-left -->												
											</div>
										</div>
										
										
										<div class="col-sm-12 col-md-6">
											<div class="feature-description">
												<!-- feature-left -->
												<div class="row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left310'] ?></label>
															<input type="text"  class="form-control" name="r_name" value="<?php echo $row->r_name;?>" placeholder="<?php echo $lang['left311'] ?>" required>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														<label for="inputlname" class="control-label col-form-label"><?php echo $lang['add-title6'] ?></label>
														<div class="input-group mb-3">
															<input type="text" class="form-control" id="search_location" value="<?php echo $row->r_address;?>" placeholder="<?php echo $lang['left312'] ?>" required>
															<div class="input-group-prepend">
																<span class="input-group-text" id="basic-addon1"><i class="icon-direction"></i></span>
															</div>
														</div>
													</div>		
											
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
														<div class="form-group">											
															<!-- display google map -->
															<div id="geomap" style="height: 100px"></div>
														</div>
													</div>
													

													<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left280'] ?></label>
															<input type="number"  class="form-control" name="r_phone" value="<?php echo $row->r_phone;?>" placeholder="<?php echo $lang['left313'] ?>" readonly required>
														</div>
													</div>
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left276'] ?></label>
															<input type="text" class="form-control" name="r_dest" value="<?php echo $row->r_dest;?>" placeholder="<?php echo $lang['left276'] ?>" readonly required >
														</div>
													</div>
													
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 " style="display:none">
														<div class="form-group service-form-group">
															<label for="inputcontact" class="control-label col-form-label"><?php echo $lang['left278'] ?></label>
															<input type="text"  class="form-control" name="r_city" value="<?php echo $row->r_city;?>" placeholder="<?php echo $lang['left279'] ?>" readonly required>
														</div>
													</div>
													
													<div class="col-sm-12 col-lg-12">
														<div class="card-body">
														<h4 class="card-title"><?php echo $lang['left309'] ?></h4>
														<hr>
															<div class="card-body">
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group row">
																			<label class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" name="idquote" value="3" tabindex="0" >
																				<span class="custom-control-indicator"></span>
																				<label><span><i class="ti ti-stats-up" style="color:#6610f2"></i>&nbsp; <?php echo $lang['left314'] ?></span></label>
																			</label>
																		</div>
																	</div>
																	
																	<div class="col-md-6">
																		<div class="form-group row">
																			<label for="lastName1"><?php echo $lang['left315'] ?> (<strong><?php echo $lang['left316'] ?></strong>)</label>
																			<input class="form-control" name="avatar" type="file" />
																		</div>
																	</div>
																	<!--/span-->
																</div>
															</div>
															<hr>
														</div>
													</div>	

													<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
													<input type="hidden" name="status_quote" value="Approved">
													<input type="hidden" name="r_address" value="<?php echo $row->r_address;?>" class="search_addr">
													<input type="hidden" name="latitude" value="<?php echo $row->latitude;?>" class="search_latitude">
													<input type="hidden" name="longitude" value="<?php echo $row->longitude;?>" class="search_longitude">
													<br><br><br>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<button type="submit" name="doupdate" class="btn btn-default btn-block mb10"><?php echo $lang['left309'] ?></button>
														<p><small><?php echo $lang['left318'] ?></small></p>
													</div>
												</div>	
												<!-- /.feature-left -->												
											</div>	
										</div>
									</form>
									<!-- /.service-form -->
									<?php echo Core::doForm("processQuoteapproved");?>
                                </div>
								<?php } ?>
                            </div>
						</div>
					</div>
				</div>
				
				<?php break;?>
				<?php endswitch;?>
            </div>
			
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- footer -->
			
			<script src="app.js"></script>
            <?php include 'templates/footer.php'; ?>
			
			<script type="text/javascript"> 
			// <![CDATA[
			$(document).ready(function () {
				$('a.activate').on('click', function () {
					var uid = $(this).attr('id').replace('act_', '')
					var text = "<i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to activate this user account?<br /><strong>Email notification will be sent as well</strong>";
					new Messi(text, {
						title: "Activate User Account",
						modal: true,
						closeButton: true,
						buttons: [{
							id: 0,
							label: "Activate",
							val: 'Y'
						}],
						  callback: function (val) {
							  $.ajax({
								  type: 'post',
								  url: "controller.php",
								  data: {
									  activateAccount: 1,
									  id: uid,
								  },
								  cache: false,
								  beforeSend: function () {
									  showLoader();
								  },
								  success: function (msg) {
									  hideLoader();
									  $("#msgholder").html(msg);
									  $('html, body').animate({
										  scrollTop: 0
									  }, 600);
								  }
							  });
						  }
					});
				});
			});
			// ]]>
			</script>
			
			