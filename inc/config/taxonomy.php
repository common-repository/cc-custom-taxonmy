<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 7/13/2019
 * Time: 9:33 PM
 */

$custom_fields	= ccct_get_option('_custom_fields');
$options      	= array();

$prefix = '_ccct_custom_options';

if (!empty($custom_fields)) {
	foreach ($custom_fields as $field) {
		$taxonomy	= $field['_taxonomy'];
		$type		= $field['type'];
		$title 		= (isset($field['title']) && $field['title'] != '') ? $field['title'] : '';
		$name 		= (isset($field['name']) && $field['name'] != '') ? sanitize_title($field['name']) : sanitize_title($title);

		CSF::createTaxonomyOptions( $prefix, array(
			'taxonomy'  => $taxonomy,
			'data_type' => 'serialize',
		));

		CSF::createSection( $prefix, array(
    		'fields' => array(
    			array(
					'title'	=> $title,
					'type'	=> $type,
					'id'	=> $name
				)
			)
		));
	}
}