<?php
/*
Template Name: About Us
*/

get_header();
?>

<div class="subbanner-section">
	<div class="container">
		<h4><?= get_field('aboutus_banner_title'); ?></h4>
		<p><?= get_field('aboutus_banner_description'); ?></p>
	</div>
</div>
<div class="doctorprofession-section">
	<div class="container">
		<div class="doctorprofession-wrap owl-carousel owl-theme" id="about-page-sildes">

			<?php
			$doctors = get_field('aboutus_doctors');
			foreach ($doctors as $key => $doctor) { ?>
				<div class="doctorprofession-block">
					<span class="image-content">
						<img src="<?= $doctor['image']; ?>" />
					</span>
					<h4><?= $doctor['name']; ?></h4>
					<h5><?= $doctor['profession']; ?></h5>
					<p><?= $doctor['about']; ?></p>
				</div>
			<?php } ?>
 
		</div>
	</div>
</div>
<div class="aboutus-wrapper-section">
	<div class="container">
		<div class="innercontent">
			<h4><?= get_field('about_us_wrapper_section_tag_line'); ?></h4>
			<h5><?= get_field('about_us_wrapper_section_title'); ?></h5>
			<p><?= get_field('about_us_wrapper_section_text'); ?></p>
		</div>
		<div class="zigzag-wrap">

			<?php
			$sections = get_field('about_us_wrapper_section');
			foreach ($sections as $key => $section) { ?>
				<div class="zigzag-block">
					<div class="image-content">
						<img src="<?= $section['image']; ?>" />
					</div>
					<div class="contentwrap">
						<h4><?= $section['title']; ?></h4>
						<p><?= $section['content']; ?></p>
					</div>
				</div>
			<?php } ?>
 
		</div>
	</div>
</div>
<div class="aboutus-section">
	<div class="container">
		<div class="about-wrap">
			<div class="about-image">
				<img src="<?= get_field('aboutus_section_image'); ?>" />
			</div>
			<div class="about-content">
				<span class="icon">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-icon.svg" />
				</span>
				<h5><?= get_field('aboutus_section_title'); ?></h5>
				<p><?= get_field('aboutus_section_description'); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="moredetail-section havequestion-wrap">
	<div class="container">
		<div class="moredetail-wrap">
			<h4><?= get_field('about_us_have_ques_title'); ?></h4>
			<p class="paragraph"><?= get_field('about_us_have_ques_content'); ?></p>

			<?php $button = get_field('about_us_have_ques_button'); ?>
			<a href="<?= $button['url']; ?>" class="more-btn" target="<?= $button['target']; ?>">
				<span class="content"><?= $button['title']; ?></span>
				<span class="icon"> <img src="/wp-content/themes/frieda-wp/assets/images/arrow-icon.svg"> </span>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>