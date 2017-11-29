<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="content col-md-9">
                <div id="blog" class="single-post">
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
                                            <h2>
                                                <a href="#"><?php the_title(); ?></a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="post-meta-date">
                                                    <i class="fa fa-calendar-o"></i><?php the_time('F jS, Y') ?>
                                                </span>
                                                <span class="post-meta-comments">
                                                    <a href="">
                                                        <i class="fa fa-comments-o"></i>
                                                        <?php comments_popup_link('No Comments »', '1 Comment', '% Comments'); ?>
                                                    </a>
                                                </span>
                                                <span class="post-meta-category">
                                                    <i class="fa fa-tag"></i>
                                                    Category
                                                </span>
                                            </div>
                                            <?php the_content(); ?>
                                            <div class="post-tags">
                                                <?php the_tags('', ' '); ?>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                <?php       }
                        }
                    ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>