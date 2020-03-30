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
            $partners = $page->children();
            if($partners):
        ?>
        <section class="partners page-section">
            <div class="wrapper">
                <div class="row">
                    <?php foreach($partners as $partner):?>
                    <div class="event col-xs-12 col-md-4">
                        <hr>
                        <div class="logo-wrapper">
                            <?php 
                            if($image = $partner->logo()->toFile()){
                            ?>
                            <img class="lazyload partner-logo" data-src="<?= $image->thumb(array('width' => 320))->url();?>">
                        <?php }?>
                        </div>
                        <h2 class="section-title visuallyhidden"><?= $partner->partnerName();?></h2>
                        <div class="event-intro"> 
                        <?= $partner->partnerDescription()->kt();?>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>        
        </section>
        <?php endif;?>        
    </main>

<?php snippet('footer') ?>