<?php
/**
 * WP OOP Settings API
 * Description WP-OOP-Settings-API is a Settings API wrapper built with Object Oriented Programming practices.
 * Author mrahmadawais, WPTie
 * Author URI: http://AhmadAwais.com/
 * Version 1.0.0
 * License GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package WPOSA
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * WP-OOP-Settings-API Initializer
 *
 * Initializes the WP-OOP-Settings-API.
 *
 * @since 	1.0.0
 */


/**
 * Class `WP_OSA_FBS`.
 *
 * @since 1.0.0
 */
if ( file_exists( FBS_DIR . '/assets/wposa/class-wposa.php' ) ) {
    require_once( FBS_DIR . '/assets/wposa/class-wposa.php' );
}


/**
 * Actions/Filters
 *
 * Related to all settings API.
 *
 * @since  1.0.0
 */
if ( class_exists( 'WP_OSA_FBS' ) ) {
	/**
	 * Object Instantiation.
	 *
	 * Object for the class `WP_OSA_FBS`.
	 */
	$wposa_obj = new WP_OSA_FBS();

    // Section: Basic Settings.
    $wposa_obj->add_section(
    	array(
			'id'    => 'fbs_settings',
			'title' => __( 'Settings', 'FBS' ),
		)
    );


    // Posts.
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'fbs_is_posts',
			'type'    => 'checkbox',
			'name'    => __( 'Enable on Posts:', 'FBS' ),
			'desc'    => __( '(Check to enable FB Save Button on posts).', 'FBS' ),
			'default' => 0
		)
	);


    // Pages.
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'fbs_is_pages',
			'type'    => 'checkbox',
			'name'    => __( 'Enable on Pages:', 'FBS' ),
			'desc'    => __( '(Check to enable FB Save Button on pages).', 'FBS' ),
			'default' => 0
		)
	);


	// Divider
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'divider1',
			'type'    => 'html',
			'desc'    => '<hr/>',
		)
	);


    // Button size.
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'fbs_size',
			'type'    => 'radio',
			'name'    => __( 'Size of the button: ', 'FBS' ),
			'default' => 'small',
			'options' => array(
				'large' => __( 'Large', 'FBS' ),
				'small' => __( 'Small', 'FBS' ),
			),
		)
	);

	// Divider
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'divider2',
			'type'    => 'html',
			'desc'    => '<hr/>',
		)
	);

	// Is Before.
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'fbs_is_before',
			'type'    => 'checkbox',
			'name'    => __( 'Enable Before Content:', 'FBS' ),
			'desc'    => __( '(Check to enable FB Save Button before the content).', 'FBS' ),
			'default' => 0
		)
	);

	// Is After.
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'fbs_is_after',
			'type'    => 'checkbox',
			'name'    => __( 'Enable After Content:', 'FBS' ),
			'desc'    => __( '(Check to enable FB Save Button after the content).', 'FBS' ),
			'default' => 0
		)
	);

	// Divider
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'divider3',
			'type'    => 'html',
			'desc'    => '<hr/>',
		)
	);

    // Shortcode.
    $shortcode_content  = '<h3>FB Save Button Shortcode</h3>';
    $shortcode_content .= '<p>You can use <code>[fbs]</code> shortcode to add fb save button anywhere you want.</p>';
    $shortcode_content .= '<p><strong>Example Usage (Small):</strong> <code>[fbs link="http://anylink.com/" size="small"]</code></p>';
    $shortcode_content .= '<p><strong>Example Usage (Large):</strong> <code>[fbs link="http://anylink.com/" size="large"]</code></p>';
    $shortcode_content .= '<p>This can be used inside the content area where ever the shortcodes work.</p>';

    // Shortcode Field.
	$wposa_obj->add_field(
		'fbs_settings',
		array(
			'id'      => 'info',
			'type'    => 'html',
			'name'    => __( 'Shortcode [fbs]:', 'FBS' ),
			'desc'    => $shortcode_content,
		)
	);

}
