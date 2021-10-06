<?php
/* enqueue script for parent theme stylesheeet */        
function childtheme_parent_styles() {
 
 // enqueue style
 wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );                       
}
add_action( 'wp_enqueue_scripts', 'childtheme_parent_styles');

add_action('popup', 'test');
function test() {
    echo 'hejjjj';
}



function our_stores() {
    register_post_type('stores', [
    'public' => true,
    'show_in_rest' => true,
    'labels' => [
    'name' => 'Stores',
    'add_new_item' => 'Add New Location',
    'edit_item' => 'Edit Stores',
    'all_items' => 'All Stores',
    'singular_name' => 'Store',
    ],
    'supports' => ['title', 'editor'],
    'rewrite' => ['slug' => 'stores'],
    'menu_icon' => 'dashicons-location-alt',
    'has_archive' => true,
    ]);
   }
   add_action('init', 'our_stores');

   function our_coaches() {
    register_post_type('coaches', [
    'public' => true,
    'show_in_rest' => true,
    'labels' => [
    'name' => 'Coaches',
    'add_new_item' => 'Add New Coach',
    'edit_item' => 'Edit Coach',
    'all_items' => 'All Coach',
    'singular_name' => 'Coach',
    ],
    'supports' => ['title', 'editor'],
    'rewrite' => ['slug' => 'coaches'],
    'menu_icon' => 'dashicons-groups',
    'has_archive' => true,
    ]);
   }
   add_action('init', 'our_coaches');

   
  
  
  
  
  
  
  
    