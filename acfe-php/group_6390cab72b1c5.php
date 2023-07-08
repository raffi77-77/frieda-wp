<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6390cab72b1c5',
	'title' => 'Text + Audio - Content Tools',
	'fields' => array(
		array(
			'key' => 'field_639443e6da6f2',
			'label' => 'Course Time',
			'name' => 'course_time',
			'aria-label' => '',
			'type' => 'number',
			'instructions' => 'In Minutes',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'min' => '',
			'max' => '',
			'placeholder' => '',
			'step' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6390cab7480be',
			'label' => 'Content',
			'name' => 'text_audio_content',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'templates/content-tools-text-audio.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1673075788,
));

endif;