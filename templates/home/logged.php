<?php $current_user = wp_get_current_user();?>

    <div class="welcome-section">
        <div class="container container-sm">
            <div class="welcome-section-in">
                <div class="welcome-content">
                    <h4>Welcome <?= $current_user->first_name; ?></h4>
                    <p class="gilda">Nice that you're here! <br />
                        Here you can go directly to your course</p>
                    <a href="#" class="dark-btn gilda">View Courses</a>
                </div>
                <div class="welcome-media welcome-media--woman">
                    <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/homepage/woman-hands-up.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="tracker-section">
        <div class="container container-sm">
            <div class="welcome-section-in">
                <div class="welcome-content">
                    <h5>Use Tracker</h5>
                    <p class="small gilda">
                        To use the tracker, simply enter your incident,
                        including the situation it occurred in, the intensity,
                        and how much it bothered you.<br/><br/>
                        Also note your emotions, physical sensations, thoughts,
                        and reactions to each side effect.
                    </p>
                    <a href="#" class="dark-btn gilda">View Tracker</a>
                </div>
                <div class="welcome-media welcome-media--tracker">
                    <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/homepage/tracker.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="toolbox-section">
        <div class="container container-sm">
            <div class="welcome-section-in">
                <div class="welcome-media welcome-media--toolbox">
                    <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/homepage/toolbox.png" alt="">
                </div>
                <div class="welcome-content">
                    <h5>Toolbox</h5>
                    <p class="small gilda">
                        To use the tracker, simply enter your incident,
                        including the situation it occurred in, the intensity,
                        and how much it bothered you.<br /><br/>
                        Also note your emotions, physical sensations, thoughts,
                        and reactions to each side effect.
                    </p>
                    <a href="#" class="dark-btn gilda">View Toolbox</a>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome-quote-section">
        <div class="container container-sm">
            <div class="welcome-quote-section-in">
                <div class="welcome-quote">
                    <p class="gilda welcome-quote-text">
                        <span class="welcome-quote-text-icon"></span>
                        I breathe consciously at all times and connect body and mind.
                        <span class="welcome-quote-text-icon"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

<!--

    <div class="tip-section">
        <div class="container">
            <div class="tip-blocks">
                <div class="time-wrap">
                    <div class="personname-innercontent">
                        <h4>Hallo,</h4>
                        <div class="person-wrap">
                            <?php if(get_field('welcome_section_title')){ ?>
                                <h5><?= get_field('welcome_section_title');?></h5>
                            <?php }?>
                            <span class="person-name"><?= $current_user->first_name; ?></span>
                        </div>
                    </div>
                    <p class="paragraph"><?= get_field('welcome_section_content');?></p>
                    <?php
                        $button = get_field('welcome_section_button');
                        if ($button) {
                        ?>
                        <a href="<?= $button['url']; ?>" class="dark-btn" target="<?= $button['target']; ?>"><?= $button['title']; ?></a>
                    <?php } ?>
                </div>
                <div class="tipday-wrap">
                    <?php
                        $tipSection = get_field('welcome_section_tips_section');
                        $maxTip = rand(0,(count($tipSection)-1));
                    ?>
                    <span class="sub-title"><?= $tipSection[$maxTip]['title'];?></span>
                    <span class="description"><?= $tipSection[$maxTip]['content'];?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="journey-section">
        <div class="container">
            <div class="journey-wrap">
                <?php
                    $journeyData = get_field('journey_data_rep');
                    foreach ($journeyData as $key => $data) {
                    ?>
                    <div class="journey-block">
                        <h4><?= $data['title']; ?></h4>
                        <p class="paragraph"><?= $data['content']; ?></p>
                        <a href="<?= $data['button']['url'];?>" class="white-btn" target="<?= $data['button']['target'];?>"><?= $data['button']['title'];?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php
        $moreDetails = get_field('moredetail_section');
        $key = 0;
        foreach ($moreDetails as $key => $moreDetail) {
            $key++;
        ?>
        <div class="moredetail-section <?= $key == 2 ? 'moredetailwrap' : ''; ?>">
            <div class="container">
                <div class="moredetail-wrap">
                    <h4><?= $moreDetail['title']; ?></h4>
                    <p class="paragraph"><?= $moreDetail['content']; ?></p>

                    <?php
                        $button = $moreDetail['button'];
                        if ($button) {
                        ?>
                        <a href="<?= $button['url'];?>" class="more-btn" target="<?= $button['target'];?>">
                            <span class="content"><?= $button['title'];?></span>
                            <span class="icon"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-icon.svg"/> </span>
                        </a>
                    <?php } ?>

                    <?php if($moreDetail['pdf_link']) { ?>
                        <a href="<?= $moreDetail['pdf_link'];?>" class="more-btn pdf-btn" target="_blank">
                            <span class="content">View Pdf</span>
                            <span class="icon"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-icon.svg"/> </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

-->