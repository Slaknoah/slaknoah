<?php get_header() ?>

<?php
    //check if flexible content has rows of data
    if(have_rows('flexible_fields') ):

        //loop through the rows of data
        while ( have_rows('flexible_fields') ): the_row();
            //  *** About section ***
            if (get_row_layout() == 'section_about'):
                if (get_sub_field('showhide')): ?>
                    <section class="section-about js--section-about" id="about" >
                        <div class="row section-heading">
                            <h2 class="waypoint" data-animation="fadeInLeft"><?php the_sub_field('title'); ?></h2>
                            <div class="header-after waypoint" data-animation="fadeInLeft" data-delay=".5s"></div>
                            <p class="long-text waypoint" data-animation="fadeInUp"><?php the_sub_field('text'); ?></p>
                        </div>
                        <div class="row about-boxes">
                            <div class="about-box about-data waypoint" data-animation="fadeInLeft">
                                <p>
                                    <span class="about-data-label">Name:</span>
                                    <span class="about-data-info"><?php the_sub_field('fullname'); ?></span>
                                </p>
                                <p>
                                    <span class="about-data-label">Age:</span>
                                    <span class="about-data-info"><?php the_sub_field('age'); ?></span>
                                </p>
                                <p>
                                    <span class="about-data-label">Email:</span>
                                    <span class="about-data-info"><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></span>
                                </p>
                                <p>
                                    <span class="about-data-label">Phone:</span>
                                    <span class="about-data-info"><a href="tel:<?php echo preg_replace('/^[0-9]/', '', get_sub_field('phone')) ?>"><?php the_sub_field('phone'); ?></a></span>
                                </p>
                                <p>
                                    <span class="about-data-label">Skype:</span>
                                    <span class="about-data-info"><?php the_sub_field('skype'); ?></span>
                                </p>
                                <a href="mailto:<?php the_sub_field('email'); ?>" class="btn btn-full" >Hire Me</a>
                            </div>
                            <div class="about-box about-image waypoint" data-animation="fadeInUp">
                                <?php $photo = get_sub_field('photo') ?>
                                <img src="<?php echo $photo['sizes']['medium'] ?>" alt="<?php echo $photo['alt'] ?>">
                            </div>

                            <?php if( ($skills = get_sub_field('skills')) && (is_array($skills) && count($skills) > 0) ): ?>
                                <div class="about-box about-technologies waypoint" data-animation="fadeInRight">
                                    <div class="progress-bars">
                                        <?php foreach($skills as $key => $skill): ?>
                                            <div class="progress-bar-item">
                                                <div class="label"><?php echo $skill['name'] ?></div>
                                                <div class="progress-bar">
                                                    <div class="fill" style="width: <?php echo $skill['progress'] ?>%"></div>
                                                    <span class="percentage"><?php echo $skill['progress'] ?>%</span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endif;
            endif;

            //  *** Experience Section ***
            if (get_row_layout() == 'section_experience'):
                if (get_sub_field('showhide')): ?>
                    <section class="section-experience" id="experience">
                        <div class="row section-heading">
                            <h2 class="waypoint" data-animation="fadeInRight"><?php the_sub_field('title'); ?></h2>
                            <div class="header-after waypoint" data-animation="fadeInLeft" data-delay=".5s"></div>
                        </div>

                        <?php if( ($companies = get_sub_field('companies')) && (is_array($companies) && count($companies) > 0) ): ?>
                            <div class="row experience-boxes">
                                <?php foreach($companies as $key => $company): ?>
                                    <div class="company-box waypoint" data-animation="<?php echo (($key+1)%2 == 1) ? 'slideInLeft' : 'slideInRight' ?>">
                                        <div class="company-box-heading clearfix">
                                            <h3><a href="#"><?php echo $company['name'] ?></a></h3>
                                            <div class="position"><?php echo $company['position'] ?></div>
                                        </div>
                                        <div class="company-box-text">
                                            <?php echo $company['text'] ?>
                                        </div>
                                        <div class="company-box-footer">
                                            <p><?php echo $company['start_date'] ?> - <?php echo $company['end_date'] ?> | <?php echo $company['address'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif;
            endif;
            
            //  *** Skills Section ***
            if (get_row_layout() == 'section_skills'):
                if (get_sub_field('showhide')): ?>
                    <section class="section-skills">
                        <div class="row section-heading">
                            <h2 class="waypoint" data-animation="fadeInRight"><?php the_sub_field('title'); ?></h2>
                            <div class="header-after waypoint" data-animation="fadeInRight" data-delay=".5s"></div>
                            <p class="long-text waypoint" data-animation="fadeInUp"><?php the_sub_field('text'); ?></p>
                        </div>
                        
                        <?php if( ($skills = get_sub_field('skills')) && (is_array($skills) && count($skills) > 0) ): ?>
                            <div class="row skills-boxes">
                                <?php foreach(array_chunk($skills, 3) as $skills_grp): ?>
                                    <?php $anim_delay = 0; ?>
                                    <?php foreach ($skills_grp as $key => $skill): ?>
                                        <div class="skill-box waypoint" data-animation="slideInUp" data-delay="<?php echo $anim_delay; ?>s">
                                            <span class="icon-big"><i class="<?php echo $skill['icon_class'] ?>"></i></span>
                                            <h4><?php echo $skill['title'] ?></h4>
                                            <p><?php echo $skill['text'] ?></p>
                                        </div>
                                    <?php $anim_delay += 0.1; endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif;
            endif;

            //  *** Portfolio section ***
            if (get_row_layout() == 'section_portfolio'):
                if (get_sub_field('showhide')): ?>
                    <section class="section-portfolio" id="portfolio">
                        <div class="row section-heading">
                            <h2 class="waypoint" data-animation="fadeInLeft"><?php the_sub_field('title'); ?></h2>
                            <div class="header-after waypoint" data-animation="fadeInLeft" data-delay=".5s"></div>
                            <p class="long-text waypoint" data-animation="fadeInUp"><?php the_sub_field('text'); ?></p>
                        </div>

                        <?php if( ($filters = get_field('portfolio_filters', 'option')) && (is_array($filters) && count($filters) > 0) ): ?>
                            <div class="row">
                                <ul class="filters waypoint js--filters" data-animation="fadeIn">
                                    <li class="highlight" data-filter="all">All</li>
                                    <?php foreach($filters as $key => $filter): ?>
                                        <li data-filter=".<?php echo $filter['value'] ?>"><?php echo $filter['label'] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        
                        <?php if( ($projects = get_sub_field('projects')) && (is_array($projects) && count($projects) > 0) ): ?>
                            <div class="row work-boxes waypoint " id="gallery" data-animation="zoomIn">
                                <?php foreach($projects as $key => $project): ?> 
                                    <?php 
                                        // Use first image in Gallery as cover
                                        $image = $project['images'][0]; 
                                    ?>
                                    <div class="work-box mix <?php echo $project['project_category'] ?>" data-order="1" data-project-index= "<?php echo $key ?>" style="background-image: url('<?php echo $image['sizes']['medium'] ?>')">
                                        <div class="text">
                                            <h3><?php echo $project['name'] ?></h3>
                                            <span><?php echo $project['technology'] ?></span>
                                        </div>
                                        <div class="buttons">
                                            <a href="#" class="js--view-project"><span class="icon-big"><i class="icon ion-ios-eye"></i></span></a>
                                            <?php if(!empty($project['link'])): ?>
                                                <a href="<?php echo $project['link'] ?>" target="_blank"><span class="icon-big"><i class="icon ion-ios-link"></i></span></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif;
            endif;

            //  *** Testimonials section ***
            if (get_row_layout() == 'section_testimonials'):
                if (get_sub_field('showhide')): ?>
                    <section class="section-testimonials" id="testimonials">
                        <div class="row section-heading">
                            <h2 class="waypoint" data-animation="fadeInRight"><?php the_sub_field('title'); ?></h2>
                            <div class="header-after waypoint" data-animation="fadeInLeft" data-delay=".5s"></div>
                            <p class="long-text waypoint" data-animation="fadeInUp"><?php the_sub_field('text'); ?></p>
                        </div>

                        <?php if( ($testimonials = get_sub_field('testimonials')) && (is_array($testimonials) && count($testimonials) > 0) ): ?>
                            <div class="row testimonials">
                                <?php foreach($testimonials as $key => $testimonial): ?>
                                    <blockquote class="waypoint" data-animation="fadeInRight">
                                        <p>
                                            <i class="icon ion-ios-quote quote-icon"></i>
                                            <?php echo $testimonial['text'] ?>
                                        </p>
                                        <cite>
                                            <img src="<?php echo $testimonial['author_image']['sizes']['thumbnail'] ?>" alt="Alva Dickinson">
                                            <span class="testimonial-author"><?php echo $testimonial['author_name'] ?> <span><?php echo $testimonial['author_title'] ?></span></span>
                                        </cite>
                                    </blockquote>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php endif;
            endif;

            //  *** Blog section ***
            if (get_row_layout() == 'section_blog'):
                if (get_sub_field('showhide')): ?>
                    <section class="section-blog" id="blog">
                        <div class="row section-heading">
                            <h2 class="waypoint" data-animation="fadeInRight"><?php the_sub_field('title'); ?></h2>
                            <div class="header-after waypoint" data-animation="fadeInRight" data-delay=".5s"></div>
                            <p class="long-text waypoint" data-animation="fadeInUp"><?php the_sub_field('text'); ?></p>
                        </div>

                        <?php
                            // the query
                            $max_posts = get_sub_field('maximum_posts');
                            $latest_posts = new WP_Query( array(
                                'posts_per_page' => $max_posts,
                            ));
                        ?>
                        <?php if ( $latest_posts->have_posts() ): ?>
                            <div class="row waypoint clearfix" data-animation="fadeIn">
                                <div class="blog-boxes">
                                    <?php while($latest_posts->have_posts()): $latest_posts->the_post(); ?>
                                        <div class="blog-box">
                                            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('medium'); ?>" alt="" class="blog-box-image"></a>
                                            <div class="blog-box-text">
                                                <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                                <?php the_excerpt() ?>
                                            </div>
                                            <div class="blog-box-footer">
                                                <p class="blog-box-date"><i class="icon ion-ios-calendar"></i><?php echo get_the_date() ?></p>
                                                <a href="<?php the_permalink() ?>#comments" class="blog-box-comments"><i class="icon ion-ios-chatboxes"></i><span class="disqus-comment-count" data-disqus-identifier="<?php the_permalink() ?>">Post a comment</span></a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php wp_reset_postdata() ?>
                                <a class="btn btn-hero btn-hero-blue btn-goto" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" >Go to blog <i class="icon ion-ios-arrow-forward"></i></a>
                            </div>
                        <?php endif; ?>
                        </section>
                <?php endif;
            endif;
        endwhile;
    else:
    //no layout found
    endif;
?>

<?php  get_footer() ?>

