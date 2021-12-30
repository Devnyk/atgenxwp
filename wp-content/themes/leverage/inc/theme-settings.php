<?php
/**
 * @package Leverage
 */

add_filter( 'acf/settings/save_json', 'leverage_acf_json_save_point' );

function leverage_acf_json_save_point( $path ) {
	$path = get_template_directory() . '/inc/acf-json';
    return $path;
}

add_filter( 'acf/settings/load_json', 'leverage_acf_json_load_point' );

function leverage_acf_json_load_point( $paths ) {
	$paths = array( get_template_directory() . '/inc/acf-json' );    
	if ( is_child_theme() ) {
		$paths[] = get_stylesheet_directory() . '/inc/acf-json';
	}
	return $paths;    
}

if ( function_exists( 'acf_add_options_page' ) && function_exists( 'acf_add_options_sub_page' ) ) {

	acf_add_options_page(array(
		'page_title' => esc_html__( 'Theme Settings', 'leverage' ),
		'menu_title' => esc_html__( 'Theme Settings', 'leverage' ),
		'menu_slug'  => 'theme-settings',
		'capability' => 'edit_posts',
		'icon_url'   => get_template_directory_uri().'/assets/images/dash-icon.png'
	) );

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Branding', 'leverage' ),
		'menu_title' => esc_html__( 'Branding', 'leverage' ),
		'menu_slug' => 'theme-settings-branding',
		'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Typography', 'leverage' ),
			'menu_title' => esc_html__( 'Typography', 'leverage' ),
			'menu_slug' => 'theme-settings-typography',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Design & Color', 'leverage' ),
			'menu_title' => esc_html__( 'Design & Color', 'leverage' ),
			'menu_slug' => 'theme-settings-design',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Header & Menu', 'leverage' ),
			'menu_title' => esc_html__( 'Header & Menu', 'leverage' ),
			'menu_slug' => 'theme-settings-header',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Footer Section', 'leverage' ),
			'menu_title' => esc_html__( 'Footer Section', 'leverage' ),
			'menu_slug' => 'theme-settings-footer',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'News Section', 'leverage' ),
			'menu_title' => esc_html__( 'News Section', 'leverage' ),
			'menu_slug' => 'theme-settings-news',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Subscribe Form', 'leverage' ),
			'menu_title' => esc_html__( 'Subscribe Form', 'leverage' ),
			'menu_slug' => 'theme-settings-subscribe',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Contact Form', 'leverage' ),
			'menu_title' => esc_html__( 'Contact Form', 'leverage' ),
			'menu_slug' => 'theme-settings-form',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Custom Feature', 'leverage' ),
			'menu_title' => esc_html__( 'Custom Feature', 'leverage' ),
			'menu_slug' => 'theme-settings-custom-feature',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Widget Builder', 'leverage' ),
			'menu_title' => esc_html__( 'Widget Builder', 'leverage' ),
			'menu_slug' => 'theme-settings-widget',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'General Settings', 'leverage' ),
			'menu_title' => esc_html__( 'General Settings', 'leverage' ),
			'menu_slug' => 'theme-settings-general',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Advanced', 'leverage' ),
			'menu_title' => esc_html__( 'Advanced', 'leverage' ),
			'menu_slug' => 'theme-settings-advanced',
			'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
			'page_title' => esc_html__( 'Support', 'leverage' ),
			'menu_title' => esc_html__( 'Support', 'leverage' ),
			'menu_slug' => 'theme-settings-support',
			'parent_slug' => 'theme-settings'
	) );
}

if ( function_exists( 'ACF' ) ) {	
	if ( get_field( 'disable_acf_item', 'option' ) ) {
		add_filter('acf/settings/show_admin', '__return_false');
	}
}