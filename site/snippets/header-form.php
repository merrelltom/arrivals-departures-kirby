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

  <?= css(['assets/css/style-1.6.css', '@auto']) ?>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-706CG9S90F"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-706CG9S90F');
    </script>
</head>
<body>

  <div class="page">

    <nav id="menu" class="main-menu" aria-label="Main Navigation">
            <?php foreach ($site->children()->listed() as $item): ?>
                <?= $item->title()->link() ?>
            <?php endforeach ?>
        <br><br>
        <button class="lg-button" onclick="toggleForm(this);">Add a name to the boards</button>
    </nav>
