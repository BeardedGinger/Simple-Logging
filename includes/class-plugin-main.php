<?php
/**
 * Simple Logging option to report items on a specific feature.
 *
 * @package simple-logging.
 */

namespace LimeCuda\Logging;

class Main {

	/**
	 * Make the plugin run.
	 */
	public function run() {

		$this->log_data( $data );
		add_action( 'admin_menu', array( $this, 'logger_page' ) );

	}

	/**
	 * Log data to the database.
	 *
	 * @param array/string $data The information to log.
	 */
	public function log_data( $data ) {

		$log = get_option( 'lc_data_logged' ) ? get_option( 'lc_data_logged' ) : array();

		if ( ! isset( $data ) )
			return;

		if ( ! is_array( $data ) ) {
			$data = sanitize_text_field( $data );
		}

		$log[] = $data;

		update_option( 'lc_data_logged', $log );
	}

	/**
	 * The page for displaying our logged messages.
	 */
	public function logger_page() {

		add_submenu_page(
			'tools.php',
			'Simple Logging',
			'Simple Logging',
			'publish_pages',
			'lc_simple_logging',
			array( $this, 'output_log' )
		);

	}

	/**
	 * Output our log.
	 */
	public function output_log() {

		echo '<div class="page">';
		echo '<h1>Simple Logging</h1>';

		$log = get_option( 'lc_data_logged' );

		if ( $log ) {

			foreach ( $log as $log_item ) {

				echo '<li>';

				if ( is_array( $log_item ) || is_object( $log_item ) ) {
	         print_r( $log_item );
				} else {
					echo esc_attr( $log_item );
				}

				echo '</li>';

			}
		} else {
			echo 'Nothing has been logged yet.';
		}

		echo '</div>';

	}
}
