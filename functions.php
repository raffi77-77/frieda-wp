<?php
include(get_template_directory() . '/html-compression.php');
include(get_template_directory() . '/common-function.php');
include(get_template_directory() . '/admin/feedback-submission.php');
include(get_template_directory() . '/admin/symptom-tracker-submission.php');
include(get_template_directory() . '/admin/thought-tracker-submission.php');

/**
 * Gutenberg Editor Disabled
 */
add_filter('use_block_editor_for_post', '__return_false', 10);


/**
 * Theme Support Added
 */
add_theme_support('title-tag');
add_theme_support('woocommerce');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('text_section', 'text_image_or_video', 'Text Section', 'Text, Image OR Video'));


// Register your menus
function my_custom_menus()
{
	register_nav_menus([
		'header_menu' => 'Header Menu',
		'guest_menu' => 'Guest Header Menu',
		'footer_menu' => 'Footer Menu',
		'footer_menu1' => 'Footer Menu 1',
	]);
}
add_action('init', 'my_custom_menus');

/**
 * Enqueue scripts and styles
 */
function enqueueStyleScript()
{
	wp_enqueue_style('owlcarousel-min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('owl-theme-min', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('theme-css', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array(), null);
	wp_enqueue_style('google-fonts-gilda', 'https://fonts.googleapis.com/css2?family=Gilda+Display&display=swap', array(), null);
	wp_enqueue_style('google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap', array(), null);


	if (!is_page('payment')) {
		wp_enqueue_script('jquery-js', get_template_directory_uri() . '/assets/js/jquery.js', [], NULL, true);
	}
	wp_enqueue_script('owlcarousel-jquery', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', [], NULL, true);
	wp_enqueue_script('chart-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js', [], NULL, true);
	wp_enqueue_script('rangeslider-js', 'https://rawgit.com/andreruffert/rangeslider.js/develop/dist/rangeslider.min.js', [], NULL, true);
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/scripts.js', [], NULL, true);
	wp_enqueue_script('register-js', get_template_directory_uri() . '/assets/js/register.js', [], NULL, true);
	wp_enqueue_script('activity-js', get_template_directory_uri() . '/assets/js/activity.js', [], NULL, true);
}
add_action('wp_enqueue_scripts', 'enqueueStyleScript', 99);


/**
 * Course custom post type added
 */
function cptFriedaCourse()
{
	$label = [
		'name' => __('Course', 'plural'),
		'singular_name' => __('Course', 'singular'),
		'menu_name' => __('Course', 'admin menu'),
		'name_admin_bar' => __('Course', 'admin bar'),
		'add_new' => __('Add New', 'add new'),
		'add_new_item' => __('Add New Course'),
		'new_item' => __('New Course'),
		'edit_item' => __('Edit Course'),
		'view_item' => __('View Course'),
		'all_items' => __('All Course'),
		'search_items' => __('Search Course'),
		'not_found' => __('No Course found.'),
	];

	$supports = [
		'title',
		'thumbnail',
		'page-attributes'
	];

	register_post_type('frieda_course', [
		'public' => true,
		'query_var' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'labels' => $label,
		'supports' => $supports,
		'menu_icon' => 'dashicons-book-alt',
		'rewrite' => [
			'slug' => 'g'
		]
	]);
}
add_action('init', 'cptFriedaCourse');

/**
 * Videos custom post type added
 */
function cptFriedaVideos()
{
	$label = [
		'name' => __('Videos', 'plural'),
		'singular_name' => __('Videos', 'singular'),
		'menu_name' => __('Videos', 'admin menu'),
		'name_admin_bar' => __('Videos', 'admin bar'),
		'add_new' => __('Add New', 'add new'),
		'add_new_item' => __('Add New Videos'),
		'new_item' => __('New Videos'),
		'edit_item' => __('Edit Videos'),
		'view_item' => __('View Videos'),
		'all_items' => __('All Videos'),
		'search_items' => __('Search Videos'),
		'not_found' => __('No Videos found.'),
	];

	$supports = [
		'title',
		'thumbnail',
		'page-attributes'
	];

	register_post_type('frieda_videos', [
		'public' => true,
		'query_var' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'labels' => $label,
		'supports' => $supports,
		'menu_icon' => 'dashicons-format-video',
		'rewrite' => [
			'slug' => 'video-cpt'
		]
	]);

	register_taxonomy(
		'video_types',
		'frieda_videos',
		array(
			'hierarchical' => true,
			'label' => 'Video Types',
			// display name
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'video',
				'with_front' => false // Don't display the category base before
			)
		)
	);

}
add_action('init', 'cptFriedaVideos');


/**
 * Insurance companies options page added
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Insurance Companies',
		'menu_slug' => 'insurance-companies',
		'menu_title' => 'Insurance Companies',
		'capability' => 'edit_posts',
		'position' => '',
		'parent_slug' => '',
		'icon_url' => 'dashicons-text-page',
		'redirect' => true,
		'post_id' => 'options',
		'autoload' => true,
		'update_button' => 'Update Companies',
		'updated_message' => 'Insurance Companies Updated!',
	]);
}


/**
 * Comman Function
 */
function generateRandomString($length = 10)
{
	$characters = 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}


/**
 * Hi biliing fields from checkout page woocommerce
 */
add_filter('woocommerce_enable_phoneorder_notes_field', '__return_false');
add_filter('woocommerce_billing_fields', 'customizeBillingFields', 100);
function customizeBillingFields($fields)
{
	if (is_checkout()) {
	}
	$chosenFields = [
		'first_name',
		'last_name',
		'address_1',
		'address_2',
		'city',
		'postcode',
		'country',
		'state',
		'phone',
		'company',
	];
	foreach ($chosenFields as $key) {
		if (isset($fields['billing_' . $key]) && $key !== 'country') {
			unset($fields['billing_' . $key]); // Remove all define fields except country
		}
	}
	return $fields;
}


/**
 * Remove woocommerce style
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * If is test user
 *
 * @param numeric $user_id User id
 *
 * @return bool
 */
function is_test_user( $user_id ) {
	return (int) get_user_meta( $user_id, '_frieda_is_test_user', true ) === 1;
}

add_action( 'template_redirect', 'logged_in_redirect' );
/**
 * Redirect user to homepage if logged from register page
 */
function logged_in_redirect() {
	$redirectTo = '';
	if ( is_user_logged_in() ) {
		if ( ! is_test_user( get_current_user_id() ) ) {
			setCourseToUserMeta( 44 );
			$userPaymentComplete = get_user_meta( get_current_user_id(), 'user_payment_complete', true );
			if ( $userPaymentComplete && ( is_page( 'register' ) || is_cart() || is_page( 'payment' ) ) ) {
				$redirectTo = site_url();
			} elseif ( is_page( 'register' ) ) {
				$redirectTo = site_url();
			} elseif ( is_cart() ) {
				$redirectTo = site_url( 'payment?add-to-cart=117' );
			} elseif ( ! is_page( 'payment' ) ) {
				if ( ! $userPaymentComplete ) {
					$redirectTo = site_url( 'payment?add-to-cart=117' );
				}
			}
		}
	} else {
		if ( get_post_type() === 'frieda_course' ) {
			$redirectTo = site_url( '/login' );
		}
		// if (is_page('login') || is_page('register') || is_page('register-confirmation') || is_cart() || is_page('payment')) {
		// } else {
		// 	print_r();
		// 	// die;
		// 	// $redirectTo = site_url('/login');
		// }
	}
	if ( $redirectTo ) {
		wp_redirect( $redirectTo );
	}
}

/**
 * Default country set US in billing fields
 */
add_filter('default_checkout_billing_country', 'change_default_checkout_country');
function change_default_checkout_country()
{
	return 'US';
}


/**
 * Woocomerce checkout set default value
 */
add_filter('woocommerce_checkout_get_value', function ($input, $key) {
	global $current_user;
	if ($key == 'billing_first_name' || $key == 'shipping_first_name') {
		return $current_user->first_name;
	} elseif ($key == 'billing_last_name' || $key == 'shipping_last_name') {
		return $current_user->last_name;
	} elseif ($key == 'billing_email') {
		return $current_user->user_email;
	} elseif ($key == 'billing_phone') {
		return $current_user->phone;
	}
}, 10, 2);


/**
 * Update User details on order completed
 */
add_action('woocommerce_payment_complete', 'so_payment_complete');
function so_payment_complete($orderId)
{
	$order = wc_get_order($orderId);
	$user = $order->get_user();
	if ($user) { 
		update_user_meta($user->ID, 'user_payment_complete', $orderId);
		setCourseToUserMeta(44, true);
	}
}


add_action('woocommerce_thankyou', '_userUpdateOnThankYou', 10, 1);
function _userUpdateOnThankYou($order_id) {
    $order = wc_get_order($order_id); //<--check this line
	$userId = get_current_user_id(); 
    $orderStatus = $order->get_status();

	sendGridUpdateDetails($userId,$orderStatus);
}



/**
 * Update all course user meta key with current post Id
 */
function updateCourseMetaIds($id, $meta)
{
	update_user_meta(get_current_user_id(), ('userCourseMetaIds' . $id), $meta);
}

if (isset($_GET['send-email'])) {
	wpSendCustom('stagingproject0@yopmail.com', 'welcomeEmail', []);
}

if (isset($_GET['reset-course'])) {
	setCourseToUserMeta(44);
}

/**
 * Update user meta for course
 */
function updateGroupUserMeta($id, $type, $val = false)
{
	$meta = 'userGroup' . $id . $type;

	if (isset($_GET['reset-course'])) {
		return delete_user_meta(get_current_user_id(),$meta);
	}

	$checkExists = get_user_meta(get_current_user_id(), $meta, true);
	if ($val) { // !$checkExists && 
		update_user_meta(get_current_user_id(), $meta, $val);
	}
	return $checkExists;
}

// setCourseToUserMeta(44);
function setCourseToUserMeta($groupId)
{
	$allUrls = [];
	$unites = [];

	// https://frieda.startbyweb.com/g/discover-your-journey/
	$allUrls[$groupId] = rtrim(get_permalink($groupId), "/");
	$mainCoursePosts = getChildPostsId($groupId);
	updateGroupUserMeta($groupId, 'startDate', strtotime("now"));
	updateGroupUserMeta($groupId, 'completedDate', false);
	updateGroupUserMeta($groupId, 'posts', json_encode($mainCoursePosts));
	updateGroupUserMeta($groupId, 'postsCount', count($mainCoursePosts));
	// https://frieda.startbyweb.com/g/discover-your-journey/intro/
	if ($mainCoursePosts && count($mainCoursePosts)) {
		$n = 0;
		foreach ($mainCoursePosts as $courseId) {
			$n++;
			$allUrls[$courseId] = rtrim(get_permalink($courseId), "/");
			$metaId = $groupId . '_' . $courseId;

			updateCourseMetaIds($courseId, $metaId);
			updateGroupUserMeta($metaId, 'startDate', $n == 1 ? strtotime("now") : null);
			updateGroupUserMeta($metaId, 'completedDate', false);

			$coursePosts = getChildPostsId($courseId);
			if ($coursePosts && count($coursePosts)) {
				updateGroupUserMeta($metaId, 'posts', json_encode($coursePosts));
				updateGroupUserMeta($metaId, 'postsCount', count($coursePosts));

				// https://frieda.startbyweb.com/g/discover-your-journey/intro/introduction/
				$n = 0;
				foreach ($coursePosts as $key => $subCourseId) {
					$unites[$courseId][] = $subCourseId;
					$n++;
					$url = get_permalink($subCourseId);
					$url = rtrim($url, "/");
					$url = explode('/',$url);
					array_pop($url);
					$allUrls[$subCourseId] = implode('/',$url).'/?parent='.$subCourseId;

					$metaId = $groupId . '_' . $courseId . '_' . $subCourseId;

					updateCourseMetaIds($subCourseId, $metaId);
					updateGroupUserMeta($metaId, 'startDate', $n == 1 ? strtotime("now") : null);
					updateGroupUserMeta($metaId, 'completedDate', false);

					$coursePosts = getChildPostsId($subCourseId);
					if ($coursePosts && count($coursePosts)) {
						updateGroupUserMeta($metaId, 'posts', json_encode($coursePosts));
						updateGroupUserMeta($metaId, 'postsCount', count($coursePosts));

						// https://frieda.startbyweb.com/g/discover-your-journey/intro/introduction/introduction-the-program/
						foreach ($coursePosts as $key => $lessonId) {
							$unites[$courseId][] = $lessonId;
							$allUrls[$lessonId] = get_permalink($lessonId);
							$allUrls[$lessonId] = rtrim(get_permalink($lessonId), "/");
							$metaId = $groupId . '_' . $courseId . '_' . $subCourseId . '_' . $lessonId;

							updateCourseMetaIds($lessonId, $metaId);
							updateGroupUserMeta($metaId, 'completedDate', false);

							$coursePosts = getChildPostsId($lessonId);
							if ($coursePosts && count($coursePosts)) {
								updateGroupUserMeta($metaId, 'posts', json_encode($coursePosts));
								updateGroupUserMeta($metaId, 'postsCount', count($coursePosts));

								// https://frieda.startbyweb.com/g/discover-your-journey/intro/introduction/introduction-the-program/cbt-approach/
								foreach ($coursePosts as $key => $activityId) {
									$unites[$courseId][] = $activityId;
									$allUrls[$activityId] = rtrim(get_permalink($activityId), "/");
									$metaId = $groupId . '_' . $courseId . '_' . $subCourseId . '_' . $lessonId . '_' . $activityId;

									updateCourseMetaIds($activityId, $metaId);
									updateGroupUserMeta($metaId, 'completedDate', false);
								}
							}
						}
					}
				}
			}
		}
	}

	update_user_meta(get_current_user_id(), 'allIdsUnderUnit', json_encode($unites));
	update_user_meta(get_current_user_id(), 'courseAllPages', array_values($allUrls));
}


/**
 * Get all child post by parent post ID
 */
function getChildPostsId($id, $associativeArray = false)
{
	$allPosts = [];
	$childPosts = new WP_Query([
		'post_type' => 'frieda_course',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $id,
		'posts_per_page' => -1,
	]);

	if ($childPosts->have_posts()) {
		foreach ($childPosts->posts as $key => $childPost) {
			if ($associativeArray) {
				$allPosts[$childPost->ID] = false;
			} else {
				$allPosts[] = $childPost->ID;
			}
		}
	}

	return $allPosts;
}

function wpSendCustom($email, $type, $data = [])
{
	global $current_user;
	wp_get_current_user();
	$data['current_user'] = $current_user;

	try {
		ob_start();

		if ($type == 'verifyEmail') {
			$subject = "Verifizierungscode für deine Kursanmeldung - Frieda";
			include('email-template/verify-email.php');
		} elseif ($type == 'forgotPassword') {
			$subject = "Passwort vergessen - Frieda";
			include('email-template/forgot-email.php');
		} elseif ($type == 'welcomeEmail') {
			$subject = "Kursanmeldung erfolgreich - Frieda";
			include('email-template/welcome-email.php');
		} elseif ($type == 'eachCourseEmail') {
			$subject = "Unit Completed Successfully - Frieda";
			$optionSlug = $data['unitId'];
			include('email-template/reminder-body.php');
		} elseif ($type == 'reminderEmail') {
			// $data = [
			// 	'userId' => 127,
			// 	'reminder' => 3,
			// 	'unitId' => 23,
			// 	'courseId' => 29
			// ];
			
			$reminder = $data['reminder'];
			if ($reminder) {
				if ($reminder == 1) {
					$subject = "1st Reminder Email - Frieda";

					$optionSlug = $data['unitId'];
					include('email-template/reminder-body.php');
				} elseif ($reminder == 2) {
					$subject = "2st Reminder Email - Frieda";

					$optionSlug = 'second_reminder_email';
					include('email-template/reminder-body.php');
				} elseif ($reminder == 3) {
					$subject = "3st Reminder Email - Frieda";

					$optionSlug = 'last_call_reminder_email';
					include('email-template/reminder-body.php');
				}
			}
		}

		if (isset($subject)) {
			$message = ob_get_contents();
			ob_end_clean();
			$headers = array(
				'Content-Type: text/html; charset=UTF-8'
			);

			$sent = wp_mail($email, $subject, $message, $headers);
		}
	} catch (\Throwable $th) {
		// throw $th;
	}
}

/**
 * User details fields added to user account
 */
add_action('show_user_profile', 'extraUserProfileFields');
add_action('edit_user_profile', 'extraUserProfileFields');
function extraUserProfileFields($user)
{
	include(get_template_directory() . '/templates/admin-user-profile.php');
}


/**
 * On activity time update saved to all parent posts
 */
add_action('post_updated', 'onPostSaveUpdate', 10, 3);
add_action('save_post', 'onPostSaveUpdate');
function onPostSaveUpdate($post_id)
{
	global $post;
	if ($post->post_type == 'frieda_course') {
		// Get Parent Post
		$currentTemplate = get_page_template_slug($post);
		if ($currentTemplate) {
			$parentPostId = $post->post_parent;
			if ($parentPostId) {
				$parentPosts = new WP_Query([
					'post_parent' => $parentPostId,
					'posts_per_page' => -1,
					'post_type' => 'frieda_course'
				]);
				if ($parentPosts->have_posts()) {
					$time = 0;
					foreach ($parentPosts->posts as $key => $parentPost) {
						$postTime = get_field('course_time', $parentPost->ID);
						if ($postTime && is_int($parentPost->ID)) {
							$time += (int) $postTime;
						}
					}
					update_post_meta($parentPostId, 'course_time', $time);

					// Get Parent 1 Post
					$getParentPostData = get_post($parentPostId);
					if ($getParentPostData && $getParentPostData->post_parent) {
						$parentChildPostID = $getParentPostData->post_parent;
						$parentChildPosts = new WP_Query([
							'post_parent' => $parentChildPostID,
							'posts_per_page' => -1,
							'post_type' => 'frieda_course'
						]);
						if ($parentChildPosts->have_posts()) {
							$time = 0;
							foreach ($parentChildPosts->posts as $key => $parentChildPost) {
								$postTime = get_post_meta($parentChildPost->ID, 'course_time', true);
								if ($postTime) {
									$time += (int) $postTime;
								}
							}
							update_post_meta($parentChildPostID, 'course_time', $time);

							// Get Parent 2 Post
							$getSubPostData = get_post($parentChildPostID);
							if ($getSubPostData && $getSubPostData->post_parent) {
								$getSubPostDataID = $getSubPostData->post_parent;

								$getParentChildPosts = new WP_Query([
									'post_parent' => $getSubPostDataID,
									'posts_per_page' => -1,
									'post_type' => 'frieda_course'
								]);
								if ($getParentChildPosts->have_posts()) {
									$time = 0;
									foreach ($getParentChildPosts->posts as $key => $getParentChildPost) {
										$postTime = get_post_meta($getParentChildPost->ID, 'course_time', true);
										if ($postTime && is_int($getParentChildPost->ID)) {
											$time += (int) $postTime;
										}
									}
									update_post_meta($getSubPostDataID, 'course_time', $time);

									// Get Parent 3 Post
									$getMainData = get_post($getSubPostDataID);
									if ($getMainData && $getMainData->post_parent) {
										$getMainDataID = $getMainData->post_parent;

										$getParentChildPosts = new WP_Query([
											'post_parent' => $getMainDataID,
											'posts_per_page' => -1,
											'post_type' => 'frieda_course'
										]);
										if ($getParentChildPosts->have_posts()) {
											$time = 0;
											foreach ($getParentChildPosts->posts as $key => $getParentChildPost) {
												$postTime = get_post_meta($getParentChildPost->ID, 'course_time', true);
												if ($postTime && is_int($getParentChildPost->ID)) {
													$time += (int) $postTime;
												}
											}
											update_post_meta($getMainDataID, 'course_time', $time);
										}
									}
								}
							}
						}
					}
				}
			}
		}
		return;
	}
}


/**
 * On User Register
 */
function onRegisterFormSubmit()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);
		$data = $_POST['formData'];
		$email = $data['email'];
		$password = $data['password'];


		$cookieExist = $_COOKIE['wordpress_sec_' . md5($email)];
		if (!isset($cookieExist) && !$cookieExist) {
			$response['msg'] = 'Verified email not matched.';
		} elseif ($cookieExist == "verified") {
			if ($data['insuranceCompany'] === 'none_of_the_above') {
				$response['status'] = true;
				$response['insuranceCompany'] = true;
			} elseif ($data['email'] && $data['address'] && $data['surname'] && $data['firstName'] && $data['insuranceCompany']) {
				$email = sanitize_text_field(wp_unslash($data['email']));
				if (email_exists($email)) {
					$response['status'] = true;
					$response['msg'] = 'E-Mail-Adresse wird bereits verwendet.';
				} else {
					$username = strstr($email, '@', true);
					if (username_exists($username)) {
						$username = $username . '_' . generateRandomString(5);
					}
					$userId = wp_create_user($username, $password, $email);
					if (!is_wp_error($userId)) {
						wpSendCustom($email, 'welcomeEmail', []);
						wp_send_new_user_notifications($userId);
						wp_clear_auth_cookie();
						wp_set_current_user($userId);
						wp_set_auth_cookie($userId);
						try {
							wp_update_user([
								'ID' => $userId,
								'first_name' => $data['firstName'],
								'last_name' => $data['surname'],
							]);
							update_user_meta($userId, 'billing_company', sanitize_text_field($data['insuranceCompany']));
							update_user_meta($userId, 'billing_city', sanitize_text_field($data['city']));
							update_user_meta($userId, 'billing_address_1', sanitize_text_field($data['address']));
							update_user_meta($userId, 'billing_address_2', sanitize_text_field($data['street']));
							update_user_meta($userId, 'billing_postcode', sanitize_text_field($data['plz']));
							update_user_meta($userId, 'billing_country', sanitize_text_field($data['country']));
							update_user_meta($userId, 'billing_state', sanitize_text_field($data['region']));
						} catch (\Throwable $th) {
							//throw $th;
						}
					}
					$response['status'] = true;
					$response['userLogin'] = true;
					$response['redirectUrl'] = site_url('payment?add-to-cart=117');
				}
			} else {
				$response['msg'] = 'All fileds required';
			}
		} else {
			$response['msg'] = 'Etwas ist schief gelaufen. Bitte versuche es erneut.';
			// print_r($response['msg']);
			// wp_die();
		}
	} else {
		$response['msg'] = 'Etwas ist schief gelaufen. Bitte versuche es erneut.';
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onRegisterFormSubmit', 'onRegisterFormSubmit');
add_action('wp_ajax_onRegisterFormSubmit', 'onRegisterFormSubmit');


/**
 * On Email Verify
 */
function onEmailVerify()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);
		$email = $_POST['email'];
		if ($email) {
			$email = sanitize_text_field(wp_unslash($email));
			if (email_exists($email)) {
				$response['status'] = false;
				$response['msg'] = 'E-Mail-Adresse wird bereits verwendet.';
			} else {
				$otp = rand(100000, 999999);
				setcookie('wordpress_sec_email_update', $email, time() + (60 * 20), "/");
				setcookie('wordpress_sec_' . md5($email), md5($otp), time() + (60 * 20), "/");

				$response['status'] = true;
				$response['msg'] = 'Verifizierungscode wurde erfolgreich gesendet.';

				wpSendCustom($email, 'verifyEmail', [
					'otp' => $otp
				]);
			}
		} else {
			$response['msg'] = 'All fileds required';
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onEmailVerify', 'onEmailVerify');
add_action('wp_ajax_onEmailVerify', 'onEmailVerify');


/**
 * on Feedback Submit
 */
function onFeedbackSubmit()
{
	global $wpdb;
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);
		$ranger = $_POST['ranger'];
		$metaId = $_POST['metaId'];
		$comment = $_POST['comment'];

		try {
			$table = $wpdb->prefix . "course_feedback";
			$wpdb->insert($table, [
				"data" => json_encode([
					'ranger' => $ranger,
					'metaId' => $metaId,
					'comment' => $comment
				]),
				"courseid" => $metaId,
				"timestamp" => time(),
				"userid" => get_current_user_id(),
			]);
			$response['status'] = true;
		} catch (\Throwable $th) {
			$response['status'] = false;
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onFeedbackSubmit', 'onFeedbackSubmit');
add_action('wp_ajax_onFeedbackSubmit', 'onFeedbackSubmit');


/**
 * On Email Verify
 */
function _onOtpSubmit()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);
		$updateEmail = $_POST['updateEmail'];
		$email = $_POST['email'];
		$otp = $_POST['otp'];
		if ($otp) {
			$oldOtp = $_COOKIE['wordpress_sec_' . md5($email)];
			if ($oldOtp) {
				$response['status'] = true;
				if (md5($otp) == $oldOtp) {
					$response['verify'] = true;
					setcookie('wordpress_sec_' . md5($email), 'verified', time() + (60 * 20), "/");
					$response['msg'] = 'Verifizierungscode bestätigt.';
					if ($updateEmail) {
						try {
							if (str_contains($_SERVER['HTTP_REFERER'], 'edit-profile/?tab=email')) {
								wp_update_user([
									'ID' => get_current_user_id(),
									'user_email' => $email
								]);
							}
							$response['msg'] = 'OTP update successfully.';
						} catch (\Throwable $th) {
							//throw $th;
						}
					}

				} else {
					$response['verify'] = false;
					$response['msg'] = 'OTP Not Matched.';
				}
			}
		} else {
			$response['msg'] = 'Etwas ist schief gelaufen. Bitte versuche es erneut.';
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv__onOtpSubmit', '_onOtpSubmit');
add_action('wp_ajax__onOtpSubmit', '_onOtpSubmit');

/**
 * On activity submit
 *
 * @param numeric $user_id User id
 * @param numeric $id Post id
 * @param array|null $quiz_answer Quiz answers info
 * @param numeric $is_tracker_from Tracker form info
 * @param array $response Response info
 */
function on_activity_submit( $user_id, $id, $quiz_answer, $is_tracker_from, &$response ) {
	$metaId = get_user_meta( $user_id, 'userCourseMetaIds' . $id, true );
	updateGroupUserMeta( $metaId, 'quizAnswer', json_encode( $quiz_answer ) );
	$isAlreadySubmitted = updateGroupUserMeta( $metaId, 'completedDate' );
	if ( $isAlreadySubmitted ) {
		$response['status'] = false;
		$response['msg']    = 'Activity Already Submitted.';
	} else {
		if ( $quiz_answer ) {
			updateGroupUserMeta( $metaId, 'quizAnswer', json_encode( $quiz_answer ) );
		}
		if ( $is_tracker_from ) {
			updateGroupUserMeta( $metaId, 'isTrackerFrom', $is_tracker_from );
		}
		updateGroupUserMeta( $metaId, 'completedDate', strtotime( "now" ) );
		$response['status'] = true;
		$response['metaId'] = $metaId;
		$response['msg']    = 'Activity Submitted Successfully.';
		updateCoruseCompletedDate( $id );
		updateMetaForEmail( $id );
		eachUnitMail( $id );
	}
}

/**
 * On Activity Submit
 */
function _onActivitySubmit()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);
		$id = $_POST['id'];
		$quizAnswer = $_POST['quizAnswer'];
		$isTrackerFrom = $_POST['isTrackerFrom'];
		if ($id) {
			on_activity_submit( get_current_user_id(), $id, $quizAnswer, $isTrackerFrom, $response );
		} else {
			$response['msg'] = 'Etwas ist schief gelaufen. Bitte versuche es erneut.';
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv__onActivitySubmit', '_onActivitySubmit');
add_action('wp_ajax__onActivitySubmit', '_onActivitySubmit');


/**
 * On Register Confirmation
 */
function registerConfirmation()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);
		setcookie('registerConfirmation', time(), (time() + 3600), "/");
		$response['redirectUrl'] = site_url('register');
		$response['status'] = true;
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_registerConfirmation', 'registerConfirmation');
add_action('wp_ajax_registerConfirmation', 'registerConfirmation');


// updateCoruseCompletedDate(29);
function updateCoruseCompletedDate($postID)
{
	// $lockTime = (86400*7); // 7 Day
	// $lockTime = 600; // 10 Minutes
	$lockTime = 60; // 1 Minute 

	$metaId = get_user_meta(get_current_user_id(), 'userCourseMetaIds' . $postID, true);
	$parentId = str_replace('_' . $postID, '', $metaId);
	$parentPosts = updateGroupUserMeta($parentId, 'posts');
	if ($parentPosts) {
		$parentPosts = json_decode($parentPosts);
		if (count($parentPosts)) {
			$done = 0;
			foreach ($parentPosts as $key => $id) {
				$completedDate = updateGroupUserMeta($parentId . '_' . $id, 'completedDate');
				if ($completedDate) {
					$done++;
				}
			}
			if ($done == count($parentPosts)) {
				$completedDate = updateGroupUserMeta($parentId, 'completedDate', strtotime("now"));
			}
		}
	}

	if ($parentId) {
		$parentIds = explode('_', $parentId);
		array_pop($parentIds);

		$parentId = implode('_', $parentIds);
		$parentPosts = updateGroupUserMeta($parentId, 'posts');
		if ($parentPosts) {
			$parentPosts = json_decode($parentPosts);
			if (count($parentPosts)) {
				$done = 0;
				foreach ($parentPosts as $key => $id) {
					$completedDate = updateGroupUserMeta($parentId . '_' . $id, 'completedDate');
					if ($completedDate) {
						$done++;
					}
				}

				if ($done == count($parentPosts)) {
					$completedDate = updateGroupUserMeta($parentId, 'completedDate', strtotime("now"));

					if ($parentId) {
						$parentIds = explode('_', $parentId);
						$childCourse = end($parentIds);
						array_pop($parentIds);

						$parentId = implode('_', $parentIds);
						$parentPosts = updateGroupUserMeta($parentId, 'posts');

						if ($parentPosts) {
							$parentPosts = json_decode($parentPosts);
							$childCourseIndex = array_search($childCourse, $parentPosts);

							$startDateMeta = $parentId . '_' . $parentPosts[$childCourseIndex];
							$startDate = updateGroupUserMeta($startDateMeta, 'startDate');
							if (strtotime("now") > $startDate + $lockTime) {
								if (array_key_exists(($childCourseIndex + 1), $parentPosts)) {
									$childCourseMeta = $parentId . '_' . $parentPosts[$childCourseIndex + 1];
									$startDate = updateGroupUserMeta($childCourseMeta, 'startDate', strtotime("now"));
								}
								if (count($parentPosts)) {
									$done = 0;
									foreach ($parentPosts as $key => $id) {
										$completedDate = updateGroupUserMeta($parentId . '_' . $id, 'completedDate');
										if ($completedDate) {
											$done++;
										}
									}

									if ($done == count($parentPosts)) {
										$completedDate = updateGroupUserMeta($parentId, 'completedDate', strtotime("now"));

										$parentIds = explode('_', $parentId);
										$childCourse = end($parentIds);
										if (count($parentIds)) {
											$parentPosts = updateGroupUserMeta($parentIds[0], 'posts');
											if ($parentPosts) {
												$parentPosts = json_decode($parentPosts);
												$childCourseIndex = array_search($childCourse, $parentPosts);

												$startDateMeta = $parentIds[0] . '_' . $parentPosts[$childCourseIndex];
												$startDate = updateGroupUserMeta($startDateMeta, 'startDate');
												if (strtotime("now") > $startDate + $lockTime) {
													if (array_key_exists(($childCourseIndex + 1), $parentPosts)) {
														$childCourseMeta = $parentIds[0] . '_' . $parentPosts[$childCourseIndex + 1];
														$startDate = updateGroupUserMeta($childCourseMeta, 'startDate', strtotime("now"));
													}
												}

											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

function createThoughtTrackerTable()
{
	global $wpdb;
	global $charset_collate;

	$tableName = $wpdb->prefix . "thought_tracker";
	$charsetCollate = $wpdb->get_charset_collate();

	if ($wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'") != $tableName) {
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta("CREATE TABLE $tableName (id INT(11) NOT NULL auto_increment,data TEXT NOT NULL,userid int(10) NOT NULL default '0',timestamp VARCHAR(15) NOT NULL,PRIMARY KEY (id))$charsetCollate;");
	}
}
add_action('init', 'createThoughtTrackerTable');

function createSymptomTrackerTable()
{
	global $wpdb;
	global $charset_collate;

	$tableName = $wpdb->prefix . "symptom_tracker";
	$charsetCollate = $wpdb->get_charset_collate();

	if ($wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'") != $tableName) {
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta("CREATE TABLE $tableName (id INT(11) NOT NULL auto_increment,data TEXT NOT NULL,userid int(10) NOT NULL default '0',timestamp VARCHAR(15) NOT NULL,PRIMARY KEY (id))$charsetCollate;");
	}
}
add_action('init', 'createSymptomTrackerTable');

function createFeedbackTable()
{
	global $wpdb;
	global $charset_collate;

	$tableName = $wpdb->prefix . "course_feedback";
	$charsetCollate = $wpdb->get_charset_collate();

	if ($wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'") != $tableName) {
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta("CREATE TABLE $tableName (id INT(11) NOT NULL auto_increment,data TEXT NOT NULL,userid int(10) NOT NULL default '0',courseid VARCHAR(50) NOT NULL,timestamp VARCHAR(15) NOT NULL,PRIMARY KEY (id))$charsetCollate;");
	}
}
add_action('init', 'createFeedbackTable');


/**
 * On Tracker Submit
 */
function onTrackerSubmit()
{
	global $wpdb;

	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		unset($_POST['action']);

		$table = $wpdb->prefix . "thought_tracker";
		if ($_POST['type'] == 'symptoms') {
			$table = $wpdb->prefix . "symptom_tracker";
		}
		try {
			$wpdb->insert($table, [
				"data" => json_encode($_POST['data']),
				"userid" => get_current_user_id(),
				"timestamp" => time(),
			]);
			$response['status'] = true;
			$response['postId'] = $wpdb->insert_id;
		} catch (\Throwable $th) {
			$response['status'] = false;
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onTrackerSubmit', 'onTrackerSubmit');
add_action('wp_ajax_onTrackerSubmit', 'onTrackerSubmit');


/**
 * On Edit Profile
 */
function onEditProfile()
{
	global $wpdb;
	$user = wp_get_current_user();
	$userId = get_current_user_id();

	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		try {
			unset($_POST['action']);
			$type = $_POST['type'];
			if ($type == 'profile') {
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				wp_update_user([
					'ID' => $userId,
					'first_name' => $fname,
					'last_name' => $lname,
				]);

				$profileImage = $_POST['profileImage'];
				if ($profileImage) {
					update_user_meta($userId, '_pUserImage', sanitize_text_field($profileImage));
				}
			} elseif ($type == 'password') {
				$oldPwd = $_POST['oldPwd'];
				$newPwd = $_POST['newPwd'];

				$userData = get_user_by('login', $user->user_login);
				$result = wp_check_password($oldPwd, $userData->user_pass, $userData->ID);
				if ($result) {
					$response['status'] = true;
					$response['result'] = $result;
					wp_set_password($newPwd, $userId);

					$response['msg'] = "Password Update Successfully.";
				} else {
					$response['status'] = false;
					$response['msg'] = "Old Password Not Matched.";
				}
			}
		} catch (\Throwable $th) {
			$response['status'] = false;
			$response['msg'] = "Etwas ist schief gelaufen. Bitte versuche es erneut.";
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onEditProfile', 'onEditProfile');
add_action('wp_ajax_onEditProfile', 'onEditProfile');


/**
 * On Delete Profile
 */
function onProfileDelete()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		try {
			$current_user = wp_get_current_user();
			if ($current_user->ID != 1) {
				wp_delete_user($current_user->ID);
				$response['status'] = true;
			}
			$response['url'] = site_url();
		} catch (\Throwable $th) {
			$response['status'] = false;
			$response['msg'] = "Etwas ist schief gelaufen. Bitte versuche es erneut.";
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onProfileDelete', 'onProfileDelete');
add_action('wp_ajax_onProfileDelete', 'onProfileDelete');

/**
 * On User Login
 */
function onUserLogin()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		try {
			$email = $_POST['email'];
			$password = $_POST['password'];
			if (!email_exists($email)) {
				$response['status'] = false;
				$response['msg'] = "Ungültige E-Mail-Adresse.";
			} else {
				$userData = get_user_by('email', $email);
				$result = wp_check_password($password, $userData->user_pass, $userData->ID);
				if ($result) {
					wp_clear_auth_cookie();
					wp_set_current_user($userData->ID);
					wp_set_auth_cookie($userData->ID);
					$response['status'] = true;
					$response['redirectUrl'] = site_url();
					$response['msg'] = "User Login Successfully.";
				} else {
					$response['status'] = false;
					$response['msg'] = "Pasword Incorrect.";
				}
			}
		} catch (\Throwable $th) {
			$response['status'] = false;
			$response['msg'] = "Etwas ist schief gelaufen. Bitte versuche es erneut.";
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onUserLogin', 'onUserLogin');
add_action('wp_ajax_onUserLogin', 'onUserLogin');

/**
 * On Password Forgot
 */
function onPasswordForgot()
{
	$response = [];
	$response['status'] = false;
	if (isset($_POST['action'])) {
		try {
			$email = $_POST['email'];
			if (!email_exists($email)) {
				$response['status'] = false;
				$response['msg'] = "Ungültige E-Mail-Adresse.";
			} else {
				$userData = get_user_by('email', $email);

				wpSendCustom($email, 'forgotPassword', [
					'userData' => $userData
				]);

				$response['status'] = true;
				$response['msg'] = "Eine Email zur Passwortrücksetzung wurde gesendet.";
			}
		} catch (\Throwable $th) {
			$response['status'] = false;
			$response['msg'] = "Etwas ist schief gelaufen. Bitte versuche es erneut.";
		}
	}
	return wp_send_json($response);
	wp_die();
}
add_action('wp_ajax_nopriv_onPasswordForgot', 'onPasswordForgot');
add_action('wp_ajax_onPasswordForgot', 'onPasswordForgot');


add_action('after_setup_theme', 'removeAdminBar');
function removeAdminBar()
{
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}

add_action('wp_logout', 'redirectAfterUserLogout');
function redirectAfterUserLogout()
{
	wp_safe_redirect(site_url('/login'));
	exit;
}

function kia_display_email_order_user_meta($order, $sent_to_admin, $plain_text){
	$userId = $order->customer_user;
	if (!empty($userId)) {
		$user = get_user_by('id', $userId);?>
		<table id="addressess" cellspacing="0" cellpadding="0" border="0"
			style="width: 100%;vertical-align: top;margin-bottom: 40px;padding: 0" width="100%">
			<tbody>
				<tr>
					<td valign="top" width="50%" style="text-align: left;font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;border: 0;padding: 0">
						<h2 style="color: #344a60;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left">Rechnungsadresse</h2>
						<address class="address" style="padding: 12px;color: #636363;border: 1px solid #e5e5e5">
							<?= $user->first_name . ' ' . $user->last_name;?><br>
							<?= $user->user_email;?>
						</address>
					</td>
				</tr>
			</tbody>
		</table>
		<style>
			#addresses {
				display : none !important;
			}
		</style>
		<?php
		echo $user->first_name . ' ' . $user->last_name;
	}
}
add_action('woocommerce_email_order_meta', 'kia_display_email_order_user_meta', 30, 3);

// SMTP Settings
// add_action( 'phpmailer_init', 'send_smtp_email' );
// function send_smtp_email( $phpmailer ) {
// 	$phpmailer->Host       = 'smtp.gmail.com';
// 	$phpmailer->SMTPAuth   = 'Yes';
// 	$phpmailer->Port       = '587';
// 	$phpmailer->Username   = 'stagingproject0@gmail.com';
// 	$phpmailer->Password   = 'jgkqzyjvcegaopor'; 
// 	$phpmailer->SMTPSecure = 'Yes';
// 	$phpmailer->From       = 'stagingproject0@gmail.com';
// 	$phpmailer->FromName   = 'Frieda';
// 	// $phpmailer->Host       = 'smtp.gmail.com';
// 	// $phpmailer->SMTPAuth   = 'Yes';
// 	// $phpmailer->Port       = '587';
// 	// $phpmailer->Username   = 'hello@frieda.health';
// 	// $phpmailer->Password   = 'qwtyeepbubcxulfc'; 
// 	// $phpmailer->SMTPSecure = 'Yes';
// 	// $phpmailer->From       = 'hello@frieda.health';
// 	// $phpmailer->FromName   = 'Frieda';
// }

/**
 * Update the order meta with field value
 */
add_action('woocommerce_order_status_changed', 'wooOrderStatusChangeCustom', 10, 3);
function wooOrderStatusChangeCustom($order_id, $old_status, $new_status) {
	$order = wc_get_order($order_id);
	$user_id = $order->get_user_id();
	
	sendGridUpdateDetails($user_id,$new_status);
	if ($new_status == 'completed') {
		update_user_meta($user_id, 'user_payment_complete', $order_id);
	} else {
		delete_user_meta($user_id, 'user_payment_complete');
	}
}

function sendGridUpdateDetails($userID,$paymentStatus){
	include(get_template_directory() . '/sendgrid/sendgrid-php.php');
	$user = get_user_by('id', $userID);
	$request_body = [
		"contacts" => [
			[
				'email' => $user->user_email,
				"first_name"=> $user->first_name,
				"last_name"=> $user->last_name,
				"custom_fields"=> [
					"e2_T" => ucwords($paymentStatus) // Payment
				],
			]
		]
	];

	try {
		$apiKey = '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';
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->marketing()->contacts()->put($request_body);
		// print $response->statusCode() . "\n";
		// print_r($response->headers());
		// print $response->body() . "\n";
	} catch (Exception $ex) {
		// echo 'Caught exception: '.  $ex->getMessage();
	}
}


function updateMetaForEmail($courseId) {
	update_user_meta(get_current_user_id(), 'lastCouserId', $courseId);
	update_user_meta(get_current_user_id(), 'lastCourseSubmittedAt', time());
	update_user_meta(get_current_user_id(), '1stEmailSend', '');
	update_user_meta(get_current_user_id(), '2stEmailSend', '');
	update_user_meta(get_current_user_id(), '3stEmailSend', '');
}

try {
	if (isset($_GET['reminder-email-cron'])) {
		sendReminderMailToEachUser();
	}
} catch (\Throwable $th) {
	//throw $th;
}

function sendReminderMailToEachUser() {
	$userIds = get_users([
		'fields' => ['ID', 'user_email']
	]);
	foreach ($userIds as $key => $user) {
		$id = $user->id;
		$email = $user->email;
		$userPaymentComplete = get_user_meta($id, 'user_payment_complete', true);
		if ($userPaymentComplete) {

			
			$lastCouserId = get_user_meta($id, 'lastCouserId', true);
			$lastCouserTime = get_user_meta($id, 'lastCourseSubmittedAt', true);
			if ($lastCouserId) {
				$metaId = get_user_meta($id, 'userCourseMetaIds' . $lastCouserId, true);
				$metaId = explode('_',$metaId);
				if (count($metaId) === 4) {
					$timeDiff = time() - $lastCouserTime; 
					$firstEmail = 180;
					$secondsEmail = 300;
					$thirdEmail = 600;

					// $daySeconds = 86400;  // 
					// $firstEmail = $daySeconds * 3;
					// $secondsEmail = $daySeconds * 5;
					// $thirdEmail = $daySeconds * 10;
					
					$reminderEmail = 0; 
					$firstEmailSend = get_user_meta($id, '1stEmailSend', true);
					$secondEmailSend = get_user_meta($id, '2stEmailSend', true);
					$thirdEmailSend = get_user_meta($id, '3stEmailSend', true);

					if (!$thirdEmailSend && $timeDiff >= $thirdEmail) {
						$reminderEmail = 3;
						update_user_meta($id, '3stEmailSend', 'done');
					} elseif (!$secondEmailSend && $timeDiff >= $secondsEmail) {
						$reminderEmail = 2;
						update_user_meta($id, '2stEmailSend', 'done');
					} elseif (!$firstEmailSend && $timeDiff >= $firstEmail) {
						$reminderEmail = 1;
						update_user_meta($id, '1stEmailSend', 'done');
					}

					wpSendCustom($email, 'reminderEmail', [
						'userId' => $id,
						'reminder' => $reminderEmail,
						'unitId' => $metaId[2],
						'courseId' => $lastCouserId,
					]);
				}
			}
		}
	}
}


function eachUnitMail($couserId) {
	$courseMetaId = get_user_meta(get_current_user_id(), 'userCourseMetaIds' . $couserId, true);
	$courseMetaId = explode('_', $courseMetaId);

	$unitId = $courseMetaId[1];
	$allIdsUnderUnit = get_user_meta(get_current_user_id(),'allIdsUnderUnit',true); 
	if ($allIdsUnderUnit) {
		$allUnits = json_decode($allIdsUnderUnit,true);
		if ($allUnits && count($allUnits)) {
			if ($allUnits[$unitId] && count($allUnits[$unitId])) {
				$isDone = 0;
				foreach ($allUnits[$unitId] as $key => $allUnit) {
					$metaId = get_user_meta(get_current_user_id(), 'userCourseMetaIds' . $allUnit, true);
					$isCompleted = updateGroupUserMeta($metaId, 'completedDate');
					if ($isCompleted) {
						$isDone++;
					}
				}
				if (count($allUnits[$unitId]) == $isDone) {
					$currentUser = wp_get_current_user();

					wpSendCustom($currentUser->user_email, 'eachCourseEmail', [
						'userId' => get_current_user_id(),
						'unitId' => $unitId
					]);
				}
			}
		}
	}
}