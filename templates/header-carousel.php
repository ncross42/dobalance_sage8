<?php
$img_all = get_uploaded_header_images();
$img_count = count($img_all);
?>
<div id="homepage-feature" class="carousel slide">
	<ol class="carousel-indicators">
<?php
for( $i=0; $i<$img_count; ++$i ) {
	$bActive = (0==$i) ? 'class="active"' : '';
	echo <<<HTML
		<li data-target="#homepage-feature" data-slide-to="$i" $bActive ></li>
HTML;
}
?>
	</ol>

	<!-- inner -->
	<div class="carousel-inner" role="listbox">
<?php
/**
 * Filter the default twentysixteen custom header sizes attribute.
 * @since Twenty Sixteen 1.0
 * @param string $custom_header_sizes sizes attribute
 * for Custom Header. Default '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
 */
#$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
$custom_header_sizes = '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px';
$bFirst = true;
foreach ( $img_all as $img ) :
	$active = $bFirst ? 'active' : ''; $bFirst=false;
?>
		<div class="item <?php echo $active;?>">
			<img src="<?php echo $img['url'];?>" 
				srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $img['attachment_id'] ) ); ?>" 
				sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" 
				width="<?php echo esc_attr( $img['width'] ); ?>" 
				height="<?php echo esc_attr( $img['height'] ); ?>" 
				alt="<?php echo esc_attr( empty($img['alt_text']) ? get_bloginfo('name','display') : $img['alt_text'] ); ?>"
			>
		</div>
<?php endforeach; ?>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#homepage-feature" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#homepage-feature" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
