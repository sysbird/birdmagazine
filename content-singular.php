<?php
/**
 * The template part for displaying single posts and pages
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>

<div class="entry-content">
	<?php the_content(); ?>

	<?php wp_link_pages( array(
		'before'		=> '<div class="page-link">' . __( 'Pages:', 'birdmagazine' ),
		'after'			=> '</div>',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>'
		) ); ?>
</div>

<?php if( is_single() ): // Only Display Meta for Single ?>
<?php
	 $birdmagazine_has_comments = '';
	if ( comments_open() || get_comments_number() ) {
		$birdmagazine_has_comments = 'has-comments';
	}
?>

	<footer class="entry-meta <?php echo $birdmagazine_has_comments; ?>">

		<span class="icon postdate"><time datetime="<?php echo get_the_time('Y-m-d') ?>" pubdate><?php echo get_post_time(get_option('date_format')); ?></time></span><br>

		<span class="icon author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span><br>

		<span class="icon category"><?php the_category(', ') ?></span><br>

		<?php the_tags('<span class="icon tag">', ', ', '</span><br>') ?>

	</footer>
<?php endif; ?>

