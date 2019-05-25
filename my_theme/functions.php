<?php

	include_once(__DIR__ . '/inc/test-recent-posts.php');

	add_filter('show_admin_bar', '__return_false');

	add_action('wp_enqueue_scripts', 'test_media');
	add_action('after_setup_theme', 'test_after_setup');
	add_action('widgets_init', 'test_widgets');
	
	add_filter('widget_text', 'do_shortcode');
	add_shortcode('test_recent', 'test_recent');
	
	/*add_filter('pre_get_document_title', function($t){
		if(is_single()){
			$t = CFS()->get('doc_title');
		}
		
		return $t;
	});*/
	
	add_filter('pre_get_document_title', function( $parts ){
		// var_dump($parts);
		
		if( isset($parts['site']) ) unset($parts['site']);
		return $parts;
	});
	
	/*add_filter('pre_get_document_title', function($title){
		return '1' . $title;
	});
	
	add_filter('the_content', function($content){
		return $content . 1;
	}, 14);
	
	add_filter('the_content', function($content){
		return $content . 2;
	}, 13);
	*/
	function test_media(){
		wp_enqueue_style('test-reset', get_template_directory_uri() . '/reset.css');
		wp_enqueue_style('test-main', get_stylesheet_uri());
		wp_enqueue_style('contact-main', get_template_directory_uri() . '/contact.css');
		wp_enqueue_style('news-main', get_template_directory_uri() . '/news.css');
		wp_enqueue_style('single-main', get_template_directory_uri() . '/single.css');

		wp_enqueue_script('test-script-main', get_template_directory_uri() . '/assets/js/script.js');
	}
	
	function test_after_setup(){
		register_nav_menu('top', 'Для шапки');
		register_nav_menu('footer', 'Для подвала');
		
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
	}
	
	function test_widgets(){
		register_sidebar([
			'name' => 'Sidebar Right',
			'id' => 'sidebar-right',
			'description' => 'Правая колонка',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => "</div>\n"
		]);
		
		register_sidebar([
			'name' => 'Sidebar Contact',
			'id' => 'sidebar-contact',
			'description' => 'Contact sidebar',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget'  => "</div>\n"
		]);
		
		register_widget('Test_Recent_Posts');
	}
	
	function test_recent($atts){
		$atts = shortcode_atts( array(
			'cnt' => 5
		), $atts );
		
		$str = '';
		
		$args = array(
			'numberposts' => $atts['cnt'],
			'orderby'     => 'date',
			'order'       => 'DESC',
			'post_type'   => 'post'
		);

		$posts = get_posts($args);

	
		foreach($posts as $post){ 
			setup_postdata($post);
			
			$link = get_the_permalink();
			$title = get_the_title();
			$dt = get_the_date();
			$intro = CFS()->get('intro');
			
			$str .= "<div>
						<div><em>$dt</em></div>
						<div><strong>$title</strong></div>
						<div>$intro</div>
						<a href=\"$link\">Далее...</a>
					</div>";
		}

		wp_reset_postdata(); 
		
		return $str;

		$image = get_field('image-coach_1');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $image ) {

			echo wp_get_attachment_image( $image, $size );

		}
	}


	
	
	
	
	