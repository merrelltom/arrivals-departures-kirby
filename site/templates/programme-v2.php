<?php snippet('header') ?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->pageTitle();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->pageIntroduction()->kt(); ?>
                    </div>
                </div>
                <?php   
                    $venues = $site->children()->findByURI('programme')->children();
                    if($venues):
                ?>
                <div class="row">
                    <?php foreach($venues as $venue):?>
                       <div class="col-xs-12 col-md-12 col-lg-4">
                            <a href="<?= $venue->url();?>" class="block-link bg-yellow padded venue-details">

                                <h2 class="section-title">
                                    <?= $venue->displayTitle();?><br>
                                    <?= $venue->displayDates();?>
                                </h2>
                            </a>
                        </div>

                    <?php endforeach;?>
                </div>
                <?php
                    endif;
                ?>
            </div>
        </section>        
    </main>

<?php snippet('footer') ?>
