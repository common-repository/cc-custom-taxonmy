<?php
/**
 * Created by vagrant.
 * User: vagrant
 */

/*
Plugin Name: 		CC Custom Taxonmy
Plugin URI: 		http://chuyencode.com/cc-custom-taxonomy
Description: 		Plugin add unlimit taxonomy with more and more custom fields for multi post type
Version: 			1.0.1
Author: 			chuyencode
Author URI: 		http://chuyencode.com
*/

if (!defined('ABSPATH')) {
	return;
}

if (!class_exists('CC_Custom_Taxonomy')) {
	class CC_Custom_Taxonomy {
		public function __construct() {
			$this->define_constant();
			$this->load_library();
			$this->load_helper();

			add_action('init', array(__CLASS__, 'load_config'), 1);
		}

		// define constant.
		public function define_constant() {
			define('CC_CUSTOM_TAXONOMY_DIR_PATH', plugin_dir_path(__FILE__));
			define('CC_CUSTOM_TAXONOMY_DIR_URL', plugin_dir_url(__FILE__));
		}

		// load library.
		public function load_library() {
			if (!class_exists('CSF')) {
				require_once CC_CUSTOM_TAXONOMY_DIR_PATH . '/lib/codestar-framework/codestar-framework.php';
			}
		}

		// load config.
		public static function load_config() {
			require_once CC_CUSTOM_TAXONOMY_DIR_PATH . '/inc/config/framework.php';
			require_once CC_CUSTOM_TAXONOMY_DIR_PATH . '/inc/config/taxonomy.php';
		}

		// load helper.
		public function load_helper() {
			require_once CC_CUSTOM_TAXONOMY_DIR_PATH . '/helpers/ctpt.php';
			require_once CC_CUSTOM_TAXONOMY_DIR_PATH . '/helpers/helper.php';
		}
	}

	new CC_Custom_Taxonomy();
}