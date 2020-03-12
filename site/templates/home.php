<?php snippet('header') ?>

    <main class="main">
        
        <section class="introduction-banner page-section bg-yellow">
            <div class="wrapper">
                <div class="row">
                    <div class="introduction-text col-xs-12 col-md-7">
                        <?= $page->introductionBanner();?>
                    </div>
                    <div class="button-container col-xs-12 col-md-4 col-md-offset-1">
                        <button class="sm-button">Add a name to the boards</button>
                    </div>
                </div>
            </div>
        </section>

        <div class="board-section">
            <div class="wrapper">
                
                <article id="arrivals-board" class="board">
                    
                    <header class="board-header">
                        <h2 class="board-title">Arrivals</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                        <?php snippet('arrivals-board');?>
                    </ol>
                
                </article>
                
                <article id="departures-board" class="board">
                    
                    <header class="board-header">
                        <h2 class="board-title">Departures</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                       <?php snippet('departures-board');?>
                    </ol>
                
                </article>

            </div>
        
        </div>
        
        <section class="board-buttons page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="button-container col-xs-12 col-md-5 col-md-offset-4">
                        <button class="sm-button">Add a name to the boards</button>
                    </div>
                    <div class="button-container col-xs-12 col-md-3">
                        <button class="sm-button">Share</button>
                    </div>
                </div>

            
            </div>
        </section>
        
        <section class="image-section page-section">
        <?php 
            $desktop01 = $page->image01desktop()->toFile();
            if($mobile01 = $page->image01mobile()->toFile()){
            ?>
                <picture class=" ">
                    <img class="lazyload" data-srcset="
                    <?= $mobile01->thumb(array('width' => 320))->url();?> 320w, 
                    <?= $mobile01->thumb(array('width' => 640))->url();?> 640w, 
                    <?= $desktop01->thumb(array('width' => 960))->url();?> 960w, 
                    <?= $desktop01->thumb(array('width' => 1200))->url();?> 1200w, 
                    <?= $desktop01->thumb(array('width' => 1600))->url();?> 1600w, 
                    <?= $desktop01->thumb(array('width' => 2000))->url();?>"
                     sizes="(min-width: 640px) 100vw" >
                </picture>
            <?php }?>
        </section>
        
        <section class="about-section page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4">About</h2>
                    <div class="section-content col-xs-12 col-md-8">
                        <?php
                        foreach($page->blocks()->toBuilderBlocks() as $block):
                          snippet('sections/' . $block->_key(), array('data' => $block));
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="image-section page-section">
        <?php 
            $desktop02 = $page->image02desktop()->toFile();
            if($mobile02 = $page->image02mobile()->toFile()){
            ?>
                <picture class=" ">
                    <img class="lazyload" data-srcset="
                    <?= $mobile02->thumb(array('width' => 320))->url();?> 320w, 
                    <?= $mobile02->thumb(array('width' => 640))->url();?> 640w, 
                    <?= $desktop02->thumb(array('width' => 960))->url();?> 960w, 
                    <?= $desktop02->thumb(array('width' => 1200))->url();?> 1200w, 
                    <?= $desktop02->thumb(array('width' => 1600))->url();?> 1600w, 
                    <?= $desktop02->thumb(array('width' => 2000))->url();?>"
                     sizes="(min-width: 640px) 100vw" >
                </picture>
            <?php }?>
        </section>

        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4">Programme</h2>
                    <div class="section-content col-xs-12 col-md-8">
                        <div class="introduction">
                            <?= $page->programmeIntro()->kt();?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>



<?php snippet('footer') ?>
