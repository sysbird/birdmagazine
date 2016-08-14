<?php
/**
 * The template for displaying all single posts and pages
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
get_header(); ?>

<div id="main">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>

				<?php wp_link_pages( array(
					'before'		=> '<div class="page-link">' . __( 'Pages:', 'birdmagazine' ),
					'after'			=> '</div>',
					'link_before'	=> '<span>',
					'link_after'	=> '</span>'
					) ); ?>
			</div>

			<?php
				 $birdmagazine_enable_comments = '';
				if ( comments_open() || get_comments_number() ) {
					$birdmagazine_enable_comments = 'enable-comments';
				}
			?>

			<?php if( is_single() ): ?>

				<footer class="entry-meta <?php echo $birdmagazine_enable_comments; ?>">

					<span class="icon postdate"><time datetime="<?php echo get_the_time('Y-m-d') ?>" pubdate><?php echo get_post_time(get_option('date_format')); ?></time></span><br>

					<span class="icon author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span><br>

					<span class="icon category"><?php the_category(', ') ?></span><br>

					<?php the_tags('<span class="icon tag">', ', ', '</span><br>') ?>

				</footer>
			<?php endif; ?>


			<?php if ( $birdmagazine_enable_comments === 'enable-comments' ) {
				comments_template();
			} ?>
		</article>

	<?php endwhile; ?>

	<?php if( is_single() ): // Only Display Navigatio for Single ?>
		<?php the_post_navigation(); ?>
	<?php endif; ?>

</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
