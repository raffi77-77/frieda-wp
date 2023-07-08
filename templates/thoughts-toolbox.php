<?php
/*
	Template Name: Thoughts Toolbox
*/

redirectUnLoggedUser();
get_header();
?>

<div class="toolbox-section">
	<div class="container">
		<h3>Toolbox</h3>
		<p class="paragraph">Hier findest du die Übungen und Techniken, die du im Laufe des Kurses erlernst.</p>
		<div class="toolbox-wrap">
			<?php
				$wcatTerms = get_terms('video_types', array('hide_empty' => 0, 'parent' =>0));
				foreach ($wcatTerms as $wcatTerm) {
					$image = get_field('video_types_image', $wcatTerm->taxonomy . '_' . $wcatTerm->term_id); 
					?>
				<a href="<?php echo get_term_link($wcatTerm->slug, $wcatTerm->taxonomy); ?>" class="toolbox-block">
					<span class="image-content">
						<img src="<?= $image; ?>"/>
					</span>
					<h5><?php echo $wcatTerm->name; ?></h5>
				</a>
			<?php } ?>
		</div>
	</div>
</div>
<div class="toolbox-section thoughts-section">
    <div class="container">
        <div class="thought-content">
            <h4>Mein Gedanken-Tagebuch</h4>
            <p class="paragraph">Hier kannst du in deinem Gedanken-Tagebuch einen neuen Eintrag hinzufügen.</p>
            <a class="thought-btn" href="<?= SUBMIT_THOUGHT_TRACKER_PAGE_LINK;?>" style="cursor: pointer;">+ Einen Gedanken hinzufügen</a>
        </div>
        <a class="toolbox-thought" href="<?= THOUGHT_TRACKER_PAGE_LINK;?>">
            <span class="icon">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/t-icon.png"/>
            </span>
            <div class="innerconent">
                <h3>Mein Gedanken-Tagebuch im Verlauf</h3>
                <p>Hier findest du eine Übersicht aller Einträge deines Gedanken-Tagebuchs</p>
            </div>
        </a>
    </div>
</div>

<?php get_footer(); ?>