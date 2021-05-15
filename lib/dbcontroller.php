<?php

include 'Dbpayment.php';

class DBController {

	 private $db;
	
	function __construct() {
		$conn = new Db();
        $this->db = $conn->db();
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->db,$query);
		while($row=mysqli_fetch_array($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}
	
	function insertQuery($query) {
	    mysqli_query($this->db, $query);
	    $insert_id = mysqli_insert_id($this->db);
	    return $insert_id;
	}
	
	function getIds($query) {
	    $result = mysqli_query($this->db,$query);
	    while($row=mysqli_fetch_array($result)) {
	        $resultset[] = $row[0];
	    }
	    if(!empty($resultset))
	        return $resultset;
	}
	
   function numRows($query) {
        $result  = mysqli_query($this->db, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>