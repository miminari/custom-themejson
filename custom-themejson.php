<?php
/**
 * Plugin Name: Custom ThemeJSON
 * Plugin URI:
 * Description: Custom ThemeJSON
 * Version: 0.0.1
 * Author: mimi
 * Author URI:
 * Requires at least: 6.5.0
 * Tested up to: 6.5.0
 *
 * Text Domain: custom-theme-json
 * Domain Path: /languages/
 *
 * @package Custom_ThemeJSON
 * @author mimi
 */

namespace mimi\CustomThemeJSON;

defined( 'WPINC' ) || die();

if ( ! class_exists( '\mimi\CustomThemeJSON\Resister' ) ) {

	define( 'CTJSN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
	define( 'CTJSN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

	// TODO make activation check.
	if (!wp_theme_has_theme_json()) {
		var_dump( 'Theme does not support theme.json' );
	}

	require_once __DIR__ . '/inc/custom-post-type.php';
	require_once __DIR__ . '/inc/theme-json.php';
	require_once __DIR__ . '/inc/user-interface.php';

	// Register variables and the custom post type.
	\mimi\CustomThemeJSON\CustomPostType::register();

	// Add the admin pages.
	add_action(
		'plugins_loaded',
		function () {
			new UserInterface();
		}
	);

	// Temporary: Override the theme.json file with custom settings.
	// \WordCamp\CustomThemeJSON\ThemeJSON::override( __DIR__ . '/test/custom-theme.json');
	// new \WordCamp\CustomThemeJSON\ThemeJSON();

	//  $theme_json_file = \WordCamp\CustomThemeJSON\ThemeJSON::get_current_theme_json();
	//  var_dump($theme_json_file);
}
