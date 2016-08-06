<div class="col-sx-12 col-sm-6 col-md-4 col-lg-3">
	<h2><a href="<?php echo  the_permalink();?>"><?php echo the_title();?></a></h2>
	<p class="postcat">
<?php echo get_the_term_list( $post->ID, 'hierarchy', '지역: ', ', ', '' ); ?>
<br>
<?php echo get_the_term_list( $post->ID, 'topic', '주제: ', ', ', '' ); ?>
</p>

	<p class="thumb">
<?php if(has_post_thumbnail()) :
  echo '<!-- post_class:'.post_class().'-->';
	the_post_thumbnail('thumbnail');
else:?>
		<img src="<?php echo Roots\Sage\Assets\asset_path('images/no_image.jpg');?>" alt="No Image" width="100" height="100"/>
<?php endif;?>
	</p>

	<?php the_excerpt();?>
	<p class="more"><a href="<?php echo the_permalink();?>">계속보기</a></p>
	<p class="postinfo"><?php echo get_the_date();?></p>
</div>
