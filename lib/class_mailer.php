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

  class Mailer
  {
      private $mailer;
      private $smtp_host;
      private $smtp_user;
      private $smtp_pass;
      private $smtp_port;
	  private $is_ssl;
	  
      /**
       * Mailer::__construct()
       * 
       * @return
       */
      function __construct()
      {
          $this->mailer = Registry::get("Core")->mailer;
          $this->smtp_host = Registry::get("Core")->smtp_host;
          $this->smtp_user = Registry::get("Core")->smtp_user;
          $this->smtp_pass = Registry::get("Core")->smtp_pass;
          $this->smtp_port = Registry::get("Core")->smtp_port;
		  $this->is_ssl = Registry::get("Core")->is_ssl;
      }
	  
      /**
       * Mailer::sendMail()
       * 
	   * Sends a various messages to users
       * @return
       */
	  public function sendMail()
	  {
		  require_once(BASEPATH . 'lib/swift/swift_required.php');
		  
          if ($this->mailer == "SMTP") {
			  $SSL = ($this->is_ssl) ? 'ssl' : null;
              $transport = Swift_SmtpTransport::newInstance($this->smtp_host, $this->smtp_port, $SSL)
						  ->setUsername($this->smtp_user)
						  ->setPassword($this->smtp_pass);
          } else
              $transport = Swift_MailTransport::newInstance();
          
          return Swift_Mailer::newInstance($transport);
	  }
	  
  }
  $mail = new Mailer();
?>