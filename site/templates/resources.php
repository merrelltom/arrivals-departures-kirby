<?php snippet('header') ?>

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
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <?php
                        $resources = $page->children();
                        if($resources): foreach($resources as $resource):
                    ?>
                    <div class="col-xs-12 col-md-6 col-xl-4 resource">
                        <?php 
                            $extLink = $resource->externalLink();
                            $pdf = $resource->pdf()->toFile();
                            if($pdf){
                                $type = 'PDF';
                                $link = $pdf->url();
                                $text = 'Click to download PDF';
                            }else{
                                $type = 'EXTERNAL LINK';
                                $link = $extLink;
                                $text = 'Click to view resource';
                            }
                        ?>
                        <a href="<?= $link;?>" class="block-link bg-yellow padded venue-details">
                            <div class="resource-type"><?= $type;?></div>
                            <h2 class="section-title"><?= $resource->title();?></h2>
                            <div class="event-intro"> 
                                <?= $resource->description()->kt();?>
                                <span class="button-text"><?= $text;?></span>
                            </div>
                        </a>
                    </div>
                  <?php endforeach;?> 
                </div>
            </div>
        </section>
        <?php endif;?>
    </main>



<?php snippet('footer') ?>