<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function techstack_theme_setup() {
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable featured images for posts and custom post types
    add_theme_support( 'post-thumbnails' );

    // Add HTML5 support for cleaner markup
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
}
add_action( 'after_setup_theme', 'techstack_theme_setup' );

function techstack_enqueue_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style( 
        'techstack-style', 
        get_stylesheet_uri(), 
        array(), 
        wp_get_theme()->get( 'Version' ) 
    );

    // We will enqueue local fonts and custom JS here later
}
add_action( 'wp_enqueue_scripts', 'techstack_enqueue_assets' );

// Register Custom Post Types for Repositories and Applications
function techstack_register_custom_post_types() {

    // 1. Repositories CPT
    $repo_labels = array(
        'name'                  => 'Repositories',
        'singular_name'         => 'Repository',
        'menu_name'             => 'Repositories',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Repository',
        'edit_item'             => 'Edit Repository',
        'view_item'             => 'View Repository',
        'all_items'             => 'All Repositories',
        'search_items'          => 'Search Repositories',
        'not_found'             => 'No repositories found.',
    );

    $repo_args = array(
        'labels'                => $repo_labels,
        'public'                => true,
        'has_archive'           => true,
        'show_in_rest'          => true, // Enables the Gutenberg block editor
        'menu_icon'             => 'dashicons-media-code', // Sets a custom icon in the admin menu
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'               => array( 'slug' => 'repositories' ),
    );
    register_post_type( 'repository', $repo_args );

    // 2. Applications CPT
    $app_labels = array(
        'name'                  => 'Applications',
        'singular_name'         => 'Application',
        'menu_name'             => 'Applications',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Application',
        'edit_item'             => 'Edit Application',
        'view_item'             => 'View Application',
        'all_items'             => 'All Applications',
        'search_items'          => 'Search Applications',
        'not_found'             => 'No applications found.',
    );

    $app_args = array(
        'labels'                => $app_labels,
        'public'                => true,
        'has_archive'           => true,
        'show_in_rest'          => true, // Enables the Gutenberg block editor
        'menu_icon'             => 'dashicons-download', // Sets a custom icon in the admin menu
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'               => array( 'slug' => 'applications' ),
    );
    register_post_type( 'application', $app_args );

}
add_action( 'init', 'techstack_register_custom_post_types' );

// Register Navigation Menus
function techstack_register_menus() {
    register_nav_menus( array(
        'primary' => 'Primary Menu',
    ) );
}
add_action( 'after_setup_theme', 'techstack_register_menus' );