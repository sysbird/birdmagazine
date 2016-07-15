<?php
/*
The template for displaying the footer.
*/
?>
		</div>
	</div><!-- .site-content -->

	<footer id="footer">
		<div class="widget-wrapper">
			<div class="container">
				<?php dynamic_sidebar( 'widget-area-footer' ); ?>
			</div>
		</div>

		<div class="container">
			<div class="site-title"><span class="home"><a href="<?php echo esc_url( home_url( '/' ) ) ; ?>"><?php bloginfo( 'name' ); ?></a></span>

				<?php if( get_theme_mod( 'birdmagazine', true ) ): ?>
					<span class="copyright">
						<?php printf(__( 'Copyright &copy; %s All Rights Reserved.', 'birdmagazine' ), birdmagazine_get_copyright_year() ); ?>
					</span>
				<?php endif; ?>

				<?php if( get_theme_mod( 'birdmagazine', true ) ): ?>
					<br>
					<span class="generator"><a href="<?php echo esc_url('http://wordpress.org/'); ?>" target="_blank"><?php _e( 'Proudly powered by WordPress', 'birdmagazine' ); ?></a></span>
				<?php printf(__( 'BirdMAGAZINE theme by %sSysbird%s', 'birdmagazine' ), '<a href="' .esc_url('https://profiles.wordpress.org/sysbird/') .'" target="_blank">', '</a>' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</footer>

</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>