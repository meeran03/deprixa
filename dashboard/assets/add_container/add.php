<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="add_container.js"></script>

<?php
	define("_VALID_PHP", true);
	require_once("../../../init.php");

    $data = json_decode(file_get_contents("php://input"));

    $count = count($data);

    $out = array('error' => false);

	
	
    foreach($data as $key => $value){
			
        $detail_container = $value->detail_container;
        $detail_qty = $value->detail_qty;
		$price = $value->price;
        $total = $value->detail_qty*$value->price;		
		$detail_weight = $value->detail_weight;
		$order_inv = $value->order_inv;
		
		$track=$courier->container_track();
		$prefix=$courier->container_prefix();
		
		$results = $db->query("SELECT last_insert_id(id) as last FROM add_container order by id desc  limit 0,1");
		$rw=mysqli_fetch_array($results);
		$n_invoice=$rw['last']+1;

        $sql = "INSERT INTO detail_container_tmp (idcon,order_inv,detail_container,price,detail_qty,detail_weight,tprice,created,act_status,level) VALUES ('$n_invoice','$prefix$track','$detail_container','$price','$detail_qty','$detail_weight','$total',NOW(),'3','".$user->username."')";
        $query = $db->query($sql);
    }

    if($query){
        $out['message'] = "($count) Container added successfully";
    }
    else{
        $out['error'] = true;
        $out['message'] = "Cannot add Container";
    }
  
    echo json_encode($out);
?>