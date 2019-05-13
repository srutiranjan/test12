<?php 
 // print_r($_POST);exit;
$payment_reference = $_REQUEST['payment_reference'];
$merchant_email="info@zoomtravel.ae";
$secret_key='xEQgqmTZ3DDQS29oWE5uv1jSXVFiKshi78yxuswx5aoXcxm9crEHtXAqSfJDH1WP9vmEXSc22A0f8mokO22iZCISSswAutpEYLiV';
$data = verify_payment($merchant_email, $secret_key, $payment_reference);
echo "<pre>";
print_r($data);
echo "</pre>";
function verify_payment($merchant_email, $secret_key, $payment_reference)
{

	$values['merchant_email'] = $merchant_email;
	$values['secret_key'] = $secret_key;
	$values['payment_reference'] = $payment_reference;
	$s = json_decode(mypostdatafunction($values));
	// print_r($s);exit;
}

function mypostdatafunction($data){
	$url ="https://www.paytabs.com/apiv2/verify_payment";
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec($ch);
	$error_msg = curl_error($ch);
	curl_close ($ch);
	echo '<br>';
	print_r($server_output); 
	echo '</br>';
	echo '<br>';
	print_r($error_msg); 
	echo '</br>';
	exit;
}
?>