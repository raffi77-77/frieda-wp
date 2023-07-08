
<div class="banner-section">
	<div class="container">
		<div class="banner-wrap">
			<div class="banner-content">
				<h4><?= get_field('hero_section_tagline');?></h4>
				<h1 class="title"><?= get_field('hero_section_title');?></h1>
				<p class="paragraph"><?= get_field('hero_section_content');?></p>

				<?php
					$button = get_field('hero_section_button_section');
					$button1 = $button['button_1'];
					$button2 = $button['button_2'];
					if ($button1 || $button2) { 
				?>
					<div class="btn-wrap">
						<?php if ($button1) { ?>
							<a href="<?= $button1['url']; ?>" class="dark-btn" target="<?= $button1['target']; ?>"><?= $button1['title']; ?></a>
						<?php } ?>
						<?php if ($button2) { ?>
							<a href="<?= $button2['url'];?>" class="normal-btn" target="<?= $button2['target'];?>"><?= $button2['title'];?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="banner-image">
				<img src="<?= get_field('hero_section_image');?>"/>
			</div>		
		</div>

		<!-- Info Section -->
		<!-- <div class="info-section">

			<?php
				$infoList = get_field('home_info_list');
				foreach ($infoList as $key => $info) {
			?>
				<div class="info-block">
					<div class="info-icon">
						<img src="<?= $info['image'];?>"/>
					</div>
					<div class="info-info">
						<h2><?= $info['title'];?></h2>
						<p class="paragraph"><?= $info['content'];?> </p>
					</div>
				</div>
			<?php } ?>
 
		</div> -->
	</div>
</div>
<div class="hows-it-works">
	<div class="container">
		<div class="heading">
			<h2 class="title"><?= get_field('hiw_section_title');?></h2>
		</div>
		<div class="zigzag-wrap">
			<?php
				$hiwList = get_field('hiw_list');
				foreach ($hiwList as $key => $info) {
			?> 
				<div class="zigzag-block">
					<div class="zigzag-content">
						<h3><?= $info['title']; ?></h3>
						<p class="paragraph"><?= $info['content']; ?></p>
						<a href="<?= $info['button']['url'];?>" class="dark-btn" target="<?= $info['button']['target'];?>"><?= $info['button']['title'];?></a>
					</div>
					<div class="zigzag-image">
						<img src="<?= $info['image']; ?>"/>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
<div class="calc-wrap">
	<div class="container">
		<h2><?= get_field('calculator_heading'); ?></h2>
		<div class="calc-content">
			<div class="clac-desc">
				<p><?= get_field('calculator_description'); ?></p>
			</div>
			<div class="clac-info"> 
				<?php $insuranceCompanies = get_field('choose_insurance_company', 'options'); ?>
				<select name="insuranceCompany" id="insuranceCompany" required>
					<option value="" hidden><?= get_field('calculator_select_text'); ?></option>
					<?php foreach ($insuranceCompanies as $key => $company) { ?>
						<option value="<?= $company['percentage']; ?>"><?= $company['company_name']; ?></option>
					<?php } ?>
				</select>
				<div class="innerinfo">
					<div class="price">
						<h3><?= get_field('course_fee'); ?></h3>
						<p>
							<span class="regularPrice"><?= get_post_meta(117, '_regular_price', true); ?>.00</span>€
						</p>
					</div>
					<div class="price discount">
						<h3><?= get_field('calculator_coverage_'); ?></h3>

						<!-- <h3>Durch deine Krankenkasse erstattet:</h3> -->
						<p>
							<span class="discountPercentage">0</span>€
						</p>
					</div>
					<div class="price total-price">
						<h3><?= get_field('calculator_contribution'); ?></h3>
						<p>
							<span class="pendingPrice"><?= get_post_meta(117, '_regular_price', true); ?>.00</span>€
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="banner-section infowrap-section">
	<div class="container">
		<!-- <div class="banner-wrap">
			<div class="banner-content">
				<h4><?= get_field('hero_section_tagline');?></h4>
				<h1 class="title"><?= get_field('hero_section_title');?></h1>
				<p class="paragraph"><?= get_field('hero_section_content');?></p>

				<?php
					$button = get_field('hero_section_button_section');
					$button1 = $button['button_1'];
					$button2 = $button['button_2'];
					if ($button1 || $button2) { 
				?>
					<div class="btn-wrap">
						<?php if ($button1) { ?>
							<a href="<?= $button1['url']; ?>" class="dark-btn" target="<?= $button1['target']; ?>"><?= $button1['title']; ?></a>
						<?php } ?>
						<?php if ($button2) { ?>
							<a href="<?= $button2['url'];?>" class="normal-btn" target="<?= $button2['target'];?>"><?= $button2['title'];?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
			<div class="banner-image">
				<img src="<?= get_field('hero_section_image');?>"/>
			</div>		
		</div> -->

		<!-- Info Section -->
		<div class="info-section">

			<?php
				$infoList = get_field('home_info_list');
				foreach ($infoList as $key => $info) {
			?>
				<div class="info-block">
					<div class="info-icon">
						<img src="<?= $info['image'];?>"/>
					</div>
					<div class="info-info">
						<h2><?= $info['title'];?></h2>
						<p class="paragraph"><?= $info['content'];?> </p>
					</div>
				</div>
			<?php } ?>
 
		</div>
	</div>
</div>
<div class="whatdoing-section">
	<div class="container">
		<div class="whatdoing-wrap">
			<div class="whatdoing-image">
				<img src="<?= get_field('wds_image');?>"/> 
				<!-- <iframe width="602" height="557" src="https://www.youtube.com/embed/uWQ_8CtvzoY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
			</div>
			<div class="whatdoing-content">
				<h3 class="sub-heading"><?= get_field('wds_title');?></h3>
				<p class="paragraph"><?= get_field('wds_content');?></p>
				<?php $button = get_field('wds_button'); ?>
				<a href="<?= $button['url'];?>" class="white-btn" target="<?= $button['target'];?>"><?= $button['title'];?></a>
			</div>
		</div>
	</div>
</div>
<div class="learnmore-wrap">
	<div class="container" style="background-image: url('<?= get_field('lms_image');?>');">
			<div class="learnmore-content">
				<h3 class="sub-heading"><?= get_field('lms_title');?></h3>
				<p><?= get_field('lms_title_content');?></p>
				<?php $button = get_field('lms_button'); ?>
				<a href="<?= $button['url'];?>" class="white-btn" target="<?= $button['target'];?>"><?= $button['title'];?></a>
			</div>	
		</div>
	</div>
</div>
<div class="support-wrap">
	<div class="container">
		<div class="heading">
			<!-- <h2 class="title"><//?= get_field('h_ss_section_title');?></h2> -->
		</div>
		<div class="support-blocks">

			<?php
				$hSsList = get_field('h_ss_list');
				foreach ($hSsList as $key => $list) {
			?> 
				<div class="support-content">
					<div class="icon">
						<img src="<?= $list['image']; ?>"/>
					</div>
					<h4><?= $list['title']; ?></h4>
					<p class="paragraph"><?= $list['content']; ?></p>
				</div>
			<?php } ?>
			 
		</div>
	</div>
</div>
<!-- 
<div class="video-section">
   <div class="container">
		<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
			<source src="https://flixels.s3.amazonaws.com/flixel/ct08dlpwq6eqp8yp1r6v.hd.mp4" type="video/mp4">
		</video>
   </div>
</div> -->
