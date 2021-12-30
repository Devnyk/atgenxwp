<?php
/**
 * @package Leverage
 */

require_once ( get_template_directory() . '/inc/tgm-plugin-activation.php' );

function leverage_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Leverage Extra',
			'slug'               => 'leverage-extra',
			'version'            => '1.1.3',
			'source'             => 'https://dl.dropboxusercontent.com/s/icf5ri29koc23sy/leverage-extra.zip',
			'required'           => true
		),

		array(
			'name'               => 'One Click Demo Import',
			'slug'               => 'one-click-demo-import',
			'version'            => '13.0.4',
			'source'             => 'https://dl.dropboxusercontent.com/s/8jfd3etj54dswb5/one-click-demo-import.zip',
			'required'           => true
		),

		array(
			'name'               => 'Advanced Custom Fields PRO',
			'slug'               => 'advanced-custom-fields-pro',
			'version'            => '5.10.2',
			'source'             => 'https://dl.dropboxusercontent.com/s/67xnnph9d5aqdt2/advanced-custom-fields-pro.zip',
			'required'           => true
		),

		array(
			'name'               => 'ACF: Font Awesome',
			'slug'               => 'advanced-custom-fields-font-awesome',
			'version'            => '3.1.2',
			'required'           => true
		),
		
		array(
			'name'               => 'Envato Market',
			'slug'               => 'envato-market',
			'version'            => '2.0.6',
			'source'             => 'https://dl.dropboxusercontent.com/s/2zbz0agoq1ukfpg/envato-market.zip',
			'required'           => true
		),
	);

	$config = array(
		'id'           => 'leverage',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => false,
		'is_automatic' => false,
		'default_path' => false
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'leverage_register_required_plugins' );