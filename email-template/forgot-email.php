<?php
$userData = $data['userData'];
$user_login = $userData->user_login;
$user_email = $userData->user_email;
$key = get_password_reset_key( $userData );
?>
<div class="emailtemplate-section" style=" background: #f2f2f2; padding: 20px 0;">
	<div class="container" style="max-width: 1330px; padding: 0 15px;  margin: 0 auto;  width: 100%; box-sizing: border-box;">
		<div class="innercontent" style=" max-width: 700px; width: 100%; margin: 0 auto; pointer-events: auto !important;">
			<?php include('header.php'); ?>
			<div class="content-wrap">
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Hallo <?= $data['current_user']->display_name; ?>,</p>
				<img style="max-width: 700px; width: 100%; margin: 0 0 20px 0; " src="<?= get_stylesheet_directory_uri(); ?>/assets/images/sunset.jpg">
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wir haben eine Anfrage erhalten, das Passwort für dein Konto zurückzusetzen. Bitte verwende den folgenden Link, um dein Passwort zurückzusetzen: <a href="<?= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login'); ?>"><?= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login'); ?></a></p>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wenn du keine Anfrage für das Zurücksetzen des Passworts gestellt hast, ignoriere bitte diese E-Mail.</p>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Bitte beachte, dass dieser Link nur für einen begrenzten Zeitraum gültig ist und nur einmal verwendet werden kann. Wenn du den Link innerhalb des angegebenen Zeitrahmens nicht verwendest, musst du eine neue Passwortrücksetzung anfordern.</p>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wenn du Fragen oder Bedenken hast, zögere bitte nicht, unser Kundensupport-Team zu kontaktieren.</p>
				<br>
				<!-- <a href="/" class="dark-btn" style="background: #344A60; color: #fff; font-size: 18px; font-weight: 500; display: inline-block; padding: 10px 0;border-radius: 8px;transition: 0.5s all ease-in-out; border: 2px solid #344A60;max-width: 150px; width: 160px; text-align: center;max-width: 250px; margin: 0 auto; display: block;width: 100%;" target="_blank">Lorem Ipsume</a> -->
			</div>
			<?php include('footer.php'); ?>
		</div>	

	</div>
</div>

<h3>Anfrage zum Zurücksetzen des Passworts</h3>
<div>Hello <?= $user_login; ?>,</div>
<br>
<div>Jemand hat ein neues Passwort für das folgende Konto auf Frieda angefordert:</div>
<br>
<div>Benutzername: <?= $user_login; ?></div>
<br>
<div>Wenn du diese Anfrage nicht gesendet hast, kannst du diese E-Mail ignorieren. Wenn du fortfahren möchtest:</div>
<br>
<div>
	
</div>
<br>
<div>Danke fürs Lesen.</div>
<br>