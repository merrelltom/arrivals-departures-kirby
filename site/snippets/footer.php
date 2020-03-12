<footer class="site-footer bg-yellow">
    <div class="wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-4 footer-col">
                <h3 class="footer-title"><?= $site->footerTitle();?></h3>
                <div class="footer-content">
                    <p class="footer-text"><?= $site->footerCallToAction();?></p>
                    <div class="button-container">
                        <button class="sm-button">Add a name to the boards</button>
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

<div class="overlay-mask"> </div>

<?= js('assets/js/plugins.js') ?>
<?= js('assets/js/script.js') ?>

</body>
</html>