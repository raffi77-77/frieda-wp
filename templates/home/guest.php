<div class="header-padding homepage flex flex-col justify-start align-stretch">
    <div class="homepage-banner" style="background-image: url(<?= esc_url(get_field('hero_section_image'))?>)">
        <div class="container">
            <div class="homepage-banner-content flex flex-col justify-start align-stretch">
                <h3 class="roboto"><?= esc_html(get_field('hero_section_tagline'))?></h3>
                <h2 class="gilda"><?= esc_html( get_field( 'hero_section_title' ) ) ?></h2>
                <p class="roboto"><?= esc_html( get_field( 'hero_section_content' ) ) ?></p>
            </div>
        </div>
    </div>
    <div class="homepage-promo-wrap">
        <div class="container">
            <?php
            $home_info_list = get_field('home_info_list');
            ?>
            <div class="homepage-promo flex justify-start align-start">
	            <?php if ( ! empty( $home_info_list ) && is_array( $home_info_list ) ): ?>
		            <?php foreach ( $home_info_list as $info_list ): ?>
                        <div class="grow-1 w-full">
                            <div class="homepage-promo-block flex justify-start align-start">
                                <div class="homepage-promo-block-icon">
                                    <img src="<?= esc_url( $info_list['image'] ) ?>" alt="">
                                </div>
                                <div class="homepage-promo-block-content flex flex-col justify-start align-stretch">
                                    <h2 class="gilda"><?= esc_html( $info_list['title'] ) ?></h2>
                                    <p class="roboto"><?= esc_html( $info_list['content'] ) ?></p>
                                </div>
                            </div>
                        </div>
		            <?php endforeach ?>
	            <?php endif ?>
            </div>
        </div>
    </div>
    <div class="homepage-list-wrap flex flex-col justify-start align-stretch">
        <div class="container flex flex-col justify-start align-stretch">
            <h2 class="homepage-list-wrap-title gilda"><?= esc_html( get_field( 'discover_title' ) ) ?></h2>
        </div>
        <div class="container">
	        <?php
	        $discover_labels = get_field( 'discover_labels' );
	        $discover_images = get_field( 'discover_images' );
            ?>
            <div class="homepage-list-container flex justify-start align-center">
                <div class="homepage-list grow-1 flex flex-col justify-start align-stretch">
		            <?php if ( ! empty( $discover_labels ) && is_array( $discover_labels ) ): ?>
			            <?php foreach ( $discover_labels as $label_arr ): ?>
                            <div class="homepage-list-item roboto"><span>✔</span> <?= esc_html($label_arr['label'])?></div>
			            <?php endforeach ?>
		            <?php endif ?>
                </div>
                <div class="homepage-slider-wrap grow-1">
                    <div class="homepage-slider flex owl-carousel" id="homepage-slides">
			            <?php if ( ! empty( $discover_images ) && is_array( $discover_images ) ): ?>
				            <?php foreach ( $discover_images as $image_arr ): ?>
                                <div class="homepage-slider-item">
                                    <img src="<?= esc_url( $image_arr['image'] ) ?>" alt="">
                                </div>
				            <?php endforeach ?>
			            <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage-steps-wrap">
        <div class="container">
            <div class="flex flex-col justify-start align-stretch">
                <h2 class="homepage-steps-wrap-title"><?= esc_html( get_field( 'course_steps_title' ) ) ?></h2>
                <div class="homepage-steps flex justify-center align-start">
		            <?php $course_steps = get_field( 'course_steps' ); $i = 1; ?>
		            <?php if ( ! empty( $course_steps ) && is_array( $course_steps ) ): ?>
			            <?php foreach ( $course_steps as $steps ): ?>
                            <div class="homepage-steps-item flex flex-col justify-start align-center">
                                <div class="homepage-steps-count gilda"><?= esc_html( $i ) ?></div>
                                <div class="homepage-steps-text roboto"><?= esc_html( $steps['title'] ) ?></div>
                            </div>
				            <?php $i ++; ?>
			            <?php endforeach ?>
		            <?php endif ?>
                </div>
	            <?php $course_steps_button = get_field( 'course_steps_button' ) ?>
	            <?php if ( ! empty( $course_steps_button ) && is_array( $course_steps_button ) ): ?>
                    <div class="flex justify-center align-center">
                        <a href="<?= esc_url( $course_steps_button['url'] ) ?>" target="<?= esc_attr( $course_steps_button['target'] ) ?>" class="homepage-button roboto"><?= esc_html( $course_steps_button['title'] ) ?></a>
                    </div>
	            <?php endif ?>
            </div>
        </div>
    </div>
    <div class="homepage-experts-wrap">
        <div>
            <div class="container flex flex-col justify-start align-stretch">
                <h2 class="homepage-experts-wrap-title gilda"><?= esc_html( get_field( 'oe_title' ) ) ?></h2>
                <p class="homepage-experts-wrap-subtitle roboto"><?= get_field( 'oe_description' ) ?></p>
            </div>
        </div>
        <div class="homepage-experts-bg">
            <div class="container">
                <?php $our_experts = get_field('oe_list') ?>
                <div class="homepage-experts flex justify-start align-center">
	                <?php if ( ! empty( $our_experts ) && is_array( $our_experts ) ): ?>
		                <?php foreach ( $our_experts as $expert_arr ): ?>
                            <div class="homepage-experts-item">
                                <img class="homepage-experts-item-img" src="<?= esc_url($expert_arr['image']) ?>" alt="">
                                <div class="homepage-experts-item-text">
                                    <h2 class="gilda"><?= esc_html($expert_arr['name']) ?></h2>
                                    <p class="roboto"><?= esc_html( $expert_arr['profession'] ) ?></p>
                                </div>
                            </div>
		                <?php endforeach ?>
	                <?php endif ?>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="homepage-social-wrap">-->
<!--        <div class="container">-->
<!--            <div class="flex flex-col justify-start align-stretch">-->
<!--                <h2 class="homepage-social-wrap">Folge uns auf Instagram und hole dir tägliche Inspirationen</h2>-->
<!--                <div class="flex justify-between align-center">-->
<!--                    <span class="homepage-social-name">frieda.health</span>-->
<!--                    <div class="tooltip-holder tooltip-holder__bottom">-->
<!--                        <a class="instagram-button" href="https://www.instagram.com/frieda.health/" target="_blank">-->
<!--                            <svg width="16" height="16" viewBox="0 0 24 24">-->
<!--                                <path d="M13.156.008c2.223.004 2.677.021 3.786.072 1.277.058 2.15.26 2.912.557a5.88 5.88 0 012.125 1.384 5.88 5.88 0 011.384 2.125c.296.763.499 1.635.557 2.912.055 1.194.07 1.63.072 4.331v1.23c-.002 2.701-.017 3.137-.072 4.33-.058 1.278-.26 2.15-.557 2.913a5.88 5.88 0 01-1.384 2.125 5.88 5.88 0 01-2.125 1.383c-.763.297-1.635.5-2.912.558-1.194.054-1.63.07-4.331.072h-1.23c-2.701-.002-3.137-.018-4.33-.072-1.278-.058-2.15-.261-2.913-.558a5.88 5.88 0 01-2.125-1.383A5.88 5.88 0 01.63 19.862c-.297-.763-.5-1.635-.558-2.912-.05-1.11-.068-1.564-.071-3.786v-2.32C.004 8.62.02 8.167.072 7.058.13 5.78.333 4.908.63 4.146A5.88 5.88 0 012.013 2.02 5.88 5.88 0 014.138.637C4.901.341 5.773.138 7.05.08 8.16.03 8.614.012 10.836.008zm-.28 2.161h-1.76c-2.408.003-2.829.018-3.967.07-1.17.053-1.805.249-2.228.413-.56.218-.96.478-1.38.897-.419.42-.679.82-.897 1.38-.164.422-.36 1.058-.413 2.227-.052 1.139-.067 1.56-.07 3.968v1.76c.003 2.408.018 2.829.07 3.967.054 1.17.25 1.805.413 2.228.218.56.478.96.898 1.38.42.419.82.679 1.38.897.422.164 1.057.36 2.227.413 1.096.05 1.527.065 3.708.069h2.279c2.18-.004 2.612-.02 3.708-.07 1.17-.053 1.805-.248 2.227-.412.56-.218.96-.478 1.38-.898.42-.42.68-.82.897-1.38.164-.422.36-1.057.413-2.227.05-1.096.066-1.527.07-3.708v-2.279c-.004-2.18-.02-2.611-.07-3.708-.053-1.17-.249-1.805-.413-2.227a3.716 3.716 0 00-.897-1.38c-.42-.42-.82-.68-1.38-.897-.422-.164-1.058-.36-2.227-.413-1.139-.052-1.56-.067-3.968-.07zm-.88 3.675a6.16 6.16 0 110 12.32 6.16 6.16 0 010-12.32zm0 2.161a3.999 3.999 0 100 7.998 3.999 3.999 0 000-7.998zM18.4 4.161a1.44 1.44 0 110 2.879 1.44 1.44 0 010-2.88z" fill="current" fill-rule="evenodd"></path>-->
<!--                            </svg>-->
<!--                            <span>Abonnieren</span>-->
<!--                        </a>-->
<!--                        <div class="tooltip tooltip__bottom tooltip__right">-->
<!--                            <span>Dadurch wird Instagram in einem neuen Tab geöffnet.</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>