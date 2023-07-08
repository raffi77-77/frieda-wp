<?php
/*
Template Name: Thought Tracker From
Template Post Type: frieda_course,page
*/

redirectUnLoggedUser();
global $post;

$pageUrl = explode('?',rtrim($_SERVER['REQUEST_URI']));
$pageUrl = explode('/',rtrim($pageUrl[0]));
$pageUrl = array_filter($pageUrl);
$urlLevel = count($pageUrl);

array_pop($pageUrl); 
$goBackUrl = site_url(implode('/',$pageUrl).'?parent='.$post->post_parent);

$postId = "";
$isCompleted = false;
if ($post->post_type == 'frieda_course') {
	$postId = $post->ID;
	$metaId = get_user_meta(get_current_user_id(),'userCourseMetaIds'.$post->ID,true);
	$isCompleted = updateGroupUserMeta($metaId,'completedDate');
	$israckerFrom = updateGroupUserMeta($metaId,'isTrackerFrom');
	?>
		<script>window.isTrackerFrom=true</script>
	<?php
}

get_header();
?>
<div class="detail-section toolscontent-wrap" id="<?= $postId; ?>">
	<div class="container">
		<div class="discovery-title">
			<a class="backbtn" href="<?= $goBackUrl;?>">
				<span class="arrow-icon">
					<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/back-arrow.png">
				</span>
				<span class="arrow-content">
					Zurück
				</span>
			</a>
			<h3><?= get_the_title(); ?></h3> 
			<div></div>
		</div>

		<?php if(is_page_template('templates/thought-tracker-form.php')) { ?>
			<div class="tracker-form-description"><?= get_field('course_cpt_short_description') ?></div> 
		<?php } ?>

		<div class="symptoms-wrap">
			<h2>
				<span class="quiz-numb">1. </span>
				<span class="quiz-headtitle">Welche Begleiterscheinung möchtest du in dein Gedanken-Tagebuch eintragen?</span>
			</h2>
			<div class="symptoms-block question-1" data-id="question-1">
				<?php
					$question5 = [
						"Hitzewallungen und Schweißausbrüche",
						"Schlafstörungen",
						"Stimmungsschwankungen",
						"Erschöpfung",
						"Libidoverlust",
						"Scheidentrockenheit",
						"Gewichtsveränderungen",
						"Herzrasen und Blutdruckschwankungen",
						"Ängste",
						"Schmerzen (Kopf, Glieder, Rücken etc.)",
					];

					foreach ($question5 as $question) {
						echo '<button>'.$question.'</button>';
					}
				?>
			</div>
			<div class="error-question error-question-1" style="display: none;">Option erforderlich.</div>
			<div class="bottom-wrap question-1-section" style="display: none;">
				<hr>
				<h5>Sonstige</h5>
				<input type="text" class="question-1-input" placeholder="Trage hier deine eigenen Angaben ein" name="name">
			</div>
		</div>

		<div class="symptoms-wrap symptoms-pb">
			<h2>
				<span class="quiz-numb">2.</span>
				<span class="quiz-headtitle">Wie intensiv war deine Begleiterscheinung?</span>
			</h2>
			<div class="symptoms-range">
				<div class="range-details">
					<span>gar nicht</span>
					<span>sehr intensiv</span>
				</div>
				<span class="range-wrap">
					<input type="range" class="question-2" id="vol" name="vol" min="0" max="10" labels="0, 2, 4, 6, 8, 10">
				</span>
			</div>
		</div>

		<div class="symptoms-wrap question-3" data-id="question-3">
			<h2>
				<span class="quiz-numb">3. </span>
				<span class="quiz-headtitle">Wie hast du dich gefühlt? Notiere deine Emotionen und körperlichen Empfindungen</span>
			</h2>
			<ul class="tabs">
				<li class="active" id="tab2">Positive</li>
				<li id="tab1">Negative</li>
			</ul>
			<div class="symptoms-block twoblocks multiple tab1 question-3" data-id="question-3" style="display: none;">
				<?php
					$tabs1 = [
						[
							'icon' => 'scared (2) 1',
							'title' => 'Ängstlich'
						],
						[
							'icon' => 'disappointed 1',
							'title' => 'Enttäuscht'
						],
						[
							'icon' => 'heart 2',
							'title' => 'Leer'
						],
						[
							'icon' => 'expressionless 1',
							'title' => 'Frustriert'
						],
						[
							'icon' => 'upset 1',
							'title' => 'Schuldig'
						],
						[
							'icon' => 'mood 1',
							'title' => 'Hoffnungslos'
						],
						[
							'icon' => 'lonely 1',
							'title' => 'Einsam'
						],
						[
							'icon' => 'scared (3) 1',
							'title' => 'Gestresst'
						],
						[
							'icon' => 'weary 1',
							'title' => 'Müde'
						],
						[
							'icon' => 'scared 1',
							'title' => 'Besorgt'
						],
					];

					foreach ($tabs1 as $tab1) {
						?>
							<button class="checkbox-wrap">
								<input type="checkbox" class="checkbox" />
								<span class="contenticon-wrap">
									<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/<?= $tab1['icon']; ?>.svg" />
									<span class="content"><?= $tab1['title']; ?></span>
								</span>
							</button>
						<?php
					}
				?>
			</div>

			<div class="symptoms-block twoblocks multiple tab2 question-3" data-id="question-3">
				<?php
					$tabs2 = [
						[
							'icon' => 'ruhg',
							'title' => 'Ruhig'
						],
						[
							'icon' => 'entspannt',
							'title' => 'Entspannt'
						],
						[
							'icon' => 'aufgeregt',
							'title' => 'Aufgeregt'
						],
						[
							'icon' => 'dankbar',
							'title' => 'Dankbar'
						],
						[
							'icon' => 'glücklich',
							'title' => 'Glücklich'
						],
						[
							'icon' => 'hoffnungsvoll',
							'title' => 'Hoffnungsvoll'
						],
						[
							'icon' => 'geliebt',
							'title' => 'Geliebt'
						],
						[
							'icon' => 'motiviert',
							'title' => 'Motiviert'
						],
						[
							'icon' => 'stolz',
							'title' => 'Stolz'
						],
						[
							'icon' => 'erleichtert',
							'title' => 'Erleichtert'
						],
					];

					foreach ($tabs2 as $tab2) {
						?>
							<button class="checkbox-wrap">
								<input type="checkbox" class="checkbox" />
								<span class="contenticon-wrap">
									<?php if ($tab2['icon']) { ?>
										<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/<?= $tab2['icon']; ?>.svg" />
									<?php } ?>
									<span class="content"><?= $tab2['title']; ?></span>
								</span>
							</button>
						<?php
					}
				?>
			</div>

			<div class="error-question error-question-3" style="display: none;">Option erforderlich.</div>
			<div class="bottom-wrap question-3-section" style="display: none;">
				<h5>Notizen</h5>
				<input type="text" class="question-3-input" placeholder="Trage hier deine eigenen Angaben ein" name="name">
			</div>
		</div>

		<div class="symptoms-wrap question-4">
			<h2>
				<span class="quiz-numb">4. </span>
				<span class="quiz-headtitle">Welche Gedanken hattest du? Was ist dir vorher und nachher durch den Kopf gegangen?</span>
			</h2>
			<div class="textarea-block">
				<textarea rows="4" cols="50" class="question-4-input"></textarea>
				<div class="error-question error-question-4" style="display: none;">Text field required.</div>
			</div>
		</div>

		<div class="symptoms-wrap">
			<h2>
				<span class="quiz-numb">5. </span>
				<span class="quiz-headtitle">Liste alle kognitiven Verzerrungen auf, die du in deinem denken erkennen kannst.</span>
			</h2>
			<div class="symptoms-block question-5 multiple" data-id="question-5">

				<?php
					$question5 = [
						[
							'icon' => 'home',
							'title' => 'Alles-Oder-Nichts-Denken '
						],
						[
							'icon' => 'home',
							'title' => 'Wahrscheinlichkeits-überschätzung'
						],
						[
							'icon' => 'home',
							'title' => 'Emotionale Beweisführung'
						],
						[
							'icon' => 'home',
							'title' => 'Katastrophisieren'
						],
						[
							'icon' => 'home',
							'title' => 'Labelling'
						],
						[
							'icon' => 'home',
							'title' => 'Sollte-Tyranneien'
						],
						[
							'icon' => 'home',
							'title' => 'Gedankenlesen'
						],
						[
							'icon' => 'home',
							'title' => 'Selektive Wahrnehmung (des Negativen)'
						],
					];

					foreach ($question5 as $question) {
						?>
							<button class="checkbox-wrap">
								<input type="checkbox" class="checkbox" />
								<span class="contenticon-wrap homeicon">
									<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/<?= $question['icon']; ?>.svg" />
									<span class="content"><?= $question['title']; ?></span>
								</span>
							</button>
						<?php
					}
				?>
			</div>
			<div class="error-question error-question-5" style="display: none;">Option erforderlich.</div>
			<div class="bottom-wrap question-5-section" style="display: none;">
				<hr>
				<h5>Notizen</h5>
				<input type="text" class="question-5-input" placeholder="Trage hier deine eigenen Angaben ein" name="name">
			</div>
		</div>

		<div class="symptoms-wrap question-6">
			<h2>
				<span class="quiz-numb">6. </span>
				<span class="quiz-headtitle">Kannst du einen alternativen hilfreicheren Gedanken entwickeln?</span>
			</h2>
			<div class="textarea-block">
				<textarea rows="4" class="question-6-input" cols="50"></textarea>
				<div class="error-question error-question-6" style="display: none;">Text field required.</div>
			</div>
		</div>

		<div class="symptoms-wrap question-7">
			<h2>
				<span class="quiz-numb">7. </span>
				<span class="quiz-headtitle">Was war deine Reaktion?</span>
			</h2>
			<div class="textarea-block">
				<textarea rows="4" cols="50" class="question-7-input"></textarea>
				<div class="error-question error-question-7" style="display: none;">Text field required.</div>
			</div>
		</div>

		<!-- <div class="symptoms-wrap">
			<h2>
				<span class="quiz-numb">8. </span>
				<span class="quiz-headtitle">Möchtest Du noch ein weiteres Symptom eintragen?</span>
			</h2>
			<div class="symptoms-block question-8">
				<button>Yes</button>
				<button>No</button>
			</div>
			<div class="error-question error-question-8" style="display: none;">Option erforderlich.</div>
		</div> -->

		<div class="submit-tracker-result" style="display: none;">
			<span></span>
			<a class="toolbox-thought" href="<?= THOUGHT_TRACKER_PAGE_LINK;?>">Zurück zur Übersicht</a>
		</div>

		<div class="button-submit-wrap">
			<?php if ($isCompleted) { ?>
				<button type="button" class="completed">Erledigt</button>
			<?php } else { ?> 
				<button type="button" id="submit-tracker" style="cursor: pointer;">Senden</button>
				<button type="button" class="submit-activity" style="cursor: pointer; display:none">Senden</button>
			<?php } ?>
		</div>
	</div>
	<?php include(get_template_directory().'/templates/feedback-modal.php'); ?>
</div>
<?php get_footer(); ?>