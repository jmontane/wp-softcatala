<?php

namespace Softcatala\Widgets;

/**
 * Displays stats for Catalanitzador
 */
class CatalanitzadorStats extends \WP_Widget {

	const STATS_URL = 'https://www.softcatala.org/catalanitzador/response.php';

	const TRANSIENT_NAME = 'total_catalanitzador_sessions';

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$widget_ops = array(
			'classname' => 'catalanitzador_stats',
			'description' => 'Estadístiques del Catalanitzador',
		);
		parent::__construct( 'catalanitzador_stats', 'Estadístiques del Catalanitzador', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args arguments for the widget.
	 * @param array $instance widget's instance.
	 */
	public function widget( $args, $instance ) {

		$sessions = $this->get_total_catalanitzador_sessions();

		if ( false !== $sessions ) {
			\Timber\Timber::render( 'widgets/catalanitzador_stats.twig', array( 'sessions' => number_format( $sessions,0,',','.' ) ) );
		}
	}

	private function get_total_catalanitzador_sessions() {

		$stored_sessions = get_transient( self::TRANSIENT_NAME );

		if ( false === $stored_sessions ) {

			$stored_sessions = $this->fetch_remote_sessions();

			if ( false !== $stored_sessions ) {
				set_transient( self::TRANSIENT_NAME, $stored_sessions, DAY_IN_SECONDS );
			}
		}

		return $stored_sessions;
	}

	private function fetch_remote_sessions() {
		$rest_client = new \SC_RestClient();

		$result = $rest_client->get( self::STATS_URL );

		if ( 200 == $result['code'] ) {

			$sessions = $result['result'];

			if ( is_numeric( $sessions ) ) {
				return $sessions;
			}
		}

		return false;
	}
}
