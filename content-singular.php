<?php
/**
 * The template part for displaying single posts and pages
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
?>

<div class="entry-inner">
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before'		=> '<div class="page-links">' . __( 'Pages:', 'birdfield' ),
			'after'			=> '</div>',
			'link_before'	=> '<span>',
			'link_after'	=> '</span>'
			) ); ?>
	</div>
</div><!-- .entry-inner -->

<?php if( is_single() ): // Only Display Excerpts for Single ?>
	<footer class="entry-meta">

		<div class="icon postdate"><time datetime="<?php echo get_the_time('Y-m-d') ?>" pubdate><?php echo get_post_time(get_option('date_format')); ?></time></div>

		<div class="icon author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></div>

		<div class="icon category"><?php the_category(', ') ?></div>
		<?php the_tags('<div class="icon tag">', ', ', '</div>') ?>

	</footer>
<?php endif; ?>

