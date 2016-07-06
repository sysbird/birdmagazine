<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage birdMAGAZINE
 * @since birdMAGAZINE 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
	<div class="entry">
		<div class="entry-inner">
			<header class="page-header">
				<h1 class="page-title"><?php _e('Error 404 - Not Found', 'birdmagazine'); ?></h1>
			</header>

			<h2><?php _e( 'Recent Articles', 'birdmagazine' ); ?></h2>
			<?php query_posts('cat=&showposts=10'); ?>
			<ul class="articles">
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', 'archive' ); ?>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
