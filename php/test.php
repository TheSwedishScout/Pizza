<?php

$url = 'https://torrid-inferno-3066.firebaseio.com/pizzor/.json';
$method = 'get';
 
# headers and data (this is API dependent, some uses XML)
$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
);
$data = '{
    "name": "margareta1",
    "pizzeria": 2
    "ingredienser":[0,4]
}';
 
$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($handle, CURLOPT_PORT, 5521);

switch($method) {
    case 'GET':
        break;
    case 'POST':
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        break;
    case 'PUT': 
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        break;
    case 'PATCH': 
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        break;
    case 'DELETE':
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
        break;
}
 
$response = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
echo($response);
//print_r($response);

?>
