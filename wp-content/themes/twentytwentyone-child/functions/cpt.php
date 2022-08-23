<?php 
/*
* Services Post type
*/
add_action('init', 'services');
function services() {
    $labels = array(
        'name'              => esc_html__( 'Services', 'twentytwentytwo' ),
        'singular_name'     => esc_html__( 'Services', 'twentytwentytwo' ),
        'menu_name'         => esc_html__( 'Services', 'twentytwentytwo' ),
        'name_admin_bar'    => esc_html__( 'Services', 'twentytwentytwo' ),
        'add_new'           => esc_html__( 'Add New Service', 'twentytwentytwo' ),
        'add_new_item'      => esc_html__( 'Add New Service', 'twentytwentytwo' ),
        'new_item'          => esc_html__( 'New Services', 'twentytwentytwo' ),
        'edit_item'         => esc_html__( 'Edit Services', 'twentytwentytwo' ),
        'view_item'         => esc_html__( 'View Services', 'twentytwentytwo' ),
        'all_items'         => esc_html__( 'All Services', 'twentytwentytwo' ),
        'search_items'      => esc_html__( 'Search Services', 'twentytwentytwo' ),
        'parent_item_colon' => esc_html__( 'Parent Services:', 'twentytwentytwo' ),
        'not_found'         => esc_html__( 'No Services Found.', 'twentytwentytwo' ),
        'not_found_in_trash' => esc_html__( 'No Services Found In Trash.', 'twentytwentytwo' )
    );
    $args = array(
        'labels'        => $labels,
        'description'   => esc_html__('Description.', 'twentytwentytwo'),
        'public'        => true,
        'publicly_queryable' => true,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'query_var'     => true,
        'rewrite'       => array('slug' => 'service'),
        'capability_type' => 'post',
        'has_archive'   => false,
        'hierarchical'  => true,
        'menu_position' => null,
        'menu_icon'   => 'dashicons-welcome-learn-more',
        'exclude_from_search' => false,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );
    register_post_type('services ', $args);
    flush_rewrite_rules();
}


/******* Service Categories **********/
add_action( 'init', 'servicecategories', 0 );
function servicecategories() {
  $labels = array(
    'name'              => esc_html__( 'Service Categories', 'twentytwentytwo' ),
    'singular_name'     => esc_html__( 'Service Categories', 'twentytwentytwo' ),
    'search_items'      => esc_html__( 'Search Service Categories', 'twentytwentytwo' ),
    'all_items'         => esc_html__( 'All Service Categories', 'twentytwentytwo' ),
    'parent_item'       => esc_html__( 'Parent Service Categories', 'twentytwentytwo' ),
    'parent_item_colon' => esc_html__( 'Parent Service Categories:', 'twentytwentytwo' ),
    'edit_item'         => esc_html__( 'Edit Service Categories', 'twentytwentytwo' ),
    'update_item'       => esc_html__( 'Update Service Categories', 'twentytwentytwo' ),
    'add_new_item'      => esc_html__( 'Add New Service Categories', 'twentytwentytwo' ),
    'new_item_name'     => esc_html__( 'New Service Categories', 'twentytwentytwo' ),
    'menu_name'         => esc_html__( 'Service Categories', 'twentytwentytwo' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'servicecategories' ),
  );

  register_taxonomy( 'servicecategories', array( 'services' ), $args );
}

/******* Service Tags **********/
add_action( 'init', 'servicetags', 0 );
function servicetags() {
  $labels = array(
    'name'              => esc_html__( 'Service Tags', 'twentytwentytwo' ),
    'singular_name'     => esc_html__( 'Service Tags', 'twentytwentytwo' ),
    'search_items'      => esc_html__( 'Search Service Tags', 'twentytwentytwo' ),
    'all_items'         => esc_html__( 'All Service Tags', 'twentytwentytwo' ),
    'parent_item'       => esc_html__( 'Parent Service Tags', 'twentytwentytwo' ),
    'parent_item_colon' => esc_html__( 'Parent Service Tags:', 'twentytwentytwo' ),
    'edit_item'         => esc_html__( 'Edit Service Tags', 'twentytwentytwo' ),
    'update_item'       => esc_html__( 'Update Service Tags', 'twentytwentytwo' ),
    'add_new_item'      => esc_html__( 'Add New Service Tags', 'twentytwentytwo' ),
    'new_item_name'     => esc_html__( 'New Service Tags', 'twentytwentytwo' ),
    'menu_name'         => esc_html__( 'Service Tags', 'twentytwentytwo' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'servicetags' ),
  );

  register_taxonomy( 'servicetags', array( 'services' ), $args );
}