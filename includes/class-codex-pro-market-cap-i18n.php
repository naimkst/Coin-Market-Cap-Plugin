<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       iTech
 * @since      1.0.0
 *
 * @package    Codex_Pro_Market_Cap
 * @subpackage Codex_Pro_Market_Cap/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Codex_Pro_Market_Cap
 * @subpackage Codex_Pro_Market_Cap/includes
 * @author     iTech Soft Solutions <info@itech-theme.com>
 */
class Codex_Pro_Market_Cap_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'codex-pro-market-cap',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
