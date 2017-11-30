<?php

class Category_Widget extends WP_Widget_Categories {
    
    function widget($args, $instance) {
        extract( $args );

        static $first_dropdown = true;
		
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Categories') : $instance['title'], $instance, $this->id_base);

        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        echo $before_widget;
        if( $title ) echo '<h2 class="widget-title">' . $title . '</h2>'; 
        
        if( $d ) {
            echo sprintf( '<form action="%s" method="get">', esc_url( home_url() ) );
            $dropdown_id = ( $first_dropdown ) ? 'cat' : "{$this->id_base}-dropdown-{$this->number}";
            $first_dropdown = false;

            $cat_args['show_option_none'] = __( 'Select Category' );
            $cat_args['id'] = $dropdown_id;

            wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args, $instance ) );
            echo '</form>';
        ?>

        <script type='text/javascript'>

            (function() {
                    var dropdown = document.getElementById( "<?php echo esc_js( $dropdown_id ); ?>" );
                    function onCatChange() {
                            if ( dropdown.options[ dropdown.selectedIndex ].value > 0 ) {
                                    dropdown.parentNode.submit();
                            }
                    }
                    dropdown.onchange = onCatChange;
            })();

        </script>

<?php

        } else {

?>

        <ul class=" list-posts list-medium">
            <?php
                $pattern        = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';
                $replacement    = '<li$1><a$2><span class="cat-name">$3</span><span class="cat-count"> ($4)</span></a>'; // give cat name and count a span, wrap it all in a link
                $subject        = wp_list_categories( 'echo=0&orderby=name&exclude=&title_li=&depth=1&show_count=1' );    
                echo preg_replace( $pattern, $replacement, $subject );
            ?>
        </ul>

<?php

        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['count'] = 1;
        $instance['hierarchical'] = 0;
        $instance['dropdown'] = 0;

        return $instance;
    }

    function form( $instance ) {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = esc_attr( $instance['title'] );
        $count = true;
        $hierarchical = false;
        $dropdown = false;
    ?>
        <p><label for="<?php echo $this->get_field_id('title', 'mytextdomain' ); ?>"><?php _e( 'Title:', 'mytextdomain'  ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
    
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> disabled="disabled" />
        <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'mytextdomain'  ); ?></label><br />
<?php
    }
    }
}