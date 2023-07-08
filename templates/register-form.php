<?php
/*
	Template Name: Register Form
*/

if (!isset($_COOKIE['registerConfirmation'])) {
	wp_redirect(site_url('register-confirmation'));
	exit;
}

get_header();
$countryList = array(
	"AF" => "Afghanistan",
	"AL" => "Albania",
	"DZ" => "Algeria",
	"AS" => "American Samoa",
	"AD" => "Andorra",
	"AO" => "Angola",
	"AI" => "Anguilla",
	"AQ" => "Antarctica",
	"AG" => "Antigua and Barbuda",
	"AR" => "Argentina",
	"AM" => "Armenia",
	"AW" => "Aruba",
	"AU" => "Australia",
	"AT" => "Austria",
	"AZ" => "Azerbaijan",
	"BS" => "Bahamas",
	"BH" => "Bahrain",
	"BD" => "Bangladesh",
	"BB" => "Barbados",
	"BY" => "Belarus",
	"BE" => "Belgium",
	"BZ" => "Belize",
	"BJ" => "Benin",
	"BM" => "Bermuda",
	"BT" => "Bhutan",
	"BO" => "Bolivia",
	"BA" => "Bosnia and Herzegovina",
	"BW" => "Botswana",
	"BV" => "Bouvet Island",
	"BR" => "Brazil",
	"BQ" => "British Antarctic Territory",
	"IO" => "British Indian Ocean Territory",
	"VG" => "British Virgin Islands",
	"BN" => "Brunei",
	"BG" => "Bulgaria",
	"BF" => "Burkina Faso",
	"BI" => "Burundi",
	"KH" => "Cambodia",
	"CM" => "Cameroon",
	"CA" => "Canada",
	"CT" => "Canton and Enderbury Islands",
	"CV" => "Cape Verde",
	"KY" => "Cayman Islands",
	"CF" => "Central African Republic",
	"TD" => "Chad",
	"CL" => "Chile",
	"CN" => "China",
	"CX" => "Christmas Island",
	"CC" => "Cocos [Keeling] Islands",
	"CO" => "Colombia",
	"KM" => "Comoros",
	"CG" => "Congo - Brazzaville",
	"CD" => "Congo - Kinshasa",
	"CK" => "Cook Islands",
	"CR" => "Costa Rica",
	"HR" => "Croatia",
	"CU" => "Cuba",
	"CY" => "Cyprus",
	"CZ" => "Czech Republic",
	"CI" => "Côte d’Ivoire",
	"DK" => "Denmark",
	"DJ" => "Djibouti",
	"DM" => "Dominica",
	"DO" => "Dominican Republic",
	"NQ" => "Dronning Maud Land",
	// "DD" => "East Germany",
	"EC" => "Ecuador",
	"EG" => "Egypt",
	"SV" => "El Salvador",
	"GQ" => "Equatorial Guinea",
	"ER" => "Eritrea",
	"EE" => "Estonia",
	"ET" => "Ethiopia",
	"FK" => "Falkland Islands",
	"FO" => "Faroe Islands",
	"FJ" => "Fiji",
	"FI" => "Finland",
	"FR" => "France",
	"GF" => "French Guiana",
	"PF" => "French Polynesia",
	"TF" => "French Southern Territories",
	"FQ" => "French Southern and Antarctic Territories",
	"GA" => "Gabon",
	"GM" => "Gambia",
	"GE" => "Georgia",
	"DE" => "Germany",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GR" => "Greece",
	"GL" => "Greenland",
	"GD" => "Grenada",
	"GP" => "Guadeloupe",
	"GU" => "Guam",
	"GT" => "Guatemala",
	"GG" => "Guernsey",
	"GN" => "Guinea",
	"GW" => "Guinea-Bissau",
	"GY" => "Guyana",
	"HT" => "Haiti",
	"HM" => "Heard Island and McDonald Islands",
	"HN" => "Honduras",
	"HK" => "Hong Kong SAR China",
	"HU" => "Hungary",
	"IS" => "Iceland",
	"IN" => "India",
	"ID" => "Indonesia",
	"IR" => "Iran",
	"IQ" => "Iraq",
	"IE" => "Ireland",
	"IM" => "Isle of Man",
	"IL" => "Israel",
	"IT" => "Italy",
	"JM" => "Jamaica",
	"JP" => "Japan",
	"JE" => "Jersey",
	"JT" => "Johnston Island",
	"JO" => "Jordan",
	"KZ" => "Kazakhstan",
	"KE" => "Kenya",
	"KI" => "Kiribati",
	"KW" => "Kuwait",
	"KG" => "Kyrgyzstan",
	"LA" => "Laos",
	"LV" => "Latvia",
	"LB" => "Lebanon",
	"LS" => "Lesotho",
	"LR" => "Liberia",
	"LY" => "Libya",
	"LI" => "Liechtenstein",
	"LT" => "Lithuania",
	"LU" => "Luxembourg",
	"MO" => "Macau SAR China",
	"MK" => "Macedonia",
	"MG" => "Madagascar",
	"MW" => "Malawi",
	"MY" => "Malaysia",
	"MV" => "Maldives",
	"ML" => "Mali",
	"MT" => "Malta",
	"MH" => "Marshall Islands",
	"MQ" => "Martinique",
	"MR" => "Mauritania",
	"MU" => "Mauritius",
	"YT" => "Mayotte",
	"FX" => "Metropolitan France",
	"MX" => "Mexico",
	"FM" => "Micronesia",
	"MI" => "Midway Islands",
	"MD" => "Moldova",
	"MC" => "Monaco",
	"MN" => "Mongolia",
	"ME" => "Montenegro",
	"MS" => "Montserrat",
	"MA" => "Morocco",
	"MZ" => "Mozambique",
	"MM" => "Myanmar [Burma]",
	"NA" => "Namibia",
	"NR" => "Nauru",
	"NP" => "Nepal",
	"NL" => "Netherlands",
	"AN" => "Netherlands Antilles",
	"NT" => "Neutral Zone",
	"NC" => "New Caledonia",
	"NZ" => "New Zealand",
	"NI" => "Nicaragua",
	"NE" => "Niger",
	"NG" => "Nigeria",
	"NU" => "Niue",
	"NF" => "Norfolk Island",
	"KP" => "North Korea",
	"VD" => "North Vietnam",
	"MP" => "Northern Mariana Islands",
	"NO" => "Norway",
	"OM" => "Oman",
	"PC" => "Pacific Islands Trust Territory",
	"PK" => "Pakistan",
	"PW" => "Palau",
	"PS" => "Palestinian Territories",
	"PA" => "Panama",
	"PZ" => "Panama Canal Zone",
	"PG" => "Papua New Guinea",
	"PY" => "Paraguay",
	"YD" => "People's Democratic Republic of Yemen",
	"PE" => "Peru",
	"PH" => "Philippines",
	"PN" => "Pitcairn Islands",
	"PL" => "Poland",
	"PT" => "Portugal",
	"PR" => "Puerto Rico",
	"QA" => "Qatar",
	"RO" => "Romania",
	"RU" => "Russia",
	"RW" => "Rwanda",
	"RE" => "Réunion",
	"BL" => "Saint Barthélemy",
	"SH" => "Saint Helena",
	"KN" => "Saint Kitts and Nevis",
	"LC" => "Saint Lucia",
	"MF" => "Saint Martin",
	"PM" => "Saint Pierre and Miquelon",
	"VC" => "Saint Vincent and the Grenadines",
	"WS" => "Samoa",
	"SM" => "San Marino",
	"SA" => "Saudi Arabia",
	"SN" => "Senegal",
	"RS" => "Serbia",
	"CS" => "Serbia and Montenegro",
	"SC" => "Seychelles",
	"SL" => "Sierra Leone",
	"SG" => "Singapore",
	"SK" => "Slovakia",
	"SI" => "Slovenia",
	"SB" => "Solomon Islands",
	"SO" => "Somalia",
	"ZA" => "South Africa",
	"GS" => "South Georgia and the South Sandwich Islands",
	"KR" => "South Korea",
	"ES" => "Spain",
	"LK" => "Sri Lanka",
	"SD" => "Sudan",
	"SR" => "Suriname",
	"SJ" => "Svalbard and Jan Mayen",
	"SZ" => "Swaziland",
	"SE" => "Sweden",
	"CH" => "Switzerland",
	"SY" => "Syria",
	"ST" => "São Tomé and Príncipe",
	"TW" => "Taiwan",
	"TJ" => "Tajikistan",
	"TZ" => "Tanzania",
	"TH" => "Thailand",
	"TL" => "Timor-Leste",
	"TG" => "Togo",
	"TK" => "Tokelau",
	"TO" => "Tonga",
	"TT" => "Trinidad and Tobago",
	"TN" => "Tunisia",
	"TR" => "Turkey",
	"TM" => "Turkmenistan",
	"TC" => "Turks and Caicos Islands",
	"TV" => "Tuvalu",
	"UM" => "U.S. Minor Outlying Islands",
	"PU" => "U.S. Miscellaneous Pacific Islands",
	"VI" => "U.S. Virgin Islands",
	"UG" => "Uganda",
	"UA" => "Ukraine",
	"SU" => "Union of Soviet Socialist Republics",
	"AE" => "United Arab Emirates",
	"GB" => "United Kingdom",
	"US" => "United States",
	"ZZ" => "Unknown or Invalid Region",
	"UY" => "Uruguay",
	"UZ" => "Uzbekistan",
	"VU" => "Vanuatu",
	"VA" => "Vatican City",
	"VE" => "Venezuela",
	"VN" => "Vietnam",
	"WK" => "Wake Island",
	"WF" => "Wallis and Futuna",
	"EH" => "Western Sahara",
	"YE" => "Yemen",
	"ZM" => "Zambia",
	"ZW" => "Zimbabwe",
	"AX" => "Åland Islands",
);
?>
<div class="registerform-section">
	<div class="logo-wrapper">
		<div class="page-logo">
			<a href="/">
			<img src="https://frieda.health/wp-content/uploads/2023/01/logo-new-1.svg"/>
			</a>
		</div>
	</div>
	<div class="container">
		<div class="form-wrap">
			<div class="leftform-block">
			<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/r-form.png"/>
				<h3>Registriere dich und entdecke deinen Kurs.</h3>
				<!-- <p>Empowerment through confidential support empowerment through confidential support </p> -->
			</div>
			<div class="form-block">
				<h3 class="inner-title">Willkommen zu Friedas<br>Online-Präventionskurs!</h3>
				<span class="form-detail">
					<span class="r-name">Registrierung</span>
					<span class="p-name">Bezahlung</span>
				</span>
				<h4>Registrierung</h4>
				<p>Gebe hier deine Daten ein, um ein Benutzerkonto zu erstellen.</p>
				<form class="registerform" action="" method="post" id="register-form">
					<div class="inputfield-wrap">
						<label>Vorname</label>
						<input type="text" name="first_name" id="first_name" required>
					</div>
					<div class="inputfield-wrap">
						<label>Nachname</label>
						<input type="text" name="surname" id="surname" required>
					</div>
					<div class="inputfield-wrap" id="email-section">
						<div class="email-content">
							<label>E-Mail Adresse</label>
							<label class="verify-email verify-email-btn" style="cursor: pointer;padding: 0px 10px;">Bestätigungscode senden</label>
						</div>
						<input type="email" name="email" id="email" onkeypress="return event.keyCode != 13;" value="" required>
						<p class="verify-email-desc">Bitte bestätigen Sie Ihre E-Mail-Adresse, um fortzufahren</p>
						<div id="email-success" style="display:none;color: green;"></div>
						<div id="email-error" style="display:none;color: red;">E Mail erforderlich</div>
					</div>
					<div class="inputfield-wrap verify-otp" style="display:none;">
						<label>Verifizierungscode</label>
						<div class="otpfield-wrap">
							<input type="number" id="digit-1" name="digit-1" data-next="digit-2" />
							<input type="number" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
							<input type="number" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
							<input type="number" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
							<input type="number" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
							<input type="number" id="digit-6" name="digit-6" data-previous="digit-5" />
						</div>
						<div class="resend-wrap">
							<span class="time">
								<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/time.png"/>
								<span class="time-count" id="time-count">00:00</span>
							</span>
							<span class="time resend-btn disable">
								<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/resend.png"/>
								<span class="resend">Verifizierungscode erneut senden</span>
							</span>
						</div>
						<div id="verify-error" style="display:none;color: red;">OTP nicht abgeglichen..</div>
					</div>
					<div class="innercontent">
					<span class="address-title">Adresse</span>
					<div class="inputfield-wrap">
						<label>Straße, Haus-Nr.</label>
						<input type="text" name="street" id="street" required>
					</div>
					<div class="inputfield-wrap">
						<label>Adresszusatz</label>
						<input type="text" name="address" id="address" required>
					</div>
					<div class="inputfield-wrap">
						<label>PLZ</label>
						<input type="text" name="plz" id="plz" required>
					</div>
					<div class="inputfield-wrap">
						<label>Stadt</label>
						<input type="text" name="city" id="city" required>
					</div>
					<div class="inputfield-wrap">
						<label>Region</label>
						<input type="text" name="region" id="region" required>
					</div> 
					<div class="inputfield-wrap">
						<label>Land</label>
						<select id="country" required>
							<option value="" hidden>Select Land</option>
							<?php foreach ($countryList as $key => $country) { ?>
								<option value="<?= $key; ?>"><?= $country; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="inputfield-wrap">
						<label>Passwort</label>
						<input type="password" name="password" id="password" placeholder="Passwort" required value="" autocomplete="on">
					</div>
					<div class="inputfield-wrap">
						<label>Passwort bestätigen</label>
						<input type="password" name="confirm_password" id="confirm_password" placeholder="Passwort bestätigen" required value="" autocomplete="on">
					</div>
					<div class="password-limit">Das Passwort muss mindestens 8 Zeichen lang sein.</div>
					<div id="password-error" style="display:none;color: red;">Passwörter stimmen nicht überein..</div>
					<div class="inputfield-wrap">
						<label>Bei welcher Krankenkasse bist Du?</label>
						<?php $insuranceCompanies = get_field('choose_insurance_company', 'options'); ?>
						<select name="insurance_company" id="insurance_company" required>
							<option value="" hidden>Bei welcher Krankenkasse bist Du?</option>
							<?php foreach ($insuranceCompanies as $key => $company) { ?>
								<option value="<?= $company['company_name']; ?>" data-description="<?= $company['company_description']; ?>"><?= $company['company_name']; ?></option>
							<?php } ?>
						</select>
					</div> 
					<div class="description" style="display:none;">
						<p>empowerment through confidential support services We inspire. Where are you on the menopause timeline</p>
					</div>
					<div id="form-error" style="display:none;color: red;">Alle Felder benötigt..</div>
					<div class="paybtn-wrap">
						<input class="dark-btn" type="submit" value="Jetzt bezahlen">
						<div id="insurance-company-section" style="display:none;">
							<a href="mailto:info@frieda.health">Schreiben Sie uns eine eMail</a>
						</div>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>

<?php get_footer('blank'); ?>