<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article blog-article' ); ?>>
            
            <header class="entry-header">
                <div class="entry-meta">
                    <span class="posted-on">Published on <?php echo get_the_date(); ?></span>
                    <span class="byline"> | By <?php the_author(); ?></span>
                </div>
                
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content();
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">Pages:',
                    'after'  => '</div>',
                ) );
                ?>
            </div>

            <footer class="entry-footer">
                <div class="article-taxonomies">
                    <?php
                    $categories_list = get_the_category_list( ', ' );
                    if ( $categories_list ) {
                        echo '<span class="cat-links"><strong>Category:</strong> ' . $categories_list . '</span>';
                    }
                    
                    $tags_list = get_the_tag_list( '', ', ' );
                    if ( $tags_list ) {
                        echo '<span class="tags-links"><strong>Tags:</strong> ' . $tags_list . '</span>';
                    }
                    ?>
                </div>
            </footer>
            
        </article>

        <div class="post-navigation-wrapper">
            <?php
            // Custom Next/Previous Post Navigation
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">&larr; Previous Article</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">Next Article &rarr;</span> <span class="nav-title">%title</span>',
            ) );
            ?>
        </div>

        <?php
        // Load comments if they are open or exist
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</main>

<?php get_footer(); ?>