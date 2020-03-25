<?php snippet('header') ?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-4 large-text">
                        <div class="bg-yellow padded venue-details">

                            <h2 class="section-title">
                                <?= $page->displayTitle();?><br>
                                <?= $page->displayDates();?>
                            </h2>

                            <?php 
                                $image = $page->venueImage()->toFile();
                                if($image):
                            ?>

                            <?php endif;?>

                            <?php 
                                $items = $page->details()->toStructure();
                                if($items):
                            ?>
                            <div class="details">
                            <?php foreach($items as $item):?>
                                <h3><?= $item->title()->html(); ?></h3>
                                <?= $item->detailContent()->kt(); ?>
                            <?php endforeach;?>
                            </div>
                            <?php endif;?>
                            
                        </div>
                    </div>

        
                    <?php
                        $events = $page->children();
                        if($events):
                    ?>
                    <div class="col-xs-12 col-lg-8">
                        <div class="event-section">
                            
                            <div class="row">
                                <h2 class="section-title event-title col-xs-12">Events</h2>                    
                                <?php foreach($events as $event):?>
                                <div class="event col-xs-12 col-sm-6 col-md-4 col-lg-4"?>
                                    <?php 
                                        if($image = $event->eventImage()->toFile()){
                                        ?>
                                        <img class="lazyload" data-srcset="
                                        <?= $image->thumb(array('width' => 320))->url();?> 320w, 
                                        <?= $image->thumb(array('width' => 640))->url();?> 640w, 
                                        <?= $image->thumb(array('width' => 960))->url();?> 960w, 
                                        <?= $image->thumb(array('width' => 2000))->url();?>"
                                         sizes="100vw, (min-width: 640px) 33vw, (min-width: 1000px) 25vw" >
                                    <?php }?>
                                    <h3 class="event-title"><?= $event->eventTitle();?></h3>
                                    <p class="event-date">
                                        <?= $event->eventDate() . '</br>' . $event->eventTime();?>
                                    </p>
                                    <div class="event-intro"> 
                                    <?= $event->eventDescription()->kt();?>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif;?>
    </main>



<?php snippet('footer') ?>