<div class="entry-meta">

  <span class="byline author vcard"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span>


<?php $body_classes = get_body_class(); if ('home'!=$body_classes[0]) : ?>
  <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
    <span class="comments-link"><?php comments_popup_link(); ?></span>
  <?php endif; ?>
  <?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
<?php endif; ?>

  <span class="entry-date"><time class="updated" datetime="<?php echo get_post_time('c', true);?>"><?php echo get_the_date();?></time></span>

</div>
