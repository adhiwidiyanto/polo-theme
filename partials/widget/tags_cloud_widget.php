<?php

class Tags_Cloud_Widget extends WP_Widget_Tag_Cloud {

    function widget( $args, $instance ) {

        $current_taxonomy = $this->_get_current_taxonomy( $instance );
 
        if ( ! empty( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            if ( 'post_tag' === $current_taxonomy ) {
                $title = __( 'Tags' );
            } else {
                $tax = get_taxonomy( $current_taxonomy );
                $title = $tax->labels->name;
            }
        }
 
        $show_count = ! empty( $instance['count'] );

        $tag_cloud = wp_tag_cloud( apply_filters( 'widget_tag_cloud_args', array(
            'taxonomy'   => $current_taxonomy,
            'echo'       => false,
            'show_count' => $show_count,
            'format'     => 'flat',
            'smallest'   => 8,
            'largest'    => 8,
        ), $instance ) );

        if ( empty( $tag_cloud ) ) {
            return;
        }
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        echo $args['before_widget'];
        if ( $title ) {
            echo '<h2 class="widget-title">' . $title . '</h2>';
        }
 
        echo '<div class="tagcloud tags">';
 
        echo $tag_cloud;
 
        echo "</div>\n";
        echo $args['after_widget'];

        wp_reset_postdata();
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['count'] = ! empty( $new_instance['count'] ) ? 1 : 0;
        $instance['taxonomy'] = stripslashes($new_instance['taxonomy']);
        return $instance;
    }
}