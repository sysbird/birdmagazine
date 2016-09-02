<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
get_header(); ?>
<div id="main">

	<ul class="articles">
		<?php while ( have_posts() ) : the_post(); ?>

			<li id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<header class="entry-header">
					<div class="postdate"><span class="screen-reader-text"><?php _e( 'published in', 'birdmagazine' ); ?></span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdmagazine' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><time datetime="<?php echo get_the_time('Y-m-d') ?>" pubdate><?php echo get_post_time(get_option('date_format')); ?></time></a>
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

				<?php birdmagazine_entry_meta(); ?>
			</li><!-- #post -->

		<?php endwhile; ?>
	</ul>

	<?php the_posts_pagination( array( 'mid_size' => 3 ) ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
