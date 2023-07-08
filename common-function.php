<?php

/**
 * Comman Pages Id
 */
	define('THOUGHT_TRACKER_PAGE_LINK',get_permalink(615));
	define('SUBMIT_THOUGHT_TRACKER_PAGE_LINK',get_permalink(626));
	define('THOUGHT_TRACKER_DETAIL_PAGE_LINK',get_permalink(623));
	define('THOUGHT_LANDING_TRACKER_PAGE_LINK',get_permalink(613));

	define('SYMPTOMS_TRACKER_PAGE_LINK',get_permalink(1070));
	define('SUBMIT_SYMPTOMS_TRACKER_PAGE_LINK',get_permalink(1047));
	define('SYMPTOMS_TRACKER_DETAIL_PAGE_LINK',get_permalink(1049));


	function getChildPostsById($id, $getCount = false) {
		$posts = new WP_Query([
			'post_type'				=> 'frieda_course',
			'post_parent__in'	=> array($id),
			'orderby'					=> 'menu_order', 
			'order'						=> 'ASC'
		]);

		if ($getCount) {
			return $posts->post_count;
		}
		return $posts;
	} 

	function getHoursByMint($min){
		$mints = (int)$min;
		if ($mints <= 60) {
			return $mints;
		} else {
			$hours = floor($mints / 60);
			$minutes = ($mints % 60);
			return $hours." hr ".$minutes;
		}
	}


	function redirectUnLoggedUser() {
		if (!is_user_logged_in()) {
			wp_redirect('/');
			exit;
		}
}