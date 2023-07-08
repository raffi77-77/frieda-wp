<?php
/*
	Template Name: Login Form
*/

if (is_user_logged_in()) {
	wp_redirect(site_url());
	exit;
}

get_header('blank'); 
?>

<div class="payement-section loginform-section">
	<div class="page-logo">
		<a href="/">
		<img src="https://frieda.health/wp-content/uploads/2023/01/logo-new-1.svg"/>
		</a>
	</div>
	<div class="container">
		<div class="login-wrap">
			<div class="leftform-block">
				<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/r-form.png"/>
				<h3>Registriere dich und entdecke deinen Kurs.</h3>
				<!-- <p>Deine persönlichen Daten werden dazu verwendet um deine Bestellung abzuwickeln, die Webseite für dich zu verbessern und weitere Punkte die in unserer Datenschutzerklärung beschrieben sind.</p> -->
			</div>
			<div class="formwrap-block">
				<h3>Anmeldung</h3>
				<h4>Frieda optimal nutzen</h4>
				<p>Melde dich mit deinem Frieda-Konto an, um deinen Kurs nutzen zu können. Mit deinem Frieda-Konto kannst du ganz einfach von überall auf deinen Kurs zugreifen.</p>
				<form class="form-wrap" id="on-login">
					<div class="form-content">
						<label>E-Mail-Adresse</label>
						<input type="email" id="login-email" autocomplete="username">
						<div id="email-error" style="display:none;color: red;"></div>
					</div>
					<div class="form-content">
						<label>Passwort</label>
						<input type="password" id="login-pwd" minlength="8" autocomplete="current-password">
						<div id="password-error" style="display:none;color: red;">falsches Passwort.</div>
					</div>
					<div id="login-success" style="display:none;color: green;"></div>
					<div id="login-error" style="display:none;color: red;"></div>
					<div class="form-content">
						<button type="submit">Anmeldung</button>
					</div>
				</form>
				<br>
				<a href="<?= site_url('forgot-password')?>">Passwort vergessen</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer('blank'); ?>