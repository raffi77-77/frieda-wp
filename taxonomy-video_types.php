<?php
/**
 * Locations taxonomy archive
 */
get_header();
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
?>
<div class="video-section-wrap">
	<div class="container">
		<div class="discovery-title">
			<a class="backbtn" href="<?= THOUGHT_LANDING_TRACKER_PAGE_LINK; ?>">
				<span class="arrow-icon">
					<img src="/wp-content/themes/frieda-wp/assets/images/back-arrow.png">
				</span>
				<span class="arrow-content">Zurück</span>
			</a>
			<div class="content">
				<h3><?php echo apply_filters('the_title', $term->name); ?></h3>
				<?php if (!empty($term->description)): ?>
					<p><?php echo esc_html($term->description); ?></p>
				<?php endif; ?>
			</div>
			<div></div>
		</div>
		<?php if (have_posts()): ?>
			<div class="video-wrap">
				<?php while (have_posts()): the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('video-block'); ?>>
						<?= get_field('videos_posttype_video'); ?>
						<h4><?php the_title(); ?></h4>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else: ?> 
			<h1 style="text-align: center; margin-top: 100px;">No Videos In <?php echo apply_filters('the_title', $term->name); ?></h1> 
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>