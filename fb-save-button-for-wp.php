<?php
/**
 * Plugin Name: FB Save Button for WP
 * Plugin URI: https://github.com/WPTie/FB-Save-Button-For-WP
 * Description: Adds Facebook save button to your WordPress site.
 * Author: mrahmadawais, WPTie
 * Author URI: http://AhmadAwais.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package FBS
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'FBS_VERSION' ) ) {
    define( 'FBS_VERSION', '1.0.0' );
}

if ( ! defined( 'FBS_NAME' ) ) {
    define( 'FBS_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined('FBS_DIR' ) ) {
    define( 'FBS_DIR', WP_PLUGIN_DIR . '/' . FBS_NAME );
}

if ( ! defined('FBS_URL' ) ) {
    define( 'FBS_URL', WP_PLUGIN_URL . '/' . FBS_NAME );
}

/**
 * Plugin Initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( FBS_DIR . '/assets/fbs-init.php' ) ) {
    require_once( FBS_DIR . '/assets/fbs-init.php' );
}
