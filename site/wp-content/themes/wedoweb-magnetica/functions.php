<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

function display_navigation()
{
    $menu_name = 'header-menu';
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = '<ul class="nav navbar-nav">';
        global $wp;
//        var_dump(home_url( $wp->request ));
//        var_dump(strpos(wp_get_re(), '/blog/'));
        foreach ((array) $menu_items as $key => $menu_item) {
            $activeLink = '';
            if(is_page('blog') && (strtolower($menu_item->title) == 'blog')) {
                $activeLink = 'blog-link';
            }
            else if(is_page('collaborators') && (strtolower($menu_item->title) == 'collaborators')) {
                $activeLink = 'collaborators-link';
            }
            else if(is_page('portfolio') && (strtolower($menu_item->title) == 'portfolio')) {
                $activeLink = 'portfolio-link';
            }
            else if((strtolower($menu_item->title) == 'blog') && is_single() &&
                strpos(home_url( $wp->request ), '/blog/')) {
                $activeLink = 'blog-link';
            }
            $menu_list .= '<li><a href="'.$menu_item->url.'" class="'.$activeLink.'">'.$menu_item->title.'</a></li>';
        }

        $menu_list .= '</ul>';

        echo $menu_list;
    }

}

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1', true); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        $js_version = file_get_contents("src/js-manifest.json", FILE_USE_INCLUDE_PATH);
        $js_manifest = json_decode($js_version, true);
        wp_register_script('wedowebscripts', get_template_directory_uri() . '/js/vendor.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('wedowebscripts'); // Enqueue it!

        wp_register_script('wedowebscripts2', get_template_directory_uri() . '/js/' . $js_manifest['app.js'], array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('wedowebscripts2'); // Enqueue it!



    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

function format_date($date, $format) {
    $values = explode('-', $date);
    return date($format, mktime(0, 0, 0, $values[1], $values[2], $values[0]));
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    $css_version = file_get_contents("src/css-manifest.json", FILE_USE_INCLUDE_PATH);
    $css_manifest = json_decode($css_version, true);
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('wedoweb', get_template_directory_uri() . '/css/' . $css_manifest['app.css'], array(), '1.0', 'all');
    wp_enqueue_style('wedoweb'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

function create_new_url_querystring() {
    add_rewrite_rule(
        'blog/([^/]*)$',
        'index.php?name=$matches[1]',
        'top'
    );
    add_rewrite_tag('%blog%','([^/]*)');
}

function append_query_string($url, $post, $leavename) {
    if ( $post->post_type == 'post' ) {
        $url = home_url( user_trailingslashit( "blog/$post->post_name" ) );
    }
    return $url;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_clientes'); //CUSTOM POST TYPE: CLIENTES
add_action('init', 'create_post_type_trabajos'); //CUSTOM POST TYPE: TRABAJOS
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action('init', 'create_new_url_querystring');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter( 'post_link', 'append_query_string', 10, 3 );
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// CUSTOM POST TYPE: CLIENTES
function create_post_type_clientes()
{
    register_taxonomy_for_object_type('category', 'clientes'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'clientes');
    register_post_type('clientes', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Clientes', 'clientes'), // Rename these to suit
            'singular_name' => __('Clientes', 'clientes'),
            'add_new' => __('Agregar Nuevo', 'clientes'),
            'add_new_item' => __('Agregar Nuevo Cliente', 'clientes'),
            'edit' => __('Editar', 'clientes'),
            'edit_item' => __('Editar Cliente', 'clientes'),
            'new_item' => __('Nuevo Cliente', 'clientes'),
            'view' => __('Ver Cliente', 'clientes'),
            'view_item' => __('Ver Cliente', 'clientes'),
            'search_items' => __('Buscar Cliente', 'clientes'),
            'not_found' => __('No se encontraron clientes', 'clientes'),
            'not_found_in_trash' => __('No se encontraron clientes', 'clientes')
        ),
        'menu_icon' => 'dashicons-list-view',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        'supports' => array(
            'title'
        ), // Go to Dashboard Custom Portfolio post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category'
        ) // Add Category and Post Tags support
    ));
}

// CUSTOM POST TYPE: TRABAJOS
function create_post_type_trabajos()
{
    register_taxonomy_for_object_type('category', 'trabajos'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'trabajos');
    register_post_type('trabajos', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Trabajos', 'trabajos'), // Rename these to suit
            'singular_name' => __('Trabajos', 'trabajos'),
            'add_new' => __('Agregar Nuevo', 'trabajos'),
            'add_new_item' => __('Agregar Nuevo Trabajo', 'trabajos'),
            'edit' => __('Editar', 'trabajos'),
            'edit_item' => __('Editar Trabajo', 'trabajos'),
            'new_item' => __('Nuevo Trabajo', 'trabajos'),
            'view' => __('Ver Trabajo', 'trabajos'),
            'view_item' => __('Ver Trabajo', 'trabajos'),
            'search_items' => __('Buscar Trabajo', 'trabajos'),
            'not_found' => __('No se encontraron trabajos', 'trabajos'),
            'not_found_in_trash' => __('No se encontraron trabajos', 'trabajos')
        ),
        'menu_icon' => 'dashicons-portfolio',
        'public' => true,
        'hierarchical' => false, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor'
        ), // Go to Dashboard Custom Portfolio post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'category'
        ) // Add Category and Post Tags support
    ));
}


/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

if(function_exists("register_field_group"))
{

    register_field_group(array (
		'id' => 'acf_nosotros-fields',
		'title' => 'Nosotros',
		'fields' => array (
            array (
				'key' => 'field_5',
				'label' => 'Título',
				'name' => 'nosotros_titulo',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
            array (
				'key' => 'field_4',
				'label' => 'Video',
				'name' => 'nosotros_video',
				'type' => 'file',
                'return_format' => 'url',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
            array (
				'key' => 'field_6',
				'label' => 'Placeholder de Video',
				'name' => 'nosotros_placeholder',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
            array (
				'key' => 'field_30',
				'label' => 'Creatividad',
				'name' => 'nosotros_creatividad',
				'type' => 'repeater',
				'default_value' => ''
			),
            array (
				'key' => 'field_31',
				'label' => 'Diseño',
				'name' => 'nosotros_diseno',
				'type' => 'repeater',
				'default_value' => ''
			),
            array (
				'key' => 'field_32',
				'label' => 'Eventos',
				'name' => 'nosotros_eventos',
				'type' => 'repeater',
				'default_value' => ''
			),
            array (
				'key' => 'field_33',
				'label' => 'Contenidos',
				'name' => 'nosotros_contenidos',
				'type' => 'repeater',
				'default_value' => ''
			),
            array (
				'key' => 'field_34',
				'label' => 'Experiencias',
				'name' => 'nosotros_experiencias',
				'type' => 'repeater',
				'default_value' => ''
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '79',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

    acf_add_local_field(array(
    	'key' => 'field_nosotros_creatividad',
    	'label' => 'Item',
    	'name' => 'nosotros_item_creatividad',
    	'parent' => 'field_30',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
    ));
    acf_add_local_field(array(
    	'key' => 'field_nosotros_diseno',
    	'label' => 'Item',
    	'name' => 'nosotros_item_diseno',
    	'parent' => 'field_31',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
    ));
    acf_add_local_field(array(
    	'key' => 'field_nosotros_eventos',
    	'label' => 'Item',
    	'name' => 'nosotros_item_eventos',
    	'parent' => 'field_32',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
    ));
    acf_add_local_field(array(
    	'key' => 'field_nosotros_contenidos',
    	'label' => 'Item',
    	'name' => 'nosotros_item_contenidos',
    	'parent' => 'field_33',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
    ));
    acf_add_local_field(array(
    	'key' => 'field_nosotros_experiencias',
    	'label' => 'Item',
    	'name' => 'nosotros_item_experiencias',
    	'parent' => 'field_34',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
    ));


    register_field_group(array (
		'id' => 'acf_contacto-fields',
		'title' => 'Contacto',
		'fields' => array (
            array (
				'key' => 'field_7',
				'label' => 'En Argentina',
				'name' => 'contacto_wysiwyg_ar',
				'type' => 'wysiwyg',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
            array (
				'key' => 'field_8',
				'label' => 'En Paraguay',
				'name' => 'contacto_wysiwyg_py',
				'type' => 'wysiwyg',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '81',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

    register_field_group(array (
		'id' => 'acf_cliente-fields',
		'title' => 'Campos del Cliente',
		'fields' => array (
            array (
				'key' => 'field_2',
				'label' => 'URL del sitio',
				'name' => 'site_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
            array (
				'key' => 'field_3',
				'label' => 'Logo del cliente',
				'name' => 'logo_cliente',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'clientes',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

    acf_add_local_field(array(
    	'key' => 'field_trabajo_image',
    	'label' => 'Imagen',
    	'name' => 'trabajos_imagen',
    	'type' => 'image',
    	'parent' => 'field_23',
        'save_format' => 'url',
        'preview_size' => 'full',
        'library' => 'all'
    ));

    register_field_group(array (
		'id' => 'acf_trabajos-fields',
		'title' => 'Campos de Trabajos',
		'fields' => array (
            array (
				'key' => 'field_25',
				'label' => 'Nombre del cliente',
				'name' => 'trabajos_cliente',
				'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
			),
            array (
				'key' => 'field_26',
				'label' => 'Nombre del evento',
				'name' => 'trabajos_nombre',
				'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
			),
            array (
				'key' => 'field_27',
				'label' => 'Destacado',
				'name' => 'trabajos_destacado',
				'type' => 'checkbox',
				'default_value' => '',
                'choices' => array(
            		'true'	=> 'Destacar'
            	),
			),
            array (
				'key' => 'field_21',
				'label' => 'Icono de lista',
				'name' => 'trabajos_icono',
				'type' => 'radio',
				'default_value' => '',
                'choices' => array(
            		'imagen'	=> 'Imagen',
                    'video'	=> 'Video'
            	),
			),
            array (
				'key' => 'field_24',
				'label' => 'GIF',
				'name' => 'trabajos_gif',
				'type' => 'image',
				'default_value' => '',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all'
			),
            array (
                'key' => 'field_22',
                'label' => 'URL de Video Promocional (Vimeo)',
				'name' => 'trabajos_video_promo',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            /*array (
				'key' => 'field_22',
				'label' => 'Video Promocional',
				'name' => 'trabajos_video_promo',
				'type' => 'file',
				'default_value' => '',
                'return_format' => 'url'
			),*/
            array (
				'key' => 'field_23',
				'label' => 'Lista de Imagenes',
				'name' => 'trabajos_imagenes',
				'type' => 'repeater',
				'default_value' => ''
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'trabajos',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

}


/* MENU */
function remove_menus(){

    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'edit.php?post_type=acf-field-group' );

}
add_action( 'admin_menu', 'remove_menus' );


/*SESSION*/
function register_my_session()
{
  if( !session_id() )
  {
    session_start();
    if(!$_SESSION['pais'])
        $_SESSION['pais']='AR';
    if($_GET['pais']){
        if($_GET['pais'] == 'AR')
            $_SESSION['pais']='AR';
        if($_GET['pais'] == 'PY')
            $_SESSION['pais']='PY';
    }
  }
}
add_action('init', 'register_my_session');

?>
