<?php

class Pages_Widget extends WP_Widget_Pages {

    function widget($args, $instance) {
		
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Pages' );
 
        /**
         * Filters the widget title.
         *
         * @since 2.6.0
         *
         * @param string $title    The widget title. Default 'Pages'.
         * @param array  $instance Array of settings for the current widget.
         * @param mixed  $id_base  The widget ID.
         */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        $sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
        $exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
 
        if ( $sortby == 'menu_order' )
            $sortby = 'menu_order, post_title';
 
        /**
         * Filters the arguments for the Pages widget.
         *
         * @since 2.8.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see wp_list_pages()
         *
         * @param array $args     An array of arguments to retrieve the pages list.
         * @param array $instance Array of settings for the current widget.
         */
        $out = wp_list_pages( apply_filters( 'widget_pages_args', array(
            'title_li'    => '',
            'echo'        => 0,
            'sort_column' => $sortby,
            'exclude'     => $exclude
        ), $instance ) );
 
        if ( ! empty( $out ) ) {
            echo $args['before_widget'];
            if ( $title ) {
                echo '<h2 class="widget-title" >' . $title . '</h2>';
            }
        ?>
        <ul class="list-posts list-medium">
            <?php echo $out; ?>
        </ul>
        <?php
            echo $args['after_widget'];
        }
    }
}