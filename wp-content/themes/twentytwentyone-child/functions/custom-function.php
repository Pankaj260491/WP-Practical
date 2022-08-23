<?php

/**
 * Remove default words from archive titles like "Category:", "Tag:", "Archives:"
 */
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

/**
 * Active menu on archive page
 */
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );    
function add_current_nav_class($classes, $item) {  
    // Getting the current post details
    global $post;
    // Getting the post type of the current post
    $current_post_type = get_post_type_object(get_post_type($post->ID));
   
    $current_post_type_slug = $current_post_type->rewrite['slug'];

    if($item->ID == 80 || $item->ID == 76) {
        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));
        // If the menu item URL contains the current post types slug add the current-menu-item class
        if (strpos($menu_slug,$current_post_type_slug) !== false) {
           $classes[] = 'current-menu-item';
        }
    }
    // Return the corrected set of classes to be added to the menu item
    return $classes;
}