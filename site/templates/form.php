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

  <?= css(['assets/css/style-1.0.css', '@auto']) ?>

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
           <?php snippet('form');?>
        </div>  
    </main>
      
      

<?php 
//    $MAPS_API_KEY = apache_getenv("MAPS_API_KEY");
    $MAPS_API_KEY = "AIzaSyCoQFtkyedEhPeVuqXPqe392JalVMftDw4";
?>

<?= js('https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js') ?>
<?= js('assets/js/plugins.js') ?>
<?= js('assets/js/script.js') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $MAPS_API_KEY; ?>&libraries=places&callback=initAutocomplete"
   async defer></script>
<?= js('assets/js/formValidate.js') ?>

<?php if ($page->isHomePage()):?>
    <?= js('assets/js/update.js') ?>
<?php endif;?>