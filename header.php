<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" >
<meta name="viewport" content="width=device-width" >
<link rel="profile" href="http://gmpg.org/xfn/11" >
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>

<?php
	// The header text
	$birdmagazine_header_text = '';
	if ( !display_header_text() ) {
		$birdmagazine_header_text .= 'no-header-text';
	}

	if( is_home() ){
		$birdmagazine_layout = get_theme_mod( 'birdmagazine_layout', 'normal' );
		if( !($birdmagazine_layout  === 'normal' )){
			$birdmagazine_header_text .= ' ' .$birdmagazine_layout;
		}
	}
?>
</head>
<body <?php body_class( $birdmagazine_header_text ); ?>>

<div class="wrapper">

	<header id="header">

		<?php $birdmagazine_header_image = get_header_image(); ?>
		<?php if( is_home() && ! is_paged() && ! empty( $birdmagazine_header_image ) ): ?>
			<div class="header-image">
			<img src="<?php echo esc_url( $birdmagazine_header_image ); ?>" alt="<?php bloginfo( 'name' ); ?>" >
			</div>
		<?php endif; ?>

		<div class="container">
			<div id="branding">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $heading_tag; ?>>
				<p id="site-description"><?php bloginfo( 'description' ); ?></p>
			</div>

			<nav id="menu-wrapper">
				<?php wp_nav_menu( array( 'theme_location'	=> 'primary',
								'container_class'	=> 'menu',
								'menu_class'		=> '',
								'menu_id'			=> 'menu-primary-items',
								'items_wrap'		=> '<button id="small-menu" type="button"><span class="icon"></span></button><ul id="%1$s" class="%2$s">%3$s</ul>',
								'fallback_cb'		=> '' ) ); ?>
			</nav>
		</div>
	</header>

	<div id="content">
		<?php birdmagazine_content_header(); ?>
		<div class="container">
