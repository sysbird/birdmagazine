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
if ( ! isset( $content_width ) ){
	$content_width = 620;
}

if ( ! function_exists( 'sketch_setup' ) ) :
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
	$birdmagazine_default_colors = birdmagazine_get_default_colors();
	$birdmagazine_color = trim( $birdmagazine_default_colors[ 'background_color' ], '#' );
	add_theme_support( 'custom-background', array(
		'default-color' => $birdmagazine_color,
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'birdmagazine' ),
	) );

	// Add support for title tag.
	add_theme_support( 'title-tag' );

	// Add support for custom headers.
	$birdmagazine_color = trim( $birdmagazine_default_colors[ 'text_color' ], '#' );
	$custom_header_support = array(
		'width'			=> apply_filters( 'birdmagazine_header_image_width', 960 ),
		'height'			=> apply_filters( 'birdmagazine_header_image_height', 200 ),
		'default-image'		=> '%s/images/headers/euphorbia.jpg',
		'default-text-color'	=> $birdmagazine_color
	);

	add_theme_support( 'custom-header', $custom_header_support );

	register_default_headers( array(
		'alocasia' => array(
			'url' => '%s/images/headers/alocasia.jpg',
			'thumbnail_url' => '%s/images/headers/alocasia-thumbnail.jpg',
			'description' => 'Alocasia'
		)
	) );
}
endif; // birdmagazine_setup
add_action( 'after_setup_theme', 'birdmagazine_setup' );

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
// Enqueue Scripts
function birdmagazine_scripts() {

	wp_enqueue_script( 'birdmagazine-html5', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.2' );
	wp_script_add_data( 'birdmagazine-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option('thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'birdmagazine', get_template_directory_uri() .'/js/birdmagazine.js', array( 'jquery', 'jquery-masonry' ), '1.03' );

	wp_enqueue_style( 'birdmagazine', get_stylesheet_uri() );

	if ( strtoupper( get_locale() ) == 'JA' ) {
		wp_enqueue_style( 'birdmagazine_ja', get_template_directory_uri().'/css/ja.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_scripts' );

//////////////////////////////////////////////////////
// Excerpt More
function birdmagazine_excerpt_more( $more ) {
	return ' <a href="'. esc_url( get_permalink() ) . '" class="more-link">' . __( 'more', 'birdmagazine') . '</a>';
}
add_filter('excerpt_more', 'birdmagazine_excerpt_more');

//////////////////////////////////////////////////////
// Theme Customizer
function birdmagazine_customize( $wp_customize ) {

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// defaut colors
	$birdmagazine_default_colors = birdmagazine_get_default_colors();

	// Text Color
	$wp_customize->add_setting( 'birdmagazine_text_color', array(
		'default'			=> $birdmagazine_default_colors[ 'text_color' ],
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_text_color', array(
		'label'		=> __( 'Text Color', 'birdmagazine' ),
		'section'	=> 'colors',
		'settings'	=> 'birdmagazine_text_color',
	) ) );

	// Link Color
	$wp_customize->add_setting( 'birdmagazine_link_color', array(
		'default'		=> $birdmagazine_default_colors[ 'link_color' ],
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_link_color', array(
		'label'		=> __( 'Link Color', 'birdmagazine' ),
		'section'	=> 'colors',
		'settings'	=> 'birdmagazine_link_color',
	) ) );

	// HeaderColor
	$wp_customize->add_setting( 'birdmagazine_header_color', array(
		'default'			=> $birdmagazine_default_colors[ 'header_color' ],
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_header_color', array(
		'label'		=> __( 'Header Background Color', 'birdmagazine' ),
		'section'	=> 'colors',
		'settings'	=> 'birdmagazine_header_color',
	) ) );

	// Header Text Color
	$wp_customize->add_setting( 'birdmagazine_header_text_color', array(
		'default'		=> $birdmagazine_default_colors[ 'header_text_color' ],
		'sanitize_callback'	=> 'maybe_hash_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'birdmagazine_header_text_color', array(
		'label'		=> __( 'Header Text Color', 'birdmagazine' ),
		'section'	=> 'colors',
		'settings'	=> 'birdmagazine_header_text_color',
	) ) );

	// Layout Section
	$wp_customize->add_section( 'birdmagazine_layout', array(
		'title'		=> __( 'Layout', 'birdmagazine' ),
		'priority'	=> 999,
	) );

	$wp_customize->add_setting( 'birdmagazine_layout', array(
		'default'		=> 'normal',
		'sanitize_callback'	=> 'birdmagazine_sanitize_radiobutton',
	) );

	$wp_customize->add_control( 'birdmagazine_layout', array(
		'label'		=> __( 'Front page Layout', 'birdmagazine' ),
		'section'	=> 'birdmagazine_layout',
		'type'		=> 'radio',
		'settings'	=> 'birdmagazine_layout',
		'choices'	=> array(
					'normal'	=> __( 'normal', 'birdmagazine' ),
					'masonry'	=> __( 'masonry', 'birdmagazine' ),
					)
	) );

	// Display Copyright
	$wp_customize->add_setting( 'birdmagazine_copyright', array(
		'default'		=> true,
		'sanitize_callback'	=> 'birdmagazine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'birdmagazine_copyright', array(
		'label'		=> __( 'Display Copyright', 'birdmagazine' ),
		'section'	=> 'birdmagazine_layout',
		'type'		=> 'checkbox',
		'settings'	=> 'birdmagazine_copyright',
	) );

	// Display Credit
	$wp_customize->add_setting( 'birdmagazine_credit', array(
		'default'		=> true,
		'sanitize_callback'	=> 'birdmagazine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'birdmagazine_credit', array(
		'label'		=> __( 'Display Credit', 'birdmagazine' ),
		'section'	=> 'birdmagazine_layout',
		'type'		=> 'checkbox',
		'settings'	=> 'birdmagazine_credit',
	) );
}
add_action('customize_register', 'birdmagazine_customize');

//////////////////////////////////////////////////////
// Santize a checkbox
function birdmagazine_sanitize_checkbox( $input ) {

	if ( $input == true ) {
		return true;
	} else {
		return false;
	}
}

//////////////////////////////////////////////////////
// Santize a checkbox
function birdmagazine_sanitize_radiobutton( $input ) {

	if ( $input === 'masonry' ) {
		return $input;
	} else {
		return 'normal';
	}
}

//////////////////////////////////////////////////////
// Get default colors
function birdmagazine_get_default_colors() {
	return array( 'background_color'	=> '#f4f4f4',
					'text_color'		=> '#333333',
					'link_color'		=> '#1c4bbe',
					'header_color'		=> '#E5E5E5',
					'header_text_color'	=> '#aa3300' );
}

//////////////////////////////////////////////////////
// Enqueues front-end CSS for the text color.
function birdmagazine_text_color_css() {

	$birdmagazine_default_colors = birdmagazine_get_default_colors();
	$birdmagazine_color = get_theme_mod( 'birdmagazine_text_color', $birdmagazine_default_colors[ 'text_color' ] );

	// Don't do anything if the current color is the default.
	if ( $birdmagazine_color === $birdmagazine_default_colors[ 'text_color' ] ) {
		return;
	}

	$birdmagazine_css = "
		/* Custom Text Color */
		body,
		.entry-header .entry-title,
		.entry-header .entry-title a,
		.page-header .page-title,
		.page-header .page-title a,
		.entry-meta a,
		.archive ul.articles li a,
		.search ul.articles li a,
		.error404 ul.articles li a,
		.pagination .a,
		.pagination span,
		.page-link,
		.page-link a span {
			color: {$birdmagazine_color};
		}

		hr,
		#comments ol.commentlist li.comment.bypostauthor .comment-author .fn {
			background-color: {$birdmagazine_color};
		}
	";

	wp_add_inline_style( 'birdmagazine', $birdmagazine_css );
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_text_color_css', 11 );

//////////////////////////////////////////////////////
// Enqueues front-end CSS for the link color.
function birdmagazine_link_color_css() {

	$birdmagazine_default_colors = birdmagazine_get_default_colors();
	$birdmagazine_color = get_theme_mod( 'birdmagazine_link_color', $birdmagazine_default_colors[ 'link_color' ] );

	// Don't do anything if the current color is the default.
	if ( $birdmagazine_color === $birdmagazine_default_colors[ 'link_color' ] ) {
		return;
	}

	$birdmagazine_css = "
		/* Custom Link Color */
		a,
		.pagination a:hover,
		.pagination span.current,
		.page-link span,
		.page-link a span:hover,
		.home .sticky .entry-title a {
			color: {$birdmagazine_color};
		}

		.pagination span.current,
		.pagination a:hover,
		.page-link span,
		.page-link a span:hover {
			border-color: {$birdmagazine_color};
		}
	";

	wp_add_inline_style( 'birdmagazine', $birdmagazine_css );
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_link_color_css', 11 );

//////////////////////////////////////////////////////
// Enqueues front-end CSS for the header color.
function birdmagazine_header_color_css() {

	$birdmagazine_default_colors = birdmagazine_get_default_colors();
	$birdmagazine_color = get_theme_mod( 'birdmagazine__header_color', $birdmagazine_default_colors[ 'header_color' ] );

	// Don't do anything if the current color is the default.
	if ( $birdmagazine_color === $birdmagazine_default_colors[ 'header_color' ] ) {
		return;
	}

	$birdmagazine_css = "
		/* Custom Header Color */
		#header,
		#footer .widget-wrapper {
			background: {$birdmagazine_color};
		}

		#menu-wrapper .menu #small-menu,
		#footer #searchform #searchsubmit,
		#footer .widget-wrapper .widget #wp-calendar tbody td a,
		#footer .site-title,
		#footer .site-title a {
			color: {$birdmagazine_color};
		}

		@media screen and (min-width: 660px) {
			#menu-wrapper .menu ul#menu-primary-items li ul li a {
				background: {$birdmagazine_color};
			}
		}
	";

	wp_add_inline_style( 'birdmagazine', $birdmagazine_css );
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_header_color_css', 11 );

//////////////////////////////////////////////////////
// Enqueues front-end CSS for the header text color.
function birdmagazine_header_text_color_css() {

	$birdmagazine_default_colors = birdmagazine_get_default_colors();
	$birdmagazine_color = get_theme_mod( 'birdmagazine_header_text_color', $birdmagazine_default_colors[ 'header_text_color' ] );

	// Don't do anything if the current color is the default.
	if ( $birdmagazine_color === $birdmagazine_default_colors[ 'header_text_color' ] ) {
		return;
	}

	$birdmagazine_css = "
		/* Custom Header Text Color */
		#header,
		#header a,
		#menu-wrapper .menu ul#menu-primary-items li a,
		#footer .widget,
		#footer .widget a,
		#footer #searchform #s {
			color: {$birdmagazine_color};
		}

		.wrapper,
		#menu-wrapper .menu ul#menu-primary-items li ul,
		#menu-wrapper .menu ul#menu-primary-items li ul li a,
		#menu-wrapper .menu ul#menu-primary-items li a,
		#footer .widget h3,
		#footer .widget ul li,
		#footer #searchform #s {
			border-color: {$birdmagazine_color};
		}

		html,
		#menu-wrapper .menu #small-menu,
		#footer .widget-wrapper .widget #wp-calendar tbody td a,
		#footer #searchform #searchsubmit,
		#footer .site-title {
			background: {$birdmagazine_color};
		}
	";

	wp_add_inline_style( 'birdmagazine', $birdmagazine_css );
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_header_text_color_css', 11 );

//////////////////////////////////////////////////////
// Enqueues front-end CSS for the entry border color.
function birdmagazine_entry_border_color_css() {

	$birdmagazine_color = get_background_color();
	if( $birdmagazine_color === 'ffffff' ){
		$birdmagazine_css = "
			/* Border Color */
			.entry {
				border-top: solid 1px #dddddd;
				border-right: solid 1px #dddddd;
				border-left: solid 1px #dddddd;
			}
		";

		wp_add_inline_style( 'birdmagazine', $birdmagazine_css );
	}
}
add_action( 'wp_enqueue_scripts', 'birdmagazine_entry_border_color_css', 11 );

//////////////////////////////////////////////////////
// Copyright Year
function birdmagazine_get_copyright_year() {

	$birdmagazine_copyright_year = date( "Y" );

	$birdmagazine_first_year = $birdmagazine_copyright_year;
	$args = array(
		'numberposts'	=> 1,
		'orderby'	=> 'post_date',
		'order'		=> 'ASC',
	);
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$birdmagazine_first_year = mysql2date( 'Y', $post->post_date, true );
	}

	if( $birdmagazine_copyright_year <> $birdmagazine_first_year ){
		$birdmagazine_copyright_year = $birdmagazine_first_year .' - ' .$birdmagazine_copyright_year;
	}

	return $birdmagazine_copyright_year;
}

//////////////////////////////////////////////////////
// Removing the default gallery style
function birdmagazine_gallery_atts( $out, $pairs, $atts ) {

	$atts = shortcode_atts( array( 'size' => 'medium', ), $atts );
	$out['size'] = $atts['size'];

	return $out;
}
add_filter( 'shortcode_atts_gallery', 'birdmagazine_gallery_atts', 10, 3 );
add_filter( 'use_default_gallery_style', '__return_false' );
