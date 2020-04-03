<?php

$payload_array = array ();
$payload_array["name"] = filter_input(INPUT_POST, "bad_name");
$payload_array["type"] = filter_input(INPUT_POST, "type");
$payload = json_encode($payload_array);
$ch = curl_init('http://134.209.184.8:44444/badnames');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload),
    "authorization: Bearer " . $token
        )
);

// Submit the POST request
$result = json_decode(curl_exec($ch), true);

// Close cURL session handle
curl_close($ch);

if (array_key_exists('name', $result) ) {
    echo("Name:" . $payload_array["name"] . " Deleted");
}