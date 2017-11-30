<?php

class Archives_Widget extends WP_Widget_Archives {
    
    function widget($args, $instance) {
        extract( $args );

        static $first_dropdown = true;
		
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Categories') : $instance['title'], $instance, $this->id_base);

        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        echo $before_widget;
        if( $title ) echo '<h2 class="widget-title">' . $title . '</h2>'; 
        
        if ( $d ) {
            $dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
            ?>
        <select id="<?php echo esc_attr( $dropdown_id ); ?>" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
            <?php
            /**
             * Filters the arguments for the Archives widget drop-down.
             *
             * @since 2.8.0
             * @since 4.9.0 Added the `$instance` parameter.
             *
             * @see wp_get_archives()
             *
             * @param array $args     An array of Archives widget drop-down arguments.
             * @param array $instance Settings for the current Archives widget instance.
             */
            $dropdown_args = apply_filters( 'widget_archives_dropdown_args', array(
                'type'            => 'monthly',
                'format'          => 'option',
                'show_post_count' => $c
            ), $instance );
 
            switch ( $dropdown_args['type'] ) {
                case 'yearly':
                    $label = __( 'Select Year' );
                    break;
                case 'monthly':
                    $label = __( 'Select Month' );
                    break;
                case 'daily':
                    $label = __( 'Select Day' );
                    break;
                case 'weekly':
                    $label = __( 'Select Week' );
                    break;
                default:
                    $label = __( 'Select Post' );
                    break;
            }
            ?>
 
            <option value=""><?php echo esc_attr( $label ); ?></option>
            <?php wp_get_archives( $dropdown_args ); ?>
 
        </select>
        <?php } else { ?>
        <ul class="list list-lines">
        <?php
        /**
         * Filters the arguments for the Archives widget.
         *
         * @since 2.8.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see wp_get_archives()
         *
         * @param array $args     An array of Archives option arguments.
         * @param array $instance Array of settings for the current widget.
         */
        wp_get_archives( apply_filters( 'widget_archives_args', array(
            'type'            => 'monthly',
            'show_post_count' => $c
        ), $instance ) );
        ?>
        </ul>
        <?php
        
        }

        echo $after_widget;
    }
}