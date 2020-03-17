<?php
snippet('oauth');

$months = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEPT", "OCT", "NOV", "DEC" );
    
    if ($_POST) {
        if ( filter_input(INPUT_POST, "arrival_or_departure") == "arrival") {
                $endpoint = "arrivals";
            } elseif (filter_input(INPUT_POST, "arrival_or_departure") == "departure") {
                $endpoint = "departures";
            }

            $payload_array = array ();
            $payload_array["name"] = filter_input(INPUT_POST, "ad_name");
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
                    $month = $months[filter_input(INPUT_POST, "ad_month")];
                    $date .= $month . "-";
                }
            }
            $date .= $year;
            $payload_array["date"] = $date;

             if ( isset( $_POST['latlng'] )) {
                 $payload_array["geo"] = filter_input(INPUT_POST, "latlng");
             }
            if ( isset( $_POST['email'] )){
                $payload_array["email"] = filter_input(INPUT_POST, "email");
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

       // Redirect to this page.
        if($result["moderated"] == 0){
            header("Location: " . $site->children()->findByURI('moderation-message')->url());
        }else{
            header("Location: " . $site->children()->findByURI('thank-you')->url());
        }
       exit();
        
}