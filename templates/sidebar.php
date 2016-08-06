<?php if ( is_active_sidebar( 'sidebar-primary' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
    <?php dynamic_sidebar('sidebar-primary'); ?>
	</aside><!-- .sidebar-primary .widget-area -->
<?php endif; ?>
