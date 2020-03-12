<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php if($page->seoTitle()->isNotEmpty()):?>
  <title><?= $page->seoTitle();?></title>
  <?php else : ?>
  <title><?= $site->title() ?> | <?= $page->title() ?></title>
  <?php endif;?>  

  <?php if($page->seoDescription()->isNotEmpty()):?>
  <meta name="description" content="<?= $page->seoDescription();?>">
  <?php else : ?>
  <meta name="description" content="<?= $site->seoDescription();?>">
  <?php endif;?>  

  <?= css(['assets/css/style-1.0.css', '@auto']) ?>

</head>
<body>

  <div class="page">
      
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
                    <h2 class="section-title form-title"><?= $page->title();?></h2>
                    <div class="body-text">
                        <?= $page->introductionText()->kt();?>
                    </div>
                </div>
            </section>
            <form class="row form" action="XXXXXXXXX" method="post" id="name-submission-form" name="name-submission-form" validate>
                <fieldset class="form-item col-xs-12 col-md-9">
                    <h3 class="fieldset-title" aria-hidden="true">Arrival or Departure?</h3>
                    <legend class="visuallyhidden">
                        <h3 class="fieldset-title">Arrival or Departure?</h3>
                        <?php if($page->arrivalDepartureInstructions()): $page->arrivalDepartureInstructions()->kt(); endif;?>?>
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
                    <?php if($page->arrivalDepartureInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $page->arrivalDepartureInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
                
                <fieldset class="form-item col-xs-12 col-md-9">
                    <label class="fieldset-title" for="ad_name">Name</label>
                    <legend class="visuallyhidden">
                        <?php if($page->nameInstructions()): $page->nameInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_name" type="text" placeholder="Enter Name..." required/>
                    <?php if($page->nameInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $page->nameInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
            
                <fieldset class="form-item col-xs-12 col-md-9">
                    <h3 class="fieldset-title" aria-hidden="true">Date</h3>
                    <legend class="visuallyhidden">
                        <h3 class="fieldset-title">Date</h3>
                        <?php if($page->dateInstructions()): $page->dateInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_day" type="number" min="1" max="31" placeholder="Day"/> <label class="visuallyhidden" for="ad_day">Day</label>
                    <input id="ad_month" type="number" min="1" max="12" placeholder="Month"/> <label class="visuallyhidden" for="ad_month">Month</label>
                    <input id="ad_year" type="number" placeholder="Year" required/> <label class="visuallyhidden" for="ad_day">Year</label>
                    
                    <?php if($page->dateInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $page->dateInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
                
                <fieldset class="form-item col-xs-12 col-md-9">
                    <label class="fieldset-title" for="ad_location">Location <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($page->locationInstructions()): $page->locationInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="ad_location" type="text" placeholder="Enter Location..." required/>
                    <?php if($page->locationInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $page->locationInstructions()->kt();?>
                    </div>
                    <?php endif;?>
                </fieldset>
                
                <fieldset class="form-item col-xs-12 col-md-9">
                    <label class="fieldset-title" for="email">Email <small class="small">(Optional)</small></label>
                    <legend class="visuallyhidden">
                        <?php if($page->emailInstructions()): $page->emailInstructions()->kt(); endif;?>?>
                    </legend>
                    <input id="email" type="email" placeholder="Enter Email..."/>
                    <?php if($page->emailInstructions()):?>
                    <div aria-hidden="true" class="small-text">
                        <?= $page->emailInstructions()->kt();?>
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
