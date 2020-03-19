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
            </div>
        </section>
        
        <?php
        foreach($page->blocks()->toBuilderBlocks() as $block):
          snippet('sections/' . $block->_key(), array('data' => $block));
        endforeach;
        ?>
        

        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->programmeTitle();?></h2>
                    <div class="section-content col-xs-12 col-md-8 col-lg-7">
                        <div class="introduction">
                            <?= $page->programmeIntro()->kt();?>
                        </div>
                    </div>
                    <?php   
                        $venues = $site->children()->findByURI('programme')->children();
                        if($venues):
                    ?>
                    <div class="section-content col-xs-12 col-md-8 col-md-offset-4 col-lg-7 col-lg-offset-5">
                        <ul class="venue-list">
                            <?php foreach($venues as $venue):?>
                                <li class="venue-list-item">
                                    <a href="<?= $venue->url();?>">
                                        <div aria-hidden="true" class="arrow">></div>
                                        <div class="name"><?= $venue->displayTitle() . '<br>' . $venue->displayDates();?></div>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </section>
    </main>



<?php snippet('footer') ?>
