<?php
snippet('oauth');

$months = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" );

$time = 90;
$count = 0; //variable used in submission count cookie 
$submissionsOpen = $submissionsOpen; // this Bool is set in the site controller --> site/controllers/site.php
$strictModeration = $site->strictModeration()->toBool();

if(isset($_COOKIE['FormSubmitted'])){
    $time = time() - $_COOKIE['FormSubmitted'];
}

if(isset($_COOKIE['SubmitCount'])){
    $count  =  $_COOKIE['SubmitCount'];
}

if($count < 4 && $time > 60 && $submissionsOpen == true){
    echo 'open';
}else{
    echo 'closed';
}


if($count < 4 && $time > 60 && $submissionsOpen == true || $kirby->user()){
    if ($_POST && ! filter_input(INPUT_POST, "valid")) {
        if ( filter_input(INPUT_POST, "arrival_or_departure") == "arrival") {
                $endpoint = "arrivals";
            } elseif (filter_input(INPUT_POST, "arrival_or_departure") == "departure") {
                $endpoint = "departures";
            }

            $payload_array = array ();
            if ( isset( $_POST['ad_name'] )) {
            $payload_array["name"] = filter_input(INPUT_POST, "ad_name");
            }
        
            $date = "";
            $year = strval(filter_input(INPUT_POST, "ad_year"));
            $month = filter_input(INPUT_POST, "ad_month");
            $day = filter_input(INPUT_POST, "ad_day");
            if ( $day != 0 ) {
                $year = substr($year, 2, 2);
                $day = sprintf('%02d', $day);
                $date .= (strval($day) . "-");
                if ( $month != 0 ) {
                    $month = sprintf('%02d', $month);
                    $date .= strval($month) . "-";
                }
            } else {
                if ( $month != 0 ) {
                    $month = $months[$month -1];
                    $date .= $month . "-";
                }
            }
            $date .= $year;
             if ( isset( $_POST['ad_year'] )) {
                $payload_array["date"] = $date;
             }

             if ( isset( $_POST['latlng'] )) {
                 $payload_array["geo"] = filter_input(INPUT_POST, "latlng");
             }
            if ( isset( $_POST['email'] )){
                $payload_array["email"] = filter_input(INPUT_POST, "email");
            }
            if ( isset( $_POST['story'] )){
                $payload_array["story"] = filter_input(INPUT_POST, "story");
            }
            if ($submissionsOpen) {
                $payload_array["moderated"] = 0;
            } else {
                $payload_array["moderated"] = 1;
            }

            $payload = json_encode($payload_array);

            $token = getToken();

            // Prepare new cURL resource
            $ch = curl_init('http://134.209.184.8:44444/'.$endpoint);
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

       // Set cookies and Redirect to relevant page.
       $count ++;
       setcookie('FormSubmitted', time(), time() + (86400 * 30), '/');
       setcookie('SubmitCount', $count, time() + (86400), '/');
        if($result["moderated"] == 0){
            header("Location: " . $site->children()->findByURI('moderation-message')->url());
        }else{
            header("Location: " . $site->children()->findByURI('thank-you')->url());
        }
       exit();
        
    }
    
}else{
    if($count > 4){
        header("Location: " . $site->children()->findByURI('error-limit')->url());
        exit();
    }
    if($time < 60){
        header("Location: " . $site->children()->findByURI('error-time')->url());
        exit();
    }
    if($submissionsOpen == false){
        header("Location: " . $site->children()->findByURI('error-closed')->url());
        exit();
    }
}

