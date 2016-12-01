<?php
// Our custom post type function
function create_posttype_project() {

 register_post_type( 'project',
 // CPT Options
  array(
   'labels' => array(
    'name' => __( 'Project' ),
    'singular_name' => __( 'project' )
   ),
   'public' => true,
   'has_archive' => true,
   'rewrite' => array('slug' => 'project'),
  )
 );
}
// Hooking up our function to theme setup
add_post_type_support( 'project', 'thumbnail' );
add_action( 'init', 'create_posttype_project' );


?>