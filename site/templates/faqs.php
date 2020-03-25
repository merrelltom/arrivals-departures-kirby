<?php snippet('header') ?>

    <main class="main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->displayTitle();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->introduction()->kt(); ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="introduction large-text col-xs-12 col-md-8 col-md-offest-8 col-lg-7 col-lg-offset-5">
                        
                            <?php 
                                $questions = $page->questions()->toStructure();
                                $count = 1;
                                if($questions):
                            ?>
                            <div class="questions">
                            <?php foreach($questions as $question):?>
                                <div class="accordion question">
                                    <a href="#q-<?=$count;?>" class="accordion-title question-title">
                                    <?= $question->title()->html(); ?><span class="open-icon-md"><span class="open-icon-wht-bld contain"></span></span></a>
                                    <div id="#q-<?=$count;?>" class="answer accordion-content visuallyhidden">
                                        <?= $question->answer()->kt(); ?>
                                    </div>
                                </div>
                            <?php $count++; endforeach;?>
                            </div>
                            <?php endif;?>
                        
                    </div>
                </div>
            </div>
        </section>
        
            
    </main>



<?php snippet('footer') ?>
