<?php snippet('header') ?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5">Venue</h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <p>
                        <?= $page->displayTitle();?><br>
                        <?= $page->displayDates();?>
                        </p>
                        
                        <address>
                        <?= $page->displayAddress()->kt();?>
                        </address>
                        
                        <?php 
                            $image = $page->venueImage()->toFile();
                            if($image):
                        ?>
                        <picture class="venue-image">
                            <img class="lazyload" data-srcset="
                            <?= $image->thumb(array('width' => 320))->url();?> 320w, 
                            <?= $image->thumb(array('width' => 960))->url();?> 960w, 
                            <?= $image->thumb(array('width' => 1200))->url();?> 1200w, 
                            <?= $image->thumb(array('width' => 2000))->url();?>"
                             sizes="(min-width: 320px) 100vw" >
                        </picture>
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
            </div>
        </section>
        
        <?php
            $events = $page->children();
            if($events):
        ?>
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12">Events</h2>
                </div>
                <div class="row">
                    <?php foreach($events as $event):?>
                    <div class="event col-xs-12 col-sm-6 col-md-4 col-lg-3"?>
                        <?php 
                            if($image = $event->eventImage()->toFile()){
                            ?>
                            <img class="lazyload" data-srcset="
                            <?= $image->thumb(array('width' => 320))->url();?> 320w, 
                            <?= $image->thumb(array('width' => 640))->url();?> 640w, 
                            <?= $image->thumb(array('width' => 960))->url();?> 960w, 
                            <?= $image->thumb(array('width' => 2000))->url();?>"
                             sizes="100vw, (min-width: 640px) 33vw, (min-width: 1000px) 25vw" >
                        <h3 class="event-title"><?= $event->eventTitle();?></h3>
                        <p class="event-date">
                            <?= $event->eventDate() . '</br>' . $event->eventTime();?>
                        </p>
                        <div class="event-intro"> 
                        <?= $event->eventDescription()->kt();?>
                        </div>
                    <?php }?>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <?php endif;?>
    </main>



<?php snippet('footer') ?>