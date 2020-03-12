<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$form = $site->children()->findByURI('submission-form');

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

            <section class="form-intro row">
                <div class="col-xs-12 col-md-9">
                    <h2 class="section-title form-title"><?= $form->title();?></h2>
                    <div class="body-text">
                        <?= $form->introductionText()->kt();?>
                    </div>
                </div>
            </section>
            <form class="row form" action="<?= $site->children()->findByURI('thank-you')->url();?>" method="post" id="name-submission-form" name="name-submission-form" validate>
                <fieldset class="form-item col-xs-12 col-md-9">
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
                
                <fieldset class="form-item col-xs-12 col-md-9">
                    <label class="fieldset-title" for="ad_name">Name</label>
                    <legend class="visuallyhidden">
                        <?php if($form->nameInstructions()): $form->nameInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_name" type="text" placeholder="Enter Name..." required/>
                    <?php if($form->nameInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->nameInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
            
                <fieldset class="form-item col-xs-12 col-md-9">
                    <h3 class="fieldset-title" aria-hidden="true">Date</h3>
                    <legend class="visuallyhidden">
                        <h3 class="fieldset-title">Date</h3>
                        <?php if($form->dateInstructions()): $form->dateInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_day" type="number" min="1" max="31" placeholder="Day"/> <label class="visuallyhidden" for="ad_day">Day</label>
                    <input id="ad_month" type="number" min="1" max="12" placeholder="Month"/> <label class="visuallyhidden" for="ad_month">Month</label>
                    <input id="ad_year" type="number" placeholder="Year" required/> <label class="visuallyhidden" for="ad_day">Year</label>
                    
                    <?php if($form->dateInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->dateInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
                
                <fieldset class="form-item col-xs-12 col-md-9">
                    <label class="fieldset-title" for="ad_location">Location <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($form->locationInstructions()): $form->locationInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_location" type="text" placeholder="Enter Location..." />
                    <input id="latlng" type="text" name="geo" value="" disabled="true" class="visuallyhidden">
                    <?php if($form->locationInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $form->locationInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
                
                <fieldset class="form-item col-xs-12 col-md-9">
                    <label class="fieldset-title" for="email">Email <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($form->emailInstructions()): $form->emailInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="email" type="email" placeholder="Enter Email..."/>
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
            
        </div>
</main>