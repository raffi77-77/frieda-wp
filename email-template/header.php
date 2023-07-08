
<?php
	$logo = get_stylesheet_directory_uri().'/assets/images/logo-new.svg';
	$headerLogo = get_field('to_header_logo', 'options');
	if ($headerLogo) {
		$logo = $headerLogo['url'];
	}
?>
<div class="logo-wrap" style="padding: 0 0 30px 0;">
	<img style="margin: 0 auto; display: block;" src="<?= $logo; ?>">
</div> 