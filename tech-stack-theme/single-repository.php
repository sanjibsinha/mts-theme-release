<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        
        // Fetch the custom field for the GitHub URL (we will set this up in the admin later)
        $github_url = get_post_meta( get_the_ID(), 'github_url', true );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article repo-article' ); ?>>
            
            <header class="entry-header repo-header">
                <div class="repo-meta-top">
                    <span class="entry-label">Repository</span>
                    <span class="posted-on">Last updated: <?php echo get_the_modified_date(); ?></span>
                </div>
                
                <?php the_title( '<h1 class="entry-title repo-title">', '</h1>' ); ?>

                <?php if ( $github_url ) : ?>
                    <div class="repo-actions">
                        <a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" class="repo-btn github-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                            View Source on GitHub
                        </a>
                    </div>
                <?php endif; ?>
            </header>

            <div class="entry-content repo-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer">
                <?php
                $tags_list = get_the_tag_list( '', ', ' );
                if ( $tags_list ) {
                    echo '<div class="repo-tags"><strong>Tech Stack:</strong> ' . $tags_list . '</div>';
                }
                ?>
            </footer>
            
        </article>
    <?php
    endwhile; // End of the loop.
    ?>
</main>

<?php get_footer(); ?>