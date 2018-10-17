<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package slaknoah
 */

get_header(); ?>
<!--    <div class="row">-->
<!--        <h1 class="page-heading">Blog</h1>-->
<!--        <div class="header-after"></div>-->
<!--    </div>-->
    <?php if(have_posts() ): ?>
        <div class="blog-stream">
            <?php while(have_posts()): the_post(); ?>
                <article>
                    <div class="row blog-content">
                        <h1 class="blog-post-title"><a href=""><?php the_title() ?></a></h1>
                        <h4 class="blog-post-date"><span><i class="icon ion-ios-calendar"></i> <time class="post-date" datetime="2016-04-29"><?php echo get_the_date() ?> </time></span> <span><i class="icon ion-ios-chatboxes"></i> <span class="disqus-comment-count" data-disqus-identifier="<?php the_permalink() ?>">Post a comment</span></span></h4>
                        <a href=""><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
                        <p><?php the_excerpt() ?></p>
                        <div class="btn-read-more">
                            <a href="<?php the_permalink() ?>" class="btn btn-hero btn-hero-black">Read more</a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    

    <div class="row">
        <?php
            global $paged;
            if(empty($paged)) $paged = 1;
        ?>
        <div class="posts-nav posts-archive-nav clearfix">
            <?php if (get_next_posts_link() ): ?>
                <a href="<?php echo get_pagenum_link($paged+1) ?>" class="nav-box prev">
                    <div class="post-info">
                        <div class="post-info-title"> <span class="icon"><i class="icon ion-ios-arrow-back"></i></span> Older Posts</div>
                    </div>
                </a>
            <?php endif; ?>

            <?php if (get_previous_posts_link() ): ?>
                <a href="<?php echo get_pagenum_link($paged-1) ?>" class="nav-box next">
                    <div class="post-info">
                        <div class="post-info-title">Newer Posts <span class="icon"><i class="icon ion-ios-arrow-forward"></i></span></div>
                    </div>
                </a>
            <?php endif; ?>
        </div>
    </div>

<?php
get_footer();
