<?php get_header(); ?>

		<?php the_post(); ?>
		<article class="page-full">
			<h2><?php the_title() ?></h2>
			<div><?php the_content() ?></div>
		</article>
<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>