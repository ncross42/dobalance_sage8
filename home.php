<?php //get_template_part('templates/page', 'header'); 
$sql_recent = [
	'posts_per_page' => 7,
	'ignore_sticky_posts' => 1,
  'post_type' => 'post',
];
?>

<div class="container">

<h3>최신 전체 비밀투표</h3>
<div class="row">
<?
$sql_recent['post_type'] = 'elect';
$ret = query_posts($sql_recent);
while(have_posts()) : the_post();
	get_template_part('templates/content','excerpt');
endwhile;
?>
</div>

<h3>최신 전체 공개발의</h3>
<div class="row">
<?
$sql_recent['post_type'] = 'offer';
query_posts($sql_recent);
while(have_posts()) : the_post();
	get_template_part('templates/content','excerpt');
endwhile;
?>
</div>

<h3>최신 전체 포스트</h3>
<div class="row">
<?
$sql_recent['post_type'] = 'post';
query_posts($sql_recent);
if(have_posts()): while(have_posts()) : the_post();
	get_template_part('templates/content','excerpt');
endwhile; endif;
?>
</div>

<h3>test</h3>
<div class="row">
<?
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
</div>

<? # get_sidebar(); ?>

</div> <!-- container -->

<? //get_footer(); ?>

<?php //the_posts_navigation(); ?>
