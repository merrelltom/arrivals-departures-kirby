        <section class="page-banner bg-yellow">
            <div class="wrapper">
                <div class="row">
                    <div class="medium-text col-xs-12 col-lg-7 col-lg-offset-5">
                        <p><?= $data->bannerContent();?></p>
                    </div>
                    <div class="button-container col-xs-12 col-lg-7 col-lg-offset-5">
                        <button class="lg-button" data-link="<?= $site->url();?>/submission-form" onclick="toggleForm(this);">Add a name to the boards</button>
                    </div>
                </div>
            </div>
        </section>