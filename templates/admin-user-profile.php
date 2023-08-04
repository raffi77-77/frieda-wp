<?php
	$userPaymentComplete = get_user_meta($user->ID,'user_payment_complete',true);
?>
<h3><?php _e("User Course Payment Details", "blank"); ?></h3>
<table class="form-table">
	<tr>
		<th><label for="address"><?php _e("Course Payment"); ?></label></th>
		<td>
			<?php if ( $userPaymentComplete ) { ?>
                <div>
                    <strong>Completed</strong>
                    <a href="<?= site_url( 'wp-admin/post.php?post=' . $userPaymentComplete . '&action=edit' ); ?>">
                        Payment Details </a>
                </div>
			<?php } else if ( is_test_user( $user->ID ) ) { ?>
                <div>Test user</div>
			<?php } else { ?>
                <div>Pending</div>
			<?php } ?>
		</td>
	</tr>
</table>


<style>
	/** Comman Style */
	tr.user-user-login-wrap {
    display: none !important;
	}
</style>

<?php
	$groupId = 44;
	$mainCoursePosts = getChildPostsId($groupId);
	if ($mainCoursePosts) {

	function viewGroupUserMeta($id, $type, $user) {
		$meta = 'userGroup' . $id . $type;
		return get_user_meta($user->ID, $meta, true);
	}
	?>
	<h3><?php _e("User Course Details", "blank"); ?></h3>
	<div class="form-table user-course-table">
		<ul class="user-course-tree">
			<?php foreach ($mainCoursePosts as $key => $post) { 
				$meta = $groupId.'_'.$post;
				$startDate = viewGroupUserMeta($meta,'startDate', $user);
				$completedDate = viewGroupUserMeta($meta,'completedDate', $user);
				$postsCount = viewGroupUserMeta($meta,'postsCount', $user);

				$class = 'Locked';
				if ($startDate) {
					$class = 'In-Progress';
				} elseif ($startDate && $completedDate) {
					$class = 'Completed';
				}
				?>
				<li class="<?= strtolower($class);?>">
					<input type="checkbox" checked="checked" id="<?= $meta; ?>" />
					<label class="tree_label" for="<?= $meta; ?>"><?= get_the_title($post);?> - <strong>(<?= $class;?>)</strong></label>
					<?php if ($postsCount && strtolower($class) != 'locked') {
						$mainCoursePosts = getChildPostsId($post);?>
						<ul>
							<?php foreach ($mainCoursePosts as $key => $post1){
								$meta = $groupId.'_'.$post.'_'.$post1;
								$startDate = viewGroupUserMeta($meta,'startDate', $user);
								$completedDate = viewGroupUserMeta($meta,'completedDate', $user);
								$postsCount = viewGroupUserMeta($meta,'postsCount', $user);

								$class = 'Locked';
								if ($startDate) {
									$class = 'In-Progress';
								} elseif ($startDate && $completedDate) {
									$class = 'Completed';
								}?>
							<li class="<?= strtolower($class);?>">
								<input type="checkbox" checked="checked" id="<?= $meta; ?>" />
								<label class="tree_label" for="<?= $meta; ?>"><?= get_the_title($post1);?> - <strong>(<?= $class;?>)</strong></label>
								<?php
									if ($postsCount && strtolower($class) != 'locked') {
									$mainCoursePosts = getChildPostsId($post1);?>
									<ul>
										<?php foreach ($mainCoursePosts as $key => $post2){
											$meta = $groupId.'_'.$post.'_'.$post1.'_'.$post2;
											$startDate = viewGroupUserMeta($meta,'startDate', $user);
											$completedDate = viewGroupUserMeta($meta,'completedDate', $user);
											$postsCount = viewGroupUserMeta($meta,'postsCount', $user);

											$class = 'Pending';
											if ($completedDate) {
												$class = 'Completed';
											}
											
										?>
										<li>
											<input type="checkbox" checked="checked" id="<?= $meta; ?>" />
											<label class="tree_label" for="<?= $meta; ?>"><?= get_the_title($post2);?> - <strong>(<?= $class;?>)</strong></label>
											<?php
												$mainCoursePosts = getChildPostsId($post2);
												if($mainCoursePosts && count($mainCoursePosts)){
												?>
												<ul>
													<?php
														foreach ($mainCoursePosts as $key => $post3){
														$meta = $groupId.'_'.$post.'_'.$post1.'_'.$post2.'_'.$post3;
														$startDate = viewGroupUserMeta($meta,'startDate', $user);
														$completedDate = viewGroupUserMeta($meta,'completedDate', $user);
														$postsCount = viewGroupUserMeta($meta,'postsCount', $user);

														$class = 'Pending';
														if ($completedDate) {
															$class = 'Completed';
														}
														?>
															<li>
																<input type="checkbox" checked="checked" id="<?= $meta; ?>" />
																<label class="tree_label tree-label-last" for="<?= $meta; ?>"><?= get_the_title($post3);?> - <strong>(<?= $class;?>)</strong></label>
															</li>
													<?php } ?>
												</ul>
											<?php } ?>
										</li>
										<?php } ?>
									</ul>
								<?php } ?>
							</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
	</div>

	<style>
		/* Tree core styles */
		.user-course-tree {
			padding: 30px;
			font-family: sans-serif;
			margin: 1em;
			margin-top: 0px;
		}

		.user-course-tree input {
			position: absolute;
			clip: rect(0, 0, 0, 0);
		}

		.user-course-tree input ~ ul {
			display: none;
		}

		.user-course-tree input:checked ~ ul {
			display: block;
		}

		/* Tree rows */
		.user-course-tree li {
			line-height: 1.2;
			position: relative;
			padding: 0 0 1em 1em;
		}

		.user-course-tree ul li {
			padding: 1em 0 0 1em;
		}

		.user-course-tree > li:last-child {
			padding-bottom: 0;
		}

		/* Tree labels */
		.user-course-tree .tree_label {
			position: relative;
			display: inline-block;
			background: #fff;
		}

		.user-course-tree label.tree_label {
			cursor: pointer;
		}

		.user-course-tree label.tree_label:hover {
			color: #666;
		}

		/* Tree expanded icon */
		.user-course-tree label.tree_label:before {
			background: #000;
			color: #fff;
			position: relative;
			z-index: 1;
			float: left;
			margin: 0 1em 0 -2em;
			width: 1em;
			height: 1em;
			border-radius: 1em;
			content: "+";
			text-align: center;
			line-height: 0.9em;
		}

		:checked ~ label.tree_label:before {
			content: "–";
		}

		/* Tree branches */
		.user-course-tree li:before {
			position: absolute;
			top: 0;
			bottom: 0;
			left: -0.5em;
			display: block;
			width: 0;
			border-left: 1px solid #777;
			content: "";
		}

		.user-course-tree .tree_label:after {
			position: absolute;
			top: 0;
			left: -1.5em;
			display: block;
			height: 0.5em;
			width: 1em;
			border-bottom: 1px solid #777;
			border-left: 1px solid #777;
			border-radius: 0 0 0 0.3em;
			content: "";
		}

		label.tree_label:after {
			border-bottom: 0;
		}

		:checked ~ label.tree_label:after {
			border-radius: 0 0.3em 0 0;
			border-top: 1px solid #777;
			border-right: 1px solid #777;
			border-bottom: 0;
			border-left: 0;
			bottom: 0;
			top: 0.5em;
			height: auto;
		}

		.user-course-tree li:last-child:before {
			height: 2em;
			bottom: auto;
			top: -10;
		}

		.user-course-tree > li:last-child:before {
			display: none;
		}

		.user-course-tree .tree_custom {
			display: block;
			background: #eee;
			padding: 1em;
			border-radius: 0.3em;
		}

		.tree-label-last:after {
			display: none !important;
		}

		.tree-label-last:before {
			content: "" !important;
		}
	</style>
<?php } ?>