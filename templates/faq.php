<?php get_header(); ?>
<div class="subbanner-section">
	<div class="container">
		<h4><?= get_the_title(); ?></h4>
		<?= get_the_content(); ?>
	</div>
</div>

<div class="repter-faq">
<?php
	$faq_list = get_field('faq_section_list');
	foreach($faq_list as $key => $faq) { ?>
		<div class="faq-wrapper-section">
			<div class="container">
				<div class="faq-content">
					<h4><?= $faq['faq_section_title']; ?></h4>
					<p><?= $faq['faq_section_text']; ?></p>
				</div>
				<?php
					$faqs = $faq['faq_repeater_list'];
					foreach($faqs as $key => $faqs) { ?>
					<div class="faq-wrap">
						<div class="faq-block">
							<div class="innertitle acc-head">
								<span class="icon-inner"><img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/questions.png"/></span>
								<div class="course-content"><h3><?= $faqs['title']; ?></h3></div>    
							</div>
							<div class="innerdescription acc-content" style="display: none;"><p><?= $faqs['content']; ?></p></div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>

<?php get_footer(); ?>