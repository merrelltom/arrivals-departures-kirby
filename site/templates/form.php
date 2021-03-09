<?php snippet('header-form') ?>

   <?php snippet('form');?>

  </div><?php //dont delete – opening tag is in header!?>

<?php
    $MAPS_API_KEY = apache_getenv("MAPS_API_KEY");
?>

<?= js('https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js') ?>
<?= js('assets/js/plugins.js') ?>
<?= js('assets/js/script-v1.0.js') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $MAPS_API_KEY; ?>&libraries=places&callback=initAutocomplete"
   async defer></script>
<?= js('assets/js/formValidate.js') ?>

<?php if ($page->isHomePage()):?>
    <?= js('assets/js/update-v1.0.js') ?>
<?php endif;?>
