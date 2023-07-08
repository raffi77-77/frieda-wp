<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header();

?>

<div id="primary" class="toolbox-section">
	<div id="content" class="container" role="main">

		<header class="page-header">
			<!-- <h1 class="page-title"><//?php _e( 'Not Found', 'twentythirteen' ); ?></h1> -->
		</header>

		<div class="page-wrapper">
			<div class="error-page page-content">
				<img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/error-pic.png">
				<h2><?php _e( 'Seite nicht gefunden', 'twentythirteen' ); ?></h2>
				<p><?php _e( 'Die gesuchte Seite konnte leider nicht gefunden werden.', 'twentythirteen' ); ?></p>
				<a href="/">Zurück zur Startseite</a>

			</div><!-- .page-content -->
		</div><!-- .page-wrapper -->

	</div><!-- #content -->
</div><!-- #primary -->

<?php
get_footer();