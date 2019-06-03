<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.0
 */
?>
		</div>
		<?php birdmagazine_content_footer(); ?>
	</div><!-- .site-content -->

	<footer id="footer">
		<?php if( is_active_sidebar( 'widget-area-footer' ) ): ?>
			<div class="widget-wrapper">
				<div class="container">
					<?php dynamic_sidebar( 'widget-area-footer' ); ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="site-title">
			<div class="container">
				<span class="home"><a href="<?php echo esc_url( home_url( '/' ) ) ; ?>"><?php bloginfo( 'name' ); ?></a></span>

				<?php if( get_theme_mod( 'birdmagazine_copyright', true ) ): ?>
					<?php printf(__( 'Copyright &copy; %s All Rights Reserved.', 'birdmagazine' ), birdmagazine_get_copyright_year() ); ?>
				<?php endif; ?>

				<?php if( get_theme_mod( 'birdmagazine_credit', true ) ): ?>
					<br>
					<span class="generator"><a href="<?php echo esc_url('http://wordpress.org/'); ?>" target="_blank"><?php _e( 'Proudly powered by WordPress', 'birdmagazine' ); ?></a></span>
				<?php printf(__( 'BirdMAGAZINE theme by %sSysbird%s', 'birdmagazine' ), '<a href="' .esc_url('https://profiles.wordpress.org/sysbird/') .'" target="_blank">', '</a>' ); ?>
				<?php endif; ?>
			</div>
		</div>
		<p id="back-top"><a href="#top"><span><?php _e( 'Go Top', 'birdmagazine'); ?></span></a></p>
	</footer>

</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>