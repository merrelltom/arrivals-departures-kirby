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