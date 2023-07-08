<?php
/*
	Template Name: Thought Tracker Detail
*/
redirectUnLoggedUser();
get_header();

$redirect = false;
if (!isset($_GET['key']) && !isset($_GET['tracker']) && !isset($_GET['id'])) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".SYMPTOMS_TRACKER_PAGE_LINK);
	exit();
} 
if ($_GET['key'] != $_GET['id']) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".SYMPTOMS_TRACKER_PAGE_LINK);
	exit();
}
$id = $_GET['tracker'];

global $wpdb;
$tableName = $wpdb->prefix."thought_tracker";
$results = $wpdb->get_results("SELECT * FROM $tableName WHERE id=$id");
if (!$results && !count($results)) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".THOUGHT_TRACKER_PAGE_LINK);
	exit();
}
$result = $results[0];
$data = json_decode($result->data, TRUE);
?>
<div class="toolbox-section">
  <div class="container">
    <div class="detailversion-two-wrap">
      <a class="backbtn" href="<?= THOUGHT_TRACKER_PAGE_LINK; ?>">
        <span class="arrow-icon">
          <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/back-arrow.png">
        </span>
				<span class="arrow-content">Zurück</span>
      </a>
      <h3>Mein Gedanken-Tagebuch</h3>
      <span class="date-wrap">
        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/calendar-icon.png">
        <span class="time-wrap"><?= date('M d, Y',$result->timestamp); ?></span>
      </span>
    </div>
		<?php if ($data['question3'] && count($data['question3'])) { ?>
			<div class="detailversion-emoji">
				<?php	foreach ($data['question3'] as $key => $question) { ?>
						<span class="iconwith-content">
							<img src="<?= $question['img']; ?>">
							<span class="icon-innercontent"><?= $question['text']; ?></span>
						</span>
				<?php	} ?>
			</div>
		<?php	} ?>
    <div class="detailsversion-section">
      <div class="detailversion-block">
        <span class="btn-content">
          <button>
            Meine Gedanken
            <img class="loupe-img" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/loupe.png">
          </button>
          <span class="button-innercontent"><?= $data['question4'];?></span>
        </span>
        <img class="behaviour" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/polygon.png" />
        <span class="btn-content">
          <button>
            Mein Verhalten
            <img class="loupe-img" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/loupe.png">
          </button>
          <span class="button-innercontent"><?= $data['question7'];?></span>
        </span>
      </div>
    </div>
    <div class="deatilversion-details">
      <div class="block-wrap">
        <h4>Dein Gedanke:</h4>
        <p><?= $data['question4'];?></p>
      </div>
      <div class="block-wrapvs">
        <span>Vs</span>
      </div>
      <div class="block-wrap">
        <h4>Dein hilfreicher Gedanke:</h4>
        <p><?= $data['question6'];?></p>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
