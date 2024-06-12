<?php

class Harika_Recent_Posts_Widget extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'Recent_Posts_Widget', 'description' => 'نمایش آخرین پست های شما' );
    parent::__construct( 'Recent_Posts_Widget', 'هاریکا - آخرین پست ها', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );

    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
    
    <div class="lastposts-widget">
    <ul class="lastposts-ul" style="display:block;">
    <?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => $number, // Number of recent posts thumbnails to display
        'post_status' => 'publish', // Show only the published posts
    ));
    foreach($recent_posts as $post) : ?>
        <li>
                <?php echo get_the_post_thumbnail($post['ID'], 'harika-80', array('class' => 'attachment-sidebar size-sidebar')); ?>
                <a href="<?php echo get_permalink($post['ID']) ?>" title="<?php echo $post['post_title'] ?>"><?php echo $post['post_title'] ?></a>
                <span><?php esc_html_e('تاریخ انتشار: ', 'harika'); ?><?php echo get_the_date( 'j F Y', $post['ID']); ?></span>
        </li>
    <?php endforeach; wp_reset_query(); ?>
</ul>
</div>
    
    <?php echo $args['after_widget'];
  }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('عنوان:', 'harika'); ?></label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    
    <p>
    	<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e('تعداد پست برای نمایش:', 'harika'); ?></label>
    	<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
	</p>


    <?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance['number']    = (int) $new_instance['number'];
    return $instance;
  }

}

// Register the widget.
function harika_register_Recent_Posts_Widget() { 
  register_widget( 'Harika_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'harika_register_Recent_Posts_Widget' );

?>