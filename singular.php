<?php
/**
 * The template for displaying all single posts and pages
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
get_header(); ?>

<div id="primary" class="content-area">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
			<?php get_template_part( 'content', 'singular' ); ?>
			<?php if ( comments_open() || get_comments_number() ) {
				comments_template();
			} ?>
		</article>

	<?php endwhile; ?>

	<?php if( is_single() ): // Only Display Navigatio for Single ?>
		<?php the_post_navigation(); ?>
	<?php endif; ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
