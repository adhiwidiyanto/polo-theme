<?php

class Calendar_Widget extends WP_Widget_Calendar {

    function widget($args, $instance) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        echo $args['before_widget'];
        if ( $title ) {
            echo '<h2 class="widget-title">' . $title . '</h2>';
        }
        if ( 0 === $instance ) {
            echo '<div id="calendar_wrap" class="calendar_wrap">';
        } else {
            echo '<div class="calendar_wrap">';
        }
        get_calendar();
        echo '</div>';
        echo $args['after_widget'];
    }
}