
<?php
	$logo = get_stylesheet_directory_uri().'/assets/images/footer-logo.svg';
	$footerMailCopyrightText = get_field('to_mail_copyright_text', 'options');
	$footerSocialMedia = get_field('to_social_media', 'options');
	$footerLogo = get_field('to_footer_logo', 'options');
	$footerContent = get_field('to_content', 'options');
	if ($footerLogo) {
		$logo = $footerLogo['url'];
	}
?>

<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Mit freundlichen Grüßen,</p> 
<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Dein Frieda-Team</p> 

<div class="footerinner-wrap" style="padding: 50px 0 0 0; border-top: 2px solid #000; margin: 30px 0 0 0;  text-align: center;">
	<div class="social-links" style=" display: flex;justify-content: center;align-items: center; padding: 0 0 35px 0;">
		<a target="_blank" href="<?= site_url(); ?>" style="margin:0 20px 0 0 text-decoration: none;">
			<img style="width: 30px;margin: 0 auto;display: block;" src="<?= get_stylesheet_directory_uri() . '/assets/images/globe.png';?>">
		</a>
		<?php
			if($footerSocialMedia) {
				foreach ($footerSocialMedia as $key => $social) {
					?>
						<a target="_blank" href="<?= $social['url']; ?>" style="margin:0 20px 0 0">
							<img style="width: 30px;margin: 0 auto;display: block;" src="<?= get_stylesheet_directory_uri() . '/assets/images/'.$social['choose_social_meida'].'.png';?>">
						</a>
					<?php
				}
			}
		?>
	</div>
	<img style="margin: 0 auto; display: block;" src="<?= $logo; ?>">
	<p style=" text-align:center;font-size: 16px; color: #000; line-height: 26px; margin: 20px 0 10px 0; max-width:400px; margin: 20px auto 10px auto;"><?= $footerMailCopyrightText; ?></p>
</div>