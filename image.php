<?php
/**
 * The template for displaying image attachments.
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
get_header(); ?>

<div id="main">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php if ( has_excerpt() ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>

				<div class="entry-attachment">
					<?php echo wp_get_attachment_image( get_the_ID(), 'full' ); ?>
				</div>

				<?php the_content(); ?>

			</div><!-- .entry-content -->

			<?php $birdmagazine_enable_comments = '';
			if ( comments_open() || get_comments_number() ) {
				$birdmagazine_enable_comments = 'enable-comments';
			}
			?>

			<footer class="entry-meta <?php echo $birdmagazine_enable_comments; ?>">
				<div class="icon postdate"><time datetime="<?php echo get_the_time('Y-m-d') ?>"><?php echo get_post_time(get_option('date_format')); ?></time></div>
				<div class="icon parent-post-link"><a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></div>
			</footer><!-- .entry-footer -->

			<?php if ( $birdmagazine_enable_comments === 'enable-comments' ): ?>
				<?php comments_template(); ?>
			<?php endif; ?>

		</article>

	<?php endwhile;	?>

	<div class="nav-links">
		<div class="nav-previous"><?php next_image_link( false, __( 'Next Image' , 'birdmagazine' )); ?></div>
		<div class="nav-next"><?php previous_image_link( false, __( 'Previous Image' , 'birdmagazine' ) ); ?></div>
	</div>

</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
