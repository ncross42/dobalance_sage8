<?php //get_template_part('templates/page', 'header'); 
$sql_recent = [
	'posts_per_page' => 6,
	'ignore_sticky_posts' => 1,
  'post_type' => 'post',
];
?>

<div class="container home">

<h1>최근 비밀투표</h1>
<div class="row">
<?php
$sql_recent['post_type'] = 'elect';
$ret = query_posts($sql_recent);
while(have_posts()) : the_post();
	get_template_part('templates/content','excerpt');
endwhile;
?>
</div>

<h1>최근 공개발의</h1>
<div class="row">
<?php
$sql_recent['post_type'] = 'offer';
query_posts($sql_recent);
while(have_posts()) : the_post();
	get_template_part('templates/content','excerpt');
endwhile;
?>
</div>

<h1>최근 포스트</h1>
<div class="row">
<?php
$sql_recent['post_type'] = 'post';
query_posts($sql_recent);
if(have_posts()): while(have_posts()) : the_post();
	get_template_part('templates/content','excerpt');
endwhile; endif;
?>
</div>

<!--h1>test</h1>
<div class="row">
<?php
/*
$q1 = [
	'posts_per_page'=>5,
	'ignore_sticky_posts=1',
	'tax_query' => [
		['taxonomy'=>'post_format'
		,'field'=>'slug'
		,'terms'=>'post-format-status'
		,'operator'=>'NOT IN']
	]
];
query_posts($q1);
if(have_posts()): while(have_posts()): 
	the_post();
	get_template_part('content','home');
endwhile; endif;
 */
?>
</div-->

<? # get_sidebar(); ?>

</div> <!-- container -->

<? //get_footer(); ?>

<?php //the_posts_navigation(); ?>
