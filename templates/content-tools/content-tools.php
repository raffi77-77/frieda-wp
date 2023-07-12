<?php

	global $post;

	$pageUrl = explode('?',rtrim($_SERVER['REQUEST_URI']));
	$pageUrl = explode('/',rtrim($pageUrl[0]));
	$pageUrl = array_filter($pageUrl);
	$urlLevel = count($pageUrl);

	array_pop($pageUrl);

	$submitButtonId = "";
	$isEvaluation = get_field('course_cpt_fields_is_evaluation');
	if ($isEvaluation) {
		array_pop($pageUrl);
		$submitButtonId = 'evaluation-popup';
	}

	$currentTemplate = get_page_template_slug($post);
	if ($urlLevel == 5 && $currentTemplate && $currentTemplate != 'templates/content-tools-quiz.php') {
		array_pop($pageUrl);
	}

	$goBackUrl = site_url(implode('/',$pageUrl).'?parent='.$post->post_parent);

	$metaId = get_user_meta(get_current_user_id(),'userCourseMetaIds'.$post->ID,true);
	$isCompleted = updateGroupUserMeta($metaId,'completedDate');


	get_header();
?>

<div class="registerform-section toolscontent-wrap" id="<?= $post->ID; ?>">
	<div class="container container-xs">
		<div  class="discovery-title">
			<a class="backbtn" href="<?= $goBackUrl; ?>">
				<span class="arrow-icon">
					<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ep_back.svg">
				</span>
				<span class="arrow-content">Zurück</span>
			</a>
			<div>
			<h3><?= get_the_title(); ?></h3>
			</div>
			<div></div>
		</div>

		<div class="sidebar-content" style="display: grid;grid-template-columns: <?= $isEvaluation ? '' : '300px'; ?> 1fr;column-gap: 20px;">
			<?php if(!$isEvaluation) { ?>
				<div class="content-sidebar">
					<?php include(get_template_directory().'/templates/content-tools/sidebar.php'); ?>
				</div>
			<?php } ?>
			<div class="activity-content content-type-<?= $tool; ?>">
				<div class="activecourse">
					<div class="activecourse-innercontentwrap">
						<h4 class="course-number"><?= $post->menu_order+1; ?></h4>
						<span class="course-title"><?= get_the_title(); ?></span>
					</div>
					<!-- <div>
						<span class="course-time">
							<span class="time-icon">
								<img src="<?= site_url(); ?>/wp-content/themes/frieda-wp/assets/images/time-icon.png">
							</span>
							<span class="time-content"><?= getHoursByMint(get_field('course_time',get_the_id())); ?> min</span>
						</span>
					</div> -->
				</div>

				<?php include(get_template_directory().'/templates/content-tools/tool/'.$tool.'.php'); ?>
				<div class="btn-inner <?= 'button-submit-' . $tool; ?>" style="display: none; text-align: center;">


                    <div class="symptoms-buttons">
                        <?php
                        global $wp;
                        $courseAllPages = get_user_meta(get_current_user_id(), 'courseAllPages', true);
                        $pageIndex = array_search(home_url($wp->request), $courseAllPages);
                        if ($pageIndex < count($courseAllPages)-1) {
                            ?>
                            <a href="#" class="symptoms-btn symptoms-btn--light gilda symptoms-step-back">Zurück</a>
                            <a href="<?= $courseAllPages[$pageIndex+1]; ?>" class="symptoms-btn symptoms-btn--dark gilda next-course-btn" style="display: <?= $isCompleted ? 'inline-block' : 'none';?>;">
                                Weiter
                            </a>
                            <?php
                        }

                        ?>
                        <?php if ($isCompleted) { ?>
                            <!-- <button type="button" class="completed">Erledigt</button> -->
                        <?php } else { ?>
                            <button type="button" class="symptoms-btn symptoms-btn--dark gilda" class="submit-activity" id="<?= $submitButtonId; ?>" style="cursor: pointer;">Als fertig markieren</button>
                        <?php } ?>
                    </div>
				</div>


				<div id="show-res" style="display:none"></div>
			</div>
		</div>
	</div>
</div>

<?php if($isEvaluation) { ?>
	<div id="feedback" class="feedback-secion" style="width: 100%;display: none;">
		<div class="container">
			<div class="feedback-wrap">
				<a href="javascript:void(0)" class="closebtn-popup">&times;</a>
				<div class="feedback-content">
					<h3>Dein Feedback!!!</h3>
					<p>Dein Feedback hilft uns dabei immer besser zu werden!</p>
				</div>
				<div class="feedback-block">
					<div class="activecourse">
						<h4 class="course-number">1</h4>
						<span class="course-title">Wie hilfreich fandest Du diese Einheit?</span>
					</div>
					<hr>
					<div class="ranger-content">
						<div class="rangeslider-wrap">
							<input type="range" min="0" max="10" step="1" value="0" value="0" labels="0, 2, 4, 6, 8, 10" id="quiz-feedback-ranger">
						</div>
						<span class="content">
							<span>überhaupt nicht hilfreich</span>
							<span>sehr hilfreich</span>
						</span>
					</div>
					<div class="error-question-1" style="display: none;">Range required.</div>
				</div>
				<div class="feedback-block">
					<div class="activecourse">
						<h4 class="course-number">2</h4>
						<span class="course-title">Warum?</span>
					</div>
					<textarea rows="10" name="comment" id="quiz-feedback-comment" cols="50"></textarea>
					<div class="error-question-2" style="display: none;">Range required.</div>
				</div>
				<div class="button-wrapper">
					<button type="submit" id="quiz-feedback-submit" meta-id="<?= $metaId;?>" style="cursor: pointer;">Abschicken</button>
				</div>
			</div>
		</div>
	</div>
<?php } else {
	include(get_template_directory().'/templates/feedback-modal.php');
} ?>

<?php get_footer(); ?>