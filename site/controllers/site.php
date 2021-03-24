<?php 
    // $SubmissionsOpen = true;
    // $currentTime = date("H:i");
    // $openTime = $site->openTime()->toDate('H:i');
    // $closeTime = $site->closeTime()->toDate('H:i');
    // $open = $site->submissionsOpen()->toBool();

    // if($site->automateSubmissions()->toBool() == true){
    //     if (time() >= strtotime($openTime) && time() <= strtotime($closeTime)){
    //         $SubmissionsOpen = true;
    //     }else{
    //         $SubmissionsOpen = false;
    //     }
    // }      

return function ($page, $pages, $site, $kirby) {
    $SubmissionsOpen = true;
    $currentTime = date("H:i");
    $openTime = $site->openTime()->toDate('H:i');
    $closeTime = $site->closeTime()->toDate('H:i');
    $SubmissionsOpen  = $site->submissionsOpen()->toBool();

    if($site->automateSubmissions()->toBool() == true){
        if (time() >= strtotime($openTime) && time() <= strtotime($closeTime)){
            $SubmissionsOpen = true;
        }else{
            $SubmissionsOpen = false;
        }
    }  
    return [
        'submissionsOpen' => $SubmissionsOpen
    ];
};