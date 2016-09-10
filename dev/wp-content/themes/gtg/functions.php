<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
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

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );


/*************  START CODE FOR ACTIVE MENU ITEM ***************/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
   if (in_array('current-menu-item ', $classes) ){
       $classes[] = 'active ';
   }
   return $classes;
}
/*************  END OF CODE FOR ACTIVE MENU ITEM ***************/


/***************** START ADD IMAGE SIZE FUNCTION *******************/
add_image_size(281,220,'home_banner_size');

add_image_size(1016,655,'Wel_bc_image1_size');
add_image_size(1382,655,'Wel_bc_image2_size');
add_image_size(538,655,'Wel_bc_image3_size');

add_image_size(1920,729,'product_banner_image_size');

add_image_size(427,286,'wholesale_products_size');
add_image_size(427,287,'manufacturing_products_size');
add_image_size(478,762,'recent_project_size');
add_image_size(313,279,'home_blog_size');
add_image_size(405,292,'blog_size');
add_image_size(60,61,'blog_small_size');
add_image_size(427,620,'abt_sec1_image_size');
add_image_size(800,600,'abt_sec3_image_size');

/***************** END ADD IMAGE SIZE FUNCTION *******************/


/************** START CODE FOR CREATE CUSTOM POST HOME BANNER SLIDER******************/ 

function codex_banner_slider() {
  $labels = array(
    'name' => 'Banner Slider',
    'singular_name' => 'Slider',
    'add_new' => 'Add Banner Slider',
    'add_new_item' => 'Add New Banner Slider',
    'edit_item' => 'Edit Banner Slider',
    'new_item' => 'New Banner Slider',
    'all_items' => 'All Banner Slider',
    'view_item' => 'View Banner Slider',
    'search_items' => 'Search Banner Slider',
    'not_found' =>  'No Banner Slider found',
    'not_found_in_trash' => 'No Banner Slider found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Banner Slider'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'banner_slider' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'banner_slider', $args );
}
add_action( 'init', 'codex_banner_slider' ); 

/************** END OF CODE FOR CREATE CUSTOM POST HOME BANNER SLIDER ******************/ 


/************** START CODE FOR CREATE CUSTOM POST WHOLESALE PRODUCT ******************/ 

// function codex_wholesale_products() {
  // $labels = array(
    // 'name' => 'Wholesale Products',
    // 'singular_name' => 'Wholesale Products',
    // 'add_new' => 'Add Wholesale Products',
    // 'add_new_item' => 'Add New Wholesale Products',
    // 'edit_item' => 'Edit Wholesale Products',
    // 'new_item' => 'New Wholesale Products',
    // 'all_items' => 'All Wholesale Products',
    // 'view_item' => 'View Wholesale Products',
    // 'search_items' => 'Search Wholesale Products',
    // 'not_found' =>  'No Wholesale Products found',
    // 'not_found_in_trash' => 'No Wholesale Products found in Trash', 
    // 'parent_item_colon' => '',
    // 'menu_name' => 'Wholesale Products'
  // );

  // $args = array(
    // 'labels' => $labels,
    // 'public' => true,
    // 'publicly_queryable' => true,
    // 'show_ui' => true, 
    // 'show_in_menu' => true, 
    // 'query_var' => true,
    // 'rewrite' => array( 'slug' => 'wholesale_products' ), 
    // 'capability_type' => 'post',
    // 'has_archive' => true, 
    // 'hierarchical' => false,
    // 'menu_position' => null,
	// 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  // ); 

  // register_post_type( 'wholesale_products', $args );
// }
//add_action( 'init', 'codex_wholesale_products' ); 

/************** END OF CODE FOR CREATE CUSTOM POST WHOLESALE PRODUCT ******************/ 

/************** START CODE FOR CREATE CUSTOM POST RECENT PROJECTS ******************/ 

function codex_recent_projects() {
  $labels = array(
    'name' => 'Recent Projects ',
    'singular_name' => 'Recent Projects',
    'add_new' => 'Add Recent Projects',
    'add_new_item' => 'Add New Recent Projects',
    'edit_item' => 'Edit Recent Projects',
    'new_item' => 'New Recent Projects',
    'all_items' => 'All Recent Projects',
    'view_item' => 'View Recent Projects',
    'search_items' => 'Search Recent Projects',
    'not_found' =>  'No Recent Projects found',
    'not_found_in_trash' => 'No Recent Projects found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Recent Projects'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'recent_projects' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'recent_projects', $args );
}
add_action( 'init', 'codex_recent_projects' ); 

/************** END OF CODE FOR CREATE CUSTOM POST RECENT PROJECTS ******************/ 


/****************************START CREATING CUSTOM POST MANUFACTURING WITH CATEGORY ********************************/

function my_custom_post_manufacturing() {
$labels = array(
  'name' => 'manufacturing',
  'singular_name' => 'manufacturing',
  'add_new' => 'Add manufacturing',
  'add_new_item' => 'Add manufacturing',
  'edit_item' => 'Edit manufacturing',
  'new_item' => 'New manufacturing',
  'all_items' => 'All manufacturing',
  'view_item' => 'View manufacturing',
  'search_items' => 'Search manufacturing',
  'not_found' =>  'No manufacturingfound',
  'not_found_in_trash' => 'No manufacturing found in Trash', 
  'parent_item_colon' => '',
  'menu_name' => 'Manufacturing'
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true, 
  'show_in_menu' => true, 
  'query_var' => true,
  'capability_type' => 'post',
  'has_archive' => true, 
  'hierarchical' => false,
  'menu_position' => null,
  'show_admin_column' => true,
  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
); 

register_post_type( 'manufacturing', $args ); 
}  
add_action( 'init', 'my_custom_post_manufacturing' );

function my_taxonomies_manufacturing() {
 $labels = array(
   'name' =>  'manufacturing Categories',
'add_new_item' => 'Add New manufacturing category',
'search_items' => 'Search manufacturing Categories',
'edit_item' => 'Edit manufacturing Category',
   'menu_name' =>  'manufacturing Categories'
 );
 $args = array(
   'labels' => $labels,
   'hierarchical' => true,
   'show_admin_column' => true,
 );
 register_taxonomy( 'manufacturing_category', 'manufacturing', $args );
}
add_action( 'init', 'my_taxonomies_manufacturing');

/****************************END OF CREATING CUSTOM POST MANUFACTURING WITH CATEGORY ********************************/

/************** START CODE FOR CREATE CUSTOM POST FAQ ******************/ 

function codex_faq() {
  $labels = array(
    'name' => 'FAQ ',
    'singular_name' => 'FAQ',
    'add_new' => 'Add FAQ',
    'add_new_item' => 'Add New FAQ',
    'edit_item' => 'Edit FAQ',
    'new_item' => 'New FAQ',
    'all_items' => 'All FAQ',
    'view_item' => 'View FAQ',
    'search_items' => 'Search FAQ',
    'not_found' =>  'No FAQ found',
    'not_found_in_trash' => 'No FAQ found in Trash', 
    'parent_item_colon' => '',
	'menu_icon' => 'dashicons-cart',
    'menu_name' => 'FAQ'  
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faq' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'faq', $args );
}
add_action( 'init', 'codex_faq' );   

/************** END OF CODE FOR CREATE CUSTOM POST FAQ ******************/ 


/****************************START CREATING CUSTOM POST WHOLESALE PRODUCTS WITH CATEGORY ********************************/

function my_custom_post_wholesale() {
$labels = array(
  'name' => 'wholesale',
  'singular_name' => 'wholesale',
  'add_new' => 'Add wholesale',
  'add_new_item' => 'Add wholesale',
  'edit_item' => 'Edit wholesale',
  'new_item' => 'New wholesale',
  'all_items' => 'All wholesale',
  'view_item' => 'View wholesale',
  'search_items' => 'Search wholesale',
  'not_found' =>  'No wholesale found',
  'not_found_in_trash' => 'No wholesale found in Trash', 
  'parent_item_colon' => '',
  'menu_name' => 'Wholesale'
);

$args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true, 
  'show_in_menu' => true, 
  'query_var' => true,
  'capability_type' => 'post',
  'has_archive' => true, 
  'hierarchical' => false,
  'menu_position' => null,
  'show_admin_column' => true,
  'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
); 

register_post_type( 'wholesale', $args ); 
}  
add_action( 'init', 'my_custom_post_wholesale' );

function my_taxonomies_wholesale() {
 $labels = array(
   'name' =>  'wholesale Categories',
'add_new_item' => 'Add New wholesale category',
'search_items' => 'Search wholesale Categories',
'edit_item' => 'Edit wholesale Category',
   'menu_name' =>  'Wholesale Categories'
 );
 $args = array(
   'labels' => $labels,
   'hierarchical' => true,
   'show_admin_column' => true,
 );
 register_taxonomy( 'wholesale_category', 'wholesale', $args );
}
add_action( 'init', 'my_taxonomies_wholesale');

/****************************END OF CREATING CUSTOM POST WHOLESALE PRODUCTS WITH CATEGORY ********************************/



/*****************START ADD GOOGLE API********************/

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyB7XPVX2w3Q22FgcxuCDibIkDQbUwmo-88';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*****************END OF ADD GOOGLE API********************/



/**************************Start Wordpress Logo Function*******************************************/

function my_loginlogo()
{
echo '<style type="text/css">
  h1 a {
    background-image: url(' . get_template_directory_uri() . '/images/logo-footer.png) !important;
       background-size: cover !important;
   
  }
</style>';
}
add_action('login_head', 'my_loginlogo');

function put_my_url()
{
  return site_url();
}
add_filter('login_headerurl', 'put_my_url');

/**************************End of Wordpress Logo Function***************************************************/


