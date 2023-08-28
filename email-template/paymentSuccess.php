<?php
$userData   = $data['userData'];
$user_login = $userData->user_login;
$user_email = $userData->user_email;
$key        = get_password_reset_key( $userData );
$login_url  = network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' );
?>
<div class="emailtemplate-section" style=" background: #f2f2f2; padding: 20px 0;">
    <div class="container"
         style="max-width: 1330px; padding: 0 15px;  margin: 0 auto;  width: 100%; box-sizing: border-box;">
        <div class="innercontent"
             style=" max-width: 700px; width: 100%; margin: 0 auto; pointer-events: auto !important;">
			<?php include( 'header.php' ); ?>
            <div class="content-wrap">
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">
                    Hallo <?php echo $data['current_user']->display_name; ?>,</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wir haben eine Anfrage
                    erhalten, das Passwort für dein Konto zurückzusetzen. Bitte verwende den folgenden Link, um dein
                    Passwort zurückzusetzen: <a href="<?php echo $login_url; ?>"><?php echo $login_url; ?></a>.
                </p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wenn du keine Anfrage
                    für das Zurücksetzen des Passworts gestellt hast, ignoriere bitte diese E-Mail.</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Bitte beachte, dass
                    dieser Link nur für einen begrenzten Zeitraum gültig ist und nur einmal verwendet werden kann. Wenn
                    du den Link innerhalb des angegebenen Zeitrahmens nicht verwendest, musst du eine neue
                    Passwortrücksetzung anfordern.</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Wenn du Fragen oder
                    Bedenken hast, zögere bitte nicht, unser Kundensupport-Team zu kontaktieren.</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Mit freundlichen Grüßen,<br/>Dein
                    Frieda-Team</p>
            </div>
			<?php include( 'footer.php' ); ?>
        </div>
    </div>
</div>