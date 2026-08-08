<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
            
            <header class="entry-header">
                <?php 
                // Display the post type label (Blog, Repository, Application)
                $post_type = get_post_type();
                echo '<span class="entry-label">' . esc_html( $post_type ) . '</span>';
                
                the_title( '<h1 class="entry-title">', '</h1>' ); 
                ?>
                
                <div class="entry-meta">
                    <span class="posted-on">Published on <?php echo get_the_date(); ?></span>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                // This outputs the main body of your post, repo description, or app details
                the_content();
                
                // Handles pagination if you split a long post into multiple pages
                wp_link_pages( array(
                    'before' => '<div class="page-links">Pages:',
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                // Display categories and tags if applicable
                the_category( ', ' );
                the_tags( '<br>Tags: ', ', ' );
                ?>
            </footer>
            
        </article>

        <?php
        // Display post navigation (Previous/Next)
        the_post_navigation( array(
            'prev_text' => '&larr; %title',
            'next_text' => '%title &rarr;',
        ) );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main>

<?php get_footer(); ?>