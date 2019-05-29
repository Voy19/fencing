<?php
	/*
	Template Name: Contact Us
	Template post type: page
	*/
?>

<?php get_header(); ?>
<?php the_post(); ?>
<!-- <h2><?php the_title() ?></h2> -->

<?php the_content() ?>

<h2 class="contact_h2" >Our coaches</h2>
<div class="coaches">
	<div class="coach_1">

	<?php 
		$image = get_field('image-coach_1');
		if( !empty($image) ): ?>
    <img class='coach-img' src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>
				<h3><?php the_field('name-coach_1'); ?></h3>
			<p><?php the_field('information-coach_1'); ?></p>
			
			<div class="coach_contact">
			<hr />
				<div class="row">
					<div class="number">
						<img src="../wp-content/themes/my_theme/assets/img/phone_14179.png" alt="" />
						<p><?php the_field('phone-coach_1'); ?></p>
	
					</div>
					<div class="email">
	
						<img src="../wp-content/themes/my_theme/assets/img/Email_30017.png" alt="" />
						<p><?php the_field('email-coach_1'); ?></p>
	
					</div>
				</div>
			</div>
	</div>
	<div class="coach_2">

<?php 
	$image = get_field('image-coach_2');
	if( !empty($image) ): ?>
 <img class='coach-img' src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>
			<h3><?php the_field('name-coach_2'); ?></h3>
		<p><?php the_field('information-coach_2'); ?></p>

		<div class="coach_contact">
		<hr />
				<div class="row">
			<div class="number">
				<img src="../wp-content/themes/my_theme/assets/img/phone_14179.png" alt="" />
				<p><?php the_field('phone-coach_2'); ?></p>

			</div>
			<div class="email">
				<img src="../wp-content/themes/my_theme/assets/img/Email_30017.png" alt="" />
				<p><?php the_field('email-coach_2'); ?></p>

			</div>
</div>
		</div>
</div>
</div>
<div class='content'><?php echo do_shortcode( '[wp-osm id=2]' ); ?>

	<div class="contact">
		<h3>Where find us</h3>
	<p><span>Location: </span>Thomas Presbyterian Church</p>
	<p>1068 Linden Rd,</p>
	<p>Eighty Four, PA 15330</p>
	<p> (10 min drive from Peters Township High School)</p>
	<p><span>Number: </span><?php the_field('number_phone'); ?></p>
	<p><span>Email: </span><?php the_field('email'); ?></p>	

	</div>
</div>

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>

