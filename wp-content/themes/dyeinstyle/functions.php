<?php
/**
 * Dye in Style functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dye_in_Style
 */

if ( ! function_exists( 'dyeinstyle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dyeinstyle_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dye in Style, use a find and replace
	 * to change 'dyeinstyle' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dyeinstyle', get_template_directory() . '/languages' );

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
		'main-nav' => esc_html__( 'Main Navigation', 'dyeinstyle' ),
		'social' => esc_html__( 'Social', 'dyeinstyle' ),
		'hours' => esc_html__( 'Hours', 'dyeinstyle' ),
		
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

	// Set up the WordPress core custom background feature. DISABLED
/*	add_theme_support( 'custom-background', apply_filters( 'dyeinstyle_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'max-height'  => 200,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'dyeinstyle_setup' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Dye in Style 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function dyeinstyle_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'dyeinstyle-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'dyeinstyle_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dyeinstyle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dyeinstyle_content_width', 640 );
}
add_action( 'after_setup_theme', 'dyeinstyle_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dyeinstyle_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dyeinstyle' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dyeinstyle' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dyeinstyle_widgets_init' );

/**
 * Add buttons shortcode 
 */
 function button_shortcode( $atts, $content = null ) {
	
	// Extract shortcode attributes
	extract( shortcode_atts( array(
		'url'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
		/*'color'  => 'green',*/
	), $atts ) );

	// Use text value for items without content
	$content = $text ? $text : $content;

	// Return button with link
	if ( $url ) {

		$link_attr = array(
			'href'   => esc_url( $url ),
			'title'  => esc_attr( $title ),
			'target' => ( 'blank' == $target ) ? '_blank' : '',
		);

		$link_attrs_str = '';

		foreach ( $link_attr as $key => $val ) {

			if ( $val ) {

				$link_attrs_str .= ' '. $key .'="'. $val .'"';

			}

		}

		return '<a'. $link_attrs_str .'><button>'. do_shortcode( $content ) .'</button></a>';

	}

	// No link defined so return button as a span
	else {

		return '<button>'. do_shortcode( $content ) .'</button>';

	}

}
add_shortcode( 'button', 'button_shortcode' );
 

/**
 * Enqueue scripts and styles.
 */
function dyeinstyle_scripts() {
	//Enqueue Google Fonts: Muli and Grand Hotel
	wp_enqueue_style( 'dyeinstyle-fonts', 'https://fonts.googleapis.com/css?family=Grand+Hotel|Muli:400,400i,700,800' );

	wp_enqueue_style( 'dyeinstyle-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dyeinstyle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dyeinstyle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dyeinstyle_scripts' );

// Load Font Awesome
	add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
	function enqueue_font_awesome() {
	
		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
	
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
 * Functions which enhance the theme by hooking into WordPress.
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
