<?php
/*
Template Name: Emailtemplate
*/

get_header();

?>

<div class="emailtemplate-section" style=" background: #f2f2f2; padding: 20px 0;">
	<div class="container" style="max-width: 1330px; padding: 0 15px;  margin: 0 auto;  width: 100%; box-sizing: border-box;">
		<div class="innercontent" style=" max-width: 700px; width: 100%; margin: 0 auto; pointer-events: auto !important;">
			<div class="logo-wrap" style="padding: 0 0 30px 0;">
				<img  style="margin: 0 auto; display: block;"src="<?= get_stylesheet_directory_uri(); ?>/assets/images/logo-new-2.svg">
			</div> 
			<div class="content-wrap">
				<img   style="max-width: 700px; width: 100%; margin: 0 0 20px 0; " src="<?= get_stylesheet_directory_uri(); ?>/assets/images/sunset.jpg">
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Lorem Ipsum</p>
				<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<a href="/" class="dark-btn" style="background: #344A60; color: #fff; font-size: 18px; font-weight: 500; display: inline-block; padding: 10px 0;border-radius: 8px;transition: 0.5s all ease-in-out; border: 2px solid #344A60;max-width: 150px; width: 160px; text-align: center;max-width: 250px; margin: 0 auto; display: block;width: 100%;" target="_blank">Lorem Ipsume</a>
			</div>

			<div class="footerinner-wrap" style="padding: 50px 0 0 0; border-top: 2px solid #000; margin: 30px 0 0 0;">
				<div class="social-links" style=" display: flex;justify-content: center;align-items: center; padding: 0 0 35px 0;">
					<a target="_blank" href="/" style="margin:0 20px 0 0">
						<img style="width: 30px;margin: 0 auto;display: block;" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/globe.png">
					</a>
					<a target="_blank" href="/" style="margin:0 20px 0 0">
						<img style="width: 30px;margin: 0 auto;display: block;" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/fb.png">
					</a>
					<a target="_blank" href="/" style="margin:0 20px 0 0">
						<img style="width: 30px;margin: 0 auto;display: block;" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/insta.png">
					</a>
				</div>
				<img style="margin: 0 auto; display: block;" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/logo-new-2.svg">
				<p style=" text-align:center;font-size: 16px; color: #000; line-height: 26px; margin: 20px 0 10px 0; max-width:400px; margin: 20px auto 10px auto;">Copyright (C) 2023 Loba Health GmbH. All rights reserved.You are receiving this email because you opted in via our website.</p>
			</div>
		</div>	

	</div>
</div>



<?php get_footer(); ?>