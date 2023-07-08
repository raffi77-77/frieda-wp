<?php $current_user = wp_get_current_user();?>
<div class="tip-section">
	<div class="container">
		<div class="tip-blocks">
			<div class="time-wrap">
				<div class="personname-innercontent">
					<h4>Hallo,</h4>
					<div class="person-wrap">
						<?php if(get_field('welcome_section_title')){ ?>
							<h5><?= get_field('welcome_section_title');?></h5>
						<?php }?>
						<span class="person-name"><?= $current_user->first_name; ?></span>
					</div>
				</div>
				<p class="paragraph"><?= get_field('welcome_section_content');?></p>
				<?php
					$button = get_field('welcome_section_button');
					if ($button) {
					?>
					<a href="<?= $button['url']; ?>" class="dark-btn" target="<?= $button['target']; ?>"><?= $button['title']; ?></a>
				<?php } ?>
			</div>
			<div class="tipday-wrap">
				<?php
					$tipSection = get_field('welcome_section_tips_section');
					$maxTip = rand(0,(count($tipSection)-1));
				?>
				<span class="sub-title"><?= $tipSection[$maxTip]['title'];?></span>
				<span class="description"><?= $tipSection[$maxTip]['content'];?></span>
			</div>
		</div>
	</div>
</div>

<div class="journey-section">
	<div class="container">
		<div class="journey-wrap">
			<?php
				$journeyData = get_field('journey_data_rep');
				foreach ($journeyData as $key => $data) {
				?> 
				<div class="journey-block">
					<h4><?= $data['title']; ?></h4>
					<p class="paragraph"><?= $data['content']; ?></p>
					<a href="<?= $data['button']['url'];?>" class="white-btn" target="<?= $data['button']['target'];?>"><?= $data['button']['title'];?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php
	$moreDetails = get_field('moredetail_section');
	$key = 0;
	foreach ($moreDetails as $key => $moreDetail) {
		$key++;
	?>
	<div class="moredetail-section <?= $key == 2 ? 'moredetailwrap' : ''; ?>">
		<div class="container">
			<div class="moredetail-wrap">
				<h4><?= $moreDetail['title']; ?></h4>
				<p class="paragraph"><?= $moreDetail['content']; ?></p>

				<?php
					$button = $moreDetail['button'];
					if ($button) {
					?>
					<a href="<?= $button['url'];?>" class="more-btn" target="<?= $button['target'];?>">
						<span class="content"><?= $button['title'];?></span>
						<span class="icon"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-icon.svg"/> </span>
					</a>
				<?php } ?>
				
				<?php if($moreDetail['pdf_link']) { ?>
					<a href="<?= $moreDetail['pdf_link'];?>" class="more-btn pdf-btn" target="_blank">
						<span class="content">View Pdf</span>
						<span class="icon"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-icon.svg"/> </span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>