<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>

    <ul class="social">
      <?php if(get_theme_mod('dobalance_facebook_link')): ?>
      <li><a href="<?php echo esc_url (get_theme_mod( 'dobalance_facebook_link' )); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
      <?php endif; ?>
      <?php if(get_theme_mod('dobalance_twitter_link')): ?>
      <li><a href="<?php echo esc_url (get_theme_mod( 'dobalance_twitter_link' )); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
      <?php endif; ?>
      <?php if(get_theme_mod('dobalance_instagram_link')): ?>
      <li><a href="<?php echo esc_url (get_theme_mod( 'dobalance_instagram_link' )); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
      <?php endif; ?>
      <?php if(get_theme_mod('dobalance_youtube_link')): ?>
      <li><a href="<?php echo esc_url (get_theme_mod( 'dobalance_youtube_link' )); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
      <?php endif; ?>
      <?php if(get_theme_mod('dobalance_google_plus_link')): ?>
      <li><a href="<?php echo esc_url (get_theme_mod( 'dobalance_google_plus_link' )); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
      <?php endif; ?>
      <?php if(get_theme_mod('dobalance_rss_link')): ?>
      <li><a href="<?php echo esc_url (get_theme_mod( 'dobalance_rss_link' )); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
      <?php endif; ?>
    </ul>

  </div>
</footer>
