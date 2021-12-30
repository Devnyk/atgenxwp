<?php
/**
 * @package Leverage
 */

function leverage_import_demos() {

	function leverage_import_demos_elementor( $demo ) { 
		return array(
			'categories'               => array( 'Elementor Demos' ),
			'import_file_name'         => 'Elementor Demo ' . $demo,
			'import_file_url'          => 'https://dl.dropboxusercontent.com/s/stwv6iqtnq4s7hz/elementor-demos.xml',
			'import_widget_file_url'   => 'https://dl.dropboxusercontent.com/s/g7uw3j3ypu5203m/widgets.json',
		 	'import_preview_image_url' => get_template_directory_uri().'/assets/images/demo-' . $demo . '.jpg',
			'preview_url'              => 'https://leverage.codings.dev/home-' . $demo
    );
	}

	function leverage_import_demos_classic( $demo ) {
		return array(
			'categories'               => array( 'Classic Demos' ),
			'import_file_name'         => 'Classic Demo ' . $demo,
			'import_file_url'          => 'https://dl.dropboxusercontent.com/s/pz6krvi4y66bzsg/classic-demos.xml',
			'import_widget_file_url'   => 'https://dl.dropboxusercontent.com/s/g7uw3j3ypu5203m/widgets.json',
		 	'import_preview_image_url' => get_template_directory_uri().'/assets/images/demo-' . $demo . '.jpg',
			'preview_url'              => 'https://leverage.codings.dev/classic/home-' . $demo
    );
	}

	return array(
		leverage_import_demos_elementor(  '1' ), leverage_import_demos_classic(  '1' ),	
		leverage_import_demos_elementor(  '2' ), leverage_import_demos_classic(  '2' ),	
		leverage_import_demos_elementor(  '3' ), leverage_import_demos_classic(  '3' ),	
		leverage_import_demos_elementor(  '4' ), leverage_import_demos_classic(  '4' ),	
		leverage_import_demos_elementor(  '5' ), leverage_import_demos_classic(  '5' ),	
		leverage_import_demos_elementor(  '6' ), leverage_import_demos_classic(  '6' ),	
		leverage_import_demos_elementor(  '7' ), leverage_import_demos_classic(  '7' ),	
		leverage_import_demos_elementor(  '8' ), leverage_import_demos_classic(  '8' ),	
		leverage_import_demos_elementor(  '9' ), leverage_import_demos_classic(  '9' ),	
		leverage_import_demos_elementor( '10' ), leverage_import_demos_classic( '10' ),	
		leverage_import_demos_elementor( '11' ), leverage_import_demos_classic( '11' ),	
		leverage_import_demos_elementor( '12' ), leverage_import_demos_classic( '12' ),	
		leverage_import_demos_elementor( '13' ), leverage_import_demos_classic( '13' ),	
		leverage_import_demos_elementor( '14' ), leverage_import_demos_classic( '14' ),	
		leverage_import_demos_elementor( '15' ), leverage_import_demos_classic( '15' ),	
		leverage_import_demos_elementor( '16' ), leverage_import_demos_classic( '16' ),	
		leverage_import_demos_elementor( '17' ), leverage_import_demos_classic( '17' ),	
		leverage_import_demos_elementor( '18' ), leverage_import_demos_classic( '18' ),	
		leverage_import_demos_elementor( '19' ), leverage_import_demos_classic( '19' ),	
		leverage_import_demos_elementor( '20' ), leverage_import_demos_classic( '20' )
	);
}

add_filter( 'pt-ocdi/import_files', 'leverage_import_demos' );

function leverage_after_import( $selected ) {

	// Elementor Demos
	if ( strpos( $selected['import_file_name'], 'Elementor' ) !== false ) {
		$blog = get_page_by_title( 'Blog with sidebar and 2 columns' );
		$leverage_menu_title  = '[Leverage] Elementor Demos';
	}

	// Classic Demos
	if ( strpos( $selected['import_file_name'], 'Classic' ) !== false ) {
		$blog = get_page_by_title( 'Blog' );
		$leverage_menu_title  = '[Leverage] Classic Demos';
	}

	// Set Home Page
	$home = get_page_by_title( str_replace( [ 'Elementor Demo', 'Classic Demo' ], 'Home', $selected['import_file_name'] ) );
	update_option( 'page_on_front', $home->ID );
	update_option( 'show_on_front', 'page' );

	// Set Blog Posts
	update_option( 'page_for_posts', $blog->ID );

	// Set Menu
	$leverage_menu        = get_term_by( 'name', $leverage_menu_title, 'nav_menu' );
	$locations            = get_theme_mod( 'nav_menu_locations' );
	$locations['primary'] = $leverage_menu->term_id;
	set_theme_mod( 'nav_menu_locations', $locations );

	/* #region Fields */

		// Set Fields Data
		leverage_add_header();
		leverage_add_footer();
		leverage_add_widget();

		// Demo 1
		if ( strpos( $selected['import_file_name'], 'Demo 1' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-orange.css', // Theme Color
				'dark', // Theme Mode
				'outlined', // Button Mode
				'#111111', // Body Bg
				true,      // Body Dark Mode
				'#040402', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#040402', // Hero Bg
				true,      // Hero Dark Mode
				'#111111', // News Bg
				'#191919', // Subs Bg
				'#111111', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			); 
		}

		// Demo 2
		if ( strpos( $selected['import_file_name'], 'Demo 2' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-pink.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#f5f5f5', // Body Bg
				0,         // Body Dark Mode
				'#111111', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#111111', // Hero Bg
				true,      // Hero Dark Mode
				'#eeeeee', // News Bg
				'#e5e5e5', // Subs Bg
				'#f5f5f5', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 3
		if ( strpos( $selected['import_file_name'], 'Demo 3' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-light-blue.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#f5f5f5', // Body Bg
				0,        // Body Dark Mode
				'#111117', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#111117', // Hero Bg
				true,      // Hero Dark Mode
				'#eeeeee', // News Bg
				'#e5e5e5', // Subs Bg
				'#f5f5f5', // Form Bg
				true,      // Footer Dark Mode
				'#16161c', // Footer
				'multi-step-form' // Form Mode
			); 
		}

		// Demo 4
		if ( strpos( $selected['import_file_name'], 'Demo 4' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-orange.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#ffffff', // Body Bg
				0,        // Body Dark Mode
				'#f5f5f5', // Header Bg
				'#2f323a', // Nav Item Color
				'#2f323a', // Top Nav Item Color
				'#f5f5f5', // Hero Bg
				0,         // Hero Dark Mode
				'#e5e5e5', // News Bg
				'#f5f5f5', // Subs Bg
				'#eeeeee', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			); 

			$hero_bg_image = array(	
				'opacity_control' => 90
			);
		
			update_field( 'hero_bg_image', $hero_bg_image, 'option' );
		}

		// Demo 5
		if ( strpos( $selected['import_file_name'], 'Demo 5' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-light-blue.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#f5f5f5', // Body Bg
				0,         // Body Dark Mode
				'#111111', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#111111', // Hero Bg
				0,         // Hero Dark Mode
				'#f5f5f5', // News Bg
				'#eeeeee', // Subs Bg
				'#111111', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 6
		if ( strpos( $selected['import_file_name'], 'Demo 6' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-indigo.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#ffffff', // Body Bg
				0,     // Body Dark Mode
				'#f5f5f5', // Header Bg
				'#2f323a', // Nav Item Color
				'#2f323a', // Top Nav Item Color
				'#f5f5f5', // Hero Bg
				0,     // Hero Dark Mode
				'#f5f5f5', // News Bg
				'#f5f5f5', // Subs Bg
				'#f5f5f5', // Form Bg
				0,     // Footer Dark Mode
				'#eeeeee', // Footer
				'multi-step-form' // Form Mode
			); 

			$hero_bg_image = array(	
				'opacity_control' => 90
			);
		
			update_field( 'hero_bg_image', $hero_bg_image, 'option' );
		}

		// Demo 7
		if ( strpos( $selected['import_file_name'], 'Demo 7' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-pink.css', // Theme Color
				'dark', // Theme Mode
				'outlined', // Button Mode
				'#111111', // Body Bg
				true,      // Body Dark Mode
				'#040402', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#040402', // Hero Bg
				true,      // Hero Dark Mode
				'#040402', // News Bg
				'#111111', // Subs Bg
				'#040402', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			); 
		}

		// Demo 8
		if ( strpos( $selected['import_file_name'], 'Demo 8' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-yellow.css', // Theme Color
				'dark', // Theme Mode
				'outlined', // Button Mode
				'#111111', // Body Bg
				true,      // Body Dark Mode
				'#111111', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#040402', // Hero Bg
				true,      // Hero Dark Mode
				'#eeeeee', // News Bg
				'#e5e5e5', // Subs Bg
				'#f5f5f5', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 9
		if ( strpos( $selected['import_file_name'], 'Demo 9' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-indigo.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#f5f5f5', // Body Bg
				0,         // Body Dark Mode
				'#111111', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#111111', // Hero Bg
				true,      // Hero Dark Mode
				'#eeeeee', // News Bg
				'#e5e5e5', // Subs Bg
				'#111111', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			); 
		}

		// Demo 10
		if ( strpos( $selected['import_file_name'], 'Demo 10' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-white-blue.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#f5f5f5', // Body Bg
				0,         // Body Dark Mode
				'#1e50bc', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#1e50bc', // Hero Bg
				true,      // Hero Dark Mode
				'#eeeeee', // News Bg
				'#1e50bc', // Subs Bg
				'#f5f5f5', // Form Bg
				true,      // Footer Dark Mode
				'#16161c', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 11
		if ( strpos( $selected['import_file_name'], 'Demo 11' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-light-green.css', // Theme Color
				'dark', // Theme Mode
				'outlined', // Button Mode
				'#111111', // Body Bg
				true,      // Body Dark Mode
				'#040402', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#040402', // Hero Bg
				true,      // Hero Dark Mode
				'#040402', // News Bg
				'#111111', // Subs Bg
				'#040402', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			);  
		}

		// Demo 12
		if ( strpos( $selected['import_file_name'], 'Demo 12' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-indigo.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#ffffff', // Body Bg
				0,        // Body Dark Mode
				'#f5f5f5', // Header Bg
				'#2f323a', // Nav Item Color
				'#2f323a', // Top Nav Item Color
				'#f5f5f5', // Hero Bg
				0,         // Hero Dark Mode
				'#eeeeee', // News Bg
				'#e5e5e5', // Subs Bg
				'#f5f5f5', // Form Bg
				0,      // Footer Dark Mode
				'#eeeeee', // Footer
				'simple-form' // Form Mode
			);  

			$hero_bg_image = array(	
				'opacity_control' => 90
			);
		
			update_field( 'hero_bg_image', $hero_bg_image, 'option' );
		}

		// Demo 13
		if ( strpos( $selected['import_file_name'], 'Demo 13' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-blue.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#ffffff', // Body Bg
				0,         // Body Dark Mode
				'#f5f5f5', // Header Bg
				'#2f323a', // Nav Item Color
				'#2f323a', // Top Nav Item Color
				'#f5f5f5', // Hero Bg
				0,         // Hero Dark Mode
				'#f5f5f5', // News Bg
				'#eeeeee', // Subs Bg
				'#111111', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			);  

			$hero_bg_image = array(	
				'opacity_control' => 90
			);
		
			update_field( 'hero_bg_image', $hero_bg_image, 'option' );
		}

		// Demo 14
		if ( strpos( $selected['import_file_name'], 'Demo 14' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-yellow.css', // Theme Color
				'default', // Theme Mode
				'outlined', // Button Mode
				'#0a131a', // Body Bg
				true,      // Body Dark Mode
				'#121a21', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#0a131a', // Hero Bg
				true,      // Hero Dark Mode
				'#121a21', // News Bg
				'#192931', // Subs Bg
				'#0a131a', // Form Bg
				true,      // Footer Dark Mode
				'#121a21', // Footer
				'simple-form' // Form Mode
			);
		}

		// Demo 15
		if ( strpos( $selected['import_file_name'], 'Demo 15' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-pink.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#f5f5f5', // Body Bg
				0,         // Body Dark Mode
				'rgba(221, 30, 75, 0.75)', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#000000', // Hero Bg
				true,      // Hero Dark Mode
				'#eeeeee', // News Bg
				'#e5e5e5', // Subs Bg
				'#f5f5f5', // Form Bg
				0,      // Footer Dark Mode
				'#f9d9e0', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 16
		if ( strpos( $selected['import_file_name'], 'Demo 16' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-orange.css', // Theme Color
				'dark', // Theme Mode
				'outlined', // Button Mode
				'#111117', // Body Bg
				true,      // Body Dark Mode
				'#16161c', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#16161c', // Hero Bg
				true,      // Hero Dark Mode
				'#111117', // News Bg
				'#16161c', // Subs Bg
				'#111117', // Form Bg
				true,      // Footer Dark Mode
				'#16161c', // Footer
				'multi-step-form' // Form Mode
			); 
		}

		// Demo 17
		if ( strpos( $selected['import_file_name'], 'Demo 17' ) !== false ) {
			
			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-light-blue.css', // Theme Color
				'default', // Theme Mode
				'outlined', // Button Mode
				'#f5f5f5', // Body Bg
				0,      // Body Dark Mode
				'#251f37', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#160f29', // Hero Bg
				true,      // Hero Dark Mode
				'#160f29', // News Bg
				'#251f37', // Subs Bg
				'#1d1730', // Form Bg
				true,      // Footer Dark Mode
				'#251f37', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 18
		if ( strpos( $selected['import_file_name'], 'Demo 18' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-light-green.css', // Theme Color
				'default', // Theme Mode
				'outlined', // Button Mode
				'#f5f5f5', // Body Bg
				0,      // Body Dark Mode
				'#0a2e36', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#08181c', // Hero Bg
				true,      // Hero Dark Mode
				'#0a2e36', // News Bg
				'#08181c', // Subs Bg
				'#0a2e36', // Form Bg
				true,      // Footer Dark Mode
				'#08181c', // Footer
				'simple-form' // Form Mode
			); 
		}

		// Demo 19
		if ( strpos( $selected['import_file_name'], 'Demo 19' ) !== false ) {

			leverage_add_news_section( 'super effect-static-text' );
			leverage_add_subscribe_form( 'super effect-static-text' );
			leverage_add_simple_form( 'super effect-static-text' );
			leverage_add_multi_step_form( 'super effect-static-text' );

			leverage_add_theme_settings( 
				'css/theme-blue.css', // Theme Color
				'default', // Theme Mode
				'default', // Button Mode
				'#ffffff', // Body Bg
				0,        // Body Dark Mode
				'#f5f5f5', // Header Bg
				'#2f323a', // Nav Item Color
				'#2f323a', // Top Nav Item Color
				'#f5f5f5', // Hero Bg
				0,         // Hero Dark Mode
				'#e5e5e5', // News Bg
				'#eeeeee', // Subs Bg
				'#f5f5f5', // Form Bg
				0,      // Footer Dark Mode
				'#e5e5e5', // Footer
				'multi-step-form' // Form Mode
			); 

			$hero_bg_image = array(	
				'opacity_control' => 90
			);
		
			update_field( 'hero_bg_image', $hero_bg_image, 'option' );
		}

		// Demo 20
		if ( strpos( $selected['import_file_name'], 'Demo 20' ) !== false ) {

			leverage_add_news_section( 'simple' );
			leverage_add_subscribe_form( 'simple' );
			leverage_add_simple_form( 'simple' );
			leverage_add_multi_step_form( 'featured' );

			leverage_add_theme_settings( 
				'css/theme-white.css', // Theme Color
				'dark',    // Theme Mode
				'outline', // Button Mode
				'#191919', // Body Bg
				true,     // Body Dark Mode
				'#111111', // Header Bg
				'#f5f5f5', // Nav Item Color
				'#f5f5f5', // Top Nav Item Color
				'#111111', // Hero Bg
				true,      // Hero Dark Mode
				'#111111', // News Bg
				'#191919', // Subs Bg
				'#111111', // Form Bg
				true,      // Footer Dark Mode
				'#191919', // Footer
				'multi-step-form' // Form Mode
			); 
		}

	/* #endregion Fields */	
}

add_action( 'pt-ocdi/after_import', 'leverage_after_import' );

function ocdi_register_plugins( $plugins ) {

  $theme_plugins = [
    [
      'name'        => 'Leverage Extra',
      'slug'        => 'leverage-extra',
      'description' => __( 'This plugin includes additional settings, widgets and forms in theme.', 'leverage' ),
      'source'      => 'https://dl.dropboxusercontent.com/s/icf5ri29koc23sy/leverage-extra.zip',
      'required'    => true,
    ],
    [
      'name'        => 'Advanced Custom Fields PRO',
      'slug'        => 'advanced-custom-fields-pro',
      'description' => __( 'Responsible for the entire operation of the settings and page builder of the theme.', 'leverage' ),
      'source'      => 'https://dl.dropboxusercontent.com/s/67xnnph9d5aqdt2/advanced-custom-fields-pro.zip',
      'required'    => true,
    ],
    [
      'name'        => 'ACF: Font Awesome',
      'slug'        => 'advanced-custom-fields-font-awesome',
      'description' => __( 'Adds "Font Awesome Icon" to the settings and page builder of the theme.', 'leverage' ),
      'source'      => 'https://dl.dropboxusercontent.com/s/yeixr7886re4om4/advanced-custom-fields-font-awesome.zip',
      'preselected' => true,
    ],
		[
			'name'        => 'Elementor',
			'slug'        => 'elementor',
      'description' => __( 'The best drag and drop page builder for customizing pages.', 'leverage' ),
      'preselected' => true,
		],
		[
			'name'        => 'Contact Form 7',
			'slug'        => 'contact-form-7',
      'description' => __( 'Just another contact form plugin. Simple but flexible.', 'leverage' ),
      'preselected' => true,
		],
    [
      'name'        => 'Envato Market',
      'slug'        => 'envato-market',
      'description' => __( 'WordPress Theme & Plugin management for the Envato Market.', 'leverage' ),
      'source'      => 'https://dl.dropboxusercontent.com/s/fhvia09sorv0qy7/envato-market.zip',
      'preselected' => true,
    ]
  ];
 
  return array_merge( $plugins, $theme_plugins );
}

add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
add_filter( 'ocdi/regenerate_thumbnails_in_content_import', '__return_false' );