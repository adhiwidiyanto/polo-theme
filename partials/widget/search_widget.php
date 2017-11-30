<?php

class Search_Widget extends WP_Widget_Search {

    function widget($args, $instance) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        echo $args['before_widget'];
        if ( $title ) {
            echo '<h2 class="widget-title">' . $title . '</h2>';
        }
 
        // Use current theme search form if it exists
        echo '<form role="search" method="get" action="' . esc_url( home_url( '/' ) ) . '">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </span>
                </div>
             </form>';
 
        echo $args['after_widget'];
    }
}