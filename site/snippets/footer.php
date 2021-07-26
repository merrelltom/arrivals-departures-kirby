</div>

<footer class="site-footer bg-yellow">
    <div class="wrapper">
        <div class="row">
            <div class="top-footer large-text col-xs-12 col-lg-6">
                <p><?= $site->footerCallToAction();?></p>
                <div class="button-container">
                    <button class="lg-button" onclick="toggleForm(this);"><?php echo t('Add a name to the boards');?></button>
                </div>            
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3 footer-col">
                <h3 class="footer-title"><?php echo t('Menu');?></h3>
                <nav class="footer-nav footer-content">
                    <ul>
                    <?php foreach ($site->children()->listed() as $item): ?>
                        <li><?= $item->title()->link() ?></li>
                    <?php endforeach ?>
                    </ul>
                </nav>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3 footer-col">
                <h3 class="footer-title"><?php echo t('Other Information');?></h3>
                <nav class="footer-nav footer-content">
                    <ul>
                    <?php $footerLinks = $site->footerNavigation()->toPages(); 
                        foreach ($footerLinks as $item): ?>
                        <li><?= $item->title()->link() ?></li>
                    <?php endforeach ?>
                    </ul>
                </nav>
            </div>
            <div class="col-xs-12 col-lg-6 footer-col">
                <h3 class="footer-title"><?= $site->mailingListSignUpTitle();?></h3>
                <div class="footer-content">
                    <?php snippet('mailinglist');?>
                </div>
            </div>
            <?php 
                $items = $site->logos()->toStructure();
                if($items):
            ?>
            <?php foreach($items as $item):?>
            <div class="col-xs-12 footer-col">
                <h3 class="partners-title"><?= $item->title()->kt();?></h3>
                <div class="logo-row row">
                    <div class="col-xs-12">
                        <figure class="logo-container medium">
                            <img src="<?= kirby()->urls()->assets().'/logos/ww-logo-1.png' ;?>" alt="Without Walls" />
                        </figure>
                        <figure class="logo-container medium">
                            <img src="<?= kirby()->urls()->assets().'/logos/artsadmin.svg' ;?>" alt="Artsadmin" />
                        </figure>
                        <figure class="logo-container small">
                            <img src="<?= kirby()->urls()->assets().'/logos/n-n_logo_vector_black.svg' ;?>" alt="Norfolk and Norwich Festival" />
                        </figure>
                        <figure class="logo-container medium">
                            <img src="<?= kirby()->urls()->assets().'/logos/freedom.png' ;?>" alt="Freedom Festival Arts Trust" />
                        </figure>
                        <figure class="logo-container large">
                            <img src="<?= kirby()->urls()->assets().'/logos/grant_eps_black.svg' ;?>" alt="Arts Council" />
                        </figure>
                        <figure class="logo-container medium">
                            <img src="<?= kirby()->urls()->assets().'/logos/ctc-cti-black-2.svg' ;?>" alt="Create to Connect > Create to Impact" />
                        </figure>
                        <figure class="logo-container large">
                            <img src="<?= kirby()->urls()->assets().'/logos/creative-europe.png' ;?>" alt="Creative Europe" />
                        </figure>
                    </div>
                    
                </div>
            </div>
                <?php endforeach;?>
            <?php endif;?> 
            
        </div>
    </div>
</footer>

<section id="form-overlay" class="form-overlay" aria-hidden="true">
        <?php snippet('form');?>
</section>


<div class="overlay-mask" onclick="hideOverlay();"> </div>


<?php 
//    $MAPS_API_KEY = apache_getenv("MAPS_API_KEY");
    $MAPS_API_KEY = "AIzaSyCoQFtkyedEhPeVuqXPqe392JalVMftDw4";
?>

<?= js('https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js') ?>
<?= js('assets/js/plugins.js') ?>
<?= js('assets/js/script.js') ?>
<?= js('assets/js/cookieValidate-v1.2.js') ?>

<script>
    new cookieNoticeJS({
        'learnMoreLinkEnabled' : 'true',
        'learnMoreLinkHref':'<?= $site->page('privacy-policy')->url();?>'
    });
</script>



<?php 
    if($page->template() == "map"):
        $callback = "&libraries=places&callback=initAutocomplete&callback=initMap";
    else:
        $callback = "&libraries=places&callback=initAutocomplete";
    endif; 
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $MAPS_API_KEY . $callback; ?>"
   async defer></script>

<?= js('assets/js/formValidate.js') ?>

<?php if ($page->isHomePage()):?>
    <?= js('assets/js/update-v1.0.js') ?>
<?php endif;?>

</body>
</html>