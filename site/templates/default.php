<?php snippet('header') ?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->title();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->text()->kt(); ?>
                    </div>
                </div>
            </div>
        </section>
        
        
    </main>



<?php snippet('footer') ?>