<?php
	/*
	Template Name: Iblog
	Template post type: page
	*/
?>

<?php get_header(); ?>

<div class="wrap">
		<h2 class="blog_h2">BLOG</h2>
	<main class="news">
		<?php if(have_posts()): 
				while(have_posts()): the_post(); ?>
					<article class="item">
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('large') ?>
							<div class="item_hover">
								<div class="text_hover">
									<img class='hover-img' src="<?php echo get_template_directory_uri(); ?>/assets/img/searchmagnifierinterfacesymbol1_79893.svg" alt="">
									<p>view more</p>
								</div>
							</div>
						</a>
						<h3><?php the_title() ?></h3>
						<span><?php the_field('short'); ?></span>
					</article>
				<?php endwhile; ?>
		<?php else: ?>
			Записей нет!
		<?php endif; ?>
</main>
	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>


</div>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>