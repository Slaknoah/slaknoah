<!DOCTYPE html>
<html>

<head>
    <title>Slaknoah | Full-stack web developer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
</head>

<body class="<?php echo (is_blog() || ( is_home() && !is_front_page())) ? 'body-blog-page': ''; ?>" ontouchstart="">
<div class="modal-wrap closed">
    <div class="modal" id="modal-portfolio">
        <div class="container">
        </div>
        <div class="loading">
            <div class="loader">
            </div>
        </div>
    </div>
    <div class="modal-close"><a class="modal-btn-close"><i class="icon ion-md-close"></i></a></div>
</div>
<div id="loader-wrapper">
    <div class="loader">
    </div>
    <div class="logo">S</div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<header>
    <?php if( is_front_page() ): ?>
        <div id='js--particles'></div>
        <div class="hero-content">
            <div class="hero-text-box">
                <h1 class="type-it"></h1>
            </div>
            <a href="#" class="btn-hero-head btn btn-hero btn-hero-white js--scroll-to-about">View my works <i class="icon ion-ios-arrow-down"></i></a>
        </div>
    <?php endif; ?>

    <nav class="main-nav height-fix">
        <div class="row clearfix">
            <a href="/" class="site-title">Slak <span class="highlight">noah</span></a>
            <ul class="main-menu">
                <li><a href="/#about">About</a></li>
                <li><a href="/#experience">Experience</a></li>
                <li><a href="/#portfolio">Portfolio</a></li>
                <li><a href="/#testimonials">Testimonials</a></li>
                <li><a href="<?php echo (is_front_page()) ? '/#blog': get_permalink( get_option( 'page_for_posts' ) ); ?>">Blog</a></li>
            </ul>
            <div class="mobile-nav-btn js--toggle-menu"><i class="icon ion-md-menu"></i></div>
        </div>
    </nav>
</header>

<main class="<?php echo (is_blog() || ( is_home() && !is_front_page())) ? 'blog-page': ''; ?> main-wrap">
