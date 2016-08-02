<?php
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
<?php if ( have_comments() ) : ?>
	<h2>
		<?php
		printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'birdmagazine' ),
		number_format_i18n( get_comments_number() ));
		?>
	</h2>

	<?php the_comments_navigation(); ?>

	<ol class="commentlist">
	<?php
		wp_list_comments( array(
			'style'		=> 'ol',
			'avatar_size'	=> 40,
		) );
	?>
	</ol>

	<?php the_comments_navigation(); ?>

<?php endif; ?>

<?php comment_form(); ?>

</div>