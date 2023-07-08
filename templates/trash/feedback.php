<?php
/*
	Template Name: Feedback Popup
*/
get_header();
?>
<div class="registerform-section toolscontent-wrap" id="<?= $post->ID; ?>">
	<div class="container">
		<div class="rangeslider-wrap">
			<input type="range" min="150" max="210" step="0.1" labels="150, 160, 170, 180, 190, 200, 210">
		</div>
	</div>
</div>

<?php get_footer(); ?>