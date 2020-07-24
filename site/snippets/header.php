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

  <?= css(['assets/css/style-1.2.css', '@auto']) ?>

</head>
<body>

  <div class="page">
      
    <header id="header" class="header wrapper">
        <div class="row">
            <h1 class="site-title col-xs-12 col-lg-8">
                <a class="logo" title="Arrivals + Departures" href="<?= $site->url() ?>">Arrivals +<br>Departures</a>
            </h1>
            <div class="col-lg-4">
                <div class="menu-button-container">
                    <button class="menu-button" aria-hidden="true" onclick="toggleMenu();">
                        <div class="menu-button-inner">
                            <span class="menu-button-bar"></span>
                            <span class="menu-button-bar"></span>
                            <span class="menu-button-bar"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </header>

                
    <nav id="menu" class="main-menu" aria-label="Main Navigation">
            <?php foreach ($site->children()->listed() as $item): ?>
                <?= $item->title()->link() ?>
            <?php endforeach ?>
        <br><br>
        <button class="lg-button" onclick="toggleForm(this);">Add a name to the boards</button>
    </nav>  