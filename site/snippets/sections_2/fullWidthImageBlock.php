<?php 
    $desktop02 = $data->imageDesktop()->toFile();
    if($mobile02 = $data->imageMobile()->toFile()){
?>
    <img class="lazyload" data-srcset="
    <?= $mobile02->thumb(array('width' => 320))->url();?> 320w, 
    <?= $mobile02->thumb(array('width' => 640))->url();?> 640w, 
    <?= $desktop02->thumb(array('width' => 960))->url();?> 960w, 
    <?= $desktop02->thumb(array('width' => 1200))->url();?> 1200w, 
    <?= $desktop02->thumb(array('width' => 1600))->url();?> 1600w, 
    <?= $desktop02->thumb(array('width' => 2000))->url();?>"
     sizes="(min-width: 640px) 100vw" >
<?php }?>
