<footer class="site-footer bg-yellow">
    <div class="wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-4 footer-col">
                <h3 class="footer-title"><?= $site->footerTitle();?></h3>
                <div class="footer-content">
                    <p class="footer-text"><?= $site->footerCallToAction();?></p>
                    <div class="button-container">
                        <button class="sm-button" onclick="toggleForm()">Add a name to the boards</button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4 footer-col">
                <h3 class="footer-title">Site Links</h3>
                <nav class="footer-nav footer-content">
                    <ul>
                    <?php $footerLinks = $site->footerNavigation()->toPages(); 
                        foreach ($footerLinks as $item): ?>
                        <li><?= $item->title()->link() ?></li>
                    <?php endforeach ?>
                    </ul>
                </nav>
            </div>
            <div class="col-xs-12 col-lg-4 footer-col">
                <h3 class="footer-title"><?= $site->mailingListSignUpTitle();?></h3>
                <div class="footer-content">
                    <?php snippet('mailinglist');?>
                </div>
                
            </div>
        </div>
    </div>
</footer>

<section id="form-overlay" class="form-overlay" aria-hidden="true">
        <?php snippet('form');?>
</section>


<div class="overlay-mask"> </div>


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

</body>
</html>