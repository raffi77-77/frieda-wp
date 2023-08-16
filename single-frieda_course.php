<?php
	redirectUnLoggedUser();

	$pageUrl = explode('?',rtrim($_SERVER['REQUEST_URI']));
	$pageUrl = explode('/',rtrim($pageUrl[0]));
	$pageUrl = array_filter($pageUrl);
	$urlLevel = count($pageUrl);
	if ($urlLevel == 5) {
		array_pop($pageUrl);
	}
	array_pop($pageUrl);

	$goBackUrl = site_url(implode('/',$pageUrl).'?parent='.$post->post_parent);
	$post = $wp_query->get_queried_object();


function getCourseStatusClass( $user_id, $postID, $onlyCompletedDate = false ) {
	$metaId        = get_user_meta( $user_id, 'userCourseMetaIds' . $postID, true );
	$completedDate = updateGroupUserMeta( $metaId, 'completedDate' );
	$startDate     = updateGroupUserMeta( $metaId, 'startDate' );
	if ( $onlyCompletedDate ) {
		if ( $completedDate ) {
			return 'active completed';
		} else {
			return '';
		}
	}
	if ( $startDate && $completedDate ) {
		return 'active completed';
	} elseif ( $startDate ) {
		return 'active in-progress';
	}

	return 'locked';
}

	$allDone = false;
	get_header();
?>

	<div class="banner-section discovery-section">
		<div class="container"> 
			<div  class="discovery-title">
				<a class="backbtn" href="<?= $goBackUrl; ?>">
					<span class="arrow-icon">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/back-arrow.png"/>
					</span>
					<span class="arrow-content">
						Zurück
					</span>
				</a>
				<h3><?= $post->post_title; ?></h3> 
				<div></div>
			</div>
			<?php
				// Case https://frieda.startbyweb.com/g/discover-your-journey/
				$done = 0;
				if ($post->post_parent === 0) {
					$query = getChildPostsById($post->ID); 
					while($query->have_posts()): $query->the_post();
						$postID = get_the_ID();
						$image = get_the_post_thumbnail_url($postID,'full');
						if (!$image) {
							$image = 'https://picsum.photos/200/300?grayscale&random='.$postID;
						}

						$status = getCourseStatusClass( get_current_user_id(), $postID );

						$link = '#';
						if ($status != 'locked') {
							$link = get_the_permalink();
						}

						if (str_contains($status, 'completed')) {
							$done++;
						}



						$metaId = get_user_meta(get_current_user_id(), 'userCourseMetaIds' . $postID, true);
						$parentPosts = updateGroupUserMeta($metaId, 'posts');
						if ($parentPosts) {
							$mainPostDone = 0;
							$parentPosts = json_decode($parentPosts);
							foreach ($parentPosts as $key => $parentPost) {
								$newMeta = $metaId . '_' . $parentPost;
								$completedDate = updateGroupUserMeta($newMeta, 'completedDate');
								if ($completedDate) {
									$mainPostDone++;
								}
							}

							if (count($parentPosts) == $mainPostDone) {
								$mainPosts = updateGroupUserMeta(44, 'posts');
								if ($mainPosts) {
									$mainPosts = json_decode($mainPosts);
									$courseId = explode('_',$metaId);
									$getCourseIndex = array_search($courseId, $mainPosts) + 1;
									if (isset($mainPosts[$getCourseIndex])) {
										$nextCourseKay = "44_".$mainPosts[$getCourseIndex];
										$nxtcompletedDate = updateGroupUserMeta($nextCourseKay, 'startDate');
										if (!$nxtcompletedDate) {
											updateGroupUserMeta($nextCourseKay, 'startDate', strtotime("now"));
											header("Refresh:0");
										}
									}
								}
							}
						} ?>
							<a class="course-name <?= $status; ?>" href="<?= $link; ?>">
								<span class="icon-inner">
									<img src="<?= $image; ?>">
								</span>
								<div>
									<div class="course-content">
										<h3><?= get_the_title(); ?></h3>
										<span class="coursetime-innercontent">
											<!-- <span class="course-time">
												<span class="time-icon">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time-icon.png"/>
												</span>
												<span class="time-content"><?= getHoursByMint(get_post_meta(get_the_id(), 'course_time', true)); ?> min</span>
											</span> -->
											<span class="course-unit">
												<?= getChildPostsById($postID,true); ?> Einheit
											</span>
										</span>	
									</div>
									<div><p class="short-description"><?= get_field('course_cpt_short_description') ?></p></div>
								</div>
							</a>
						<?php
					endwhile;
					if ($query->post_count == $done) {
						$allDone = true;
					}
				} else {
					// https://frieda.startbyweb.com/g/discover-your-journey/intro/
					if ($urlLevel == 3) {
						$isCompleted = 0;
						$query = getChildPostsById($post->ID);
						$n = 0;
						while($query->have_posts()): $query->the_post();
							$n++;
							$postID = get_the_ID();
							$mainPostID = get_the_ID();
							$innerQuery = getChildPostsById($postID);
							$image = get_the_post_thumbnail_url($postID,'full');
							if (!$image) {
								$image = 'https://picsum.photos/200/300?grayscale&random='.$postID;
							}

							$activeTab = "";
							if (isset($_GET) && $_GET['parent'] && $_GET['parent'] == $postID) {
								$activeTab = "active";
							}
							$status = getCourseStatusClass( get_current_user_id(), $postID );
							?>
								<div class="innercourse <?= $status; ?> post-<?= $postID; ?>">
									<div class="course-name acc-head <?= $activeTab; ?>">
										<span class="icon-inner">
										<img src="<?= $image; ?>">
										</span>
										<div>
											<div class="course-content">
											<h3><?= get_the_title(); ?></h3>
											<span class="coursetime-innercontent">
												<!-- <span class="course-time">
													<span class="time-icon">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time-icon.png"/>
													</span>	
													<span class="time-content"><?= getHoursByMint(get_post_meta(get_the_id(), 'course_time', true)); ?> min</span>
												</span>	 -->
												<span class="course-unit"><?= $innerQuery->post_count; ?> Abschnitte</span>
											</span>
											</div>
											<div><h4 class="short-tagline"><?= get_field('course_cpt_fields_tagline'); ?></h4></div>
											<div><p class="short-description"><?= get_field('course_cpt_short_description'); ?></p></div>
										</div>
									</div>
									
									<?php if($status != 'locked') { ?>
										<div class="course-innerfields acc-content" style="display: <?= $activeTab ? 'block' : 'none'; ?>;">
											<?php 
												if ($innerQuery->post_count) {
													$count = 0;
													$isDone = 0;
													while($innerQuery->have_posts()): $innerQuery->the_post();
														$count++;
														$postID = get_the_ID();
														$courseClass = getCourseStatusClass( get_current_user_id(), $postID, true );
														if ($courseClass == 'active completed') {
															$isDone++;
														}

														// active completed
														if (!get_field('course_cpt_fields_is_evaluation')) {
															?>
																<a href="<?= get_the_permalink(); ?>" class="course-content <?= $courseClass; ?>">
																	<span class="courser-numb"><?= $count; ?></span>
																	<div>
																		<div class="course-mainhead">
																			<h3><?= get_the_title(); ?></h3>
																			<!-- <span class="course-time">
																				<span class="time-icon">
																					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time-icon.png"/>
																				</span>
																				<span class="time-content"><?= getHoursByMint(get_post_meta(get_the_id(), 'course_time', true)); ?> min</span>
																			</span> -->
																		</div>
																		<div><p class="short-description"><?= get_field('course_cpt_short_description'); ?></p></div>
																	</div>
																</a>
															<?php
														} else {
															?>
																<a class="more-course <?= $courseClass; ?> post-<?= $postID; ?>" href="<?= get_the_permalink(); ?>">
																	<div style="display: flex;align-items: center; justify-content: space-between;">
																		<h3><?= get_the_title(); ?></h3>
																		<!-- <span class="course-time">
																				<span class="time-icon">
																					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time-icon.png"/>
																				</span>
																				<span class="time-content"><?= getHoursByMint(get_post_meta(get_the_id(), 'course_time', true)); ?> min</span>
																		</span> -->
																	</div>
																	<div><p class="short-description"><?= get_field('course_cpt_short_description'); ?></p></div>
																</a>
															<?php
														}
													endwhile;
												}
												if ($isDone == $innerQuery->post_count) {
													$metaId = get_user_meta(get_current_user_id(), 'userCourseMetaIds' . $mainPostID, true);
													$metaId = explode('_',$metaId);
													$metaIdNew = $metaId;
													array_pop($metaIdNew);
													$parentPosts = updateGroupUserMeta(implode('_', $metaIdNew), 'posts');
													if ($parentPosts) {
														$parentPosts = json_decode($parentPosts);
														$currentIndex = array_search($metaId[2], $parentPosts);
														
														$metaIdNew[1] = $parentPosts[$currentIndex+1];
														$newMeta = implode('_', $metaIdNew);
														$metaId = get_user_meta(get_current_user_id(), 'userCourseMetaIds' . $metaIdNew[1], true);

														$parentPost = updateGroupUserMeta($metaId, 'posts');
														if ($parentPost) {
															$parentPost = json_decode($parentPost);
															updateGroupUserMeta($metaId, 'startDate', strtotime("now"));
														}
													}
												}
											?>
										</div>
									<?php } ?>
								</div>
							<?php
						endwhile;
					} elseif ($urlLevel == 5) {
						// https://frieda.startbyweb.com/g/discover-your-journey/intro/introduction/introduction-the-program/
						$postCount = 0;
						$query = getChildPostsById($post->ID);
						while($query->have_posts()): $query->the_post();
							updateCoruseCompletedDate($post->ID);
							$postCount++; 
							$postID = get_the_ID();
							?>
								<a class="course-inner-wrap <?= getCourseStatusClass( get_current_user_id(), $post->ID, true ); ?>" href="<?= get_the_permalink(); ?>">
									<span class="course-number"><?= $postCount; ?></span>
									<div>
										<div class="course-detail">
											<h3><?= get_the_title(); ?></h3>
											<!-- <span class="course-time">
												<span class="time-icon">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/time-icon.png"/>
												</span>
												<span class="time-content"><?= getHoursByMint(get_field('course_time',get_the_id())); ?> min</span>
											</span> -->
										</div>
										<div><p class="short-description"><?= get_field('course_cpt_short_description'); ?></p></div>
									</div>
								</a>
								<?= $query->post_count != $postCount ? "" : '' ?>
							<?php
						endwhile;
					}
				}

				if ($allDone) {
					?>
						<div class="button-content-wrap">
							<a href="\reimbursement">
								<button class="download-certificate-button">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/d-icon.svg"/>
									Erstattung der Kursgebühren
								</button>	
							</a>
						</div>
						
						<!-- <div class="button-content-wrap">
							<p>You have completed all the units. Click on Button to Download the Ceriticate</p>
							<button class="download-certificate-button"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/d-icon.svg"/>Download Certificate</button>
						</div> -->
					<?php
				}
			?>
		</div>
	</div>

	<?php if($urlLevel == 2) { ?>
		<div id="download-certificate" class="dcertificate-section" style="display: none;">
			<div class="container">
				<div class="dcertificate-wrap">
					<a href="javascript:void(0)" class="closebutton">&times;</a>
					<div class="dcertificate-content">
						<h3>Congratulations!!!</h3>
						<span>You made it!!!</span>
					</div>
					<div class="image-block">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/congrats-popup.png"/>
					</div>
					<div class="button-wrapper">
						<p>You have completed all the units. Click on Button to Download the Ceriticate</p>
						<button class="download-btn" type="button" id="" style="cursor: pointer;" pdf="<?php echo get_stylesheet_directory_uri(); ?>/pdf/Teilnehmerunterlagen merged_1912.pdf">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/d-icon.svg"/> Download Certificate
						</button>
					</div>
				</div>
			</div>    
		</div>
	<?php }?>


<?php get_footer(); ?>