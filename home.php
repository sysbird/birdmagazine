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
				<?php get_template_part( 'content', 'home' ); ?>
			</li><!-- #post -->

		<?php endwhile; ?>
	</ul>

	<?php the_posts_pagination( array( 'mid_size' => 3 ) ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
