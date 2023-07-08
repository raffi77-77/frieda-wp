<?php
	$logo = get_stylesheet_directory_uri().'/assets/images/footer-logo.svg';
	$footerCopyrightText = get_field('to_copyright_text', 'options');
	$footerSocialMedia = get_field('to_social_media', 'options');
	$footerLogo = get_field('to_footer_logo', 'options');
	$footerContent = get_field('to_content', 'options');
	if ($footerLogo) {
		$logo = $footerLogo['url'];
	}
?>
<footer class="footer-wrap">	
	<div class="container">
		<div class="footer-logo">
			<img src="<?= $logo; ?>"/>
		</div>
		<div class="footer-info">
			<div class="footer-social">
				<?= $footerContent; ?>
				<?php
					if($footerSocialMedia) {
						echo '<div class="social-icons">';
						foreach ($footerSocialMedia as $key => $social) {
							?>
							<a target="_blank" href="<?= $social['url'];?>">
								<i class="fa-brands fa-<?= $social['choose_social_meida'];?>"></i>
							</a>
							<?php
						}
						echo '</div>';
					}
				?>
			</div>
			<div class="footer-menu">
				<h4><?= wp_get_nav_menu_name('footer_menu1'); ?></h4>
				<?php wp_nav_menu(['theme_location' => 'footer_menu1']); ?>
			</div>
			<div class="footer-newsletter">
				<h4>Melde Dich hier bei unserem Newsletter an</h4>
				<div class="newsletter-block">
					<?= do_shortcode('[contact-form-7 id="1913" title="Newsletter Form"]');?>
				</div> 
				<!-- <span>By subscribing you agree to with our <a href="#"> Privacy Policy</a></span> -->
				<span>Wenn du unseren Newsletter abonnierst stimmst du unseren Datenschutzbestimmungen zu.</span>
			</div>
		</div>
		<div class="copyright-wrap">
			<?php wp_nav_menu(['theme_location' => 'footer_menu']); ?>
			<div class="year">
				<p><?= $footerCopyrightText; ?></p>
			</div>
		</div>
	</div>
</footer>	
<script type="text/javascript">var ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";</script>
<?php wp_footer(); ?>
</body>
</html>