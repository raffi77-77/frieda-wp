<?php
/*
	Template Name: Symptom Tracker Detail
*/
redirectUnLoggedUser();
get_header();

$redirect = false;
if (!isset($_GET['key']) && !isset($_GET['tracker']) && !isset($_GET['id'])) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . SYMPTOMS_TRACKER_PAGE_LINK);
    exit();
}
if ($_GET['key'] != $_GET['id']) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . SYMPTOMS_TRACKER_PAGE_LINK);
    exit();
}
$id = $_GET['tracker'];

global $wpdb;
$tableName = $wpdb->prefix . "symptom_tracker";
$results = $wpdb->get_results("SELECT * FROM $tableName WHERE id=$id");
if (!$results && !count($results)) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . SYMPTOMS_TRACKER_PAGE_LINK);
    exit();
}
$result = $results[0];
$data = json_decode($result->data, TRUE);
?>
<div class="tracsymptom-section">
    <div class="container">
        <div class="discovery-title">
            <a class="backbtn" href="<?= SYMPTOMS_TRACKER_PAGE_LINK; ?>">
					<span class="arrow-icon">
					<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ep_back.svg">
				</span>
                <span class="arrow-content">Zurück</span>
            </a>
            <h3>Mein Tracker-Tagebuch</h3>
            <div></div>
        </div>
        <div class="symptoms-wrap">
            <h2>
                <span class="quiz-numb">1. </span>
                <span class="quiz-headtitle">Welche Begleiterscheinung möchtest du in dein Tracker eintragen?</span>
            </h2>
            <div class="symptoms-block">
                <button class="active"><?= $data['question1']; ?></button>
            </div>

            <div class="bottom-wrap">
                <h5>Notizen</h5>
                <input type="text" disabled value="<?= $data['question1Text']; ?>">
            </div>
        </div>
        <div class="symptoms-buttons">
            <a href="#" class="symptoms-btn symptoms-btn--light gilda">Back</a>
            <a href="#" class="symptoms-btn symptoms-btn--dark gilda">Next</a>
        </div>
        <div class="symptoms-wrap">
            <h2>
                <span class="quiz-numb">2. </span>
                <span class="quiz-headtitle">Liste zuerst die Situation auf, in der du die Begleiterscheinung hattest</span>
            </h2>
            <div class="symptoms-block threeblocks">
                <button class="active"><?= $data['question2']; ?></button>
            </div>

            <div class="bottom-wrap">
                <h5>Notizen</h5>
                <input type="text" disabled value="<?= $data['question2Text']; ?>">
            </div>
        </div>
        <div class="symptoms-buttons">
            <a href="#" class="symptoms-btn symptoms-btn--light gilda">Back</a>
            <a href="#" class="symptoms-btn symptoms-btn--dark gilda">Next</a>
        </div>
        <div class="symptoms-wrap">
            <h2>
                <span class="quiz-numb">3. </span>
                <span class="quiz-headtitle">Wie intensiv war deine Begleiterscheinung?</span>
            </h2>

            <div class="range-details">
                <span>gar nicht</span>
                <span>sehr intensiv</span>
            </div>

            <div class="range-wrap">
                <input type="range" id="volume" name="volume" min="0" max="10" value="<?= $data['question3']; ?>"
                       step="1" labels="0, 2, 4, 6, 8, 10" disabled>
            </div>
        </div>
        <div class="symptoms-buttons">
            <a href="#" class="symptoms-btn symptoms-btn--light gilda">Back</a>
            <a href="#" class="symptoms-btn symptoms-btn--dark gilda">Next</a>
        </div>
        <div class="symptoms-wrap">
            <h2>
                <span class="quiz-numb">4. </span>
                <span class="quiz-headtitle">Wie stark hat dich die Begleiterscheinung belastet?</span>
            </h2>

            <div class="range-details">
                <span>gar nicht</span>
                <span>sehr intensiv</span>
            </div>

            <div class="range-wrap">
                <input type="range" id="volume" name="volume" min="0" max="10" value="<?= $data['question4']; ?>"
                       step="1" labels="0, 2, 4, 6, 8, 10" disabled>
            </div>
        </div>
        <div class="symptoms-buttons">
            <a href="#" class="symptoms-btn symptoms-btn--light gilda">Back</a>
            <a href="#" class="symptoms-btn symptoms-btn--dark gilda">Next</a>
        </div>
        <div class="symptoms-wrap">
            <h2>
                <span class="quiz-numb">5. </span>
                <span class="quiz-headtitle">Wie hast Du Dich gefühlt? Notiere Deine Emotionen und körperlichen Empfindungen</span>
            </h2>
            <div class="symptoms-block threeblocks reactionblock">
                <?php if (isset($data['question5']['img'])) { ?>
                    <button class="active">
                        <img src="<?= $data['question5']['img']; ?>"/>
                        <?= $data['question5']['text']; ?>
                    </button>
                <?php } elseif ($data['question5'] && count($data['question5'])) { ?>
                    <?php foreach ($data['question5'] as $key => $question) { ?>
                        <button class="active">
                            <img src="<?= $question['img']; ?>"/>
                            <?= $question['text']; ?>
                        </button>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="symptoms-buttons">
            <a href="#" class="symptoms-btn symptoms-btn--light gilda">Back</a>
            <a href="#" class="symptoms-btn symptoms-btn--dark gilda">Next</a>
        </div>
        <!-- <div class="symptoms-wrap">
				<h2>
					<span class="quiz-numb">6. </span>
					<span class="quiz-headtitle">Möchtest Du noch ein weiteres Symptom eintragen?</span>
				</h2>
				<div class="symptoms-block">
					<button class="active"><?= $data['question6']; ?></button>
				</div>
			</div> -->
        <!-- <div class="button-submit-wrap">
            <button type="button" id="submit-tracker" style="cursor: pointer;">Submit</button>
        </div> -->
    </div>
</div>

<?php get_footer(); ?>
