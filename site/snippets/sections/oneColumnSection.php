<section class="page-section">
    <div class="wrapper">
        <div class="row body-text">
            <div class="col-xs-12"><hr></div>
            <h2 class="col-xs-12"><?= $data->title();?></h2>
            <div class="body-text col-xs-12 col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-0">
                <?= $data->columnOne()->kt(); ?>
            </div>
            <div class="body-text col-xs-12 col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-0">
                <?= $data->columnTwo()->kt(); ?>
            </div>
        </div>
    </div>
</section>