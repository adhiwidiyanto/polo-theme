<?php 


if ( ! function_exists('theme_css') ){

    function theme_css() {

        $css = get_template_directory_uri() . '/css/';

        wp_enqueue_style( 'polo-plugins-style', $css . 'plugins.css' );
        wp_enqueue_style( 'polo-style', $css . 'style.css' );
        wp_enqueue_style( 'polo-responsive-style', $css . 'responsive.css' );


    }
}