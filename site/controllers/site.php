<?php 

    

return function ($page, $pages, $site, $kirby) {
    $SubmissionsOpen = true;
    $timeDifference = ($site->timeDifference()->toInt() * 60 * 60);
    $currentTime = time() + $timeDifference;
    $currentTime = date("H:i", $currentTime);
    $openTime = $site->openTime()->toDate('H:i');
    $closeTime = $site->closeTime()->toDate('H:i');
    $SubmissionsOpen  = $site->submissionsOpen()->toBool();

    if($site->automateSubmissions()->toBool() == true){
        if (strtotime($currentTime) >= strtotime($openTime) && strtotime($currentTime) <= strtotime($closeTime)){
            $SubmissionsOpen = true;
        }else{
            $SubmissionsOpen = false;
        }
    }  
    return [
        'submissionsOpen' => $SubmissionsOpen,
        'currentTime' => $currentTime
    ];
};