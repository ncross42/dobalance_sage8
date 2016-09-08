<header class="banner">
  <div class="container">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default ">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-left navbar-toggle collapsed" data-toggle="collapse" data-target="#primary_menu" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <?php
        if (has_nav_menu('primary_navigation')) :
          $args = [
            'menu'            => 'primary_navigation', 
            'menu_class'      => 'nav navbar-nav',
            'theme_location'  => 'primary_navigation',
            'container'       => 'div',
            'container_id'    => 'primary_menu',
            'container_class' => 'navbar-collapse collapse',
            'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
            'walker'          => new wp_bootstrap_navwalker(),
          ];
          wp_nav_menu($args);
        endif;
        ?>
      </div> <!-- "container-fluid" -->
    </nav>

    <?php if ( is_home() && !is_user_logged_in() && get_header_image() ) : ?>
    <div class="header-image">
      <?php get_template_part('templates/header','carousel'); ?>
    </div><!-- .header-image -->
    <?php endif; // End header image check. ?>

  </div>

</header>
