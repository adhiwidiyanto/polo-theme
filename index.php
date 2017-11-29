<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="content col-md-9">
                <!-- <div class="page-title">
                    <h1>Blog - Sidebar Left</h1>
                    <div class="breadcrumb float-left">
                        <ul>
                            <li><a href="#">Home</a>
                            </li>
                            <li><a href="#">Blog</a>
                            </li>
                            <li class="active"><a href="#">Sidebar Left</a>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <div id="blog">
                    <?php
                        if( have_posts() ){
                            while(have_posts()) {
                                the_post(); ?>
                                <div class="post-item">
                                    <div class="post-item-wrap">
                                        <div class="post-image">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail( 'full' ); ?>
                                            </a>
                                        </div>
                                        <div class="post-item-description">
                                            <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?php the_time('F jS, Y') ?></span>
                                            <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i><?php comments_popup_link('No Comments »', '1 Comment', '% Comments'); ?></a></span>
                                            <h2>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            <p><?php the_excerpt(); ?></p>
            
                                            <a href="<?php the_permalink(); ?>" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>
            
                                        </div>
                                    </div>
                                </div>
                <?php       }
                        }
                    ?>
                    <!-- <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>
                                <h2>
                                    <a href="#">Lighthouse, standard post with a single image
                                    </a>
                                </h2>
                                <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>

                                <a href="#" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div> -->
                </div>
                <nav>
                    <nav>
                        <ul class="pager">
                            <li class="previous">
                               <?php previous_posts_link(); ?>
                            </li>
                            <li class="next">
                            <?php next_posts_link(); ?>
                            </li>
                        </ul>
                    </nav>
                </nav>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>