<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$sidebar_widget_title_layout_setting = harika_get_setting( 'harika_sidebar_widget_title_layout');
$sidebar_widget_title_layout_meta = '';
if ( is_page() or is_singular() ) :
    if(get_post_meta($post->ID, 'harika-meta-swtl-select', true ) !== '0') {
        $sidebar_widget_title_layout_meta = get_post_meta($post->ID, 'harika-meta-swtl-select', true );
    } else {
        $sidebar_widget_title_layout_setting = harika_get_setting( 'harika_sidebar_widget_title_layout');
    }
endif;

if($sidebar_widget_title_layout_meta !== '') {
    $sidebar_title_style = 'sidebar_style_'.$sidebar_widget_title_layout_meta;
} else {
    $sidebar_title_style = 'sidebar_style_'.$sidebar_widget_title_layout_setting;
}






if ( is_page() or is_singular() ) :
$harika_meta_main_color = get_post_meta($post->ID, 'harika-meta-main-color', true );
$harika_meta_second_color = get_post_meta($post->ID, 'harika-meta-second-color', true );
$harika_meta_background_color = get_post_meta($post->ID, 'harika-meta-background-color', true );


$get_harika_meta_main_color = '';
if (!empty($harika_meta_main_color)) {
	$get_harika_meta_main_color = '--e-global-color-primary:' .$harika_meta_main_color.';';
}

$get_harika_meta_second_color = '';
if (!empty($harika_meta_second_color)) {
	$get_harika_meta_second_color = '--e-global-color-secondary:' .$harika_meta_second_color.';';
}

$get_harika_meta_background_color = '';
if (!empty($harika_meta_background_color)) {
	$get_harika_meta_background_color = 'background-color:' .$harika_meta_background_color.';';
}
endif;



add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {

    if ( is_page() ) {
	    $classes[] = 'page';
    }elseif ( is_singular() ) {
    	$classes[] = 'single';
    }elseif ( is_archive() ) {
    	$classes[] = 'archive';
    }elseif ( is_home() ) {
    	$classes[] = 'blog';
    }elseif ( is_search() ) {
    	$classes[] = 'search';
    }
	return $classes;
}




    // if(isset(harika_get_setting( 'container_width' ))) {
    //     $container_width = harika_get_setting( 'container_width' )['size'].harika_get_setting( 'container_width' )['unit'];
    // } else {
    //     $container_width = '1200px';
    // };
    
    // if(isset(harika_get_setting( 'container_width_tablet' ))) {
    //     $container_width_tablet = harika_get_setting( 'container_width_tablet' )['size'].harika_get_setting( 'container_width_tablet' )['unit'];
    // } else {
    //     $container_width_tablet = '1024px';
    // };
    
    // if(isset(harika_get_setting( 'container_width_mobile' ))) {
    //     $container_width_mobile = harika_get_setting( 'container_width_mobile' )['size'].harika_get_setting( 'container_width_mobile' )['unit'];
    // } else {
    //     $container_width_mobile = '767px';
    // };
    
    // if(isset(harika_get_setting( 'container_width_widescreen' ))) {
    //     $container_width_widescreen = harika_get_setting( 'container_width_widescreen' )['size'].harika_get_setting( 'container_width_widescreen' )['unit'];
    // } else {
    //     $container_width_widescreen = '1400px';
    // };

$container_width_widescreen = '1400px';
$container_width = '1200px';
$container_width_tablet = '1024px';
$container_width_mobile = '767px';






?> 



<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $viewport_content = apply_filters( 'harika_viewport_content', 'width=device-width, initial-scale=1' ); ?>
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<?php if ( is_page() or is_singular() ) : ?>
	<style type="text/css">
	body.harika-layouts {
		<?php if( $get_harika_meta_main_color !== ''){ echo $get_harika_meta_main_color;} ?>
		<?php if( $get_harika_meta_second_color !== ''){ echo $get_harika_meta_second_color;} ?>
		<?php if( $get_harika_meta_background_color !== ''){ echo $get_harika_meta_background_color;} ?>
	}

    body.harika-layouts {
      <?php echo '--harika-container-max-width: '.$container_width.';'; ?>
    }

	@media (max-width: 1024px){
	body.harika-layouts {
      <?php echo '--harika-container-max-width: '.$container_width_tablet.';'; ?>
    }
	}

	@media (max-width: 767px){
	body.harika-layouts {
      <?php echo '--harika-container-max-width: '.$container_width_mobile.';'; ?>
    }
	}

	@media (min-width: 1400px){
	body.harika-layouts {
      <?php echo '--harika-container-max-width: '.$container_width_widescreen.';'; ?>
    }
	}


         
	</style>
	<?php endif; ?>
</head>
<body <?php body_class($sidebar_title_style); ?>>
    
<?php harika_body_open(); ?>

<?php

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
// if is page or is singular
if ( is_page() or is_singular() ) {


if(get_post_meta($post->ID, 'harika-meta-header-select', true ) !== 'default' and get_post_meta($post->ID, 'harika-meta-header-select', true ) !== ''){
	echo do_shortcode('[HARIKA_INSERT_TPL id="'.get_post_meta($post->ID, 'harika-meta-header-select', true ).'"]');
} else if(harika_get_setting( 'harika_header_layout_select' ) !== '' and harika_get_setting( 'harika_header_layout_select' ) !== 0){
	echo do_shortcode('[HARIKA_INSERT_TPL id="'.harika_get_setting( 'harika_header_layout_select' ).'"]');
} else {
	get_template_part( 'template-parts/header' );
}

}

// else
else if(harika_get_setting( 'harika_header_layout_select' ) !== '' and harika_get_setting( 'harika_header_layout_select' ) !== 0){
	echo do_shortcode('[HARIKA_INSERT_TPL id="'.harika_get_setting( 'harika_header_layout_select' ).'"]');
} else {
	get_template_part( 'template-parts/header' );
}


}