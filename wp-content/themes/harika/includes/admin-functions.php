<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @return void
 */
function harika_fail_load_admin_notice() {
	// Leave to Elementor Pro to manage this.
	if ( function_exists( 'elementor_pro_load_plugin' ) ) {
		return;
	}

	$screen = get_current_screen();
	if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
		return;
	}

	if ( 'true' === get_user_meta( get_current_user_id(), '_harika_install_notice', true ) ) {
		return;
	}

	$plugin = 'elementor/elementor.php';

	$installed_plugins = get_plugins();

	$is_elementor_installed = isset( $installed_plugins[ $plugin ] );

	if ( $is_elementor_installed ) {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$message = __( 'برای اجرای قالب هاریکا مورد نیاز است که افزونه المنتور و المنتور پرو را نصب و فعال کنید!', 'harika' );

		$button_text = __( 'فعال سازی المنتور', 'harika' );
		$button_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$message = __( 'برای اجرای قالب هاریکا مورد نیاز است که افزونه المنتور و المنتور پرو را نصب و فعال کنید!', 'harika' );

		$button_text = __( 'نصب المنتور', 'harika' );
		$button_link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
	}

	?>
	<style>
		.notice.harika-notice {
			border: 1px solid #ccd0d4;
			border-left: 4px solid #9b0a46 !important;
			box-shadow: 0 1px 4px rgba(0,0,0,0.15);
			display: flex;
			padding: 0px;
		}
		.rtl .notice.harika-notice {
			border-right-color: #9b0a46 !important;
		}
		.notice.harika-notice .harika-notice-aside {
			width: 50px;
			display: flex;
			align-items: start;
			justify-content: center;
			padding-top: 15px;
			background: rgba(215,43,63,0.04);
		}
		.notice.harika-notice .harika-notice-aside img{
			width: 1.5rem;
		}
		.notice.harika-notice .harika-notice-inner {
			display: table;
			padding: 20px 0px;
			width: 100%;
		}
		.notice.harika-notice .harika-notice-content {
			padding: 0 20px;
		}
		.notice.harika-notice p {
			padding: 0;
			margin: 0;
		}
		.notice.harika-notice h3 {
			margin: 0 0 5px;
		}
		.notice.harika-notice .harika-install-now {
			display: block;
			margin-top: 15px;
		}
		.notice.harika-notice .harika-install-now .harika-install-button {
			background: #127DB8;
			border-radius: 3px;
			color: #fff;
			text-decoration: none;
			height: auto;
			line-height: 20px;
			padding: 0.4375rem 0.75rem;
			text-transform: capitalize;
		}
		.notice.harika-notice .harika-install-now .harika-install-button:active {
			transform: translateY(1px);
		}
		@media (max-width: 767px) {
			.notice.harika-notice.harika-install-elementor {
				padding: 0px;
			}
			.notice.harika-notice .harika-notice-inner {
				display: block;
				padding: 10px;
			}
			.notice.harika-notice .harika-notice-inner .harika-notice-content {
				display: block;
				padding: 0;
			}
			.notice.harika-notice .harika-notice-inner .harika-install-now {
				display: none;
			}
		}
	</style>
	<script>jQuery( function( $ ) {
			$( 'div.notice.harika-install-elementor' ).on( 'click', 'button.notice-dismiss', function( event ) {
				event.preventDefault();

				$.post( ajaxurl, {
					action: 'harika_set_admin_notice_viewed'
				} );
			} );
		} );</script>
	<div class="notice updated is-dismissible harika-notice harika-install-elementor">
		<div class="harika-notice-aside">
			<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/elementor-notice-icon.svg'; ?>" alt="<?php esc_attr_e( 'دریافت المنتور', 'harika' ); ?>" />
		</div>
		<div class="harika-notice-inner">
			<div class="harika-notice-content">
				<h3><?php esc_html_e( 'مرسی که هاریکا رو نصب کردی!', 'harika' ); ?></h3>
				<p><?php echo esc_html( $message ); ?></p>
				<a href="https://go.elementor.com/harika-theme-learn/" target="_blank"><?php esc_html_e( 'اطلاعات بیشتر در رابطه با المنتور', 'harika' ); ?></a>
				<div class="harika-install-now">
					<a class="harika-install-button" href="<?php echo esc_attr( $button_link ); ?>"><?php echo esc_html( $button_text ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Set Admin Notice Viewed.
 *
 * @return void
 */
function ajax_harika_set_admin_notice_viewed() {
	update_user_meta( get_current_user_id(), '_harika_install_notice', 'true' );
	die;
}

add_action( 'wp_ajax_harika_set_admin_notice_viewed', 'ajax_harika_set_admin_notice_viewed' );
if ( ! did_action( 'elementor/loaded' ) ) {
	add_action( 'admin_notices', 'harika_fail_load_admin_notice' );
}
