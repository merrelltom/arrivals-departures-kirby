<?php snippet('header') ?>

    <main class="main">
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->pageTitle();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->pageIntroduction()->kt(); ?>
                    </div>
                    <br>
                    <a href="#departures" class="section-title col-xs-12 md-hide">> <?php echo t('Skip to Departures');?></a><br><br>
                </div>
            </div>
        </section>
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <div id="arrivals" class="col-xs-12 col-lg-6">
                        <h2 class="section-title">Arrivals</h2>
                        <ol class="names-list">
                            <?php snippet('arrivals-archive');?>
                        </ol>
                    </div>
                    <div id="departures" class="col-xs-12 col-lg-6">
                        <h2 class="section-title">Departures</h2>
                        <ol class="names-list">
                           <?php snippet('departures-archive');?>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

<?php snippet('footer') ?>
