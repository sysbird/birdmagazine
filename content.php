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
	<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		<?php the_title( '<div class="entry-title">', '</div>' ); ?>
		<?php birdmagazine_entry_meta(); ?>
	</a>
</li><!-- #post -->
