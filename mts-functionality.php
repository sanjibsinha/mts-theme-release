<?php
/*
Plugin Name: My Tech Stack Functionality (MTS)
Plugin URI: https://sanjibsinha.in/repositories/mts-theme
Description: Essential content types and functionality for the My Tech Stack (MTS) Theme, including Repositories and Applications Custom Post Types with optimized performance.
Version: 1.0.0
Author: Sanjib Sinha
Author URI: https://sanjibsinha.in
License: GPL2
Text Domain: mts-functionality
*/

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Custom Post Types and Associated Taxonomies
 */
function mts_register_cpts_and_taxonomies() {

    // Define optimized arguments for the Repository CPT
    $args_repository = array(
        'labels' => array(
            'name'                  => _x( 'Repositories', 'mts-functionality' ),
            'singular_name'         => _x( 'Repository', 'mts-functionality' ),
            'add_new'               => __( 'Add New Repository', 'mts-functionality' ),
            'edit_item'             => __( 'Edit Repository', 'mts-functionality' ),
            'all_items'             => __( 'All Repositories', 'mts-functionality' ),
            'featured_image'        => _x( 'Repository Image', 'mts-functionality' ),
            'archives'              => __( 'Repository Archives', 'mts-functionality' ),
        ),
        'public'             => true,
        'has_archive'        => true, // Required for archive-repository.php
        'rewrite'            => array( 'slug' => 'repositories' ), // Dynamic archive URL: /repositories/
        'menu_icon'          => 'dashicons-code-standards',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
        'show_in_rest'       => true, // Enable Gutenberg editor
    );

    // Define optimized arguments for the Application CPT
    $args_application = array(
        'labels' => array(
            'name'                  => _x( 'Applications', 'mts-functionality' ),
            'singular_name'         => _x( 'Application', 'mts-functionality' ),
            'add_new'               => __( 'Add New Application', 'mts-functionality' ),
            'all_items'             => __( 'All Applications', 'mts-functionality' ),
            'archives'              => __( 'Application Archives', 'mts-functionality' ),
        ),
        'public'             => true,
        'has_archive'        => true, // Required for archive-application.php
        'rewrite'            => array( 'slug' => 'applications' ), // Dynamic archive URL: /applications/
        'menu_icon'          => 'dashicons-grid-view',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
        'show_in_rest'       => true, // Enable Gutenberg editor
    );

    // Register both CPTs
    register_post_type( 'repository', $args_repository );
    register_post_type( 'application', $args_application );
}
// Hook registration into WordPress init
add_action( 'init', 'mts_register_cpts_and_taxonomies' );


/**
 * Performance Optimization: Flush Rewrite Rules on Activation
 */
function mts_plugin_activation_flush_rules() {
    mts_register_cpts_and_taxonomies(); // Make rules available
    flush_rewrite_rules(); // Flush once
}
register_activation_hook( __FILE__, 'mts_plugin_activation_flush_rules' );


/**
 * Cleanup: Flush Rewrite Rules on Deactivation
 */
function mts_plugin_deactivation_flush_rules() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'mts_plugin_deactivation_flush_rules' );
