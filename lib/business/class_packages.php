<?php

  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');

  class Packages
  {
	  const uTable = "business_packages";

	  private static $db;
      

      /**
       * Users::__construct()
       */
      function __construct()
      {
		  self::$db = Registry::get("Database");
      }

      
       public function getAllPackages() {

            $sql = "SELECT *  FROM business_packages s ORDER BY s.id ASC";
            $plans = self::$db->fetch_all($sql);
            foreach ($plans as $plan) {
                $sql2 = "SELECT *  FROM business_plans p  WHERE p.package_id=".$plan->id." ORDER BY p.id ASC";
                $res = self::$db->fetch_all($sql2);
                $plan->features = $res;
            }
            return ($plans) ? $plans : 0;
       }

       public function getPackageId(int $id) {

        $sql = "SELECT *  FROM business_packages s WHERE s.id=".$id."";
        $plans = self::$db->fetch_all($sql);
        return ($plans) ? $plans : 0;
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

    public function getBuySubServices() {
        $sql = "SELECT *  FROM sub_services s WHERE s.service_id=2 ORDER BY s.id ASC";
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