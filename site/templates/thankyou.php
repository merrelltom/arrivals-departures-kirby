<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php if($page->seoTitle()->isNotEmpty()):?>
  <title><?= $page->seoTitle();?></title>
  <?php else : ?>
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <?php endif;?>  

  <?php if($page->seoDescription()->isNotEmpty()):?>
  <meta name="description" content="<?= $page->seoDescription();?>">
  <?php else : ?>
  <meta name="description" content="<?= $site->seoDescription();?>">
  <?php endif;?>  

  <?= css(['assets/css/style-1.1.css', '@auto']) ?>

</head>
<body>

  <div class="page">
      
        <header class="header wrapper">
            <div class="row">
                <h1 class="site-title col-xs-12 col-lg-8">
                    <a class="logo" title="Arrivals + Departures" href="<?= $site->url() ?>">Arrivals +<br>Departures</a>
                </h1>
            </div>
        </header>
        <main class="main">
            <div class="wrapper">

                <section class="form-intro row">
                    <div class="col-xs-12 col-md-9">
                        <h2 class="section-title form-title">Thank You</h2>
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
    </div>

<?php snippet('footer');?>
