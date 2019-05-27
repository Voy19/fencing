<?php
	/*
	Template Name: Iblog
	Template post type: page
	*/
?>

<?php get_header(); ?>

<div class="wrap">
<main class="news">
		<?php if(have_posts()): 
				while(have_posts()): the_post(); ?>
					<article class="item">
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('large') ?>
							<div class="item_hover">
								<div class="text_hover">
									<img class='hover-img' src="../wp-content/themes/my_theme/assets/img/searchmagnifierinterfacesymbol1_79893.svg" alt="">
									<p>view more</p>
								</div>
                  </div>
						</a>
						<h2><?php the_title() ?></h2>
						<span><?php echo CFS()->get('description') ?></span>
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