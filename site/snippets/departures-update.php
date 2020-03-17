<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$result = NULL;

if ($action == "accept"){

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://localhost:44444/departures/accept/'.$ID,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "authorization: Bearer " . $token),
    ]);
    $results = json_decode(curl_exec($curl), true);
    curl_close($curl);

    $result = " Accepted";
    
} elseif ($action == "delete") {
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://localhost:44444/departures/'.$ID,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_HTTPHEADER => array(
          "authorization: Bearer " . $token),
    ]);
    $results = json_decode(curl_exec($curl), true);
    curl_close($curl);

    $result = " Deleted";
}

if ($result != NULL ) {
    echo("Departure ID:" . $results['id'] . $result);
}
