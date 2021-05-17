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
  require_once("init.php");
  
  if (isset($_POST['doLogin']))
      : $result = $user->login($_POST['username'], $_POST['password']);
  
  /* Login Successful */
	if ($result)
		if($_SESSION['userlevel'] == 9)
			:	redirect_to("dashboard/index.php");
	elseif($_SESSION['userlevel'] == 1)
			:	redirect_to("dashboard/client.php");
			
	elseif($_SESSION['userlevel'] == 2)
			:	redirect_to("dashboard/index.php");
			
	else:
		if($_SESSION['userlevel'] == 3)
			:	redirect_to("dashboard/dash_driver.php");
	endif;
	endif;
	endif;
	  
   $numusers = countEntries("users");
?>

<?php include("assets/templates/head_sign.php");?>


        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                   <a class="logo" href="index.php"><?php echo ($core->logo) ? '<img src="'.SITEURL.'/uploads/'.$core->logo.'" alt="'.$core->site_name.'" width="190" height="39"/>': $core->site_name;?></a>
                </div>                 

                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
				<div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="index.php"><?php echo $lang['left134'] ?></a></li>
                        
                        <li><a href="tracking.php"><i class="mdi mdi-package-variant-closed"></i> <?php echo $lang['left135'] ?></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        <section class="bg-home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-5">
                                <div class="mr-lg-6">   
                                    <img src="<?php SITEURL ?>assets/theme_deprixa/images/user/signup.png" class="img-fluid" alt="">
                                </div>
                            </div>
								
                            <div class="col-lg-5 col-md-7 mt-4 mt-sm-5 pt-2 pt-sm-3">
								<?php if(!$core->reg_allowed):?>
								<?php echo Filter::msgAlert("<span>Alert!</span>".$lang['langs_010133']."");?>
								<?php elseif($core->user_limit !=0 and $core->user_limit == $numusers):?>
								<?php echo Filter::msgAlert("<span>Alert!</span>".$lang['langs_010134']."");?>
								<?php else:?>
                                <div class="login_page bg-white shadow rounded p-4">
                                    <div class="text-center">
                                        <h4 class="mb-4"><?php echo $lang['left136'] ?></h4>
										<p><?php echo $lang['left137'] ?></p>										
                                    </div>
									<div id="msgholder"></div>
									<div id="loader" style="display:none"></div>
									<br><br>	
                                    <form class="login-form" id="admin_form" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">                                               
                                                    <label><?php echo $lang['left138'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" placeholder="<?php echo $lang['left139'] ?>" name="fname" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">                                                
                                                    <label>Last Name<span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" placeholder="Last Name" name="lname" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left142'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-mail-ru ml-3 icons"></i>
                                                    <input type="email" class="form-control pl-5" placeholder="<?php echo $lang['left143'] ?>" name="email" required="">
                                                </div>
                                            </div>
											<!-- <div class="col-md-12">
                                                <div class="form-group position-relative">                                               
                                                    <label><?php echo $lang['left144'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-account ml-3 icons"></i> -->
                                                    <input type="hidden" class="form-control pl-5" placeholder="<?php echo $lang['left145'] ?>" name="username" required="">
                                                <!-- </div>
                                            </div> -->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left146'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" class="form-control pl-5" placeholder="<?php echo $lang['left147'] ?>" name="pass" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left148'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-key ml-3 icons"></i>
                                                    <input type="password" class="form-control pl-5" name="pass2" placeholder="<?php echo $lang['left149'] ?>" required="">
                                                </div>
                                            </div>
											
											
											
											<div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left150'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-numeric ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" name="code_phone" placeholder="<?php echo $lang['left151'] ?>" list="browsersS" autocomplete="off" required="">
													<datalist id="browsersS">
														<option data-countrycode="AF" value="93">Afghanistan (+93)</option>
														<option data-countrycode="AL" value="355">Albania (+355)</option>
														<option data-countrycode="DZ" value="213">Algeria (+213)</option>
														<option data-countrycode="AS" value="1684">American Samoa (+1684)</option>
														<option data-countrycode="AD" value="376">Andorra (+376)</option>
														<option data-countrycode="AO" value="244">Angola (+244)</option>
														<option data-countrycode="AI" value="1264">Anguilla (+1264)</option>
														<option data-countrycode="AQ" value="0">Antarctica (+0)</option>
														<option data-countrycode="AG" value="1268">Antigua and Barbuda (+1268)</option>
														<option data-countrycode="AR" value="54">Argentina (+54)</option>
														<option data-countrycode="AM" value="374">Armenia (+374)</option>
														<option data-countrycode="AW" value="297">Aruba (+297)</option>
														<option data-countrycode="AU" value="61">Australia (+61)</option>
														<option data-countrycode="AT" value="43">Austria (+43)</option>
														<option data-countrycode="AZ" value="994">Azerbaijan (+994)</option>
														<option data-countrycode="BS" value="1242">Bahamas (+1242)</option>
														<option data-countrycode="BH" value="973">Bahrain (+973)</option>
														<option data-countrycode="BD" value="880">Bangladesh (+880)</option>
														<option data-countrycode="BB" value="1246">Barbados (+1246)</option>
														<option data-countrycode="BY" value="375">Belarus (+375)</option>
														<option data-countrycode="BE" value="32">Belgium (+32)</option>
														<option data-countrycode="BZ" value="501">Belize (+501)</option>
														<option data-countrycode="BJ" value="229">Benin (+229)</option>
														<option data-countrycode="BM" value="1441">Bermuda (+1441)</option>
														<option data-countrycode="BT" value="975">Bhutan (+975)</option>
														<option data-countrycode="BO" value="591">Bolivia (+591)</option>
														<option data-countrycode="BA" value="387">Bosnia and Herzegovina (+387)</option>
														<option data-countrycode="BW" value="267">Botswana (+267)</option>
														<option data-countrycode="BV" value="0">Bouvet Island (+0)</option>
														<option data-countrycode="BR" value="55">Brazil (+55)</option>
														<option data-countrycode="IO" value="246">British Indian Ocean Territory (+246)</option>
														<option data-countrycode="BN" value="673">Brunei Darussalam (+673)</option>
														<option data-countrycode="BG" value="359">Bulgaria (+359)</option>
														<option data-countrycode="BF" value="226">Burkina Faso (+226)</option>
														<option data-countrycode="BI" value="257">Burundi (+257)</option>
														<option data-countrycode="KH" value="855">Cambodia (+855)</option>
														<option data-countrycode="CM" value="237">Cameroon (+237)</option>
														<option data-countrycode="CA" value="1">Canada (+1)</option>
														<option data-countrycode="CV" value="238">Cape Verde (+238)</option>
														<option data-countrycode="KY" value="1345">Cayman Islands (+1345)</option>
														<option data-countrycode="CF" value="236">Central African Republic (+236)</option>
														<option data-countrycode="TD" value="235">Chad (+235)</option>
														<option data-countrycode="CL" value="56">Chile (+56)</option>
														<option data-countrycode="CN" value="86">China (+86)</option>
														<option data-countrycode="CX" value="61">Christmas Island (+61)</option>
														<option data-countrycode="CC" value="672">Cocos (Keeling) Islands (+672)</option>
														<option data-countrycode="CO" value="57">Colombia (+57)</option>
														<option data-countrycode="KM" value="269">Comoros (+269)</option>
														<option data-countrycode="CG" value="242">Congo (+242)</option>
														<option data-countrycode="CD" value="242">Congo, the Democratic Republic of the (+242)</option>
														<option data-countrycode="CK" value="682">Cook Islands (+682)</option>
														<option data-countrycode="CR" value="506">Costa Rica (+506)</option>
														<option data-countrycode="CI" value="225">Cote D'Ivoire (+225)</option>
														<option data-countrycode="HR" value="385">Croatia (+385)</option>
														<option data-countrycode="CU" value="53">Cuba (+53)</option>
														<option data-countrycode="CY" value="357">Cyprus (+357)</option>
														<option data-countrycode="CZ" value="420">Czech Republic (+420)</option>
														<option data-countrycode="DK" value="45">Denmark (+45)</option>
														<option data-countrycode="DJ" value="253">Djibouti (+253)</option>
														<option data-countrycode="DM" value="1767">Dominica (+1767)</option>
														<option data-countrycode="DO" value="1809">Dominican Republic (+1809)</option>
														<option data-countrycode="EC" value="593">Ecuador (+593)</option>
														<option data-countrycode="EG" value="20">Egypt (+20)</option>
														<option data-countrycode="SV" value="503">El Salvador (+503)</option>
														<option data-countrycode="GQ" value="240">Equatorial Guinea (+240)</option>
														<option data-countrycode="ER" value="291">Eritrea (+291)</option>
														<option data-countrycode="EE" value="372">Estonia (+372)</option>
														<option data-countrycode="ET" value="251">Ethiopia (+251)</option>
														<option data-countrycode="FK" value="500">Falkland Islands (Malvinas) (+500)</option>
														<option data-countrycode="FO" value="298">Faroe Islands (+298)</option>
														<option data-countrycode="FJ" value="679">Fiji (+679)</option>
														<option data-countrycode="FI" value="358">Finland (+358)</option>
														<option data-countrycode="FR" value="33">France (+33)</option>
														<option data-countrycode="GF" value="594">French Guiana (+594)</option>
														<option data-countrycode="PF" value="689">French Polynesia (+689)</option>
														<option data-countrycode="TF" value="0">French Southern Territories (+0)</option>
														<option data-countrycode="GA" value="241">Gabon (+241)</option>
														<option data-countrycode="GM" value="220">Gambia (+220)</option>
														<option data-countrycode="GE" value="995">Georgia (+995)</option>
														<option data-countrycode="DE" value="49">Germany (+49)</option>
														<option data-countrycode="GH" value="233">Ghana (+233)</option>
														<option data-countrycode="GI" value="350">Gibraltar (+350)</option>
														<option data-countrycode="GR" value="30">Greece (+30)</option>
														<option data-countrycode="GL" value="299">Greenland (+299)</option>
														<option data-countrycode="GD" value="1473">Grenada (+1473)</option>
														<option data-countrycode="GP" value="590">Guadeloupe (+590)</option>
														<option data-countrycode="GU" value="1671">Guam (+1671)</option>
														<option data-countrycode="GT" value="502">Guatemala (+502)</option>
														<option data-countrycode="GN" value="224">Guinea (+224)</option>
														<option data-countrycode="GW" value="245">Guinea-Bissau (+245)</option>
														<option data-countrycode="GY" value="592">Guyana (+592)</option>
														<option data-countrycode="HT" value="509">Haiti (+509)</option>
														<option data-countrycode="HM" value="0">Heard Island and Mcdonald Islands (+0)</option>
														<option data-countrycode="VA" value="39">Holy See (Vatican City State) (+39)</option>
														<option data-countrycode="HN" value="504">Honduras (+504)</option>
														<option data-countrycode="HK" value="852">Hong Kong (+852)</option>
														<option data-countrycode="HU" value="36">Hungary (+36)</option>
														<option data-countrycode="IS" value="354">Iceland (+354)</option>
														<option data-countrycode="IN" value="91">India (+91)</option>
														<option data-countrycode="ID" value="62">Indonesia (+62)</option>
														<option data-countrycode="IR" value="98">Iran, Islamic Republic of (+98)</option>
														<option data-countrycode="IQ" value="964">Iraq (+964)</option>
														<option data-countrycode="IE" value="353">Ireland (+353)</option>
														<option data-countrycode="IL" value="972">Israel (+972)</option>
														<option data-countrycode="IT" value="39">Italy (+39)</option>
														<option data-countrycode="JM" value="1876">Jamaica (+1876)</option>
														<option data-countrycode="JP" value="81">Japan (+81)</option>
														<option data-countrycode="JO" value="962">Jordan (+962)</option>
														<option data-countrycode="KZ" value="7">Kazakhstan (+7)</option>
														<option data-countrycode="KE" value="254">Kenya (+254)</option>
														<option data-countrycode="KI" value="686">Kiribati (+686)</option>
														<option data-countrycode="KP" value="850">Korea, Democratic People's Republic of (+850)</option>
														<option data-countrycode="KR" value="82">Korea, Republic of (+82)</option>
														<option data-countrycode="KW" value="965">Kuwait (+965)</option>
														<option data-countrycode="KG" value="996">Kyrgyzstan (+996)</option>
														<option data-countrycode="LA" value="856">Lao People's Democratic Republic (+856)</option>
														<option data-countrycode="LV" value="371">Latvia (+371)</option>
														<option data-countrycode="LB" value="961">Lebanon (+961)</option>
														<option data-countrycode="LS" value="266">Lesotho (+266)</option>
														<option data-countrycode="LR" value="231">Liberia (+231)</option>
														<option data-countrycode="LY" value="218">Libyan Arab Jamahiriya (+218)</option>
														<option data-countrycode="LI" value="423">Liechtenstein (+423)</option>
														<option data-countrycode="LT" value="370">Lithuania (+370)</option>
														<option data-countrycode="LU" value="352">Luxembourg (+352)</option>
														<option data-countrycode="MO" value="853">Macao (+853)</option>
														<option data-countrycode="MK" value="389">Macedonia, the Former Yugoslav Republic of (+389)</option>
														<option data-countrycode="MG" value="261">Madagascar (+261)</option>
														<option data-countrycode="MW" value="265">Malawi (+265)</option>
														<option data-countrycode="MY" value="60">Malaysia (+60)</option>
														<option data-countrycode="MV" value="960">Maldives (+960)</option>
														<option data-countrycode="ML" value="223">Mali (+223)</option>
														<option data-countrycode="MT" value="356">Malta (+356)</option>
														<option data-countrycode="MH" value="692">Marshall Islands (+692)</option>
														<option data-countrycode="MQ" value="596">Martinique (+596)</option>
														<option data-countrycode="MR" value="222">Mauritania (+222)</option>
														<option data-countrycode="MU" value="230">Mauritius (+230)</option>
														<option data-countrycode="YT" value="269">Mayotte (+269)</option>
														<option data-countrycode="MX" value="52">Mexico (+52)</option>
														<option data-countrycode="FM" value="691">Micronesia, Federated States of (+691)</option>
														<option data-countrycode="MD" value="373">Moldova, Republic of (+373)</option>
														<option data-countrycode="MC" value="377">Monaco (+377)</option>
														<option data-countrycode="MN" value="976">Mongolia (+976)</option>
														<option data-countrycode="MS" value="1664">Montserrat (+1664)</option>
														<option data-countrycode="MA" value="212">Morocco (+212)</option>
														<option data-countrycode="MZ" value="258">Mozambique (+258)</option>
														<option data-countrycode="MM" value="95">Myanmar (+95)</option>
														<option data-countrycode="NA" value="264">Namibia (+264)</option>
														<option data-countrycode="NR" value="674">Nauru (+674)</option>
														<option data-countrycode="NP" value="977">Nepal (+977)</option>
														<option data-countrycode="NL" value="31">Netherlands (+31)</option>
														<option data-countrycode="AN" value="599">Netherlands Antilles (+599)</option>
														<option data-countrycode="NC" value="687">New Caledonia (+687)</option>
														<option data-countrycode="NZ" value="64">New Zealand (+64)</option>
														<option data-countrycode="NI" value="505">Nicaragua (+505)</option>
														<option data-countrycode="NE" value="227">Niger (+227)</option>
														<option data-countrycode="NG" value="234">Nigeria (+234)</option>
														<option data-countrycode="NU" value="683">Niue (+683)</option>
														<option data-countrycode="NF" value="672">Norfolk Island (+672)</option>
														<option data-countrycode="MP" value="1670">Northern Mariana Islands (+1670)</option>
														<option data-countrycode="NO" value="47">Norway (+47)</option>
														<option data-countrycode="OM" value="968">Oman (+968)</option>
														<option data-countrycode="PK" value="92">Pakistan (+92)</option>
														<option data-countrycode="PW" value="680">Palau (+680)</option>
														<option data-countrycode="PS" value="970">Palestinian Territory, Occupied (+970)</option>
														<option data-countrycode="PA" value="507">Panama (+507)</option>
														<option data-countrycode="PG" value="675">Papua New Guinea (+675)</option>
														<option data-countrycode="PY" value="595">Paraguay (+595)</option>
														<option data-countrycode="PE" value="51">Peru (+51)</option>
														<option data-countrycode="PH" value="63">Philippines (+63)</option>
														<option data-countrycode="PN" value="0">Pitcairn (+0)</option>
														<option data-countrycode="PL" value="48">Poland (+48)</option>
														<option data-countrycode="PT" value="351">Portugal (+351)</option>
														<option data-countrycode="PR" value="1787">Puerto Rico (+1787)</option>
														<option data-countrycode="QA" value="974">Qatar (+974)</option>
														<option data-countrycode="RE" value="262">Reunion (+262)</option>
														<option data-countrycode="RO" value="40">Romania (+40)</option>
														<option data-countrycode="RU" value="70">Russian Federation (+70)</option>
														<option data-countrycode="RW" value="250">Rwanda (+250)</option>
														<option data-countrycode="SH" value="290">Saint Helena (+290)</option>
														<option data-countrycode="KN" value="1869">Saint Kitts and Nevis (+1869)</option>
														<option data-countrycode="LC" value="1758">Saint Lucia (+1758)</option>
														<option data-countrycode="PM" value="508">Saint Pierre and Miquelon (+508)</option>
														<option data-countrycode="VC" value="1784">Saint Vincent and the Grenadines (+1784)</option>
														<option data-countrycode="WS" value="684">Samoa (+684)</option>
														<option data-countrycode="SM" value="378">San Marino (+378)</option>
														<option data-countrycode="ST" value="239">Sao Tome and Principe (+239)</option>
														<option data-countrycode="SA" value="966">Saudi Arabia (+966)</option>
														<option data-countrycode="SN" value="221">Senegal (+221)</option>
														<option data-countrycode="CS" value="381">Serbia and Montenegro (+381)</option>
														<option data-countrycode="SC" value="248">Seychelles (+248)</option>
														<option data-countrycode="SL" value="232">Sierra Leone (+232)</option>
														<option data-countrycode="SG" value="65">Singapore (+65)</option>
														<option data-countrycode="SK" value="421">Slovakia (+421)</option>
														<option data-countrycode="SI" value="386">Slovenia (+386)</option>
														<option data-countrycode="SB" value="677">Solomon Islands (+677)</option>
														<option data-countrycode="SO" value="252">Somalia (+252)</option>
														<option data-countrycode="ZA" value="27">South Africa (+27)</option>
														<option data-countrycode="GS" value="0">South Georgia and the South Sandwich Islands (+0)</option>
														<option data-countrycode="ES" value="34">Spain (+34)</option>
														<option data-countrycode="LK" value="94">Sri Lanka (+94)</option>
														<option data-countrycode="SD" value="249">Sudan (+249)</option>
														<option data-countrycode="SR" value="597">Suriname (+597)</option>
														<option data-countrycode="SJ" value="47">Svalbard and Jan Mayen (+47)</option>
														<option data-countrycode="SZ" value="268">Swaziland (+268)</option>
														<option data-countrycode="SE" value="46">Sweden (+46)</option>
														<option data-countrycode="CH" value="41">Switzerland (+41)</option>
														<option data-countrycode="SY" value="963">Syrian Arab Republic (+963)</option>
														<option data-countrycode="TW" value="886">Taiwan, Province of China (+886)</option>
														<option data-countrycode="TJ" value="992">Tajikistan (+992)</option>
														<option data-countrycode="TZ" value="255">Tanzania, United Republic of (+255)</option>
														<option data-countrycode="TH" value="66">Thailand (+66)</option>
														<option data-countrycode="TL" value="670">Timor-Leste (+670)</option>
														<option data-countrycode="TG" value="228">Togo (+228)</option>
														<option data-countrycode="TK" value="690">Tokelau (+690)</option>
														<option data-countrycode="TO" value="676">Tonga (+676)</option>
														<option data-countrycode="TT" value="1868">Trinidad and Tobago (+1868)</option>
														<option data-countrycode="TN" value="216">Tunisia (+216)</option>
														<option data-countrycode="TR" value="90">Turkey (+90)</option>
														<option data-countrycode="TM" value="7370">Turkmenistan (+7370)</option>
														<option data-countrycode="TC" value="1649">Turks and Caicos Islands (+1649)</option>
														<option data-countrycode="TV" value="688">Tuvalu (+688)</option>
														<option data-countrycode="UG" value="256">Uganda (+256)</option>
														<option data-countrycode="UA" value="380">Ukraine (+380)</option>
														<option data-countrycode="AE" value="971">United Arab Emirates (+971)</option>
														<option data-countrycode="GB" value="44">United Kingdom (+44)</option>
														<option data-countrycode="US" value="1">United States (+1)</option>
														<option data-countrycode="UM" value="1">United States Minor Outlying Islands (+1)</option>
														<option data-countrycode="UY" value="598">Uruguay (+598)</option>
														<option data-countrycode="UZ" value="998">Uzbekistan (+998)</option>
														<option data-countrycode="VU" value="678">Vanuatu (+678)</option>
														<option data-countrycode="VE" value="58">Venezuela (+58)</option>
														<option data-countrycode="VN" value="84">Viet Nam (+84)</option>
														<option data-countrycode="VG" value="1284">Virgin Islands, British (+1284)</option>
														<option data-countrycode="VI" value="1340">Virgin Islands, U.s. (+1340)</option>
														<option data-countrycode="WF" value="681">Wallis and Futuna (+681)</option>
														<option data-countrycode="EH" value="212">Western Sahara (+212)</option>
														<option data-countrycode="YE" value="967">Yemen (+967)</option>
														<option data-countrycode="ZM" value="260">Zambia (+260)</option>
														<option data-countrycode="ZW" value="263">Zimbabwe (+263)</option>
													</datalist>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left152'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-phone-plus ml-3 icons"></i>
                                                    <input type="number" class="form-control pl-5" name="phone" placeholder="<?php echo $lang['left153'] ?>" required="">
                                                </div>
                                            </div>
											<div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left154'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-map-marker-radius ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" name="address" placeholder="<?php echo $lang['left155'] ?>" required="">
                                                </div>
                                            </div>								
											<div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left156'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-map-marker ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" name="city" placeholder="<?php echo $lang['left157'] ?>" required="">
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left158'] ?> <span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-map-marker-multiple ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" name="country"  placeholder="<?php echo $lang['left159'] ?>" list="browsers" autocomplete="off" required="">
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
                                                <div class="form-group position-relative">
                                                    <label><?php echo $lang['left160'] ?><span class="text-danger">*</span></label>
                                                    <i class="mdi mdi-mailbox ml-3 icons"></i>
                                                    <input type="text" class="form-control pl-5" name="postal" placeholder="<?php echo $lang['left161'] ?>" required="">
                                                </div>
                                            </div>
											<div class="col-md-2">
												<div class="form-group">
													<label><span class="text-danger"></span></label>
													<span class="badge-light"><img src="lib/captcha.php" alt="" class="captcha-append" /></span>
												</div>
											</div> <!-- /.col- -->
											<div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo $lang['left162'] ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="captcha" placeholder="<?php echo $lang['left163'] ?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="terms" value="yes" >
                                                        <label class="custom-control-label" for="customCheck1"><?php echo $lang['left164'] ?> <a href="#" class="text-primary"> <?php echo $lang['left165'] ?></a></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-primary rounded w-100" name="dosubmit"><?php echo $lang['left166'] ?></button>
												<input name="locker" type="hidden" value="<?php echo generarCodigo(6); ?>" />
												<input name="doRegister" type="hidden" value="1" />
                                            </div>
                                            <div class="col-lg-12 mt-4 text-center">
                                                
                                            </div>
                                            <div class="mx-auto">
                                                <p class="mb-0 mt-3"><small class="text-dark mr-2"><?php echo $lang['left167'] ?> </small> <a href="index.php" class="text-dark font-weight-bold"><?php echo $lang['left168'] ?></a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
								<script type="text/javascript">
								// <![CDATA[
								  function showResponse(msg) {
									  hideLoader();
									  if (msg == 'OK') {
										  result = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"><\/span><i class=\"close icon-remove-circle\"></i><span>Success!<\/span>You have successfully registered. Please check your email for further information<\/p><\/div>";
										  $("#fullform").hide();
									  } else {
										  result = msg;
									  }
									  $(this).html(result);
									  $("html, body").animate({
										  scrollTop: 0
									  }, 600);
								  }
								  $(document).ready(function () {
									  var options = {
										  target: "#msgholder",
										  beforeSubmit: showLoader,
										  success: showResponse,
										  url: "ajax/user.php",
										  resetForm: 0,
										  clearForm: 0,
										  data: {
											  processContact: 1
										  }
									  };
									  $("#admin_form").ajaxForm(options);
								  });
								// ]]>
								</script>
							<?php endif;?>
                            </div> <!--end col-->							
                        </div><!--end row-->
                    </div> <!--end container-->
                </div>
            </div>
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->

         <?php include("assets/templates/footer_all.php");?>