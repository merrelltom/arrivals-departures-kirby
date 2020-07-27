<?php snippet('header');?>
<?php require_once("http://134.209.184.8/var/www/arrivals-departures/admin/flow-flow/ff-injector.php"); $injector = new FFInjector(); ?>
<?php echo $injector->head(true, false); ?>
<?php $injector->stream(1); ?>
<?php snippet('footer');?>