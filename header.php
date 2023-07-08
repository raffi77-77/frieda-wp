<?php
include(get_template_directory() . '/head-common.php');
?>

<header id="header" class="header-wrap">
	<?php
	$logo = get_stylesheet_directory_uri().'/assets/images/logo-new.svg';
	$headerLogo = get_field('to_header_logo', 'options');
	if ($headerLogo) {
		$logo = $headerLogo['url'];
	}
	?>

	<div class="container">
		<!-- Homepage header -->
		<?php if(is_user_logged_in()) { ?>
			<!-- Inner Page Header -->
			<div class="header-content">
				<div class="header-logo">
					<a href="\">
						<img src="<?= $logo; ?>"/>
					</a>
				</div>
				<div class="header-menu header-innermenu">
					<span class="header-m-closebtn">&times;</span>
					<div class="userlogin mbilelogin">
					<div class="user-content">
						<a class="login" href="javascript:void(0)">
							<span class="user-content">
								<span class="user-image">
									<?php
										if ($isUserImgExists) {
											echo '<img class="header-profile-pic" src="'.$isUserImgExists.'" / >';
										} else {
											echo get_avatar($user->ID,35);
										}
									?>
								</span>
								<span class="user-name"><?= $user->user_firstname;?></span> 
							</span>
						</a>
					</div>
					<div class="logout">
						<a class="edit-profile" href="<?= site_url('edit-profile'); ?>" style="display: block; padding: 10px;">
							<span class="content">Profil ändern</span>
						</a>
						<a class="logout-link" href="<?= wp_logout_url(); ?>" style="display: block; padding: 10px;">
							<span class="content">Abmelden</span>
						</a>
					</div>
				</div>
					<?php wp_nav_menu(['theme_location' => 'header_menu']); ?>
				</div>
				<?php
					$user = wp_get_current_user();
					$isUserImgExists = get_user_meta($user->ID,'_pUserImage',true);
				?>
				<div class="userlogin">
					<div class="user-content">
						<a class="login" href="javascript:void(0)">
							<span class="user-content">
								<span class="user-image">
									<?php
										if ($isUserImgExists) {
											echo '<img class="header-profile-pic" src="'.$isUserImgExists.'" / >';
										} else {
											echo get_avatar($user->ID,35);
										}
									?>
								</span>
								<span class="user-name"><?= $user->user_firstname;?></span> 
							</span>
						</a>
					</div>
					<div class="logout">
						<a class="edit-profile" href="<?= site_url('edit-profile'); ?>" style="display: block; padding: 10px;">
							<span class="content">Profil ändern</span>
						</a>
						<a class="logout-link" href="<?= wp_logout_url(); ?>" style="display: block; padding: 10px;">
							<span class="content">Abmelden</span>
						</a>
					</div>
				</div>
				<span class="header-m-open" style="font-size:30px;cursor:pointer">&#9776;</span>
			</div>
		<?php } else { ?>
			<div class="header-content">
				<div class="header-logo">
					<a href="\">
						<img src="<?= $logo; ?>"/>
					</a>
				</div>
				<div class="header-menu home-menu">
					<span class="header-m-closebtn">&times;</span>
					<?php wp_nav_menu(['theme_location' => 'guest_menu']); ?>
				</div>
				<div class="headlogin-wrap">
					<a href="/login" class="login-btn dark-btn">Login</a>
				</div>
				<span class="header-m-open" style="font-size:30px;cursor:pointer">&#9776;</span>
			</div>
		<?php } ?>
	</div>
</header>	