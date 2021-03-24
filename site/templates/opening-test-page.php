<?php 
    $open = true;
    $currentTime = date()->toDate('c');
    $openTime = $site->openTime()->toDate('c');
    $closeTime = $site->closeTime()->toDate('c');
    // if($site->submissionsOpen() == false){
    //     $open = false;
    // }
    // if($site->automateSubmissions() == true){
    //     if($currentTime > $openTime && $currentTime < $closeTime){
    //         $open = true;
    //     }else{
    //         $open = false;
    //     }
    // }

    if($open == false):
        echo 'closed';
    endif;
    if($open == true):
        echo 'open';
    endif;   
    echo '<hr>';
    echo 'Current Time: ';    
    echo  $currentTime;
    echo '<hr>';
    echo 'Open Time: ';    
    echo  $openTime;   
    echo '<hr>';
    echo 'Close Time: ';
    echo  $closeTime; 
    echo '<hr>';
    echo 'Submissions open setting: ';
    echo  $site->submissionsOpen(); 
    echo 'Automate setting: ';
    echo  $site->automateSubmissions();     
    echo '<hr>';
    echo 'Open result: ';    
    echo $open;           
?>