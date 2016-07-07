<?php
/**
 * The template functions and definitions
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
//////////////////////////////////////////
// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 629;

//////////////////////////////////////////
// Set Widgets
function birdmagazine_widgets_init() {

	register_sidebar( array (
		'name'			=>__( 'Widget Area for sidebar', 'birdmagazine' ),
		'id'			=> 'widget-area',
		'description'	=> __( 'Widget Area for sidebar', 'birdmagazine' ),
		'before_widget'	=> '<div class="widget">',
		'after_widget' 	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
		) );

	register_sidebar( array (
		'name'			=> __( 'Widget Area for footer', 'birdmagazine' ),
		'id'			=> 'widget-area-footer',
		'description'	=> __( 'Widget Area for footer', 'birdmagazine' ),
		'before_widget'	=> '<div class="widget">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
		) );
}
add_action( 'widgets_init', 'birdmagazine_widgets_init' );

//////////////////////////////////////////////////////
// Header Style
function birdmagazine_header_style() {

?>

<style type="text/css">

<?php
	//Theme Option
	$header_color = get_theme_mod( 'birdmagazine_header_color', '#5EC1D6');
	$navigation_color = get_theme_mod( 'birdmagazine_navigation_color', '#999');
	$link_color = get_theme_mod( 'birdmagazine_link_color', '#06A');
	$text_color = get_theme_mod( 'birdmagazine_text_color', '#544021');

	if ( 'blank' == get_header_textcolor() ) { ?>
		#header #site-title,
		#header #site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
			}
		#header #branding {
			padding: 0;
			}
	<?php } else { ?>
		#header h1 a,
		#header #site-title a,
		#header p {
			color: #<?php header_textcolor();?>;
			}
		<?php } ?>

	#wrapper,
	#content .hentry .entry-header .entry-title,
	#content .hentry .entry-header .entry-title a,
	.archive #content ul li a, .search #content ul li a,
	.error404 #content ul li a,
	.widget ul li a,
	.widget #wp-calendar th, .widget #wp-calendar td {
		color: <?php echo $text_color; ?>;
	}

	a,
	#content .hentry .page-link,
	#content .hentry .page-link a,
	#content .tablenav,
	#content .tablenav a.page-numbers,
	.widget #wp-calendar th a, .widget #wp-calendar td a {
		color: <?php echo $link_color; ?>;
	}

	#content .hentry .page-link a,
	#content .tablenav a.page-numbers,
	#content .tablenav .current {
		border-color: <?php echo $link_color; ?>;
	}

	#content .tablenav .current {
		background-color: <?php echo $link_color; ?>;
	}

	#wrapper,
	#sidebar .widget h3,
	#sidebar .widget #searchform #s {
		border-color: <?php echo $header_color; ?>;
	}

	#sidebar .widget #searchform #searchsubmit,
	#footer {
		background-color: <?php echo $header_color; ?>;
	}

	#menu-wrapper .menu,
	#menu-wrapper .menu ul li a,
	#menu-wrapper .menu ul li ul,
	#menu-wrapper .menu ul li ul li a,
	#menu-wrapper .menu ul li a {
	    color: <?php echo $navigation_color; ?>;
		border-color: <?php echo $navigation_color; ?>;
	}

	@media screen and (max-width: 650px) {
		#menu-wrapper .menu ul#menu-primary-items,
		#menu-wrapper .menu ul#menu-primary-items li a,
		#menu-wrapper .menu #small-menu {
			border-color: <?php echo $navigation_color; ?>;
		}
	}

</style>

<?php

}

//////////////////////////////////////////////////////
// Setup Theme
function birdmagazine_setup() {

	// Set languages
	load_theme_textdomain( 'birdmagazine', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Set feed
	add_theme_support( 'automatic-feed-links' );

	// This theme uses post thumbnails
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

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'f9f9ef',
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'birdmagazine' ),
	) );

	// Add support for title tag.
	add_theme_support( 'title-tag' );

	// Add support for custom headers.
	$custom_header_support = array(
		'width' => apply_filters( 'birdmagazine_header_image_width', 960 ),
		'height' => apply_filters( 'birdmagazine_header_image_height', 200 ),
		'default-image'          => '%s/images/headers/euphorbia.jpg',
		'default-text-color'     => 'aa3300',
		'wp-head-callback' => 'birdmagazine_header_style',
	);

	add_theme_support( 'custom-header', $custom_header_support );

	register_default_headers( array(
		'alocasia' => array(
			'url' => '%s/images/headers/alocasia.jpg',
			'thumbnail_url' => '%s/images/headers/alocasia-thumbnail.jpg',
			'description' => 'Alocasia'
		),
		'calathea' => array(
			'url' => '%s/images/headers/calathea.jpg',
			'thumbnail_url' => '%s/images/headers/calathea-thumbnail.jpg',
			'description' => 'Calathea'
		),
		'euphorbia' => array(
			'url' => '%s/images/headers/euphorbia.jpg',
			'thumbnail_url' => '%s/images/headers/euphorbia-thumbnail.jpg',
			'description' => 'Euphorbia'
		),
		'fatsia' => array(
			'url' => '%s/images/headers/fatsia.jpg',
			'thumbnail_url' => '%s/images/headers/fatsia-thumbnail.jpg',
			'description' => 'Fatsia'
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			'description' => 'Fern'
		),
		'mint' => array(
			'url' => '%s/images/headers/mint.jpg',
			'thumbnail_url' => '%s/images/headers/mint-thumbnail.jpg',
			'description' => 'Mint'
		),
	) );
}
add_action( 'after_setup_theme', 'birdmagazine_setup' );

//////////////////////////////////////////////////////
// Enqueue Acripts
function birdmagazine_scripts() {

	wp_enqueue_script( 'birdsite-html5', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.2' );
	wp_script_add_data( 'birdsite-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option('thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'birdmagazine', get_template_directory_uri() .'/js/birdmagazine.js', 'jquery', '1.03' );

	wp_enqueue_style( 'birdmagazine', get_stylesheet_uri() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css');

	if ( strtoupper( get_locale() ) == 'JA' ) {
		wp_enqueue_style( 'birdfield_ja', get_template_directory_uri().'/css/ja.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_scripts' );

//////////////////////////////////////////////////////
// Excerpt More
function birdmagazine_excerpt_more($more) {
	return ' <a href="'. esc_url( get_permalink() ) . '" class="more-link">' . __( '&raquo;more', 'birdmagazine') . '</a>';
}
add_filter('excerpt_more', 'birdmagazine_excerpt_more');

//////////////////////////////////////////////////////
// Theme Customizer
function birdmagazine_customize($wp_customize) {

	$wp_customize->add_section( 'birdmagazine_customize', array(
		'title'=> __( 'Theme Options', 'birdmagazine' ),
		'priority' => 99,
	) );

	// Text Color
	$wp_customize->add_setting( 'birdmagazine_text_color', array(
		'default' => '#544021',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_text_color', array(
		'label' => __( 'Text Color', 'birdmagazine' ),
		'section'=> 'birdmagazine_customize',
		'settings' => 'birdmagazine_text_color',
	) ) );

	// Link Color
	$wp_customize->add_setting( 'birdmagazine_link_color', array(
		'default' => '#06A',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_link_color', array(
		'label' => __( 'Link Color', 'birdmagazine' ),
		'section'=> 'birdmagazine_customize',
		'settings' => 'birdmagazine_link_color',
	) ) );

	// Header, Footer Color
	$wp_customize->add_setting( 'birdmagazine_header_color', array(
		'default' => '#5EC1D6',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_header_color', array(
		'label' => __( 'Header, Footer Color', 'birdmagazine' ),
		'section'=> 'birdmagazine_customize',
		'settings' => 'birdmagazine_header_color',
	) ) );

	// Navigation Text Color
	$wp_customize->add_setting( 'birdmagazine_navigation_color', array(
		'default' => '#999',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_navigation_color', array(
		'label' => __( 'Navigation Text Color', 'birdmagazine' ),
		'section'=> 'birdmagazine_customize',
		'settings' => 'birdmagazine_navigation_color',
	) ) );

}
add_action('customize_register', 'birdmagazine_customize');
