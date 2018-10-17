<?php
/**
 * slaknoah functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package slaknoah
 */

if ( ! function_exists( 'slaknoah_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function slaknoah_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on slaknoah, use a find and replace
		 * to change 'slaknoah' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'slaknoah', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'slaknoah' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'slaknoah_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'slaknoah_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function slaknoah_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'slaknoah_content_width', 640 );
}
add_action( 'after_setup_theme', 'slaknoah_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function slaknoah_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'slaknoah' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'slaknoah' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'slaknoah_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function slaknoah_scripts() {
    wp_enqueue_script('slaknoah-front-main', get_template_directory_uri() . '/js/bundle.js');
}
add_action( 'wp_enqueue_scripts', 'slaknoah_scripts' );

/* Remove comment feeds */
add_filter( 'feed_links_show_comments_feed', '__return_false' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Contact form function
 */
require get_template_directory() . '/inc/send.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Add options page */
if( function_exists('acf_add_options_page') ) {

    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title' 	=> 'Theme Settings',
    ));

}

/* Dynamically populate portfolio select category */
function acf_load_filter_field_choices( $field ) {

    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('portfolio_filters', 'option') ) {

        // while has rows
        while( have_rows('portfolio_filters', 'option') ) {

            // instantiate row
            the_row();


            // vars
            $value = get_sub_field('value');
            $label = get_sub_field('label');


            // append to choices
            $field['choices'][ $value ] = $label;

        }

    }


    // return the field
    return $field;

}

add_filter('acf/load_field/name=project_category', 'acf_load_filter_field_choices');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/**
 * Get and send project
 */
function true_get_project(){
    $projectIndex = $_POST['projectIndex'];

    if(have_rows('flexible_fields', 2) ):
        while ( have_rows('flexible_fields', 2) ): the_row();
            if (get_row_layout() == 'section_portfolio'):
                $projects = get_sub_field('projects');
                $project = $projects[$projectIndex]; ?>
				<?php if( ($images = $project['images']) && (is_array($images) && count($images) > 0) ): ?>
					<div class="modal-gallery swiper-container">
						<div class="swiper-wrapper">
							<?php foreach($images as $key => $image): ?>
								<div class="swiper-slide">
									<img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>">
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-scrollbar"></div>

						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				<?php endif; ?>
			
				<div class="modal-content">
					<div class="modal-heading">
						<h2 class="modal-title"><?php echo $project['name'] ?></h2>
						<p class="modal-sub-title"><?php echo $project['technology'] ?></p>
					</div>
					<div class="modal-text"><?php echo $project['text'] ?></div>
				</div>
            <?php endif;
        endwhile;
    endif;
    wp_reset_postdata();
    die();
}


add_action('wp_ajax_get_project', 'true_get_project');
add_action('wp_ajax_nopriv_get_project', 'true_get_project');

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}


/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}
