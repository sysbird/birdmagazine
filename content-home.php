<?php
/**
 * The default template for displaying content.
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<div class="entry-inner">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php if( has_post_thumbnail() ):
				$birdmagazine_thumbnail_size = 'medium';
				if ( is_sticky() ):
					$birdmagazine_thumbnail_size = 'thumbnail';
				endif;
			?>
				<div class="entry-eyecatch"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $birdmagazine_thumbnail_size ); ?></a></div>
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
	</div><!-- .entry-inner -->

	<footer class="entry-meta entry-inner">
		<span class="icon postdate"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><time datetime="<?php echo get_the_time('Y-m-d') ?>" pubdate><?php echo get_post_time(get_option('date_format')); ?></time></a></span>

		<span class="icon author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>

		<span class="icon category"><?php the_category(', ') ?></span>

		<?php if ( comments_open() ) : ?>
			<span class="icon comment"><?php comments_popup_link(__('No Comments', 'birdmagazine'), __('1 Comment', 'birdmagazine'), __('% Comments', 'birdmagazine'), '', __('Comments Closed', 'birdmagazine') ); ?></span>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</li><!-- #post -->
