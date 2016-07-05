<?php

/* All post fields, Key => Name */
$ina_list = array(
	'type' => 'Type',
	'dealer_id' => '',
	'dealer_name' => 'Dealer Name',
	'stock' => 'Stock',
	'vin' => 'VIN',
	'year' => 'Year',
	'make' => 'Make',
	'model' => 'Model',
	'body' => 'Body',
	'trim' => 'Trim',
	'model_number' => 'Model Number',
	'doors' => 'Doors',
	'exterior_color' => 'Exterior Color',
	'interior_color' => 'Interior Color',
	'engine_cylinders' => 'Engine Cylinders',
	'engine_displacement' => 'Endine Displacement',
	'transmission' => 'Transmission',
	'miles' => 'Miles',
	'price' => 'Price',
	'msrp' => 'MSRP',
	'book_value' => 'Book Value',
	'invoice' => 'Invoice',
	'certified' => 'Certified',
	'date_in_stock' => 'Date in Stock',
	'description' => 'Description',
	'options' => 'Options',
	'categorized_options' => 'Options',
	'_features' => 'Options' // will be an array from "categorized_options"
	//'images_list',
);

/**
* Load all defined in $ina_list custom post fields by post_id
*
* @param mixed $post_id
*/
function ina_load_fields($post_id) {
	global $ina_list;
	$fields = array();
	// all available data
	foreach ($ina_list as $name => $value) {
		$fields[$name] = get_post_meta($post_id, 'ina_' . $name, true);
		// fix values
		if ( 'certified' == $name ) {
			$fields[$name] = (false == strtolower($fields[$name])) ? 'No' : 'Yes';
		}
	}
	// load options from "feature" taxonomy
	$fields[ '_features' ] = array();
	if ($taxonomy = get_the_terms($post_id, 'features')) {
		foreach ($taxonomy as $taxonomy_term) {
			$fields[ '_features' ][] = $taxonomy_term->name;
		}
	}
	//	var_dump($fields);
	return $fields;
}

add_action( 'after_setup_theme', 'childtheme_formats', 11 );
function childtheme_formats(){
	 //add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link' ) );
	 add_theme_support('post-formats', array('inacar'));
}
