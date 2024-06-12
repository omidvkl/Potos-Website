<?php

class Harika_CategoryBox_Widget extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'CategoryBox_Widget', 'description' => 'نمایش جعبه ای یک لینک خاص' );
    parent::__construct( 'CategoryBox_Widget', 'هاریکا - جعبه لینک', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = $instance[ 'title' ];
    $icon =  $instance[ 'icon' ];
    $link = $instance[ 'link' ];
    $btnicon = $instance[ 'btntitle' ];
    $color = $instance[ 'color' ];

    $mbButtom  = $instance[ 'mbButtom' ];
    
    $get_bg_color = "background-color: $color;";


    ?>

    <a class="harika-link-widget" style="text-align:right; <?php echo $get_bg_color ?> margin-bottom: <?php echo $mbButtom ?>;" href="<?php echo $link ?>" target="_blank" rel="nofollow" data-content="<?php echo $title ?>">
      <i class="<?php echo $icon ?>" style="color: <?php echo $color ?>;"></i>
      <span class="link-title" style="color: <?php echo $color ?>" data-content="<?php echo $title ?>"><?php echo $title ?></span>
      <span class="arrow" style="background-color: <?php echo $color ?>;color: <?php echo $color ?> !important;" data-content="<?php echo $btnicon ?>"><i class="<?php echo $btnicon ?>"></i></span>
    </a>

  <?php
  }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';
    $link = ! empty( $instance['link'] ) ? $instance['link'] : '';
    $btnicon = ! empty( $instance['btntitle'] ) ? $instance['btntitle'] : '';
    $color = ! empty( $instance['color'] ) ? $instance['color'] : '';
    $mbButtom = ! empty( $instance['mbButtom'] ) ? $instance['mbButtom'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">عنوان:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'icon' ); ?>">آیکن:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" value="<?php echo esc_attr( $icon ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'link' ); ?>">لینک:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo esc_attr( $link ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'btntitle' ); ?>">عنوان دکمه:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'btntitle' ); ?>" name="<?php echo $this->get_field_name( 'btntitle' ); ?>" value="<?php echo esc_attr( $btnicon ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'color' ); ?>">رنگ شبکه اجتماعی:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" value="<?php echo esc_attr( $color ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'mbButtom' ); ?>">فاصله از پایین:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'mbButtom' ); ?>" name="<?php echo $this->get_field_name( 'mbButtom' ); ?>" value="<?php echo esc_attr( $mbButtom ); ?>" />
    </p>
    
    <?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'icon' ] = strip_tags( $new_instance[ 'icon' ] );
    $instance[ 'link' ] = strip_tags( $new_instance[ 'link' ] );
    $instance[ 'btntitle' ] = strip_tags( $new_instance[ 'btntitle' ] );
    $instance[ 'color' ] = strip_tags( $new_instance[ 'color' ] );
    $instance[ 'secondcolor' ] = strip_tags( $new_instance[ 'secondcolor' ] );
    $instance[ 'mbButtom' ] = strip_tags( $new_instance[ 'mbButtom' ] );
    return $instance;
  }

}

// Register the widget.
function harika_register_CategoryBox_Widget() { 
  register_widget( 'Harika_CategoryBox_Widget' );
}
add_action( 'widgets_init', 'harika_register_CategoryBox_Widget' );

?>