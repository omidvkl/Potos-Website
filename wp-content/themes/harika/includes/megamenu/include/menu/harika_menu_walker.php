<?php

/**
 * Custom Walker
*/

use Elementor\Plugin as Elementor;

class HARIKAmenu_Nav_Walker extends Walker_Nav_Menu {

  public $harikamenu_menupos = '';
  public $harikamenu_menuwidth = '';

  function start_lvl( &$output, $depth = 0, $args = array() ) {

        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1 ); // because it counts the first submenu as 0
        if ($display_depth == 1) {
         $style = 'style="width:'.$this->harikamenu_menuwidth.'px; left:'.$this->harikamenu_menupos.'px;"';
        }else{
          $style = '';
        }

        $classes = array(
            'sub-menu',
            ( $display_depth % 2 ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // Build HTML for output.
        $output .= "\n$indent<ul class='" . $class_names . "' $style >\n";
  }


  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

    if( isset( $item->menuposition ) && $item->ID  ){
        $this->harikamenu_menupos =  $item->menuposition;
    }

    if( isset( $item->menuwidth ) &&  $item->ID ){
         $this->harikamenu_menuwidth = $item->menuwidth;
    }

    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // Depth-dependent classes.
    $depth_classes = array(
      ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
      ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
      ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
      'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // Passed classes.
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    // If Enable MegaMenu
    if( isset( $item->template ) && !empty( $item->template ) ){
        $classes[] = 'harikamega_mega_menu';
    }

    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );



    $menu_have_width = '';
    if( isset( $item->menuwidth ) && !empty( $item->menuwidth ) ){
        $menu_have_width = ' have-width';
    }
    $menu_position = '';
    if( isset( $item->menuposition ) && !empty( $item->menuposition ) ){
        $menu_position = 'position-'.$item->menuposition;
    }

    // Build HTML.
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' '.$menu_have_width . ' '.$menu_position.' ">';

    // Link attributes.
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';




    $icons = substr( $item->ficon,0,3);
    $icons = str_replace($icons, $icons." ", $item->ficon);

    // Custom Data
    $icon = $buildercontent  = $styles = '';
    $item_settings = get_post_meta( $item->ID, 'harikamega_menu_settings', true );

    if( isset( $item->ficon ) && !empty( $item->ficon ) ){
        $icon_style = '';
        if( !empty( $item->ficoncolor ) ){
            $icon_style .= 'color:#'.$item->ficoncolor.';';
        }
        $icon = '<i class="'.$icons.'" style="'.$icon_style.'"></i>';
    }

    if( isset( $item->template ) && !empty( $item->template ) ){
        $buildercontent = $this->getItemBuilderContent( $item->template );
        
    }


    if( $item->menuposition == 'center' && !empty( $item->menuposition ) && !empty( $item->menuwidth ) ){
        $styles .= 'right: calc(-'.($item->menuwidth / 2).'px + 50%);';
    }

    if( isset( $item->menuwidth ) && !empty( $item->menuwidth ) ){
        $styles .= 'width:'.$item->menuwidth.'px;';

    }

    // Build HTML output and pass through the proper filter.
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s%6$s</a>%7$s',
        $args->before,
        $attributes,
        $args->link_before,
        $icon,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );

    if( !empty( $buildercontent ) ){
        $item_output .= sprintf('<div class="harikamegamenu-content-wrapper sub-menu" style="%1s">%2s</div>', $styles, $buildercontent );
    }

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ){
       $args[0]->has_children =  !empty ( $children_elements[ $element->$id_field ] ) ;
    }
    parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }

  // Item Builder Content
  private function getItemBuilderContent( $template_id ){
    static $elementor = null;
    $elementor = Elementor::instance();
    return $elementor->frontend->get_builder_content_for_display( $template_id );
  }
}