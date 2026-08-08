<?php get_header(); ?>

<main id="primary" class="site-main">
    <header class="archive-header">
        <h1 class="archive-title">Code Repositories</h1>
        <p class="archive-description">Open-source projects, scripts, and developmental code.</p>
    </header>

    <div class="repo-archive-grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'repo-card' ); ?>>
                    
                    <div class="repo-card-header">
                        <!-- Inline SVG for a clean "code branch" icon -->
                        <svg class="repo-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                        </svg>
                        <?php the_title( '<h2 class="repo-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </div>

                    <div class="repo-summary">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <footer class="repo-footer">
                        <span class="repo-date">Updated: <?php echo get_the_date(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="repo-link">View Details &rarr;</a>
                    </footer>
                    
                </article>
                <?php
            endwhile;
            ?>
    </div>

    <!-- Pagination -->
    <div class="archive-pagination">
        <?php
        the_posts_pagination( array(
            'mid_size'  => 2,
            'prev_text' => 'Prev',
            'next_text' => 'Next',
        ) );
        ?>
    </div>

    <?php
        else :
            echo '<p>No repositories found.</p>';
        endif;
    ?>
</main>

<?php get_footer(); ?>