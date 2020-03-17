<?php snippet('header'); 
    snippet('oauth');
    $token = getToken();
?>
    
<main class="main"> 

    <?php snippet('arrivals-moderation', ['token'=>$token]) ?> 
    <?php snippet('departures-moderation', ['token'=>$token]) ?> 

</main>