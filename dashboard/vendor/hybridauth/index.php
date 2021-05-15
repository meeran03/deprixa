<?php
/**
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ------------------------------------------------------------------------
//	HybridAuth End Point
// ------------------------------------------------------------------------

require_once( "hybridauth/Hybrid/Auth.php" );
require_once( "hybridauth/Hybrid/Endpoint.php" );
require_once('vendor/autoload.php'); #Facebook API

Hybrid_Endpoint::process();
