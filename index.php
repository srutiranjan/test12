<?php
$merchant_email="info@zoomtravel.ae";
$secret_key='xEQgqmTZ3DDQS29oWE5uv1jSXVFiKshi78yxuswx5aoXcxm9crEHtXAqSfJDH1WP9vmEXSc22A0f8mokO22iZCISSswAutpEYLiV	';


$values = array();
$values['merchant_email'] = $merchant_email;
$values['secret_key'] = $secret_key;
$values['site_url'] = "https://zoomtravel.ae";
$values['return_url']= "http://192.168.0.14/PAYTAB/success.php";
$values['title'] = "Order No 1223";
$values['cc_first_name'] = "John";
$values['cc_last_name'] = "Doe";
$values['cc_phone_number'] = "00971";
$values['phone_number'] = "39882135";
$values['email'] = "customer@domain.com";
$values['products_per_title'] = "Mobile";
$values['unit_price'] = "0.270";
$values['quantity'] = "1";
$values['other_charges'] = "0.000";
$values['amount'] = "0.270";
$values['discount'] = "0";
$values['reference_no'] = "ABC-5542";
$values['currency'] = "USD";
$values['ip_customer'] = $_SERVER['REMOTE_ADDR'];
$values['ip_merchant'] = "192.168.0.14";
$values['billing_address'] = "Flat 3021 Manama Bahrain";
$values['state'] = "Manama";
$values['city'] = "Manama";
$values['postal_code'] = "12345";
$values['country'] = "BHR";
$values['shipping_first_name']= "John";
$values['shipping_last_name'] = "Doe";
$values['address_shipping'] = "Flat 3021 Manama Bahrain";
$values['state_shipping'] = "Manama";
$values['city_shipping'] = "Manama";
$values['postal_code_shipping']= "12345";
$values['country_shipping'] = "BHR";
$values['msg_lang'] = "English";
$values['cms_with_version'] = "php5.6";
// $data = json_encode($values);
 // echo $data; exit;
 $url = "https://www.paytabs.com/apiv2/create_pay_page";
// echo "<pre>";
// print_r($values);exit;



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $values);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
// echo $server_output; exit;
curl_close ($ch);
$d = json_decode($server_output);
  print_r($d);exit;
 $url = $d->payment_url;
 $payment_reference  = $d->p_id;
 // echo $payment_reference ; exit;
 header('Location:'.$url);


?>