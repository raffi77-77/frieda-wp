<div class="content">
	<?= get_field('text_image_video_content_tools') ?>
</div>

<?php
	$video = get_field('text_image_video_video_file_link');
	if ($video) {
		echo "<div class='video'>".$video."</div>";
	}
	
	$creditText = get_field('text_image_video_credit_text');
	if ($creditText) {
		echo "<div class='video_credit_text'>".$creditText."</div>";
	}
?>
