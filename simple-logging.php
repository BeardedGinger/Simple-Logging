<?php
/**
 * Plugin Name: Simple Logging
 * Plugin URI:  https://ccef.org
 * Description: Simple logging plugin
 * Author:      LimeCuda
 * Version:     0.1.0
 * Author URI:  https://limecuda.com
 *
 * @package simple-logging
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! defined( 'LC_SIMPLE_LOGGING_VERSION' ) ) {
	define( 'LC_SIMPLE_LOGGING_VERSION', '0.1.0' );
}
if ( ! defined( 'LC_SIMPLE_LOGGING_PLUGIN_DIR' ) ) {
	define( 'LC_SIMPLE_LOGGING_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'LC_SIMPLE_LOGGING_PLUGIN_URL' ) ) {
	define( 'LC_SIMPLE_LOGGING_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

add_action( 'plugins_loaded', 'lc_simple_logging_init' );
/**
 * Get our plugin running.
 */
function lc_simple_logging_init() {

		require_once( LC_SIMPLE_LOGGING_PLUGIN_DIR . '/includes/class-plugin-main.php' );

		$lc_simple_logging = new LimeCuda\Logging\Main();
		$lc_simple_logging->run();

		require_once( LC_SIMPLE_LOGGING_PLUGIN_DIR . '/api.php' );

}
