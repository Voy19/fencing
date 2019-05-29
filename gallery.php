<?php
	/*
	Template Name: Gallery
	Template post type: page
	*/
?>

<?php get_header(); ?>

<main class="gallery">
<?php 
echo do_shortcode('[foogallery-album id="92"]'); 
?>
</main>

<?php get_footer(); ?>