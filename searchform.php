<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label style="visibility:hidden" for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
		<button type="submit" class="submit" name="submit" id="searchsubmit"><span class="fas fa-search"></span></button>
	</form>
