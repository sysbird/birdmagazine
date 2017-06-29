<?php
/**
 * The template for displaying content. Used for archive/search.
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<div class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div>
	<?php the_excerpt(); ?>
	<div class="postdate"><span class="screen-reader-text"><?php _e( 'published in', 'birdmagazine' ); ?></span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><time datetime="<?php echo get_the_time('Y-m-d') ?>"><?php echo get_post_time(get_option('date_format')); ?></time></a>
	</div>

</li><!-- #post -->
