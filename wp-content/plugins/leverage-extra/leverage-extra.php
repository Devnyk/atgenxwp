<?php
/*
    Plugin Name: Leverage Extra
    Plugin URI: https://leverage.codings.dev
    Author: Codings
    Author URI: https://codings.dev
    Description: This plugin includes additional settings, widgets and forms in Leverage Theme.
    Text Domain: leverage-extra
    Domain Path: /languages
    Version: 1.1.4

    == Copyright 2021 Codings ==

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
*/

namespace LVR;

defined( 'ABSPATH' ) || die();

if ( ! defined( 'LVR_DIR' ) ) {
  define( 'LVR_DIR', plugin_dir_path( __FILE__ ) );
}

require_once( __DIR__ . '/inc/functions.php' );
require_once( __DIR__ . '/inc/support.php' );
require_once( __DIR__ . '/inc/content.php' );
require_once( __DIR__ . '/inc/style.php' );
require_once( __DIR__ . '/inc/script.php' );
require_once( __DIR__ . '/inc/widgets.php' );
require_once( __DIR__ . '/inc/portfolio.php' );
require_once( __DIR__ . '/inc/ajax-request.php' );

class leverage_base_class {

  const VERSION = '1.1.3';
  const DEVELOPMENT = false;
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '7.0';
	
	private static $_instance = null;

	public function __construct() {
			
		if ( self::DEVELOPMENT ) {
			$this->version = esc_attr( uniqid() );

		} else {
			$this->version = self::VERSION;
		}
		
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

  public function i18n() {
		load_plugin_textdomain( 'leverage-extra' );
	}

  public function init() {

		if ( ! defined( 'leverage_dir' ) ) {
			define( 'leverage_dir', plugin_dir_path( __FILE__ ) );
		}

		if ( ! in_array( wp_get_theme()->get( 'TextDomain' ), array( 'leverage', 'leverage-child' ) ) ) {
			add_action( 'admin_notices', [ $this, 'leverage_admin_notice_missing_theme' ] );
			return;
		}

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'leverage_admin_notice_missing_elementor' ] );
			return;
		}

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'leverage_admin_notice_minimum_elementor_version' ] );
			return;
		}

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'leverage_admin_notice_minimum_php_version' ] );
			return;
		}

    add_action( 'elementor/elements/categories_registered', array($this,'leverage_add_widget_category')  );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'leverage_init_widgets' ] ); 
  }
	
  public function leverage_admin_notice_missing_theme() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name, 2: Plugin version. */
			esc_html__( '%1$s plugin requires %2$s to be installed and activated.', 'leverage-extra' ),
			'<strong>' . esc_html__( 'Leverage Extra', 'leverage-extra' ) . '</strong>',
			'<a href="'. admin_url() .'themes.php?theme=leverage"><strong>' . esc_html__( 'Leverage WordPress Theme', 'leverage-extra' ) . '</strong></a>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	
  public function leverage_admin_notice_missing_elementor() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(			
			/* translators: 1: Plugin name, 2: Plugin version. */
			esc_html__( '%1$s plugin requires %2$s plugin to be installed and activated.', 'leverage-extra' ),
			'<strong>' . esc_html__( 'Leverage Extra', 'leverage-extra' ) . '</strong>',
			'<a href="'. admin_url() .'plugin-install.php?tab=plugin-information&plugin=elementor&TB_iframe=true&width=772&height=624" class="thickbox open-plugin-details-modal"><strong>' . esc_html__( 'Elementor Website Builder', 'leverage-extra' ) . '</strong></a>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
    
  public function leverage_admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name, 2: Plugin version. */
			esc_html__( '%1$s plugin requires %2$s version %3$s or greater.', 'leverage-extra' ),
			'<strong>' . esc_html__( 'Leverage Extra', 'leverage-extra' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'leverage-extra' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function leverage_admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '%1$s plugin requires %2$s version %3$s or greater.', 'leverage-extra' ),
			'<strong>' . esc_html__( 'Leverage Extra', 'leverage-extra' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'leverage-extra' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function leverage_add_widget_category( $elements_manager ) {

		$elements_manager->add_category(
			'leverage_category',
			array(
				'title' => __( 'Leverage Widgets', 'leverage-extra' ),
				'icon' => 'fa fa-plug',
			)
		);
	}

	public function leverage_init_widgets() {

		$widgets = wp_normalize_path( leverage_dir . '/widgets/*.php' );

		foreach( glob( $widgets ) as $widget ) {

			$class_name = basename( $widget, '.php' );
			$class_name = str_replace( '-', ' ', $class_name );
			$class_name = ucwords( $class_name );
			$class_name = str_replace( ' ', '_', $class_name );
			$class_name = '\LVR\Widgets\\' . $class_name;
			
			require_once( $widget );
			
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $class_name );				
		}
	}
}

$leverage_base_class_instantiated = new leverage_base_class();