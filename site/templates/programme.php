<?php snippet('header') ?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-5">
                        <h2 class="section-title"><?= $page->pageTitle();?></h2>
                    </div>
                    <div class="section-content col-xs-10 col-lg-7">
                        <div class="introduction">
                            <?= $page->pageIntroduction()->kt(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="col-xs-12 col-md-10 col-lg-5">
                        <div class="sub-intro-box small-text">
                        <?= $page->furtherIntro()->kt(); ?>
                            <br>
                        </div>
                    </div>
                <?php   
                    $venues = $site->children()->findByURI('programme')->children();
                    if($venues):
                ?>
                    <div class="section-content col-xs-12 col-lg-7">
                        <ul class="venue-list lg-no-pad">
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
                        
                </div>
                <?php
                    endif;
                ?>
            </div>
        </section>        
    </main>

<?php snippet('footer') ?>
