        <section class="video-section page-section">
            <div class="wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="video-wrapper">
                            <div id="<?= $data->videoID();?>"></div>
                            <script>
                              // 2. This code loads the IFrame Player API code asynchronously.
                              var tag = document.createElement('script');

                              tag.src = "https://www.youtube.com/iframe_api";
                              var firstScriptTag = document.getElementsByTagName('script')[0];
                              firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                              // 3. This function creates an <iframe> (and YouTube player)
                              //    after the API code downloads.
                              var player;
                              var playerWrapper = document.getElementById(<?= $data->videoID();?>);
                              function onYouTubeIframeAPIReady() {
                                player = new YT.Player('<?= $data->videoID();?>', {
                                  height: '390',
                                  width: '640',
                                  videoId: '<?= $data->videoID();?>',
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
                            <?php $poster = $data->videoPoster()->toFile();?>
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
                        <div class="caption"><?= $data->videoCaption();?></div>
                    </div>
                </div>
            </div>
