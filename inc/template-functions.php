<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Cambodia_Tour_guide
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cambodia_tour_guide_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'cambodia_tour_guide_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cambodia_tour_guide_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cambodia_tour_guide_pingback_header' );


add_action('wp_footer','flexslider_script',100);
function flexslider_script()
{
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.flexslider').flexslider({
			    animation: "fade"
			});
		});
	</script>
	<?php 
}