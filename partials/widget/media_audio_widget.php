<?php

class Media_Audio_Widget extends WP_Widget_Media_Audio {

    function widget($args, $instance) {
        $instance = wp_parse_args( $instance, wp_list_pluck( $this->get_instance_schema(), 'default' ) );
 
        // Short-circuit if no media is selected.
        if ( ! $this->has_content( $instance ) ) {
            return;
        }
 
        echo $args['before_widget'];
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
 
        if ( $title ) {
            echo '<h2 class="widget-title">' . $title . '</h2>';
        }
 
        $instance = apply_filters( "widget_{$this->id_base}_instance", $instance, $args, $this );
 
        $this->render_media( $instance );
 
        echo $args['after_widget'];
    }
}