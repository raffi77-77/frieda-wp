<?php
/*
	Template Name: Download Certifcate
*/

get_header();
?>
<div id="download-certificate" class="dcertificate-section">
	<div class="container">
		<div class="dcertificate-wrap">
			<a href="javascript:void(0)" onclick="closeNav()" class="closebutton">&times;</a>
			<div class="dcertificate-content">
				<h3>Congratulations!!!</h3>
				<span>You made it!!!</span>
			</div>
			<div class="image-block">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/congrats-popup.png"/>
			</div>
			<div class="button-wrapper">
				<p>You have completed all the units. Click on Button to Download the Ceriticate</p>
				<button class="download-btn"  type="submit" id="" style="cursor: pointer;">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/d-icon.svg"/> Download Certificate
				</button>
			</div>
		</div>
	</div>    
</div>

<?php get_footer(); ?>