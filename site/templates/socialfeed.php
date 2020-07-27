<?php snippet('header');?>
<?php require_once($site->url() + "admin/flow-flow/ff-injector.php"); $injector = new FFInjector(); ?>
<?php echo $injector->head(true, false); ?>
<?php $injector->stream(1); ?>
<?php snippet('footer');?>