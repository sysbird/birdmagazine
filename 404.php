<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage birdMAGAZINE
 * @since birdMAGAZINE 1.0
 */
get_header(); ?>

<div id="main">
	<div class="entry">
		<header class="page-header">
			<h1 class="page-title"><?php _e('Error 404 - Not Found', 'birdmagazine'); ?></h1>
		</header>
		<?php get_search_form(); ?>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
