<?php
/*
	Template Name: Congratsulation
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
		</div>
	</div>    
</div>


<?php get_footer(); ?>