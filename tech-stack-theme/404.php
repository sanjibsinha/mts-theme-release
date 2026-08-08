<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title">404 - Page Not Found</h1>
        </header>

        <div class="page-content">
            <p>It looks like nothing was found at this location. The repository or application may have been moved. Try searching for it below:</p>
            
            <div class="search-form-wrapper">
                <?php get_search_form(); ?>
            </div>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-home-btn">&larr; Return to Home</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>