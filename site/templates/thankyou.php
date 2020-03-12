<?php
snippet('oauth');

if ( isset( $_POST['name'] ) && isset( $_POST['email'] ) ) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $geo = $_POST['geo'];
    $email = $_POST['email'];
    $payload = json_encode($_POST);
    
    $token = getToken();
    
    // Prepare new cURL resource
    $ch = curl_init('http://localhost:44444/arrivals');
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
    $result = curl_exec($ch);
     
    // Close cURL session handle
    curl_close($ch);
    echo($result);
}
?>