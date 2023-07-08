<?php
/*
	Template Name: Home Page
*/

get_header();

if (is_user_logged_in()) {
	include(get_template_directory().'/templates/home/logged.php');
} else {
	include(get_template_directory().'/templates/home/guest.php');
}

get_footer();
?>