<?php
/* Custom post type for resources */

// let's create the function for the custom type
function aate_jobs() { 
  // creating (registering) the custom type 
  register_post_type( 'aate_jobs', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
        'name' => __('Jobs', 'understrap'), /* This is the Title of the Group */
        'singular_name' => __('Job', 'understrap'), /* This is the individual type */
        'all_items' => __('All Jobs', 'understrap'), /* the all items menu item */
        'add_new' => __('Add New', 'understrap'), /* The add new menu item */
        'add_new_item' => __('Add New Job', 'understrap'), /* Add New Display Title */
        'edit' => __( 'Edit', 'understrap' ), /* Edit Dialog */
        'edit_item' => __('Edit Job', 'understrap'), /* Edit Display Title */
        'new_item' => __('New Job', 'understrap'), /* New Display Title */
        'view_item' => __('View Job', 'understrap'), /* View Display Title */
        'search_items' => __('Search Job', 'understrap'), /* Search Custom Type Title */ 
        'not_found' =>  __('Nothing found in the Database.', 'understrap'), /* This displays if there are no entries yet */ 
        'not_found_in_trash' => __('Nothing found in Trash', 'understrap'), /* This displays if there is nothing in the trash */
        'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'Collection of AATE Jobs', 'understrap' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */ 
      'menu_icon' => 'dashicons-editor-paste-word', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
      'rewrite' => array( 'slug' => 'jobs', 'with_front' => false, 'feeds' => true, 'pages' => true ), /* you can specify its url slug */
      'has_archive' => false, /* you can rename the slug here */
      'capability_type' => 'post',
      'hierarchical' => false,
      'taxonomies' => array('post_tag'),
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'custom-fields', 'revisions', 'excerpt', 'thumbnail', 'comments', 'author'),
    ) /* end of options */
  ); /* end of register post type */
}
// adding the function to the Wordpress init
add_action( 'init', 'aate_jobs');


// now let's add custom categories (these act like categories)
register_taxonomy( 'aate_job-category', 
  array('aate_jobs'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
      'name' => __( 'Job Categories', 'understrap' ), /* name of the custom taxonomy */
      'singular_name' => __( 'Job Category', 'understrap' ), /* single taxonomy name */
      'search_items' =>  __( 'Search Job Categories', 'understrap' ), /* search title for taxomony */
      'all_items' => __( 'All Job Categories', 'understrap' ), /* all title for taxonomies */
      'parent_item' => __( 'Parent Job Category', 'understrap' ), /* parent title for taxonomy */
      'parent_item_colon' => __( 'Parent Job Category:', 'understrap' ), /* parent taxonomy title */
      'edit_item' => __( 'Edit Job Category', 'understrap' ), /* edit custom taxonomy title */
      'update_item' => __( 'Update Job Category', 'understrap' ), /* update title for taxonomy */
      'add_new_item' => __( 'Add New Job Category', 'understrap' ), /* add new title for taxonomy */
      'new_item_name' => __( 'New Job Category', 'understrap' ), /* name title for taxonomy */
      'not_found' => __( 'No Job Categories Found', 'understrap' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true, 
    'show_ui' => true,
    'query_var' => true,
    'rewrite'=> array(
        'slug' => null,
        'with_front' => true
    ),
  )
);   
