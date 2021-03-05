<?php
/*
* Plugin Name: WP Motivational Quotes
* Plugin URI: https://maltathemes.com/
* Description: Display random motivational quotes.
* Author: Danish Ali Malik
* Version: 1.0.0
* Author URI: https://profiles.wordpress.org/danish-ali/
* Text Domain: wp-motivational-quotes
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'wmq_fs' ) ) {
	// Create a helper function for easy SDK access.
	function wmq_fs() {
		global $wmq_fs;

		if ( ! isset( $wmq_fs ) ) {
			// Include Freemius SDK.
			require_once dirname(__FILE__) . '/freemius/start.php';

			$wmq_fs = fs_dynamic_init( array(
				'id'                  => '7819',
				'slug'                => 'wp-motivational-quotes',
				'type'                => 'plugin',
				'public_key'          => 'pk_eac7eb2a8b976eb192268908f79f8',
				'is_premium'          => false,
				'has_addons'          => false,
				'has_paid_plans'      => false,
				'menu'                => array(
					'slug'           => 'wp-motivational-quotes',
				),
			) );
		}

		return $wmq_fs;
	}

	// Init Freemius.
	wmq_fs();
	// Signal that SDK was initiated.
	do_action( 'wmq_fs_loaded' );
}

if ( !class_exists( 'WP_Motivational_Quotes' ) ) {
	class WP_Motivational_Quotes{

		/**
		 * Constructor.
		 *
		 * Fire all required wp actions
		 *
		 * @since  1.0.0
		 */
		function __construct(){

			add_action( 'init', [
				$this,
				'load'
			] );

		}

		/**
		 * Define plugin constants
		 *
		 * Include plugin files
		 *
		 * @since  1.0.0
		 */
		public function load(){

			if ( !defined( 'WMQ_VERSION' ) ) {
				define( 'WMQ_VERSION', "1.1.0" );
			}

			if ( !defined( 'WMQ_DIR' ) ) {
				define( 'WMQ_DIR', plugin_dir_path( __FILE__ ) );
			}

			if ( !defined( 'WMQ_URL' ) ) {
				define( 'WMQ_URL', plugin_dir_url( __FILE__ ) );
			}

			if ( !class_exists( 'WP_Motivational_Quotes_Admin' ) ) {
				include WMQ_DIR . 'admin/class-wp-motivational-quotes-admin.php';
			}

		}

	}
	new WP_Motivational_Quotes();
}