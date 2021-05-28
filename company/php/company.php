<?php
/*
 * This is an example API request to search for matching companies
 * */
if(!$_POST) exit;
require('client.php');
$api_key = '1e3c0ba8-1a21-492c-90ba-e9850329dcbb'; 
$company_name = $_POST['name']; // The company name you're searching for

$api = new companiesHouseApi($api_key);
$response = $api->send('/search/companies', ['q' => $company_name]); // Process API request

$items_array = $response["items"];

// $matched = array() ;
$matched;
foreach ($items_array as $item) {
    if (preg_match("/\b".$company_name."\b/i", $item["title"])) {
        $matched= $item;
        break;
    } else {
        $matched= ("Available");
    }
}

// Handle the API response below here...
// echo '<p><pre>' . print_r($response, true) . '</pre></p>';
echo json_encode($matched);
 