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
function get_html_modules() {
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
