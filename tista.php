<?php
/**
 * Plugin Name: Tista Assistant
 * Plugin URI: 
 * Description: Install widget and contact form
 * Version: 4.2.1
 * Author: TistaTeam
 * Author URI: 
 * Requires at least: 
 * Tested up to: 
 *
 * @package TistaTeam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Set plugin version constant. */
define( 'TISTA_ASSISTAT_VERSION', '4.2.1' );

/* Debug output control. */
define( 'TISTA_ASSISTAT_DEBUG_OUTPUT', 0 );

/* Set constant path to the plugin directory. */
define( 'TISTA_ASSISTAT_SLUG', basename( plugin_dir_path( __FILE__ ) ) );

/* Set constant path to the main file for activation call */
define( 'TISTA_ASSISTAT_CORE_FILE', __FILE__ );

/* Set constant path to the plugin directory. */
define( 'TISTA_ASSISTAT_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/* Set the constant path to the plugin directory URI. */
define( 'TISTA_ASSISTAT_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	
	if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
		// Makes sure the plugin functions are defined before trying to use them.
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}
	define( 'TISTA_ASSISTAT_NETWORK_ACTIVATED', is_plugin_active_for_network( TISTA_ASSISTAT_SLUG . '/tista.php' ) );

	/* Tista_Assistant Class */
	require_once TISTA_ASSISTAT_PATH . 'inc/class-tsta-assistant.php';

	if ( ! function_exists( 'tista_assistant' ) ) :
		/**
		 * The main function responsible for returning the one true
		 * Tista_Assistant Instance to functions everywhere.
		 *
		 * Use this function like you would a global variable, except
		 * without needing to declare the global.
		 *
		 * Example: <?php $tista_assistant = tista_assistant(); ?>
		 *
		 * @since 1.0.0
		 * @return Tista_Assistant The one true Tista_Assistant Instance
		 */
		function tista_assistant() {
			return Tista_Assistant::instance();
		}
	endif;

	/**
	 * Loads the main instance of Tista_Assistant to prevent
	 * the need to use globals.
	 *
	 * This doesn't fire the activation hook correctly if done in 'after_setup_theme' hook.
	 *
	 * @since 1.0.0
	 * @return object Tista_Assistant
	 */
	tista_assistant();