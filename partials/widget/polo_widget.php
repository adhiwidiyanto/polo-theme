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

if ( ! function_exists( 'polo_search_widget' ) ) {
    
        function polo_search_widget() {
    
            get_template_part('partials/widget/search_widget');
    
            unregister_widget('WP_Widget_Search');
            register_widget('Search_Widget');
    
        }
    
        add_action('widgets_init', 'polo_search_widget');
}

if ( ! function_exists( 'polo_media_audio_widget' ) ) {
    
        function polo_media_audio_widget() {
    
            get_template_part('partials/widget/media_audio_widget');
    
            unregister_widget('WP_Widget_Media_Audio');
            register_widget('Media_Audio_Widget');
    
        }
    
        add_action('widgets_init', 'polo_media_audio_widget');
}

if ( ! function_exists( 'polo_media_video_widget' ) ) {
    
        function polo_media_video_widget() {
    
            get_template_part('partials/widget/media_video_widget');
    
            unregister_widget('WP_Widget_Media_Video');
            register_widget('Media_Video_Widget');
    
        }
    
        add_action('widgets_init', 'polo_media_video_widget');
}

if ( ! function_exists( 'polo_media_image_widget' ) ) {
    
        function polo_media_image_widget() {
    
            get_template_part('partials/widget/media_image_widget');
    
            unregister_widget('WP_Widget_Media_Image');
            register_widget('Media_Image_Widget');
    
        }
    
        add_action('widgets_init', 'polo_media_image_widget');
}

if ( ! function_exists( 'polo_media_gallery_widget' ) ) {
    
        function polo_media_gallery_widget() {
    
            get_template_part('partials/widget/media_gallery_widget');
    
            unregister_widget('WP_Widget_Media_Gallery');
            register_widget('Media_Gallery_Widget');
    
        }
    
        add_action('widgets_init', 'polo_media_gallery_widget');
}

if ( ! function_exists( 'polo_archives_widget' ) ) {
    
        function polo_archives_widget() {
    
            get_template_part('partials/widget/archives_widget');
    
            unregister_widget('WP_Widget_Archives');
            register_widget('Archives_Widget');
    
        }
    
        add_action('widgets_init', 'polo_archives_widget');
}