

<?php get_header(); ?>

<h2><?php wp_title("", true); ?></h2>

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
	<?php the_posts_pagination() ?>
</main>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>