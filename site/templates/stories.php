<?php snippet('header') ?>

    <main class="main">

        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->pageTitle();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->pageIntroduction()->kt(); ?>
                    </div>
                    <br><br>
                    <a href="#departure-stories" class="section-title col-xs-12 md-hide ">> Skip to Departures</a>
                </div>
            </div>
        </section>


        <section class="page-section">
            <div class="wrapper">
                <div class="grid">
                  <?php
                    snippet('ad-stories');
                  ?>
                </div>
            </div>
        </section>



    </main>



<?php snippet('footer') ?>
