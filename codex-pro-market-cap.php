<?php

/**
 *
 * @link              iTech
 * @since             1.0.0
 * @package           Codex_Pro_Market_Cap
 *
 * @wordpress-plugin
 * Plugin Name:       CodexPro Market Cap
 * Plugin URI:        https://itech-theme.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            iTech Soft Solutions
 * Author URI:        iTech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       codex-pro-market-cap
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CODEX_PRO_MARKET_CAP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-codex-pro-market-cap-activator.php
 */
function activate_codex_pro_market_cap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-codex-pro-market-cap-activator.php';
	Codex_Pro_Market_Cap_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-codex-pro-market-cap-deactivator.php
 */
function deactivate_codex_pro_market_cap() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-codex-pro-market-cap-deactivator.php';
	Codex_Pro_Market_Cap_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_codex_pro_market_cap' );
register_deactivation_hook( __FILE__, 'deactivate_codex_pro_market_cap' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-codex-pro-market-cap.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_codex_pro_market_cap() {

	$plugin = new Codex_Pro_Market_Cap();
	$plugin->run();

}
run_codex_pro_market_cap();

