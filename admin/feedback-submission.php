<?php

function feedbackSubmissionMenu() {
	add_menu_page(
		'Feedback Submission',
		'Feedback Submission',
		'manage_options',
		'feedback-submission',
		'feedbackFormSubmission',
		'dashicons-schedule',
	);
}
add_action('admin_menu', 'feedbackSubmissionMenu');

function feedbackSubmissionAdminJs($hook) {
	wp_enqueue_script('admin-script', get_template_directory_uri().'/assets/js/admin.js');
}
add_action( 'admin_enqueue_scripts', 'feedbackSubmissionAdminJs');

function feedbackFormSubmission() {
	$pageLink = site_url().'/wp-admin/admin.php?page=feedback-submission';

	global $wpdb;
	$tableName = $wpdb->prefix . "course_feedback";
	$results = $wpdb->get_results("SELECT * FROM $tableName ORDER BY id DESC");
	if (isset($_GET['user']) && $_GET['user']) {
		$id = $_GET['user'];
		$results = $wpdb->get_results("SELECT * FROM $tableName WHERE userid=$id ORDER BY id DESC");
	}
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Feedback Submission</h1>
		<div class="tablenav top">
			<div class="alignleft actions">
				<select onchange="if (this.value) window.location.href=this.value">
					<option value="<?= $pageLink; ?>">All</option>
					<?php
						$users = get_users( array( 'fields' => array( 'ID' ) ) );
						foreach($users as $user){
							$selected = false;
							if (isset($_GET['user']) && $_GET['user'] && $_GET['user'] == $user->ID) {
								$selected = 'selected';
							}
							echo '<option value="'.$pageLink.'&user='.$user->ID.'" '.$selected.'>USER'.$user->ID.'</option>';
						}
					?>
				</select>
			</div>
			<br class="clear">
		</div>
		<?php if($results && count($results)) { ?>
			<table class="wp-list-table widefat fixed striped table-view-list users">
				<thead>
					<tr>
						<th>Datum</th>
						<th>Range</th>
						<th>Comment</th>
						<th>User</th>
						<!-- <th>Intensität</th>
						<th>Auslöser</th> -->
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($results as $key => $result) {
							$data = json_decode($result->data, TRUE);
							$link = SYMPTOMS_TRACKER_DETAIL_PAGE_LINK.'?type=symptom-tracker&time='.$result->timestamp;
							$link .= '&key='.md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp).md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp);
							$link .= '&tracker='.$result->id;
							$link .= '&id='.md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp).md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp);
							?>
							<tr>
								<td><?= date('M d, Y', $result->timestamp); ?></td>
								<td><?= $data['ranger']; ?></td>
								<td><?= $data['comment']; ?></td>
								<td>USER<?= $result->userid; ?></td>
								<!-- <td>
									<button type="button" class="toggle-tracker-detail">Show Details</button>
								</td> -->
							</tr>
							<tr style="display: none;" class="toggle-tracker-tr">
								<td colspan="4">
									<h3 style="margin: 0px;margin-bottom: 10px;">Submission Details</h3>
									<div>
										<div>
											<strong>Question 1:</strong>
											<?= $data['question1']; ?>
										</div>

										<div>
											<strong>Question 1 Text:</strong>
											<?= $data['question1Text']; ?>
										</div>

										<div>
											<strong>Question 2:</strong>
											<?= $data['question2']; ?>
										</div>

										<div>
											<strong>Question 3:</strong>
											<?php
												if ($data['question3'] && count($data['question3'])) {
													foreach ($data['question3'] as $key => $question3) {
														?>
														<div>
															<img class="emoji" src="<?= $question3['img']; ?>" />
															<?= $question3['text']; ?>
														</div>
														<?php
													}
												}
											?>
										</div>

										<div>
											<strong>Question 3 Text:</strong>
											<?= $data['question3Text']; ?>
										</div>

										<div>
											<strong>Question 4:</strong>
											<?= $data['question4']; ?>
										</div>
										
										<div>
											<strong>Question 5:</strong>
											<?php
												if ($data['question5'] && count($data['question5'])) {
													foreach ($data['question5'] as $key => $question5) {
														?>
														<div>
															<img class="emoji" src="<?= $question5['img']; ?>" />
															<?= $question5['text']; ?>
														</div>
														<?php
													}
												}
											?>
										</div>

										<div>
											<strong>Question 5 Text:</strong>
											<?= $data['question5Text']; ?>
										</div>

										<div>
											<strong>Question 6:</strong>
											<?= $data['question6']; ?>
										</div>

										<div>
											<strong>Question 7:</strong>
											<?= $data['question7']; ?>
										</div>

										<div>
											<strong>Question 8:</strong>
											<?= $data['question8']; ?>
										</div>
									</div>
								</td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
			<h4>No Submission Found.</h4>
		<?php } ?>
	</div>
<?php
}