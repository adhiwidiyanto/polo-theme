<?php

class Recent_Post_Widget extends WP_Widget_Recent_Posts {

    function widget($args, $instance) {
        extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo $before_widget;
			if( $title ) echo '<h2 class="widget-title">' . $title . '</h2>' ?>
			<ul class="list-posts list-medium">
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <small><?php the_time( 'F d'); ?> -</small>
                </li>
				<?php endwhile; ?>
			</ul>
			 
			<?php
			echo $after_widget;
		
        wp_reset_postdata();
        
        endif;
    }
}