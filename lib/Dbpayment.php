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
		class Db { 
		private $servername = 	'localhost';
		private $username = 	'root';
		private $password = 	'toor';
		private $db = 			'courier';
		public function db() {
				$conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
				if ($conn->connect_error) {
					die('Connection failed: ' . $conn->connect_error);
				}
				return $conn;
			}
		}
 
?>