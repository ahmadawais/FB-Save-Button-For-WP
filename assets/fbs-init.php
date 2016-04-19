<?php
/**
 * FB Save Button Initializer
 *
 * Initializes everything for the plugin.
 *
 * @since 	1.0.0
 * @package FBS
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * WPOSA Settings Initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( FBS_DIR . '/assets/wposa/wposa-init.php' ) ) {
    require_once( FBS_DIR . '/assets/wposa/wposa-init.php' );
}


/**
 * WP_FBS Class.
 *
 * @since 1.0.0
 */
if ( file_exists( FBS_DIR . '/assets/class-fbs.php' ) ) {
	require_once( FBS_DIR . '/assets/class-fbs.php' );
}


/**
 * Actions/Filters.
 */

if ( class_exists( 'WP_FBS' ) ) {
	/**
	 * Object for `WP_FBS` class.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	$fbs_obj = new WP_FBS();

	// Hook the fb-SDK to head.
	add_action( 'wp_head', array( $fbs_obj, 'fb_sdk' ) );

	// Add Fb Save button.
	add_filter( 'the_content', array( $fbs_obj, 'add_fb_save_button' ) );


	// Register the shortcode [fbs]
	add_action( 'init', array( $fbs_obj, 'shortcode' ) );


} // class_exits() ended.

