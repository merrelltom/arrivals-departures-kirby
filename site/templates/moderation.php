<?php snippet('header'); 
    snippet('oauth');
    $token = getToken();
    $update_type = filter_input(INPUT_POST, "type");
    $action = filter_input(INPUT_POST, "update");
    $id = filter_input(INPUT_POST, "ID");?>
    <div>
    <?php if ($update_type == 'arrival'){
        snippet('arrivals-update', ['token'=>$token, 'action'=>$action, 'ID'=>$id]);
    } elseif ($update_type == 'departure'){
        snippet('departures-update', ['token'=>$token, 'action'=>$action, 'ID'=>$id]);
    } ?>
    </div>
<main class="main"> 
    <?php snippet('arrivals-moderation', ['token'=>$token]) ?> 
    <?php snippet('departures-moderation', ['token'=>$token]) ?> 
</main>