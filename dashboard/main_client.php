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

<link href="dist/assets/css_log/front.css" rel="stylesheet" type="text/css">
	
<script type="text/javascript" src="dist/assets/js/jquery.js"></script>
<script type="text/javascript" src="dist/assets/js/jquery-ui.js"></script>
<script src="dist/assets/js/jquery.ui.touch-punch.js"></script>
<script src="dist/assets/js/jquery.wysiwyg.js"></script>
<script src="dist/assets/js/global.js"></script>
<script src="dist/assets/js/custom.js"></script>

<?php switch(Filter::$action): case "edit": ?>
<?php $row = Core::getRowById(Users::uTable, Filter::$id);?>
	<!-- Row -->
	<div class="row">
		<!-- Column -->
		<div class="col-lg-4 col-xlg-3 col-md-5">
			<div class="card">
				<div class="card-body">
					<center class="m-t-30"> <img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=<?php echo $core->thumb_w;?>&amp;h=<?php echo $core->thumb_h;?>&amp;s=1&amp;a=t1" class="rounded-circle" width="150" />
						<h4 class="card-title m-t-10"><?php echo $row->fname;?> <?php echo $row->lname;?></h4>
						<h6 class="card-subtitle"><span><?php echo $lang['user_manage2'] ?> <i class="icon-double-angle-right"></i></span>  <div class="badge badge-pill badge-light font-16"><span class="ti-user text-warning"></span>	<?php echo $row->username;?></div></h6>
						<h6 class="card-subtitle"><span>Casillero <i class="icon-double-angle-right"></i></span>  <div class="badge badge-pill badge-light font-16">	<?php echo $row->locker;?></div></h6>
					</center>
				</div>
				<div><hr> </div>
				<div class="card-body"> <small class="text-muted">E-mail </small>
					<h6><?php echo $row->email;?></h6> <small class="text-muted p-t-30 db">Phone</small>
					<h6><?php echo $row->code_phone;?> <?php echo $row->phone;?></h6> <small class="text-muted p-t-30 db">Address</small>
					<h6><?php echo $row->country;?>, <?php echo $row->city;?>, <?php echo $row->postal;?>, <?php echo $row->address;?></h6>
				</div>
				<div class="card-body row text-center">
					<div class="col-6 border-right">
						<h6><?php echo $row->created;?></h6>
						<span><?php echo $lang['user-account18'] ?></span>
					</div>
					<div class="col-6">
						<h6><?php echo $row->lastlogin;?></h6>
						<span><?php echo $lang['user-account19'] ?></span>
					</div>
				</div>
			</div>
		</div>
		<!-- Column -->
		<!-- Column -->
		<div class="col-lg-8 col-xlg-9 col-md-7">
			<div class="card">
				<!-- Tabs -->
				<ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false"><?php echo $lang['edit-clien1'] ?><span><?php echo $lang['edit-clien2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row->username;?></span></a>
					</li>
				</ul>
				<!-- Tabs -->
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
						<div class="card-body">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
							<form class="form-horizontal form-material" id="admin_form" method="post">
								<section>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstName1"><?php echo $lang['user_manage3'] ?></label>
												<input type="text" class="form-control" disabled="disabled" name="username" readonly="readonly" value="<?php echo $row->username;?>" placeholder="<?php echo $lang['user_manage3'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="lastName1"><?php echo $lang['user_manage4'] ?></label>
												<input type="text" class="form-control" name="password" placeholder="<?php echo $lang['user_manage32'] ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage6'] ?></label>
												<input type="text" class="form-control" name="fname" value="<?php echo $row->fname;?>" placeholder="<?php echo $lang['user_manage6'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage7'] ?></label>
												<input type="text" class="form-control" name="lname" value="<?php echo $row->lname;?>" placeholder="<?php echo $lang['user_manage7'] ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage5'] ?></label>
												<input type="text" class="form-control" name="email" value="<?php echo $row->email;?>" placeholder="<?php echo $lang['user_manage5'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage10'] ?></label>
												<input type="text" class="form-control" name="address" value="<?php echo $row->address;?>" placeholder="<?php echo $lang['user_manage10'] ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage8'] ?></label>
												<input type="text" class="form-control" name="code_phone" value="<?php echo $row->code_phone;?>" placeholder="<?php echo $lang['user_manage8'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage9'] ?></label>
												<input type="text" class="form-control" name="phone" value="<?php echo $row->phone;?>" placeholder="<?php echo $lang['user_manage9'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage11'] ?></label>
												<select class="custom-select form-control" name="gender" value="<?php echo $row->gender;?>" placeholder="<?php echo $lang['user_manage11'] ?>">
													<option value="Male">Masculino</option>
													<option value="Female">Femenino</option>
													<option value="Other">Otros</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage12'] ?></label>
												<input type="text" class="form-control" name="country" value="<?php echo $row->country;?>" placeholder="<?php echo $lang['user_manage12'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage13'] ?></label>
												<input type="text" class="form-control" name="city" value="<?php echo $row->city;?>" placeholder="<?php echo $lang['user_manage13'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage14'] ?></label>
												<input type="text" class="form-control" name="postal" value="<?php echo $row->postal;?>" placeholder="<?php echo $lang['user_manage14'] ?>">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage15'] ?></label>
												<select class="custom-select form-control"  name="userlevel">
													<?php echo $user->getCustomerLevels($row->userlevel);?>
												</select>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage20'] ?></label>
												<div class="inline-group">
													<label class="btn">
														<div class="custom-control custom-radio">
														<input type="radio" id="customRadio4" class="custom-control-input" name="active" value="y" <?php getChecked($row->active, "y"); ?>>
														<label class="custom-control-label" for="customRadio4"> <?php echo $lang['user_manage16'] ?></label>
														</div>
													</label>
													<label class="btn">
														<div class="custom-control custom-radio">
														<input type="radio" id="customRadio3" class="custom-control-input" name="active" value="n" <?php getChecked($row->active, "n"); ?>>
														<label class="custom-control-label" for="customRadio3"> <?php echo $lang['user_manage17'] ?></label>
														</div>
													</label>
													<label class="btn">
														<div class="custom-control custom-radio">
														<input type="radio" id="customRadio2" class="custom-control-input" name="active" value="b" <?php getChecked($row->active, "b"); ?>>
														<label class="custom-control-label" for="customRadio2"> <?php echo $lang['user_manage18'] ?></label>
														</div>
													</label>	
													<label class="btn">
														<div class="custom-control custom-radio">
														<input type="radio"id="customRadio1" class="custom-control-input"  name="active" value="t" <?php getChecked($row->active, "t"); ?>>
														<label class="custom-control-label" for="customRadio1"> <?php echo $lang['user_manage19'] ?></label>
														</div>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage23'] ?></label>
												<div class="btn-group" data-toggle="buttons">
													<label class="btn">
														<div class="custom-control custom-radio">
															<input type="radio" id="customRadio4" name="newsletter" value="1" <?php getChecked($row->newsletter, 1); ?> class="custom-control-input">
															<label class="custom-control-label" for="customRadio4"> <?php echo $lang['tools-config14'] ?></label>
														</div>
													</label>
													<label class="btn">
														<div class="custom-control custom-radio">
															<input type="radio" id="customRadio5" name="newsletter" value="0" <?php getChecked($row->newsletter, 0); ?> class="custom-control-input">
															<label class="custom-control-label" for="customRadio5"> <?php echo $lang['tools-config15'] ?></label>
														</div>
													</label>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="lastName1"><?php echo $lang['user_manage24'] ?></label>
												<input class="form-control" name="avatar" type="file" />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage24'] ?></label>
												<br>
												<img src="../thumbmaker.php?src=<?php echo UPLOADURL;?><?php echo ($row->avatar) ? $row->avatar : "blank.png";?>&amp;w=40&amp;h=40&amp;s=1&amp;a=t1" alt="" title="" class="avatar" />
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage25'] ?></label>
												<input type="text" class="form-control" name="created" disabled="disabled" readonly="readonly" value="<?php echo $row->created;?>" placeholder="<?php echo $lang['user_manage25'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage26'] ?></label>
												<input type="text" class="form-control" name="lastlogin" disabled="disabled" readonly="readonly" value="<?php echo $row->lastlogin;?>" placeholder="<?php echo $lang['user_manage26'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="phoneNumber1"><?php echo $lang['user_manage27'] ?></label>
												<input type="text" class="form-control" name="lastip" disabled="disabled" readonly="readonly" value="<?php echo $row->lastip;?>" placeholder="<?php echo $lang['user_manage27'] ?>">
											</div>
										</div>
									</div>
									<hr />
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="emailAddress1"><?php echo $lang['user_manage28'] ?></label>
												<textarea class="form-control" name="notes" rows="6"  name="notes" placeholder="<?php echo $lang['user_manage31'] ?>"><?php echo $row->notes;?></textarea>
											</div>
										</div>
									</div>

								</section>
								<div class="form-group">
									<div class="col-sm-12">	
										<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['user-account20'] ?><span><i class="icon-ok"></i></span></button>
										<a href="customer.php?do=main_client" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['user_manage30'] ?></a>
									</div>
									<input name="username" type="hidden" value="<?php echo $row->username;?>" />
									<input name="id" type="hidden" value="<?php echo Filter::$id;?>" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Column -->
	</div>

<?php echo Core::doForm("processCustomer");?>
<?php break;?>
<?php case"add": ?>

<div class="row justify-content-center">
	<!-- Column -->
	<div class="col-lg-8 col-xlg-12 col-md-12">
		<div class="card">
		<!-- Tabs -->
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
					<div class="card-body">
					<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
						<form class="form-horizontal form-material" id="admin_form" method="post">
							<section>
								<header><?php echo $lang['user_manage1'] ?><span><?php echo $lang['user_manage37'] ?></span></header>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1"><?php echo $lang['user_manage3'] ?></label>
											<input type="text" class="form-control"  name="username" placeholder="<?php echo $lang['user_manage3'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['user_manage32'] ?></label>
											<input type="text" class="form-control" name="password" placeholder="<?php echo $lang['user_manage32'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['user_manage6'] ?></label>
											<input type="text" class="form-control" name="fname" placeholder="<?php echo $lang['user_manage6'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage7'] ?></label>
											<input type="text" class="form-control" name="lname" placeholder="<?php echo $lang['user_manage7'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['user_manage5'] ?></label>
											<input type="text" class="form-control" name="email" placeholder="<?php echo $lang['user_manage5'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage10'] ?></label>
											<input type="text" class="form-control" name="address" placeholder="<?php echo $lang['user_manage10'] ?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['user_manage8'] ?></label>
											<input type="text" class="form-control" name="code_phone" list="browsers6" autocomplete="off" required="required" placeholder="Select Code Phone">
											<datalist id="browsers6">									
												<option><?php echo $lang['edit-clien8'] ?></option>
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
									<div class="col-md-4">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage9'] ?></label>
											<input type="text" class="form-control" name="phone" placeholder="<?php echo $lang['user_manage9'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage11'] ?></label>
											<select class="custom-select form-control" name="gender" placeholder="<?php echo $lang['user_manage11'] ?>">
												<option value="" >Choose option</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Other">Other</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['user_manage12'] ?></label>
											<input type="text" class="form-control" name="country" placeholder="<?php echo $lang['user_manage12'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage13'] ?></label>
											<input type="text" class="form-control" name="city" placeholder="<?php echo $lang['user_manage13'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage14'] ?></label>
											<input type="text" class="form-control" name="postal" placeholder="<?php echo $lang['user_manage14'] ?>">
										</div>
									</div>
								</div>
								
								<hr>
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['user_manage15'] ?></label>
											<select class="custom-select form-control"  name="userlevel">
												<?php echo $user->getCustomerLevels();?>
											</select>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage20'] ?></label>
											<div class="inline-group">
												<label class="btn">
													<div class="custom-control custom-radio">
													<input type="radio" id="customRadio4" class="custom-control-input" name="active" value="y" checked="checked">
													<label class="custom-control-label" for="customRadio4"> <?php echo $lang['user_manage16'] ?></label>
													</div>
												</label>
												<label class="btn">
													<div class="custom-control custom-radio">
													<input type="radio" id="customRadio3" class="custom-control-input" name="active" value="n">
													<label class="custom-control-label" for="customRadio3"> <?php echo $lang['user_manage17'] ?></label>
													</div>
												</label>
												<label class="btn">
													<div class="custom-control custom-radio">
													<input type="radio" id="customRadio2" class="custom-control-input" name="active" value="b">
													<label class="custom-control-label" for="customRadio2"> <?php echo $lang['user_manage18'] ?></label>
													</div>
												</label>	
												<label class="btn">
													<div class="custom-control custom-radio">
													<input type="radio"id="customRadio1" class="custom-control-input"  name="active" value="t" >
													<label class="custom-control-label" for="customRadio1"> <?php echo $lang['user_manage19'] ?></label>
													</div>
												</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="phoneNumber1"><?php echo $lang['user_manage23'] ?></label>
											<div class="btn-group" data-toggle="buttons">
												<label class="btn">
													<div class="custom-control custom-radio">
														<input type="radio" id="customRadio4" name="newsletter" value="1" checked="checked" class="custom-control-input">
														<label class="custom-control-label" for="customRadio4"> <?php echo $lang['user_manage21'] ?></label>
													</div>
												</label>
												<label class="btn">
													<div class="custom-control custom-radio">
														<input type="radio" id="customRadio5" name="newsletter" value="0" class="custom-control-input">
														<label class="custom-control-label" for="customRadio5"> <?php echo $lang['user_manage22'] ?></label>
													</div>
												</label>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="lastName1"><?php echo $lang['user_manage24'] ?></label>
											<input class="form-control" name="avatar" type="file" />
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" name="notify" value="1">
												<i></i><?php echo $lang['edit-clien34'] ?>
												<span class="custom-control-indicator"></span><br><br>
												<label><span><i class="ti-email" style="color:#6610f2"></i>&nbsp; <?php echo $lang['edit-clien35'] ?></span></label>
											</label>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="emailAddress1"><?php echo $lang['user_manage36'] ?></label>
											<textarea class="form-control" name="notes" rows="6"  name="notes" placeholder="<?php echo $lang['user_manage36'] ?>"></textarea>
										</div>
									</div>
								</div>
								
							</section>
							<div class="form-group">
								<div class="col-sm-12">										
									<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['user_manage37'] ?><span><i class="icon-ok"></i></span></button>
									<a href="customer.php?do=main_client" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['user_manage30'] ?></a> 
								</div>
							</div>
							<input name="locker" type="hidden" value="<?php echo generarCodigo(6); ?>" />
						</form>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<!-- Column -->
</div>
<?php echo Core::doForm("processCustomer");?>
<?php break;?>
<?php default:?>

<?php $userrow = $user->getCustomers();?>

<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-xl-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="zero_config" class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th><b><?php echo $lang['edit-clien38'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['edit-clien39'] ?></b></th>
								<th class="text-center"><b>CASILLERO</b></th>
								<th class="text-center"><b><?php echo $lang['edit-clien40'] ?></b></th>								
								<th class="text-center"><b><?php echo $lang['edit-clien41'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['edit-clien42'] ?></b></th>
								<th class="text-center"><b><?php echo $lang['edit-clien43'] ?></b></th>
							</tr>
						</thead>
						<div class="m-t-40">
							<div class="d-flex">
								<div class="mr-auto">
									<div class="form-group">
										<a href="customer.php?do=main_client&amp;action=add"><button type="button" class="btn btn-primary btn"><i class="ti-plus" aria-hidden="true"></i> <?php echo $lang['edit-clien44'] ?></button></a>
									</div>
								</div>
								
							</div>
						</div>
						<tbody id="projects-tbl">
							<?php if(!$userrow):?>
							<tr>
								<td colspan="7">
								<?php echo "
									<i align='center' class='display-3 text-warning d-block'><img src='assets/images/alert/ohh_manage_shipment.png' width='150' /></i>
									",false;?>
								</td>
							</tr>
							<?php else:?>
							<?php foreach ($userrow as $row):?>
							<tr>
								<td><?php echo $row->fname;?> <?php echo $row->lname;?></td>
								<td><?php echo $row->email;?></td>
								<td><?php echo $row->locker;?></td>
								<td class="text-center"><?php echo userStatus($row->active, $row->id);?></td>
								<td class="text-center"><?php echo isAdmin($row->userlevel);?></td>
								<td class="text-center"><?php echo ($row->adate) ? $row->adate : "-/-";?></td>
								<td align='center'>
									<a  href="customer.php?do=main_client&amp;action=edit&amp;id=<?php echo $row->id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-clien46'] ?>"><i style="color:#343a40" class="ti-pencil"></i></a>
									<a   href="customer.php?do=newsletter&amp;emailid=<?php echo urlencode($row->email);?>"  data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-clien45'] ?>"><i style="color:#343a40" class="ti-email"></i></a>
									<?php if($row->id == 1):?>
									<a id="item_<?php echo $row->id;?>" data-rel="<?php echo $row->username;?>"><button type="button"  data-toggle="tooltip" data-original-title="Master Admin"><i class="ti-lock" aria-hidden="true"></i></button></a>
									<?php else:?>
										<?php if($roww->userlevel == 9){?>
										<a id="item_<?php echo $row->id;?>"   data-rel="<?php echo $row->username;?>" class="delete" data-toggle="tooltip" data-placement="top" title="<?php echo $lang['edit-clien47'] ?>"><i style="color:#343a40" class="ti-trash"></i></a>
										<?php } ?>
									<?php endif;?>
								</td>
							</tr>
							<?php endforeach;?>
							<?php unset($row);?>
							<?php endif;?>
						</tbody>
					</table>
					<?php echo Core::doDelete("Delete User","deleteUser");?> 
				</div>
			</div>
		</div>
	</div>
	<!-- Column -->
</div>

<?php break;?>
<?php endswitch;?>