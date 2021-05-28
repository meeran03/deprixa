<?php 
    /* coded by Rahul Barui ( https://github.com/Rahul-Barui ) */
    // include "dbcon.php";

	/*print "<pre>";
	print_r($_POST);
	var_dump($_POST);
	die;*/
    define("_VALID_PHP", true);
    require_once("../../init.php");

	$payment_id = $statusMsg = ''; 
	$ordStatus = 'error';
	$id = '';

    $con = $db;
	$price;

	// Check whether stripe token is not empty

	if(!empty($_POST['stripeToken'])){
		//$user->BusinessRegister();
		// Get Token, Card and User Info from Form
		// In this section we get the id of the created user;
		$sql = "SELECT * FROM users p WHERE p.email='".$_POST['email']."'";
		$res = $db->first($sql) or die("MYSQL ERROR".$db->error()) ;
		$user_id = $res->id;
		echo "<h1>".$user_id."</h1>";
		$token = $_POST['stripeToken'];
		$name = $_POST['holdername'];
		$email = $_POST['holder_email'];
		$card_no = $_POST['card_number'];
		$card_cvc = $_POST['card_cvc'];
		$card_exp_month = $_POST['card_exp_month'];
		$card_exp_year = $_POST['card_exp_year'];
		$productId = $_POST['package_id'];
		$c_name = $_POST['c_name'];
		// Get Product ID From - Form
		// Get Product Details By Using Product-Id
		$SQL_getPr = "SELECT * FROM business_packages p WHERE p.id='$productId'";
		$res_getPr = $db->first($SQL_getPr) or die("MYSQL ERROR".$db->error()) ;
		//$row_getPr = mysqli_fetch_assoc($res_getPr);
	    $price = (float)$res_getPr->price+50;
		//$price +=50;
	    $pr_desc = $res_getPr->name;
		echo "<script> console.log(".(gettype($res_getPr->price)).") </script>";


		// Include STRIPE PHP Library
		require_once('stripe-php/init.php');

		// set API Key
		$stripe = array(
		"SecretKey"=>"sk_test_cEjXShRlZO1YrzP8Txn6Ulya00EhUj1dRS",
		"PublishableKey"=>"pk_test_18lgnnPV3SZZn36tyAFO131T00P2pCl90m"
		);

		// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey($stripe['SecretKey']);

		// Add customer to stripe 
	    $customer = \Stripe\Customer::create(array( 
	        'email' => $email, 
	        'source'  => $token,
	        'name' => $name,
	        'description'=>$pr_desc
	    ));

	    // Generate Unique order ID 
	    $orderID = strtoupper(str_replace('.','',uniqid('', true)));
	     
	    // Convert price to cents 
	    $itemPrice = ($price*100);
	    $currency = "usd";
	    $itemName = $pr_desc;

	    // Charge a credit or a debit card 
	    $charge = \Stripe\Charge::create(array( 
	        'customer' => $customer->id, 
	        'amount'   => $itemPrice, 
	        'currency' => $currency, 
	        'description' => $itemName, 
	        'metadata' => array( 
	            'order_id' => $orderID 
	        ) 
	    ));

	    // Retrieve charge details 
    	$chargeJson = $charge->jsonSerialize();

    	// Check whether the charge is successful 
    	if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 

	        // Order details 
	        $transactionID = $chargeJson['balance_transaction']; 
	        $paidAmount = $chargeJson['amount']; 
	        $paidCurrency = $chargeJson['currency']; 
	        $payment_status = $chargeJson['status'];
	        $payment_date = date("Y-m-d H:i:s");
	        $dt_tm = date('Y-m-d H:i:s');

			$data = array(
				// 'title' => sanitize($_POST['title']), 
				// 'author' => sanitize($_POST['author']), 
				// 'body' => sanitize($_POST['body']),
				// 'created' => sanitize($_POST['created']),
				// 'active' => intval($_POST['active'])
				"user_id"=> $user_id,
				"created_at"=>$dt_tm ,
				"package_id"=> $productId,
				"price"=> $price,
				"c_name"=> $c_name,
				"card_number"=> $card_no,
				"card_exp_month"=> $card_exp_month,
				"card_exp_year"=> $card_exp_year,
				"paid_amount"=> $paidAmount,
				"payment_status"=> $payment_status,
				"transaction_id"=> $transactionID,
				"modified" => $dt_tm
			);

	        // Insert tansaction data into the database
			$db->insert("business_orders", $data);
	        // $sql2 = "INSERT INTO "business_orders"("user_id","created_at",`package_id`,`price`,`c_name`,
			// 		`card_number`,`card_exp_month`,`card_exp_year`,`paid_amount`,`payment_status`,`transaction_id`,`modified`) 
			// 		VALUES ('$user_id','$dt_tm','$productId','$price','$c_name','$card_no','$card_exp_month','$card_exp_year','$paidAmount','$payment_status','$transactionID','$dt_tm')";
			// $result = $db->insert($sql2) or die("MYSQL ERROR".$db->error()) ;

    		// //Get Last Id
    		// $sql_g = "SELECT * FROM `orders`";
    		// $res_g = mysqli_query($con,$sql_g) or die("Mysql Error Stripe-Charge(SQL2)".mysqli_error($con));
    		// while($row_g=mysqli_fetch_assoc($res_g)){
    		// 	$id = $row_g['id'];
    		// }

	        // If the order is successful 
	        if($payment_status == 'succeeded'){ 
	            $ordStatus = 'success'; 
	            $statusMsg = 'Your Payment has been Successful!'; 
	    	} else{ 
	            $statusMsg = "Your Payment has Failed!"; 
	        } 
	    } else{ 
	        //print '<pre>';print_r($chargeJson); 
	        $statusMsg = "Transaction has been failed!"; 
	    } 
	} else{ 
	    $statusMsg = "Error on form submission."; 
	} 
	
?>

<!DOCTYPE html>
<html>
	<head>
        <title> EUBS PAYMENT  </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="../css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Slider -->               
        <link rel="stylesheet" href="../css/tiny-slider.css"/> 
        <!-- Main Css -->
        <link href="../css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="../css/colors/default.css" rel="stylesheet" id="color-opt">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>

    <div class="container">
        <h2 style="text-align: center; color: blue;">EUBS PAYMENT  </h2>
        <h4 style="text-align: center;"> Your Payment Details </h4>
        <br>
        <div class="row">
	        <div class="col-lg-12">
				<div class="status">
					<h1 class="<?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
				
					<h4 class="heading">Payment Information - </h4>
					<br>
					<p><b>Reference ID:</b> <strong><?php echo $id; ?></strong></p>
					<p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
					<p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?> ($<?php echo $price;?>.00)</p>
					<p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
					<h4 class="heading">Product Information - </h4>
					<br>
					<p><b>Name:</b> <?php echo $itemName; ?></p>
					<p><b>Price:</b> <?php echo $itemPrice.' '.$currency; ?> ($<?php echo $price;?>.00)</p>
				</div>
				<a href="index.php" class="btn-continue">Back to Home</a>
			</div>
		</div>
	</div>
</html>