<?php
/*
Template Name: Symptoms Tracking
*/
redirectUnLoggedUser();
get_header();
$symptoms_tracking_fields      = get_field( 'symptoms_tracking' );
$symptoms_tracker_form_section = get_field( 'symptoms_tracker_form_section' );
$symptoms_tracker_page_section = get_field( 'symptoms_tracker_page_section' );
?>
<div class="tracking-section">
    <div class="container">
        <h3><?php echo $symptoms_tracking_fields['header_title'] ?? ''; ?></h3>
        <p class="paragraph" style="text-align: center;"><?php echo $symptoms_tracking_fields['header_description'] ?? ''; ?></p>
        <div class="tracking-wrap">
            <a class="tracking-block" href="<?= SUBMIT_SYMPTOMS_TRACKER_PAGE_LINK; ?>">
                <span class="icon">
                    <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/tc.svg" alt="tracker-logo"/>
                </span>
                <span class="content"><?php echo $symptoms_tracker_form_section['content'] ?? ''; ?></span>
            </a>
        </div>
        <a class="tracking-logs" href="<?= SYMPTOMS_TRACKER_PAGE_LINK ?>">
            <span class="icon">
                <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/trace-logo.svg" alt="trace-logo"/>
            </span>
            <div class="innerconent">
                <h3><?php echo $symptoms_tracker_page_section['header'] ?? ''; ?></h3>
                <p><?php echo $symptoms_tracker_page_section['paragraph'] ?? ''; ?></p>
            </div>
        </a>
    </div>
</div>
<?php get_footer(); ?>
