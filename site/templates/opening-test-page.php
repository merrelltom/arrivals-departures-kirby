<?php 
    $open = true;
    $currentTime = date("H:i");
    $openTime = $site->openTime()->toDate('H:i');
    $closeTime = $site->closeTime()->toDate('H:i');
    if($site->submissionsOpen() == false){
        // $open = false;
    }
    if($site->automateSubmissions() == true){
        if (time() >= strtotime($openTime) && time() >= strtotime($closeTime)){
            $open = true;
        }else{
            $open = false;
        }
    }

    // if($open == false):
    //     echo 'closed';
    // endif;
    // if($open == true):
    //     echo 'open';
    // endif;   
    echo '<hr>';
    echo 'Current Time: ';    
    echo  time();
    echo '<hr>';
    echo 'Open Time: ';    
    echo  strtotime($openTime);   
    echo '<hr>';
    echo 'Close Time: ';
    echo  strtotime($closeTime);
    echo '<hr>';
    echo 'Submissions open setting: ';
    echo  $site->submissionsOpen(); 
    echo '<hr>';    
    echo 'Automate setting: ';
    echo  $site->automateSubmissions();     
    echo '<hr>';
    echo 'Open result: ';    
    if($open == false):
        echo 'closed';
    endif;
    if($open == true):
        echo 'open';
    endif;       
?>