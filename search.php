<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
	<div class="entry">
		<div class="entry-inner">

			<?php if (have_posts()) : ?>
				<header class="page-header">
					<h1 class="entry-title"><?php printf(__('Search Results: %s', 'birdmagazine'), esc_html($s) ); ?></h1>
				</header>

				<ul class="articles">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content', 'archive' ); ?>
					<?php endwhile; ?>
				</ul>

			<?php else: ?>
				<p><?php printf(__('Sorry, no posts matched &#8216;%s&#8217;', 'birdmagazine'), esc_html($s) ); ?>
			<?php endif; ?>

		</div>
	</div>
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
