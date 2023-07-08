<?php
/*
	Template Name: Symptom Tracker List
*/
redirectUnLoggedUser();
get_header();

$symptomsList = [
	"Hitzewallungen und Schweißausbrüche",
	"Schlafprobleme",
	"Stimmungsschwankungen und depressive Verstimmungen",
	"Herzrasen und Blutdruckschwankungen",
	"Scheidentrockenhei",
	"Libidoverlust",
	"Ängste",
	"Gelenkbeschwerden",
];

global $wpdb;
$tableName = $wpdb->prefix."symptom_tracker";
$id = get_current_user_id();
$results = $wpdb->get_results("SELECT * FROM $tableName WHERE userid=$id ORDER BY id DESC");
?>

<div class="trackingdairy-section tracking-section">
	<div class="container">
		<h3>Meine die Begleiterscheinungen im Verlauf</h3>
		<p class="paragraph">Wähle eine die Begleiterscheinung aus und schaue dir die Intensität im Zeitverlauf an.</p>
		<div class="symptopmdairy-wrap">
			<div class="symptopmdairy-block">
				<div class="innercontent-wrap">
					<div class="inner-content">
						<span style="color: #777777">Intensität</span>
						<span class="symptoms-dropdown">
							<?php
								if (isset($_GET['symptom']) && array_key_exists($_GET['symptom'], $symptomsList)) {
									echo $symptomsList[$_GET['symptom']];
								} else {
									echo "Begleiterscheinung";
								}
							?>
							<div class="dropdown-list">
								<ul>
									<?php foreach($symptomsList as $key => $question) { ?>
										<li><a href="<?= SYMPTOMS_TRACKER_PAGE_LINK.'?symptom='.$key; ?>"><?= $question; ?></a></li>
									<?php } ?>
								</ul>
							</div>
						</span>
					</div>
				</div>    
				<div class="graph-wrap">
					<canvas id="symptomChart"></canvas>
				</div>
				<div class="date">
					<span  style="color: #777777">Datum</span>
				</div>
			</div>
		</div>
		<div class="table-contentwrap">
			<h5>Übersicht der Einträge</h5>
			<p>In dieser Übersicht siehst du alle Einträge deines Trackers</p>
		</div>
		<div class="toolbox-record">
			<?php if($results && count($results)) { ?>
				<table id="data">
					<tr>
						<th>Datum</th>
						<th>Begleiterscheinung</th>
						<th>Intensität</th>
						<th>Belastung</th>
						<th>Emotionen</th>
						<th></th>
					</tr>
					<?php
						$labels = [];
						$datasets = [];
						foreach ($results as $key => $result) {
							$show = true;
							$data = json_decode($result->data, TRUE);
							
							$link = SYMPTOMS_TRACKER_DETAIL_PAGE_LINK.'?type=symptom-tracker&time='.$result->timestamp;
							$link .= '&key='.md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp).md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp);
							$link .= '&tracker='.$result->id;
							$link .= '&id='.md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp).md5($result->timestamp.$data['question1']).md5($data['question1'].$result->timestamp);

							if (isset($_GET['symptom']) && array_key_exists($_GET['symptom'], $symptomsList)) {
								if ($symptomsList[$_GET['symptom']] != $data['question1']) {
									$show = false;
								}
							}

							if ($show) {
								// $labels[] = date('M d, Y', $result->timestamp);
								$labels[] = date('M d', $result->timestamp);
								$datasets['label'] = 'Intensity';
								$datasets['borderColor'] = '#25384b';
								$datasets['backgroundColor'] = '#fff6f1';
								$datasets['data'][] = $data['question4'];?>
								<tr>
									<td>
										<p class="date"><?= date('M d, Y',$result->timestamp); ?></p>
									</td>
									<td>
										<p><?= $data['question1']; ?></p>
									</td>
									<td>
										<p><?= $data['question3']; ?></p>
									</td>
									<td>
										<p><?= $data['question4']; ?></p>
									</td>
									<td> 
										<?php
										if($data['question5'] && count($data['question5'])){
											$img = $data['question5'][0]['img'];
											if (!$img) {
												$img = $data['question5']['img'];
											}
											?>
											<img class="emoji" src="<?= $img; ?>" />
										<?php } ?>
									</td>
									<td>
										<a href="<?= $link;?>" class="view-detail-wrap">Details anschauen</a>
									</td>
								</tr>
								<?php
							}
						}
					?>
					<?php $labels = array_reverse(array_unique($labels)); ?>
					<script>window.jsonData=<?= json_encode(['labels'=>$labels, 'datasets'=>[$datasets]]); ?>;</script>
				</table>
			<?php } else { ?>
				<div class="nodata-wrap" >
					<h4>No Data Founds.</h4>
					<a href="<?= SUBMIT_SYMPTOMS_TRACKER_PAGE_LINK;?>">Symptom hinzufügen</a>
				</div>
			<?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
