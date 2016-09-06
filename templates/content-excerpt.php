<?php 
  //echo '<pre>'.print_r(get_post_class(),true).'</pre>';
  list($pid,$cpt) = get_post_class(); 
  $cpt_icon = ($cpt=='offer'?'glyphicon-tree-conifer':($cpt=='elect'?'glyphicon glyphicon-leaf':'glyphicon-file') );
  $no_img_src = Roots\Sage\Assets\asset_path('images/no_image.jpg');
  $body_classes = get_body_class();
  $bThumb = has_post_thumbnail();
?>
<div class="col-sx-12 col-sm-6 col-md-4 col-lg-3">
  <div class="block block-light block-center">
    <h2>
      <a href="<?php echo the_permalink();?>">
        <div>
          <span class="glyphicon <?php echo $cpt_icon;?>"></span><?php echo the_title();?>
        </div>
      </a>
    </h2>

    <div class="meta"><?php get_template_part('templates/entry-meta'); ?></div>

    <div class="excerpt">
      <div class="postcat"><?php echo get_the_term_list( $post->ID, 'hierarchy', '<b>지역:</b> ', ', ', '' ); ?></div>
      <div class="postcat"><?php echo get_the_term_list( $post->ID, 'topic', '<b>주제:</b> ', ', ', '' ); ?></div>

      <div class="thumb">
      <?php if($bThumb) the_post_thumbnail('thumbnail');
            else echo '<span class="glyphicon glyphicon-camera" style="font-size:50px; color:gray;"></span>';
  //'<img src="'.$no_img_src.'" alt="No Image" width="50" height="50"/>';
      ?>
      </div>

      <?php if($post->post_excerpt) the_excerpt(); ?>
    </div>

    <!--a class="btn btn-default" href="<?php echo the_permalink();?>"><?php echo __('Read more...');?></a-->


  </div>
</div>
