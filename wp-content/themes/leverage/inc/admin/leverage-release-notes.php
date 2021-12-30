<?php
/**
 * @package Leverage
 */

$version = wp_get_theme('leverage')->get( 'Version' );

if ( is_admin() && ! get_option( 'leverage_release_' . str_replace( '.', '_', $version ) ) ) {
    add_option( 'leverage_release_' . str_replace( '.', '_', $version ) , true );
    wp_redirect( get_admin_url() . 'admin.php?page=leverage-release-notes' );
    exit;
}

function leverage_release_notes() {
	add_menu_page( 
		'Leverage Release Notes', 
		'Leverage Release Notes', 
		'manage_options', 
		'leverage-release-notes', 
		'leverage_release_notes_page'
	);
}
add_action( 'admin_menu', 'leverage_release_notes' );

add_action( 'admin_head', function() {
	remove_menu_page( 'leverage-release-notes', 'leverage-release-notes' );
});

function leverage_release_notes_page() { $version = wp_get_theme('leverage')->get( 'Version' ); ?>

    <div id="leverage-release-notes" class="leverage-release-notes">
        <div class="wrap about__container">
            <div class="about__header">
                <div class="about__header-inner">
                    <div class="about__header-text"><?php echo __( 'Release Notes', 'leverage' ); ?></div>
                    <div class="about__header-title">
                        <p class="notranslate"> Leverage <span>2.1</span> </p>
                    </div>
                </div>
                <nav class="about__header-navigation nav-tab-wrapper wp-clearfix" aria-label="Secondary menu"> 
                    <a href="#" class="nav-tab nav-tab-active" aria-current="page"><?php echo __( 'What\'s New', 'leverage' ); ?></a> 
                    <a href="https://leverage.codings.dev/docs" target="_blank" class="nav-tab"><?php echo __( 'Documentation', 'leverage' ); ?></a> 
                    <a href="https://themeforest.net/item/leverage-agency-portfolio-creative-theme/26643749#item-description__changelog" target="_blank" class="nav-tab"><?php echo __( 'Changelog', 'leverage' ); ?></a> 
                    <a href="https://codings.dev?ref=leverage-wordpress-theme" target="_blank" class="nav-tab"><?php echo __( 'More Themes', 'leverage' ); ?></a>
                </nav>
            </div>
            <div class="about__section has-subtle-background-color has-2-columns">
                <span class="version has-absolute-right"><?php echo __( $version . ' / Sep 18, 2021', 'leverage' ); ?></span>
                <div class="column">
                    <h3><?php echo __( 'General Improvements', 'leverage' ); ?></h3>
                    <p><?php echo __( 'Fixed first slider item font size issue on mobile.', 'leverage' ); ?></p>
                    <p><?php echo __( 'Fixed WooCommerce checkout page styling issues.', 'leverage' ); ?></p>
                </div>
                <div class="column">
                    <h3><?php echo __( 'Updates', 'leverage' ); ?></h3>
                    <p><?php echo __( 'Required plugins have been updated to the latest version.', 'leverage' ); ?></p>
                </div>
            </div>
        </div>
    </div>

<?php 
}