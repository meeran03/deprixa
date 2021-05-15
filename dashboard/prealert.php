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
	$ratesrow = $core->getRates();
		
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
	
    <title>Pre Alerts | <?php echo $core->site_name ?></title>
    <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
	
	<link href="../assets/css_log/front.css" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
	<script src="../assets/js/jquery.ui.touch-punch.js"></script>
	<script src="../assets/js/jquery.wysiwyg.js"></script>
	<script src="../assets/js/global.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/modernizr.mq.js" type="text/javascript" ></script>
	<script src="../assets/js/checkbox.js"></script>
	<script src="../assets/js/menu.js"></script>
	 <link rel="StyleSheet" href="dist/css/calculator.css" type="text/css">
	<script src="assets/js/checkbox.js"></script>
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	<script>
	function myFunction() {
	  var checkBox = document.getElementById("myCheck");
	  var text = document.getElementById("text");
	  if (checkBox.checked == true){
		text.style.display = "block";
	  } else {
		 text.style.display = "none";
	  }
	}
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
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php echo $lang['user_manage48'] ?> | <?php echo $lang['left54'] ?></h4>
						 
                    </div>
                </div>
            </div>	
			<?php $courierrow = $core->getCouriercom(); ?>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
				<!-- Row -->
				<div class="row">
					<!-- Column -->
					<div class="col-lg-12 col-xlg-12 col-md-12">
						<div class="card">
							<!-- Tabs -->
							<ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false"><?php echo $lang['left55'] ?></a>
								</li>
							</ul>
						
							<div class="container">
								    <div class="row">
										<div class="col-lg-12 mx-auto text-center">
											<h2 class="h1">
												<?php echo $lang['left56'] ?>
											</h2>
											<div class="u-h-4 u-w-50 bg-primary rounded mt-4 u-mb-40 mx-auto"></div>
											<p>
												<?php echo $lang['left57'] ?>
											</p>
										</div>
									</div> <!-- END row-->
								    <div class="row align-items-center">
										<div class="col-lg-8 ml-auto mt-8 mb-8">
											<form action="booking.php" method="get" accept-charset="utf-8">
												<div class="row">
													<div class="col-md-6 parcel_country">
														<div class="form-group">
															<label for="ReceiptCountryId"><strong><?php echo $lang['left58'] ?></strong></label>
															<input type="text" class="form-control"  name="scountry" id="ReceiptCountryId" placeholder="--<?php echo $lang['left59'] ?>--" list="browsers" autocomplete="off" required="required">
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
												
													<div class="col-md-6">
														<div class="form-group">
															<label for="ReceiptKind"><strong><?php echo $lang['left60'] ?></strong></label>
															<input  type="text" class="form-control add-listing_form" name="scity" placeholder="--<?php echo $lang['left61'] ?>--" required="required">
														</div>
													</div>		
												</div>
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="ReceiptKind"><strong><?php echo $lang['add-title18'] ?></strong></label>
															<input type="text" class="form-control add-listing_form" name="courier" value="<?php echo $rows->courier;?>" placeholder="<?php echo $lang['left62'] ?>" list="browsers2" autocomplete="off" required="required">
															<datalist id="browsers2">
																<?php foreach ($courierrow as $row):?>
																<option value="<?php echo $row->name_com; ?>"><?php echo $row->name_com; ?></option>
																<?php endforeach;?>
															</datalist>
														</div>
													</div>
													<div class="col-md-6 nondoc">
														<div class="form-group">
															<label for="sum2"><i class="fa fa-cube mr-1"></i><strong> <?php echo $lang['left63'] ?></strong></label>
															<input  type="text" class="form-control add-listing_form" name="order_purchase" placeholder="Example: 009785454545554"  required="required">
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="ReceiptKind"><strong><?php echo $lang['left64'] ?></strong></label>
															<input type="text" class="form-control add-listing_form" name="supplier"  placeholder="<?php echo $lang['left65'] ?>" required="required">
														</div>
													</div>
													<div class="col-md-6 nondoc">
														<div class="form-group">
															<label for="sum2"><strong><?php echo $core->currency;?> <?php echo $lang['left66'] ?></strong></label>
															<input  type="text" class="form-control add-listing_form" name="r_costtotal"  placeholder="<?php echo $lang['left67'] ?>"  required="required">
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-12 nondoc">
														<div class="form-group">
															<label for="sum2"><strong><?php echo $lang['left68'] ?></strong></label>
															<textarea class="form-control" rows="2" name="r_description" placeholder="<?php echo $lang['left69'] ?>"></textarea>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
														<br>
															<button type="submit" name="submit" class="btn btn-rounded btn-outline-primary btn-confirmation pull-right" ><i class="mdi mdi-alert-box mr-1"></i> <?php echo $lang['left70'] ?></button>
														</div>	
													</div>
												</div>	
											</form>	
										</div>

										<div class="col-lg-4 ml-auto mt-4 mb-4">
											<div class="row">
												<div class="col-md-8">
														<img src="assets/images/illustrator/app_development_SVG.svg" align="right" alt="Shipping Calculator">
												</div>
											</div>		
										</div>	
								    </div> <!-- END 	row-->

								   <hr class="u-my-60">
							</div> <!-- END container-->
						</div>
					</div>
					<!-- Column -->
				</div>
            </div>
			
			<!-- footer -->
			
            <?php include 'templates/footer_prealert.php'; ?>