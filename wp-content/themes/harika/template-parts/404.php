<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$page_404_text_or_image = harika_get_setting( 'harika_404_page_404_type' );

$entry_title_404_text = 'صفحه یافت نشد!';
$error_404_text = '404';
$page_description_404_text = 'به نظر می رسد محتوایی که به دنبال آن هستید یافت نشد.';


if(harika_get_setting( 'harika_404_page_title' ) !== ''){
	$entry_title_404_text = harika_get_setting( 'harika_404_page_title' );
}
if(harika_get_setting( 'harika_404_page_404' ) !== ''){
	$error_404_text = harika_get_setting( 'harika_404_page_404' );
}
if(harika_get_setting( 'harika_404_page_description' ) !== ''){
	$page_description_404_text = harika_get_setting( 'harika_404_page_description' );
}

$get_image_404 = harika_get_setting( 'harika_404_page_image' );
$get_image_404_size = harika_get_setting( 'harika_404_page_image_size_size' );

?>
<main id="content" class="site-main main-max" role="main">
	<div class="harika-404-page">
		<?php if ( apply_filters( 'harika_page_title', true ) ) : ?>
			<header class="page-header">
				<h1 class="entry-title"><?php echo $entry_title_404_text; ?></h1>
			</header>
		<?php endif; ?>
		<div class="page-content">

			<?php if($page_404_text_or_image == 'text') : ?>
			<p class="error-404"><?php echo $error_404_text; ?></p>

			<?php ;elseif($page_404_text_or_image == 'image') : 
				echo wp_get_attachment_image( $get_image_404['id'], $get_image_404_size, false, array( "class" => "page-404-image $get_image_404_size", "alt" => \Elementor\Control_Media::get_image_alt( $get_image_404 ) ) );
			endif; ?>

			<p class="description"><?php echo $page_description_404_text; ?></p>
		</div>
	</div>
</main>
