<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="techstack-grid">
        
        <!-- Grid Item 1: The Site Intro (Matches top-left of the screenshot) -->
        <div class="grid-item intro-block">
            <h1 class="site-title">
                <?php bloginfo( 'name' ); ?>
            </h1>
            <p class="site-description">
                <?php bloginfo( 'description' ); ?>
            </p>
            <div class="author-badge">
                <span class="badge-icon">S</span> BY SANJIB SINHA
            </div>
        </div>

        <!-- The Content Loop: Posts, Repositories, and Apps -->
        <?php
        $args = array(
            'post_type'      => array( 'post', 'repository', 'application' ),
            'posts_per_page' => 11, // Fetches 11 items to fill out the grid nicely
            'orderby'        => 'date',
            'order'          => 'DESC'
        );
        $grid_query = new WP_Query( $args );

        if ( $grid_query->have_posts() ) :
            while ( $grid_query->have_posts() ) : $grid_query->the_post();
                ?>
                <article class="grid-item post-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'large' ); // Use large images for crispness
                        } else {
                            echo '<div class="placeholder-img"></div>';
                        }
                        ?>
                        <div class="post-overlay">
                            <span class="post-type-label"><?php echo get_post_type(); ?></span>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </a>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        
    </div>
</main>

<?php get_footer(); ?>