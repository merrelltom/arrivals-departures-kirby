<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$form = $site->children()->findByURI('submission-form');

$open = $form->submissionsOpen()->toBool();

?>

    <header class="header wrapper">
        <div class="row">
            <h1 class="site-title col-xs-12 col-lg-8">
                <a class="logo" title="Arrivals + Departures" href="<?= $site->url() ?>">Arrivals +<br>Departures</a>
            </h1>
        </div>
    </header>

    <main class="main">
        <div class="wrapper">
            <?php if( $open  == true ):?>
            <section class="form-intro row">
                <div class="col-xs-12 ">
                    <h2 class="section-title form-title"><?= $form->title();?></h2>
                    <div class="body-text">
                        <?= $form->introductionText()->kt();?>
                    </div>
                </div>
            </section>
            <form class="row form" action="<?= $site->children()->findByURI('submit')->url();?>" method="post" id="name-submission-form" name="name-submission-form" validate>
                <input type="text" name="valid" id="valid" class="visuallyhidden">
                <fieldset class="form-item col-xs-12">
                    <h3 class="fieldset-title" aria-hidden="true">Arrival or Departure?</h3>
                    <legend class="visuallyhidden">
                        <h3 class="fieldset-title">Arrival or Departure?</h3>
                        <?php if($form->arrivalDepartureInstructions()): $form->arrivalDepartureInstructions()->kt(); endif;?>?>
                    </legend>
                    <div class="radio-wrapper">
                        <div>
                            <input type="radio" id="arrival" name="arrival_or_departure" value="arrival" required>
                            <label for="arrival"><span class="label">Arrival (birth)</span></label>
                        </div>
                    </div>
                    <div class="radio-wrapper">
                        <div>
                            <input type="radio" id="departure" name="arrival_or_departure" value="departure" required>
                            <label for="departure"><span class="label">Departure (death)</span></label>
                        </div>
                    </div>
                    <?php if($form->arrivalDepartureInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->arrivalDepartureInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>

                <fieldset class="form-item col-xs-12">
                    <label class="fieldset-title" for="ad_name">Name</label>
                    <legend class="visuallyhidden">
                        <?php if($form->nameInstructions()): $form->nameInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_name" name="ad_name" type="text" placeholder="Enter Name..."
                           pattern="[A-Za-z- ]{1,24}" title="Max. 24 characters , letters and hyphens only" required/>
                    <?php if($form->nameInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->nameInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>

                <fieldset class="form-item col-xs-12">
                    <h3 class="fieldset-title" aria-hidden="true">Date</h3>
                    <legend class="visuallyhidden">
                        <h3 class="fieldset-title">Date</h3>
                        <?php if($form->dateInstructions()): $form->dateInstructions()->kt(); endif;?>?>
                    </legend>
                    <select id="ad_day" name="ad_day" type="number" min="1" max="31" placeholder="Day">
                        <option value="0">Day</option>
                        <?php for($i = 01; $i < 32; $i++){?>
                            <option value="<?= $i;?>"><?= $i;?></option>
                        <?php }?>


                    </select>
                    <label class="visuallyhidden" for="ad_day">Day</label>
                    <select id="ad_month" name="ad_month" placeholder="Month">
                        <option value="0">Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <label class="visuallyhidden" for="ad_month">Select Month</label>
                    <input id="ad_year" name="ad_year" type="text" placeholder="Year"
                           pattern="[0-9]{4}" title="Four digit date" required/> <label class="visuallyhidden" for="ad_day">Year</label>

                    <?php if($form->dateInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->dateInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>

                <fieldset class="form-item col-xs-12">
                    <label class="fieldset-title" for="ad_location">Location <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($form->locationInstructions()): $form->locationInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_location" type="text" placeholder="Enter Location..." />
                    <input id="latlng" name="latlng" type="text" name="geo" value="" disabled="true" class="visuallyhidden">
                    <?php if($form->locationInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->locationInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>

                <fieldset class="form-item col-xs-12">
                    <label class="fieldset-title" for="ad_location">Story <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($form->storyInstructions()): $form->storyInstructions()->kt(); endif;?>?>
                    </legend>
                    <textarea id="story" name="story" type="textarea" rows="8" maxlength="900" placeholder="Add a story..."></textarea>
                    <?php if($form->storyInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->storyInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>

                <fieldset class="form-item col-xs-12">
                    <label class="fieldset-title" for="email">Email <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($form->emailInstructions()): $form->emailInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="email" name="email" type="email" placeholder="Enter Email..."/>
                    <?php if($form->emailInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->emailInstructions()->kt();?>
                    </div>
                    <div class="small-checkbox-wrapper">
                        <div>
                            <input type="checkbox" id="signup" name="signup" value="signup">
                            <label for="signup"><span class="label">Add me to the mailing list</span></label>
                        </div>
                    </div>
                    <?php endif;?>
                </fieldset>

                <div class="subimt-wrapper col-xs-12">
                    <input type="submit" class="lg-button black-button" value="Submit"/>
                </div>

            </form>
            <?php else : ?>
            <section class="form-intro row">
                <div class="col-xs-12 ">
                    <h2 class="section-title form-title">Submissions</h2>
                    <div class="body-text">
                        <?= $form->closedText()->kt();?>
                        <form class="validate" action="<?= $site->mailingListSignUpURL();?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                        <div class="label-wrapper">
                            <label for="EMAIL"><?= $site->mailingListSignUpText();?></label>
                        </div>
                        <div class="button-wrapper">
                            <div class="sign-up-button-group">
                                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email" required>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ef8f4be807ab7b6e52936da2c_78179ee229" tabindex="-1" value=""></div>
                                    <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="enter button"><span class="visuallyhidden">Subscribe</span> > <span class="icon-short-l-arr-1"></span>
                                    </button>
                              </div>
                        </div>
                    </form>
                    </div>
                </div>
            </section>
            <?php endif;?>
        </div>
</main>
