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
	
	$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

	// to read a connection error access the member properties
	$con->connect_errno;    

	// to read the error
	print $con->error;
?>
