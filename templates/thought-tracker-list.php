<?php
/*
	Template Name: Thought Tracker List
*/

redirectUnLoggedUser();
get_header();

global $wpdb;
$tableName = $wpdb->prefix."thought_tracker";
$id = get_current_user_id();
$results = $wpdb->get_results("SELECT * FROM $tableName WHERE userid=$id ORDER BY id DESC");
?>
<div class="toolbox-section">
  <div class="container">
    <h3>Mein Gedanken-Tagebuch</h3>
    <p class="paragraph">Hier ist eine Übersicht aller deiner Einträge ins Gedanken-Tagebuch.</p>
    <div class="toolbox-record">
			<?php if($results && count($results)) { ?>
				<table id="data">
					<tr>
						<th>Datum</th>
						<th>Begleiterscheinung</th>
						<th>Intensität</th>
						<th>Emotionen </th>
						<th>Info</th>
					</tr>
					<?php
						foreach ($results as $key => $result) {
						$data = json_decode($result->data, TRUE);
						$link = THOUGHT_TRACKER_DETAIL_PAGE_LINK.'?type=symptom-tracker&time='.$result->timestamp;
						$link .= '&key='.md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp).md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp);
						$link .= '&tracker='.$result->id;
						$link .= '&id='.md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp).md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp);
						?>
						<tr>
							<td>
								<p class="date"><?= date('M d, Y',$result->timestamp); ?></p>
							</td>
							<td>
								<p><?= $data['question1']; ?></p>
							</td>
							<td>
								<p><?= $data['question2']; ?></p>
							</td>
							<td>
								<?php if ( $data['question3'] && count( $data['question3'] ) && ! empty( $data['question3'][0]['img'] ) ) { ?>
                                    <img class="emoji" src="<?= $data['question3'][0]['img']; ?>" alt="emoji"/>
								<?php } ?>
							</td>
							<td>
								<a href="<?= $link;?>" class="view-detail-wrap">Details anschauen</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			<?php } else { ?>
				<div>
					<h4>No Data Found.</h4>
					<a href="<?= SUBMIT_THOUGHT_TRACKER_PAGE_LINK;?>">Einen Gedanken hinzufügen</a>
				</div>
			<?php } ?>
    </div>
    <!-- <div class="pagination">
      <ul>
        <li>
          <a class="pagelink previous"></a>
        </li>
        <li>
          <a class="pagelink active">1</a>
        </li>
        <li>
          <a class="pagelink">2</a>
        </li>
        <li>
          <a class="pagelink">3</a>
        </li>
        <li>
          <a class="pagelink">4</a>
        </li>
        <li>
          <a class="pagelink next"></a>
        </li>
      </ul>
    </div> -->
  </div>
</div>

<?php get_footer(); ?>
