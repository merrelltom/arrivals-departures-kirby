<?php snippet('header') ?>

        <main class="main">
            <div class="wrapper">

                <section class="form-intro row">
                    <div class="col-xs-12 col-md-9">
                        <h2 class="section-title form-title"><?= $page->title();?></h2>
                        <div class="body-text">
                            <?= $page->thankYouText()->kt();?>
                            <p>#arrivalsanddepartures</p>
                        </div>
                    </div>
                    <div class="button-container col-xs-12 col-md-4 ">
                        <a class="lg-button button" href="<?= $site->url();?>">Back to homepage</a>
                    </div>
                </section>
            </div>
        </main>

<?php snippet('footer');?>
