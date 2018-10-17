<?php get_header(); ?>
<?php if (have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <article class="single-post">
            <div class="row">
                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-hero btn-hero-black"><i class="icon ion-ios-arrow-back"></i> Back to blog</a>
            </div>
            <div class="row">
                <div class="blog-content">
                    <h3 class="blog-post-category"></h3>
                    <h1 class="blog-post-title"><?php the_title() ?></h1>
                    <h4 class="blog-post-date"><time class="post-date" datetime="2016-04-29"><?php the_date() ?></time></h4>
                    <hr>
                    <img class="blog-image" src="<?php the_post_thumbnail_url() ?>">
                    <?php the_content() ?>
                </div>
            </div>

            <div class="row">
                <div class="posts-nav posts-single-nav clearfix">
                    <?php $prev_post = get_previous_post(true, '') ?>
                    <?php if(get_permalink($prev_post->ID) !== get_permalink()): ?>
                        <a href="<?php echo get_permalink($prev_post->ID) ?>" class="nav-box prev">
                            <div class="post-image">
                                <img src="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail') ?>" alt="">
                            </div>
                            <div class="post-info">
                                <div class="post-info-label">Previous post</div>
                                <div class="post-info-title"> <span><i class="icon ion-md-arrow-back"></i></span> <?php echo $prev_post->post_title ?></div>
                            </div>
                        </a>
                    <?php endif; ?>

                    <?php $next_post = get_next_post(true, '') ?>
                    <?php if(get_permalink($next_post->ID) !== get_permalink()): ?>
                        <a href="<?php echo get_permalink($next_post->ID) ?>" class="nav-box next">
                            <div class="post-info">
                                <div class="post-info-label">Next post</div>
                                <div class="post-info-title"><?php echo $next_post->post_title ?> <span><i class="icon ion-md-arrow-forward"></i></span></div>
                            </div>
                            <div class="post-image">
                                <img src="<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail') ?>" alt="">
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <?php $authorID  = get_the_author_meta('ID'); ?>
                <div class="post-author clearfix">
                    <div class="post-author-image">
                        <img src="<?php echo get_avatar_url($authorID) ?>" alt="Author">
                    </div>
                    <div class="post-author-info">
                        <span class="author-name"><?php the_author_meta('display_name') ?></span>
                        <span class="author-bio"><?php echo nl2br(get_the_author_meta('description')); ?></span>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="post-comments" id="comments">
                    <div id="disqus_thread"></div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<script>

    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

    var disqus_config = function () {
        this.page.url = '<?php the_permalink(); ?>';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = '<?php the_permalink(); ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://slaknoah.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<?php get_footer(); ?>
