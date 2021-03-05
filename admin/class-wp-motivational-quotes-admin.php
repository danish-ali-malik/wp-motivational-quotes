<?php
/*
* Stop execution if someone tried to get file directly.
*/ 
if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'WP_Motivational_Quotes_Admin' ) ){

class WP_Motivational_Quotes_Admin {

	/**
	 * Constructor.
	 *
	 * Fire all required wp actions
	 *
	 * @since  1.0.0
	 */
	function __construct(){

		add_action( 'admin_menu', [
			$this,
			'register_menu'
		] );
//
//		add_action( 'wp_enqueue_scripts', [
//			$this,
//			'eff_enqueue_scripts'
//		] );

	}

	/**
	 * Register Wp Motivational Quotes menu page in dashboard
	 *
	 * @since 1.0.0
	 */
	public  function register_menu(){

		add_menu_page( __( 'WP Motivational Quotes', 'wp-motivational-quotes' ), __( 'WP Motivational Quotes', 'wp-motivational-quotes' ), 'manage_options', 'wp-motivational-quotes', [
			$this,
			'main_page',
		] );

	}

	/**
	 * Include page HTML view
	 */
	public function main_page(){

		include_once WMQ_DIR . 'admin/views/html-admin-page-wp-motivational-quotes.php';

	}


	/**
	 * Enqueue plugin styles
	 *
	 * @since  1.0.0
	 */
	public function eff_enqueue_styles() {


//		wp_register_style('easy-feedback-form', WMQ_URL . 'frontend/assets/css/easy-feedback-form.css', [], WMQ_VERSION );
//
//		wp_register_style('easy-feedback-form-list', WMQ_URL . 'frontend/assets/css/easy-feedback-form-list.css', [], WMQ_VERSION );

	}

}

new WP_Motivational_Quotes_Admin();

}