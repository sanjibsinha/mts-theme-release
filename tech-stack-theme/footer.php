</div><!-- #content -->

    <footer class="site-footer">
        <div class="site-info">
            <p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.</p>
        </div>
    </footer>

    <!-- wp_footer() is mandatory. WordPress uses this to inject scripts just before the closing body tag. -->
    <?php wp_footer(); ?>
</body>
</html>