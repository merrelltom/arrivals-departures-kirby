<?php snippet('header');?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->pageTitle();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->pageIntroduction()->kt(); ?>
                    </div>
                </div>
            </div>
        </section>
        
        <?php
        foreach($page->blocks()->toBuilderBlocks() as $block):
          snippet('sections/' . $block->_key(), array('data' => $block));
        endforeach;
        ?>
        

        <section class="page-section">
            <div class="wrapper">

                <script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
                <link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
                <ul class="juicer-feed" data-feed-id="london-ac92fb07-7bc2-45cc-bc77-c61122dcd0ae"></ul>
                
            </div>
        </section>
</main>

<?php snippet('footer');?>