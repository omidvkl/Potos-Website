<?php

defined('ABSPATH') || exit('no access');

add_action( 'init', 've_register_meta' );

function ve_register_meta() {

    register_meta( 'term', 'color', 've_sanitize_hex' );
}

function ve_sanitize_hex( $color ) {

    $color = ltrim( $color, '#' );

    return preg_match( '/([A-Fa-f0-9]{3}){1,2}$/', $color ) ? $color : '';
}

function ve_get_term_color( $term_id, $hash = false ) {

    $color = get_term_meta( $term_id, 'color', true );
    $color = ve_sanitize_hex( $color );
    $color =$hash && $color ? "#{$color}" : $color;
    return  $color;
}

add_action( 'category_add_form_fields', 'ccp_new_term_color_field' );

function ccp_new_term_color_field() {

    wp_nonce_field( basename( __FILE__ ), 've_term_color_nonce' ); ?>

    <div class="form-field ve-term-color-wrap">
        <label for="ve-term-color"><?php _e( 'رنگ دسته بندی را انتخاب کنید', 'harika' ); ?></label>
        <input type="text" name="ve_term_color" id="ve-term-color" value="" class="ve-color-field" data-default-color="#ffffff" />
        <p></p>
        <p><?php _e( 'این رنگ به عنوان پس زمینه متا دسته بندی در بخش های مختلف سایت استفاده می شود.', 'harika' ); ?></p>
        <p></p>
    </div>
<?php }






add_action( 'category_edit_form_fields', 'ccp_edit_term_color_field' );

function ccp_edit_term_color_field( $term ) {

    $default = '#222';
    $color   = ve_get_term_color( $term->term_id, true );

    if ( ! $color )
        $color = $default; ?>

    <tr class="form-field ve-term-color-wrap">
        <th scope="row"><label for="ve-term-color"><?php _e( 'رنگ دسته را انتخاب کنید', 'harika' ); ?></label></th>
        <td>
            <?php wp_nonce_field( basename( __FILE__ ), 've_term_color_nonce' ); ?>
            <input type="text" name="ve_term_color" id="ve-term-color" value="<?php echo esc_attr( $color ); ?>" class="ve-color-field" data-default-color="<?php echo esc_attr( $default ); ?>" />

        <p></p>
        <p><?php _e( 'این رنگ به عنوان پس زمینه متا دسته بندی در بخش های مختلف سایت استفاده می شود.', 'harika' ); ?></p>
        <p></p>
        </td>
    </tr>
<?php }



add_action( 'edit_category',   've_save_term_color' );
add_action( 'create_category', 've_save_term_color' );

function ve_save_term_color( $term_id ) {

    if ( ! isset( $_POST['ve_term_color_nonce'] ) || ! wp_verify_nonce( $_POST['ve_term_color_nonce'], basename( __FILE__ ) ) )
        return;

    $old_color = ve_get_term_color( $term_id );
    $new_color = isset( $_POST['ve_term_color'] ) ? ve_sanitize_hex( $_POST['ve_term_color'] ) : '';

    if ( $old_color && '' === $new_color )
        delete_term_meta( $term_id, 'color' );

    else if ( $old_color !== $new_color )
        update_term_meta( $term_id, 'color', $new_color );
}


add_filter( 'manage_edit-category_columns', 've_edit_term_columns' );

function ve_edit_term_columns( $columns ) {

    $columns['color'] = __( 'رنگ', 'harika' );

    return $columns;
}



add_filter( 'manage_category_custom_column', 've_manage_term_custom_column', 10, 3 );

function ve_manage_term_custom_column( $out, $column, $term_id ) {

    if ( 'color' === $column ) {

        $color = ve_get_term_color( $term_id, true );

        if ( ! $color )
            $color = '#ffffff';

        $out = sprintf( '<span class="color-block" style="background:%s;">&nbsp;</span>', esc_attr( $color ) );
    }

    return $out;
}










add_action( 'admin_enqueue_scripts', 've_admin_enqueue_scripts' );

function ve_admin_enqueue_scripts( $hook_suffix ) {



    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );

    add_action( 'admin_head',   've_term_colors_print_styles' );
    add_action( 'admin_footer', 've_term_colors_print_scripts' );
}

function ve_term_colors_print_styles() { ?>

    <style type="text/css">
        .column-color { width: 50px; }
        .column-color .color-block { display: inline-block; width: 28px; height: 28px; border: 1px solid #ddd; }
    </style>
<?php }

function ve_term_colors_print_scripts() { ?>

    <script type="text/javascript">
        jQuery( document ).ready( function( $ ) {
            $( '.ve-color-field' ).wpColorPicker();
        } );
    </script>
<?php }


function harika_get_post_category_color() {
    $harika_categories = get_the_category();
    $harika_catid = $harika_categories[0]->cat_ID;
    
    
	$color = get_term_meta($harika_catid, 'color', true);
	STR_REPLACE(' # ','','$color',$c);
	
 		$color='#' . $color;
 		
	return apply_filters( 'extra_get_post_category_color', $color );
}


function harika_get_post_category_color2($color22) {
    $color2 = get_term_meta($color22, 'color', true);
    STR_REPLACE(' # ','','$color',$c);
    $color2='#' . $color2;
    return apply_filters( 'extra_get_post_category_color', $color2 );
}


/**
 * Setup language text domain
 */
function wp_category_color_load_plugin_textdomain() {
    load_plugin_textdomain( 'harika', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'wp_category_color_load_plugin_textdomain' );