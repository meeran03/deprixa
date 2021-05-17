<?php

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');

  class Services
  {
	  const uTable = "services";

	  private static $db;
      

      /**
       * Users::__construct()
       */
      function __construct()
      {
		  self::$db = Registry::get("Database");
      }

      
       public function getAllServices() {
            $sql = "SELECT *  FROM services s ORDER BY s.id ASC";
            $row = self::$db->fetch_all($sql);
            return ($row) ? $row : 0;
       }

       public function getAllSubServices() {
        $sql = "SELECT *  FROM sub_services s ORDER BY s.id ASC";
        $row = self::$db->fetch_all($sql);
        return ($row) ? $row : 0;
    }

    public function getSubService(int $id) {
        $sql = "SELECT *  FROM sub_services s WHERE s.service_id=".$id."ORDER BY s.id ASC";
        $row = self::$db->fetch_all($sql);
        return ($row) ? $row : 0;
    }

    public function getUserSubscription(int $id, int $serv) {
        $sql = "SELECT *  FROM subscriptions s WHERE s.service_id=".$serv." AND s.user_id=".$id." ORDER BY s.id ASC";
        $row = self::$db->fetch_all($sql);
        return ($row) ? $row : 0;
    }
    
	  
    }
?>