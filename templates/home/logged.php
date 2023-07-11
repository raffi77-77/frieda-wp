<?php $current_user = wp_get_current_user(); ?>
<div class="welcome-section">
    <div class="container container-sm">
        <div class="welcome-section-in">
            <div class="welcome-content">
                <h4>Hallo <?= $current_user->first_name; ?></h4>
				<?php if ( get_field( 'welcome_section_title' ) ) { ?>
                    <h5><?= get_field( 'welcome_section_title' ); ?></h5>
				<?php } ?>
                <p class="gilda"><?= get_field( 'welcome_section_content' ); ?></p>
				<?php $button = get_field( 'welcome_section_button' );
				if ( $button ) { ?>
                    <a href="<?= $button['url']; ?>" class="dark-btn gilda"
                       target="<?= $button['target']; ?>"><?= $button['title']; ?></a>
				<?php } ?>
            </div>
            <div class="welcome-media welcome-media--woman">
				<?= wp_get_attachment_image( get_field( 'welcome_section_image' ), 'full' ); ?>
            </div>
        </div>
    </div>
</div>
<?php $journey_data = get_field( 'journey_data_rep' );
foreach ( $journey_data as $key => $data ) {
	?>
    <div class="tracker-section">
        <div class="container container-sm">
            <div class="welcome-section-in">
				<?php if ( $key % 2 ) { ?>
                    <div class="welcome-media welcome-media--tracker">
						<?= wp_get_attachment_image( $data['image'], 'full' ); ?>
                    </div>
				<?php } ?>
                <div class="welcome-content">
                    <h5><?= $data['title'] ?></h5>
                    <p class="small gilda"><?= $data['content']; ?></p>
					<?php if ( ! empty( $data['button']['url'] ) && ! empty( $data['button']['title'] ) ) { ?>
                        <a href="<?= $data['button']['url']; ?>" class="dark-btn gilda"
                           target="<?= $data['button']['target']; ?>"><?= $data['button']['title']; ?></a>
					<?php } ?>
                </div>
				<?php if ( ! $key % 2 ) { ?>
                    <div class="welcome-media welcome-media--tracker">
						<?= wp_get_attachment_image( $data['image'], 'full' ); ?>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div>
	<?php
} ?>
<div class="welcome-quote-section">
    <div class="container container-sm">
        <div class="welcome-quote-section-in">
            <div class="welcome-quote">
                <p class="gilda welcome-quote-text">
                    <span class="welcome-quote-text-icon"></span>
					<?php $tip_section = get_field( 'welcome_section_tips_section' );
					$max_tip           = rand( 0, ( count( $tip_section ) - 1 ) );
					echo $tip_section[ $max_tip ]['title'] . '<br/>' . $tip_section[ $max_tip ]['content']; ?>
                    <span class="welcome-quote-text-icon"></span>
                </p>
            </div>
        </div>
    </div>
</div>
<!--
<?php $moreDetails = get_field( 'moredetail_section' );
$key               = 0;
foreach ( $moreDetails as $key => $moreDetail ) {
	$key ++; ?>
        <div class="moredetail-section <?= $key == 2 ? 'moredetailwrap' : ''; ?>">
            <div class="container">
                <div class="moredetail-wrap">
                    <h4><?= $moreDetail['title']; ?></h4>
                    <p class="paragraph"><?= $moreDetail['content']; ?></p>
                    <?php $button = $moreDetail['button'];
	if ( $button ) { ?>
                        <a href="<?= $button['url']; ?>" class="more-btn" target="<?= $button['target']; ?>">
                            <span class="content"><?= $button['title']; ?></span>
                            <span class="icon"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-icon.svg"/> </span>
                        </a>
                    <?php }
	if ( $moreDetail['pdf_link'] ) { ?>
                        <a href="<?= $moreDetail['pdf_link']; ?>" class="more-btn pdf-btn" target="_blank">
                            <span class="content">View Pdf</span>
                            <span class="icon"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-icon.svg"/> </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php } ?>
-->