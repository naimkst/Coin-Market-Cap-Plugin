<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       iTech
 * @since      1.0.0
 *
 * @package    Codex_Pro_Market_Cap
 * @subpackage Codex_Pro_Market_Cap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Codex_Pro_Market_Cap
 * @subpackage Codex_Pro_Market_Cap/public
 * @author     iTech Soft Solutions <info@itech-theme.com>
 */
class Codex_Pro_Market_Cap_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Codex_Pro_Market_Cap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codex_Pro_Market_Cap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/codex-pro-market-cap-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'codexpro-bootstrap', plugin_dir_url( __FILE__ ) . 'css/codexpro-bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'codexpro-datatables', plugin_dir_url( __FILE__ ) . 'css/codexpro-datatables.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'codexpro-style', plugin_dir_url( __FILE__ ) . 'css/codexpro-style.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Codex_Pro_Market_Cap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Codex_Pro_Market_Cap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/codex-pro-market-cap-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'codexpro-apexcharts', plugin_dir_url( __FILE__ ) . 'js/codexpro-apexcharts.min.js', array( 'jquery' ), $this->version, true );
		// wp_enqueue_script( 'codexpro-jquery', plugin_dir_url( __FILE__ ) . 'js/codexpro-jquery-3.6.0.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'codexpro-bootstrap', plugin_dir_url( __FILE__ ) . 'js/codexpro-bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'codexpro-datatables', plugin_dir_url( __FILE__ ) . 'js/codexpro-datatables.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'codexpro-main.js', plugin_dir_url( __FILE__ ) . 'js/codexpro-main.js', array( 'jquery' ), $this->version, false );

	}

}
