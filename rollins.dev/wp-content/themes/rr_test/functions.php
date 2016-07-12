<?php
/**
 * Rollins Ridge functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Rollins_Ridge
 */

if ( ! function_exists( 'rr_test_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs before the init hook. The init hook is too late for some features, such as indicating support for post thumbnails.
 */
function rr_test_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rollins Ridge, use a find and replace
	 * to change 'rr_test' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rr_test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('blog-feature', 200, 200, true);
	add_image_size('front-page-slide-1', 1400, 535, true);
	add_image_size('front-page-slide-2', 1400, 800, true);
	add_image_size('gallery-main', 1400, 950, true);
	add_image_size('gallery-thumb', 300, 200, true);

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rr_test' ),
		'footer' => esc_html__( 'Footer', 'rr_test' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rr_test_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'rr_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rr_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rr_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'rr_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rr_test_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rr_test' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rr_test' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rr_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rr_test_scripts() {
	wp_enqueue_style( 'rr_test-style', get_stylesheet_uri() );

	if ( is_page_template( 'front-page.php' ) ) {
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/sass/vendor-css/flexslider.css','rr_test-style','1.1','all');

		wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );

		wp_register_script( 'rr_test-flexslider', get_template_directory_uri() . '/js/vendor-js/jquery.flexslider-min.js', array(), NULL, true );

		wp_enqueue_script( 'rr_test-front-page-image-carousel', get_template_directory_uri() . '/js/front-page-image-carousel.js', array( 'jquery', 'rr_test-flexslider' ), NULL, true );
	}

	if ( is_page_template( 'page-photo-gallery-page.php' ) ) {
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/sass/vendor-css/flexslider.css','rr_test-style','1.1','all');

		wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );

		wp_register_script( 'rr_test-flexslider', get_template_directory_uri() . '/js/vendor-js/jquery.flexslider-min.js', array(), NULL, true );

		wp_enqueue_script( 'rr_test-page-gallery', get_template_directory_uri() . '/js/photo-gallery.js', array( 'jquery', 'rr_test-flexslider' ), NULL, true );
	}

	wp_enqueue_script( 'rr_test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rr_test-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rr_test_scripts' );

/*
* Implement Custom Flexslider in header.php
 */
function rr_test_load_flexslider() {
	if ( is_page_template( 'front-page.php' ) && function_exists( rr_test_front_page_carousel() ) ) {
 		rr_test_front_page_carousel();
 	}elseif ( is_page_template( 'page-photo-gallery-page.php' ) && function_exists( rr_test_photo_gallery() ) ) {
 		rr_test_photo_gallery();
 	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load image carousel on home page.
 */
require get_template_directory() . '/inc/front-page-flexslider.php';

/**
 * Load image carousel on home page.
 */
require get_template_directory() . '/inc/front-page-boxes.php';

/**
 * Custom footer for entrie site.
 */
require get_template_directory() . '/inc/footer-colophon.php';

/**
 * Custom photo gallery.
 */
require get_template_directory() . '/inc/photo-gallery-flexslider.php';

