<?php
/**
 * Plugin Name: Custom ThemeJSON
 * Plugin URI:
 * Description: Custom ThemeJSON
 * Version: 0.0.1
 * Author: miminari
 * Author URI:
 * Requires at least: 6.5.0
 * Tested up to: 6.5.0
 *
 * Text Domain: custom-theme-json
 * Domain Path: /languages/
 *
 * @package Custom_ThemeJSON
 * @author miminari
 */

namespace miminari\CustomThemeJSON;

defined( 'WPINC' ) || die();

if ( ! class_exists( '\miminari\CustomThemeJSON\Resister' ) ) {

	define( 'CTJSN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
	define( 'CTJSN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

	// TODO make activation check.
	if (!wp_theme_has_theme_json()) {
		wp_die( 'Theme does not support theme.json' );
	}

	// require_once __DIR__ . '/classes/class-customposttype.php';
	require_once __DIR__ . '/classes/class-themejson.php';
	require_once __DIR__ . '/classes/class-userinterface.php';

	// Register variables and the custom post type.
	// \miminari\CustomThemeJSON\CustomPostType::register();

	// Add the admin pages.
	add_action(
		'plugins_loaded',
		function () {
			new UserInterface();
		}
	);
}
