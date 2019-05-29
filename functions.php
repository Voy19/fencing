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
		wp_enqueue_style('gallery-main', get_template_directory_uri() . '/gallery.css');

		wp_enqueue_script('test-script-main', get_template_directory_uri() . '/main.js');
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

	// pagination

	function wp_corenavi() {
		global $wp_query;
		$pages = '';
		$max = $wp_query->max_num_pages;
		if (!$current = get_query_var('paged')) $current = 1;
		$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
		$a['total'] = $max;
		$a['current'] = $current;
	 
		$total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
		$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
		$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
		$a['prev_text'] = 'Previous'; //текст ссылки "Предыдущая страница"
		$a['next_text'] = 'Next'; //текст ссылки "Следующая страница"
	 
		if ($max > 1) echo '<div class="navigation">';
		// if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
		echo $pages . paginate_links($a);
		if ($max > 1) echo '</div>';
	 }





	// DONT TOUCH
	
	if( is_admin() ){
		remove_action( 'admin_init', '_maybe_update_core' );
		remove_action( 'admin_init', '_maybe_update_plugins' );
		remove_action( 'admin_init', '_maybe_update_themes' );
	
		remove_action( 'load-plugins.php', 'wp_update_plugins' );
		remove_action( 'load-themes.php', 'wp_update_themes' );
	
		add_filter( 'pre_site_transient_browser_'. md5( $_SERVER['HTTP_USER_AGENT'] ), '__return_true' );
	}


	
	
	
	
	