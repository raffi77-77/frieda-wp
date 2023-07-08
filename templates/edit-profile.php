<?php
/*
Template Name: Edit Profile
*/

if(!is_user_logged_in()) {
	wp_redirect(site_url(), 302 );
	exit;
}

get_header();
$user = wp_get_current_user();

$isUserImgExists = get_user_meta(get_current_user_id(),'_pUserImage',true);
?>

<div class="profilesetting-section">
    <div class="container">
		<div class="profilesetting-content">
			<div class="discovery-title">
				<a class="backbtn" href="<?= site_url(); ?>">
					<span class="arrow-icon">
						<img src="/wp-content/themes/frieda-wp/assets/images/back-arrow.png">
					</span>
					<span class="arrow-content">Zurück</span>
				</a>
			</div>
			<div class="tabs-wrapper">
				<div class="tabs-list">
					<ul>
						<?php
							$tabs = [
								'' => 'Mein Profil',
								'password' => 'Passwort ändern',
								'email' => 'E-Mail Adresse ändern',
								'delete-account' => 'Account löschen',
							];
							
							foreach($tabs as $key => $tab) {
								$url = site_url('edit-profile');
								$class = '';
								if ($key) {
									$url = site_url('edit-profile?tab='.$key);
									
								} 
								if (!isset($_GET['tab']) && !$key) {
									$class = 'active';
								} else if (isset($_GET['tab']) && $_GET['tab'] ==$key) {
									$class = 'active';
								} 
								?>
								<li><a class="<?= $class; ?>" href="<?= $url; ?>"><?= $tab;?></a></li>
								<?php
							}
						?>
					</ul>
				</div>
				<div class="tabs-contentwrap">

					<?php if(isset($_GET['tab'])) { ?>
						<?php if($_GET['tab'] =='password') { ?>
							<div class="tabscontent password-section">
								<h5>Passwort ändern</h5>
								<div class="inputfield-wrap">
									<div class="fields old-pass">
										<label for="pass">Altes Passwort</label>
										<input type="password" id="old-pwd" autocomplete="new-password">
										<div class="error error-old-pwd" style="display:none">Altes Passwort Required.</div>
									</div>
									<div class="fields">
										<label for="fname">Neues Passwort</label>
										<input type="password" id="new-pwd" autocomplete="new-password">
										<div class="error error-new-pwd" style="display:none">Neues Passwort Required.</div>
									</div>
									<div class="fields">
										<label for="email">Neues Passwort bestätigen</label>
										<input type="password" id="confirm-pwd" autocomplete="new-password">
										<div class="error error-confirm-pwd" style="display:none">Neues Passwort bestätigen Required.</div>
										<div class="error error-pwd-not-match" style="display:none">Passwort Not Matched.</div>
									</div>	
								</div>
								<button class="update-btn" id="update-password" type="password">Aktualisieren</button>
								<div class="password-update-message" style="display:none"></div>
							</div>
						<?php } elseif($_GET['tab'] =='email') { ?>
							<div class="tabscontent email-section">
								<h5>E-Mail-Adresse ändern</h5>
								<p>Wir schicken dir einen Code zur Verifizierung an deine neue E-Mail-Adresse</p>
								<div class="inputfield-wrap">
									<div class="fields">
										<label for="email">Aktuelle E-Mail</label>
										<input type="email" value="<?= $user->user_email; ?>" disabled>
									</div>
									<div class="fields">
										<div class="verify-email-wrap">
											<label for="fname">Neue E-Mail-Adresse eingeben</label>
											<label class="verify-email" style="cursor: pointer;padding: 0px 10px;">Bestätigungscode senden</label>
										</div>
										<input type="email" name="email" id="email" updateEmail="true" onkeypress="return event.keyCode != 13;" value="" required>
										<p class="verify-email-desc">Bitte bestätigen Sie Ihre E-Mail-Adresse, um fortzufahren</p>
										<div id="email-success" style="display:none;color: green;"></div>
										<div id="email-error" style="display:none;color: red;">E Mail erforderlich</div>
									</div>
									<div class="fields otp-content verify-otp" style="display:none;">
										<label for="email">Code eingeben und verifizieren</label>
										<div class="otpfield-wrap">
											<input type="number" id="digit-1" name="digit-1" data-next="digit-2" />
											<input type="number" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
											<input type="number" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
											<input type="number" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
											<input type="number" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
											<input type="number" id="digit-6" name="digit-6" data-previous="digit-5" />
										</div>
										<!-- <div class="timecontent-wrap">
											<span class="time-block">
												<img  src="<?= get_stylesheet_directory_uri(); ?>/assets/images/c-icon.svg" / >
												00:12
											</span>
											<span class="resend-block">
												<img  src="<?= get_stylesheet_directory_uri(); ?>/assets/images/r-icon.svg" / >
												Verifizierungscode neu senden
											</span>
										</div> -->
											
										<div class="resend-wrap timecontent-wrap">
											<span class="time-block">
												<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/time.png"/>
												<span class="time-count" id="time-count">00:00</span>
											</span>
											<span class="resend-btn disable resend-block">
												<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/resend.png"/>
												<span class="resend">Verifizierungscode erneut senden</span>
											</span>
										</div>
										<div id="verify-error" style="display:none;color: red;">OTP nicht abgeglichen..</div>
									</div>	
								</div>
								<!-- <button class="update-btn">Update</button> -->
							</div>
						<?php } elseif($_GET['tab'] =='delete-account') { ?>
							<div class="tabscontent delete-section">
								<h5>Bist du sicher,<br> dass du deinen Account löschen möchtest?</h5>
								<p>Durch das Löschen deines Accounts werden alle deine Daten und deine Fortschritte im Programm gelöscht. Dieser Schritt kann nicht mehr rückgängig gemacht werden.</p>
								<button class="update-btn" id="delete-account">Verstanden, ich stimme zu.</button>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="tabscontent profile-section">
							<h5>Profileinstellungen</h5>
							<!-- <p>empowerment through confidential support</p> -->
							<div class="profile-upload">
								<div class="circle">
									<?php
									if ($isUserImgExists) {
										echo '<img class="profile-pic" src="'.$isUserImgExists.'" / >';
									} else {
										echo get_avatar($user->ID,256,'','',['class' => 'profile-pic']);
									}
									?>
								</div>
								<div class="p-image">
									<i class="fa fa-camera upload-button"></i>
									<input class="file-upload" type="file" accept="image/*"/>
								</div>
							</div>	
							<hr>
							<div class="inputfield-wrap">
								<div class="fields">
									<label for="fname">Vorname</label>
									<input type="text" id="fname" name="fname" value="<?= $user->user_firstname; ?>">
									<div class="error error-fname" style="display:none">Vorname Required.</div>
								</div>
								<div class="fields">
									<label for="fname">Nachname</label>
									<input type="text" id="lname" name="lname" value="<?= $user->user_lastname; ?>">
									<div class="error error-lname" style="display:none">Nachname Required.</div>
								</div>
								<!-- <div class="fields">
									<label for="email">Email ID</label>
									<input type="email" id="email" name="email" value="<?= $user->user_email; ?>">
								</div>	 -->
							</div>
							<button class="update-btn" id="update-profile" type="profile">Aktualisieren</button>
							<div class="success success-profile-update" style="display:none">Profilaktualisierung erfolgreich.</div>
							<div class="error error-profile-update" style="display:none">Etwas ist schief gelaufen. Bitte versuche es erneut.</div>
						</div>
					<?php } ?>
				</div>
			</div>	
		</div>	
    </div>
</div>

<?php get_footer(); ?>