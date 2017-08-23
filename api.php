<?php
/**
 * Helper class for simple logging commands.
 *
 * @package simple-logging
 */

/**
 * Logging class.
 *
 * Example:
 *
 * if ( $error_condition ) {
 * 	$LC_Logger->log( 'Hey, we had a problem here' );
 * }
 */
class LC_Logger {

	/**
	 * Log data.
	 *
	 * @param string/array $data The data that someone would like to log.
	 */
	public static function log( $data ) {

		$logger = new \LimeCuda\Logging\Main();
		$logger->log_data( $data );
	}
}
