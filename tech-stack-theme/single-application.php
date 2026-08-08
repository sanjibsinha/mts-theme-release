<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        
        // Fetch custom fields for app details
        $download_url = get_post_meta( get_the_ID(), 'download_url', true );
        $app_version  = get_post_meta( get_the_ID(), 'app_version', true );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article app-article' ); ?>>
            
            <header class="entry-header app-header">
                <div class="app-header-content">
                    <span class="entry-label">Application</span>
                    <?php the_title( '<h1 class="entry-title app-title">', '</h1>' ); ?>
                    
                    <?php if ( $app_version ) : ?>
                        <div class="app-version">Version <?php echo esc_html( $app_version ); ?></div>
                    <?php endif; ?>

                    <?php if ( $download_url ) : ?>
                        <div class="app-actions">
                            <a href="<?php echo esc_url( $download_url ); ?>" class="app-btn download-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                Download Application
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="app-hero-image">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="entry-content app-content">
                <?php the_content(); ?>
            </div>

        </article>
    <?php
    endwhile; // End of the loop.
    ?>
</main>

<?php get_footer(); ?>