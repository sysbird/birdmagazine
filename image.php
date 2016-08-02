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
				<?php if ( has_excerpt() ) : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="entry-attachment">
					<?php
						$image_size = apply_filters( 'twentysixteen_attachment_size', 'large' );
						echo wp_get_attachment_image( get_the_ID(), $image_size );
					?>
				</div>

				<?php the_content(); ?>

				<div class="nav-links">
					<div class="nav-previous"><?php next_image_link( false, __( 'Next Image' , 'birdmagazine' )); ?></div>
					<div class="nav-next"><?php previous_image_link( false, __( 'Previous Image' , 'birdmagazine' ) ); ?></div>
				</div>
			</div>

			<footer class="entry-meta">

				<span class="icon postdate"><time datetime="<?php echo get_the_time('Y-m-d') ?>" pubdate><?php echo get_post_time(get_option('date_format')); ?></time></span><br>

				<div class="icon parent-post-link"><a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></div>

			</footer>

			<?php if ( comments_open() || get_comments_number() ) {
					comments_template();
				} ?>
		</article>

	<?php endwhile;	?>

</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
