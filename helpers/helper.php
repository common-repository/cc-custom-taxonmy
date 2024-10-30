<?php
/**
 * Created by vagrant.
 * User: vagrant
 */

if (!defined('ABSPATH')) {
	return;
}

if (!function_exists('ccct_get_option')) {
	function ccct_get_option($option_name = '', $default = '') {
		$options = get_option('_ccct_options');

		if (!empty($option_name) && !empty($options[$option_name])) {
			return $options[$option_name];
		} else {
			return (!empty($default)) ? $default : null;
		}

	}
}

if (!function_exists('ccct_get_option_taxonomy')) {
	function ccct_get_option_taxonomy($term, $name) {
		$option_name 	= '_ccct_custom_options';
		$term_data 		= get_term_meta($term, $option_name, true);

		if (!empty($term_data) && isset($term_data[$name])) {
			return $term_data[$name];
		} else {
			return false;
		}
	}
}
