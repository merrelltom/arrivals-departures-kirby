<pre>

<?php 
    $open = true;
    $currentTime = date("H:i");
    $openTime = $site->openTime()->toDate('H:i');
    $closeTime = $site->closeTime()->toDate('H:i');
    $open = $site->submissionsOpen()->toBool();

    if($site->automateSubmissions()->toBool() == true){
        if (time() >= strtotime($openTime) && time() <= strtotime($closeTime)){
            $open = true;
        }else{
            $open = false;
        }
    }
  
    echo '<hr>';
    echo 'Time: ';    
    echo  time();
    echo ' – ' . $currentTime;
    echo '<hr>';
    echo 'Open: ';    
    echo  strtotime($openTime);   
    echo ' – ' . $openTime;
    echo '<hr>';
    echo 'Clos: ';
    echo  strtotime($closeTime);
    echo ' – ' . $closeTime;
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
    echo '<hr>';
    echo 'Controller result: ';  
    echo $submissionsOpen;    
?>
</pre>