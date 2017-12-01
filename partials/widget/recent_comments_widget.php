<?php

class Recent_Comments_Widget extends WP_Widget_Recent_Comments {

    function widget($args, $instance) {
        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;
 
        $output = '';
 
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments' );
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number )
            $number = 5;

        $comments = get_comments( apply_filters( 'widget_comments_args', array(
            'number'      => $number,
            'status'      => 'approve',
            'post_status' => 'publish'
        ), $instance ) );
 
        $output .= $args['before_widget'];

        if ( $title ) {
            $output .= '<h2 class="widget-title">' . $title . '</h2>';
        }
 
        $output .= '<ul id="recentcomments" class="list-posts list-medium">';
        if ( is_array( $comments ) && $comments ) {
            // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
            $post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
            _prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );
 
            foreach ( (array) $comments as $comment ) {
                $output .= '<li class="recentcomments">';
                /* translators: comments widget: 1: comment author, 2: post link */
                $output .= sprintf( _x( '%1$s commented on %2$s', 'widgets' ),
                    '<span class="comment-author-link">' . get_comment_author_link( $comment ) . '</span>',
                    '<a href="' . esc_url( get_comment_link( $comment ) ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a>'
                );
                $output .= '</li>';
            }
        }
        $output .= '</ul>';
        $output .= $args['after_widget'];
 
        echo $output;
    }
}