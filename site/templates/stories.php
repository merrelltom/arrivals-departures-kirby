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
                <div class="grid">
                   <div id="2" class="col-xs-12 col-md-6 col-xl-4 resource">
                        <div class="bg-yellow story">
                            <div class="story-cat">Arrival</div>
                            <h2 class="story-name large-text">Rob Prouse</h2>
                            <div class="story-date">13.05.20</div>
                            <div class="story-text"> 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id sagittis arcu, ut tristique felis. Praesent tempus nec erat lacinia dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis in dolor eu enim molestie aliquam. Nulla non odio orci. Vestibulum volutpat id arcu in ultrices. Vestibulum faucibus lorem ut sapien sollicitudin elementum. Maecenas aliquam justo at fermentum dignissim. Donec ut lectus leo. Nulla augue ex, tempus eu massa eget, euismod tincidunt mi. Vestibulum pellentesque urna nec diam auctor, eu vehicula odio posuere. Praesent hendrerit lorem id urna interdum, vitae hendrerit ante euismod. Integer porta tortor ex, molestie euismod tellus blandit vel.
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

        
        
    </main>



<?php snippet('footer') ?>
