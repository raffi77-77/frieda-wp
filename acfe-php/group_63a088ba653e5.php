<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63a088ba653e5',
	'title' => 'Homepage - Logged User',
	'fields' => array(
		array(
			'key' => 'field_63a088bac7796',
			'label' => 'Welcome Section',
			'name' => '',
			'aria-label' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_63a08911c7797',
			'label' => 'Title',
			'name' => 'welcome_section_title',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_63a08945c7798',
			'label' => 'Content',
			'name' => 'welcome_section_content',
			'aria-label' => '',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'acfe_textarea_code' => 0,
			'maxlength' => '',
			'rows' => 3,
			'placeholder' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_63a0895ac7799',
			'label' => 'Button',
			'name' => 'welcome_section_button',
			'aria-label' => '',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		array(
			'key' => 'field_63a08990c779b',
			'label' => 'Tips Section',
			'name' => 'welcome_section_tips_section',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 1,
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_63a089a8c779c',
					'label' => 'Title',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_63a08990c779b',
				),
				array(
					'key' => 'field_63a47211f4233',
					'label' => 'Content',
					'name' => 'content',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_63a08990c779b',
				),
			),
		),
		array(
			'key' => 'field_63a08a2eabbc3',
			'label' => 'Journey Section',
			'name' => '',
			'aria-label' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_63a08a3cabbc4',
			'label' => 'Journey Data',
			'name' => 'journey_data_rep',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 1,
			'layout' => 'block',
			'pagination' => 0,
			'min' => 2,
			'max' => 2,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_63a08a63abbc5',
					'label' => 'Title',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_63a08a3cabbc4',
				),
				array(
					'key' => 'field_63a08a6aabbc6',
					'label' => 'Content',
					'name' => 'content',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'acfe_textarea_code' => 0,
					'maxlength' => '',
					'rows' => 3,
					'placeholder' => '',
					'new_lines' => '',
					'parent_repeater' => 'field_63a08a3cabbc4',
				),
				array(
					'key' => 'field_63a08a76abbc7',
					'label' => 'Button',
					'name' => 'button',
					'aria-label' => '',
					'type' => 'link',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'parent_repeater' => 'field_63a08a3cabbc4',
				),
			),
		),
		array(
			'key' => 'field_63a08a9f6e9df',
			'label' => 'More-detail Section',
			'name' => '',
			'aria-label' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_63a08ab66e9e0',
			'label' => 'MoreDetail Section',
			'name' => 'moredetail_section',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_repeater_stylised_button' => 1,
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_63a08ad46e9e1',
					'label' => 'Title',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_63a08ab66e9e0',
				),
				array(
					'key' => 'field_63a08adb6e9e2',
					'label' => 'Content',
					'name' => 'content',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'acfe_textarea_code' => 0,
					'maxlength' => '',
					'rows' => 3,
					'placeholder' => '',
					'new_lines' => '',
					'parent_repeater' => 'field_63a08ab66e9e0',
				),
				array(
					'key' => 'field_63a08af06e9e3',
					'label' => 'Button',
					'name' => 'button',
					'aria-label' => '',
					'type' => 'link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'parent_repeater' => 'field_63a08ab66e9e0',
				),
				array(
					'key' => 'field_63a47704287ed',
					'label' => 'PDF File',
					'name' => 'pdf_link',
					'aria-label' => '',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'uploader' => '',
					'return_format' => 'url',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
					'library' => 'all',
					'parent_repeater' => 'field_63a08ab66e9e0',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/home.php',
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
	'modified' => 1678958676,
));

endif;