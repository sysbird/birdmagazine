<?php
/**
 * The template for displaying search form.
 *
 * @package BirdMAGAZINE
 * @subpackage BirdMAGAZINE
 * @since BirdMAGAZINE 1.03
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div><label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php _e( 'Search...', 'birdmagazine' ) ?>">
		<button type="submit" value="Search" id="searchsubmit" class="submit"><span class="screen-reader-text">Search</span></button>
	</div>
</form>