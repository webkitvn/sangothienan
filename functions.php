<?php
/**
 * Sango functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sango
 */
add_theme_support('woocommerce');
if ( ! function_exists( 'sango_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sango_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sango, use a find and replace
	 * to change 'sango' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sango', get_template_directory() . '/languages' );

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
	add_theme_support( 'custom-background', apply_filters( 'sango_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	//add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif;
add_action( 'after_setup_theme', 'sango_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sango_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sango_content_width', 640 );
}
add_action( 'after_setup_theme', 'sango_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sango_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sango' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sango' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'sango_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sango_scripts() {
	wp_enqueue_style( 'sango-style', get_stylesheet_uri() );
	//wp_enqueue_script( 'jquery-js', 'https://code.jquery.com/jquery-2.1.1.min.js', array(), '2.2.1', true );
	wp_enqueue_script( 'sango-materialize-js', get_template_directory_uri() . '/js/materialize.js', array(), '1.0', true );
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/a85f1d5723.js', array(), '1.0', true );
	wp_enqueue_script( 'matchHeight-js', get_template_directory_uri() . '/js/jquery.matchHeight.js', array(), '1.0', true );
	wp_enqueue_script( 'sango-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '1.0', true );
	wp_enqueue_script( 'hoverdir', get_template_directory_uri() . '/js/jquery.hoverdir.js', array(), '1.0', true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.js', array(), '1.6.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_localize_script( 'main-js', 'sango_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_style( 'sango-materialize-css', get_template_directory_uri() . '/css/materialize.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'sango-materialize-icon', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '1.0', 'all' );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.6.0', 'all' );
	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.6.0', 'all' );
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/css/responsive.css', array(), '1.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'sango_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function sango_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'sango_pingback_header' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/wc-change-price-display-custom-field.php';

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'custom-logo' );
	add_theme_support( 'site-logo' );
	add_theme_support( 'post-thumbnails', array('post','du-an'));
	set_post_thumbnail_size(600, 450, true ); // default Post Thumbnail dimensions (cropped)

}
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size('product_cate_size', 600, 350, true);
	add_image_size('page_cover', 1905, 608, true);
	add_image_size('product_thumbnail', 600, 400, true);
	add_image_size('sale_image', 900, 300, true);
	add_image_size('project_slider', 900, 650, true);
	add_image_size('post_thumb', 600, 250, true);
	add_image_size('feature_img', 800, 400, true);
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

require get_template_directory() . '/inc/content-product-functions.php';

function woo_related_products_limit() {
  	global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'sango_related_products_args' );
function sango_related_products_args( $args ) {
	$args['posts_per_page'] = 6;
	$args['columns'] = 3;
	return $args;
}
//excerpt length
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}
//REGISTER MENU
function register_my_menus() {
  register_nav_menus(
    array(
      'primary-menu' => __("Primary Menu"),
      'footer-menu' => __("Footer Menu")
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_filter( 'woocommerce_checkout_fields' , 'webbalo_custom_override_checkout_fields' );
add_filter( 'woocommerce_default_address_fields' , 'webbalo_custom_override_default_address_fields');
// Our hooked in function - $fields is passed via the filter!
function webbalo_custom_override_checkout_fields( $fields ) {
    //unset($fields['order']['order_comments']);
    //unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    //unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    return $fields;
}
function webbalo_custom_override_default_address_fields( $address_fields ) 
{
    unset( $address_fields['postcode'] );
    unset( $address_fields['country'] );
    unset( $address_fields['address_2'] );
    unset( $address_fields['company'] );
    return $address_fields;
}