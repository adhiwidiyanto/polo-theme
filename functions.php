<?php

if( ! function_exists('polo_theme_setup') ) {

   function polo_theme_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        
        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support( 'title-tag' );

        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'aside') );
        add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
        ) );
        
        register_sidebar(
            array(
                'name'             =>      'Sidebar',
                'id'               =>      'polo_sidebar',
                'before_widget'    =>      '<div class="widget">',
                'after_widget'     =>      '</div>',
            )
        );

        register_nav_menus(
            array(
                'main_menu' => 'Header Menu'
            )
        );
   }

   add_action('after_setup_theme', 'polo_theme_setup');

}

if( ! function_exists('polo_theme_css')) {

    function polo_theme_css() {

        $css = get_stylesheet_directory_uri() . '/css/';
        $js = get_stylesheet_directory_uri() . '/js/';

        wp_enqueue_style('polo-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,80');
        wp_enqueue_style('polo-plugins-css', $css . 'plugins.css');
        wp_enqueue_style('polo-style', $css . 'style.css');
        wp_enqueue_style('polo-responsive', $css . 'responsive.css');

        wp_enqueue_script('polo-jquery', $js . 'jquery.js', array(), '1.0.0', true);
        wp_enqueue_script('polo-plugins-js', $js . 'plugins.js', array(), '1.0.0', true);
        wp_enqueue_script('polo-theme-functions', $js . 'functions.js', array(), '1.0.0', true);

    }
    add_action( 'wp_enqueue_scripts', 'polo_theme_css' );
}

if ( ! function_exists( 'remove_admin_bar' ) ) {
    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
          show_admin_bar(false);
        }
    }
    add_action('after_setup_theme', 'remove_admin_bar');
}

if ( ! function_exists( 'change_submenu_class' )) {
    
    function change_submenu_class($menu) {
        $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);
        return $menu;
    }

    add_filter('wp_nav_menu','change_submenu_class'); 
}

if ( ! function_exists( 'polo_recent_widget' ) ) {

    function polo_recent_widget() {

        get_template_part('partials/recent_posts_widget');

        unregister_widget('WP_Widget_Recent_Posts');
        register_widget('Recent_Post_Widget');

    }

    add_action('widgets_init', 'polo_recent_widget');
}

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) {
    /**
     * Register Google fonts for Twenty Sixteen.
     *
     * Create your own twentysixteen_fonts_url() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function polo_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'serif,sans-serif';
    
        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'polo' ) ) {
            $fonts[] = 'Open+Sans:300,400,800,700,600';
        }
    
        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'polo' ) ) {
            $fonts[] = 'Montserrat:400,500,600,700';
        }
    
        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'polo' ) ) {
            $fonts[] = 'Raleway:100,300,600,700,800';
        }
    
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }
    
        return $fonts_url;
    }
}