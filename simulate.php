<?php
    require ('access_token.php');
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
    
    //$access_token = 'ghiQR4Nnri6tGRWBAY08L9a4j18k'; // check file mpesa_accesstoken.php.    
    $ShortCode  = '600502'; // Shortcode. Same as the one on register_url.php
    $amount     = '3000'; // amount the client/we are paying to the paybill
    $msisdn     = '254708374149'; // phone number paying 
    $billRef    = 'inv34'; // This is anything that helps identify the specific transaction. Can be a clients ID, Account Number, Invoice amount, cart no.. etc

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));


    $curl_post_data = array(
           'ShortCode' => $ShortCode,
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => $amount,
           'Msisdn' => $msisdn,
           'BillRefNumber' => $billRef
    );

    $data_string = json_encode($curl_post_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);

    echo $curl_response;
?>