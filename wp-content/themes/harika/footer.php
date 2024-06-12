<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
// if is page or is singular
if ( is_page() or is_singular() ) {


	if(get_post_meta($post->ID, 'harika-meta-footer-select', true ) !== 'default' and get_post_meta($post->ID, 'harika-meta-footer-select', true ) !== ''){
		echo do_shortcode('[HARIKA_INSERT_TPL id="'.get_post_meta($post->ID, 'harika-meta-footer-select', true ).'"]');
	} else if(harika_get_setting( 'harika_footer_layout_select' ) !== '' and harika_get_setting( 'harika_footer_layout_select' ) !== 0){
		echo do_shortcode('[HARIKA_INSERT_TPL id="'.harika_get_setting( 'harika_footer_layout_select' ).'"]');
	} else {
		get_template_part( 'template-parts/footer' );
	}
	
}
	
// else
else if(harika_get_setting( 'harika_footer_layout_select' ) !== '' and harika_get_setting( 'harika_footer_layout_select' ) !== 0){
	echo do_shortcode('[HARIKA_INSERT_TPL id="'.harika_get_setting( 'harika_footer_layout_select' ).'"]');
} else {
	get_template_part( 'template-parts/footer' );
}
}

?>

<div class="harika-shadow-box"></div>
<?php wp_footer(); ?>
</body>
</html>
