<?php get_header(); ?>

<main id="primary" class="site-main">
    <header class="archive-header">
        <h1 class="archive-title">Blog</h1>
        <p class="archive-description">Thoughts, tutorials, and technical notes.</p>
    </header>

    <div class="blog-archive-grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="blog-thumbnail" aria-hidden="true" tabindex="-1">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="blog-card-content">
                        <header class="entry-header">
                            <div class="entry-meta">
                                <?php echo get_the_date(); ?>
                            </div>
                            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                        </header>

                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
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
            echo '<p>No articles found.</p>';
        endif;
    ?>
</main>

<?php get_footer(); ?>