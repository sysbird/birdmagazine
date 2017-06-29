<?php
/**
 * The home template for displaying content
 *
 * @package WordPress
  * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
*/
?>

<header class="entry-header">
	<div class="postdate"><span class="screen-reader-text"><?php _e( 'published in', 'birdmagazine' ); ?></span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><time datetime="<?php echo get_the_time('Y-m-d') ?>"><?php echo get_post_time(get_option('date_format')); ?></time></a>
	</div>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</header><!-- .entry-header -->

<div class="entry-content">

	<?php if( has_post_thumbnail() ): ?>
		<div class="entry-eyecatch"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a></div>
	<?php endif; ?>

	<?php if ( is_sticky() ):
		the_content();
	else:
		the_excerpt();
	endif; ?>

	<?php wp_link_pages( array(
		'before'		=> '<div class="page-link">' . __( 'Pages:', 'birdmagazine' ),
		'after'		=> '</div>',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>'
		) ); ?>

</div><!-- .entry-content -->

<footer class="entry-meta">
	<?php birdmagazine_entry_meta(); ?>
</footer><!-- .entry-footer -->