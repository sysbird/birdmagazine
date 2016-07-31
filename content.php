<?php
/**
 * The template for displaying content. Used for archive/search.
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
?>

<li  id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<a href="<?php the_permalink() ?>" rel="bookmark">
		<span><?php the_title(); ?></span>
		<em><?php echo get_post_time(get_option('date_format')); ?></em>
	</a>
</li>
