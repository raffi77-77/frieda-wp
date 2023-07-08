<div class="emailtemplate-section" style=" background: #f2f2f2; padding: 20px 0;">
	<div class="container" style="max-width: 1330px; padding: 0 15px;  margin: 0 auto;  width: 100%; box-sizing: border-box;">
		<div class="innercontent" style=" max-width: 700px; width: 100%; margin: 0 auto; pointer-events: auto !important;">
			<?php include('header.php'); ?>
			<div class="content-wrap">
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Hallo <?= $data['current_user']->display_name; ?>,</p>
				<img style="max-width: 700px; width: 100%; margin: 0 0 20px 0; " src="<?= get_stylesheet_directory_uri(); ?>/assets/images/sunset.jpg">
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wir freuen uns, dir mitteilen zu können, dass deine Anmeldung für <?= $data['current_user']->user_login; ?> erfolgreich war! Wir freuen uns darauf, dich in unserem Kurs begrüßen zu dürfen.</p>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Bitte beachte, dass der Kurs am <?= date("l jS \of F Y h:i:s A");?> beginnt und du nähere Anweisungen und Details per E-Mail erhalten wirst, die dem Startdatum näher rücken.</p>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wenn du Fragen oder Bedenken hast, zögere bitte nicht, uns zu kontaktieren. Wir helfen dir gerne weiter.</p>
				<br>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Vielen Dank, dass du dich für unseren Kurs entschieden hast.</p>
				<!-- <a href="/" class="dark-btn" style="background: #344A60; color: #fff; font-size: 18px; font-weight: 500; display: inline-block; padding: 10px 0;border-radius: 8px;transition: 0.5s all ease-in-out; border: 2px solid #344A60;max-width: 150px; width: 160px; text-align: center;max-width: 250px; margin: 0 auto; display: block;width: 100%;" target="_blank">Lorem Ipsume</a> -->
			</div>
			<?php include('footer.php'); ?>
		</div>	

	</div>
</div>