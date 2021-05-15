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
  
  class Core
  {
      
	  const sTable = "settings";
	  const nTable = "news";
	  const eTable = "email_templates";
	  const smsTable = "sms_templates";
	  const oTable = "offices";
	  const branchTable = "branchoffices";
	  const ccTable = "courier_com";
	  const yTable = "styles";
	  const ptTable = "packaging";
	  const pmTable = "met_payment";
	  const onlipayTable = "transactions";
	  const smTable = "shipping_mode";
	  const slineTable = "shipping_line";
	  const incoTable = "incoterm";
	  const raTable = "ship_rate";
	  const ciTable = "category";
	  const twTable = "textsms";
	  const tnxTable = "textsmsnexmo";
	  const cTable = "add_courier";
	  const cQuote = "quote";
	  const customNovelty = "custom_novelty";
	  const addcourierTable = "detail_addcourier";
	  const contaTable = "add_container";
	  const addcontaTable = "add_consolidate";
	  const addcouriertmpTable	= "detail_addcourier_tmp";
	  const ctmpTable = "detail_container_tmp";
	  const cdetailTable = "detail_container";
	  const delitimeTable = "delivery_time";
	  const contmpTable = "cons_tmp";
	  const consolTable = "consolidate";
	  const ctrackTable = "courier_track";
	  const zonTable = "zone";
      public $year = null;
      public $month = null;
      public $day = null;
	  private static $db;
	  
	  
      /**
       * Core::__construct()
       * @return
       */
      function __construct()
      {
		  self::$db = Registry::get("Database");
		  $this->getSettings();
		  
		  self::$db = Registry::get("Database");
		  $this->getSms();
		  
		  self::$db = Registry::get("Database");
		  $this->getSmsnex();
		  
          $this->year = (get('year')) ? get('year') : strftime('%Y');
          $this->month = (get('month')) ? get('month') : strftime('%m');
          $this->day = (get('day')) ? get('day') : strftime('%d');
          
          return mktime(0, 0, 0, $this->month, $this->day, $this->year);
      }
	        
      /**
       * Core::getSettings()
       */
      private function getSettings()
      {

          $sql = "SELECT * FROM " . self::sTable;
          $row = self::$db->first($sql);
          
          $this->site_name = $row->site_name;
		  $this->c_nit = $row->c_nit;
          $this->c_phone = $row->c_phone;
		  $this->cell_phone = $row->cell_phone;
		  $this->c_address = $row->c_address;
		  $this->locker_address = $row->locker_address;
		  $this->c_country = $row->c_country;
		  $this->c_city = $row->c_city;
		  $this->c_postal = $row->c_postal;
          $this->site_url = $row->site_url;
		  $this->site_email = $row->site_email;
		  $this->interms = $row->interms;
		  $this->signing_customer = $row->signing_customer;
		  $this->signing_company = $row->signing_company;
		  $this->user_perpage = $row->user_perpage;
		  $this->logo = $row->logo;
		  $this->favicon = $row->favicon;
		  $this->backup = $row->backup;
		  $this->thumb_w = $row->thumb_w;
		  $this->thumb_h = $row->thumb_h;
		  $this->reg_allowed = $row->reg_allowed;
		  $this->user_limit = $row->user_limit;
		  $this->reg_verify = $row->reg_verify;
		  $this->notify_admin = $row->notify_admin;
		  $this->auto_verify = $row->auto_verify;
		  $this->account_paypal = $row->account_paypal;
		  $this->client_id = $row->client_id;
          $this->mailer = $row->mailer;
          $this->smtp_host = $row->smtp_host;
          $this->smtp_user = $row->smtp_user;
          $this->smtp_pass = $row->smtp_pass;
          $this->smtp_port = $row->smtp_port;
		  $this->is_ssl = $row->is_ssl;
		  $this->version = $row->version;
		  $this->prefix = $row->prefix;
		  $this->track_digit = $row->track_digit;
		  $this->prefix_con = $row->prefix_con;
		  $this->track_container = $row->track_container;
		  $this->prefix_consolidate = $row->prefix_consolidate;
		  $this->track_consolidate = $row->track_consolidate;
		  $this->tax = $row->tax;
		  $this->insurance = $row->insurance;
		  $this->value_weight = $row->value_weight;
		  $this->meter = $row->meter;
		  $this->c_value_pound = $row->c_value_pound;
		  $this->c_add_pound = $row->c_add_pound;
		  $this->c_handling = $row->c_handling;
		  $this->c_fuel = $row->c_fuel;
		  $this->c_reexpedition = $row->c_reexpedition;
		  $this->c_logistic = $row->c_logistic;
		  $this->c_surcharges = $row->c_surcharges;
		  $this->c_safe = $row->c_safe;
		  $this->c_nationalization = $row->c_nationalization;
		  $this->c_tariffs = $row->c_tariffs;
		  $this->c_vat = $row->c_vat;
		  $this->longitude = $row->longitude;
		  $this->latitude = $row->latitude;
		  $this->apikey = $row->apikey;
		  $this->currency = $row->currency;
		  $this->timezone = $row->timezone;
		  $this->language = $row->language;

      }
	  
	  /**
       * Core::getSSms()
       */
      private function getSms()
      {

          $sql = "SELECT * FROM " . self::twTable;
          $row = self::$db->first($sql);
          
          $this->account_sid = $row->account_sid;
		  $this->auth_token = $row->auth_token;
          $this->twilio_number = $row->twilio_number;
		  $this->active_twi = $row->active_twi;

      }
	  
	   /**
       * Core::getSSmsnex()
       */
      private function getSmsnex()
      {

          $sql = "SELECT * FROM " . self::tnxTable;
          $row = self::$db->first($sql);
          
          $this->api_key = $row->api_key;
		  $this->api_secret = $row->api_secret;
          $this->nexmo_number = $row->nexmo_number;
		  $this->active_nex = $row->active_nex;

      }

      /**
       * Core::processConfig()
       */
	  public function processConfig()
	  {
		  
		  if (empty($_POST['site_name']))
			  Filter::$msgs['site_name'] = "Please enter Website Name!";
		  
		  if (empty($_POST['site_url']))
			  Filter::$msgs['site_url'] = "Please enter Website Url!";
		  
		  if (empty($_POST['site_email']))
			  Filter::$msgs['site_email'] = "Please enter valid Website Email address!";
		  
		  if (empty($_POST['thumb_w']))
			  Filter::$msgs['thumb_w'] = "Please enter Thumbnail Width!";
		  
		  if (empty($_POST['thumb_h']))
			  Filter::$msgs['thumb_h'] = "Please enter Thumbnail Height!";
		  
		  if (!empty($_FILES['logo']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['logo']['name'])) {
                  Filter::$msgs['logo'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['logo']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['logo'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (!empty($_FILES['favicon']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['favicon']['name'])) {
                  Filter::$msgs['favicon'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['favicon']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['favicon'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
					  'site_name' => sanitize($_POST['site_name']), 
					  'site_url' => sanitize($_POST['site_url']),
					  'c_nit' => sanitize($_POST['c_nit']),
					  'c_phone' => sanitize($_POST['c_phone']),
					  'cell_phone' => sanitize($_POST['cell_phone']),
					  'c_address' => sanitize($_POST['c_address']),
					  'locker_address' => sanitize($_POST['locker_address']),
					  'c_country' => sanitize($_POST['c_country']),
					  'c_city' => sanitize($_POST['c_city']),
					  'c_postal' => sanitize($_POST['c_postal']),
					  'site_email' => sanitize($_POST['site_email']),
					  'reg_allowed' => intval($_POST['reg_allowed']),
					  'user_limit' => intval($_POST['user_limit']),
					  'reg_verify' => intval($_POST['reg_verify']),
					  'notify_admin' => intval($_POST['notify_admin']),
					  'auto_verify' => intval($_POST['auto_verify']),
					  'user_perpage' => intval($_POST['user_perpage']),
					  'thumb_w' => intval($_POST['thumb_w']),
					  'thumb_h' => intval($_POST['thumb_h'])
			  );
			  
			  // Procces logo
              if (!empty($_FILES['logo']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "logo";
                  $text = substr($_FILES['logo']['name'], strrpos($_FILES['logo']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("logo", self::sTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['logo']['tmp_name'], $thumbName);
                  $data['logo'] = $tName . "." . strtolower($text);
              }
			  
			  // Procces favicon
              if (!empty($_FILES['favicon']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "favicon";
                  $text = substr($_FILES['favicon']['name'], strrpos($_FILES['favicon']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("favicon", self::sTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['favicon']['tmp_name'], $thumbName);
                  $data['favicon'] = $tName . "." . strtolower($text);
              }
			  
			  self::$db->update(self::sTable, $data);
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>System Configuration updated successfully!") : Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			   print Filter::msgStatus();
	  }
	  
	  
	  
	  /**
       * Core::processConfig general()
       */
	  public function processConfig_general()
	  {  
		  
		  if (empty($_POST['timezone']))
			  Filter::$msgs['timezone'] = "Please enter Timezone!";
		  if (empty($_POST['language']))
			  Filter::$msgs['language'] = "Please enter language!";

		  
		  if (empty(Filter::$msgs)) {
			  $data = array(		 
					  'mailer' => sanitize($_POST['mailer']),
					  'smtp_host' => sanitize($_POST['smtp_host']),
					  'smtp_user' => sanitize($_POST['smtp_user']),
					  'smtp_pass' => sanitize($_POST['smtp_pass']),
					  'smtp_port' => intval($_POST['smtp_port']),
					  'is_ssl' => intval($_POST['is_ssl']),					  
					  'timezone' => sanitize($_POST['timezone']),
					  'language' => sanitize($_POST['language']),
					  'currency' => sanitize($_POST['currency'])
			  );
			  
			  self::$db->update(self::sTable, $data);
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>System Configuration updated successfully!") : Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			   print Filter::msgStatus();
	  }
	  
	  
	  /**
       * Core::processConfig payment()
       */
	  public function processConfig_payment()
	  {  
		  
		  if (empty($_POST['account_paypal']))
			  Filter::$msgs['account_paypal'] = "Please enter account Paypal!";
		  if (empty($_POST['client_id']))
			  Filter::$msgs['client_id'] = "Please enter client id!";

		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
					  'account_paypal' => sanitize($_POST['account_paypal']),
					  'client_id' => sanitize($_POST['client_id'])		 
			  );
			  
			  self::$db->update(self::sTable, $data);
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>System Configuration updated successfully!") : Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			   print Filter::msgStatus();
	  }
	  
	  	  /**
       * Core::processConfig_apigooglekey()
       */
	  public function processConfig_apigooglekey()
	  {  
		  
		  if (empty($_POST['longitude']))
			  Filter::$msgs['longitude'] = "Please enter account longitude!";
		  if (empty($_POST['latitude']))
			  Filter::$msgs['latitude'] = "Please enter latitude!";
		  if (empty($_POST['apikey']))
			  Filter::$msgs['apikey'] = "Please enter apikey!";

		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
					  'longitude' => sanitize($_POST['longitude']),
					  'latitude' => sanitize($_POST['latitude']),
					  'apikey' => sanitize($_POST['apikey'])	 
			  );
			  
			  self::$db->update(self::sTable, $data);
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>System Configuration updated successfully!") : Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			   print Filter::msgStatus();
	  }
	  
	  
	  /**
       * Core::processConfig_taxes()
       */
	  public function processConfig_taxes()
	  {

		  if (empty($_POST['tax']))
			  Filter::$msgs['tax'] = "Please enter Tax!";
		  if (empty($_POST['insurance']))
			  Filter::$msgs['insurance'] = "Please enter Insurance!";
		  if (empty($_POST['value_weight']))
			  Filter::$msgs['value_weight'] = "Please enter Value Weight!";
		  if (empty($_POST['meter']))
			  Filter::$msgs['meter'] = "Please enter Volumetric Percentage!";

		  if (empty(Filter::$msgs)) {
			  $data = array(					  
					  'tax' => sanitize($_POST['tax']),
					  'insurance' => sanitize($_POST['insurance']),
					  'value_weight' => sanitize($_POST['value_weight']),
					  'meter' => sanitize($_POST['meter']),
					  'c_value_pound' => sanitize($_POST['c_value_pound']),
					  'c_add_pound' => sanitize($_POST['c_add_pound']),
					  'c_handling' => sanitize($_POST['c_handling']),
					  'c_fuel' => sanitize($_POST['c_fuel']),
					  'c_reexpedition' => sanitize($_POST['c_reexpedition']),
					  'c_logistic' => sanitize($_POST['c_logistic']),
					  'c_surcharges' => sanitize($_POST['c_surcharges']),
					  'c_safe' => sanitize($_POST['c_safe']),
					  'c_nationalization' => sanitize($_POST['c_nationalization']),
					  'c_tariffs' => sanitize($_POST['c_tariffs']),
					  'c_vat' => sanitize($_POST['c_vat']),					  
			  );
			  
			  self::$db->update(self::sTable, $data);
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>System Configuration updated successfully!") : Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			   print Filter::msgStatus();
	  }
	  
	  
	  	  /**
       * Core::processConfig_tracking invoice()
       */
	  public function processConfig_track_invoice()
	  {

		  if (empty($_POST['interms']))
			  Filter::$msgs['interms'] = "Please enter Terms!";
		  if (empty($_POST['prefix']))
			  Filter::$msgs['prefix'] = "Please enter prefix!";
		  if (empty($_POST['track_digit']))
			  Filter::$msgs['track_digit'] = "Please enter track Digit!";
		  if (empty($_POST['prefix_con']))
			  Filter::$msgs['prefix_con'] = "Please enter prefix Consolidate!";
		  if (empty($_POST['track_container']))
			  Filter::$msgs['track_container'] = "Please enter tracking Container!";
		  if (empty($_POST['prefix_consolidate']))
			  Filter::$msgs['prefix_consolidate'] = "Please enter prefix Consolidate!";
		  if (empty($_POST['track_consolidate']))
			  Filter::$msgs['track_consolidate'] = "Please enter tracking Consolidate!";

		  if (empty(Filter::$msgs)) {
			  $data = array(
					  'interms' => sanitize($_POST['interms']),
					  'signing_customer' => sanitize($_POST['signing_customer']),
					  'signing_company' => sanitize($_POST['signing_company']),
					  'prefix' => sanitize($_POST['prefix']),
					  'track_digit' => sanitize($_POST['track_digit']),
					  'prefix_con' => sanitize($_POST['prefix_con']),
					  'track_container' => sanitize($_POST['track_container']),
					  'prefix_consolidate' => sanitize($_POST['prefix_consolidate']),
					  'track_consolidate' => sanitize($_POST['track_consolidate'])
			  );
			  
			  self::$db->update(self::sTable, $data);
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>System Configuration updated successfully!") : Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			   print Filter::msgStatus();
	  }

	  /**
	   * Core::processNewsletter()
	   */
	  public function processNewsletter()
	  {
		  
		  if (empty($_POST['subject']))
			  Filter::$msgs['subject'] = "Please Enter Newsletter Subject";
		  
		  if (empty($_POST['body']))
			  Filter::$msgs['body'] = "Please Enter Email Message!";
		  
		  if (empty(Filter::$msgs)) {
				  $to = sanitize($_POST['recipient']);
				  $subject = sanitize($_POST['subject']);
				  $body = cleanOut($_POST['body']);

			  switch ($to) {
				  case "all":
					  require_once(BASEPATH . "lib/class_mailer.php");
					  $mailer = $mail->sendMail();
					  $mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(100,30));
					  
					  $sql = "SELECT email, CONCAT(fname,' ',lname) as name FROM " . Users::uTable . " WHERE id != 1";
					  $userrow = self::$db->fetch_all($sql);
					  
					  $replacements = array();
					  foreach ($userrow as $cols) {
						  $replacements[$cols->email] = array('[NAME]' => $cols->name,'[SITE_NAME]' => $this->site_name,'[URL]' => $this->site_url);
					  }
					  
					  $decorator = new Swift_Plugins_DecoratorPlugin($replacements);
					  $mailer->registerPlugin($decorator);
					  
					  $message = Swift_Message::newInstance()
								->setSubject($subject)
								->setFrom(array($this->site_email => $this->site_name))
								->setBody($body, 'text/html');
					  
					  foreach ($userrow as $row)
						  $message->addTo($row->email, $row->name);
					  unset($row);
					  
					  $numSent = $mailer->batchSend($message);
					  break;
					  
				  case "newsletter":
					  require_once(BASEPATH . "lib/class_mailer.php");
					  $mailer = $mail->sendMail();
					  $mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(100,30));
					  
					  $sql = "SELECT email, CONCAT(fname,' ',lname) as name FROM " . Users::uTable . " WHERE newsletter = '1' AND id != 1";
					  $userrow = self::$db->fetch_all($sql);
					  
					  $replacements = array();
					  foreach ($userrow as $cols) {
						  $replacements[$cols->email] = array('[NAME]' => $cols->name,'[SITE_NAME]' => $this->site_name,'[URL]' => $this->site_url);
					  }
					  
					  $decorator = new Swift_Plugins_DecoratorPlugin($replacements);
					  $mailer->registerPlugin($decorator);
					  
					  $message = Swift_Message::newInstance()
								->setSubject($subject)
								->setFrom(array($this->site_email => $this->site_name))
								->setBody($body, 'text/html');
					  
					  foreach ($userrow as $row)
						  $message->addTo($row->email, $row->name);
					  unset($row);
					  
					  $numSent = $mailer->batchSend($message);
					  break;
					  					  	  
				  default:
					  require_once(BASEPATH . "lib/class_mailer.php");
					  $mailer = $mail->sendMail();	
					  			  
					  $row = self::$db->first("SELECT email, CONCAT(fname,' ',lname) as name FROM " . Users::uTable . " WHERE email LIKE '%" . sanitize($to) . "%'");
					  
					  $newbody = str_replace(array('[NAME]', '[SITE_NAME]', '[URL]'), 
					  array($row->name, $this->site_name, $this->site_url), $body);

					  $message = Swift_Message::newInstance()
								->setSubject($subject)
							    ->setTo(array($to => $row->name))
								->setFrom(array($this->site_email => $this->site_name))
								->setBody($newbody, 'text/html');
					  
					  $numSent = $mailer->send($message);
					  break;
			  }

			  ($numSent) ? Filter::msgOk("<span>Success!</span>All Email(s) have been sent successfully!") :  Filter::msgAlert("<span>Error!</span>Some of the emails could not be reached!");

		  } else
			  print Filter::msgStatus();
	  }

      /**
       * Core::getEmailTemplates()
       */
      public function getEmailTemplates()
      {
          $sql = "SELECT * FROM " . self::eTable . " ORDER BY name ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  


	  /**
	   * Core:::processEmailTemplate()
	   */
	  public function processEmailTemplate()
	  {
		  
		  if (empty($_POST['name']))
			  Filter::$msgs['name'] = "Please Enter Template Title!";
		  
		  if (empty($_POST['subject']))
			  Filter::$msgs['subject'] = "Please Enter Email Subject!";

		  if (empty($_POST['body']))
			  Filter::$msgs['body'] = "Template Content is required!";
			  		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
					  'name' => sanitize($_POST['name']), 
					  'subject' => sanitize($_POST['subject']),
					  'body' => $_POST['body'],
					  'help' => $_POST['help']
			  );

			  self::$db->update(self::eTable, $data, "id='". Filter::$id ."'");
			  (self::$db->affected()) ? Filter::msgOk("<span>Success!</span>Email Template Updated Successfully") :  Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			  print Filter::msgStatus();
	  }
	  
	 
	  
	  
	  /**
       * Core::getSmsTemplates()
       */
      public function getSmsTemplates()
      {
          $sql = "SELECT * FROM " . self::smsTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  


	  /**
	   * Core:::processSmsTemplate()
	   */
	  public function processSmsTemplate()
	  {
		  
		  if (empty($_POST['name']))
			  Filter::$msgs['name'] = "Please Enter Template Title!";

		  if (empty($_POST['body1']))
			  Filter::$msgs['body1'] = "Template Content is required!";
		  
		  if (empty($_POST['body2']))
			  Filter::$msgs['body2'] = "Template Content is required!";
		  
		  if (empty($_POST['body3']))
			  Filter::$msgs['body3'] = "Template Content is required!";
			  		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
					  'name' => sanitize($_POST['name']), 
					  'help' => sanitize($_POST['help']),
					  'body1' => sanitize($_POST['body1']),
					  'body2' => sanitize($_POST['body2']),
					  'body3' => sanitize($_POST['body3']),
					  'active' => intval($_POST['active'])
			  );

			  self::$db->update(self::smsTable, $data, "id='" . Filter::$id . "'");
			  (self::$db->affected()) ? Filter::msgOk("<script type='text/javascript'> window.location='tools.php?do=templates_sms';</script><span>Success!</span>SMS Template Updated Successfully") :  Filter::msgAlert("<span>Alert!</span>Nothing to process.");
		  } else
			  print Filter::msgStatus();
	  }

      /**
       * Core::getNews()
       */
      public function getNews()
      {
          $sql = "SELECT *, DATE_FORMAT(created, '%d. %b. %Y') as cdate FROM " . self::nTable . " ORDER BY title ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getOffices()
       */
      public function getOffices()
      {
          $sql = "SELECT * FROM " . self::oTable . " ORDER BY name_off ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getBranchoffices()
       */
      public function getBranchoffices()
      {
          $sql = "SELECT * FROM " . self::branchTable . " ORDER BY name_branch ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getCouriercom()
       */
      public function getCouriercom()
      {
          $sql = "SELECT * FROM " . self::ccTable . " ORDER BY name_com ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	   /**
       * Core::getCourier()
       */
      public function getCourier()
      {
          $sql = "SELECT * FROM " . self::cTable . " WHERE status_novelty='0' ORDER BY s_name ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getCouriercontainer()
       */
      public function getCouriercontainer()
      {
          $sql = "SELECT * FROM " . self::ctmpTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getDriver()
       */
      public function getDrivers()
      {
          $sql = "SELECT * FROM " . self::oTable . " ORDER BY name_off ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	   /**
       * Core::getCouriercontainer()
       */
      public function getContainerline()
      {
          $sql = "SELECT a.id, a.idcon, a.order_inv, a.r_name, a.origin_port, a.status_courier, a.created, a.r_hour, a.destination_port, a.courier, a.payment_status, a.username, a.level, s.mod_style, s.color FROM add_container a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='3'  ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          return ($row) ? $row : 0;
      }

	  
	  /**
       * Core::getCourier_list()
       */
      public function getCourier_list()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getCourier_list_in_transit()
       */
      public function getCourier_list_intrasit()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='In Transit' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getCourier_list_in_In_Warehouse()
       */
      public function getCourier_list_In_Warehouse()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='In Warehouse' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getCourier_list_Received_Office()
       */
      public function getCourier_list_Received_Office()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='Received Office' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getCourier_list_On_Route()
       */
      public function getCourier_list_On_Route()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='On Route' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getCourier_list_Distribution()
       */
      public function getCourier_list_Distribution()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='Distribution' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getCourier_list_Pending_Collection()
       */
      public function getCourier_list_Pending_Collection()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='Pending Collection' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getCourier_list_Pick_up()
       */
      public function getCourier_list_Pick_up()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='Pick up' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getCourier_list_Picked_up()
       */
      public function getCourier_list_Picked_up()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='1' AND a.con_status='0' AND a.status_novelty='0' AND a.status_courier='Picked up' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getCourier_list_Pre Alert()
       */
      public function getCourier_list_Pre_Alert()
      {
		  
	  $sql = "SELECT a.id, a.qid, a.order_inv, a.r_name, a.r_qnty, a.r_dest, a.r_city, a.country, a.city, a.courier, a.service_options, a.payment_status, a.pay_mode, a.status_novelty, a.created, a.status_courier, a.status_prealert, a.s_name, a.level, s.mod_style, s.color  FROM add_courier a, styles s WHERE a.status_prealert=s.mod_style AND a.act_status='0' AND a.status_novelty='0' AND a.status_prealert='Pre Alert' ORDER BY a.qid DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	   /**
       * Core::getPickup_list()
       */
      public function getPickup_list()
      {
		  
	  $sql = "SELECT a.id, a.order_inv, a.r_qnty, a.country, a.city, a.r_addresspickup,  a.created, a.status_courier, a.s_name, a.id_pickup, a.c_driver, a.status_novelty, a.collection_courier, a.level, s.mod_style, s.color, a.username, a.c_driver, u.username, u.fname, u.lname  FROM add_courier a, styles s, users u WHERE a.status_courier=s.mod_style AND u.username=a.c_driver AND a.id_pickup='1' AND a.status_novelty='0' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getPrealert_list()
       */
      public function getPrealert_list()
      {
		  
	  $sql = "SELECT a.id, a.order_inv, a.order_purchase, a.r_qnty, a.country, a.city, a.courier,  a.created, a.status_courier, a.s_name, a.r_description, a.c_driver, a.status_novelty, a.supplier, a.package_invoice, a.level, a.origin_off, s.mod_style, s.color, a.username, a.act_status, a.c_driver  FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.act_status='0' AND status_novelty='0' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getQuote_list()
       */
      public function getQuote_list()
      {
		  
	  $sql = "SELECT a.id, a.order_quote, a.idquote, a.locker, a.s_name, a.phone, a.r_dest, a.r_city, a.created, a.status_quote, a.url_product, a.your_purchase, a.your_quote, s.mod_style, s.color, a.username FROM quote a, styles s WHERE a.status_quote=s.mod_style AND a.idquote='1' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getQuotes_list()
       */
      public function getQuotes_list()
      {
		  
	  $sql = "SELECT a.id, a.order_quote, a.idquote, a.locker, a.s_name, a.phone, a.r_dest, a.r_city, a.created, a.status_quote, a.url_product, a.your_purchase, a.your_quote, a.r_costotal, s.mod_style, s.color, a.username FROM quote a, styles s WHERE a.status_quote=s.mod_style AND a.idquote='2' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  /**
       * Core::getQuoteapproved_list()
       */
      public function getQuoteapproved_list()
      {
		  
	  $sql = "SELECT a.id, a.order_quote, a.idquote, a.locker, a.s_name, a.phone, a.r_dest, a.r_city, a.created, a.status_quote, a.avatar, a.url_product, a.your_purchase, a.your_quote, a.r_costotal, s.mod_style, s.color, a.username FROM quote a, styles s WHERE a.status_quote=s.mod_style AND (a.idquote='3' OR a.idquote='4') ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getConsolidate_list()
       */
      public function getConsolidate_list()
      {
		  
	  $sql = "SELECT a.id, a.order_inv, a.r_name, a.r_dest, a.r_address, a.r_qnty, b.status_novelty, a.r_weight, a.c_driver, a.created, a.status_courier, a.code_off, a.agency, a.act_status, a.consol_tid, a.level, s.mod_style, s.color, b.order_inv, b.n_trackc, b.consol_tid  
			  FROM consolidate a, styles s, add_courier b WHERE a.status_courier=s.mod_style AND a.consol_tid=b.consol_tid AND a.act_status='1' AND a.con_status='1' AND b.status_novelty='0' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getNovelty_list()
       */
      public function getNovelty_list()
      {
		  
	  $sql = "SELECT a.id, b.id, a.order_inv, a.status_novelty, b.id_custom, 	a.agency, b.type_novelty, b.novelty_concept, b.novelty_observation, b.novelty_origin, b.created, b.date_novelty, b.status_novelty, b.origin_off, b.level
			  FROM add_courier a, custom_novelty b WHERE b.id_custom=a.id AND a.status_novelty='1' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  /**
       * Core::getNoveltyliberate_list()
       */
      public function getNoveltyliberate_list()
      {
		  
	  $sql = "SELECT a.id, b.id, a.order_inv, a.status_novelty, b.id_custom, 	a.agency, b.type_novelty, b.novelty_concept, b.novelty_observation, b.novelty_observation_liberate, b.novelty_origin, b.created, b.date_novelty, b.date_novelty_liberate, b.status_novelty, b.origin_off, b.level
			  FROM add_courier a, custom_novelty b WHERE b.id_custom=a.id AND a.status_novelty='0' ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }
	  
	  
	  
	  
	  /**
       * Core::getConsolidate_print()
       */
      public function getConsolidate_print()
      {
		  
	  $sql = "SELECT a.id, a.order_inv, a.r_name, a.r_dest, a.r_address, a.r_qnty, a.r_weight, a.status_novelty, a.c_driver,a.created, a.status_courier, a.code_off, b.order_inv, b.consol_tid, b.r_description
			  FROM consolidate a, add_courier b WHERE a.consol_tid=b.consol_tid  AND a.status_novelty='0'ORDER BY a.id DESC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;

      }

	  
	  /**
       * Core::getCourier Online()
       */
      public function getCourier_list_online()
      {
          $sql = "SELECT * FROM " . self::cTable . " WHERE status_courier = 'Pending' AND status_novelty='0' LIMIT 10 ";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	  /**
       * Core::getPack()
       */
      public function getPack()
      {
          $sql = "SELECT * FROM " . self::ptTable . " ORDER BY name_pack ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	   /**
       * Core::getItem()
       */
      public function getItem()
      {
          $sql = "SELECT * FROM " . self::ciTable . " ORDER BY name_item ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getZone()
       */
      public function getZone()
      {
          $sql = "SELECT * FROM " . self::zonTable . " ORDER BY zone_name ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getStatus()
       */
      public function getStatus()
      {
          $sql = "SELECT * FROM " . self::yTable . " ORDER BY mod_style ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getPayment()
       */
      public function getPayment()
      {
          $sql = "SELECT * FROM " . self::pmTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getPaymentsonline()
       */
      public function getPaymentsonline()
      {
          $sql = "SELECT * FROM " . self::onlipayTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	   /**
       * Core::getShipmode()
       */
      public function getShipmode()
      {
          $sql = "SELECT * FROM " . self::smTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getDelitime()
       */
      public function getDelitime()
      {
          $sql = "SELECT * FROM " . self::delitimeTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	  
	  
	   /**
       * Core::getShipline()
       */
      public function getShipline()
      {
          $sql = "SELECT * FROM " . self::slineTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getIncoterms()
       */
      public function getIncoterms()
      {
          $sql = "SELECT * FROM " . self::incoTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	  /**
       * Core::getSmsnexmo()
       */
      public function getSmsnexmo()
      {
          $sql = "SELECT * FROM " . self::tnxTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getSmstwilio()
       */
      public function getSmstwilio()
      {
          $sql = "SELECT * FROM " . self::twTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	  
	  /**
       * Core::getAllship()
       */
      public function getAllship()
      {
          $sql = "SELECT a.id, a.order_inv, a.s_name, a.email, a.status_courier, a.created, a.r_hour, a.r_costtotal, a.total_tax, a.total_insurance, a.agency, a.level, a.status_novelty, a.origin_off, s.mod_style, s.color FROM add_courier a, styles s WHERE a.status_courier=s.mod_style  AND a.act_status='1' AND a.status_novelty='0' ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
		  
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getPREALERTship()
       */
      public function getPREALERTship()
      {
          $sql = "SELECT a.id, a.order_inv, a.order_purchase, a.s_name, a.email, a.supplier, a.r_description, a.r_custom, a.courier, a.status_courier, a.created, a.r_hour, a.r_costtotal, a.level, a.status_novelty, a.origin_off, s.mod_style, s.color FROM add_courier a, styles s WHERE a.status_courier=s.mod_style  AND a.status_prealert='Pre Alert' AND act_status=1 AND a.status_novelty='0' ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getPendingship()
       */
      public function getPendingship()
      {
          $sql = "SELECT a.id, a.order_inv, a.s_name, a.email, a.status_courier, a.r_costtotal, a.total_tax, a.total_insurance, a.level, a.status_novelty, a.origin_off, s.mod_style, s.color FROM add_courier a, styles s WHERE a.status_courier=s.mod_style  AND a.status_courier='Pending' AND a.status_novelty='0' ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getRejectedship()
       */
      public function getRejectedship()
      {
          $sql = "SELECT a.id, a.order_inv, a.s_name, a.email, a.status_courier, a.reasons, a.level, a.status_novelty, a.origin_off, s.mod_style, s.color FROM add_courier a, styles s WHERE a.status_courier=s.mod_style  AND a.status_courier='Rejected' AND a.status_novelty='0' ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getDeliveredship()
       */
      public function getDeliveredship()
      {
          $sql = "SELECT a.id, a.order_inv, a.s_name, a.email, a.deliver_date, a.delivery_hour, a.name_employee, a.status_courier, a.status_novelty, a.r_costtotal, a.total_tax, a.total_insurance, a.level, a.origin_off, s.mod_style, s.color FROM add_courier a, styles s WHERE a.status_courier=s.mod_style  AND a.status_courier='Delivered' AND a.status_novelty='0' ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getDeliveredconsol()
       */
      public function getDeliveredconsol()
      {
          $sql = "SELECT a.id, a.order_inv, a.r_name, a.r_email, a.comments, a.deliver_date, a.delivery_hour, a.name_employee, a.status_courier, a.r_costtotal, a.level, a.code_off, s.mod_style, s.color FROM consolidate a, styles s WHERE a.status_courier=s.mod_style  AND a.status_courier='Delivered'  ORDER BY a.id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getBillingship()  
       */
      public function getBillingship()
      {
          $sql = "SELECT * FROM " . self::cTable . " WHERE status_courier='Delivered' AND act_status='2' AND status_novelty='0' ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getBillingcon()
       */
      public function getBillingcon()
      {
          $sql = "SELECT * FROM detail_container, add_container WHERE add_container.idcon=detail_container.idcon";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
       * Core::getBillingconso()
       */
      public function getBillingconso()
      {
          $sql = "SELECT * FROM consolidate WHERE act_status='2' ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	   /**
       * Core::getShiprates()
       */
      public function getShiprates()
      {
          $sql = "SELECT * FROM " . self::raTable . " ORDER BY id ASC";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  public function getShip_rates()
      {
		
          $sql = "SELECT * FROM " . self::raTable . "";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	   /**
       * Core::getCount()
       */
      public function getCounton()
      {
		  $pager->items_total = countEntries(self::cTable);
          $sql = "SELECT COUNT(id) as total FROM " . self::cTable . " WHERE status_courier = 'Pending' AND status_novelty='0'";
          $row = self::$db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  
	   /**
       * Core::cost total index()
       */
      public function getcosstotalcourier()
      {
		 $courbudget = 0;
		$sql = "SELECT r_costtotal FROM " . self::cTable . " WHERE act_status = '1' AND con_status= '0' AND payment_status='0' AND status_novelty='0'";
		$row = self::$db->fetch_all($sql);
          
         foreach ($row  as $budget){
			return   $courbudget+= $budget->r_costtotal;	
			}  
      }
	  
	  public function getcosstotalconsolidate()
      {
		 $conbudget = 0;
		$sql = "SELECT r_costtotal FROM " . self::consolTable . " WHERE act_status = '1' AND con_status= '1' AND payment_status='0'";
		$row = self::$db->fetch_all($sql);
          
         foreach ($row  as $budgets){
			return   $conbudget+= $budgets->r_costtotal;	
			}  
      }
	  
	   /**
       * Core::Current month total costs()
       */
	   public function getcosstotalcouriermonth()
      {
		$month = date('m');
		$year = date('Y'); //2019
		$courbudget = 0;
		$sql = "SELECT r_costtotal FROM " . self::cTable . " WHERE month(created)='$month' AND year(created)='$year' AND act_status = '1' AND con_status='0' AND payment_status='0' AND status_novelty='0'";
		$row = self::$db->fetch_all($sql);
          
         foreach ($row  as $budget){
			return   $courbudget+= $budget->r_costtotal;	
			}  
      }
	  
	  public function getcosstotalconsolidatemonth()
      {
		$month = date('m');
		$year = date('Y'); //2019
		$conbudget = 0;
		$sql = "SELECT r_costtotal FROM " . self::consolTable . " WHERE month(created)='$month' AND year(created)='$year' AND  con_status='1' AND payment_status='0'";
		$row = self::$db->fetch_all($sql);
          
         foreach ($row  as $budgets){
			return   $conbudget+= $budgets->r_costtotal;	
			}  
      }
	  

	
	  
	   /**
       * Core::getRates()
       */
       public function getRates()
      {
		  if(isset($_POST['submit'])){
			
              $weight = sanitize($_POST['weight']);
              
			  if($weight >= 0.5 && $weight <= 20){
			   $sql = "SELECT * FROM " . self::raTable . " WHERE weight  BETWEEN ".$weight." AND 20";
			  $row = self::$db->fetch_all($sql);
			   return ($row) ? $row : 0; 
			  }else if($weight >= 21 && $weight <= 44){

				 $sql = "SELECT * FROM " . self::raTable . " WHERE weight  BETWEEN ".$weight." AND 44";
					$row = self::$db->fetch_all($sql); 
				 return ($row) ? $row : 0;	
			  }else if($weight >= 45 && $weight <= 70){

				 $sql = "SELECT * FROM " . self::raTable . " WHERE weight  BETWEEN ".$weight." AND 70";
					$row = self::$db->fetch_all($sql); 
				 return ($row) ? $row : 0;
			  }else if($weight >= 71 && $weight <= 99){

				 $sql = "SELECT * FROM " . self::raTable . " WHERE weight  BETWEEN ".$weight." AND 99";
					$row = self::$db->fetch_all($sql); 
				 return ($row) ? $row : 0;
			  }else if($weight >= 100 && $weight <= 245){

				 $sql = "SELECT * FROM " . self::raTable . " WHERE weight  BETWEEN ".$weight." AND 245";
					$row = self::$db->fetch_all($sql); 
				 return ($row) ? $row : 0;
			  }
                        
			   return ($row) ? $row : 0; 
			 
			}
	  }  
          
          
      public function preAutoFiled($id){
              
	   $sql = "SELECT * FROM " . self::raTable . " WHERE id >= $id  LIMIT 1";
	   $row = self::$db->fetch_all($sql);
			foreach ($row  as $to_return){
			   return $to_return;
			}  
	  }
	  
	  
	   /**
       * Core::getTracking()
       */
      public function getTrack_post()
      {
		  if(isset($_POST['submit'])){
			  
			$order_inv = sanitize($_POST['order_inv']);
			  
				$sql = "SELECT a.id, a.order_inv, a.s_name, a.r_name, a.r_city, a.created, a.r_hour, a.address, a.r_qnty, a.package, a.r_weight, a.v_weight, r_address, a.r_dest, a.city, a.country, a.collection_courier, a.status_courier, a.status_novelty, a.person_receives,
							   a.latitude, a.longitude, a.latitude_history, a.longitude_history, s.color, s.mod_style FROM add_courier a, styles s WHERE a.status_courier=s.mod_style AND a.order_inv = '$order_inv' AND a.status_novelty='0'";
				  $row = self::$db->fetch_all($sql);
				   return ($row) ? $row : 0;
			}
	  } 
	  
	  
	   /**
       * Core::getTrack map google()
       */
      public function getTrack_mapgoogle()
      {
		
	
				$sql = "SELECT * FROM " . self::cTable ." WHERE id='" . Filter::$id . "' AND status_novelty='0'";
				  $row = self::$db->fetch_all($sql);
				   return ($row) ? $row : 0;
			
	  } 
	  
	  
	   /**
       * Core::getTracking()
       */
      public function getTrackconsolidated_post()
      {
		  if(isset($_POST['submit'])){
			  
			$order_inv = sanitize($_POST['order_inv']);
			  
				$sql = "SELECT * FROM " . self::consolTable ." WHERE order_inv = '$order_inv'";
				  $row = self::$db->fetch_all($sql);
				   return ($row) ? $row : 0;
			}
	  } 

	   /**
       * Core::getTracking()
       */
      public function getTrack_post_history()
      {
		  if(isset($_POST['submit'])){
			  
			$order_track = sanitize($_POST['order_inv']);
			  
			$sql = "SELECT a.id, a.t_id, a.order_track, a.t_dest, a.t_city, a.comments, a.t_date, a.t_hour, a.latitude_history, a.longitude_history, a.status_courier, s.mod_style, s.color FROM courier_track a, styles s  WHERE a.status_courier=s.mod_style AND a.order_track = '$order_track' ORDER BY a.id DESC";
			  $row = self::$db->fetch_all($sql);
			   return ($row) ? $row : 0;
			}
	  }  

      /**
       * Core::renderNews()
       */
      public function renderNews()
      {
          $sql = "SELECT *, DATE_FORMAT(created, '%d. %b. %Y') as cdate FROM " . self::nTable . " WHERE active = 1";
          $row = self::$db->first($sql);
          
          return ($row) ? $row : 0;
      }
	  
	  /**
	   * Content::processNews()
	   */
	  public function processNews()
	  {
		  
		  if (empty($_POST['title']))
			  Filter::$msgs['title'] = 'Please Enter News Title';

		  if (empty($_POST['body']))
			  Filter::$msgs['body'] = 'Please Enter News Content';
			  		  
		  if (empty($_POST['created']))
			  Filter::$msgs['created'] = 'Please Enter Valid Date';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'title' => sanitize($_POST['title']), 
				  'author' => sanitize($_POST['author']), 
				  'body' => sanitize($_POST['body']),
				  'created' => sanitize($_POST['created']),
				  'active' => intval($_POST['active'])
			  );

			  if ($data['active'] == 1) {
				  $news['active'] = "DEFAULT(active)";
				  self::$db->update(self::nTable, $news);
			  }
			  
			  (Filter::$id) ? self::$db->update(self::nTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::nTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>News item updated successfully!' : '<span>Success!</span>News item added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  
	   /**
	   * Content::processSmstwilio()
	   */
	  public function processSmstwilio()
	  {
		  
		  if (empty($_POST['namesms']))
			  Filter::$msgs['namesms'] = 'Please Enter SMS Company';

		  if (empty($_POST['account_sid']))
			  Filter::$msgs['account_sid'] = 'Please Enter Account Sid';
			  		  
		  if (empty($_POST['auth_token']))
			  Filter::$msgs['auth_token'] = 'Please Enter Auth Token';
		  
		  if (empty($_POST['twilio_number']))
			  Filter::$msgs['twilio_number'] = 'Please Enter Twilio Number';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'namesms' => sanitize($_POST['namesms']), 
				  'account_sid' => sanitize($_POST['account_sid']), 
				  'auth_token' => sanitize($_POST['auth_token']),
				  'twilio_number' => sanitize($_POST['twilio_number']),
				  'active_twi' => intval($_POST['active_twi'])
			  );

			  if ($data['active_twi'] == 1) {
				  $news['active_twi'] = "DEFAULT(active_twi)";
				  self::$db->update(self::twTable, $news);
			  }
			  
			  (Filter::$id) ? self::$db->update(self::twTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::twTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>SMS Twilio updated successfully!' : '<span>Success!</span>SMS Twilio added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  /**
       * User::activateTwilio()
       */
      public function activateTwilio()
      {

          $data['active_twi'] = 1;
		  self::$db->update(self::twTable, $data, "id = '" . Filter::$id . "'");

		  (self::$db->affected()) ? Filter::msgOk('<script type="text/javascript"> window.location="all_tools.php?do=config_sms";</script><span>Success!</span>SMS Twilio have been successfully activated.', false):'<script type="text/javascript"> window.location="tools.php?do=sms";</script><span>Success!</span>SMS Twilio have been successfully activated.';
      }
	  
	  
	   /**
	   * Content::processSmsNexmo()
	   */
	  public function processSmsnexmo()
	  {
		  
		  if (empty($_POST['namesms']))
			  Filter::$msgs['namesms'] = 'Please Enter SMS Company';

		  if (empty($_POST['api_key']))
			  Filter::$msgs['api_key'] = 'Please Enter Api Key';
			  		  
		  if (empty($_POST['api_secret']))
			  Filter::$msgs['api_secret'] = 'Please Enter Api Secret';
		  
		  if (empty($_POST['nexmo_number']))
			  Filter::$msgs['nexmo_number'] = 'Please Enter Nexmo Number';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'namesms' => sanitize($_POST['namesms']), 
				  'api_key' => sanitize($_POST['api_key']), 
				  'api_secret' => sanitize($_POST['api_secret']),
				  'nexmo_number' => sanitize($_POST['nexmo_number']),
				  'active_nex' => intval($_POST['active_nex'])
			  );

			  if ($data['active_nex'] == 1) {
				  $news['active_nex'] = "DEFAULT(active_nex)";
				  self::$db->update(self::tnxTable, $news);
			  }
			  
			  (Filter::$id) ? self::$db->update(self::tnxTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::tnxTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>SMS Nexmo updated successfully!' : '<span>Success!</span>SMS Nexmo added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  /**
       * User::activateNexmo()
       */
      public function activateNexmo()
      {

          $data['active_nex'] = 1;
		  self::$db->update(self::tnxTable, $data, "id = '" . Filter::$id . "'");

		  (self::$db->affected()) ? Filter::msgOk('<script type="text/javascript"> window.location="all_tools.php?do=config_sms";</script><span>Success!</span>SMS Nexmo have been successfully activated.', false):'<script type="text/javascript"> window.location="tools.php?do=sms";</script><span>Success!</span>SMS Nexmo have been successfully activated.';
		
      }
	  
	   /**
       * User::activateSMS()
       */
      public function activateSMS()
      {

          $data['active'] = 1;
		  self::$db->update(self::smsTable, $data, "id = '" . Filter::$id . "'");

		  (self::$db->affected()) ? Filter::msgOk('<script type="text/javascript"> window.location="tools.php?do=templates_sms";</script><span>Success!</span>SMS TEMPLATE have been successfully activated.', false):'<script type="text/javascript"> window.location="tools.php?do=templates_sms";</script><span>Success!</span>SMS TEMPLATE have been successfully activated.';
		
      }

	  
	  /**
	   * Content::processOffices()
	   */
	  public function processOffices()
	  {
		  
		  if (empty($_POST['name_off']))
			  Filter::$msgs['name_off'] = 'Please Enter New Offices';
		  
		  if (!Filter::$id) {
			  if ($this->officeExists($_POST['name_off']))
				  Filter::$msgs['name_off'] = 'The new office is already in use.. <b>"'.$_POST['name_off'].'"</b>';
		  }
		  
		  if (empty($_POST['code_off']))
			  Filter::$msgs['code_off'] = 'Please Enter New Code Offices';
		  
		  if (!Filter::$id) {
			  if ($this->codeofficeExists($_POST['code_off']))
				  Filter::$msgs['code_off'] = 'The new code office is already in use.. <b>"'.$_POST['code_off'].'"</b>';
		  }

		  if (empty($_POST['address']))
			  Filter::$msgs['address'] = 'Please Enter New Address';
			  		  
		  if (empty($_POST['city']))
			  Filter::$msgs['city'] = 'Please Enter New City';
		  
		  if (empty($_POST['phone_off']))
			  Filter::$msgs['phone_off'] = 'Please Enter Phone';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'name_off' => sanitize($_POST['name_off']), 
				  'code_off' => sanitize($_POST['code_off']),
				  'address' => sanitize($_POST['address']), 
				  'city' => sanitize($_POST['city']),
				  'phone_off' => sanitize($_POST['phone_off'])
			  );
			  
			  (Filter::$id) ? self::$db->update(self::oTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::oTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Office updated successfully!' : '<span>Success!</span>New Office added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  
	  	  /**
	   * Content::processDelitime()
	   */
	  public function processDelitime()
	  {
		  
		  if (empty($_POST['delitime']))
			  Filter::$msgs['delitime'] = 'Please Enter delivery time';
		  
		  if (!Filter::$id) {
			  if ($this->DelitimeExists($_POST['delitime']))
				  Filter::$msgs['delitime'] = 'The new delivery time is already in use.. <b>"'.$_POST['delitime'].'"</b>';
		  }
		  

		  if (empty($_POST['detail']))
			  Filter::$msgs['detail'] = 'Please Enter detail delivery time';
			  		  
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'delitime' => sanitize($_POST['delitime']), 
				  'detail' => sanitize($_POST['detail'])
			  );
			  
			  (Filter::$id) ? self::$db->update(self::delitimeTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::delitimeTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New delivery time updated successfully!' : '<span>Success!</span>New delivery time added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  
	  
	  /**
	   * Content::processBranchoffices()
	   */
	  public function processBranchoffices()
	  {
		  
		  if (empty($_POST['name_branch']))
			  Filter::$msgs['name_branch'] = 'Please Enter New Branch Offices';
		  
		  if (!Filter::$id) {
			  if ($this->branchofficeExists($_POST['name_branch']))
				  Filter::$msgs['name_branch'] = 'The new branch office is already in use.. <b>"'.$_POST['name_branch'].'"</b>';
		  }
		  

		  if (empty($_POST['branch_address']))
			  Filter::$msgs['branch_address'] = 'Please Enter New Address';
			  		  
		  if (empty($_POST['branch_city']))
			  Filter::$msgs['branch_city'] = 'Please Enter New City';
		  
		  if (empty($_POST['phone_branch']))
			  Filter::$msgs['phone_branch'] = 'Please Enter Phone';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'name_branch' => sanitize($_POST['name_branch']), 
				  'branch_address' => sanitize($_POST['branch_address']), 
				  'branch_city' => sanitize($_POST['branch_city']),
				  'phone_branch' => sanitize($_POST['phone_branch'])
			  );
			  
			  (Filter::$id) ? self::$db->update(self::branchTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::branchTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New branch Office updated successfully!' : '<span>Success!</span>New branch Office added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	   /**
	   * Content::processCouriercom()
	   */
	  public function processCouriercom()
	  {
		  
		  if (empty($_POST['name_com']))
			  Filter::$msgs['name_com'] = 'Please Enter New Courier Company';
		  
		  if (!Filter::$id) {
			  if ($this->courierExists($_POST['name_com']))
				  Filter::$msgs['name_com'] = 'The new Courier Company is already in use.. <b>"'.$_POST['name_com'].'"</b>';
		  }

		  if (empty($_POST['address_cou']))
			  Filter::$msgs['address_cou'] = 'Please Enter New Address';
		  
		  if (empty($_POST['phone_cou']))
			  Filter::$msgs['phone_cou'] = 'Please Enter Phone';
		  
		  if (empty($_POST['country_cou']))
			  Filter::$msgs['country_cou'] = 'Please Enter New Country';
			  		  
		  if (empty($_POST['city_cou']))
			  Filter::$msgs['city_cou'] = 'Please Enter New City';
		  
		  if (empty($_POST['postal_cou']))
			  Filter::$msgs['postal_cou'] = 'Please Enter Postal Code';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'name_com' => sanitize($_POST['name_com']), 
				  'address_cou' => sanitize($_POST['address_cou']), 
				  'phone_cou' => sanitize($_POST['phone_cou']), 
				  'country_cou' => sanitize($_POST['country_cou']), 
				  'city_cou' => sanitize($_POST['city_cou']),
				  'postal_cou' => sanitize($_POST['postal_cou'])
			  );
			  
			  (Filter::$id) ? self::$db->update(self::ccTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::ccTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Courier Company updated successfully!' : '<span>Success!</span>New Courier Company added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  /**
	   * Content::processStatus()
	   */
	  public function processStatus()
	  {
		  
		  if (empty($_POST['mod_style']))
			  Filter::$msgs['mod_style'] = 'Please Enter New Status';
		  
		  if (!Filter::$id) {
			  if ($this->statusExists($_POST['mod_style']))
				  Filter::$msgs['mod_style'] = 'The new Status is already in use.. <b>"'.$_POST['mod_style'].'"</b>';
		  }

		  if (empty($_POST['detail']))
			  Filter::$msgs['detail'] = 'Please Enter New Observations';
			  		  
		  if (empty($_POST['color']))
			  Filter::$msgs['color'] = 'Please Enter New Color';
		  
		  if (!Filter::$id) {
			  if ($this->statusExists($_POST['color']))
				  Filter::$msgs['color'] = 'The new Color is already in use.. <b>"'.$_POST['color'].'"</b>';
		  }
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'mod_style' => sanitize($_POST['mod_style']), 
				  'detail' => sanitize($_POST['detail']), 
				  'color' => sanitize($_POST['color'])
			  );
			  
			  (Filter::$id) ? self::$db->update(self::yTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::yTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Status updated successfully!' : '<span>Success!</span>New Status added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  
	  /**
	   * Content::processPayment()
	   */
	  public function processPayment()
	  {
		  
		  if (empty($_POST['met_payment']))
			  Filter::$msgs['met_payment'] = 'Please Enter New Method Payment';
		  
		  if (!Filter::$id) {
			  if ($this->statusExists($_POST['met_payment']))
				  Filter::$msgs['met_payment'] = 'The new Method Payment is already in use.. <b>"'.$_POST['met_payment'].'"</b>';
		  }

		  if (empty($_POST['detail']))
			  Filter::$msgs['detail'] = 'Please Enter New Observations';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'met_payment' => sanitize($_POST['met_payment']), 
				  'detail' => sanitize($_POST['detail']) 
			  );
			  
			  (Filter::$id) ? self::$db->update(self::pmTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::pmTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Method Payment updated successfully!' : '<span>Success!</span>New Method Payment added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	   /**
	   * Content::processShipmode()
	   */
	  public function processShipmode()
	  {
		  
		  if (empty($_POST['ship_mode']))
			  Filter::$msgs['ship_mode'] = 'Please Enter New Shipping Mode';
		  
		  if (!Filter::$id) {
			  if ($this->statusExists($_POST['ship_mode']))
				  Filter::$msgs['ship_mode'] = 'The new Shipping mode is already in use.. <b>"'.$_POST['ship_mode'].'"</b>';
		  }

		  if (empty($_POST['detail']))
			  Filter::$msgs['detail'] = 'Please Enter New Observations';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'ship_mode' => sanitize($_POST['ship_mode']), 
				  'detail' => sanitize($_POST['detail']) 
			  );
			  
			  (Filter::$id) ? self::$db->update(self::smTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::smTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Shipping mode updated successfully!' : '<span>Success!</span>New Shipping mode added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	   /**
	   * Content::processShipline()
	   */
	  public function processShipline()
	  {
		  
		  if (empty($_POST['ship_line']))
			  Filter::$msgs['ship_line'] = 'Please Enter New Shipping Line';
		  
		  if (!Filter::$id) {
			  if ($this->lineExists($_POST['ship_line']))
				  Filter::$msgs['ship_line'] = 'The new Shipping line is already in use.. <b>"'.$_POST['ship_line'].'"</b>';
		  }

		  if (empty($_POST['detail']))
			  Filter::$msgs['detail'] = 'Please Enter New Observations';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'ship_line' => sanitize($_POST['ship_line']), 
				  'detail' => sanitize($_POST['detail']) 
			  );
			  
			  (Filter::$id) ? self::$db->update(self::slineTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::slineTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Shipping line updated successfully!' : '<span>Success!</span>New Shipping line added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	   /**
	   * Content::processIncoterms()
	   */
	  public function processIncoterms()
	  {
		  
		  if (empty($_POST['inco_name']))
			  Filter::$msgs['inco_name'] = 'Please Enter New Incoterms';
		  
		  if (!Filter::$id) {
			  if ($this->incoExists($_POST['inco_name']))
				  Filter::$msgs['inco_name'] = 'The new Incoterms is already in use.. <b>"'.$_POST['inco_name'].'"</b>';
		  }

		  if (empty($_POST['detail']))
			  Filter::$msgs['detail'] = 'Please Enter New Observations';
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'inco_name' => sanitize($_POST['inco_name']), 
				  'detail' => sanitize($_POST['detail']) 
			  );
			  
			  (Filter::$id) ? self::$db->update(self::incoTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::incoTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Incoterms updated successfully!' : '<span>Success!</span>New Incoterms added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  /**
	   * Content::processPack()
	   */
	  public function processPack()
	  {
		  
		  if (empty($_POST['name_pack']))
			  Filter::$msgs['name_pack'] = 'Please Enter New Packaging Type';
		  
		  if (!Filter::$id) {
			  if ($this->packExists($_POST['name_pack']))
				  Filter::$msgs['name_pack'] = 'The new Packaging Type is already in use.. <b>"'.$_POST['name_pack'].'"</b>';
		  }

		  if (empty($_POST['detail_pack']))
			  Filter::$msgs['detail_pack'] = 'Please Enter New Details Packaging Type';
			  		  
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'name_pack' => sanitize($_POST['name_pack']), 
				  'detail_pack' => sanitize($_POST['detail_pack']) 
			  );
			  
			  (Filter::$id) ? self::$db->update(self::ptTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::ptTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Packaging Type updated successfully!' : '<span>Success!</span>New Packaging Type added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  /**
	   * Content::processItem()
	   */
	  public function processItem()
	  {
		  
		  if (empty($_POST['name_item']))
			  Filter::$msgs['name_item'] = 'Please Enter New Category Item';
		  
		  if (!Filter::$id) {
			  if ($this->itemExists($_POST['name_item']))
				  Filter::$msgs['name_item'] = 'The new Category Item is already in use.. <b>"'.$_POST['name_item'].'"</b>';
		  }

		  if (empty($_POST['detail_item']))
			  Filter::$msgs['detail_item'] = 'Please Enter New Details Category Item';
			  		  
		  
		  if (empty(Filter::$msgs)) {
			  $data = array(
				  'name_item' => sanitize($_POST['name_item']), 
				  'detail_item' => sanitize($_POST['detail_item']) 
			  );
			  
			  (Filter::$id) ? self::$db->update(self::ciTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::ciTable, $data);
			  $message = (Filter::$id) ? '<span>Success!</span>New Category Item updated successfully!' : '<span>Success!</span>New Category Item added successfully!';
			  
			  (self::$db->affected()) ? Filter::msgOk($message) :  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
		  } else
			  print Filter::msgStatus();
	  }
	  
	  
	  	/**
	   * Content::processShiprates()
	   */
	  public function processShiprates()
	  {

		  if (empty($_POST['n_courier']))
			  Filter::$msgs['n_courier'] = 'Please Enter Name Courier';
		  if (empty($_POST['services']))
			  Filter::$msgs['services'] = 'Please Enter Services';
		  if (empty($_POST['weight']))
			  Filter::$msgs['weight'] = 'Please Enter Weight';		  
		  if (empty($_POST['rate']))
			  Filter::$msgs['rate'] = 'Please Enter Rate';
		  if (empty($_POST['typeweight']))
			  Filter::$msgs['typeweight'] = 'Please Enter Type Weight';
		  if (empty($_POST['free_ship']))
			  Filter::$msgs['free_ship'] = 'Please Enter Free Ship';
		  if (empty($_POST['drop_off']))
			  Filter::$msgs['drop_off'] = 'Please Enter Drop-off';

          if (!empty($_FILES['brand']['name'])) {
              if (!preg_match("/(\.jpg|\.png)$/i", $_FILES['brand']['name'])) {
                  Filter::$msgs['brand'] = "Illegal file type. Only jpg and png file types allowed.";
              }
              $file_info = getimagesize($_FILES['brand']['tmp_name']);
              if (empty($file_info))
                  Filter::$msgs['brand'] = "Illegal file type. Only jpg and png file types allowed.";
          }
		  
		  if (empty(Filter::$msgs)) {
			  
			  $data = array(
				  'n_courier' => sanitize($_POST['n_courier']), 
				  'services' => sanitize($_POST['services']), 
				  'weight' => sanitize($_POST['weight']), 
				  'rate' => sanitize($_POST['rate']),
				  'deli_time' => sanitize($_POST['deli_time']),				  
				  'typeweight' => sanitize($_POST['typeweight']),
				  'free_ship' => sanitize($_POST['free_ship']),
				  'drop_off' => sanitize($_POST['drop_off'])
			  );

              if (!Filter::$id)
                  $data['created'] = "NOW()";

              // Procces Brand
              if (!empty($_FILES['brand']['name'])) {
                  $thumbdir = UPLOADS;
                  $tName = "AVT_" . randName();
                  $text = substr($_FILES['brand']['name'], strrpos($_FILES['brand']['name'], '.') + 1);
                  $thumbName = $thumbdir . $tName . "." . strtolower($text);
                  if (Filter::$id && $thumb = getValueById("brand", self::raTable, Filter::$id)) {
                      @unlink($thumbdir . $thumb);
                  }
                  move_uploaded_file($_FILES['brand']['tmp_name'], $thumbName);
                  $data['brand'] = $tName . "." . strtolower($text);
              }
			  
				  
              (Filter::$id) ? self::$db->update(self::raTable, $data, "id='" . Filter::$id . "'") : self::$db->insert(self::raTable, $data);
              $message = (Filter::$id) ? '<span>Success!</span>Ship Rates updated successfully!' : '<span>Success!</span>Ship Rates added successfully!';

              if (self::$db->affected()) {
                  Filter::msgOk($message);
				  
              } else
                  Filter::msgAlert('<span>Alert!</span>Nothing to process.');
          } else
              print Filter::msgStatus();
      }
	  

	  /**
	   * Courier::isValidOffice()
	   */
	  private function officeExists($name_off)
	  {
		  
          $sql = self::$db->query("SELECT name_off" 
		  . "\n FROM " . self::oTable 
		  . "\n WHERE name_off = '" . sanitize($name_off) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  
	  /**
	   * Courier::isValidDelitime()
	   */
	  private function DelitimeExists($delitime)
	  {
		  
          $sql = self::$db->query("SELECT delitime" 
		  . "\n FROM " . self::delitimeTable 
		  . "\n WHERE delitime = '" . sanitize($delitime) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidbranchOffice()
	   */
	  private function branchofficeExists($name_off)
	  {
		  
          $sql = self::$db->query("SELECT name_branch" 
		  . "\n FROM " . self::branchTable 
		  . "\n WHERE name_branch = '" . sanitize($name_branch) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidcodeOffice()

	   */
	  private function codeofficeExists($code_off)
	  {
		  
          $sql = self::$db->query("SELECT code_off" 
		  . "\n FROM " . self::oTable 
		  . "\n WHERE code_off = '" . sanitize($code_off) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidCourier()
	   */
	  private function courierExists($name_com)
	  {
		  
          $sql = self::$db->query("SELECT name_com" 
		  . "\n FROM " . self::ccTable 
		  . "\n WHERE name_com = '" . sanitize($name_com) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidstatus()
	   */
	   private function statusExists($mod_style)
	  {
		  
          $sql = self::$db->query("SELECT mod_style" 
		  . "\n FROM " . self::yTable 
		  . "\n WHERE mod_style = '" . sanitize($mod_style) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  
	  /**
	   * Courier::isValidline()
	   */
	   private function lineExists($ship_line)
	  {
		  
          $sql = self::$db->query("SELECT ship_line" 
		  . "\n FROM " . self::slineTable 
		  . "\n WHERE ship_line = '" . sanitize($ship_line) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidIncoterms()
	   */
	   private function incoExists($inco_name)
	  {
		  
          $sql = self::$db->query("SELECT inco_name" 
		  . "\n FROM " . self::incoTable 
		  . "\n WHERE inco_name = '" . sanitize($inco_name) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidspack()
	   */
	   private function packExists($name_pack)
	  {
		  
          $sql = self::$db->query("SELECT name_pack" 
		  . "\n FROM " . self::ptTable 
		  . "\n WHERE name_pack = '" . sanitize($name_pack) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
	  /**
	   * Courier::isValidsItem()
	   */
	   private function itemExists($name_item)
	  {
		  
          $sql = self::$db->query("SELECT name_item" 
		  . "\n FROM " . self::ciTable 
		  . "\n WHERE name_item = '" . sanitize($name_item) . "'" 
		  . "\n LIMIT 1");

          if (self::$db->numrows($sql) == 1) {
              return true;
          } else
              return false;
	  }
	  
 	  
      /**
       * Core::monthList()
       * 
       * @return
       */ 	  
      public function monthList()
	  {
		  $selected = is_null(get('month')) ? strftime('%m') : get('month');
		  
		  $arr = array(
				'01' => "Jan",
				'02' => "Feb",
				'03' => "Mar",
				'04' => "Apr",
				'05' => "May",
				'06' => "Jun",
				'07' => "Jul",
				'08' => "Aug",
				'09' => "Sep",
				'10' => "Oct",
				'11' => "Nov",
				'12' => "Dec"
		  );
		  
		  $monthlist = '';
		  foreach ($arr as $key => $val) {
			  $monthlist .= "<option value=\"$key\"";
			  $monthlist .= ($key == $selected) ? ' selected="selected"' : '';
			  $monthlist .= ">$val</option>\n";
          }
          unset($val);
          return $monthlist;
      }

      /**
       * Core::yearList()
       */
	  function yearList($start_year, $end_year)
	  {
		  $selected = is_null(get('year')) ? date('Y') : get('year');
		  $r = range($start_year, $end_year);
		  
		  $select = '';
		  foreach ($r as $year) {
			  $select .= "<option value=\"$year\"";
			  $select .= ($year == $selected) ? ' selected="selected"' : '';
			  $select .= ">$year</option>\n";
		  }
		  return $select;
	  }

      /**
       * Core::yearlyStats()
       * 
       * @return
       */
      public function yearlyStats()
      {
          $sql = "SELECT *, YEAR(created) as year, MONTH(created) as month," 
		  . "\n COUNT(id) as total" 
		  . "\n FROM " . Users::uTable 
		  . "\n WHERE YEAR(created) = '" . $this->year . "'" 
		  . "\n GROUP BY year DESC, month DESC ORDER by created";

          $row = Registry::get("Database")->fetch_all($sql);

          return ($row) ? $row : 0;
      }
	  
	   
      /**
       * Core::getYearlySummary()
       * 
       * @return
       */
      public function getYearlySummary()
      {
          $sql = "SELECT YEAR(created) as year, MONTH(created) as month," 
		  . "\n COUNT(id) as total" 
		  . "\n FROM " . Users::uTable 
		  . "\n WHERE YEAR(created) = '" . $this->year . "' GROUP BY year";

          $row = Registry::get("Database")->first($sql);

          return ($row) ? $row : 0;
      }
				  
      /**
       * Core::getRowById()
       */
      public static function getRowById($table, $id, $and = false, $is_admin = true)
      {
          $id = sanitize($id, 8, true);
          if ($and) {
              $sql = "SELECT * FROM " . (string )$table . " WHERE id = '" . Registry::get("Database")->escape((int)$id) . "' AND " . Registry::get("Database")->escape($and) . "";
          } else
              $sql = "SELECT * FROM " . (string )$table . " WHERE id = '" . Registry::get("Database")->escape((int)$id) . "'";

          $row = Registry::get("Database")->first($sql);

          if ($row) {
              return $row;
          } else {
              if ($is_admin)
                  Filter::error("You have selected an Invalid Id - #" . $id, "Core::getRowById()");
          }
      }

      /**
       * Core::doDelete()
       */
      public static function doDelete($title, $varpost, $url = 'controller.php', $attr = 'item_', $id = 'a.delete', $extra = false)
      {
          $display = "
		  <script type=\"text/javascript\"> 
		  // <![CDATA[
		  $(document).ready(function () {
		      $('body').on('click', '" . $id . "', function () {
		          var id = $(this).attr('id').replace('" . $attr . "', '')
		          var parent = $(this).parent().parent();
		          var name = $(this).attr('data-rel');
		          new Messi('<p class=\"messi-warning\"><i class=\"icon-warning-sign icon-3x pull-left\"></i>Are you sure you want to delete this record?<br /><strong>This action cannot be undone!!!</strong></p>', {
		              title: '" . $title . "',
		              titleClass: '',
		              modal: true,
		              closeButton: true,
		              buttons: [{
		                  id: 0,
		                  label: 'Delete',
		                  class: '',
		                  val: 'Y'
		              }],
		              callback: function (val) {
		                  if (val === 'Y') {
		                      $.ajax({
		                          type: 'post',
		                          url: '" . $url . "',
		                          data: {
									  '" . $varpost . "': id,
									  'title':encodeURIComponent(name)
									  " . $extra . "
								  },
		                          beforeSend: function () {
		                              parent.animate({
		                                  'backgroundColor': '#FFBFBF'
		                              }, 400);
		                          },
		                          success: function (msg) {
		                              parent.fadeOut(400, function () {
		                                  parent.remove();
		                              });
		                              $('html, body').animate({
		                                  scrollTop: 0
		                              }, 600);
		                              $('#msgholder').html(decodeURIComponent(msg));
		                          }
		                      });
		                  }
		              }

		          });
		      });
		  });
		  // ]]>
		  </script>";

          print $display;
      }
	  
      /**
       * Core::doForm()
       */
      public static function doForm($data, $url = "controller.php", $reset = 0, $clear = 0, $form_id = "admin_form", $msgholder = "msgholder")
      {
          $display = '
		  <script type="text/javascript">
		  // <![CDATA[
			  $(document).ready(function () {
				  var options = {
					  target: "#' . $msgholder . '",
					  beforeSubmit:  showLoader,
					  success: showResponse,
					  url: "' . $url . '",
					  resetForm : ' . $reset . ',
					  clearForm : ' . $clear . ',
					  data: {
						  ' . $data . ': 1
					  }
				  };
				  $("#' . $form_id . '").ajaxForm(options);
			  });
			  function showResponse(msg) {
				  hideLoader();
				  $(this).html(msg);
				  $("html, body").animate({
					  scrollTop: 0
				  }, 600);
			  }
			  ';
          $display .= '
		  // ]]>
		  </script>';

          print $display;
      }
	  
	  public static function reForm($data, $url = "controller.php", $reset = 0, $clear = 0, $form_id = "readmin_form", $msgholder = "msgholder")
      {
          $display = '
		  <script type="text/javascript">
		  // <![CDATA[
			  $(document).ready(function () {
				  var options = {
					  target: "#' . $msgholder . '",
					  beforeSubmit:  showLoader,
					  success: showResponse,
					  url: "' . $url . '",
					  resetForm : ' . $reset . ',
					  clearForm : ' . $clear . ',
					  data: {
						  ' . $data . ': 1
					  }
				  };
				  $("#' . $form_id . '").ajaxForm(options);
			  });
			  function showResponse(msg) {
				  hideLoader();
				  $(this).html(msg);
				  $("html, body").animate({
					  scrollTop: 0
				  }, 600);
			  }
			  ';
          $display .= '
		  // ]]>
		  </script>';

          print $display;
      }
  }
  

?>