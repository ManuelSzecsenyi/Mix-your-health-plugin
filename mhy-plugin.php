<?php
/*
Plugin Name: Mix your health
Plugin URI: https://marginleft.at
Description: Plugin für die Fallstudie 3 am Technikum Wien
Author: Gruppe 4.2
Version: 1.0.0
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'This is just a plugin. Nothing to do when called directly.';
	exit;
}


// Get line items.
//$line_items          = $atum_order->get_items( apply_filters( 'atum/atum_order/item_types', 'line_item' ) );
//$line_items_fee      = $atum_order->get_items( 'fee' );
//$line_items_shipping = $atum_order->get_items( 'shipping' );


function add_meta_box_supplier(){
	// Actions meta box.
	add_meta_box(
		'send-to-supplier',
		"Send to supplier",
		"meta_box_callback",
		"atum_purchase_order",
		'side',
		'high'
	);


}

function add_meta_boxes_to_page(){

	add_action( 'add_meta_boxes', 'add_meta_box_supplier' );
}


add_action( 'atum/order_post_type/init', 'add_meta_boxes_to_page' );


function meta_box_callback(){

	$id = get_the_ID();

	//$order = get_post($id);
	//print_r($order);

	// Possible solution?
	//echo wp_nonce_url( admin_url( "admin-ajax.php?action=atum_order_pdf&atum_order_id=20" ) );

	if(get_post_status($id) != "auto-draft"){

		//Get the data of the post
		print_r(get_post_meta($id));

		// Get the id from the supplier
		//$supplier = get_post_meta($id)["_supplier"][0];

		// Get supplier data
		//print_r(get_post_meta($supplier));

		//echo ($order = wc_get_order($id))  ?  "true" :  "false";
		//echo $order->get_address();



	} else{
		echo "not published";
	}
}