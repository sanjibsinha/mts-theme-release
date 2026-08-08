<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- wp_head() is crucial for plugins and WordPress core to inject scripts and styles -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- wp_body_open() allows plugins to inject code immediately after the body tag opens -->
    <?php wp_body_open(); ?>

    <header id="masthead" class="site-header">
        
        <?php 
        // Only show the default site branding if we are NOT on the front page
        if ( ! is_front_page() ) : 
        ?>
            <div class="site-branding">
                <p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </p>
                <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false, // Keeps HTML output clean
                'fallback_cb'    => false, // Prevents default page list if no menu is assigned
            ) );
            ?>
        </nav>
        
    </header>

    <div id="content" class="site-content">