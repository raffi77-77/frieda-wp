<?php

function symptomTrackerMenu()
{
	add_menu_page(
		'Symptom Tracker Submission',
		'Symptom Tracker Submission',
		'manage_options',
		'symptom-tracker-submission',
		'symptomTrackerSubmission',
		'dashicons-schedule',
	);
}
add_action('admin_menu', 'symptomTrackerMenu');


function symptomTrackerSubmission() {
	$pageLink = site_url().'/wp-admin/admin.php?page=symptoms-form-submission';

	global $wpdb;
	$tableName = $wpdb->prefix . "symptom_tracker";
	$results = $wpdb->get_results("SELECT * FROM $tableName ORDER BY id DESC");
	// $results = $wpdb->get_results("SELECT * FROM $tableName WHERE userid=$id ORDER BY id DESC");
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Symptom Tracker Submission</h1>
		<?php if($results && count($results)) { ?>
			<div class="tablenav top">
				<div class="alignleft actions">
					<select onchange="if (this.value) window.location.href=this.value">
						<option value="<?= $pageLink; ?>">All</option>
						<?php
							$users = get_users( array( 'fields' => array( 'ID' ) ) );
							foreach($users as $user){
								echo '<option value="'.$pageLink.'&user='.$user->ID.'">USER'.$user->ID.'</option>';
							}
						?>
						
						
					</select>
				</div>
				<br class="clear">
			</div>
			<table class="wp-list-table widefat fixed striped table-view-list users">
				<thead>
					<tr>
						<th>Datum</th>
						<th>User</th>
						<th>Symptom</th>
						<th>Intensity</th>
						<th>Trigger</th>
						<th>Action</th>
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
								<td>USER<?= $result->userid; ?></td>
								<td><?= $data['question1']; ?></td>
								<td><?= $data['question4']; ?></td>
								<td><?= $data['question3']; ?></td>
								<td>
									<button type="button" class="toggle-tracker-detail">Show Details</button>
								</td>
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
											<strong>Question 2:</strong>
											<?= $data['question2']; ?>
										</div>
										<div>
											<strong>Question 3:</strong>
											<?= $data['question3']; ?>
										</div>
										<div>
											<strong>Question 4:</strong>
											<?= $data['question4']; ?>
										</div>
										<div>
											<strong>Question 5:</strong>
											<?php if (isset($data['question5']['img'])) { ?>
												<div style="display: flex;align-items: center;margin-bottom: 10px;">
													<img src="<?= $data['question5']['img']; ?>"/>
													<?= $data['question5']['text']; ?>
												</div>
											<?php } elseif ($data['question5'] && count($data['question5'])) { ?>
												<?php	foreach ($data['question5'] as $key => $question) { ?>
												<div style="display: flex;align-items: center;margin-bottom: 10px;">
														<img src="<?= $question['img']; ?>"/>
														<?= $question['text']; ?>
													</div>
												<?php	} ?>
											<?php	} ?>
										</div>
										<div>
											<strong>Question 6:</strong>
											<?= $data['question6']; ?>
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