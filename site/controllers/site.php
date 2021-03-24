<?php 
    $SubmissionsOpen = true;
    $currentTime = date("H:i");
    $openTime = $site->openTime()->toDate('H:i');
    $closeTime = $site->closeTime()->toDate('H:i');
    $open = $site->submissionsOpen()->toBool();

    if($site->automateSubmissions()->toBool() == true){
        if (time() >= strtotime($openTime) && time() <= strtotime($closeTime)){
            $SubmissionsOpen = true;
        }else{
            $SubmissionsOpen = false;
        }
    }      
?>
