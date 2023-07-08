<?php
	global $post;
	$parentPostId = $post->post_parent;
	if ($parentPostId) {
		$parentPosts = new WP_Query([
			'post_parent' => $parentPostId,
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_type' => 'frieda_course'
		]);
		if ($parentPosts->have_posts()) {
			foreach ($parentPosts->posts as $key => $parentPost) {
				$class = '';

				$metaId = get_user_meta(get_current_user_id(),'userCourseMetaIds'.$parentPost->ID,true);
				if (updateGroupUserMeta($metaId,'completedDate')) {
					$class = 'active completed';
				}
				?>
					<a href="<?= get_permalink($parentPost->ID);?>" class="link sidebar-number <?= $class;?> sidebar-<?= $parentPost->ID;?>">
						<strong>
							<span><?= $key+1;?>.</span>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/complete.svg"/>
						</strong>
						<span><?= $parentPost->post_title;?></span>
					</a>
			<?php }
		} else { ?>
			<h3>No Course.</h3>
		<?php }
	}
?>