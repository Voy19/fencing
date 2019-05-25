<?php get_header(); ?>

<?php the_post(); ?>
<div class="single">
	
	 <div class="img_post">
		 <?php the_post_thumbnail('large') ?>
	 </div>
	 <div class="text">
		 <h2><?php the_title() ?></h2>
		 <div class="time">
			<img src='../wp-content/themes/my_theme/assets/img/calendar-with-a-clock-time-tools_icon-icons.com_56831.png' alt=""> 
		 	<?php the_date('F j, Y'); ?></div>
				<div class='single_content'><?php the_content() ?></div>

	 </div>
			<!-- <div><?php the_tags() ?></div>
			<div><?php wp_list_categories() ?></div> -->
</div>

<!-- <main class="single">
	<div class="postsFlow clearfix">
		<?php the_post(); ?>
		<article class="postItem-full">
			<div><?php the_date(); ?></div>
			<?php the_post_thumbnail('large') ?>
			<h2><?php the_title() ?></h2>
			<div><?php the_content() ?></div>
			<div><?php the_tags() ?></div>
			<div><?php wp_list_categories() ?></div>
		</article>
	</div>
</main> -->
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>