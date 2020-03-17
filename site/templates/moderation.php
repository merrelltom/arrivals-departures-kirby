<?php snippet('header'); 
    snippet('oauth');
    $token = getToken();
    $update_type = filter_input(INPUT_POST, "type");
    $update_type;
?>
    
<main class="main"> 
    <?php snippet('arrivals-moderation', ['token'=>$token]) ?> 
    <?php snippet('departures-moderation', ['token'=>$token]) ?> 
</main>