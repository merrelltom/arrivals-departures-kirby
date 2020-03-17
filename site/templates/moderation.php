<?php snippet('header'); 
    snippet('oauth');
    $token = getToken();
?>
    
<main class="main"> 

    <?php snippet('arrivals-moderation') ?> 
    <?php snippet('departures-moderation') ?> 

</main>