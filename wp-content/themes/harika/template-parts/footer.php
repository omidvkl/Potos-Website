<?php
/**
 * The template for displaying footer.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$site_name = get_bloginfo( 'name' );

?>
<footer id="site-footer" class="site-footer" role="contentinfo">
<div class="footer-inner">
		<div class="site-branding">
				<div class="site-logo">
					<?php echo '<p>'.$site_name.'</p>'; ?>
				</div>
	</div>
</footer>
