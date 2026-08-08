<?php get_header(); ?>

<main id="primary" class="site-main">
    <header class="archive-header">
        <h1 class="archive-title">Applications</h1>
        <p class="archive-description">Downloadable software, web apps, and tools.</p>
    </header>

    <div class="app-archive-grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'app-card' ); ?>>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="app-thumbnail" aria-hidden="true" tabindex="-1">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </a>
                    <?php else : ?>
                        <!-- Fallback icon if no thumbnail exists -->
                        <div class="app-thumbnail placeholder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        </div>
                    <?php endif; ?>

                    <div class="app-card-content">
                        <?php the_title( '<h2 class="app-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                        
                        <div class="app-summary">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <footer class="app-footer">
                            <a href="<?php the_permalink(); ?>" class="app-button">View Details</a>
                        </footer>
                    </div>
                    
                </article>
                <?php
            endwhile;
            ?>
    </div>

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
            echo '<p>No applications found.</p>';
        endif;
    ?>
</main>

<?php get_footer(); ?>