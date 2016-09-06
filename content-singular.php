<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
?>

<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header><!-- .entry-header -->

<div class="entry-content">
	<?php the_content(); ?>

	<?php wp_link_pages( array(
		'before'		=> '<div class="page-link">' . __( 'Pages:', 'birdmagazine' ),
		'after'			=> '</div>',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>'
		) ); ?>
</div><!-- .entry-content -->

<?php
	$birdmagazine_enable_comments = '';
	if ( comments_open() || get_comments_number() ) {
		$birdmagazine_enable_comments = 'enable-comments';
	}
?>

<?php if( is_single() ): // Only Display Excerpts for Single ?>
	<footer class="entry-meta <?php echo $birdmagazine_enable_comments; ?>">
		<?php birdmagazine_entry_meta(); ?>
	</footer><!-- .entry-footer -->
<?php endif; ?>

<?php if ( $birdmagazine_enable_comments === 'enable-comments' ): ?>
	<?php comments_template(); ?>
<?php endif; ?>


