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

define("_VALID_PHP", true);
require_once("../init.php");
require __DIR__ . '/twilio/Twilio/autoload.php';
use Twilio\Rest\Client; 
$date = new DateTime();
$tdate = $date->format('Y/m/d H:i:s');

include 'BookingClass.php';
//create object of PayPalExpress
$payment = new BookingClass();
$items = $payment->get_listsms();

if ($_POST['tid'] != NULL && $_POST['state'] != NULL && $_POST['amount'] != NULL && $_POST['track'] != NULL && $_POST['item_id'] != NULL) {

    //validate these 
    $tid = $_POST['tid'];
    $state = $_POST['state'];
    $amount = $_POST['amount'];
	$track = $_POST['track'];
    $item_id = $_POST['item_id'];

	while ($item = $items->fetch_assoc()):
		if ($item['active'] == 1){
			if ($core->active_twi == 1){ 
				
				// new Twilio.
				$account_sid = ''.$core->account_sid.'';
				$auth_token = ''.$core->auth_token.'';
				$twilio_number = "".$core->twilio_number."";
				$client = new Client($account_sid, $auth_token);
				$client->messages->create(
					'+447449764031',
					array(
						'from' => $twilio_number,
						'body' => ''.$item['body1'].', '.$core->currency.' '.$amount.', '.$item['body2'].', '.$tdate.', '.$item['body3'].', '.$track.'.'
					)
				);
				
			}else if ($core->active_nex == 1){
				// new NexmoMessage.
				$nexmo_sms = new NexmoMessage(''.$core->api_key.'', ''.$core->api_secret.'');
				$info = $nexmo_sms->sendText( ''.$core->cell_phone.'', 'DEPRIXA PRO', ''.$item['body1'].', '.$core->currency.' '.$amount.', '.$item['body2'].', '.$tdate.', '.$item['body3'].', '.$track.'.' );
			}else{
				// echo 'success'.
			}
		}	
	endwhile;
	
    if ($payment->pay($item_id, $tid, $amount, $state, $track) == TRUE) {
        $payment->update_item($item_id);
		
        echo "success";
    }
} else {
    
}