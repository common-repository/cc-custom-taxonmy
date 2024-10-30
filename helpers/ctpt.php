<?php
/**
 * Created by vagrant.
 * User: vagrant
 */


if (!defined('ABSPATH')) {
	return;
}

if (!function_exists('ccct_create_custom_taxonomy')) {
	function ccct_create_custom_taxonomy() {
		$custom_fields = ccct_get_option('_taxonomy_list');

		if (!empty($custom_fields)) {
			foreach ($custom_fields as $field) {
				$title 		= (isset($field['title']) && $field['title'] != '') ? $field['title'] : '';
				$name 		= (isset($field['name']) && $field['name'] != '') ? sanitize_title($field['name']) : sanitize_title($title);
				$slug		= (isset($field['slug']) && $field['slug'] != '') ? sanitize_title($field['slug']) : $name;
				$post_type	= isset($field['_post_type']) ? $field['_post_type'] : array();
				$type		= $field['type'];

				if ($type == 'category') {
					$hierarchical = true;
				} else {
					$hierarchical = false;
				}

				if (!empty($post_type)) {
					register_taxonomy($name, $post_type, array(
						'hierarchical' 		=> $hierarchical,
						'labels' 			=> array(
							'name' 				=> $title,
						),
						'show_ui' 			=> true,
						'show_admin_column' => true,
						'query_var' 		=> true,
						'rewrite' 			=> array(
							'slug'                  => $slug,
							'with_front'            => true,
							'hierarchical'          => true,
						),
					));
				}
			}
		}
	}

	add_action('init', 'ccct_create_custom_taxonomy', 1);
}