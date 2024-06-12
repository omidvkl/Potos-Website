<?php
/**
 * The template for displaying header.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
] );
?>

<header id="site-header" class="site-header default-code-header" role="banner">

	<div class="site-branding">
		<?php
		if ( has_custom_logo() ) {
			the_custom_logo();
		} elseif ( $site_name ) {
			?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'harika' ); ?>" rel="home">
					<?php echo esc_html( $site_name ); ?>
				</a>
			</h1>
			<p class="site-description">
				<?php
				if ( $tagline ) {
					echo esc_html( $tagline );
				}
				?>
			</p>
		<?php } ?>
	</div>

	<?php if ( $header_nav_menu ) : ?>
			<div class="harika-menu-widget header-menu harika-menu-default" data-harika-nav="{id:n-1111111}">
				<nav class="harika-navigation" role="navigation">
					<?php
					// PHPCS - escaped by WordPress with "wp_nav_menu"
					echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				</nav>
				<div class="harika-navigation-toggle-holder n-1111111">
					<div class="harika-navigation-toggle">
						<i class="eicon-menu-bar"></i>
						<span class="close-screen"></span>
					</div>
				</div>
				<nav class="harika-navigation-dropdown n-1111111 closed" role="navigation">
					<?php
					wp_nav_menu( [
						'theme_location'  => 'menu-1',
						'fallback_cb'     => false,
						'menu_class'      => 'menu side menu-ul n-1111111',
						'container_class' => 'sidemenu-container',
					] );

					?>
				</nav>
			</div>
		<?php endif; ?>
</header>
