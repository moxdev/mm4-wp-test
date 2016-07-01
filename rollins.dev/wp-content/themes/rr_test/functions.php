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
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rr_test' ),
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

	wp_enqueue_script( 'rr_test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rr_test-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_page_template('front-page.php' ) ) {

		wp_deregister_script( 'jquery' );

		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );

		wp_register_script( 'rr_test-flexslider', get_template_directory_uri() . '/js/flexslider.js', array(), NULL, true );

		wp_enqueue_script( 'rr_test-carousel-js', get_template_directory_uri() . '/js/carousel.js', array( 'jquery', 'rr_test-flexslider' ), NULL, true );
	}
}
add_action( 'wp_enqueue_scripts', 'rr_test_scripts' );

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
 * Load front-page-flexslider file.
 */
require get_template_directory() . '/inc/front-page-flexslider.php';


function rr_test_front_page_carousel() {
	$images = get_field('image-gallery');

	if( $images ): ?>
	    <ul>
	        <?php foreach( $images as $image ): ?>
	            <li>
	                <a href="<?php echo $image['url']; ?>">
	                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </a>
	                <p><?php echo $image['caption']; ?></p>
	            </li>
	        <?php endforeach; ?>
	    </ul>
	<?php endif;
}
