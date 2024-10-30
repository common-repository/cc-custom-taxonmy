<?php
/**
 * Created by PhpStorm.
 * User: TRUNG
 * Date: 10/27/2017
 * Time: 9:53 PM
 */

if (!defined('ABSPATH')) {
	return;
}

define('CCTT_OPTIONS', '_ccct_options');

CSF::createOptions(CCTT_OPTIONS, array(
	'framework_title'	=> esc_html__('CC Custom Taxonomy Setting', 'cct2-heleper'),
	'menu_title'		=> esc_html__('CC Taxonomy', 'cct2-helper'),
	'menu_slug'			=> 'cc-custom-taxonomy',
));

CSF::createSection(CCTT_OPTIONS, array(
	'title'		=> esc_html__('General', 'cct2-helper'),
	'icon'		=> 'fa fa-diamond',
	'id'		=> '_ccct_general',
	'fields'	=> array(
		array(
			'id'				=> '_taxonomy_list',
			'type'				=> 'group',
			'title'				=> esc_html__('Taxonomy List', 'cc-custom-taxonomy'),
			'button_title'		=> esc_html__('Add New Taxonomy', 'cc-custom-taxonomy'),
			'accordion'			=> true,
			'accordion_title'	=> esc_html__('New Taxonomy', 'cc-custom-taxonomy'),
			'fields'			=> array(
				array(
					'id'			=> 'title',
					'type'			=> 'text',
					'title'			=> esc_html__('Title', 'cc-custom-taxonomy'),
				),

				array(
					'id'			=> 'name',
					'type'			=> 'text',
					'title'			=> esc_html__('Singular Name', 'cc-custom-taxonomy'),
					'desc'			=> esc_html__('Best if used english, no space', 'cc-custom-taxonomy'),
				),

				array(
					'id'			=> 'slug',
					'type'			=> 'text',
					'title'			=> esc_html__('Slug', 'cc-custom-taxonomy'),
				),

				array(
					'id'			=> 'type',
					'chosen'		=> true,
					'type'			=> 'select',
					'title'			=> esc_html__('Type', 'cc-custom-taxonomy'),
					'options'		=> array(
						'category'	=> esc_html__('Category', 'cc-custom-taxonomy'),
						'tag'		=> esc_html__('Tag', 'cc-custom-taxonomy'),
					)
				),

				array(
					'id'			=> '_post_type',
					'type'			=> 'select',
					'title'			=> esc_html__('Post type Assign', 'cc-custom-taxonomy'),
					'options'		=> 'post_types',
					'multiple'		=> true,
					'chosen'		=> true
				),
			),
		),
	)
));

$taxonomy_opt	= array();
$list_taxonomy 	= get_taxonomies(array('public' => true,), 'objects');

foreach ($list_taxonomy as $taxonomy) {
	$taxonomy_opt[$taxonomy->name] = $taxonomy->label;
}

CSF::createSection(CCTT_OPTIONS, array(
	'title'		=> esc_html__('Custom Fields', 'cct2-helper'),
	'icon'		=> 'fa fa-diamond',
	'id'		=> '_ccct_custom_fields',
	'fields'	=> array(
		array(
			'id'				=> '_custom_fields',
			'type'				=> 'group',
			'title'				=> esc_html__('Custom Fields', 'cc-custom-taxonomy'),
			'button_title'		=> esc_html__('Add New Field', 'cc-custom-taxonomy'),
			'accordion'			=> true,
			'accordion_title'	=> esc_html__('New Field', 'cc-custom-taxonomy'),
			'fields'			=> array(
				array(
					'id'			=> '_taxonomy',
					'chosen'		=> true,
					'type'			=> 'select',
					'title'			=> esc_html__('Chosen Taxonomy', 'cc-custom-taxonomy'),
					'options'		=> $taxonomy_opt,
				),

				array(
					'id'			=> 'type',
					'chosen'		=> true,
					'type'			=> 'select',
					'title'			=> esc_html__('Type', 'cc-custom-taxonomy'),
					'options'		=> array(
						'text'			=> esc_html__('Text', 'cc-custom-taxonomy'),
						'textarea'		=> esc_html__('Textarea', 'cc-custom-taxonomy'),
						'color_picker'	=> esc_html__('Color Picker', 'cc-custom-taxonomy'),
						'image'			=> esc_html__('Image', 'cc-custom-taxonomy'),
						'icon'			=> esc_html__('Icon', 'cc-custom-taxonomy'),
						'switcher'		=> esc_html__('Switcher', 'cc-custom-taxonomy'),
						'wysiwyg'		=> esc_html__('Wysiwyg Editor', 'cc-custom-taxonomy'),
						'gallery'		=> esc_html__('Gallery', 'cc-custom-taxonomy'),
						'background'	=> esc_html__('Background', 'cc-custom-taxonomy')
					)
				),

				array(
					'id'			=> 'title',
					'type'			=> 'text',
					'title'			=> esc_html__('Title', 'cc-custom-taxonomy'),
				),

				array(
					'id'			=> 'name',
					'type'			=> 'text',
					'title'			=> esc_html__('Singular Name', 'cc-custom-taxonomy'),
					'desc'			=> esc_html__('Best if used english, no space', 'cc-custom-taxonomy'),
				),
			),
		),

		array(
			'type'		=> 'notice',
			'class'		=> 'info',
			'content'	=> _('<p>How to call custom fields in frontend</p>
				<p>Please use function <strong>ccct_get_option_taxonomy($term, $option_name)</strong></p>
				<p>$term: term id you want call</p>
				<p>$option_name: Field <strong>Singular Name</strong> in Custom Fields</p>')
		),
	)
));
