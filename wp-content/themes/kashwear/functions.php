<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 */


 function module_products() {
    register_post_type(
        'products',
        array(
            'labels' => array(
                'name' => 'Products',
                'singular_name' => 'Product',
                'add_new' => 'Add New Product',
                'add_new_item' => 'Add New Product',
                'edit_item' => 'Edit Product',
                'new_item' => 'New Product',
                'view_item' => 'View Product',
                'search_items' => 'Search Products',
                'not_found' => 'No Products found',
                'not_found_in_trash' => 'No Products found in Trash',
                
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
            'rewrite' => array( 'slug' => 'products' ),
            'menu_position' => 3,
            'menu_icon' => 'dashicons-products',
            'taxonomies'  => array( 'category' ),
        )
    );
}
add_action( 'init', 'module_products' );


function register_html_module_post_type() {
    register_post_type(
        'html_module',
        array(
            'labels' => array(
                'name' => 'HTML',
                'singular_name' => 'HTML Module',
                'add_new' => 'Add New HTML Module',
                'add_new_item' => 'Add New HTML Module',
                'edit_item' => 'Edit HTML Module',
                'new_item' => 'New HTML Module',
                'view_item' => 'View HTML Module',
                'search_items' => 'Search HTML Modules',
                'not_found' => 'No HTML Modules found',
                'not_found_in_trash' => 'No HTML Modules found in Trash',
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
            'rewrite' => array( 'slug' => 'html-modules' ),
            'menu_position' => 2,
            'menu_icon' => 'dashicons-html',
        )
    );
}
add_action( 'init', 'register_html_module_post_type' );


function register_my_menu() {
    register_nav_menus( array(
        'primary-menu' => 'Primary Menu', // Replace 'Primary Menu' with your desired menu name
        'footer-menu' => 'Footer Menu' // Replace 'Secondary Menu' with your desired menu name
    ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );


/* front end html module */
function get_html_modules($module_id) {
    // Custom Query to retrieve HTML Modules
    $args = array(
        'post_type' => 'html_module',
        'posts_per_page' => -1, // Retrieve all modules
        'order' => 'ASC',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            the_content();
        }
    }
    
    // Reset post data
    wp_reset_postdata();
}

/* custome html module */
function get_specific_post($post_id) {
    $post = get_post($post_id);

    if ($post) {
        // Display post data or perform operations
        $post_title = $post->post_title;
        $post_content = $post->post_content;
     
        echo "{$post_content}";
    }
}

function get_pages_data() {
    $pages = get_pages();

    foreach ($pages as $page) {
        $page_title = $page->post_title;
        $page_content = $page->post_content;

        echo "<h2>{$page_title}</h2>";
        echo "<div>{$page_content}</div>";
    }
}

function display_menu_items() {
    // Replace 'primary-menu' with the desired menu location
    $menu_items = wp_get_menu_array('main-menu');

    if ($menu_items) {
        echo '<ul data-menu-handle="main-menu">'; // Start the top-level menu list

        foreach ($menu_items as $menu_item) {
            $menu_title = $menu_item['title'];
            $menu_url = $menu_item['url'];
            $menu_children = $menu_item['children'];

            if (!empty($menu_children)) {
                echo '<li>'; // Start a menu item
                echo '<a href="' . esc_url($menu_url) . '" class="has-children">' . esc_html($menu_title) . '<span class="exp">+</span></a>';
                echo '<ul data-menu-handle="' . esc_html($menu_title) . '">'; // Start the sub-menu list
                foreach ($menu_children as $child_item) {
                    $child_title = $child_item['title'];
                    $child_url = $child_item['url'];
                    echo '<li>'; // Start a sub-menu item
                    echo '<a href="' . esc_url($child_url) . '">' . esc_html($child_title) . '</a>';
                    echo '</li>'; // End a sub-menu item
                }
                echo '</ul>'; // End the sub-menu list
            }
            echo '<li>'; // Start a menu item
            echo '<a href="' . esc_url($menu_url) . '" >' . esc_html($menu_title) . '</a>';
            echo '</li>'; // End a menu item
        }
        echo '</ul>'; // End the top-level menu list
    }
}

function wp_get_menu_array($current_menu) {

	$array_menu = wp_get_nav_menu_items($current_menu);

	$menu = array();

	foreach ($array_menu as $m) {
		if (empty($m->menu_item_parent)) {
			$menu[$m->ID] = array();
			$menu[$m->ID]['ID']      =   $m->ID;
			$menu[$m->ID]['title']       =   $m->title;
			$menu[$m->ID]['url']         =   $m->url;
			$menu[$m->ID]['children']    =   array();
		}
	}

	$submenu = array();

	foreach ($array_menu as $m) {
		if ($m->menu_item_parent) {
			$submenu[$m->ID] = array();
			$submenu[$m->ID]['ID']       =   $m->ID;
			$submenu[$m->ID]['title']    =   $m->title;
			$submenu[$m->ID]['url']  =   $m->url;
			$menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
		}
	}

	return $menu;

}


function custom_login_logo() {
    echo '<style type="text/css">';
    echo 'body.login div#login h1 a {';
    echo 'background-image: url(' . get_template_directory_uri() . '/assets/logo.png) !important;';
    echo 'width: 100% !important;';
    echo 'height: 100px !important;';
    echo 'background-size: contain !important;';
    echo '}';
    echo '</style>';
}
add_action('login_head', 'custom_login_logo');


function remove_about_wordpress() {
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}
add_action('wp_dashboard_setup', 'remove_about_wordpress');


function remove_wordpress_dropdown_menu() {
    global $wp_admin_bar;
    // Remove the 'wp-logo' group that contains the WordPress dropdown menu
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'remove_wordpress_dropdown_menu');


add_theme_support( 'post-thumbnails' );



function register_featured_meta_box() {
    add_meta_box(
        'featured_meta_box',
        'Featured Post',
        'render_featured_meta_box',
        'products',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'register_featured_meta_box');

function render_featured_meta_box($post) {
    $is_featured = get_post_meta($post->ID, '_featured', true);
    wp_nonce_field('featured_meta_box', 'featured_meta_box_nonce');
    ?>
    <label for="featured-checkbox">
        <input type="checkbox" name="featured-checkbox" id="featured-checkbox" <?php checked($is_featured, 'on'); ?>>
        Mark as Featured
    </label>
    <?php
}

function save_featured_meta_box($post_id) {
    if (!isset($_POST['featured_meta_box_nonce']) || !wp_verify_nonce($_POST['featured_meta_box_nonce'], 'featured_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $is_featured = isset($_POST['featured-checkbox']) ? 'on' : 'off';
    update_post_meta($post_id, '_featured', $is_featured);
}
add_action('save_post', 'save_featured_meta_box');



function get_featured_products() {
    $args = array(
        'post_type' => 'products', // Replace 'products' with your custom post type slug
        'meta_query' => array(
            array(
                'key' => '_featured',
                'value' => 'on',
                'compare' => '='
            )
            ),
        'posts_per_page' => 6,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="container home-intro-products">';
        echo '<div class="row flex-wrap home-collection-flex">';
        while ($query->have_posts()) {
            $query->the_post();
          
            // Display the featured product data
           echo '<div class="col-4">';
           echo '<a href="'.get_permalink().'">';
           the_post_thumbnail('medium_large');
           echo '</a>';
           echo '</div>';         

            // Customize the display as needed
        }
        echo '</div>';
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo 'No featured products found.';
    }
}
