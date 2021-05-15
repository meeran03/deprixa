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

<!-- ============================================================== -->
<!-- Right Part contents-->
<!-- ============================================================== -->
<div class="right-part mail-list bg-white">
	<div class="p-15 b-b">
		<div class="d-flex align-items-center">
			<div>
				<span><?php echo $lang['tools-config61'] ?> | <?php echo $lang['left709'] ?></span>
			</div>
			
		</div>
	</div>
	<!-- Action part -->
	<!-- Button group part -->
	<div class="bg-light p-15">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="row">
					<div class="col-12">
						<div id="loader" style="display:none"></div>
						<div id="msgholder"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Action part -->
	<?php $zonerow = $core->getZone(); ?>
	<div class="row justify-content-center">
		<div class="col-lg-11">
			<div class="row">
				<!-- Column -->
				<div class="col-12">
					<div class="card-body">				
						<form class="form-horizontal form-material" id="admin_form" method="post">							
							
						<h4 class="card-title"><b><?php echo $lang['tools-config33'] ?></b></h4>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="phoneNumber1"><?php echo $lang['tools-config34'] ?></label>
										<input class="form-control" name="timezone" value="<?php echo $core->timezone;?>" list="browsers" autocomplete="off" required="required">
										<datalist id="browsers">
											<option><?php echo $core->timezone;?></option>
											<?php foreach ($zonerow as $row):?>
											<option value="<?php echo $row->zone_name; ?>"><?php echo $row->zone_name; ?></option>
											<?php endforeach;?>
										</datalist>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phoneNumber1"><img src='assets/images/alert/lang.png' width='20' /> <?php echo $lang['tools-config62'] ?></label>
										<select class="custom-select form-control" name="language">
											<optgroup label="Pacific Time Zone">
											<option value="en"<?php if ($core->language == "en") echo " selected=\"selected\"";?> data-flag="us"> <?php echo $lang['tools-config63'] ?></option>
											<option value="es"<?php if ($core->language == "es") echo " selected=\"selected\"";?> data-flag="es"> <?php echo $lang['tools-config64'] ?></option>
											<!--<option value="fr"<?php if ($core->language == "fr") echo " selected=\"selected\"";?> data-flag="fr"> <?php echo $lang['tools-config65'] ?></option>-->
											<!--<option value="it"<?php if ($core->language == "it") echo " selected=\"selected\"";?> data-flag="it"> <?php echo $lang['tools-config66'] ?></option>-->
											<!--<option value="ru"<?php if ($core->language == "ru") echo " selected=\"selected\"";?> data-flag="ru"> Russian</option>-->
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="phoneNumber1"><?php echo $lang['tools-config52'] ?></label>
										<input class="form-control" name="currency" value="<?php echo $core->currency;?>" list="browsers12" autocomplete="off" required="required">
										<datalist id="browsers12">
											<option value="" disabled=""><?php echo $lang['tools-config51'] ?></option>
											<option label="AED" value="AED"<?php if ($core->currency == "AED") echo " selected=\"selected\"";?>>AED</option>
											<option label="ARS" value="ARS"<?php if ($core->currency == "ARS") echo " selected=\"selected\"";?>>ARS</option>
											<option label="AUD" value="AUD"<?php if ($core->currency == "AUD") echo " selected=\"selected\"";?>>AUD</option>
											<option label="BGN" value="BGN"<?php if ($core->currency == "BGN") echo " selected=\"selected\"";?>>BGN</option>
											<option label="BND" value="BND"<?php if ($core->currency == "BND") echo " selected=\"selected\"";?>>BND</option>
											<option label="BOB" value="BOB"<?php if ($core->currency == "BOB") echo " selected=\"selected\"";?>>BOB</option>
											<option label="BRL" value="BRL"<?php if ($core->currency == "BRL") echo " selected=\"selected\"";?>>BRL</option>
											<option label="CAD" value="CAD"<?php if ($core->currency == "CAD") echo " selected=\"selected\"";?>>CAD</option>
											<option label="CHF" value="CHF"<?php if ($core->currency == "CHF") echo " selected=\"selected\"";?>>CHF</option>
											<option label="CLP" value="CLP"<?php if ($core->currency == "CLP") echo " selected=\"selected\"";?>>CLP</option>
											<option label="CNY" value="CNY"<?php if ($core->currency == "CNY") echo " selected=\"selected\"";?>>CNY</option>
											<option label="COP" value="COP"<?php if ($core->currency == "COP") echo " selected=\"selected\"";?>>COP</option>
											<option label="CZK" value="CZK"<?php if ($core->currency == "CZK") echo " selected=\"selected\"";?>>CZK</option>
											<option label="DKK" value="DKK"<?php if ($core->currency == "DKK") echo " selected=\"selected\"";?>>DKK</option>
											<option label="EGP" value="EGP"<?php if ($core->currency == "EGP") echo " selected=\"selected\"";?>>EGP</option>
											<option label="EUR" value="EUR"<?php if ($core->currency == "EUR") echo " selected=\"selected\"";?>>EUR</option>
											<option label="FJD" value="FJD"<?php if ($core->currency == "FJD") echo " selected=\"selected\"";?>>FJD</option>
											<option label="GBP" value="GBP"<?php if ($core->currency == "GBP") echo " selected=\"selected\"";?>>GBP</option>
											<option label="HKD" value="HKD"<?php if ($core->currency == "HKD") echo " selected=\"selected\"";?>>HKD</option>
											<option label="HRK" value="HRK"<?php if ($core->currency == "HRK") echo " selected=\"selected\"";?>>HRK</option>
											<option label="HUF" value="HUF"<?php if ($core->currency == "HUF") echo " selected=\"selected\"";?>>HUF</option>
											<option label="IDR" value="IDR"<?php if ($core->currency == "IDR") echo " selected=\"selected\"";?>>IDR</option>
											<option label="ILS" value="ILS"<?php if ($core->currency == "ILS") echo " selected=\"selected\"";?>>ILS</option>
											<option label="INR" value="INR"<?php if ($core->currency == "INR") echo " selected=\"selected\"";?>>INR</option>
											<option label="JPY" value="JPY"<?php if ($core->currency == "JPY") echo " selected=\"selected\"";?>>JPY</option>
											<option label="KES" value="KES"<?php if ($core->currency == "KES") echo " selected=\"selected\"";?>>KES</option>
											<option label="KRW" value="KRW"<?php if ($core->currency == "KRW") echo " selected=\"selected\"";?>>KRW</option>
											<option label="LTL" value="LTL"<?php if ($core->currency == "LTL") echo " selected=\"selected\"";?>>LTL</option>
											<option label="MAD" value="MAD"<?php if ($core->currency == "MAD") echo " selected=\"selected\"";?>>MAD</option>
											<option label="MXN" value="MXN"<?php if ($core->currency == "MXN") echo " selected=\"selected\"";?>>MXN</option>
											<option label="MYR" value="MYR"<?php if ($core->currency == "MYR") echo " selected=\"selected\"";?>>MYR</option>
											<option label="NGN" value="NGN"<?php if ($core->currency == "NGN") echo " selected=\"selected\"";?>>NGN</option>
											<option label="NOK" value="NOK"<?php if ($core->currency == "NOK") echo " selected=\"selected\"";?>>NOK</option>
											<option label="NZD" value="NZD"<?php if ($core->currency == "NZD") echo " selected=\"selected\"";?>>NZD</option>
											<option label="PEN" value="PEN"<?php if ($core->currency == "PEN") echo " selected=\"selected\"";?>>PEN</option>
											<option label="PHP" value="PHP"<?php if ($core->currency == "PHP") echo " selected=\"selected\"";?>>PHP</option>
											<option label="PKR" value="PKR"<?php if ($core->currency == "PKR") echo " selected=\"selected\"";?>>PKR</option>
											<option label="PLN" value="PLN"<?php if ($core->currency == "PLN") echo " selected=\"selected\"";?>>PLN</option>
											<option label="RON" value="RON"<?php if ($core->currency == "RON") echo " selected=\"selected\"";?>>RON</option>
											<option label="RSD" value="RSD"<?php if ($core->currency == "RSD") echo " selected=\"selected\"";?>>RSD</option>
											<option label="RUB" value="RUB"<?php if ($core->currency == "RUB") echo " selected=\"selected\"";?>>RUB</option>
											<option label="SAR" value="SAR"<?php if ($core->currency == "SAR") echo " selected=\"selected\"";?>>SAR</option>
											<option label="SEK" value="SEK"<?php if ($core->currency == "SEK") echo " selected=\"selected\"";?>>SEK</option>
											<option label="SGD" value="SGD"<?php if ($core->currency == "SGD") echo " selected=\"selected\"";?>>SGD</option>
											<option label="THB" value="THB"<?php if ($core->currency == "THB") echo " selected=\"selected\"";?>>THB</option>
											<option label="TRY" value="TRY"<?php if ($core->currency == "TRY") echo " selected=\"selected\"";?>>TRY</option>
											<option label="TWD" value="TWD"<?php if ($core->currency == "TWD") echo " selected=\"selected\"";?>>TWD</option>
											<option label="UAH" value="UAH"<?php if ($core->currency == "UAH") echo " selected=\"selected\"";?>>UAH</option>
											<option label="USD" value="USD"<?php if ($core->currency == "USD") echo " selected=\"selected\"";?>>Dollar</option>
											<option label="VEF" value="VEF"<?php if ($core->currency == "VEF") echo " selected=\"selected\"";?>>VEF</option>
											<option label="VND" value="VND"<?php if ($core->currency == "VND") echo " selected=\"selected\"";?>>VND</option>
											<option label="ZAR" value="ZAR"<?php if ($core->currency == "ZAR") echo " selected=\"selected\"";?>>ZAR</option>
											<option label="TJS" value="TJS"<?php if ($core->currency == "TJS") echo " selected=\"selected\"";?>>Somoni tayiko</option>
										</datalist>
									</div>
								</div>
							</div>					
							<hr />
							<h4 class="card-title"><b><?php echo $lang['tools-config53'] ?></b></h4>
							<div class="row">
								<section class="col col-6">
									<label for="lastName1"><img src='assets/images/alert/mailer.png' width='60' /> <?php echo $lang['tools-config54'] ?></label>
									<select name="mailer" id="mailerchange">
										<option value="PHP"<?php if ($core->mailer == "PHP") echo " selected=\"selected\"";?>>PHP Mailer</option>
										<option value="SMTP"<?php if ($core->mailer == "SMTP") echo " selected=\"selected\"";?>>SMTP Mailer</option>
									</select>
								</section>
							</div>
							<br><br>
							<div class="row showsmtp">
								<div class="col-md-4">
									<div class="form-group">
										<label for="firstName1">SMTP Hostname</label>
										<input type="text" title="<?php echo $lang['tools-config60'] ?>" data-toggle="tooltip" class="form-control" name="smtp_host" value="<?php echo $core->smtp_host;?>" placeholder="SMTP Hostname">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1">SMTP Username</label>
										<input type="text"class="form-control"  name="smtp_user" value="<?php echo $core->smtp_user;?>" placeholder="SMTP Username">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1">SMTP Password</label>
										<input type="password" class="form-control" name="smtp_pass" value="<?php echo $core->smtp_pass;?>" placeholder="SMTP Password">
									</div>
								</div>
							</div>
							
							<div class="row showsmtp">
								<div class="col-md-4">
									<div class="form-group">
										<div class="btn-group" data-toggle="buttons">
											<label class="btn">
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio4" name="is_ssl" value="1" <?php getChecked($core->is_ssl, 1); ?> class="custom-control-input">
													<label class="custom-control-label" for="customRadio4"> <?php echo $lang['tools-config14'] ?></label>
												</div>
											</label>
											<label class="btn">
												<div class="custom-control custom-radio">
													<input type="radio" id="customRadio5" name="is_ssl" value="0" <?php getChecked($core->is_ssl, 0); ?> class="custom-control-input">
													<label class="custom-control-label" for="customRadio5"> <?php echo $lang['tools-config15'] ?></label>
												</div>
											</label>
										</div>
										<div class="note"><?php echo $lang['tools-config55'] ?></div>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label for="lastName1">SMTP Port</label>
										<input type="text" title="<?php echo $lang['tools-config59'] ?>" data-toggle="tooltip" class="form-control" name="smtp_port" value="<?php echo $core->smtp_port;?>" placeholder="SMTP Port">
									</div>
								</div>								
							</div>
							
						</section>
						<div class="form-group">
							<div class="col-sm-12">										
								<button type="submit" class="btn btn-primary btn-confirmation" name="dosubmit" ><?php echo $lang['tools-config56'] ?> <span><i class="icon-ok"></i></span></button>								
							</div>
						</div>
						</form>
					</div>
				</div>
				<!-- Column -->
			</div>
		</div>
	</div>
	
	<div class="p-15 m-t-30">
		
	</div>
</div>

<?php echo Core::doForm("processConfig_general");?>
 
<script type="text/javascript">
// <![CDATA[
$(document).ready(function () {
	var res2 = '<?php echo $core->mailer;?>';
		(res2 == "SMTP" ) ? $('.showsmtp').show() : $('.showsmtp').hide();
    $('#mailerchange').change(function () {
		var res = $("#mailerchange option:selected").val();
		(res == "SMTP" ) ? $('.showsmtp').show() : $('.showsmtp').hide();
	});
	
});
// ]]>
</script>
