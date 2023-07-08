<?php
/*
	Template Name: Register Confirmation
*/

if(is_user_logged_in()) {
	wp_redirect(site_url());
	exit;
} else {
	if (isset($_COOKIE['registerConfirmation'])) {
		wp_redirect(site_url('register'));
		exit;
	}
}
get_header('blank');
?>
<div class="yesno-section rconfirm-wrap">
	<div class="container">
		<div class="yesno-wrap">
			<div class="logo-wrap">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-new.svg"/>
			</div>
			<div class="innercontent">
				<h2>Unser Online-Kurs “Stress während der Wechseljahre reduzieren” ist ein Präventionsangebot. Laut § 20 Abs. 4 Nr. 1 SGB V sind wir verpflichtet sicherzustellen, das nur Personen ohne schwere behandlungsbedürftige psychische Erkrankung an unserem Kurs teilnehmen. Außerdem ersetzt der Kurs keine psychotherapeutische oder psychiatrische Behandlung.</h2> 
				<h2>Bist Du aktuell von einer schweren behandlungsbedürftigen psychischen Erkrankung betroffen?</h2>
				<div class="buttons-content">
					<button class="register-confirmation-yes">Nein</button>
					<button class="register-confirmation-no">Ja</button>
					<button class="register-confirmation-no">Ich weiß es nicht</button>
				</div>
			</div>

			<div class="selected-content-wrap" id="selected-none-content" style="display:none;">Gerne kannst du uns eine E-Mail an die  <a href="mailto:hello@frieda.health" target="_blank">hello@frieda.health</a> schicken und wir können gemeinsam sehen, ob das Programm trotzdem etwas für dich ist.</div>
		</div>
	</div>
</div>
<?php get_footer('blank'); ?>