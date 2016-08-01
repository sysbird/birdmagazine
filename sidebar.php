<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage birdMAGAZINE
 * @since birdMAGAZINE 1.0
 */
?>
<aside id="sidebar">
	<div class="widget-wrapper">

		<?php if ( ! dynamic_sidebar( 'widget-area' ) ) : ?>

			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php _e( 'Recent Articles', 'birdmagazine' ); ?></h3>
				<ul>
					<?php wp_get_archives( array( 'type' => 'postbypost' ) ); ?>
				</ul>
			</aside>
		<?php endif; ?>

	</div>
</aside>
