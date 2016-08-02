<?php
/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage birdMAGAZINE
 * @since birdMAGAZINE 1.0
 */
get_header(); ?>

<div id="main">
	<div class="entry">
		<?php if (have_posts()) : ?>
			<?php if( is_archive() ): ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>
			<?php endif; ?>

			<ul class="articles">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			</ul>

		<?php else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'birdmagazine' ); ?></p>
		<?php endif; ?>

	</div>

	<?php the_posts_pagination( array( 'mid_size' => 3 ) ); ?>

</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
