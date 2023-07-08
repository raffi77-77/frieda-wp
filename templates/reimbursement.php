<?php
/*
Template Name: Reimbursement Page
*/

get_header();
?>

<div class="subbanner-section">
	<div class="container">
		<h4><?= get_the_title(); ?></h4>
		<div><?= get_the_content(); ?></div>
	</div>
</div>

<div class="registerblock-section">
	<div class="container">
		<div class="registerblock-wrap">
			<?php
				$registerList = get_field('register_repeater_list');
				foreach ($registerList as $key => $list) {
				?>
				<div class="registerblocks">
					<span class="imageblock">
						<img src="<?= $list['icon']; ?>"/>
					</span>
					<h4><?= $list['title']; ?></h4>
					<p><?= $list['text']; ?></p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="journey-section">
	<div class="container">
		<div class="journey-wrap">
			<?php
				$journeyList = get_field('journey_list');
				foreach ($journeyList as $key => $journey) {
				?>
				<div class="journey-block">
					<h4><?= $journey['title']; ?></h4>
					<p class="paragraph"><?= $journey['text']; ?></p>

					<?php
						$journeyBtn = $journey['button'];
						if ($journeyBtn) {
						?>
						<a href="<?= $journeyBtn['url'];?>" class="white-btn" target="<?= $journeyBtn['target'];?>"><?= $journeyBtn['title'];?></a>
					<?php } ?>
					
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="moredetail-section register-questions-wrap">
	<div class="container">
		<div class="moredetail-wrap">
			<h4><?= get_field('rmd_title'); ?></h4>
			<p class="paragraph"><?= get_field('rmd_text'); ?></p>

			<?php
				$rmdButton = get_field('rmd_button');
				if ($rmdButton) { ?>
				<a href="<?= $rmdButton['url']; ?>" class="more-btn" target="<?= $rmdButton['target']; ?>">
					<span class="content"><?= $rmdButton['title']; ?></span>
				</a>
			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>