<?php
/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage birdMAGAZINE
 * @since birdMAGAZINE 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
	<div class="entry">
		<div class="entry-inner">
			<?php if (have_posts()) : ?>
				<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>

				<ul class="articles">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content', 'archive' ); ?>
					<?php endwhile; ?>
				</ul>

			<?php else: ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'birdmagazine' ); ?></p>
			<?php endif; ?>

		</div>
	</div>

	<?php the_posts_pagination( array( 'mid_size' => 3 ) ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
