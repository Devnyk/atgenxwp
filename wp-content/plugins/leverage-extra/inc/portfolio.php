<?php
/**
 * @package Leverage Extra
 */

function leverage_portfolio_register_post_type() {

    $labels = array(
        'name'                  => __( 'Portfolio', 'leverage-extra' ),
        'singular_name'         => __( 'Project', 'leverage-extra' ),
        'menu_name'             => __( 'Portfolio', 'leverage-extra' ),
        'all_items'             => __( 'All Projects', 'leverage-extra' ),
        'add_new'               => __( 'Add New', 'leverage-extra' ),
        'add_new_item'          => __( 'Add New Portfolio Project', 'leverage-extra' ),
        'edit_item'             => __( 'Edit Project', 'leverage-extra' ),
        'new_item'              => __( 'New Portfolio Project', 'leverage-extra' ),
        'view_item'             => __( 'View Project', 'leverage-extra' ),
        'search_items'          => __( 'Search Projects', 'leverage-extra' ),
        'not_found'             => __( 'No projects found', 'leverage-extra' ),
        'not_found_in_trash'    => __( 'No projects found in trash', 'leverage-extra' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'leverage-extra' ),
        'featured_image'        => __( 'Featured image', 'leverage-extra' ),
        'set_featured_image'    => __( 'Set featured image', 'leverage-extra' ),
        'remove_featured_image' => __( 'Remove featured image', 'leverage-extra' ),
        'use_featured_image'    => __( 'Use featured image', 'leverage-extra' ),
        'archives'              => __( 'Portfolio projects archive', 'leverage-extra' ),
        'insert_into_item'      => __( 'Insert into project', 'leverage-extra' ),
        'uploaded_to_this_item' => __( 'Upload to this project', 'leverage-extra' ),
        'filter_items_list'     => __( 'Filter projects', 'leverage-extra' ),
        'items_list_navigation' => __( 'Portfolio projects list navigation', 'leverage-extra' ),
        'items_list'            => __( 'Portfolio projects list', 'leverage-extra' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'leverage-extra' ),
    );

    if ( function_exists( 'ACF' ) ) {

        $single_portfolio_post_slug = get_field( 'single_portfolio_post_slug', 'option' );

        if ( $single_portfolio_post_slug ) {
            $post_slug = get_field( 'single_portfolio_post_slug', 'option' );
    
        } else {
            $post_slug = 'project';
        }

    } else {
        $post_slug = 'project';        
    }

    $args = array(
        'label'               => __( 'Portfolio', 'leverage-extra' ),
        'labels'              => $labels,
        'description'         => __( 'Portfolio post type for Leverage Theme.', 'leverage-extra' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rest_base'           => '',
        'has_archive'         => false,
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug' => $post_slug, 'with_front' => true ),
        'query_var'           => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => array( 'title', 'excerpt', 'comments', 'editor', 'thumbnail' ),
    );

    register_post_type( 'leverage-portfolio', $args );
}

add_action( 'init', 'leverage_portfolio_register_post_type' );

function leverage_portfolio_category_init() {

    $labels = array(
        'name'                       => _x( 'Categories', 'taxonomy general name', 'leverage-extra' ),
        'singular_name'              => _x( 'Category', 'taxonomy singular name', 'leverage-extra' ),
        'search_items'               => __( 'Search Categories', 'leverage-extra' ),
        'popular_items'              => __( 'Popular Categories', 'leverage-extra' ),
        'all_items'                  => __( 'Categories', 'leverage-extra' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Category', 'leverage-extra' ),
        'update_item'                => __( 'Update Category', 'leverage-extra' ),
        'add_new_item'               => __( 'Add New Category', 'leverage-extra' ),
        'new_item_name'              => __( 'New Portfolio Category', 'leverage-extra' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'leverage-extra' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'leverage-extra' ),
        'choose_from_most_used'      => __( 'Choose from the most used categories', 'leverage-extra' ),
        'not_found'                  => __( 'No categories found.', 'leverage-extra' ),
        'menu_name'                  => __( 'Categories', 'leverage-extra' ),
    );

    if ( function_exists( 'ACF' ) ) {

        $single_portfolio_category_slug = get_field( 'single_portfolio_category_slug', 'option' );

        if ( $single_portfolio_category_slug ) {
            $category_slug = get_field( 'single_portfolio_category_slug', 'option' );
    
        } else {
            $category_slug = 'project-category';
        }

    } else {
        $category_slug = 'project-category';        
    }

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_in_rest'          => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => $category_slug ),
    );

    register_taxonomy( 'leverage_portfolio_category', array( 'leverage-portfolio' ), $args );
}

add_action( 'init', 'leverage_portfolio_category_init' );