<?php
/*
The template for displaying the footer.
*/
?>
		</div>
	</div><!-- .site-content -->

	<footer class="site-footer">
		<div class="widget-wrapper">
			<div class="container">
				<?php dynamic_sidebar( 'widget-area-footer' ); ?>
			</div>
		</div>

		<div class="site-title">
			<div class="container">
				<a href="<?php echo esc_url(home_url( '/' )) ; ?>"><?php bloginfo( 'name' ); ?></a><br><span class="generator"><a href="http://wordpress.org/" target="_blank"><?php printf( __( 'Proudly powered by WordPress', 'birdmagazine' ), 'WordPress' ); ?></a></span>
			</div>
		</div>
	</footer>

</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>