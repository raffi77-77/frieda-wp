<div class="emailtemplate-section" style=" background: #f2f2f2; padding: 20px 0;">
    <div class="container"
         style="max-width: 1330px; padding: 0 15px;  margin: 0 auto;  width: 100%; box-sizing: border-box;">
        <div class="innercontent"
             style=" max-width: 700px; width: 100%; margin: 0 auto; pointer-events: auto !important;">
			<?php include( 'header.php' ); ?>
            <div class="content-wrap">
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">
                    Hallo <?php echo $data['current_user']->display_name; ?>,</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">wir haben eine Anfrage
                    erhalten, deine E-Mail-Adresse, die mit deinem Konto verknüpft ist,
                    zu ändern. Bitte verwende den folgenden Verifizierungscode, um deine
                    E-Mail-Änderungsanfrage zu bestätigen: <?php echo $data['otp']; ?>.</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Gib den
                    Verifizierungscode auf der Seite zur Änderung deiner E-Mail-Adresse ein, um den
                    Prozess abzuschließen. Der Code ist nur für einen begrenzten Zeitraum gültig und kann nur
                    einmal verwendet werden.
                </p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 36px 0;">Wenn du diese
                    E-Mail-Adresse-Änderung nicht angefordert hast, ignoriere bitte diese E-Mail.</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 36px 0;">Wenn du Fragen oder
                    Bedenken hast, zögere bitte nicht, unser Kundensupport-Team zu kontaktieren.</p>
                <p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Mit freundlichen Grüßen,<br/>Dein
                    Frieda-Team</p>
            </div>
			<?php include( 'footer.php' ); ?>
        </div>
    </div>
</div>