<?php
	$ReminderScheduled = get_field('email_template_scheduled', $optionSlug);
	$ReminderBetreff = get_field('email_template_betreff', $optionSlug);
	$ReminderBanner = get_field('email_template_banner', $optionSlug);
	$ReminderCTA = get_field('email_template_cta', $optionSlug);
	$ReminderButton = get_field('email_template_button', $optionSlug);
	$ReminderTextBlocks = get_field('email_template_text_blocks', $optionSlug);
?>
<div class="emailtemplate-section" style=" background: #f2f2f2; padding: 20px 0;">
	<div class="container" style="max-width: 1330px; padding: 0 15px;  margin: 0 auto;  width: 100%; box-sizing: border-box;">
		<div class="innercontent" style=" max-width: 700px; width: 100%; margin: 0 auto; pointer-events: auto !important;">
			<?php include('header.php'); ?>


			<div> Scheduled - <?= $ReminderScheduled; ?> </div>
			<div> Betreff - <?= $ReminderBetreff; ?> </div>
			<div> Banner - <?= $ReminderBanner; ?> </div>
			<div> CTA - <?= $ReminderCTA; ?> </div>
			<div> Button - 
				<?php if ($ReminderButton) { ?>
					<a href="<?= $ReminderButton['url']; ?>" class="dark-btn" style="background: #344A60; color: #fff; font-size: 18px; font-weight: 500; display: inline-block; padding: 10px 10px;border-radius: 8px;transition: 0.5s all ease-in-out; border: 2px solid #344A60; max-width: fit-content ;  text-align: center;max-width: 250px;  margin: 0 auto 0 auto; width: 100%; display: inline-block;" target="_blank"><?= $ReminderButton['title'];?></a>
				<?php } ?>
			</div>

			<?php
				if($ReminderTextBlocks) { 
					foreach ($ReminderTextBlocks as $key => $block) {
						?>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<div class="content-wrap">
								<img style="max-width: 700px; width: 100%; margin: 0 0 20px 0; height:400px;  object-fit: cover;" src="<?= $block['image_icon']; ?>">
								<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;"><?= $block['header'];?></p>
								<p style="font-size: 16px; color: #000; line-height: 26px; margin: 0 0 10px 0;"><?= $block['text']; ?></p>

								<?php
									$button = $block['button'];
									if ($button) { ?>
									<a href="<?= $button['url']; ?>" class="dark-btn" style="background: #344A60; color: #fff; font-size: 18px; font-weight: 500; display: inline-block; padding: 10px 10px;border-radius: 8px;transition: 0.5s all ease-in-out; border: 2px solid #344A60; max-width: fit-content ;  text-align: center;max-width: 250px;  margin: 0 auto 0 auto; width: 100%; display: inline-block;" target="_blank"><?= $button['title'];?></a>
								<?php } ?>
							</div>

						<?php
					} 
				}
			?>

			<?php include('footer.php'); ?>
		</div>	
	</div>
</div>