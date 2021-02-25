<?php snippet('header') ?>

    <main class="main">

        <section class="introduction-banner page-section bg-yellow">
            <div class="wrapper">
                <div class="row">
                    <div class="introduction-text col-xs-12 col-md-6">
                        An interactive public installation about birth, death and the journey in-between by YARA&nbsp;+&nbsp;DAVINA.
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 md-align-right">
                        <div class="button-container">
                            <button class="sm-button" data-link="<?= $site->url();?>/submission-form" onclick="toggleForm(this);">Add a name to the boards</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php if($page->closedToggle() == true):?>
        <section class="introduction-banner page-section bg-orange">
            <div class="wrapper">
                <div class="row">
                    <div class="introduction-text col-xs-12 col-md-6">
                        <?= $page->closedBanner()->kt();?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <div class="board-section">
            <div class="wrapper boards-wrapper">

                <div id="arrivals-board" class="board">

                    <header class="board-header">
                        <h2 class="board-title">Arrivals</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                        <?php snippet('arrivals-board');?>
                    </ol>

                </div>

                <div id="departures-board" class="board">

                    <header class="board-header">
                        <h2 class="board-title">Departures</h2>
                    </header>
                    <div class="xs-hide md-show" aria-hidden="true">
                        <span class="board-column-heading" >Date</span><span class="board-column-heading">Name</span>
                    </div>
                    <ol class="names-list">
                       <?php snippet('departures-board');?>
                    </ol>

                </div>

            </div>

        </div>

        <section class="board-buttons page-section">
            <div class="wrapper board-buttons-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                            <a title="Add a name to the board" class="button icon-button" onclick="toggleForm(this);"><img src="<?= $site->url()?>/assets/icons/add.svg"/></a>
                            <a title="Share on twitter" class="button icon-button" href="https://twitter.com/intent/tweet?url=<?= $page->url(); ?>" target="_blank">
                                <img src="<?= $site->url()?>/assets/icons/twitter.svg"/>
                            </a>
                            <a title="Share on facebook" class="button icon-button" href="https://www.facebook.com/sharer/sharer.php?u=<?= $page->url(); ?>" target="_blank">
                                <img src="<?= $site->url()?>/assets/icons/facebook.svg"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if($page->showVideo()->toBool() == true ): ?>
        <section class="video-section page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="video-wrapper">
                            <div id="<?= $page->videoID();?>"></div>
                            <script>
                              // 2. This code loads the IFrame Player API code asynchronously.
                              var tag = document.createElement('script');

                              tag.src = "https://www.youtube.com/iframe_api";
                              var firstScriptTag = document.getElementsByTagName('script')[0];
                              firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                              // 3. This function creates an <iframe> (and YouTube player)
                              //    after the API code downloads.
                              var player;
                              var playerWrapper = document.getElementById(<?= $page->videoID();?>);
                              function onYouTubeIframeAPIReady() {
                                player = new YT.Player('<?= $page->videoID();?>', {
                                  height: '390',
                                  width: '640',
                                  videoId: '<?= $page->videoID();?>',
                                  playerVars: {
                                      autoplay: '1',
                                      muted: '1',
                                      controls: '0',
                                      fs: '0',
                                      rel: '0'

                                  },
                                  events: {
                                    'onReady': onPlayerReady,
                                    'onStateChange': onPlayerStateChange
                                  }
                                });
                              }

                              // 4. The API will call this function when the video player is ready.
                              function onPlayerReady(event) {
                //                  player.mute();
                                  player.playVideo();
                              }
                              function onPlayerStateChange(event) {
                                if (event.data == 1) {
                                    console.log('playing');
                                    event.target.h.parentElement.classList.add('playing');
                                }
                                if (event.data == 0 ){
                                    console.log('end');
                                    event.target.h.parentElement.classList.remove('playing');
                                    event.target.h.parentElement.classList.add('ended');
                                }
                                if (event.data == 2){
                                    event.target.h.parentElement.classList.remove('playing');
                                }
                              }
                              function stopVideo() {
                                player.stopVideo();
                              }
                              function playVideo() {
                                player.playVideo();
                               }
                              function toggleMute() {
                                  console.log(player.isMuted());
                                  if(player.isMuted() == true){
                                      player.unMute()
                                      playerWrapper.classList.add('unmuted');
                                  }else{
                                      player.mute()
                                      playerWrapper.classList.remove('unmuted');
                                  }
                               }

                            </script>
                            <div onclick="playVideo();" class="youtube-poster-image">
                            <?php $poster = $page->videoPoster()->toFile();?>
                                <img class="lazyload" data-srcset="
                            <?= $poster->thumb(array('width' => 320))->url();?> 320w,
                            <?= $poster->thumb(array('width' => 640))->url();?> 640w,
                            <?= $poster->thumb(array('width' => 960))->url();?> 960w,
                            <?= $poster->thumb(array('width' => 1200))->url();?> 1200w,
                            <?= $poster->thumb(array('width' => 1600))->url();?> 1600w,
                            <?= $poster->thumb(array('width' => 2000))->url();?>"
                             sizes="(min-width: 640px) 100vw" >
                                <div class="youtube-play-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.5 60"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><polygon points="48.5 30 0 0 0 60 48.5 30" fill="#fff"/></g></g></svg>
                                </div>
                            </div>
                        </div>
                        <div class="caption"><?= $page->videoCaption();?></div>
                    </div>
                </div>
            </div>
        </section>

        <?php else : ?>

        <section class="image-section page-section">
            <div class="wrapper">
                <div class="row">
                <?php
                    $desktop01 = $page->image01desktop()->toFile();
                    if($mobile01 = $page->image01mobile()->toFile()){
                    ?>
                <picture class="col-xs-12">
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
                </div>
            </div>

        </section>

        <?php endif; ?>

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
            <div class="wrapper">
                <div class="row">
                <?php
                    $desktop02 = $page->image02desktop()->toFile();
                    if($mobile02 = $page->image02mobile()->toFile()){
                    ?>
                <picture class="col-xs-12">
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
                </div>
            </div>

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
                    <?php
                        $venues = $site->children()->findByURI('programme')->children();
                        if($venues):
                    ?>
                    <div class="section-content col-xs-12 col-md-8 col-md-offset-4">
                        <ul class="venue-list">
                            <?php foreach($venues as $venue):?>
                                <li class="venue-list-item">
                                    <a href="<?= $venue->url();?>">
                                        <div aria-hidden="true" class="arrow">></div>
                                        <div class="name"><?= $venue->displayTitle() . '<br>' . $venue->displayDates();?></div>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </section>
    </main>



<?php snippet('footer') ?>
