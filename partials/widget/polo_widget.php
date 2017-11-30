<?php

if ( ! function_exists( 'polo_calendar_widget' ) ) {
    function polo_calendar_widget() {

        get_template_part('partials/widget/calendar_widget');

        unregister_widget('WP_Widget_Calendar');
        register_widget('Calendar_Widget');

    }

    add_action('widgets_init', 'polo_calendar_widget');
}

if ( ! function_exists( 'polo_recent_widget' ) ) {

    function polo_recent_widget() {

        get_template_part('partials/widget/recent_posts_widget');

        unregister_widget('WP_Widget_Recent_Posts');
        register_widget('Recent_Post_Widget');

    }

    add_action('widgets_init', 'polo_recent_widget');
}

if ( ! function_exists( 'polo_category_widget' ) ) {
    
        function polo_category_widget() {
    
            get_template_part('partials/widget/category_widget');
    
            unregister_widget('WP_Widget_Categories');
            register_widget('Category_Widget');
    
        }
    
        add_action('widgets_init', 'polo_category_widget');
}

if ( ! function_exists( 'polo_pages_widget' ) ) {
    
        function polo_pages_widget() {
    
            get_template_part('partials/widget/pages_widget');
    
            unregister_widget('WP_Widget_Pages');
            register_widget('Pages_Widget');
    
        }
    
        add_action('widgets_init', 'polo_pages_widget');
}
