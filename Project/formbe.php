<?php
$sf = 1; // for Mobile Airtime
$url = "https://api.goprocessing.in/serviceTrans.go?goid=&goid&apikey=$api&rtype=json&msisdn=$mobile_number&operator_code=$operator_code&amount=$amount&service_family=$sf &apimode=test";
$result = '';
$array = '';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
curl_setopt($ch, CURLOPT_CAINFO, "GoCAcert.pem");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Operators Time Out is 300 sec varies from operator to operator.
$result = curl_exec($ch);
curl_close($ch);
$array = json_decode($result, true);
if($result != '' && is_array($array) && ($array['ErrorCode'] != '' || $array['status'] != ''))
{
if($array['ErrorCode'] == '')
{
echo "GO Transaction ID: ".$array['trans_id']." Your(client) Transaction ID: ".$array['client_trans_id']." Mobile Number: ".$array['msisdn']." Operator Code: ".$array['operator_code']. " Operator Name: ".$array['operator_name']." Amount: ".$array['trans_amount']." DateTime: ".$array['datetime']." Status: ".$array['status']." Charged Amount:
".$array['charged_amount']." Response Code: ".$array['response_code']." Operator Transaction ID: ".$array['opr_transid']." Opening Balance: ".$array['opening_balance']; // Status: 'Pending' or 'Success'
}
else if($array['ErrorCode'] == '137')
{
echo "ErrorCode: ".$array['ErrorCode']." Message: ".$array['Message']; // Error Occurred - Duplicate 'client_trans_id'. Kindly make the necessary action at your end for the same.
}
else
{
echo "ErrorCode: ".$array['ErrorCode']." Message: ".$array['Message']; // Error Occurred
}
}
else
{
echo "No Response or Error “; // Error Occurred or No Response or Time Out - Mark the transaction as “Pending” and Check the status from Transaction Status Request API.
}

?>